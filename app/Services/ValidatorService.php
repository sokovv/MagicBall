<?php

namespace App\Services;
use Illuminate\Support\Facades\Validator;


/**
 * Summary of ValidatorService
 */
class ValidatorService {

    /**
     * Summary of valid
     * @param mixed $request
     * @return mixed
     */
    public function serviceValid($request): mixed
    {

        $validator = Validator::make($request->all(), [
            'name' => ['required'],
        ], [
            'required' => 'Имя не должно быть пустым',
        ]);

        return $validator;

    }

}
