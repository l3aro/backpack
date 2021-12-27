<div class="mx-auto px-4 sm:px-6 lg:px-8 mt-5">
    <div class="bg-white rounded shadow px-8 py-6">
        <form class="space-y-8 divide-y divide-gray-200">
            <x-core::field.form-section :title="__('Jumbotron')">

                <x-core::field.form-row title="Jumbotron Heading" required>
                    <x-core::field.input type="text" wire:model.defer="setting.home_jumbotron_heading" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Jumbotron Paragraph">
                    <x-core::field.input type="text" wire:model.defer="setting.home_jumbotron_paragraph" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Jumbotron Image">
                    <x-core::field.image wire:model.defer="jumbotronImage"
                        :default="$jumbotronImage?->temporaryUrl() ?? $setting['home_jumbotron_image'] ?? ''" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Jumbotron Action Text 1">
                    <x-core::field.input type="text" wire:model.defer="setting.home_jumbotron_action_text_1" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Jumbotron Action Link 1">
                    <x-core::field.input type="text" wire:model.defer="setting.home_jumbotron_action_link_1" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Jumbotron Action Text 2">
                    <x-core::field.input type="text" wire:model.defer="setting.home_jumbotron_action_text_2" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Jumbotron Action Link 2">
                    <x-core::field.input type="text" wire:model.defer="setting.home_jumbotron_action_link_2" />
                </x-core::field.form-row>

            </x-core::field.form-section>

            <x-core::field.form-section :title="__('Intro')" class="pt-5">

                <x-core::field.form-row title="Intro Heading">
                    <x-core::field.input type="text" wire:model.defer="setting.home_intro_heading" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Intro Paragraph">
                    <x-core::field.input type="text" wire:model.defer="setting.home_intro_paragraph" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Intro Link">
                    <x-core::field.input type="text" wire:model.defer="setting.home_intro_link" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Intro Image">
                    <x-core::field.image wire:model.defer="introImage"
                        :default="$introImage?->temporaryUrl() ?? $setting['home_intro_image'] ?? ''" />
                </x-core::field.form-row>

            </x-core::field.form-section>

            <x-core::field.form-section :title="__('Section 1')" class="pt-5">
                <x-core::field.form-row title="Section 1 Image">
                    <x-core::field.image wire:model.defer="section1Image"
                        :default="$section1Image?->temporaryUrl() ?? $setting['home_section_1_image'] ?? ''" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Section 1 Heading">
                    <x-core::field.input type="text" wire:model.defer="setting.home_section_1_heading" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Section 1 Paragraph">
                    <x-core::field.input type="text" wire:model.defer="setting.home_section_1_paragraph" />
                </x-core::field.form-row>

            </x-core::field.form-section>

            <x-core::field.form-section :title="__('Project Showcase')" class="pt-5">

                <x-core::field.form-row title="Project 1">
                    <x-core::field.select wire:model.defer="setting.home_project_1" searchable>
                        <x-core::field.select.option label="Select Project" />
                        @foreach ($projects as $project)
                            <x-core::field.select.option :value="$project->id" :label="$project->name" />
                        @endforeach
                    </x-core::field.select>
                </x-core::field.form-row>

                <x-core::field.form-row title="Project 2">
                    <x-core::field.select wire:model.defer="setting.home_project_2" searchable>
                        <x-core::field.select.option label="Select Project" />
                        @foreach ($projects as $project)
                            <x-core::field.select.option :value="$project->id" :label="$project->name" />
                        @endforeach
                    </x-core::field.select>
                </x-core::field.form-row>

                <x-core::field.form-row title="Project 3">
                    <x-core::field.select wire:model.defer="setting.home_project_3" searchable>
                        <x-core::field.select.option label="Select Project" />
                        @foreach ($projects as $project)
                            <x-core::field.select.option :value="$project->id" :label="$project->name" />
                        @endforeach
                    </x-core::field.select>
                </x-core::field.form-row>

            </x-core::field.form-section>

            <x-core::field.form-section :title="__('About')" class="pt-5">

                <x-core::field.form-row title="About Heading">
                    <x-core::field.input type="text" wire:model.defer="setting.home_about_heading" />
                </x-core::field.form-row>

                <x-core::field.form-row title="About Paragraph">
                    <x-core::field.input type="text" wire:model.defer="setting.home_about_paragraph" />
                </x-core::field.form-row>

                <x-core::field.form-row title="About Link">
                    <x-core::field.input type="text" wire:model.defer="setting.home_about_link" />
                </x-core::field.form-row>

                <x-core::field.form-row title="About Image">
                    <x-core::field.image wire:model.defer="aboutImage"
                        :default="$aboutImage?->temporaryUrl() ?? $setting['home_about_image'] ?? ''" />
                </x-core::field.form-row>

            </x-core::field.form-section>

            <x-core::field.form-section :title="__('Section 2')" class="pt-5">

                <x-core::field.form-row title="Section 2 Image">
                    <x-core::field.image wire:model.defer="section2Image"
                        :default="$section2Image?->temporaryUrl() ?? $setting['home_section_2_image'] ?? ''" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Section 2 Heading">
                    <x-core::field.input type="text" wire:model.defer="setting.home_section_2_heading" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Section 2 Paragraph">
                    <x-core::field.input type="text" wire:model.defer="setting.home_section_2_paragraph" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Section 2 Link">
                    <x-core::field.input type="text" wire:model.defer="setting.home_section_2_link" />
                </x-core::field.form-row>

            </x-core::field.form-section>

            <div class="pt-5">
                <div class="flex justify-end">
                    <x-core::button.secondary>
                        Reset
                    </x-core::button.secondary>
                    <x-core::button.primary type="submit" wire:click.prevent="save" class="ml-3">
                        Update
                    </x-core::button.primary>
                </div>
            </div>
        </form>
    </div>
</div>
