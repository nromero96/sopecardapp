<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sede;

class SedeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        $search = is_string($search) ? trim($search) : '';
        $data = [
            'category_name' => 'sedes',
            'page_name' => 'sedes_index',
            'search' => $search,
        ];

        $query = Sede::where('status', '!=', 'deleted');

        foreach (preg_split('/\s+/', $search, -1, PREG_SPLIT_NO_EMPTY) as $term) {
            $pattern = '%'.$term.'%';
            $query->where(function ($query) use ($pattern) {
                $query->where('name', 'like', $pattern)
                    ->orWhere('address', 'like', $pattern);
            });
        }

        $sedes = $query->orderBy('id')->paginate(15)
            ->appends($search === '' ? [] : ['search' => $search]);

        return view('pages.sedes.index')->with($data)->with('sedes', $sedes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'category_name' => 'sedes',
            'page_name' => 'sedes_create',
        ];

        return view('pages.sedes.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:sedes,name',
            'address' => 'nullable|string|max:255',
        ]);

        Sede::create($request->all());

        return redirect()->route('sedes.index')->with('success', 'Sede creada correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'category_name' => 'sedes',
            'page_name' => 'sedes_edit',
        ];

        $sede = Sede::find($id);

        if ($sede) {
            return view('pages.sedes.edit')->with($data)->with('sede', $sede);
        } else {
            return redirect()->route('sedes.index')->with('error', 'Sede no encontrada.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:sedes,name,' . $id,
            'address' => 'nullable|string|max:255',
            'status' => 'required|string|in:activo,inactivo',
        ]);

        $sede = Sede::find($id);

        if ($sede) {
            $sede->update($request->all());
            return redirect()->route('sedes.index')->with('success', 'Sede actualizada correctamente.');
        } else {
            return redirect()->route('sedes.index')->with('error', 'Sede no encontrada.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sede = Sede::find($id);

        if ($sede) {
            $sede->status = 'deleted';
            $sede->save();
            return redirect()->route('sedes.index')->with('success', 'Sede eliminada correctamente.');
        } else {
            return redirect()->route('sedes.index')->with('error', 'Sede no encontrada.');
        }
    }
}
