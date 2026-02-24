<!DOCTYPE html>
<html lang="en" class="transition-colors duration-300">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>iFiLMS Dashboard</title>

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
            <div class="text-gray-400 font-semibold dark:text-gray-500">Dashboard</div>

            <!-- Collapsible Sections (Transcriptions, Minutes) -->
            <a href="{{ url('Super-Admin.super_admin') }}" class="flex items-center gap-2 w-full px-3 py-2 rounded-xl bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-100 hover:bg-blue-100 dark:hover:bg-blue-800/40 transition">
                <i data-lucide="house"></i> Dashboard
            </a>

            <a href="{{ route('Super-Admin.') }}" class="flex items-center gap-2 w-full px-3 py-2 rounded-xl bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-100 hover:bg-blue-100 dark:hover:bg-blue-800/40 transition">
                <i data-lucide="recycle"></i> User Management
            </a>

          <hr class="my-3">

          <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="flex items-center gap-2 px-3 text-gray-700 dark:text-gray-100">
            <i data-lucide="log-out"></i> LogOut
          </a>
          <form id="logout-form" method="POST" action="{{ route('logout') }}" class="hidden">@csrf</form>
        </nav>
      </aside>

      <!-- Main Content -->
      <main class="flex-1 p-6">
      <!-- Topbar -->
        <div class="flex justify-between items-center mb-6">
          <div class="flex items-center gap-3 text-lg font-semibold">
            <i data-lucide="layout-dashboard"></i> Dashboard
          </div>

          <div class="flex items-center gap-3">
            
            <!-- Monthly, Quarterly, and Yearly View Dowpdown -->
            <div class="relative">
              <select
                id="analyticsRange"
                class="bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700
                      text-sm rounded-lg px-3 py-2 pr-8 cursor-pointer
                      focus:outline-none focus:ring-2 focus:ring-blue-500">
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
        <p class="text-gray-500 dark:text-gray-400 mb-6"> Welcome to the iFilMS File Management System, 
          <span class="font-semibold text-blue-600 dark:text-blue-400">{{ $staffName }}</span> 👋 Glad to see you managing the files today!
        </p>

        <!-- Stats Grid -->
          <div class="p-4 bg-white dark:bg-gray-800 rounded-xl shadow">
            <div class="flex justify-between items-center">
              <p class="text-gray-500 text-sm">Active Super Admin</p>
              <i data-lucide="users" class="text-gray-400 w-5 h-5"></i>
            </div>
            <h2 class="text-2xl font-bold">{{ $activeUsers }}</h2>
            <p class="text-green-600 text-xs font-medium">Active in last 30 days</p>
          </div>
        </div>

        <div class="p-4 bg-white dark:bg-gray-800 rounded-xl shadow">
            <div class="flex justify-between items-center">
              <p class="text-gray-500 text-sm">Active Faculty</p>
              <i data-lucide="users" class="text-gray-400 w-5 h-5"></i>
            </div>
            <h2 class="text-2xl font-bold">{{ $activeUsers }}</h2>
            <p class="text-green-600 text-xs font-medium">Active in last 30 days</p>
          </div>
        </div>

        <div class="p-4 bg-white dark:bg-gray-800 rounded-xl shadow">
            <div class="flex justify-between items-center">
              <p class="text-gray-500 text-sm">Inactive Super Admin</p>
              <i data-lucide="users" class="text-gray-400 w-5 h-5"></i>
            </div>
            <h2 class="text-2xl font-bold">{{ $activeUsers }}</h2>
            <p class="text-green-600 text-xs font-medium">Active in last 30 days</p>
          </div>
        </div>

        <div class="p-4 bg-white dark:bg-gray-800 rounded-xl shadow">
            <div class="flex justify-between items-center">
              <p class="text-gray-500 text-sm">Inactive Faculty</p>
              <i data-lucide="users" class="text-gray-400 w-5 h-5"></i>
            </div>
            <h2 class="text-2xl font-bold">{{ $activeUsers }}</h2>
            <p class="text-green-600 text-xs font-medium">Active in last 30 days</p>
          </div>
        </div>


        <!-- Analytics Graph Two column layout -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">

        <!-- Document Activity -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-4">
          <h3 class="font-semibold flex items-center gap-2 mb-1">
            <i data-lucide="bar-chart-3"></i> Document Activity
          </h3>
          <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">
            Uploads and Downloads - Monthly Report
          </p>
          <canvas id="documentActivityChart" height="120"></canvas>
        </div>

        <!-- Upload Trend -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-4">
          <h3 class="font-semibold flex items-center gap-2 mb-1">
            <i data-lucide="trending-up"></i> Upload and Donwload Trend
          </h3>
          <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">
            Document uploads and dowload trends over time
          </p>
          <canvas id="uploadTrendChart" height="120"></canvas>
        </div>
      </div>

        <!-- Two-column layout -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          
          <!-- Quick Actions -->
          <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-4 ">
            <h3 class="font-semibold mb-4">Quick Actions</h3>
            <p class="text-gray-500 dark:text-gray-400 text-sm mb-4">Common tasks and shortcuts</p>
            <ul class="space-y-3">
              
              <!-- Upload Document -->
              <li>
                <a href="{{ route('mainsidebar.upload') }}"
                  class="flex items-center gap-3 p-3 rounded-lg bg-blue-50 dark:bg-blue-900/20 text-gray-700 dark:text-gray-300 hover:bg-blue-100 dark:hover:bg-blue-800/40 transition">
                  <i data-lucide="upload" class="w-5 h-5"></i>
                  <div>
                    <p class="font-medium">Upload Document</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Add new documents</p>
                  </div>
                </a>
              </li>

              <!-- Search Documents -->
              <li>
                <a href="{{ route('mainsidebar.documents') }}"
                  class="flex items-center gap-3 p-3 rounded-lg bg-blue-50 dark:bg-blue-900/20 text-gray-700 dark:text-gray-300 hover:bg-blue-100 dark:hover:bg-blue-800/40 transition">
                  <i data-lucide="search" class="w-5 h-5"></i>
                  <div>
                    <p class="font-medium">Search Documents</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Find documents quickly</p>
                  </div>
                </a>
              </li>

              <!-- View Categories -->
              <li>
                <a href="{{ route('mainsidebar.categories') }}"
                  class="flex items-center gap-3 p-3 rounded-lg bg-blue-50 dark:bg-blue-900/20 text-gray-700 dark:text-gray-300 hover:bg-blue-100 dark:hover:bg-blue-800/40 transition">
                  <i data-lucide="folder-open" class="w-5 h-5"></i>
                  <div>
                    <p class="font-medium">View Categories</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Browse by document type</p>
                  </div>
                </a>
              </li>
            </ul>
          </div>

          <!-- Recently Activity -->
          <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-4">
            <h3 class="font-semibold mb-4">Recent Activity</h3>
            <p class="text-gray-500 dark:text-gray-400 text-sm mb-4">Latest document actions</p>

              @if($recentActivity->isEmpty())
                  <div class="flex items-center justify-center h-32 text-gray-400 dark:text-gray-500 text-sm italic">
                      No recent activities
                  </div>
              @else
                  <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                      @foreach($recentActivity as $activity)
                          <li class="py-2 flex items-start gap-3">
                              @if($activity->action === 'uploaded')
                                  <i data-lucide="upload" class="w-4 h-4 text-blue-500"></i>
                              @elseif($activity->action === 'downloaded')
                                  <i data-lucide="download" class="w-4 h-4 text-green-500"></i>
                              @elseif($activity->action === 'deleted')
                                  <i data-lucide="trash" class="w-4 h-4 text-red-500"></i>
                              @elseif($activity->action === 'restored')
                                  <i data-lucide="archive-restore" class="w-4 h-4 text-red-500"></i>
                              @endif

                              <div>
                                  <p class="text-sm text-gray-800 dark:text-gray-100">
                                      <strong>{{ $activity->name }}</strong>
                                      {{ $activity->action }}
                                      <span class="font-semibold">{{ $activity->title }}</span>
                                  </p>
                                  <p class="text-xs text-gray-500 dark:text-gray-400">
                                      {{ \Carbon\Carbon::parse($activity->date)->format('M d, Y • h:i A') }}
                                  </p>
                              </div>
                          </li>
                      @endforeach
                  </ul>
              @endif
          </div>
        </div>

        <!-- System Logs -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6 mt-6">
          <h3 class="text-lg font-semibold mb-2">System Logs</h3>
          <p class="text-gray-500 dark:text-gray-400 text-sm mb-6">
            Latest actions recorded in system logs
          </p>

          @if(empty($logs))
            <div class="flex items-center justify-center h-32 text-gray-400 dark:text-gray-500 text-sm italic">
              No system logs available yet
            </div>
          @else
            <div class="overflow-x-auto max-h-[300px] overflow-y-auto">
              <table class="min-w-full text-sm text-left text-gray-600 dark:text-gray-300">
                <thead class="text-xs uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                  <tr>
                    <th class="px-6 py-3 w-1/5">Date</th>
                    <th class="px-6 py-3 w-1/5">Action</th>
                    <th class="px-6 py-3 w-2/5">Staff</th>
                    <th class="px-6 py-3 w-1/5">Status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($logs as $log)
                    @php
                      // Example log line format:
                      // [2025-11-01 10:11:40] LOGIN: Prince Louis Jaylo (Staff ID: 17)

                      preg_match('/\[(.*?)\]\s*(\w+):\s*(.*)/', $log, $matches);
                      $date = $matches[1] ?? '';
                      $action = strtoupper(trim($matches[2] ?? ''));
                      $staff = $matches[3] ?? 'Unknown';

                      // Status color and label
                      if ($action === 'LOGIN') {
                          $statusColor = 'bg-green-500/20 text-green-400';
                          $statusLabel = 'Active';
                      } elseif ($action === 'LOGOUT') {
                          $statusColor = 'bg-red-500/20 text-red-400';
                          $statusLabel = 'Logged Out';
                      } else {
                          $statusColor = 'bg-gray-500/20 text-gray-400';
                          $statusLabel = 'N/A';
                      }
                    @endphp

                    <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800 transition">
                      <td class="px-6 py-3">{{ $date }}</td>
                      <td class="px-6 py-3 font-medium">{{ $action }}</td>
                      <td class="px-6 py-3">{{ $staff }}</td>
                      <td class="px-6 py-3">
                        <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $statusColor }}">
                          {{ $statusLabel }}
                        </span>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          @endif
        </div>
      </main>
    </div>

    <!-- Footer -->
    <footer class="text-center py-4 text-xs text-gray-400 dark:text-gray-500">
      © 2025 Bicol University Board of Regents • All rights reserved.
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/dayjs@1/dayjs.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/dayjs@1/plugin/relativeTime.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Scripts -->
    <script>
      // Lucide Icons
      lucide.createIcons();

      // Collapsible Menus
      function toggleMenu(id) {
        const menu = document.getElementById(id);
        const chevron = document.querySelector(`#${id.replace("Menu", "Chevron")}`);
        menu.classList.toggle('hidden');
        chevron.classList.toggle('rotate-180');
      }

      // Theme Toggle
      const toggle = document.getElementById('themeToggle');
      const icon = document.getElementById('themeIcon');
      const html = document.documentElement;

      // Load saved mode
      if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        html.classList.add('dark');
        icon.setAttribute("data-lucide", "sun");
      } else {
        icon.setAttribute("data-lucide", "moon");
      }
      lucide.createIcons();

      // Toggle theme
      toggle.addEventListener('click', () => {
        html.classList.toggle('dark');
        const isDark = html.classList.contains('dark');

        // Replace span content each time
        const iconContainer = document.getElementById('themeIcon');
        iconContainer.innerHTML = "";
        iconContainer.setAttribute("data-lucide", isDark ? "sun" : "moon");
        lucide.createIcons();

        localStorage.theme = isDark ? 'dark' : 'light';
      });

      dayjs.extend(dayjs_plugin_relativeTime);

      function refreshTimes() {
          document.querySelectorAll('.time-ago').forEach(function(el) {
              const timestamp = el.getAttribute('data-time');
              if (timestamp) {
                  el.textContent = dayjs(timestamp).fromNow();
              }
          });
      }

      const barCtx = document.getElementById('documentActivityChart');
      const lineCtx = document.getElementById('uploadTrendChart');

      let barChart, lineChart;

      function renderCharts(labels, uploads, downloads) {
          if (barChart) barChart.destroy();
          if (lineChart) lineChart.destroy();

          barChart = new Chart(barCtx, {
              type: 'bar',
              data: {
                  labels,
                  datasets: [
                      { label: 'Uploads', data: uploads, backgroundColor: '#60a5fa', borderRadius: 6 },
                      { label: 'Downloads', data: downloads, backgroundColor: '#22c55e', borderRadius: 6 }
                  ]
              },
              options: { responsive: true, plugins: { legend: { position: 'bottom' } }, scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1,
                        precision: 0
                    }
                }
            } }
          });

          lineChart = new Chart(lineCtx, {
            type: 'line',
            data: {
                labels,
                datasets: [
                    {
                        label: 'Uploads',
                        data: uploads,
                        borderColor: '#3b82f6',
                        backgroundColor: 'rgba(59,130,246,.15)',
                        tension: 0.4,
                        fill: true
                    },
                    {
                        label: 'Downloads',
                        data: downloads,
                        borderColor: '#22c55e',
                        backgroundColor: 'rgba(34,197,94,.15)',
                        tension: 0.4,
                        fill: true
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom'
                    }
                },
                  scales: {
                  y: {
                      beginAtZero: true,
                      ticks: {
                          stepSize: 1,   // ✅ same fix here
                          precision: 0
                      }
                  }
              }
            }
        });
      }

      function loadAnalytics(range = 'monthly') {
          fetch(`/dashboard/analytics-data?range=${range}`)
              .then(res => res.json())
              .then(data => renderCharts(data.labels, data.uploads, data.downloads));
      }

      // Initial load
      loadAnalytics();

      // Dropdown change
      document.getElementById('analyticsRange').addEventListener('change', function () {
          loadAnalytics(this.value);
      });

      // Run immediately and then every 60s
      refreshTimes();
      setInterval(refreshTimes, 60000);
    </script>
  </body>
</html>
