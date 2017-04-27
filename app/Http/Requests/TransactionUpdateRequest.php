<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Response;

class TransactionUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'id'          => 'required|numeric',
            'subject'     => 'required|string|min:10',
            'amount'      => 'required|numeric',
            'tot'         => 'required|in:withdrawal,deposit',
            'category_id' => 'required|numeric'
        ];
    }


    public function response(array $errors){ return Response::json($errors, 400); }

}
