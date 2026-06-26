<?php

namespace App\Imports;

use App\Models\Student;
use Exception;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentsImport implements ToModel
{
    public function model(array $row)
    {
        // Skip header row
        if ($row[0] == 'ID' || strtolower($row[0]) == 'id') {
            return null;
        }

        // Check duplicate email
        if (Student::where('email', $row[2])->exists()) {
            throw new Exception("Duplicate entry");
        }

        return new Student([
            'name'    => $row[1],
            'email'   => $row[2],
            'contact' => $row[3],
            'course'  => $row[4],
        ]);
    }
}