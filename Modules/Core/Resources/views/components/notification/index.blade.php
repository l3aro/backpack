<div aria-live="assertive" class="fixed inset-0 flex items-end px-4 py-6 pointer-events-none sm:p-6 sm:items-start z-10">
    <div class="w-full flex flex-col items-center space-y-4 sm:items-end">
        <x-core::notification.base
            x-on:success.window="shown = true; message = $event.detail.message; timeout = setTimeout(() => {shown = false; message = null}, 5000)">
            <x-slot name="icon">
                <x-heroicon-o-check-circle class="w-6 h-6 text-green-400" />
            </x-slot>
        </x-core::notification.base>
    </div>
</div>
