<?php

namespace App\Imports;

use App\Models\Candidate;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CandidateImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Candidate([
            'full_name' => $row['full_name'],
            'email' => $row['email'],
            'phone' => $row['phone'],
            'status' => $row['status'],
            'gender' => $row['gender'],
            'address' => $row['address'],
        ]);
    }
}
