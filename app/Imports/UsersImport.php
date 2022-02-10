<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\WithProgressBar;

use Throwable;

class UsersImport implements
    ToCollection,
    WithHeadingRow,
    SkipsOnError,
    WithValidation,
    SkipsOnFailure,
    WithProgressBar

{
    use Importable, SkipsErrors, SkipsFailures;
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {

            $user = User::create([
                'name'  => $row['name'],
                'email'  => $row['email'],
                'password' => Hash::make('password'),
                'mobile'  => $row['mobile'],
                'paragraph'  => $row['paragraph'],
                'states'  => $row['states']
            ]);
        }
    }
    public function rules(): array
    {
        return [
            '*.name' => [
                'required',
                'string',
            ],
            '*.password' => [
                'required',

            ],
            '*.mobile' => [
                'required',

            ],
            '*.paragraph' => [
                'required',
                'string',
            ],
            '*.states' => [
                'required',

            ],

            // '*.name' => ['name', 'unique:users,name'],
            '*.email' => ['email', 'unique:users,email'],

        ];
    }
    // public function onFailure(Failure ...$failure)
    // {
    // }


    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */


    // public function model(array $row)
    // {
    //     // dd($row);
    //     return new User([
    //         'name'  => $row['name'],
    //         'email'  => $row['email'],
    //         'password' => Hash::make('password'),
    //         'mobile'  => $row['mobile'],
    //         'paragraph'  => $row['paragraph'],
    //         'states'  => $row['states'],

    //     ]);
    // }
}
