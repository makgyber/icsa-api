<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepositRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return  true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "amount"         => ['required'],
            "photo"          => ['required','mimes:jpg,png,jpeg,gif', 'max:5000'],
            "account_id"     => ['required'],
            "type"           => ['required'],
        ];
    }

    public function validated() {
        $now = now();
        $input = $this->request->all();
        return [
            "amount"         => $input['amount'],
            "account_id"     => $input['account_id' ],
            "type"           => $input['type'],
            'submitted_date' => $now,
            'status'        => 'Pending'
        ];
    }
}
