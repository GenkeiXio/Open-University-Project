@extends('Staff.layout')

@section('title', 'Staff Dashboard')

@push('styles')
<style>
    .stat-card { animation: statIn 0.35s ease both; }
    .stat-card:nth-child(1) { animation-delay: 0.05s; }
    .stat-card:nth-child(2) { animation-delay: 0.10s; }
    .stat-card:nth-child(3) { animation-delay: 0.15s; }
    .stat-card:nth-child(4) { animation-delay: 0.20s; }
    @keyframes statIn {
        from { opacity: 0; transform: translateY(10px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    .activity-dot {
        width: 8px; height: 8px; border-radius: 50%; flex-shrink: 0; margin-top: 4px;
    }
</style>
@endpush

@section('content')

{{-- ── Welcome Header ── --}}
<div class="mb-7">
    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
        Good morning, {{ session('staff_name') ?? 'Staff Member' }} 👋
    </h1>
    <p class="text-sm text-gray-500 dark:text-gray-400 mt-0.5">
        Here's what's happening at the BU Graduate School today.
    </p>
</div>

{{-- ── Stat Cards ── --}}
<div class="grid grid-cols-2 xl:grid-cols-4 gap-4 mb-7">

    <div class="stat-card bg-white dark:bg-[#111827] rounded-2xl border border-gray-200 dark:border-gray-800 p-5 shadow-sm">
        <div class="w-9 h-9 rounded-xl bg-violet-50 dark:bg-violet-900/20 text-violet-600
                    flex items-center justify-center mb-3">
            <i data-lucide="clipboard-list" class="w-4 h-4"></i>
        </div>
        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Active Requests</p>
        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mt-0.5">24</h3>
        <p class="text-[11px] text-gray-400 mt-1 flex items-center gap-1">
            <i data-lucide="trending-up" class="w-3 h-3 text-emerald-500"></i>
            <span class="text-emerald-600 dark:text-emerald-400 font-semibold">+3</span> since yesterday
        </p>
    </div>

    <div class="stat-card bg-white dark:bg-[#111827] rounded-2xl border border-gray-200 dark:border-gray-800 p-5 shadow-sm">
        <div class="w-9 h-9 rounded-xl bg-amber-50 dark:bg-amber-900/20 text-amber-500
                    flex items-center justify-center mb-3">
            <i data-lucide="clock" class="w-4 h-4"></i>
        </div>
        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Pending Review</p>
        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mt-0.5">9</h3>
        <p class="text-[11px] text-gray-400 mt-1">Awaiting your action</p>
    </div>

    <div class="stat-card bg-white dark:bg-[#111827] rounded-2xl border border-gray-200 dark:border-gray-800 p-5 shadow-sm">
        <div class="w-9 h-9 rounded-xl bg-red-50 dark:bg-red-900/20 text-red-500
                    flex items-center justify-center mb-3">
            <i data-lucide="alert-circle" class="w-4 h-4"></i>
        </div>
        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Needs Attention</p>
        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mt-0.5">4</h3>
        <p class="text-[11px] text-gray-400 mt-1">Missing requirements</p>
    </div>

    <div class="stat-card bg-white dark:bg-[#111827] rounded-2xl border border-gray-200 dark:border-gray-800 p-5 shadow-sm">
        <div class="w-9 h-9 rounded-xl bg-emerald-50 dark:bg-emerald-900/20 text-emerald-500
                    flex items-center justify-center mb-3">
            <i data-lucide="check-circle" class="w-4 h-4"></i>
        </div>
        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Approved Today</p>
        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mt-0.5">3</h3>
        <p class="text-[11px] text-gray-400 mt-1">Ready for release</p>
    </div>

</div>

{{-- ── Bottom 2-col ── --}}
<div class="grid grid-cols-1 xl:grid-cols-[1fr_340px] gap-6">

    {{-- Recent Requests ── --}}
    <div class="bg-white dark:bg-[#111827] rounded-2xl border border-gray-200 dark:border-gray-800 shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-800 flex items-center justify-between">
            <div>
                <h2 class="font-bold text-gray-800 dark:text-white text-sm">Recent Requests</h2>
                <p class="text-xs text-gray-400 mt-0.5">Latest student submissions</p>
            </div>
            <a href="{{ route('staff.requests.index') }}"
               class="text-xs font-bold text-violet-600 dark:text-violet-400
                      hover:underline transition">
                View All →
            </a>
        </div>

        <div class="divide-y divide-gray-50 dark:divide-gray-800">
            @php
            $recent = [
                ['initials'=>'MC','name'=>'Maria Cruz','type'=>'Adviser Request','ref'=>'BUOU-25-0482','status'=>'review','pct'=>75,'done'=>3,'total'=>4,'color'=>'violet'],
                ['initials'=>'JD','name'=>'Juan Dela Cruz','type'=>'Defense Application','ref'=>'BUOU-25-0475','status'=>'action','pct'=>25,'done'=>2,'total'=>8,'color'=>'red'],
                ['initials'=>'RS','name'=>'Rina Santos','type'=>'Request Letters','ref'=>'BUOU-25-0468','status'=>'pending','pct'=>33,'done'=>1,'total'=>3,'color'=>'amber'],
                ['initials'=>'BM','name'=>'Ben Mendoza','type'=>'Re-Admission','ref'=>'BUOU-25-0450','status'=>'pending','pct'=>0,'done'=>0,'total'=>1,'color'=>'teal'],
            ];
            $badges = [
                'review'   => ['label'=>'Under Review',    'class'=>'bg-violet-50 dark:bg-violet-900/20 text-violet-700 dark:text-violet-400 border-violet-100 dark:border-violet-800/50'],
                'action'   => ['label'=>'Needs Attention', 'class'=>'bg-red-50 dark:bg-red-900/20 text-red-600 dark:text-red-400 border-red-100 dark:border-red-800/40'],
                'pending'  => ['label'=>'Pending',         'class'=>'bg-amber-50 dark:bg-amber-900/20 text-amber-700 dark:text-amber-400 border-amber-100 dark:border-amber-800/40'],
                'approved' => ['label'=>'Approved',        'class'=>'bg-emerald-50 dark:bg-emerald-900/20 text-emerald-700 dark:text-emerald-400 border-emerald-100 dark:border-emerald-800/40'],
            ];
            @endphp

            @foreach($recent as $i => $r)
            <div class="px-6 py-3.5 flex items-center gap-4 hover:bg-gray-50 dark:hover:bg-gray-800/30 transition">
                <div class="w-8 h-8 rounded-xl bg-{{ $r['color'] }}-100 dark:bg-{{ $r['color'] }}-900/30
                            text-{{ $r['color'] }}-700 dark:text-{{ $r['color'] }}-300
                            flex items-center justify-center font-bold text-xs flex-shrink-0">
                    {{ $r['initials'] }}
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex items-center gap-2">
                        <p class="text-sm font-semibold text-gray-800 dark:text-gray-200 truncate">{{ $r['name'] }}</p>
                        <span class="text-[10px] font-bold border px-2 py-0.5 rounded-full whitespace-nowrap
                                     {{ $badges[$r['status']]['class'] }}">
                            {{ $badges[$r['status']]['label'] }}
                        </span>
                    </div>
                    <div class="flex items-center gap-3 mt-0.5">
                        <p class="text-[11px] text-gray-400 truncate">{{ $r['type'] }}</p>
                        <span class="text-[11px] font-mono text-gray-400">{{ $r['ref'] }}</span>
                    </div>
                </div>
                <div class="flex items-center gap-2 flex-shrink-0">
                    <div class="w-16 h-1.5 bg-gray-100 dark:bg-gray-800 rounded-full overflow-hidden">
                        <div class="h-full rounded-full"
                             style="width:{{ $r['pct'] }}%; background: linear-gradient(90deg,#7c3aed,#a78bfa)"></div>
                    </div>
                    <span class="text-[11px] text-gray-400">{{ $r['done'] }}/{{ $r['total'] }}</span>
                </div>
                <a href="{{ route('staff.requests.checklist', ['id' => $i + 1]) }}"
                   class="flex-shrink-0 inline-flex items-center gap-1 text-[11px] font-bold
                          text-violet-600 dark:text-violet-400 hover:underline transition">
                    <i data-lucide="eye" class="w-3 h-3"></i>
                    View
                </a>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Right column ── --}}
    <div class="space-y-5">

        {{-- Quick Actions ── --}}
        <div class="bg-white dark:bg-[#111827] rounded-2xl border border-gray-200 dark:border-gray-800 shadow-sm p-5">
            <h3 class="text-sm font-bold text-gray-800 dark:text-white mb-4">Quick Actions</h3>
            <div class="space-y-2">
                <a href="{{ route('staff.requests.index') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl border border-gray-200 dark:border-gray-700
                          hover:border-violet-400 hover:bg-violet-50 dark:hover:bg-violet-900/20
                          dark:hover:border-violet-600 transition group">
                    <div class="w-8 h-8 rounded-lg bg-violet-50 dark:bg-violet-900/20 text-violet-600
                                flex items-center justify-center group-hover:bg-violet-600 group-hover:text-white transition">
                        <i data-lucide="clipboard-list" class="w-4 h-4"></i>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-gray-700 dark:text-gray-200">Review Requests</p>
                        <p class="text-[11px] text-gray-400">9 pending your review</p>
                    </div>
                    <i data-lucide="arrow-right" class="w-3.5 h-3.5 text-gray-300 ml-auto group-hover:text-violet-500 transition"></i>
                </a>

                <a href="{{ route('staff.users.index') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl border border-gray-200 dark:border-gray-700
                          hover:border-amber-400 hover:bg-amber-50 dark:hover:bg-amber-900/20
                          dark:hover:border-amber-600 transition group">
                    <div class="w-8 h-8 rounded-lg bg-amber-50 dark:bg-amber-900/20 text-amber-600
                                flex items-center justify-center group-hover:bg-amber-500 group-hover:text-white transition">
                        <i data-lucide="user-plus" class="w-4 h-4"></i>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-gray-700 dark:text-gray-200">User Approvals</p>
                        <p class="text-[11px] text-gray-400">3 accounts pending</p>
                    </div>
                    <i data-lucide="arrow-right" class="w-3.5 h-3.5 text-gray-300 ml-auto group-hover:text-amber-500 transition"></i>
                </a>

                <a href="{{ route('staff.thesis.index') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl border border-gray-200 dark:border-gray-700
                          hover:border-sky-400 hover:bg-sky-50 dark:hover:bg-sky-900/20
                          dark:hover:border-sky-600 transition group">
                    <div class="w-8 h-8 rounded-lg bg-sky-50 dark:bg-sky-900/20 text-sky-600
                                flex items-center justify-center group-hover:bg-sky-600 group-hover:text-white transition">
                        <i data-lucide="book-marked" class="w-4 h-4"></i>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-gray-700 dark:text-gray-200">Thesis & Dissertation</p>
                        <p class="text-[11px] text-gray-400">View submissions</p>
                    </div>
                    <i data-lucide="arrow-right" class="w-3.5 h-3.5 text-gray-300 ml-auto group-hover:text-sky-500 transition"></i>
                </a>
            </div>
        </div>

        {{-- Recent Activity ── --}}
        <div class="bg-white dark:bg-[#111827] rounded-2xl border border-gray-200 dark:border-gray-800 shadow-sm p-5">
            <h3 class="text-sm font-bold text-gray-800 dark:text-white mb-4">Recent Activity</h3>
            <div class="space-y-3.5">
                @php
                $activity = [
                    ['dot'=>'bg-emerald-400','text'=>'Ana Lim\'s Comprehensive Exam checklist was approved.','time'=>'2 min ago'],
                    ['dot'=>'bg-violet-400','text'=>'You left a note on Maria Cruz\'s adviser request (Item 4).','time'=>'1 hr ago'],
                    ['dot'=>'bg-amber-400','text'=>'Ben Mendoza filed a new Re-Admission request.','time'=>'3 hrs ago'],
                    ['dot'=>'bg-red-400','text'=>'Juan Dela Cruz\'s defense checklist flagged as Needs Attention.','time'=>'Yesterday'],
                    ['dot'=>'bg-sky-400','text'=>'Paolo Garcia uploaded documents for Panel Committee.','time'=>'Yesterday'],
                ];
                @endphp
                @foreach($activity as $a)
                <div class="flex items-start gap-3">
                    <div class="activity-dot {{ $a['dot'] }} mt-1.5"></div>
                    <div class="flex-1 min-w-0">
                        <p class="text-xs text-gray-700 dark:text-gray-300 leading-relaxed">{{ $a['text'] }}</p>
                        <p class="text-[10px] text-gray-400 mt-0.5">{{ $a['time'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</div>

@endsection