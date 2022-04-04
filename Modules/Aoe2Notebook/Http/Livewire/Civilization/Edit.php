<?php

namespace Modules\Aoe2Notebook\Http\Livewire\Civilization;

use Livewire\Component;
use Modules\Aoe2Notebook\Models\Civilization;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;

class Edit extends Component
{
    use LoadLayoutView;

    protected $viewPath = 'aoe2notebook::livewire.civilization.edit';
    public Civilization $civilization;

    protected function rules()
    {
        return [
            'civilization.name' => 'required|string|max:100|unique:aoe2notebook_civilizations,name,' . $this->civilization->id,
            'civilization.expansion' => 'string|max:100',
            'civilization.army_type' => 'string|max:100',
            'civilization.team_bonus' => 'string|max:255',
        ];
    }

    public function mount(Civilization $civilization)
    {
        $this->civilization = $civilization;
    }

    public function save()
    {
        $this->validate();
        $this->civilization->save();
        return $this->civilization;
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
}
