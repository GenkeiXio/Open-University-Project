<!DOCTYPE html>
<html lang="en" class="transition-colors duration-300">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Super Admin')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = { darkMode: 'class' }
    </script>

    <!-- Lucide -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Inter:wght@400;500&display=swap" rel="stylesheet">
</head>

<body class="bg-gray-100 dark:bg-[#0b1120] text-gray-800 dark:text-gray-200 font-[Inter] transition-colors duration-300">

<div class="flex min-h-screen">

    <!-- ================= SIDEBAR ================= -->
    <aside id="sidebar" class="w-64 bg-gradient-to-b from-[#2f8fa6] to-[#2b7e94] text-white flex flex-col justify-between p-6">
        <div>
            <div class="flex items-center gap-3 mb-8">
                <div class="w-11 h-11 rounded-full bg-white/20 flex items-center justify-center font-bold">
                    BU
                </div>
                <div>
                    <h3 class="font-semibold text-sm">BUOU Admin</h3>
                    <span class="text-xs opacity-80">Super Admin</span>
                </div>
            </div>
        
            <nav class="space-y-2 text-sm">

                <a href="{{ route('Super-Admin.super_admin') }}"
                class="flex items-center gap-3 px-3 py-2 rounded-lg transition
                {{ request()->routeIs('Super-Admin.super_admin') ? 'bg-white/25' : 'hover:bg-white/20' }}">
                    <i data-lucide="layout-dashboard"></i> Dashboard
                </a>

                <a href="#"
                class="flex items-center gap-3 px-3 py-2 rounded-lg transition
                {{ request()->routeIs('superadmin.news*') ? 'bg-white/25' : 'hover:bg-white/20' }}">
                    <i data-lucide="newspaper"></i> News
                </a>

                <a href="#"
                class="flex items-center gap-3 px-3 py-2 rounded-lg transition
                {{ request()->routeIs('superadmin.programs*') ? 'bg-white/25' : 'hover:bg-white/20' }}">
                    <i data-lucide="graduation-cap"></i> Programs
                </a>

                <a href="#"
                class="flex items-center gap-3 px-3 py-2 rounded-lg transition
                {{ request()->routeIs('superadmin.chatbot*') ? 'bg-white/25' : 'hover:bg-white/20' }}">
                    <i data-lucide="bot"></i> Chatbot
                </a>

                <p class="text-xs opacity-70 mt-6 mb-2">SUPER ADMIN</p>

                <a href="#"
                class="flex items-center gap-3 px-3 py-2 rounded-lg transition
                {{ request()->routeIs('superadmin.users*') ? 'bg-white/25' : 'hover:bg-white/20' }}">
                    <i data-lucide="users"></i> User Management
                </a>

                <a href="#"
                class="flex items-center gap-3 px-3 py-2 rounded-lg transition
                {{ request()->routeIs('superadmin.settings') ? 'bg-white/25' : 'hover:bg-white/20' }}">
                    <i data-lucide="settings"></i> Site Settings
                </a>
            </nav>
        </div>

        <div class="absolute bottom-6 left-6 space-y-4 text-sm">
            <a href="{{ route('home') }}" class="flex items-center gap-3 hover:opacity-80">
                <i data-lucide="arrow-left"></i> Back to Site
            </a>
            <a href="{{ route('logout') }}" class="flex items-center gap-3 hover:opacity-80">
                <i data-lucide="log-out"></i> Sign Out
            </a>
        </div>
    </aside>

    <!-- ================= MAIN ================= -->
    <div class="flex-1 md:ml-64 p-6 md:p-10">
        @yield('content')
    </div>
</div>



</body>
</html>