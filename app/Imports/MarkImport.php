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
        // dd($row);
        $data = [];
        $obj = new Result();

        foreach($row as $key => $value) {
            if ($key != 'student_id') {
                $sub = Subject::select('id')->where('subjects', ucfirst($key))->first();
                $data['marks'] = $value;
                $data['subject_id'] = $sub->id;
                $data['student_id'] = $row['student_id'];
                // dd($data);
                $obj = new Result($data);
                $obj->save();
                // print"<pre>";
                // print_r($obj);
                // print"</pre>";
                // die();

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
