<!DOCTYPE html>
<html lang="en" class="transition-colors duration-300">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Student Portal')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script>
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50: '#f0f5ff',
                            500: '#3b82f6',
                            600: '#2563eb',
                        }
                    }
                }
            }
        };
    </script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="bg-gray-50 dark:bg-[#0b1120] text-gray-800 dark:text-gray-200 font-[Inter] transition-colors duration-300">

<div class="flex min-h-screen">

    <aside id="sidebar"
        class="w-64 md:w-64 bg-white dark:bg-[#111827] border-r border-gray-200 dark:border-gray-800 flex flex-col transition-all duration-300 fixed md:relative h-full z-40 -translate-x-full md:translate-x-0">

        <button id="toggleSidebar"
            class="hidden md:flex absolute -right-3 top-6 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-full p-1 shadow-md hover:bg-gray-100 dark:hover:bg-gray-700 transition">
            <i data-lucide="chevron-left" class="w-4 h-4 text-blue-600"></i>
        </button>

        <div class="flex items-center gap-3 px-6 py-8">
            <div class="w-10 h-10 rounded-xl bg-blue-600 text-white flex items-center justify-center shadow-lg shadow-blue-500/20">
                <i data-lucide="graduation-cap"></i>
            </div>
            <span class="sidebar-text font-bold text-xl tracking-tight text-gray-800 dark:text-white">
                STUDENT
            </span>
        </div>

        <nav class="flex-1 px-4 space-y-2 text-sm">
            <p class="sidebar-text text-[10px] font-bold text-gray-400 uppercase tracking-widest px-3 mb-2">Academic</p>

            <a href="{{ route('student.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl bg-blue-50 dark:bg-blue-900/20 text-blue-600 dark:text-blue-400 font-semibold">
                <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
                <span class="sidebar-text">Overview</span>
            </a>

            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-500 dark:text-gray-400 transition">
                <i data-lucide="book-open" class="w-5 h-5"></i>
                <span class="sidebar-text">My Courses</span>
            </a>

            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-500 dark:text-gray-400 transition">
                <i data-lucide="file-text" class="w-5 h-5"></i>
                <span class="sidebar-text">Grades</span>
            </a>

            <div class="pt-4">
                <p class="sidebar-text text-[10px] font-bold text-gray-400 uppercase tracking-widest px-3 mb-2">Support</p>
                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-500 dark:text-gray-400 transition">
                    <i data-lucide="message-square" class="w-5 h-5"></i>
                    <span class="sidebar-text">Chat Support</span>
                </a>
            </div>
        </nav>

        <div class="p-4 border-t border-gray-100 dark:border-gray-800 space-y-2">
            <button onclick="toggleDarkMode()" class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-500 transition">
                <i data-lucide="moon" class="w-5 h-5 dark:hidden"></i>
                <i data-lucide="sun" class="w-5 h-5 hidden dark:block"></i>
                <span class="sidebar-text">Appearance</span>
            </button>

            {{-- Logout --}}
            <form method="POST" action="{{ route('student.logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-red-500 hover:bg-red-50 dark:hover:bg-red-900/20 transition">
                    <i data-lucide="log-out" class="w-5 h-5"></i>
                    <span class="sidebar-text font-medium">Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <main class="flex-1 min-w-0 overflow-auto">
        <header class="h-16 border-b border-gray-200 dark:border-gray-800 bg-white/50 dark:bg-[#111827]/50 backdrop-blur-md sticky top-0 z-30 px-8 flex items-center justify-between">
            <button class="md:hidden text-gray-500" id="mobileMenuBtn">
                <i data-lucide="menu"></i>
            </button>
            <div class="flex items-center gap-4 ml-auto">
                <div class="text-right hidden sm:block">
                    <p class="text-xs font-bold text-gray-900 dark:text-white">{{ session('student_name') }}</p>
                    <p class="text-[10px] text-gray-500">{{ session('student_email') }}</p>
                </div>
                <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-blue-600 to-indigo-600 border-2 border-white dark:border-gray-800 shadow-sm"></div>
            </div>
        </header>

        <div class="p-8">
            @yield('content')
        </div>
    </main>
</div>

<script>
    lucide.createIcons();

    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.getElementById('toggleSidebar');
    const texts = document.querySelectorAll('.sidebar-text');

    toggleBtn?.addEventListener('click', () => {
        sidebar.classList.toggle('md:w-64');
        sidebar.classList.toggle('md:w-20');
        texts.forEach(text => text.classList.toggle('hidden'));
        const icon = toggleBtn.querySelector('i');
        icon.setAttribute('data-lucide', sidebar.classList.contains('md:w-20') ? 'chevron-right' : 'chevron-left');
        lucide.createIcons();
    });

    function toggleDarkMode() {
        if (document.documentElement.classList.contains('dark')) {
            document.documentElement.classList.remove('dark');
            localStorage.theme = 'light';
        } else {
            document.documentElement.classList.add('dark');
            localStorage.theme = 'dark';
        }
    }
</script>
@stack('scripts')
</body>
</html>