<?php

namespace Modules\Aoe2Notebook\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use Modules\Aoe2Notebook\Enums\ExpansionEnum;
use Modules\Aoe2Notebook\Models\Civilization;

class EditCivilizationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Civilization $civilization)
    {
        dd($civilization);
        return static::baseRules($this->civilization);
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

    public static function baseRules(Civilization $civilization): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:100',
                "unique:{$civilization->getTable()},name," . $civilization->id,
            ],
            'expansion' => [new Enum(ExpansionEnum::class)],
            'army_type' => 'string|max:100',
            'team_bonus' => 'string|max:255',
            'photo' => 'nullable|image|max:2048',
        ];
    }
}
