<?php

namespace App\Imports;

use App\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Student([
            'name'     => $row['nombre'],
            'dni'     => $row['dni'],
            'phone'     => $row['telefono'],
            'address'     => $row['address'],
            'email'    => $row['email'],
            'docket' =>$row['docket']
        ]);
    }
}
