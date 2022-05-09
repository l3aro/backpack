<?php

namespace Modules\Aoe2Notebook\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Aoe2Notebook\Models\Unit;

class EditUnitRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return static::baseRules($this->unit);
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

    public static function baseRules(Unit $unit): array
    {
        return [
            'name' => "required|string|max:100|unique:{$unit->getTable()},name," . $unit->id,
            'expansion' => 'nullable|string|max:100',
            'type' => 'nullable|array|max:100',
            'civilization' => 'nullable|string|max:100',
            'description' => 'nullable|string|max:255',
            'age' => 'nullable|string|max:50',
            'training_time' => 'nullable|numeric',
            'training_cost' => 'nullable|array',
            'hit_points' => 'nullable|numeric',
            'attack' => 'nullable|numeric',
            'rate_of_fire' => 'nullable|numeric',
            'attack_delay' => 'nullable|numeric',
            'frame_delay' => 'nullable|numeric',
            'minimum_range' => 'nullable|numeric',
            'range' => 'nullable|numeric',
            'accuracy' => 'nullable|numeric',
            'projectile_speed' => 'nullable|numeric',
            'melee_armor' => 'nullable|numeric',
            'pierce_armor' => 'nullable|numeric',
            'speed' => 'nullable|numeric',
            'line_of_sight' => 'nullable|numeric',
            'upgrade_from_id' => 'nullable|numeric',
            'upgrade_to_id' => 'nullable|numeric',
            'upgrade_time' => 'nullable|numeric',
            'photo' => 'nullable|image|max:2048',
            'trainingCosts' => 'nullable|array',
            'trainingCosts.*' => 'nullable|numeric',
            'upgradeCosts' => 'nullable|array',
            'upgradeCosts.*' => 'nullable|numeric',
        ];
    }
}
