@extends('Super-Admin.adminlayout')

@section('title', 'OU Super Admin Dashboard')

@section('content')

<div class="w-full">

    <!-- HEADER -->
    <div class="flex flex-col xl:flex-row xl:items-center xl:justify-between gap-8 mt-4 mb-12">

        <div>
            <h1 class="text-3xl md:text-4xl font-bold tracking-tight text-gray-900 dark:text-white">
                Super Admin Dashboard
            </h1>
            <p class="text-gray-500 dark:text-gray-400 mt-3 text-sm md:text-base">
                Full control over the BUOU platform.
            </p>
        </div>

        <div class="flex flex-wrap items-center gap-3">

            <button class="px-6 py-2.5 bg-blue-600 text-white rounded-xl
                shadow-md hover:shadow-lg hover:-translate-y-0.5
                hover:bg-blue-700 transition-all duration-200">
                + New Action
            </button>

            <select class="appearance-none bg-white dark:bg-gray-800
                border border-gray-300 dark:border-gray-700
                text-sm rounded-xl px-4 py-2
                shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option selected>Monthly</option>
                <option>Quarterly</option>
                <option>Yearly</option>
            </select>

            <button id="themeToggle"
                class="p-2.5 rounded-xl bg-gray-200 dark:bg-gray-700 hover:scale-105 transition">
                <i id="themeIcon" data-lucide="moon"></i>
            </button>

        </div>
    </div>

    <!-- WELCOME -->
    <div class="mb-10 px-6 py-4 rounded-2xl
        bg-gradient-to-r from-blue-50 to-indigo-50
        dark:from-[#1e293b] dark:to-[#111827]
        border border-blue-100 dark:border-gray-700">

        <p class="text-gray-700 dark:text-gray-300">
            Welcome,
            <span class="font-semibold text-blue-600 dark:text-blue-400">
                {{ session('admin_name') ?? 'Super Admin' }}
            </span>
            👋 You have full system oversight.
        </p>
    </div>

    <!-- STATS -->
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-8">

        @for($i=0;$i<3;$i++)
        <div class="p-7 rounded-2xl
            bg-white dark:bg-[#1e293b]
            border border-gray-100 dark:border-gray-700
            shadow-sm hover:shadow-xl hover:-translate-y-1 transition">

            <div class="flex justify-between items-center mb-4">
                <p class="text-gray-500 dark:text-gray-400 text-sm font-medium">
                    {{ ['Active Super Admin','Active Admins','Faculty'][$i] }}
                </p>
                <i data-lucide="users" class="w-5 h-5 text-gray-400"></i>
            </div>

            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-1">
                0
            </h2>

            <p class="text-green-600 text-xs font-medium">
                Active in last 30 days
            </p>
        </div>
        @endfor

    </div>
</div>

<script>
    lucide.createIcons();

    const toggle = document.getElementById('themeToggle');
    const html = document.documentElement;
    const icon = document.getElementById('themeIcon');

    if (localStorage.theme === 'dark') {
        html.classList.add('dark');
        icon.setAttribute("data-lucide", "sun");
        lucide.createIcons();
    }

    toggle.addEventListener('click', () => {
        html.classList.toggle('dark');
        const isDark = html.classList.contains('dark');
        icon.setAttribute("data-lucide", isDark ? "sun" : "moon");
        lucide.createIcons();
        localStorage.theme = isDark ? 'dark' : 'light';
    });
</script>

@endsection