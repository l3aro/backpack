<div>
    <x-slot name="title">Reset Password</x-slot>

    <form class="space-y-6" action="#" method="POST">
        <x-core::alert :message="session()->get('success')" type="success" />
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">
                Email address
            </label>
            <div class="mt-1">
                <input id="email" wire:model.defer="email" type="email" autocomplete="email"
                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                <x-core::field.session-error field="email" />
            </div>
        </div>

        <div>
            <button type="submit" wire:click.prevent="sendResetLink"
                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                Send Password Reset Link
            </button>
        </div>
    </form>
</div>
