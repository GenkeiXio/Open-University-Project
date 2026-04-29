<!DOCTYPE html>
<html lang="en" class="transition-colors duration-300">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Faculty Portal') | BUOU</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Prevent dark-mode flicker --}}
    <script>
        if (localStorage.theme === 'dark') {
            document.documentElement.classList.add('dark');
        }
    </script>

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = { darkMode: 'class' };
    </script>

    {{-- Lucide icons (single import) --}}
    <script src="https://unpkg.com/lucide@latest"></script>

    {{-- Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'DM Sans', sans-serif;
        }

        /* ── Sidebar collapsed state ── */
        #sidebar.collapsed {
            width: 68px !important;
        }

        #sidebar.collapsed .sidebar-text {
            display: none !important;
        }

        #sidebar.collapsed .sidebar-section-label {
            display: none !important;
        }

        #sidebar.collapsed .menu-item {
            justify-content: center;
            padding: 10px;
        }

        #sidebar.collapsed .logo-text {
            display: none !important;
        }

        #sidebar.collapsed .logo-icon {
            margin: 0 auto;
        }

        /* ── Mobile overlay ── */
        #sidebarOverlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, .5);
            z-index: 30;
            backdrop-filter: blur(2px);
        }

        #sidebarOverlay.active {
            display: block;
        }

        /* ── Scrollbar ── */
        ::-webkit-scrollbar {
            width: 5px;
            height: 5px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: #d1d5db;
            border-radius: 99px;
        }

        .dark ::-webkit-scrollbar-thumb {
            background: #374151;
        }

        /* ── Active nav item ── */
        .menu-item.active {
            background: #d1fae5;
            color: #059669;
            font-weight: 600;
        }

        .dark .menu-item.active {
            background: #064e3b;
            color: #34d399;
        }

        /* ── Tooltip for collapsed sidebar ── */
        .menu-item {
            position: relative;
        }

        #sidebar.collapsed .menu-item:hover::after {
            content: attr(data-label);
            position: absolute;
            left: calc(100% + 10px);
            top: 50%;
            transform: translateY(-50%);
            background: #1f2937;
            color: #f9fafb;
            font-size: .75rem;
            padding: 5px 10px;
            border-radius: 7px;
            white-space: nowrap;
            pointer-events: none;
            z-index: 999;
        }

        /* ── Page content fade-in ── */
        main {
            animation: pageFadeIn .3s ease;
        }

        @keyframes pageFadeIn {
            from {
                opacity: 0;
                transform: translateY(8px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body class="bg-gray-100 dark:bg-[#0b1120] text-gray-800 dark:text-gray-200 transition-colors duration-300">

    {{-- Mobile overlay --}}
    <div id="sidebarOverlay"></div>

    <div class="flex min-h-screen">

        {{-- ══════════════════════════════════════════
        SIDEBAR
        ══════════════════════════════════════════ --}}
        <aside id="sidebar" class="w-64 bg-white dark:bg-[#111827]
                   border-r border-gray-200 dark:border-gray-800
                   flex flex-col
                   fixed inset-y-0 left-0
                   z-40
                   -translate-x-full md:translate-x-0
                   transition-all duration-300">

            {{-- Toggle collapse button (desktop) --}}
            <button id="toggleSidebar" class="hidden md:flex absolute -right-3 top-[72px]
                       bg-white dark:bg-gray-800
                       border border-gray-200 dark:border-gray-700
                       rounded-full w-6 h-6 items-center justify-center
                       shadow-md hover:bg-emerald-50 dark:hover:bg-emerald-900
                       transition z-50">
                <i id="toggleIcon" data-lucide="chevron-left" class="w-3.5 h-3.5"></i>
            </button>

            {{-- Logo --}}
            <div class="flex items-center gap-3 px-5 py-5 border-b border-gray-100 dark:border-gray-800">
                <div class="logo-icon w-9 h-9 rounded-xl bg-emerald-500 text-white
                            flex items-center justify-center flex-shrink-0 shadow-sm">
                    <i data-lucide="graduation-cap" class="w-5 h-5"></i>
                </div>
                <div class="logo-text sidebar-text">
                    <span class="font-bold text-gray-800 dark:text-white text-base tracking-tight">BUOU</span>
                    <span class="block text-[10px] text-gray-400 uppercase tracking-widest">Faculty Portal</span>
                </div>
            </div>

            {{-- Navigation --}}
            <nav class="flex-1 px-3 py-4 overflow-y-auto space-y-5">

                {{-- Main --}}
                <div>
                    <p class="sidebar-section-label sidebar-text text-[10px] text-gray-400 uppercase
                               tracking-widest font-semibold px-2 mb-1.5">Main</p>

                    <a href="{{ route('Faculty.dashboard') }}" data-label="Dashboard" class="menu-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm
                              transition-all duration-150
                              {{ request()->routeIs('Faculty.dashboard')
    ? 'active'
    : 'text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800' }}">
                        <i data-lucide="layout-dashboard" class="w-4.5 h-4.5 flex-shrink-0"></i>
                        <span class="sidebar-text">Dashboard</span>
                    </a>

                    <a href="{{ route('Faculty.trainings') }}" data-label="Trainings" class="menu-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm
                              transition-all duration-150
                              {{ request()->routeIs('Faculty.trainings')
    ? 'active'
    : 'text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800' }}">
                        <i data-lucide="book-open" class="w-4.5 h-4.5 flex-shrink-0"></i>
                        <span class="sidebar-text">Trainings</span>
                    </a>

                    <a href="{{ route('Faculty.seminars') }}" data-label="Seminars" class="menu-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm
                              transition-all duration-150
                              {{ request()->routeIs('Faculty.seminars')
    ? 'active'
    : 'text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800' }}">
                        <i data-lucide="mic" class="w-4.5 h-4.5 flex-shrink-0"></i>
                        <span class="sidebar-text">Seminars</span>
                    </a>

                    <a href="{{ route('Faculty.tns') }}" data-label="TNS" class="menu-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm
                              transition-all duration-150
                              {{ request()->routeIs('Faculty.tns')
    ? 'active'
    : 'text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800' }}">
                        <i data-lucide="clipboard-list" class="w-4.5 h-4.5 flex-shrink-0"></i>
                        <span class="sidebar-text">TNA</span>
                    </a>

                    <a href="{{ route('Faculty.publications') }}" data-label="Publications" class="menu-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm
                              transition-all duration-150
                              {{ request()->routeIs('Faculty.publications')
    ? 'active'
    : 'text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800' }}">
                        <i data-lucide="newspaper" class="w-4.5 h-4.5 flex-shrink-0"></i>
                        <span class="sidebar-text">Publications</span>
                    </a>

                    <a href="{{ route('Faculty.presentations') }}" data-label="Presentations" class="menu-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm
                              transition-all duration-150
                              {{ request()->routeIs('Faculty.presentations')
    ? 'active'
    : 'text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800' }}">
                        <i data-lucide="presentation" class="w-4.5 h-4.5 flex-shrink-0"></i>
                        <span class="sidebar-text">Presentations</span>
                    </a>

                    <a href="{{ route('Faculty.reports') }}" data-label="Reports" class="menu-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm
                              transition-all duration-150
                              {{ request()->routeIs('Faculty.reports')
    ? 'active'
    : 'text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800' }}">
                        <i data-lucide="file-bar-chart" class="w-4.5 h-4.5 flex-shrink-0"></i>
                        <span class="sidebar-text">Reports</span>
                    </a>
                </div>

                {{-- Faculty --}}
                <div>
                    <p class="sidebar-section-label sidebar-text text-[10px] text-gray-400 uppercase
                               tracking-widest font-semibold px-2 mb-1.5">Faculty</p>

                    <a href="{{ route('Faculty.profile') }}" data-label="Profile" class="menu-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm
                              transition-all duration-150
                              {{ request()->routeIs('Faculty.profile')
    ? 'active'
    : 'text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800' }}">
                        <i data-lucide="user-circle" class="w-4.5 h-4.5 flex-shrink-0"></i>
                        <span class="sidebar-text">Profile</span>
                    </a>
                </div>

                {{-- System --}}
                <div>
                    <p class="sidebar-section-label sidebar-text text-[10px] text-gray-400 uppercase
                               tracking-widest font-semibold px-2 mb-1.5">System</p>

                    {{-- Dark mode toggle --}}
                    <div class="flex items-center justify-between px-3 py-2.5 rounded-xl
                                hover:bg-gray-100 dark:hover:bg-gray-800 transition cursor-pointer" id="themeRow">
                        <div class="flex items-center gap-3">
                            <i id="themeIcon" data-lucide="moon"
                                class="w-4.5 h-4.5 text-gray-500 dark:text-gray-400 flex-shrink-0"></i>
                            <span class="sidebar-text text-sm text-gray-600 dark:text-gray-400">Dark Mode</span>
                        </div>
                        <button id="themeToggle" class="relative w-10 h-5 bg-gray-300 dark:bg-emerald-500
                                       rounded-full transition-colors duration-300 flex-shrink-0">
                            <span id="toggleCircle" class="absolute left-0.5 top-0.5 w-4 h-4 bg-white rounded-full
                                         shadow transition-transform duration-300"></span>
                        </button>
                    </div>
                </div>

            </nav>

            {{-- Bottom actions --}}
            <div class="px-3 py-4 border-t border-gray-100 dark:border-gray-800 space-y-1">

                {{-- Admin-only: Return to Admin Dashboard --}}
                @if(session('admin_role') === 'admin')
                    <a href="{{ route('admin.dashboard') }}" data-label="Admin Dashboard"
                        class="menu-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm text-emerald-600 dark:text-emerald-400 hover:bg-emerald-50 dark:hover:bg-emerald-950 transition-all duration-150">
                        <i data-lucide="layout-dashboard" class="w-4.5 h-4.5 flex-shrink-0"></i>
                        <span class="sidebar-text font-medium">Admin Dashboard</span>
                    </a>
                @endif

                <a href="{{ route('home') }}" data-label="Back to Site" class="menu-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm
                          text-gray-600 dark:text-gray-400
                          hover:bg-gray-100 dark:hover:bg-gray-800 transition-all duration-150">
                    <i data-lucide="arrow-left" class="w-4.5 h-4.5 flex-shrink-0"></i>
                    <span class="sidebar-text">Back to Site</span>
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" data-label="Sign Out"
                        class="menu-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm
                               text-gray-600 dark:text-gray-400
                               hover:bg-red-50 dark:hover:bg-red-950
                               hover:text-red-500 dark:hover:text-red-400 transition-all duration-150 w-full text-left">

                        <i data-lucide="log-out" class="w-4.5 h-4.5 flex-shrink-0"></i>
                        <span class="sidebar-text">Sign Out</span>
                    </button>
                </form>

            </div>

        </aside>

        {{-- ══════════════════════════════════════════
        TOPBAR (mobile only)
        ══════════════════════════════════════════ --}}
        <div class="fixed top-0 left-0 right-0 h-14 bg-white dark:bg-[#111827]
                    border-b border-gray-200 dark:border-gray-800
                    flex items-center justify-between px-4 z-30 md:hidden shadow-sm">

            <button id="mobileMenuBtn" class="p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                <i data-lucide="menu" class="w-5 h-5"></i>
            </button>

            <span class="font-bold text-gray-800 dark:text-white">BUOU Faculty</span>

            <div class="w-9 h-9 rounded-xl bg-emerald-500 text-white
                        flex items-center justify-center font-bold text-sm">
                {{ strtoupper(substr(session('admin_name') ?? 'F', 0, 1)) }}
            </div>

        </div>

        {{-- ══════════════════════════════════════════
        PAGE CONTENT
        ══════════════════════════════════════════ --}}
        <main class="flex-1 md:ml-64 p-6 md:p-8 pt-20 md:pt-8 transition-all duration-300" id="mainContent">
            @yield('content')
        </main>

    </div>

    <script>
        lucide.createIcons();

        /* ── Sidebar collapse (desktop) ──────────────── */
        const sidebar = document.getElementById('sidebar');
        const toggleBtn = document.getElementById('toggleSidebar');
        const toggleIcon = document.getElementById('toggleIcon');
        const mainContent = document.getElementById('mainContent');
        let collapsed = localStorage.getItem('sidebarCollapsed') === 'true';

        function applySidebar() {
            if (collapsed) {
                sidebar.classList.add('collapsed');
                mainContent.classList.replace('md:ml-64', 'md:ml-[68px]');
                toggleIcon.setAttribute('data-lucide', 'chevron-right');
            } else {
                sidebar.classList.remove('collapsed');
                if (!mainContent.classList.contains('md:ml-64')) {
                    mainContent.classList.replace('md:ml-[68px]', 'md:ml-64');
                }
                toggleIcon.setAttribute('data-lucide', 'chevron-left');
            }
            lucide.createIcons();
        }

        applySidebar();

        toggleBtn.addEventListener('click', () => {
            collapsed = !collapsed;
            localStorage.setItem('sidebarCollapsed', collapsed);
            applySidebar();
        });

        /* ── Mobile menu ─────────────────────────────── */
        const mobileBtn = document.getElementById('mobileMenuBtn');
        const overlay = document.getElementById('sidebarOverlay');

        function openMobileSidebar() {
            sidebar.classList.remove('-translate-x-full');
            overlay.classList.add('active');
        }

        function closeMobileSidebar() {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.remove('active');
        }

        mobileBtn.addEventListener('click', openMobileSidebar);
        overlay.addEventListener('click', closeMobileSidebar);

        /* ── Dark mode ───────────────────────────────── */
        const toggle = document.getElementById('themeToggle');
        const circle = document.getElementById('toggleCircle');
        const html = document.documentElement;
        const themeIcon = document.getElementById('themeIcon');

        function setTheme(mode) {
            if (mode === 'dark') {
                html.classList.add('dark');
                circle.style.transform = 'translateX(20px)';
                themeIcon.setAttribute('data-lucide', 'sun');
            } else {
                html.classList.remove('dark');
                circle.style.transform = 'translateX(0)';
                themeIcon.setAttribute('data-lucide', 'moon');
            }
            lucide.createIcons();
            localStorage.theme = mode;
        }

        setTheme(localStorage.theme === 'dark' ? 'dark' : 'light');

        toggle.addEventListener('click', () => {
            setTheme(html.classList.contains('dark') ? 'light' : 'dark');
        });

        /* Click the theme row also toggles */
        document.getElementById('themeRow').addEventListener('click', (e) => {
            if (e.target !== toggle && !toggle.contains(e.target)) {
                setTheme(html.classList.contains('dark') ? 'light' : 'dark');
            }
        });
    </script>

    @stack('scripts')

</body>

</html>