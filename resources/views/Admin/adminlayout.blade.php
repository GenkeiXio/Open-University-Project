<!DOCTYPE html>
<html lang="en" class="transition-colors duration-300">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin')</title>
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
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Lucide -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
</head>

<body
    class="bg-gray-100 dark:bg-[#0b1120] text-gray-800 dark:text-gray-200 font-[Inter] transition-colors duration-300">
    <div class="flex min-h-screen">

        <!-- ================= SIDEBAR ================= -->
        <aside id="sidebar" class="w-64 md:w-64 bg-white dark:bg-[#111827]
                border-r border-gray-200 dark:border-gray-800
                flex flex-col transition-all duration-300
                fixed md:sticky md:top-0 h-screen
                z-40 -translate-x-full md:translate-x-0">

            <!-- Toggle Button -->
            <button id="toggleSidebar" class="hidden md:flex absolute -right-3 top-6 bg-white dark:bg-gray-800
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
                    BICOL UNIVERSITY
                </span>
            </div>

            <!-- MENU -->
            <nav class="flex-1 px-4 space-y-1 text-sm overflow-y-auto py-2">

                {{-- MAIN --}}
                <div x-data="{ open: true }">
                    <button @click="open = !open" class="sidebar-text w-full flex items-center justify-between text-xs font-bold uppercase tracking-widest
                               px-3 py-2 rounded-lg mb-1
                               text-gray-500 dark:text-gray-400
                               hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                        <span>Main</span>
                        <i :data-lucide="open ? 'chevron-down' : 'chevron-right'" class="w-3.5 h-3.5"></i>
                    </button>
                    <div x-show="open" x-transition class="pl-1 space-y-0.5 mb-2">
                        <a href="{{ route('admin.dashboard') }}"
                            class="menu-item flex items-center gap-3 px-3 py-2 rounded-lg transition
                            {{ request()->routeIs('admin.dashboard') ? 'bg-emerald-100 dark:bg-emerald-900 text-emerald-600 dark:text-emerald-400 font-medium' : 'hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-600 dark:text-gray-300' }}">
                            <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
                            <span class="sidebar-text">Dashboard</span>
                        </a>
                        <a href="{{ route('admin.news.index') }}"
                            class="menu-item flex items-center gap-3 px-3 py-2 rounded-lg transition
                            {{ request()->routeIs('admin.news.index') ? 'bg-emerald-100 dark:bg-emerald-900 text-emerald-600 dark:text-emerald-400 font-medium' : 'hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-600 dark:text-gray-300' }}">
                            <i data-lucide="newspaper" class="w-4 h-4"></i>
                            <span class="sidebar-text">News</span>
                        </a>
                    </div>
                </div>

                {{-- ADMIN --}}
                <div x-data="{ open: true }">
                    <button @click="open = !open" class="sidebar-text w-full flex items-center justify-between text-xs font-bold uppercase tracking-widest
                               px-3 py-2 rounded-lg mb-1
                               text-gray-500 dark:text-gray-400
                               hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                        <span>Admin</span>
                        <i :data-lucide="open ? 'chevron-down' : 'chevron-right'" class="w-3.5 h-3.5"></i>
                    </button>
                    <div x-show="open" x-transition class="pl-1 space-y-0.5 mb-2">
                        <a href="{{ route('admin.user_management') }}"
                            class="menu-item flex items-center gap-3 px-3 py-2 rounded-lg transition
                            {{ request()->routeIs('admin.user_management') ? 'bg-emerald-100 dark:bg-emerald-900 text-emerald-600 dark:text-emerald-400 font-medium' : 'hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-600 dark:text-gray-300' }}">
                            <i data-lucide="users" class="w-4 h-4"></i>
                            <span class="sidebar-text">User Management</span>
                        </a>
                        <a href="{{ route('admin.pending') }}"
                            class="menu-item flex items-center gap-3 px-3 py-2 rounded-lg transition
                            {{ request()->routeIs('admin.pending') ? 'bg-emerald-100 dark:bg-emerald-900 text-emerald-600 dark:text-emerald-400 font-medium' : 'hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-600 dark:text-gray-300' }}">
                            <i data-lucide="user-check" class="w-4 h-4"></i>
                            <span class="sidebar-text">User Approvals</span>
                        </a>
                        <a href="{{ route('admin.logs') }}"
                            class="menu-item flex items-center gap-3 px-3 py-2 rounded-lg transition
                            {{ request()->routeIs('admin.logs') ? 'bg-emerald-100 dark:bg-emerald-900 text-emerald-600 dark:text-emerald-400 font-medium' : 'hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-600 dark:text-gray-300' }}">
                            <i data-lucide="scroll-text" class="w-4 h-4"></i>
                            <span class="sidebar-text">Activity Logs</span>
                        </a>

                        {{-- ── NEW: Permissions ── --}}
                        <a href="{{ route('admin.permissions') }}"
                            class="menu-item flex items-center gap-3 px-3 py-2 rounded-lg transition
                            {{ request()->routeIs('admin.permissions') ? 'bg-emerald-100 dark:bg-emerald-900 text-emerald-600 dark:text-emerald-400 font-medium' : 'hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-600 dark:text-gray-300' }}">
                            <i data-lucide="shield-check" class="w-4 h-4"></i>
                            <span class="sidebar-text">Permissions</span>
                            {{-- Badge: shows count of staff/faculty with no permissions set --}}
                            @if(isset($pendingPermissionsCount) && $pendingPermissionsCount > 0)
                                <span class="sidebar-text ml-auto text-[10px] font-bold px-1.5 py-0.5 rounded-full
                                             bg-amber-100 dark:bg-amber-900/40 text-amber-600 dark:text-amber-400">
                                    {{ $pendingPermissionsCount }}
                                </span>
                            @endif
                        </a>
                    </div>
                </div>

                {{-- STUDENTS --}}
                <div x-data="{ open: true }">
                    <button @click="open = !open" class="sidebar-text w-full flex items-center justify-between text-xs font-bold uppercase tracking-widest
                               px-3 py-2 rounded-lg mb-1
                               text-gray-500 dark:text-gray-400
                               hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                        <span>Students</span>
                        <i :data-lucide="open ? 'chevron-down' : 'chevron-right'" class="w-3.5 h-3.5"></i>
                    </button>
                    <div x-show="open" x-transition class="pl-1 space-y-0.5 mb-2">
                        <a href="{{ route('admin.students.index') }}"
                            class="menu-item flex items-center gap-3 px-3 py-2 rounded-lg transition
                            {{ request()->routeIs('admin.students.index') ? 'bg-emerald-100 dark:bg-emerald-900 text-emerald-600 dark:text-emerald-400 font-medium' : 'hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-600 dark:text-gray-300' }}">
                            <i data-lucide="users" class="w-4 h-4"></i>
                            <span class="sidebar-text">Student Management</span>
                        </a>
                        <a href="{{ route('admin.pending-students.index') }}"
                            class="menu-item flex items-center gap-3 px-3 py-2 rounded-lg transition
                            {{ request()->routeIs('admin.pending-students.index') ? 'bg-emerald-100 dark:bg-emerald-900 text-emerald-600 dark:text-emerald-400 font-medium' : 'hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-600 dark:text-gray-300' }}">
                            <i data-lucide="graduation-cap" class="w-4 h-4"></i>
                            <span class="sidebar-text">Student Approvals</span>
                        </a>
                    </div>
                </div>

                {{-- MODULES --}}
                <div x-data="{ open: true }">
                    <button @click="open = !open" class="sidebar-text w-full flex items-center justify-between text-xs font-bold uppercase tracking-widest
                               px-3 py-2 rounded-lg mb-1
                               text-gray-500 dark:text-gray-400
                               hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                        <span>Modules</span>
                        <i :data-lucide="open ? 'chevron-down' : 'chevron-right'" class="w-3.5 h-3.5"></i>
                    </button>
                    <div x-show="open" x-transition class="pl-1 space-y-0.5 mb-2">
                        <a href="{{ route('admin.faculty.dashboard') }}"
                            class="menu-item flex items-center gap-3 px-3 py-2 rounded-lg transition
                            {{ request()->routeIs('admin.faculty.*') ? 'bg-emerald-100 dark:bg-emerald-900 text-emerald-600 dark:text-emerald-400 font-medium' : 'hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-600 dark:text-gray-300' }}">
                            <i data-lucide="book-open" class="w-4 h-4"></i>
                            <span class="sidebar-text">Faculty Module</span>
                        </a>
                        <a href="{{ route('admin.thesis') }}"
                            class="menu-item flex items-center gap-3 px-3 py-2 rounded-lg transition
                            {{ request()->routeIs('admin.thesis') ? 'bg-emerald-100 dark:bg-emerald-900 text-emerald-600 dark:text-emerald-400 font-medium' : 'hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-600 dark:text-gray-300' }}">
                            <i data-lucide="scroll-text" class="w-4 h-4"></i>
                            <span class="sidebar-text">Thesis Dissertation</span>
                        </a>
                        <a href="{{ route('admin.office') }}"
                            class="menu-item flex items-center gap-3 px-3 py-2 rounded-lg transition
                            {{ request()->routeIs('admin.office') ? 'bg-emerald-100 dark:bg-emerald-900 text-emerald-600 dark:text-emerald-400 font-medium' : 'hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-600 dark:text-gray-300' }}">
                            <i data-lucide="file-text" class="w-4 h-4"></i>
                            <span class="sidebar-text">Office Transaction</span>
                        </a>
                    </div>
                </div>

                {{-- SYSTEM --}}
                <div x-data="{ open: true }">
                    <button @click="open = !open" class="sidebar-text w-full flex items-center justify-between text-xs font-bold uppercase tracking-widest
                               px-3 py-2 rounded-lg mb-1
                               text-gray-500 dark:text-gray-400
                               hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                        <span>System</span>
                        <i :data-lucide="open ? 'chevron-down' : 'chevron-right'" class="w-3.5 h-3.5"></i>
                    </button>
                    <div x-show="open" x-transition class="pl-1 space-y-0.5 mb-2">
                        <div
                            class="flex items-center justify-between px-3 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                            <div class="flex items-center gap-3 text-gray-600 dark:text-gray-300">
                                <i id="themeIcon" data-lucide="moon" class="w-4 h-4"></i>
                                <span class="sidebar-text">Dark Mode</span>
                            </div>
                            <button id="themeToggle"
                                class="relative w-11 h-6 bg-gray-300 dark:bg-emerald-500 rounded-full transition">
                                <span id="toggleCircle"
                                    class="absolute left-1 top-1 w-4 h-4 bg-white rounded-full transition"></span>
                            </button>
                        </div>
                    </div>
                </div>

            </nav>

            <!-- Bottom -->
            <div class="px-4 py-4 border-t border-gray-200 dark:border-gray-800 space-y-3 text-sm">
                <a href="{{ route('home') }}"
                    class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-600 dark:text-gray-300 transition">
                    <i data-lucide="arrow-left" class="w-5 h-5"></i>
                    <span class="sidebar-text">Back to Site</span>
                </a>

                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-red-50 dark:hover:bg-red-900 text-gray-600 dark:text-gray-300 hover:text-red-500 transition">
                    <i data-lucide="log-out" class="w-5 h-5"></i>
                    <span class="sidebar-text">Sign Out</span>
                </a>
                <form id="logout-form" method="POST" action="{{ route('logout') }}" class="hidden">
                    @csrf
                </form>
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

        function setTheme(mode) {
            if (mode === 'dark') {
                html.classList.add('dark');
                circle.style.transform = "translateX(20px)";
                icon.setAttribute("data-lucide", "sun");
            } else {
                html.classList.remove('dark');
                circle.style.transform = "translateX(0px)";
                icon.setAttribute("data-lucide", "moon");
            }

            lucide.createIcons();
            localStorage.theme = mode;
        }

        /* LOAD SAVED THEME */
        if (localStorage.theme === 'dark') {
            setTheme('dark');
        } else {
            setTheme('light');
        }

        /* TOGGLE */
        toggle.addEventListener('click', () => {
            if (html.classList.contains('dark')) {
                setTheme('light');
            } else {
                setTheme('dark');
            }
        });
    </script>

    @stack('scripts')

</body>

</html>