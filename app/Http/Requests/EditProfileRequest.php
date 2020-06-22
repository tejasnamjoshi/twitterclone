<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditProfileRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(User $user)
    {
        $user = request('user');
        return [
            'name' => ['required', 'string', 'max:50'],
            'username' => ['required', 'string', 'regex:/^\S*$/u', 'max:50', Rule::unique('users')->ignore($user)],
            'email' => ['required', 'string', 'email', 'max:50', Rule::unique('users')->ignore($user)],
            'avatar' => ['sometimes', 'image'],
            'description' => ['sometimes', 'string', 'min:20'],
            'wallpaper' => ['sometimes', 'image'],
            'password' => ['sometimes', 'nullable', 'string', 'min:8', 'max:50', 'confirmed']
        ];
    }
}
