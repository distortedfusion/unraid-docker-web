<div>
    @wire
        <div class="flex items-center space-x-4">
            <div class="flex-grow">
                <x-form-input name="search" :placeholder="__('Filter containers')" />
            </div>
            <div class="border-l border-gray-200 dark:border-gray-800 pl-4 flex-shrink-0">
                <x-toggle name="showAll" :label="__('Show all')" />
            </div>
        </div>
    @endwire

    <div class="bg-white dark:bg-gray-900 text-black dark:text-white rounded-md mt-8">
        @if ($containers->isEmpty())
            <div class="px-6 text-center py-16">
                <i class="fas fa-search text-4xl"></i>
                <h2 class="text-lg font-medium text-black dark:text-white mt-6">{{ __('No Available Containers') }}</h2>
                <p class="mt-1 text-sm text-gray-500">{{ __('Your current selection does not have any containers. Make sure you have created a container or try to change the active filters.') }}</p>
            </div>
        @endif

        <div class="divide-y divide-gray-200 dark:divide-gray-800">
            @foreach ($containers as $container)
                <x-list-item :url="$container->url" class="flex items-center space-x-4{{ $loop->first ? ' rounded-t' : null }}{{ $loop->last ? ' rounded-b' : null }}">
                    <div class="flex-shrink-0">
                        <x-icon icon="fa-compact-disc" />
                    </div>
                    <div class="flex-grow">
                        {{ $container->name }}

                        @if (! is_null($container->url))
                            <div class="text-xs text-gray-500">
                                {{ $container->url }}
                            </div>
                        @endif
                    </div>

                    @if (! is_null($container->url))
                        <div class="flex-shrink-0">
                            <i class="fas fa-chevron-right text-gray-500"></i>
                        </div>
                    @endif
                </x-list-item>
            @endforeach
        </div>
    </div>
</div>
