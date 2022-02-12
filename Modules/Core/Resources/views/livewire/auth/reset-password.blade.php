<div>
    <x-slot name="title">Setup new password</x-slot>
    <x-slot name="description">
        <p class="mt-2 text-center text-sm text-gray-600">
            {{ __('Reset already?') }}
            <a href="#" class="font-medium text-green-600 hover:text-green-500">
                {{ __('Sign in here') }}
            </a>
        </p>
    </x-slot>

    <form class="space-y-6" action="#" method="POST">
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">
                Email address
            </label>
            <div class="mt-1">
                <input wire:model.defer="email" id="email" name="email" type="email" autocomplete="email"
                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                <x-core::field.session-error field="email" />
            </div>
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">
                Password
            </label>
            <div class="mt-1">
                <input wire:model.defer="password" id="password" name="password" type="password"
                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                <x-core::field.session-error field="password" />
            </div>
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">
                Password Confirmation
            </label>
            <div class="mt-1">
                <input wire:model.defer="password_confirmation" id="password" name="password" type="password"
                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
            </div>
        </div>

        <div class="flex items-center justify-end">
            <div class="text-sm">
                {{ __('Reset already?') }}
                <a href="{{ route('admin.login') }}" class="font-medium text-green-600 hover:text-green-500">
                    {{ __('Sign in here') }}
                </a>
            </div>
        </div>

        <div>
            <button type="submit" wire:click.prevent="resetPassword"
                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                {{ __('Reset Password') }}
            </button>
        </div>
    </form>
</div>
