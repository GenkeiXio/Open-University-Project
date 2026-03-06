@extends('Super-Admin.adminlayout')

@section('title', 'OU Super Admin Dashboard')

@section('content')

    <div class="w-full px-4 sm:px-6 lg:px-8 py-6">

        <!-- ================= HEADER ================= -->
        <div class="flex flex-col xl:flex-row xl:items-center xl:justify-between gap-6 mb-10">

            <div>
                <h1 class="text-3xl md:text-4xl font-bold tracking-tight text-gray-900 dark:text-white">
                    Super Admin Dashboard
                </h1>
                <p class="text-gray-500 dark:text-gray-400 mt-2 text-sm">
                    Full control over the BUOU platform.
                </p>
            </div>

            <div class="flex flex-wrap items-center gap-3">

                <button class="px-5 py-2 bg-blue-600 text-white rounded-xl
                    shadow hover:shadow-md hover:-translate-y-0.5
                    hover:bg-blue-700 transition-all duration-200 text-sm">
                    + New Action
                </button>

                <!-- ✅ FIXED ID -->
                <select id="analyticsRange"
                    class="appearance-none bg-white dark:bg-gray-800
                    border border-gray-300 dark:border-gray-700
                    text-sm rounded-xl px-4 py-2
                    shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="monthly" selected>Monthly</option>
                    <option value="quarterly">Quarterly</option>
                    <option value="yearly">Yearly</option>
                </select>
            </div>
        </div>

        <!-- ================= WELCOME ================= -->
        <div class="mb-8 px-6 py-4 rounded-2xl
            bg-gradient-to-r from-blue-50 to-indigo-50
            dark:from-[#1e293b] dark:to-[#111827]
            border border-blue-100 dark:border-gray-700">

            <p class="text-gray-700 dark:text-gray-300 text-sm">
                Welcome,
                <span class="font-semibold text-blue-600 dark:text-blue-400">
                    {{ session('admin_name') ?? 'Super Admin' }}
                </span>
                👋 You have full system oversight.
            </p>
        </div>

        <!-- ================= STATS ================= -->
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6 mb-10">

            @for($i=0;$i<3;$i++)
            <div class="p-6 rounded-2xl
                bg-white dark:bg-[#1e293b]
                border border-gray-100 dark:border-gray-700
                shadow-sm hover:shadow-lg hover:-translate-y-1 transition">

                <div class="flex justify-between items-center mb-3">
                    <p class="text-gray-500 dark:text-gray-400 text-sm font-medium">
                        {{ ['Active Super Admin','Active Admins','Faculty'][$i] }}
                    </p>
                    <i data-lucide="users" class="w-5 h-5 text-gray-400"></i>
                </div>

                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-1">
                    0
                </h2>

                <p class="text-green-600 text-xs font-medium">
                    Active in last 30 days
                </p>
            </div>
            @endfor
        </div>

        <!-- ================= CHARTS ================= -->
        <div class="grid grid-cols-1 xl:grid-cols-2 gap-6 mb-12">

            <div class="bg-white dark:bg-[#1e293b] rounded-2xl p-6
                border border-gray-100 dark:border-gray-700 shadow-sm">

                <h3 class="text-base font-semibold text-gray-800 dark:text-white mb-4">
                    User Growth
                </h3>

                <canvas id="userGrowthChart" height="120"></canvas>
            </div>

            <div class="bg-white dark:bg-[#1e293b] rounded-2xl p-6
                border border-gray-100 dark:border-gray-700 shadow-sm">

                <h3 class="text-base font-semibold text-gray-800 dark:text-white mb-4">
                    Activity Distribution
                </h3>

                <canvas id="activityChart" height="120"></canvas>
            </div>

        </div>

        <!-- ================= REPORT GENERATOR ================= -->
        <div class="bg-white dark:bg-[#1e293b] rounded-2xl p-6
            border border-gray-100 dark:border-gray-700 shadow-sm mb-10">

            <h3 class="text-base font-semibold text-gray-800 dark:text-white mb-6">
                Generate System Report
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <div>
                    <label class="text-xs text-gray-500 dark:text-gray-400">Report Type</label>
                    <select class="w-full mt-2 bg-white dark:bg-gray-800
                        border border-gray-300 dark:border-gray-700
                        rounded-xl px-4 py-2 text-sm">
                        <option>Users Report</option>
                        <option>Activity Report</option>
                        <option>System Summary</option>
                    </select>
                </div>

                <div>
                    <label class="text-xs text-gray-500 dark:text-gray-400">Format</label>
                    <select class="w-full mt-2 bg-white dark:bg-gray-800
                        border border-gray-300 dark:border-gray-700
                        rounded-xl px-4 py-2 text-sm">
                        <option>PDF</option>
                        <option>Excel</option>
                        <option>CSV</option>
                    </select>
                </div>

                <div class="flex items-end">
                    <button class="w-full bg-blue-600 text-white
                        rounded-xl py-2.5 hover:bg-blue-700 transition shadow">
                        Generate Report
                    </button>
                </div>

            </div>
        </div>

        <!-- ================= REPORT HISTORY ================= -->
        <div class="bg-white dark:bg-[#1e293b] rounded-2xl p-6
            border border-gray-100 dark:border-gray-700 shadow-sm">

            <h3 class="text-base font-semibold text-gray-800 dark:text-white mb-4">
                Recent Reports
            </h3>

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="text-gray-500 dark:text-gray-400 border-b border-gray-200 dark:border-gray-700">
                        <tr>
                            <th class="py-3">Report</th>
                            <th>Type</th>
                            <th>Date</th>
                            <th>Download</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 dark:text-gray-300">
                        <tr class="border-b border-gray-100 dark:border-gray-800">
                            <td class="py-3">Users Report</td>
                            <td>PDF</td>
                            <td>Jan 2026</td>
                            <td><button class="text-blue-600 hover:underline">Download</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        lucide.createIcons();
        
        const ctx1 = document.getElementById('userGrowthChart');
        const ctx2 = document.getElementById('activityChart');

        let userGrowthChart = new Chart(ctx1, {
            type: 'line',
            data: {
                labels: ['Jan','Feb','Mar','Apr','May','Jun'],
                datasets: [{
                    data: [10,25,18,40,32,50],
                    borderColor: '#3b82f6',
                    backgroundColor: 'rgba(59,130,246,0.1)',
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { display: false } }
            }
        });

        let activityChart = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ['Super Admin','Admins','Faculty'],
                datasets: [{
                    data: [12,19,7],
                    backgroundColor: ['#3b82f6','#10b981','#f59e0b']
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { display: false } }
            }
        });

        document.getElementById('analyticsRange').addEventListener('change', function() {

            if (this.value === 'monthly') {
                userGrowthChart.data.labels = ['Jan','Feb','Mar','Apr','May','Jun'];
                userGrowthChart.data.datasets[0].data = [10,25,18,40,32,50];
            }

            if (this.value === 'quarterly') {
                userGrowthChart.data.labels = ['Q1','Q2','Q3','Q4'];
                userGrowthChart.data.datasets[0].data = [80,120,95,150];
            }

            if (this.value === 'yearly') {
                userGrowthChart.data.labels = ['2022','2023','2024','2025'];
                userGrowthChart.data.datasets[0].data = [500,800,1200,1600];
            }

            userGrowthChart.update();
        });
    </script>
@endsection
