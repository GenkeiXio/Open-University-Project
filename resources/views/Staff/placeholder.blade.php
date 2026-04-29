@extends('Admin.adminlayout')

@section('title', $title)

@section('content')
    <div class="flex flex-col items-center justify-center h-[60vh] text-center gap-4">
        <div class="w-16 h-16 rounded-2xl bg-gray-100 dark:bg-gray-800 flex items-center justify-center">
            <i data-lucide="construction" class="w-8 h-8 text-gray-400"></i>
        </div>
        <h1 class="text-2xl font-bold text-gray-800 dark:text-white">{{ $title }}</h1>
        <p class="text-gray-400 dark:text-gray-500 text-sm">This module is currently under construction.</p>
    </div>

    <script src="https://unpkg.com/lucide@latest"></script>
    <script>lucide.createIcons();</script>
@endsection