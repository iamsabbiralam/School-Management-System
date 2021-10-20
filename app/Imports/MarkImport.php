<?php

namespace App\Imports;

use App\Models\Result;
use App\Models\Subject;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;
use Throwable;

class MarkImport implements ToModel, WithHeadingRow, SkipsOnError, WithValidation, SkipsOnFailure
{
    use Importable, SkipsErrors, SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $data = [];
        $obj = new Result();
        $subjects = Subject::pluck( 'id', 'subjects')->toArray();

        foreach($row as $key => $value) {
            if ($key != 'student_id') {
                $data['marks'] = $value;
                $data['subject_id'] = $subjects[ucfirst($key)];
                $data['student_id'] = $row['student_id'];
                $obj = new Result($data);
                $obj->save();
            }
        }
        return $obj;
    }

    public function rules(): array
    {
        return [

        ];
    }
}