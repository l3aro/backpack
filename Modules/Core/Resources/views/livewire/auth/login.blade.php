<div>
    <x-slot name="title">Sign in to your account</x-slot>

    <form class="space-y-6" action="#" method="POST" wire:submit.prevent="login">
        <x-core::alert :message="session()->get('success')" type="success" />
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                Email address
            </label>
            <div class="mt-1">
                <x-input wire:model.defer="email" autocomplete="email"></x-input>
            </div>
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                Password
            </label>
            <div class="mt-1">
                <x-input type="password" wire:model.defer="password"></x-input>
            </div>
        </div>

        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <x-checkbox id="remember-me" label="Remember me" wire:model.defer="remember" />
            </div>

            <div class="text-sm">
                <a href="{{ route('admin.password.request') }}"
                    class="font-medium text-green-600 hover:text-green-500">
                    Forgot your password?
                </a>
            </div>
        </div>

        <div>
            <x-core::button.primary wire:click.prevent="login" class="w-full">
                Sign in
            </x-core::button.primary>
        </div>
    </form>
</div>
