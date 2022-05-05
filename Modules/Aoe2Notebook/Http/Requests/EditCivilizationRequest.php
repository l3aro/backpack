<?php

namespace Modules\Aoe2Notebook\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class EditCivilizationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                'string',
                'max:100',
                "unique:{$this->civilization->getTable()},name," . $this->civilization->id,
            ],
            'expansion' => [new Enum(ExpansionEnum::class)],
            'army_type' => 'string|max:100',
            'team_bonus' => 'string|max:255',
            'photo' => 'nullable|image|max:2048',
        ];
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
}
