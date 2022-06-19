<div class="border-gray-200 border">
    <div class="shadow overflow-x-auto border-b sm:rounded-lg soft-scrollbar">
        <table class="min-w-full divide-y divide-gray-200 table-auto overflow-x-auto">
            <thead class="bg-gray-50">
                <tr>
                    {{ $header ?? '' }}
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200" {{ $attributes }}>
                {{ $slot }}
            </tbody>
        </table>
    </div>
    <div class="p-3 bg-gray-50 rounded-b">
        {{ $pagination ?? '' }}
    </div>
</div>
