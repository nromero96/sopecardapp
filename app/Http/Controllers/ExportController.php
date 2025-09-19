<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Exports\RenimasExport;
use Maatwebsite\Excel\Facades\Excel;

use Auth;



class ExportController extends Controller
{
    

    public function renimas()
    {
        // ✅ Solo admin puede descargar
        if (!Auth::user()->hasRole('admin')) {
            abort(403, 'No tienes permiso para descargar este archivo.');
        }

        // ✅ Nombre con fecha y hora
        $fileName = 'renimas_' . now()->format('Y-m-d_H-i-s') . '.xlsx';

        return Excel::download(new RenimasExport, $fileName);
    }

}
