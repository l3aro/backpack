<?php

namespace Modules\Core\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return static::baseRules();
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

    public static function baseRules()
    {
        $tableName = (new User())->getTable();
        return [
            'name' => 'required|string|max:255',
            'email' => "required|string|email|max:255|unique:{$tableName},email",
            'type' => 'required|array',
            'password' => 'required|string|min:6|confirmed',
            'photo' => 'nullable|image|max:2048|dimensions:ratio=1/1',
        ];
    }
}
