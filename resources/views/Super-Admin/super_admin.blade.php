<!DOCTYPE html>
<html lang="en" class="transition-colors duration-300">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>OU Super Admin Dashboard</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: 'class',
    }
  </script>

  <!-- Lucide Icons -->
  <script src="https://unpkg.com/lucide@latest"></script>

  <!-- Inter Font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
      cursor: default !important;  /* Forces arrow pointer everywhere */
      user-select: none;  /* Blocks text selection/editing on non-inputs */
    }

    input, textarea {
      cursor: text !important;  /* Keeps I-beam in text fields */
      user-select: text;  /* Allows selection in inputs */
    }

    .custom-scrollbar::-webkit-scrollbar {
      width: 6px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb {
      background-color: rgba(156, 163, 175, 0.6); /* gray-400 */
      border-radius: 4px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
      background-color: rgba(107, 114, 128, 0.8); /* gray-500 */
    }
  </style>
</head>
  <body class="bg-white dark:bg-[#1a1a1a] text-gray-700 dark:text-gray-200 transition-colors duration-300">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 border-r border-gray-200 dark:border-gray-700 bg-white dark:bg-[#181818] p-4 space-y-4">
            <!-- Logo -->
            <div class="mb-6 flex items-center space-x-2">
            <h1 class="text-[22px] font-extrabold uppercase tracking-wide">
                <span class="text-blue-500">BICOL</span> <span class="text-orange-500">UNIVERSITY</span>
            </h1>
            </div>

            <!-- Sidebar menu -->
            <nav class="space-y-2 text-sm">
            <div class="text-gray-400 font-semibold dark:text-gray-500">Open University</div>

            <!-- Dashboard link -->
            <a href="{{ url('/Super-Admin/super_admin') }}" class="flex items-center gap-2 w-full px-3 py-2 rounded-xl bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-100 hover:bg-blue-100 dark:hover:bg-blue-800/40 transition">
                <i data-lucide="house"></i> Dashboard
            </a>

            <!-- User Management (UI only) -->
            <a href="#" class="flex items-center gap-2 w-full px-3 py-2 rounded-xl bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-100 hover:bg-blue-100 dark:hover:bg-blue-800/40 transition">
                <i data-lucide="users"></i> User Management
            </a>

            <hr class="my-3">

            <!-- Logout -->
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="flex items-center gap-2 px-3 text-gray-700 dark:text-gray-100">
                <i data-lucide="log-out"></i> LogOut
            </a>
            <form id="logout-form" method="GET" action="{{ url('/superadmin/logout') }}" class="hidden">@csrf</form>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <!-- Topbar -->
            <div class="flex justify-between items-center mb-6">
            <div class="flex items-center gap-3 text-lg font-semibold">
                <i data-lucide="layout-dashboard"></i> Super Admin Dashboard
            </div>

            <div class="flex items-center gap-3">
                <!-- Monthly, Quarterly, and Yearly Dropdown -->
                <div class="relative">
                <select id="analyticsRange" class="bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 text-sm rounded-lg px-3 py-2 pr-8 cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="monthly" selected>Monthly</option>
                    <option value="quarterly">Quarterly</option>
                    <option value="yearly">Yearly</option>
                </select>
                </div>

                <!-- Toggle Dark Mode -->
                <button id="themeToggle" class="text-gray-600 dark:text-gray-300 cursor-pointer" title="Toggle Dark Mode">
                <span id="themeIcon" data-lucide="moon"></span>
                </button>
            </div>
            </div>

            <!-- Welcome -->
            <p class="text-gray-500 dark:text-gray-400 mb-6">
            Welcome to the Open University Administrative Portal, 
            <span class="font-semibold text-blue-600 dark:text-blue-400">{{ session('superadmin_name') ?? 'Super Admin' }}</span> 
            👋 You have full system oversight and management privileges.
            </p>

            <!-- Stats Grid (UI Only) -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
            <div class="p-4 bg-white dark:bg-gray-800 rounded-xl shadow">
                <div class="flex justify-between items-center">
                <p class="text-gray-500 text-sm">Active Super Admin</p>
                <i data-lucide="users" class="text-gray-400 w-5 h-5"></i>
                </div>
                <h2 class="text-2xl font-bold">0</h2>
                <p class="text-green-600 text-xs font-medium">Active in last 30 days</p>
            </div>

            <div class="p-4 bg-white dark:bg-gray-800 rounded-xl shadow">
                <div class="flex justify-between items-center">
                <p class="text-gray-500 text-sm">Active Faculty</p>
                <i data-lucide="users" class="text-gray-400 w-5 h-5"></i>
                </div>
                <h2 class="text-2xl font-bold">0</h2>
                <p class="text-green-600 text-xs font-medium">Active in last 30 days</p>
            </div>

            <div class="p-4 bg-white dark:bg-gray-800 rounded-xl shadow">
                <div class="flex justify-between items-center">
                <p class="text-gray-500 text-sm">Inactive Super Admin</p>
                <i data-lucide="users" class="text-gray-400 w-5 h-5"></i>
                </div>
                <h2 class="text-2xl font-bold">0</h2>
                <p class="text-green-600 text-xs font-medium">Active in last 30 days</p>
            </div>

            <div class="p-4 bg-white dark:bg-gray-800 rounded-xl shadow">
                <div class="flex justify-between items-center">
                <p class="text-gray-500 text-sm">Inactive Faculty</p>
                <i data-lucide="users" class="text-gray-400 w-5 h-5"></i>
                </div>
                <h2 class="text-2xl font-bold">0</h2>
                <p class="text-green-600 text-xs font-medium">Active in last 30 days</p>
            </div>
            </div>

            <!-- Quick Actions (UI Only) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-4">
                <h3 class="font-semibold mb-4">Quick Actions</h3>
                <ul class="space-y-3">
                <li>
                    <a href="#" class="flex items-center gap-3 p-3 rounded-lg bg-blue-50 dark:bg-blue-900/20 text-gray-700 dark:text-gray-300 hover:bg-blue-100 dark:hover:bg-blue-800/40 transition">
                    <i data-lucide="upload" class="w-5 h-5"></i>
                    <div>
                        <p class="font-medium">Upload Document</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Add new documents</p>
                    </div>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center gap-3 p-3 rounded-lg bg-blue-50 dark:bg-blue-900/20 text-gray-700 dark:text-gray-300 hover:bg-blue-100 dark:hover:bg-blue-800/40 transition">
                    <i data-lucide="search" class="w-5 h-5"></i>
                    <div>
                        <p class="font-medium">Search Documents</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Find documents quickly</p>
                    </div>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center gap-3 p-3 rounded-lg bg-blue-50 dark:bg-blue-900/20 text-gray-700 dark:text-gray-300 hover:bg-blue-100 dark:hover:bg-blue-800/40 transition">
                    <i data-lucide="folder-open" class="w-5 h-5"></i>
                    <div>
                        <p class="font-medium">View Categories</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Browse by document type</p>
                    </div>
                    </a>
                </li>
                </ul>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-4">
                <h3 class="font-semibold mb-4">Recent Activity</h3>
                <p class="text-gray-400 dark:text-gray-500 text-sm italic">No recent activities</p>
            </div>
            </div>

            <!-- System Logs (UI Only) -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6 mt-6">
            <h3 class="text-lg font-semibold mb-2">System Logs</h3>
            <p class="text-gray-500 dark:text-gray-400 text-sm mb-6">Latest actions recorded in system logs</p>
            <div class="flex items-center justify-center h-32 text-gray-400 dark:text-gray-500 text-sm italic">
                No system logs available yet
            </div>
            </div>

        </main>
    </div>

    <!-- Footer -->
    <footer class="text-center py-4 text-xs text-gray-400 dark:text-gray-500">
    © 2025 Bicol University Board of Regents • All rights reserved.
    </footer>

        <script>
        // Lucide Icons
        lucide.createIcons();

        // Dark Mode Toggle
        const toggle = document.getElementById('themeToggle');
        const icon = document.getElementById('themeIcon');
        const html = document.documentElement;

        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            html.classList.add('dark');
            icon.setAttribute("data-lucide", "sun");
        } else icon.setAttribute("data-lucide", "moon");

        toggle.addEventListener('click', () => {
            html.classList.toggle('dark');
            const isDark = html.classList.contains('dark');
            icon.setAttribute("data-lucide", isDark ? "sun" : "moon");
            lucide.createIcons();
            localStorage.theme = isDark ? 'dark' : 'light';
        });
        </script>
    </body>
</html>
