@extends('Admin.adminlayout')

@section('title', 'Theses & Dissertation Management')

@section('content')

<div class="w-full px-4 sm:px-6 lg:px-8 py-6">

    <!-- ================= HEADER ================= -->
    <div class="flex flex-col xl:flex-row xl:items-center xl:justify-between gap-6 mb-8">

        <div>
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
                Theses & Dissertation Dashboard
            </h1>
            <p class="text-gray-500 dark:text-gray-400 text-sm mt-1">
                Monitor academic submissions across faculty and staff.
            </p>
        </div>

    </div>

    <!-- ================= FILTERS ================= -->
    <form method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">

        <select name="year" class="border rounded-xl p-2 dark:bg-gray-800">
            <option value="">All Years</option>
            <option value="2025">2025</option>
            <option value="2024">2024</option>
        </select>

        <select name="semester" class="border rounded-xl p-2 dark:bg-gray-800">
            <option value="">All Semesters</option>
            <option value="1st">1st Semester</option>
            <option value="2nd">2nd Semester</option>
            <option value="Midyear">Midyear</option>
        </select>

        <button class="bg-blue-600 text-white rounded-xl py-2">
            Apply Filters
        </button>

    </form>

    <!-- ================= STATS ================= -->
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6 mb-10">

        <div class="p-6 bg-white dark:bg-gray-800 rounded-2xl shadow">
            <p class="text-sm text-gray-500">Total Theses</p>
            <h2 class="text-2xl font-bold">{{ $stats['total_theses'] }}</h2>
        </div>

        <div class="p-6 bg-white dark:bg-gray-800 rounded-2xl shadow">
            <p class="text-sm text-gray-500">Faculty Uploads</p>
            <h2 class="text-2xl font-bold">{{ $stats['faculty_uploads'] }}</h2>
        </div>

        <div class="p-6 bg-white dark:bg-gray-800 rounded-2xl shadow">
            <p class="text-sm text-gray-500">Staff Uploads</p>
            <h2 class="text-2xl font-bold">{{ $stats['staff_uploads'] ?? 0 }}</h2>
        </div>

    </div>

    <!-- ================= CHARTS ================= -->
    <div class="grid grid-cols-1 xl:grid-cols-2 gap-6 mb-10">

        <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow">
            <h3 class="font-semibold mb-4">Monthly Submissions</h3>
            <canvas id="monthlyChart"></canvas>
        </div>

        <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow">
            <h3 class="font-semibold mb-4">Semester Distribution</h3>
            <canvas id="semesterChart"></canvas>
        </div>

    </div>

    <!-- ================= TABLE ================= -->
    <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow">

        <h3 class="font-semibold mb-4">Recent Uploads</h3>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b text-left">
                        <th class="py-2">Title</th>
                        <th>Uploaded By</th>
                        <th>Role</th>
                        <th>Department</th>
                        <th>Year</th>
                        <th>Semester</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($uploads as $upload)
                        <tr class="border-b">
                            <td class="py-2">{{ $upload['title'] }}</td>
                            <td>{{ $upload['uploaded_by'] }}</td>
                            <td>{{ $upload['role'] }}</td>
                            <td>{{ $upload['department'] }}</td>
                            <td>{{ $upload['year'] }}</td>
                            <td>{{ $upload['semester'] }}</td>
                            <td>
                                <span class="px-2 py-1 text-xs rounded
                                    {{ $upload['status'] == 'Approved' ? 'bg-green-100 text-green-600' : 'bg-yellow-100 text-yellow-600' }}">
                                    {{ $upload['status'] }}
                                </span>
                            </td>
                            <td>{{ $upload['date'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

</div>

<!-- ================= CHART SCRIPT ================= -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const monthlyCtx = document.getElementById('monthlyChart');

new Chart(monthlyCtx, {
    type: 'line',
    data: {
        labels: ['Jan','Feb','Mar','Apr','May','Jun'],
        datasets: [{
            label: 'Submissions',
            data: @json($monthlySubmissions),
            borderColor: '#3b82f6',
            fill: true
        }]
    }
});

const semesterCtx = document.getElementById('semesterChart');

new Chart(semesterCtx, {
    type: 'bar',
    data: {
        labels: ['1st Sem','2nd Sem','Midyear'],
        datasets: [{
            label: 'Count',
            data: @json($semesterData),
            backgroundColor: ['#3b82f6','#10b981','#f59e0b']
        }]
    }
});
</script>

@endsection