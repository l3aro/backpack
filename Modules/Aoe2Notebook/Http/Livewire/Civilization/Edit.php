<?php

namespace Modules\Aoe2Notebook\Http\Livewire\Civilization;

use Illuminate\Validation\Rules\Enum;
use Livewire\Component;
use MichaelRubel\LoopFunctions\Traits\LoopFunctions;
use Modules\Aoe2Notebook\Enums\ExpansionEnum;
use Modules\Aoe2Notebook\Http\Requests\EditCivilizationRequest;
use Modules\Aoe2Notebook\Models\Civilization;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;

class Edit extends Component
{
    use LoadLayoutView;
    use LoopFunctions;

    protected $viewPath = 'aoe2notebook::livewire.civilization.edit';
    public Civilization $civilization;
    public $photo;

    // protected function rules()
    // {
    //     return [
    //         'name' => 'required|string|max:100|unique:aoe2notebook_civilizations,name,' . $this->civilization->id,
    //         'expansion' => [new Enum(ExpansionEnum::class)],
    //         'army_type' => 'string|max:100',
    //         'team_bonus' => 'string|max:255',
    //         'photo' => 'nullable|image|max:2048',
    //     ];
    // }

    public function mount(Civilization $civilization)
    {
        $this->fill($civilization);
        $this->propertiesFrom($civilization);
        $this->expansion = $this->expansion?->value;
    }

    public function save()
    {
        // $this->validate();
        dd($this->civilization);
        $this->validateOnly('civilization', app(EditCivilizationRequest::class, [
            'civilization' => $this->civilization,
        ])->rules());
        // $this->civilization->save();
        // if ($this->photo) {
        //     $this->civilization->addMedia($this->photo)->toMediaCollection();
        // }
        // return $this->civilization;
    }

    public function saveAndShow()
    {
        $civilization = $this->save();
        return redirect()->route('admin.aoe2notebook.civilizations.show', $civilization->id);
    }

    public function saveAndContinue()
    {
        $this->save();
        $this->dispatchBrowserEvent('success', ['message' => __('The civilization has been updated successfully.')]);
    }

    public function getExpansionEnumLabelsProperty()
    {
        return ExpansionEnum::labels();
    }
}
