@extends('Admin.adminlayout')

@section('title', 'Role Permissions')

@section('content')
<div class="w-full px-4 sm:px-6 lg:px-8 py-6">

    {{-- ── Header ── --}}
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Role Permissions</h1>
        <p class="text-gray-500 dark:text-gray-400 mt-1 text-sm">
            Grant or revoke admin-level capabilities for Staff and Faculty accounts.
        </p>
    </div>

    @if(session('success'))
        <div class="mb-5 flex items-center gap-3 p-4 bg-emerald-50 dark:bg-emerald-900/20
                    border border-emerald-200 dark:border-emerald-800/40 rounded-xl text-emerald-700
                    dark:text-emerald-400 text-sm font-semibold">
            <i data-lucide="check-circle" class="w-4 h-4 flex-shrink-0"></i>
            {{ session('success') }}
        </div>
    @endif

    {{-- ── Permission Legend ── --}}
    <div class="bg-white dark:bg-[#1e293b] rounded-2xl border border-gray-100 dark:border-gray-700
                shadow-sm p-5 mb-6">
        <h3 class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-widest mb-3">
            Available Permissions
        </h3>
        <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-6 gap-3">
            @php
            $permissionMeta = [
                'user_approvals'    => ['label' => 'User Approvals',    'icon' => 'user-check',     'color' => 'blue'],
                'student_approvals' => ['label' => 'Student Approvals', 'icon' => 'graduation-cap', 'color' => 'violet'],
                'user_management'   => ['label' => 'User Management',   'icon' => 'users',          'color' => 'indigo'],
                'student_mgmt'      => ['label' => 'Student Mgmt',      'icon' => 'book-open',      'color' => 'sky'],
                'news_management'   => ['label' => 'News Management',   'icon' => 'newspaper',      'color' => 'amber'],
                'activity_logs'     => ['label' => 'Activity Logs',     'icon' => 'scroll-text',    'color' => 'emerald'],
            ];
            $colorMap = [
                'blue'   => ['bg' => 'bg-blue-50 dark:bg-blue-900/20',   'text' => 'text-blue-600 dark:text-blue-400'],
                'violet' => ['bg' => 'bg-violet-50 dark:bg-violet-900/20','text' => 'text-violet-600 dark:text-violet-400'],
                'indigo' => ['bg' => 'bg-indigo-50 dark:bg-indigo-900/20','text' => 'text-indigo-600 dark:text-indigo-400'],
                'sky'    => ['bg' => 'bg-sky-50 dark:bg-sky-900/20',     'text' => 'text-sky-600 dark:text-sky-400'],
                'amber'  => ['bg' => 'bg-amber-50 dark:bg-amber-900/20', 'text' => 'text-amber-600 dark:text-amber-400'],
                'emerald'=> ['bg' => 'bg-emerald-50 dark:bg-emerald-900/20','text' => 'text-emerald-600 dark:text-emerald-400'],
            ];
            @endphp

            @foreach($permissionMeta as $key => $meta)
            @php $c = $colorMap[$meta['color']]; @endphp
            <div class="flex items-center gap-2.5 px-3 py-2.5 rounded-xl {{ $c['bg'] }}">
                <i data-lucide="{{ $meta['icon'] }}" class="w-4 h-4 {{ $c['text'] }} flex-shrink-0"></i>
                <span class="text-xs font-semibold {{ $c['text'] }}">{{ $meta['label'] }}</span>
            </div>
            @endforeach
        </div>
    </div>

    {{-- ── Filters ── --}}
    <form method="GET" action="{{ route('admin.permissions') }}" class="flex flex-wrap gap-3 mb-5">
        <input type="text" name="search" value="{{ request('search') }}"
            placeholder="Search name or email..."
            class="border border-gray-300 dark:border-gray-700 rounded-xl px-4 py-2 text-sm
                   bg-white dark:bg-gray-800 dark:text-gray-200 focus:outline-none
                   focus:ring-2 focus:ring-emerald-400 w-60">

        <select name="role"
            class="border border-gray-300 dark:border-gray-700 rounded-xl px-4 py-2 text-sm
                   bg-white dark:bg-gray-800 dark:text-gray-200 focus:outline-none">
            <option value="all">All Roles</option>
            <option value="staff"   {{ request('role') === 'staff'   ? 'selected' : '' }}>Staff</option>
            <option value="faculty" {{ request('role') === 'faculty' ? 'selected' : '' }}>Faculty</option>
        </select>

        <button type="submit"
            class="px-5 py-2 bg-emerald-600 text-white rounded-xl text-sm hover:bg-emerald-700 transition">
            Filter
        </button>
        <a href="{{ route('admin.permissions') }}"
            class="px-5 py-2 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200
                   rounded-xl text-sm hover:bg-gray-300 dark:hover:bg-gray-600 transition">
            Reset
        </a>
    </form>

    {{-- ── Permissions Table ── --}}
    <div class="bg-white dark:bg-[#1e293b] rounded-2xl border border-gray-100 dark:border-gray-700
                shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-50 dark:bg-gray-800 text-gray-500 dark:text-gray-400
                              text-xs uppercase tracking-wider">
                    <tr>
                        <th class="px-6 py-4 whitespace-nowrap">User</th>
                        <th class="px-4 py-4 whitespace-nowrap">Role</th>
                        <th class="px-4 py-4 text-center whitespace-nowrap">User Approvals</th>
                        <th class="px-4 py-4 text-center whitespace-nowrap">Student Approvals</th>
                        <th class="px-4 py-4 text-center whitespace-nowrap">User Mgmt</th>
                        <th class="px-4 py-4 text-center whitespace-nowrap">Student Mgmt</th>
                        <th class="px-4 py-4 text-center whitespace-nowrap">News Mgmt</th>
                        <th class="px-4 py-4 text-center whitespace-nowrap">Activity Logs</th>
                        <th class="px-4 py-4 text-center whitespace-nowrap">Save</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                    @forelse($users as $user)
                    @php
                        $perms = $user->txt_permissions ?? [];
                        // Support both array and JSON string
                        if (is_string($perms)) $perms = json_decode($perms, true) ?? [];
                    @endphp
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50 transition" id="row-{{ $user->admin_id }}">

                        {{-- Name / Email --}}
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-xl flex items-center justify-center
                                            font-bold text-xs flex-shrink-0
                                            {{ $user->txt_role === 'staff' ? 'bg-amber-100 dark:bg-amber-900/30 text-amber-700 dark:text-amber-300' : 'bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300' }}">
                                    {{ strtoupper(substr($user->txt_fname, 0, 1) . substr($user->txt_lname, 0, 1)) }}
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800 dark:text-gray-200 whitespace-nowrap">
                                        {{ $user->txt_fname }} {{ $user->txt_lname }}
                                    </p>
                                    <p class="text-xs text-gray-400">{{ $user->txt_email }}</p>
                                </div>
                            </div>
                        </td>

                        {{-- Role Badge --}}
                        <td class="px-4 py-4">
                            @if($user->txt_role === 'staff')
                                <span class="px-2 py-1 rounded-full text-xs font-semibold
                                             bg-amber-100 text-amber-700 dark:bg-amber-900 dark:text-amber-300">
                                    Staff
                                </span>
                            @else
                                <span class="px-2 py-1 rounded-full text-xs font-semibold
                                             bg-blue-100 text-blue-700 dark:bg-blue-900 dark:text-blue-300">
                                    Faculty
                                </span>
                            @endif
                        </td>

                        {{-- Permission toggles — one per column --}}
                        @foreach(array_keys($permissionMeta) as $permKey)
                        <td class="px-4 py-4 text-center">
                            <label class="inline-flex items-center justify-center cursor-pointer group">
                                <input type="checkbox"
                                    class="perm-toggle sr-only"
                                    data-user="{{ $user->admin_id }}"
                                    data-perm="{{ $permKey }}"
                                    {{ in_array($permKey, (array)$perms) ? 'checked' : '' }}>
                                <div class="toggle-track relative w-10 h-5 rounded-full transition-colors duration-200
                                            {{ in_array($permKey, (array)$perms) ? 'bg-emerald-500' : 'bg-gray-300 dark:bg-gray-600' }}
                                            group-hover:ring-2 group-hover:ring-offset-1 group-hover:ring-emerald-400
                                            dark:group-hover:ring-offset-gray-900">
                                    <div class="toggle-circle absolute top-0.5 left-0.5 w-4 h-4 bg-white
                                                rounded-full shadow transition-transform duration-200
                                                {{ in_array($permKey, (array)$perms) ? 'translate-x-5' : 'translate-x-0' }}">
                                    </div>
                                </div>
                            </label>
                        </td>
                        @endforeach

                        {{-- Save button --}}
                        <td class="px-4 py-4 text-center">
                            <button onclick="savePermissions({{ $user->admin_id }})"
                                class="save-btn-{{ $user->admin_id }}
                                       px-4 py-1.5 rounded-xl text-xs font-bold
                                       bg-emerald-100 dark:bg-emerald-900/30
                                       text-emerald-700 dark:text-emerald-400
                                       hover:bg-emerald-600 hover:text-white
                                       dark:hover:bg-emerald-600 dark:hover:text-white
                                       border border-emerald-200 dark:border-emerald-800/50
                                       transition whitespace-nowrap flex items-center gap-1.5 mx-auto">
                                <i data-lucide="save" class="w-3 h-3"></i>
                                Save
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="px-6 py-16 text-center text-gray-400">
                            No staff or faculty accounts found.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if($users->hasPages())
            <div class="px-6 py-4 border-t border-gray-100 dark:border-gray-700
                        flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                <p class="text-xs text-gray-400">
                    Showing {{ $users->firstItem() }}–{{ $users->lastItem() }} of {{ $users->total() }} users
                </p>
                {{ $users->appends(request()->query())->links() }}
            </div>
        @elseif($users->total() > 0)
            <div class="px-6 py-4 border-t border-gray-100 dark:border-gray-700">
                <p class="text-xs text-gray-400">Showing all {{ $users->total() }} users</p>
            </div>
        @endif
    </div>

    {{-- ── Bulk Preset Section ── --}}
    <div class="mt-8 bg-white dark:bg-[#1e293b] rounded-2xl border border-gray-100 dark:border-gray-700
                shadow-sm p-6">
        <h3 class="text-sm font-bold text-gray-800 dark:text-white mb-1">Bulk Permission Presets</h3>
        <p class="text-xs text-gray-400 dark:text-gray-500 mb-4">
            Apply a preset to all users of a given role at once. Individual overrides above take priority.
        </p>
        <div class="flex flex-wrap gap-3">

            {{-- Staff preset: Approvals only --}}
            <form method="POST" action="{{ route('admin.permissions.preset') }}">
                @csrf
                <input type="hidden" name="role" value="staff">
                <input type="hidden" name="preset" value="approvals_only">
                <button type="submit"
                    onclick="return confirm('Apply \'Approvals Only\' to all Staff? This will overwrite their current permissions.')"
                    class="flex items-center gap-2 px-4 py-2.5 rounded-xl border border-amber-200
                           dark:border-amber-800/50 bg-amber-50 dark:bg-amber-900/20
                           text-amber-700 dark:text-amber-400 text-xs font-bold hover:bg-amber-100
                           dark:hover:bg-amber-900/40 transition">
                    <i data-lucide="shield-check" class="w-3.5 h-3.5"></i>
                    Staff → Approvals Only
                </button>
            </form>

            {{-- Faculty preset: Read-only logs --}}
            <form method="POST" action="{{ route('admin.permissions.preset') }}">
                @csrf
                <input type="hidden" name="role" value="faculty">
                <input type="hidden" name="preset" value="readonly">
                <button type="submit"
                    onclick="return confirm('Apply \'Read-Only\' to all Faculty? This will overwrite their current permissions.')"
                    class="flex items-center gap-2 px-4 py-2.5 rounded-xl border border-blue-200
                           dark:border-blue-800/50 bg-blue-50 dark:bg-blue-900/20
                           text-blue-700 dark:text-blue-400 text-xs font-bold hover:bg-blue-100
                           dark:hover:bg-blue-900/40 transition">
                    <i data-lucide="eye" class="w-3.5 h-3.5"></i>
                    Faculty → Read-Only (Logs)
                </button>
            </form>

            {{-- Full access preset for specific role --}}
            <form method="POST" action="{{ route('admin.permissions.preset') }}">
                @csrf
                <input type="hidden" name="role" value="staff">
                <input type="hidden" name="preset" value="full">
                <button type="submit"
                    onclick="return confirm('Grant FULL permissions to all Staff? Use with caution.')"
                    class="flex items-center gap-2 px-4 py-2.5 rounded-xl border border-emerald-200
                           dark:border-emerald-800/50 bg-emerald-50 dark:bg-emerald-900/20
                           text-emerald-700 dark:text-emerald-400 text-xs font-bold hover:bg-emerald-100
                           dark:hover:bg-emerald-900/40 transition">
                    <i data-lucide="unlock" class="w-3.5 h-3.5"></i>
                    Staff → Full Access
                </button>
            </form>

            {{-- Revoke all --}}
            <form method="POST" action="{{ route('admin.permissions.preset') }}">
                @csrf
                <input type="hidden" name="role" value="all">
                <input type="hidden" name="preset" value="none">
                <button type="submit"
                    onclick="return confirm('Revoke ALL permissions from every Staff & Faculty user? This cannot be undone.')"
                    class="flex items-center gap-2 px-4 py-2.5 rounded-xl border border-red-200
                           dark:border-red-800/50 bg-red-50 dark:bg-red-900/20
                           text-red-600 dark:text-red-400 text-xs font-bold hover:bg-red-100
                           dark:hover:bg-red-900/40 transition">
                    <i data-lucide="shield-off" class="w-3.5 h-3.5"></i>
                    Revoke All Permissions
                </button>
            </form>

        </div>
    </div>

</div>

{{-- ── Toast notification ── --}}
<div id="permToast"
     class="fixed bottom-6 right-6 z-50 hidden items-center gap-3 px-5 py-3
            bg-gray-900 dark:bg-gray-100 text-white dark:text-gray-900
            rounded-2xl shadow-2xl text-sm font-semibold transition-all">
    <i data-lucide="check-circle" class="w-4 h-4 text-emerald-400 dark:text-emerald-600"></i>
    <span id="permToastMsg">Permissions saved.</span>
</div>

<script>
    lucide.createIcons();

    /* ── Toggle visual sync ── */
    document.querySelectorAll('.perm-toggle').forEach(checkbox => {
        checkbox.addEventListener('change', function () {
            const track  = this.nextElementSibling;
            const circle = track.querySelector('.toggle-circle');
            if (this.checked) {
                track.classList.remove('bg-gray-300', 'dark:bg-gray-600');
                track.classList.add('bg-emerald-500');
                circle.classList.add('translate-x-5');
                circle.classList.remove('translate-x-0');
            } else {
                track.classList.add('bg-gray-300', 'dark:bg-gray-600');
                track.classList.remove('bg-emerald-500');
                circle.classList.remove('translate-x-5');
                circle.classList.add('translate-x-0');
            }
        });
    });

    /* ── Save permissions via AJAX ── */
    function savePermissions(userId) {
        const row   = document.getElementById('row-' + userId);
        const boxes = row.querySelectorAll('.perm-toggle');
        const perms = [];
        boxes.forEach(cb => { if (cb.checked) perms.push(cb.dataset.perm); });

        const btn = row.querySelector('.save-btn-' + userId);
        btn.disabled = true;
        btn.innerHTML = '<svg class="animate-spin w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path></svg> Saving…';

        fetch('{{ route('admin.permissions.update') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ user_id: userId, permissions: perms })
        })
        .then(r => r.json())
        .then(data => {
            showToast(data.message ?? 'Permissions saved.');
            btn.disabled = false;
            btn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg> Save';
            lucide.createIcons();
        })
        .catch(() => {
            showToast('Something went wrong. Please try again.', true);
            btn.disabled = false;
            btn.innerHTML = 'Save';
        });
    }

    /* ── Toast helper ── */
    function showToast(msg, isError = false) {
        const toast = document.getElementById('permToast');
        const text  = document.getElementById('permToastMsg');
        text.textContent = msg;
        toast.classList.remove('hidden');
        toast.classList.add('flex');
        if (isError) {
            toast.classList.add('bg-red-600');
        } else {
            toast.classList.remove('bg-red-600');
        }
        setTimeout(() => {
            toast.classList.add('hidden');
            toast.classList.remove('flex');
        }, 3000);
    }
</script>
@endsection