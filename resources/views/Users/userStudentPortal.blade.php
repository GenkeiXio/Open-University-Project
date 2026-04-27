@extends('Users.userstudentportallayout')

@section('title', 'Student Dashboard')

@section('content')
<div class="mb-10">
    <h1 class="text-3xl font-black text-gray-900 dark:text-white tracking-tight">Welcome back, Alex! 👋</h1>
    <p class="text-gray-500 dark:text-gray-400 mt-1">Here is what's happening with your studies today.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
    <div class="bg-white dark:bg-[#111827] p-6 rounded-3xl border border-gray-100 dark:border-gray-800 shadow-sm">
        <div class="w-12 h-12 rounded-2xl bg-blue-50 dark:bg-blue-900/20 text-blue-600 flex items-center justify-center mb-4">
            <i data-lucide="book-open" class="w-6 h-6"></i>
        </div>
        <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Enrolled Courses</p>
        <h3 class="text-3xl font-bold text-gray-900 dark:text-white mt-1">6</h3>
    </div>

    <div class="bg-white dark:bg-[#111827] p-6 rounded-3xl border border-gray-100 dark:border-gray-800 shadow-sm">
        <div class="w-12 h-12 rounded-2xl bg-emerald-50 dark:bg-emerald-900/20 text-emerald-600 flex items-center justify-center mb-4">
            <i data-lucide="award" class="w-6 h-6"></i>
        </div>
        <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">GPA</p>
        <h3 class="text-3xl font-bold text-gray-900 dark:text-white mt-1">3.85</h3>
    </div>

    <div class="bg-white dark:bg-[#111827] p-6 rounded-3xl border border-gray-100 dark:border-gray-800 shadow-sm">
        <div class="w-12 h-12 rounded-2xl bg-amber-50 dark:bg-amber-900/20 text-amber-600 flex items-center justify-center mb-4">
            <i data-lucide="calendar" class="w-6 h-6"></i>
        </div>
        <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Upcoming Tasks</p>
        <h3 class="text-3xl font-bold text-gray-900 dark:text-white mt-1">4</h3>
    </div>
</div>

<div class="bg-white dark:bg-[#111827] rounded-3xl border border-gray-100 dark:border-gray-800 shadow-sm overflow-hidden">
    <div class="p-6 border-b border-gray-50 dark:border-gray-800 flex justify-between items-center">
        <h3 class="font-bold text-lg text-gray-800 dark:text-white">Current Semester Progress</h3>
        <button class="text-blue-600 text-sm font-bold hover:underline">View All</button>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead>
                <tr class="bg-gray-50/50 dark:bg-gray-800/40 text-[10px] font-black text-gray-400 uppercase tracking-widest">
                    <th class="px-8 py-4">Course Name</th>
                    <th class="px-8 py-4">Instructor</th>
                    <th class="px-8 py-4">Progress</th>
                    <th class="px-8 py-4 text-right">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50 dark:divide-gray-800">
                <tr class="group hover:bg-gray-50 dark:hover:bg-white/5 transition-colors">
                    <td class="px-8 py-5">
                        <div class="font-bold text-gray-800 dark:text-gray-200">Advanced Web Development</div>
                        <div class="text-xs text-gray-400">CS-402</div>
                    </td>
                    <td class="px-8 py-5 text-sm">Dr. Sarah Smith</td>
                    <td class="px-8 py-5">
                        <div class="w-full bg-gray-100 dark:bg-gray-700 h-1.5 rounded-full overflow-hidden">
                            <div class="bg-blue-600 h-full w-[75%]"></div>
                        </div>
                    </td>
                    <td class="px-8 py-5 text-right">
                        <span class="px-3 py-1 bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 rounded-full text-[10px] font-bold uppercase">Active</span>
                    </td>
                </tr>
                <tr class="group hover:bg-gray-50 dark:hover:bg-white/5 transition-colors">
                    <td class="px-8 py-5">
                        <div class="font-bold text-gray-800 dark:text-gray-200">Database Management</div>
                        <div class="text-xs text-gray-400">CS-301</div>
                    </td>
                    <td class="px-8 py-5 text-sm">Prof. Michael Chen</td>
                    <td class="px-8 py-5">
                        <div class="w-full bg-gray-100 dark:bg-gray-700 h-1.5 rounded-full overflow-hidden">
                            <div class="bg-emerald-500 h-full w-[92%]"></div>
                        </div>
                    </td>
                    <td class="px-8 py-5 text-right">
                        <span class="px-3 py-1 bg-emerald-50 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-400 rounded-full text-[10px] font-bold uppercase">On Track</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection