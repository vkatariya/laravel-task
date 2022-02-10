<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
// use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;
// WithCustomCsvSettings,
class UsersExport implements FromCollection, WithHeadings
{
    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';'
        ];
    }

    public function headings(): array
    {
        return ["Name", "Email", "Password", "Mobile", "Paragraph", "States"];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return User::select('name', 'email', 'password', 'mobile', 'paragraph', 'states')->get();
    }
}
