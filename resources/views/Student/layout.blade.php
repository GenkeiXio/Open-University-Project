<!DOCTYPE html>
<html lang="en" class="transition-colors duration-300">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Student Portal') | BUOU</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        if (localStorage.theme === 'dark') {
            document.documentElement.classList.add('dark');
        }
    </script>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>tailwind.config = { darkMode: 'class' };</script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'DM Sans', sans-serif; }

        #sidebar.collapsed { width: 68px !important; }
        #sidebar.collapsed .sidebar-text { display: none !important; }
        #sidebar.collapsed .sidebar-section-label { display: none !important; }
        #sidebar.collapsed .menu-item { justify-content: center; padding: 10px; }
        #sidebar.collapsed .logo-text { display: none !important; }
        #sidebar.collapsed .logo-icon { margin: 0 auto; }
        #sidebar.collapsed .submenu { display: none !important; }
        #sidebar.collapsed .chevron { display: none !important; }

        #sidebarOverlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,.5);
            z-index: 30;
            backdrop-filter: blur(2px);
        }
        #sidebarOverlay.active { display: block; }

        ::-webkit-scrollbar { width: 5px; height: 5px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #d1d5db; border-radius: 99px; }
        .dark ::-webkit-scrollbar-thumb { background: #374151; }

        .menu-item.active { background: #dbeafe; color: #2563eb; font-weight: 600; }
        .dark .menu-item.active { background: #1e3a5f; color: #60a5fa; }

        .menu-item { position: relative; }
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

        /* Submenu animation */
        .submenu {
            overflow: hidden;
            transition: max-height 0.25s ease, opacity 0.2s ease;
            max-height: 0;
            opacity: 0;
        }
        .submenu.open {
            max-height: 200px;
            opacity: 1;
        }

        /* Chevron rotation */
        .chevron {
            transition: transform 0.25s ease;
        }
        .chevron.open {
            transform: rotate(180deg);
        }

        main { animation: pageFadeIn .3s ease; }
        @keyframes pageFadeIn {
            from { opacity: 0; transform: translateY(8px); }
            to   { opacity: 1; transform: translateY(0); }
        }
    </style>

    @stack('styles')
</head>

<body class="bg-gray-100 dark:bg-[#0b1120] text-gray-800 dark:text-gray-200 transition-colors duration-300">

    <div id="sidebarOverlay"></div>

    <div class="flex min-h-screen">

        {{-- ═══════════════════════════
        SIDEBAR
        ═══════════════════════════ --}}
        <aside id="sidebar"
            class="w-64 bg-white dark:bg-[#111827]
                   border-r border-gray-200 dark:border-gray-800
                   flex flex-col fixed inset-y-0 left-0 z-40
                   -translate-x-full md:translate-x-0
                   transition-all duration-300">

            <button id="toggleSidebar"
                class="hidden md:flex absolute -right-3 top-[72px]
                       bg-white dark:bg-gray-800
                       border border-gray-200 dark:border-gray-700
                       rounded-full w-6 h-6 items-center justify-center
                       shadow-md hover:bg-blue-50 dark:hover:bg-blue-900
                       transition z-50">
                <i id="toggleIcon" data-lucide="chevron-left" class="w-3.5 h-3.5"></i>
            </button>

            {{-- Logo --}}
            <div class="flex items-center gap-3 px-5 py-5 border-b border-gray-100 dark:border-gray-800">
                <div class="logo-icon w-9 h-9 rounded-xl bg-blue-600 text-white
                            flex items-center justify-center flex-shrink-0 shadow-sm">
                    <i data-lucide="graduation-cap" class="w-5 h-5"></i>
                </div>
                <div class="logo-text sidebar-text">
                    <span class="font-bold text-gray-800 dark:text-white text-base tracking-tight">BUOU</span>
                    <span class="block text-[10px] text-gray-400 uppercase tracking-widest">Student Portal</span>
                </div>
            </div>

            {{-- Navigation --}}
            <nav class="flex-1 px-3 py-4 overflow-y-auto space-y-1">

                <p class="sidebar-section-label sidebar-text text-[10px] text-gray-400 uppercase
                           tracking-widest font-semibold px-2 pb-1.5">Student</p>

                {{-- Profile --}}
                <a href="#" data-label="Profile"
                    class="menu-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm
                           transition-all duration-150
                           {{ request()->routeIs('student.profile') ? 'active' : 'text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800' }}">
                    <i data-lucide="user-circle" class="w-4 h-4 flex-shrink-0"></i>
                    <span class="sidebar-text">Profile</span>
                </a>

                {{-- Requests (collapsible) --}}
                <div>
                    <button id="requestsToggle" data-label="Requests"
                        class="menu-item w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm
                               transition-all duration-150
                               {{ request()->routeIs('student.dashboard') || request()->routeIs('student.appointments')
                                   ? 'active'
                                   : 'text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800' }}">
                        <i data-lucide="clipboard-list" class="w-4 h-4 flex-shrink-0"></i>
                        <span class="sidebar-text flex-1 text-left">Requests</span>
                        <i data-lucide="chevron-down"
                           class="chevron w-3.5 h-3.5 flex-shrink-0 sidebar-text
                                  {{ request()->routeIs('student.dashboard') || request()->routeIs('student.appointments') ? 'open' : '' }}">
                        </i>
                    </button>

                    {{-- Subtabs --}}
                    <div id="requestsSubmenu"
                         class="submenu pl-4 mt-0.5 space-y-0.5
                                {{ request()->routeIs('student.dashboard') || request()->routeIs('student.appointments') ? 'open' : '' }}">

                        <a href="{{ route('student.dashboard') }}" data-label="My Requests"
                            class="menu-item flex items-center gap-3 px-3 py-2 rounded-xl text-sm
                                   transition-all duration-150
                                   {{ request()->routeIs('student.dashboard') ? 'active' : 'text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800' }}">
                            <i data-lucide="file-text" class="w-3.5 h-3.5 flex-shrink-0"></i>
                            <span class="sidebar-text">My Requests</span>
                        </a>

                        <a href="#" data-label="Appointments"
                            class="menu-item flex items-center gap-3 px-3 py-2 rounded-xl text-sm
                                   transition-all duration-150
                                   {{ request()->routeIs('student.appointments') ? 'active' : 'text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800' }}">
                            <i data-lucide="calendar" class="w-3.5 h-3.5 flex-shrink-0"></i>
                            <span class="sidebar-text">Appointments</span>
                        </a>

                    </div>
                </div>

                {{-- Theses & Dissertation --}}
                <a href="#" data-label="Theses & Dissertation"
                    class="menu-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm
                           transition-all duration-150
                           {{ request()->routeIs('student.theses') ? 'active' : 'text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800' }}">
                    <i data-lucide="book-marked" class="w-4 h-4 flex-shrink-0"></i>
                    <span class="sidebar-text">Theses & Dissertation</span>
                </a>

                {{-- Chat --}}
                <a href="#" data-label="Chat"
                    class="menu-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm
                           transition-all duration-150
                           {{ request()->routeIs('student.chat') ? 'active' : 'text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800' }}">
                    <i data-lucide="message-square" class="w-4 h-4 flex-shrink-0"></i>
                    <span class="sidebar-text">Chat</span>
                </a>

                {{-- System --}}
                <div class="pt-3">
                    <p class="sidebar-section-label sidebar-text text-[10px] text-gray-400 uppercase
                               tracking-widest font-semibold px-2 pb-1.5">System</p>

                    <div class="flex items-center justify-between px-3 py-2.5 rounded-xl
                                hover:bg-gray-100 dark:hover:bg-gray-800 transition cursor-pointer"
                         id="themeRow">
                        <div class="flex items-center gap-3">
                            <i id="themeIcon" data-lucide="moon"
                                class="w-4 h-4 text-gray-500 dark:text-gray-400 flex-shrink-0"></i>
                            <span class="sidebar-text text-sm text-gray-600 dark:text-gray-400">Dark Mode</span>
                        </div>
                        <button id="themeToggle"
                            class="relative w-10 h-5 bg-gray-300 dark:bg-blue-500
                                   rounded-full transition-colors duration-300 flex-shrink-0">
                            <span id="toggleCircle"
                                class="absolute left-0.5 top-0.5 w-4 h-4 bg-white rounded-full
                                       shadow transition-transform duration-300"></span>
                        </button>
                    </div>
                </div>

            </nav>

            {{-- Bottom actions --}}
            <div class="px-3 py-4 border-t border-gray-100 dark:border-gray-800 space-y-1">
                <a href="{{ route('home') }}" data-label="Back to Site"
                    class="menu-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm
                           text-gray-600 dark:text-gray-400
                           hover:bg-gray-100 dark:hover:bg-gray-800 transition-all duration-150">
                    <i data-lucide="arrow-left" class="w-4 h-4 flex-shrink-0"></i>
                    <span class="sidebar-text">Back to Site</span>
                </a>

                <form method="POST" action="{{ route('student.logout') }}">
                    @csrf
                    <button type="submit" data-label="Sign Out"
                        class="menu-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm
                               text-gray-600 dark:text-gray-400
                               hover:bg-red-50 dark:hover:bg-red-950
                               hover:text-red-500 dark:hover:text-red-400
                               transition-all duration-150 w-full text-left">
                        <i data-lucide="log-out" class="w-4 h-4 flex-shrink-0"></i>
                        <span class="sidebar-text">Sign Out</span>
                    </button>
                </form>
            </div>

        </aside>

        {{-- Mobile topbar --}}
        <div class="fixed top-0 left-0 right-0 h-14 bg-white dark:bg-[#111827]
                    border-b border-gray-200 dark:border-gray-800
                    flex items-center justify-between px-4 z-30 md:hidden shadow-sm">
            <button id="mobileMenuBtn"
                class="p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                <i data-lucide="menu" class="w-5 h-5"></i>
            </button>
            <span class="font-bold text-gray-800 dark:text-white">BUOU Student</span>
            <div class="w-9 h-9 rounded-xl bg-blue-600 text-white
                        flex items-center justify-center font-bold text-sm">
                {{ strtoupper(substr(session('student_name') ?? 'S', 0, 1)) }}
            </div>
        </div>

        {{-- PAGE CONTENT --}}
        <main class="flex-1 md:ml-64 p-6 md:p-8 pt-20 md:pt-8 transition-all duration-300" id="mainContent">
            @yield('content')
        </main>

    </div>

    <script>
        lucide.createIcons();

        /* ── Sidebar collapse ── */
        const sidebar     = document.getElementById('sidebar');
        const toggleBtn   = document.getElementById('toggleSidebar');
        const toggleIcon  = document.getElementById('toggleIcon');
        const mainContent = document.getElementById('mainContent');
        let collapsed = localStorage.getItem('studentSidebarCollapsed') === 'true';

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
            localStorage.setItem('studentSidebarCollapsed', collapsed);
            applySidebar();
        });

        /* ── Mobile menu ── */
        document.getElementById('mobileMenuBtn').addEventListener('click', () => {
            sidebar.classList.remove('-translate-x-full');
            document.getElementById('sidebarOverlay').classList.add('active');
        });
        document.getElementById('sidebarOverlay').addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            document.getElementById('sidebarOverlay').classList.remove('active');
        });

        /* ── Requests submenu toggle ── */
        const requestsToggle  = document.getElementById('requestsToggle');
        const requestsSubmenu = document.getElementById('requestsSubmenu');
        const chevron         = requestsToggle.querySelector('.chevron');

        requestsToggle.addEventListener('click', () => {
            const isOpen = requestsSubmenu.classList.contains('open');
            requestsSubmenu.classList.toggle('open', !isOpen);
            chevron.classList.toggle('open', !isOpen);
        });

        /* ── Dark mode ── */
        const toggle    = document.getElementById('themeToggle');
        const circle    = document.getElementById('toggleCircle');
        const html      = document.documentElement;
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

        document.getElementById('themeRow').addEventListener('click', (e) => {
            if (e.target !== toggle && !toggle.contains(e.target)) {
                setTheme(html.classList.contains('dark') ? 'light' : 'dark');
            }
        });
    </script>

    @stack('scripts')
</body>
</html>