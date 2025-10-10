<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Exports\RenimasExport;
use Maatwebsite\Excel\Facades\Excel;

use Auth;



class ExportController extends Controller
{
    

    public function renimas(Request $request)
    {
        // ✅ Solo admin puede descargar
        if (!Auth::user()->hasRole('admin')) {
            abort(403, 'No tienes permiso para descargar este archivo.');
        }

        // ✅ Clave de seguridad que tú definas EXPORT_SECURITY_KEY
        $securityKey = config('services.export_security_key');

        // ✅ Verificamos si se envió la clave
        $inputKey = $request->input('clave');

        if (!$inputKey || $inputKey !== $securityKey) {
            //retornar mensaje error ne la misma página
            return redirect()->back()->with('error', 'Clave de seguridad incorrecta.');
        }

        // ✅ Nombre con fecha y hora
        $fileName = 'renimas_' . now()->format('Y-m-d_H-i-s') . '.xlsx';

        return Excel::download(new RenimasExport, $fileName);

    }

}
