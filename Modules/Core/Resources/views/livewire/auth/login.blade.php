<div>
    <x-slot name="title">Sign in to your account</x-slot>

    <form class="space-y-6" action="#" method="POST">
        <x-core::alert :message="session()->get('success')" type="success" />
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

        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <label for="remember-me">
                    <input wire:model="remember" id="remember-me" name="remember-me" type="checkbox"
                        class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                    <span class="ml-1 text-sm text-gray-900">Remember me</span>
                </label>
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
