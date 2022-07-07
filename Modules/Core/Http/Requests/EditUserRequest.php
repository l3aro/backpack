<?php

namespace Modules\Core\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return static::baseRules($this->user);
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public static function baseRules(User $user)
    {
        return [
            'name' => 'required|string|max:255',
            'email' => "required|string|email|max:255|unique:{$user->getTable()},email,".$user->id,
            'type' => 'nullable|array',
            'password' => 'nullable|string|min:6|confirmed',
            'photo' => 'nullable|image|max:2048|dimensions:ratio=1/1',
        ];
    }
}
