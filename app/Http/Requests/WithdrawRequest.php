<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WithdrawRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'account_id' => ['required'],
            'amount' => ['required'],
            'bank' => ['required'],
            'bank_account' => ['required'],
        ];
    }

    public function validated() {
        $now = now();
        $input = $this->request->all();
        return [
            "amount"     => $input['amount'],
            "bank"       => $input['bank'] ,
            "bank_account_number" => $input['bank_account'] ,
            "account_id" => $input['account_id'] ,
            "status"    => 'Pending',
            "submitted_date" => $now
        ];
    }
}
