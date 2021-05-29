<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            'username' => ['required'],
            'fullname' => ['required'],
            'email' => ['required', 'email'],
            'mobilenumber' => ['required'],
            'idtype' => ['required'],
            'idnumber' => ['required'],
            'password' => ['required'],
            'address' => ['required'],
            'province' => ['required'],
            'city' => ['required'],
            'barangay' => ['required'],
            'zipcode' => ['required'],
            'civilstatus' => ['required'],
            'occupation' => ['required'],
            'companyname' => ['required'],
            'companyaddress' => ['required'],
            'companycontact' => ['required'],
            'facebookprofile' => ['required'],
            'savingobjective' => ['required'],
            'targetsaving' => ['required'],
            'savingperiod' => ['required'],
            'depositplan' => ['required'],
            'periodicsavingamount' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'Email already used'
        ];
    }

    public function validated() {
        $now = now();
        $input = $this->request->all();
        return [
            'user' => [
                'user_login' => $input['username'],
                'user_pass' => $input['password'],
                'user_nicename' => str_replace(['.','@'], ['-'], $input['email']),
                'user_email' => $input['email'],
                'user_url' => '',
                'user_registered' => $now->format('Y-m-d H:i:s'),
                'user_activation_key' => '',
                'user_status' => 0,
                'display_name' => $input['fullname'],
            ],
            'user_meta' => [
                'nickname'	=> str_replace(['.','@'], ['-'], $input['email']),
                'first_name'	=> '',
                'last_name'	=> '',
                'description' => '',	
                'rich_editing'	=> 'true',
                'syntax_highlighting'	=> 'true',
                'comment_shortcuts'	=>'false',
                'admin_color' =>	'fresh',
                'use_ssl'=>	0,
                'show_admin_bar_front'=>	'true',
                'locale' 	=> '',
                'isv_capabilities'=>	'a:1:{s:10:"subscriber";b:1;}',
                'isv_user_level'	=>0,
                'full_legal_name'=>	$input['fullname'],
                '_full_legal_name'=>	'field_5d405c12a4c43',
                'government_id_type'=>	$input['idtype'],
                '_government_id_type'	=>'field_5d405c2ba4c44',
                'id_number'	=> $input['idnumber'],
                '_id_number'=>	'field_5e14bb2a2e6e3',
                'mobile_number'	=> $input['mobilenumber'],
                '_mobile_number'=>	'field_5d405c40a4c45',
                'address'=> $input['address'],
                '_address'	=>'field_5d405c51a4c46',
                'province'=> $input['province'],
                '_province'	=>'field_5f84ab7721b53',
                'city_municipality'=> $input['city'],
                '_city_municipality'=>	'field_5f84ac3921b55',
                'barangay'=> $input['city'],
                '_barangay'	=>'field_5f84abc421b54',
                'zip_code'=>	$input['zipcode'],
                '_zip_code'	=>'field_5f84ad203cd70',
                'civil_status'=> $input['civilstatus'],
                '_civil_status'	=> 'field_5f84aca73cd6e',
                'occupation_business_position'=> $input['companyname'],
                '_occupation_business_position'=>	'field_5f84acfd3cd6f',
                'occupation_business_position_name'	=> $input['companyname'],
                '_occupation_business_position_name'=>	'field_5f84ad373cd71',
                'occupation_business_position_name_address'	=> $input['companyaddress'],
                '_occupation_business_position_name_address'=>	'field_5f84ad553cd72',
                'occupation_business_position_name_contact_number'	=> $input['companycontact'],
                '_occupation_business_position_name_contact_number'	=> 'field_5f84ad693cd73',
                'your_facebook_profile_url'	=> $input['facebookprofile'],
                '_your_facebook_profile_url'=>	'field_5f41512bdefcd',
                'why_are_you_saving' => $input['savingobjective'],
                '_why_are_you_saving'=> 'field_5f414ef2e9b81',
                'target_savings_amount'	=> $input['targetsaving'],
                '_target_savings_amount'=>	'field_5f415006c6af1',
                'how_long_target_savings_amount' => $input['savingperiod'],
                '_how_long_target_savings_amount'	=> 'field_5f41507920c4d',
                'deposit_interval_plan'	=> $input['depositplan'],
                '_deposit_interval_plan' =>	'field_5f84a8396934f',
                'deposit_interval_value' 	=> $input['periodicsavingamount'],
                '_deposit_interval_value'	=> 'field_5f84a90a69350',
                'referred_by'	=> '',
                '_referred_by'=>	'field_609585ed9f8f2',
                'default_password_nag'	=> '',
                'email_address'	=> '',
                'facebook'	=> '',
                'twitter'	=> '',
                'google_plus'	=> '',
                'instagram'	=> '',
                'linkedin'	=> '',
                'pinterest'	=> '',
                'last_update' =>$now,
                'wc_last_active' =>	$now
            ]
        ];
    }
}
