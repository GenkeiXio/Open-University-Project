<!DOCTYPE html>
<html lang="en" class="transition-colors duration-300">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Super Admin')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Prevent dark mode flicker -->
    <script>
        if (localStorage.theme === 'dark') {
            document.documentElement.classList.add('dark');
        }
    </script>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        tailwind.config = { darkMode: 'class' };
    </script>

    <!-- Lucide -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
</head>
    <body class="bg-gray-100 dark:bg-[#0b1120] text-gray-800 dark:text-gray-200 font-[Inter] transition-colors duration-300">
        <div class="flex min-h-screen">

            <!-- ================= SIDEBAR ================= -->
            <aside id="sidebar"
                class="w-64 md:w-64 bg-white dark:bg-[#111827]
                border-r border-gray-200 dark:border-gray-800
                flex flex-col transition-all duration-300
                fixed md:relative h-full md:h-auto
                z-40 -translate-x-full md:translate-x-0">

                <!-- Toggle Button -->
                <button id="toggleSidebar"
                    class="hidden md:flex absolute -right-3 top-6 bg-white dark:bg-gray-800
                    border border-gray-200 dark:border-gray-700
                    rounded-full p-1 shadow-md hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                    <i data-lucide="chevron-left" class="w-4 h-4"></i>
                </button>

                <!-- Logo -->
                <div class="flex items-center gap-3 px-6 py-6">
                    <div class="w-10 h-10 rounded-lg bg-emerald-100 text-emerald-600 flex items-center justify-center">
                        <i data-lucide="layout-dashboard"></i>
                    </div>
                    <span class="sidebar-text font-semibold text-gray-700 dark:text-gray-200 text-lg">
                        BUOU
                    </span>
                </div>

                <!-- MENU -->
                <nav class="flex-1 px-4 space-y-6 text-sm">

                    <div>
                        <p class="sidebar-text text-xs text-gray-400 uppercase mb-2">Main</p>

                        <a href="{{ route('Super-Admin.super_admin') }}"
                            class="menu-item flex items-center gap-3 px-3 py-2 rounded-lg transition
                            {{ request()->routeIs('Super-Admin.super_admin') ? 'bg-emerald-100 dark:bg-emerald-900 text-emerald-600 dark:text-emerald-400 font-medium' : 'hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-600 dark:text-gray-300' }}">
                            <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
                            <span class="sidebar-text">Dashboard</span>
                        </a>

                <a href="{{ route('admin.news.index') }}"
                    class="menu-item flex items-center gap-3 px-3 py-2 rounded-lg transition
                    {{ request()->routeIs('admin.news.index') ? 'bg-emerald-100 dark:bg-emerald-900 text-emerald-600 dark:text-emerald-400 font-medium' : 'hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-600 dark:text-gray-300' }}">
                    <i data-lucide="newspaper" class="w-5 h-5"></i>
                    <span class="sidebar-text">News</span>
                </a>

                        <a href="#" class="menu-item flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-600 dark:text-gray-300 transition">
                            <i data-lucide="graduation-cap" class="w-5 h-5"></i>
                            <span class="sidebar-text">Programs</span>
                        </a>

                        <a href="#" class="menu-item flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-600 dark:text-gray-300 transition">
                            <i data-lucide="bot" class="w-5 h-5"></i>
                            <span class="sidebar-text">Chatbot</span>
                        </a>
                    </div>

                    <div>
                        <p class="sidebar-text text-xs text-gray-400 uppercase mb-2">Super Admin</p>

                        <a href="{{ route('Super-Admin.user_management') }}" class="menu-item flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-600 dark:text-gray-300 transition">
                            <i data-lucide="users" class="w-5 h-5"></i>
                            <span class="sidebar-text">User Management</span>
                        </a>
                    </div>

                    <div>
                        <p class="sidebar-text text-xs text-gray-400 uppercase mb-2">System</p>

                        <!-- THEME SWITCH -->
                        <div class="flex items-center justify-between px-3 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                            <div class="flex items-center gap-3">
                                <i id="themeIcon" data-lucide="moon" class="w-5 h-5"></i>
                                <span class="sidebar-text">Dark Mode</span>
                            </div>
                            <button id="themeToggle" class="relative w-11 h-6 bg-gray-300 dark:bg-emerald-500 rounded-full transition">
                                <span id="toggleCircle" class="absolute left-1 top-1 w-4 h-4 bg-white rounded-full transition"></span>
                            </button>
                        </div>

                        <a href="#" class="menu-item flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-600 dark:text-gray-300 transition">
                            <i data-lucide="settings" class="w-5 h-5"></i>
                            <span class="sidebar-text">Site Settings</span>
                        </a>
                    </div>
                </nav>

                <!-- Bottom -->
                <div class="px-4 py-4 border-t border-gray-200 dark:border-gray-800 space-y-3 text-sm">
                    <a href="{{ route('home') }}"
                        class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-600 dark:text-gray-300 transition">
                        <i data-lucide="arrow-left" class="w-5 h-5"></i>
                        <span class="sidebar-text">Back to Site</span>
                    </a>

                    <a href="{{ route('logout') }}"
                        class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-red-50 dark:hover:bg-red-900 text-gray-600 dark:text-gray-300 hover:text-red-500 transition">
                        <i data-lucide="log-out" class="w-5 h-5"></i>
                        <span class="sidebar-text">Sign Out</span>
                    </a>
                </div>
            </aside>

            <!-- PAGE CONTENT -->
            <main class="flex-1 p-8 md:ml-0">
                @yield('content')
            </main>
        </div>

        <script>
            lucide.createIcons();

            /* SIDEBAR COLLAPSE */
            const sidebar = document.getElementById('sidebar');
            const toggleBtn = document.getElementById('toggleSidebar');
            const texts = document.querySelectorAll('.sidebar-text');

            toggleBtn.addEventListener('click', () => {
                sidebar.classList.toggle('md:w-64');
                sidebar.classList.toggle('md:w-20');

                texts.forEach(text => text.classList.toggle('hidden'));

                const icon = toggleBtn.querySelector('i');
                icon.setAttribute(
                    'data-lucide',
                    sidebar.classList.contains('md:w-20') ? 'chevron-right' : 'chevron-left'
                );

                lucide.createIcons();
            });

            /* ================= THEME TOGGLE ================= */
            const toggle = document.getElementById('themeToggle');
            const circle = document.getElementById('toggleCircle');
            const html = document.documentElement;
            const icon = document.getElementById('themeIcon');

                function setTheme(mode){
                    if(mode === 'dark'){
                        html.classList.add('dark');
                        circle.style.transform = "translateX(20px)";
                        icon.setAttribute("data-lucide","sun");
                    }else{
                        html.classList.remove('dark');
                        circle.style.transform = "translateX(0px)";
                        icon.setAttribute("data-lucide","moon");
                    }

                    lucide.createIcons();
                    localStorage.theme = mode;
                }

                /* LOAD SAVED THEME */
                if(localStorage.theme === 'dark'){
                    setTheme('dark');
                }else{
                    setTheme('light');
                }

                /* TOGGLE */
                toggle.addEventListener('click', () => {
                    if(html.classList.contains('dark')){
                        setTheme('light');
                    }else{
                        setTheme('dark');
                    }
                });
        </script>

@stack('scripts')

    </body>
</html>