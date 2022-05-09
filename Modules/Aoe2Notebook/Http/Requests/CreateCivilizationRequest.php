<?php

namespace Modules\Aoe2Notebook\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use Modules\Aoe2Notebook\Enums\ExpansionEnum;
use Modules\Aoe2Notebook\Models\Civilization;

class CreateCivilizationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return static::baseRules($this->state);
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

    public static function baseRules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:100',
                Rule::unique((new Civilization())->getTable(), 'name'),
            ],
            'expansion' => new Enum(ExpansionEnum::class),
            'army_type' => 'string|max:100',
            'team_bonus' => 'string|max:255',
        ];
    }
}
