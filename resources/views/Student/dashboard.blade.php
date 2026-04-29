@extends('Student.layout')

@section('title', 'My Requests')

@section('content')

{{-- Page Header --}}
<div class="mb-6 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Requests</h1>
        <p class="text-sm text-gray-500 dark:text-gray-400 mt-0.5">
            Welcome back, {{ session('student_name') }}!
        </p>
    </div>
    <button onclick="document.getElementById('newRequestModal').classList.remove('hidden')"
        class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold
               px-4 py-2.5 rounded-xl transition shadow-sm shadow-blue-500/20">
        <i data-lucide="plus" class="w-4 h-4"></i>
        New Request
    </button>
</div>

{{-- ── TOP ROW: Stats + Notifications ── --}}
<div class="grid grid-cols-1 xl:grid-cols-3 gap-5 mb-5">

    {{-- Stats (takes 2/3 width on xl) --}}
    <div class="xl:col-span-2 grid grid-cols-2 sm:grid-cols-4 gap-4">

        <div class="bg-white dark:bg-[#111827] rounded-2xl border border-gray-200 dark:border-gray-800 p-5 shadow-sm">
            <div class="w-9 h-9 rounded-xl bg-blue-50 dark:bg-blue-900/20 text-blue-600
                        flex items-center justify-center mb-3">
                <i data-lucide="clipboard-list" class="w-4 h-4"></i>
            </div>
            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Total</p>
            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mt-0.5">0</h3>
        </div>

        <div class="bg-white dark:bg-[#111827] rounded-2xl border border-gray-200 dark:border-gray-800 p-5 shadow-sm">
            <div class="w-9 h-9 rounded-xl bg-amber-50 dark:bg-amber-900/20 text-amber-500
                        flex items-center justify-center mb-3">
                <i data-lucide="clock" class="w-4 h-4"></i>
            </div>
            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Pending</p>
            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mt-0.5">0</h3>
        </div>

        <div class="bg-white dark:bg-[#111827] rounded-2xl border border-gray-200 dark:border-gray-800 p-5 shadow-sm">
            <div class="w-9 h-9 rounded-xl bg-emerald-50 dark:bg-emerald-900/20 text-emerald-500
                        flex items-center justify-center mb-3">
                <i data-lucide="check-circle" class="w-4 h-4"></i>
            </div>
            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Approved</p>
            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mt-0.5">0</h3>
        </div>

        <div class="bg-white dark:bg-[#111827] rounded-2xl border border-gray-200 dark:border-gray-800 p-5 shadow-sm">
            <div class="w-9 h-9 rounded-xl bg-red-50 dark:bg-red-900/20 text-red-500
                        flex items-center justify-center mb-3">
                <i data-lucide="x-circle" class="w-4 h-4"></i>
            </div>
            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Rejected</p>
            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mt-0.5">0</h3>
        </div>

    </div>

    {{-- Notifications (takes 1/3 width on xl) --}}
    <div class="bg-white dark:bg-[#111827] rounded-2xl border border-gray-200 dark:border-gray-800 shadow-sm flex flex-col">
        <div class="px-5 py-4 border-b border-gray-100 dark:border-gray-800 flex items-center justify-between">
            <h2 class="font-bold text-gray-800 dark:text-white text-sm">Notifications</h2>
            <span class="text-[10px] font-bold text-blue-600 bg-blue-50 dark:bg-blue-900/20 px-2 py-0.5 rounded-full">0 new</span>
        </div>
        <div class="flex-1 flex flex-col items-center justify-center py-8 text-center px-5">
            <div class="w-10 h-10 rounded-xl bg-gray-100 dark:bg-gray-800 flex items-center justify-center mb-3">
                <i data-lucide="bell-off" class="w-5 h-5 text-gray-400"></i>
            </div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">No notifications yet</p>
            <p class="text-xs text-gray-400 mt-1">Updates on your requests will appear here</p>
        </div>
    </div>

</div>

{{-- ── MIDDLE ROW: Requests Table ── --}}
<div class="bg-white dark:bg-[#111827] rounded-2xl border border-gray-200 dark:border-gray-800 shadow-sm overflow-hidden mb-5">

    <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-800 flex items-center justify-between">
        <h2 class="font-bold text-gray-800 dark:text-white text-sm">My Requests</h2>
        <a href="#" class="text-xs font-semibold text-blue-600 hover:underline">View All</a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead>
                <tr class="bg-gray-50 dark:bg-gray-800/40 text-[10px] font-bold text-gray-400 uppercase tracking-widest">
                    <th class="px-6 py-3">Request Type</th>
                    <th class="px-6 py-3">Reference No.</th>
                    <th class="px-6 py-3">Date Filed</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3 text-right">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50 dark:divide-gray-800">
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center">
                        <div class="flex flex-col items-center gap-2">
                            <i data-lucide="inbox" class="w-8 h-8 text-gray-300 dark:text-gray-600"></i>
                            <p class="text-sm text-gray-400">No requests filed yet.</p>
                            <button onclick="document.getElementById('newRequestModal').classList.remove('hidden')"
                                class="text-xs text-blue-600 font-semibold hover:underline mt-1">
                                + File a new request
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>

{{-- ── BOTTOM ROW: Quick Actions + Appointments ── --}}
<div class="grid grid-cols-1 xl:grid-cols-3 gap-5">

    {{-- Quick Actions (takes 2/3 width on xl) --}}
    <div class="xl:col-span-2">
        <h2 class="font-bold text-gray-800 dark:text-white text-sm mb-3">Quick Actions</h2>
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">

            <button class="bg-white dark:bg-[#111827] rounded-2xl border border-gray-200 dark:border-gray-800
                           shadow-sm p-4 flex flex-col items-center gap-2 hover:border-blue-400
                           hover:shadow-md transition text-center group">
                <div class="w-10 h-10 rounded-xl bg-blue-50 dark:bg-blue-900/20 text-blue-600
                            flex items-center justify-center group-hover:bg-blue-600 group-hover:text-white transition">
                    <i data-lucide="file-text" class="w-5 h-5"></i>
                </div>
                <span class="text-xs font-semibold text-gray-700 dark:text-gray-300">Transcript of Records</span>
            </button>

            <button class="bg-white dark:bg-[#111827] rounded-2xl border border-gray-200 dark:border-gray-800
                           shadow-sm p-4 flex flex-col items-center gap-2 hover:border-blue-400
                           hover:shadow-md transition text-center group">
                <div class="w-10 h-10 rounded-xl bg-emerald-50 dark:bg-emerald-900/20 text-emerald-600
                            flex items-center justify-center group-hover:bg-emerald-600 group-hover:text-white transition">
                    <i data-lucide="award" class="w-5 h-5"></i>
                </div>
                <span class="text-xs font-semibold text-gray-700 dark:text-gray-300">Certificate of Enrollment</span>
            </button>

            <button class="bg-white dark:bg-[#111827] rounded-2xl border border-gray-200 dark:border-gray-800
                           shadow-sm p-4 flex flex-col items-center gap-2 hover:border-blue-400
                           hover:shadow-md transition text-center group">
                <div class="w-10 h-10 rounded-xl bg-amber-50 dark:bg-amber-900/20 text-amber-500
                            flex items-center justify-center group-hover:bg-amber-500 group-hover:text-white transition">
                    <i data-lucide="book-open" class="w-5 h-5"></i>
                </div>
                <span class="text-xs font-semibold text-gray-700 dark:text-gray-300">Grade Slip</span>
            </button>

            <button class="bg-white dark:bg-[#111827] rounded-2xl border border-gray-200 dark:border-gray-800
                           shadow-sm p-4 flex flex-col items-center gap-2 hover:border-blue-400
                           hover:shadow-md transition text-center group">
                <div class="w-10 h-10 rounded-xl bg-purple-50 dark:bg-purple-900/20 text-purple-500
                            flex items-center justify-center group-hover:bg-purple-500 group-hover:text-white transition">
                    <i data-lucide="file-plus" class="w-5 h-5"></i>
                </div>
                <span class="text-xs font-semibold text-gray-700 dark:text-gray-300">Other Request</span>
            </button>

        </div>
    </div>

    {{-- Appointments (takes 1/3 width on xl) --}}
    <div class="bg-white dark:bg-[#111827] rounded-2xl border border-gray-200 dark:border-gray-800 shadow-sm flex flex-col">
        <div class="px-5 py-4 border-b border-gray-100 dark:border-gray-800 flex items-center justify-between">
            <h2 class="font-bold text-gray-800 dark:text-white text-sm">Appointments</h2>
            <button class="flex items-center gap-1 text-xs font-bold text-blue-600
                           hover:bg-blue-50 dark:hover:bg-blue-900/20 px-2.5 py-1.5 rounded-lg transition">
                <i data-lucide="plus" class="w-3.5 h-3.5"></i>
                New
            </button>
        </div>
        <div class="flex-1 flex flex-col items-center justify-center py-8 text-center px-5">
            <div class="w-10 h-10 rounded-xl bg-gray-100 dark:bg-gray-800 flex items-center justify-center mb-3">
                <i data-lucide="calendar-x" class="w-5 h-5 text-gray-400"></i>
            </div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">No active appointments</p>
            <p class="text-xs text-gray-400 mt-1">Book a meeting with your faculty adviser</p>
            <button class="mt-4 text-xs font-semibold text-white bg-blue-600 hover:bg-blue-700
                           px-4 py-2 rounded-xl transition shadow-sm shadow-blue-500/20">
                Book Appointment
            </button>
        </div>
    </div>

</div>

{{-- ── NEW REQUEST MODAL (hidden by default) ── --}}
<div id="newRequestModal"
    class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4">
    <div class="bg-white dark:bg-[#111827] rounded-2xl shadow-xl w-full max-w-md border border-gray-200 dark:border-gray-800">
        <div class="px-6 py-5 border-b border-gray-100 dark:border-gray-800 flex items-center justify-between">
            <h3 class="font-bold text-gray-800 dark:text-white">New Request</h3>
            <button onclick="document.getElementById('newRequestModal').classList.add('hidden')"
                class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 transition">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
        </div>
        <div class="p-6 space-y-4">
            <div>
                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">Request Type</label>
                <select class="w-full border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800
                               rounded-xl px-4 py-2.5 text-sm text-gray-700 dark:text-gray-300
                               focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Select a request type...</option>
                    <option>Transcript of Records</option>
                    <option>Certificate of Enrollment</option>
                    <option>Grade Slip</option>
                    <option>Other Request</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">Notes / Remarks</label>
                <textarea rows="3"
                    class="w-full border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800
                           rounded-xl px-4 py-2.5 text-sm text-gray-700 dark:text-gray-300
                           focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none"
                    placeholder="Add any notes or special instructions..."></textarea>
            </div>
        </div>
        <div class="px-6 py-4 border-t border-gray-100 dark:border-gray-800 flex justify-end gap-3">
            <button onclick="document.getElementById('newRequestModal').classList.add('hidden')"
                class="text-sm font-semibold text-gray-500 hover:text-gray-700 dark:hover:text-gray-300
                       px-4 py-2 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                Cancel
            </button>
            <button class="text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700
                           px-4 py-2 rounded-xl transition shadow-sm">
                Submit Request
            </button>
        </div>
    </div>
</div>

@endsection