<?php

namespace App\Exports;

use App\Models\Renima;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\Schema;

class RenimasExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Renima::all()->map(function ($item) {
            // Clonar atributos
            $row = $item->toArray();

            // Enmascarar datos sensibles
            $row['de_documento_identidad'] = $this->maskData($item->de_documento_identidad);
            $row['de_telefono'] = $this->maskData($item->de_telefono);
            $row['de_celular'] = $this->maskData($item->de_celular);
            $row['de_celular_2'] = $this->maskData($item->de_celular_2);
            $row['de_correo'] = $this->maskEmail($item->de_correo);

            return $row;
        });
    }


    public function headings(): array
    {
        // ✅ Obtiene todos los nombres de columnas de la tabla
        return Schema::getColumnListing((new Renima)->getTable());
    }

    private function maskData($value)
    {
        if (!$value) return null;

        $len = strlen($value);
        if ($len <= 5) return str_repeat('*', $len); // si es corto, todo oculto

        return substr($value, 0, 2) . str_repeat('*', $len - 5) . substr($value, -3);
    }

    private function maskEmail($value)
    {
        if (!$value) return null;

        $parts = explode('@', $value);
        if (count($parts) === 2) {
            return $parts[0] . '@***';
        }

        return $this->maskData($value);
    }

}
