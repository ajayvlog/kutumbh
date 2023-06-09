<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can(
            'edit', $this->route('user')
        );
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [ 
            'nickname'    => 'required|string|max:255',
            'name'        => 'required|string|max:255',
            'gender_id'   => 'required|numeric',
            'dob'         => 'nullable|date|date_format:Y-m-d',
            'yob'         => 'nullable|date_format:Y',
            'dod'         => 'nullable|date|date_format:Y-m-d',
            'tob'         => 'nullable|string:H:i:sa',
            'yod'         => 'nullable|date_format:Y',
            'phone'       => 'nullable|string|max:255',
            'pob'         => 'nullable|string|max:255',
            'address'     => 'nullable|string|max:255',
            'email'       => 'nullable|string|max:255',
            'password'    => 'nullable|min:6|max:15',
            'birth_order' => 'nullable|numeric|min:1',
            'relign_id'   => 'nullable|numeric',
            'cast_id'     => 'nullable|numeric',
            'dynasty_id'  => 'nullable|numeric',
            'dynasty_other' => 'nullable|string|max:255',
            'clan_other'  => 'nullable|string|max:255',
            'subclan_other' => 'nullable|string|max:255',
            'clan_id'     => 'nullable|numeric',
            'subclan_id'  => 'nullable|numeric',
            'country_id'  => 'nullable|numeric',
            'state_id'    => 'nullable|numeric',
            'city_id'     => 'nullable|numeric',
            'tehsil_id'   => 'nullable|numeric',
            'village_id'  => 'nullable|numeric',
        ];
    }

    public function messages()
    {
        return [
            'password.current_password'  => trans('passwords.old_password'),
            'new_password.same_password' => trans('passwords.same_password'),
        ];
    }

    public function validated()
    {
        $formData = parent::validated();

        // if ($formData['dod']) {
        //     $formData['yod'] = substr($formData['dod'], 0, 4);
        // } else {
        //     $formData['yod'] = $formData['yod'];
        // }

        // if ($formData['dob']) {
        //     $formData['yob'] = substr($formData['dob'], 0, 4);
        // } else {
        //     $formData['yob'] = $formData['yob'];
        // }

        // if ($formData['password']) {
        //     $formData['password'] = bcrypt($formData['password']);
        // } else {
        //     unset($formData['password']);
        // }

        return $formData;
    }
}
