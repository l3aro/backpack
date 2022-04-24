<div class="mx-auto px-4 sm:px-6 lg:px-8 mt-5">
    <div class="flex justify-end mb-3">
        <a href="{{ route('admin.me.profile.edit') }}"
            class="ml-2 transition inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-xs font-medium text-gray-700 hover:text-white bg-white hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-green-500">
            <x-heroicon-o-pencil-alt class="w-5 h-5" />
        </a>
    </div>
    <div class="bg-white shadow rounded mb-6 py-3 px-6 divide-y">
        <div class="flex border-b border-40 -mx-6 px-6">
            <div class="w-1/4 py-4">
                <h4 class="font-normal text-80">Name</h4>
            </div>
            <div class="w-3/4 py-4 break-words">
                <p class="text-90">
                    {{ $user->name }}
                </p>
            </div>
        </div>
        <div class="flex border-b border-40 -mx-6 px-6">
            <div class="w-1/4 py-4">
                <h4 class="font-normal text-80">Email</h4>
            </div>
            <div class="w-3/4 py-4 break-words">
                <p class="text-90">
                    {{ $user->email }}
                </p>
            </div>
        </div>
        <div class="flex -mx-6 px-6">
            <div class="w-1/4 py-4">
                <h4 class="font-normal text-80">Avatar</h4>
            </div>
            <div class="w-3/4 py-4 break-words">
                <img class="inline-block h-14 w-14 rounded-full" src="{{ $user->profile_photo_url }}" alt="">
            </div>
        </div>
    </div>
</div>
