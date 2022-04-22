<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Validator;

class ValidateRepository
{

    public static function start(Object|Array $data,Array $valid)
    {
        $validator = Validator::make($data,$valid);


        if ($validator->fails()) {
            echo json_encode($validator->errors(),JSON_UNESCAPED_UNICODE );
            die;
        }
    }

}
