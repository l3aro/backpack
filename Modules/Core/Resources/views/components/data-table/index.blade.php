<div class="border border-gray-200 rounded-xl dark:border-gray-700">
    <div class="shadow overflow-x-auto border-b sm:rounded-lg soft-scrollbar">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 table-auto overflow-x-auto">
            <thead class="bg-gray-50 dark:bg-gray-500/10">
                <tr>
                    {{ $header ?? '' }}
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700 text-gray-500 dark:text-gray-400" {{ $attributes }}>
                {{ $slot }}
            </tbody>
        </table>
    </div>
    <div class="p-3 bg-gray-50 dark:bg-gray-500/10 rounded-b dark:text-gray-400">
        {{ $pagination ?? '' }}
    </div>
</div>
