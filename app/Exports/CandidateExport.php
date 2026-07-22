<?php

namespace App\Exports;

use App\Models\Candidate;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CandidateExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Candidate::select(
            'id',
            'full_name',
            'email',
            'phone',
            'status',
            'created_at'
        )->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Full Name',
            'Email',
            'Phone',
            'Status',
            'Created At',
        ];
    }
}
