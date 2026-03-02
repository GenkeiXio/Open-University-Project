@extends('Super-Admin.adminlayout')

@section('title', 'OU Super Admin Dashboard')

@section('content')

    <div class="max-w-7xl mx-auto">

        <div class="flex justify-between items-center mb-10">
            <div>
                <h1 class="text-4xl font-bold text-gray-900 dark:text-gray-100">Super Admin Dashboard</h1>
                <p class="text-gray-500 dark:text-gray-400 mt-1">Full control over the BUOU platform.</p>
            </div>
            <!-- Optional: Add a button for quick actions -->

            <!-- Topbar -->
            <div class="flex justify-between items-center mb-8">
                <button class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
                    + New Action
                </button>

                <button onclick="toggleSidebar()"
                    class="md:hidden p-2 rounded bg-gray-200 dark:bg-gray-700">
                    <i data-lucide="menu"></i>
                </button>

                <button id="themeToggle"
                    class="p-2 rounded bg-gray-200 dark:bg-gray-700 hover:scale-105 transition">
                    <i id="themeIcon" data-lucide="moon"></i>
                </button>
            </div>
            
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            @php
                $cards = [
                    ['icon'=>'newspaper','title'=>'News Articles','desc'=>'Create and manage news posts','color'=>'bg-blue-100 dark:bg-blue-900/40'],
                    ['icon'=>'graduation-cap','title'=>'Programs','desc'=>'Manage academic programs','color'=>'bg-green-100 dark:bg-green-900/40'],
                    ['icon'=>'bot','title'=>'Chatbot Knowledge','desc'=>'Update chatbot responses','color'=>'bg-purple-100 dark:bg-purple-900/40'],
                    ['icon'=>'users','title'=>'User Management','desc'=>'Approve users and assign roles','color'=>'bg-yellow-100 dark:bg-yellow-900/40'],
                    ['icon'=>'settings','title'=>'Site Settings','desc'=>'Contact info and announcements','color'=>'bg-red-100 dark:bg-red-900/40'],
                ];
            @endphp

            @foreach($cards as $card)
                <div class="flex items-start gap-4 p-6 rounded-xl bg-white dark:bg-[#1e293b] shadow hover:shadow-xl hover:scale-105 transition transform cursor-pointer">
                    
                    <div class="w-12 h-12 flex items-center justify-center rounded-lg {{ $card['color'] }}">
                        <i data-lucide="{{ $card['icon'] }}" class="text-2xl text-gray-700 dark:text-gray-200"></i>
                    </div>

                    <div class="flex-1">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $card['title'] }}</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">{{ $card['desc'] }}</p>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    <script>
        lucide.createIcons();

        // Dark Mode
        const toggle = document.getElementById('themeToggle');
        const html = document.documentElement;
        const icon = document.getElementById('themeIcon');

        if (localStorage.theme === 'dark') {
            html.classList.add('dark');
            icon.setAttribute("data-lucide", "sun");
        }

        toggle.addEventListener('click', () => {
            html.classList.toggle('dark');
            const isDark = html.classList.contains('dark');
            icon.setAttribute("data-lucide", isDark ? "sun" : "moon");
            lucide.createIcons();
            localStorage.theme = isDark ? 'dark' : 'light';
        });

        // Mobile Sidebar
        function toggleSidebar() {
            document.getElementById('sidebar')
                .classList.toggle('-translate-x-full');
        }
    </script>

@endsection