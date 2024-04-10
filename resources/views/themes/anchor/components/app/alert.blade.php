@props([
    'title' => '',
    'type' => 'gray', // info, success, warning, danger
])

@php

    $alertIcon = 'phosphor-info-duotone';

    $alertIcon = match($type)
    {
        'info' => 'phosphor-info-duotone',
        'success' => 'icon-check-circle-duotone',
        'warning' => 'icon-warning-duotone',
        'danger' => 'icon-warning-circle-duotone',
        'gray' => 'icon-info-duotone'
    };


@endphp

<div 
    @class([
        'relative px-5 py-4 w-full rounded-md border',
        'bg-gray-100 dark:bg-zinc-700 text-gray-900 dark:text-gray-300 border-gray-200 dark:border-gray-700' => $type == 'gray',
		'bg-blue-50 text-blue-600 border-blue-200' => $type == 'info',
		'bg-green-50 text-green-500 border-green-200' => $type == 'success',
		'bg-yellow-50 text-yellow-500 border-yellow-200' => $type == 'warning',
		'bg-red-50 text-red-600 border-red-200' => $type == 'danger'
    ])
>
    @if($title ?? false)
    <div class="flex items-center space-x-2">
        <x-icon name="{{ $alertIcon }}" class="w-5 h-5 -translate-y-0.5" />
        <h5 class="mb-1 font-medium tracking-tight leading-none">{{ $title }}</h5>
    </div>
    @endif
    <div class="@if($title ?? false){{ 'pl-7' }}@endif text-sm opacity-80">{{ $slot }}</div>
</div>