@extends('admin.adminlayout')

@section('title', 'User Management')

@section('content')

    <div class="w-full">

        <!-- PAGE HEADER -->
        <div class="flex flex-col xl:flex-row xl:items-center xl:justify-between gap-6 mt-4 mb-6">

            <div>
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
                    User Management
                </h1>
                <p class="text-gray-500 dark:text-gray-400 mt-1 text-sm">
                    Manage all admins and faculty accounts
                </p>
            </div>

            <button data-modal-target="createUserModal"
                class="flex items-center gap-2 px-5 py-2.5 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition shadow">

                <i data-lucide="user-plus" class="w-4 h-4"></i>
                Add User

            </button>

        </div>

        <!-- SEARCH + FILTERS -->
        <form method="GET" id="filterForm"
            class="bg-white dark:bg-[#1e293b] p-4 rounded-2xl mb-6 border border-gray-200 dark:border-gray-700 shadow-sm">

            <div class="grid md:grid-cols-3 gap-4">
                <!-- SEARCH -->
                <div class="relative">
                    <i data-lucide="search" class="absolute left-3 top-3 w-4 h-4 text-gray-400"></i>
                    <input type="text" name="search" id="searchInput" value="{{ request('search') }}"
                        placeholder="Search name or email..."
                        class="w-full pl-9 pr-3 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm">
                </div>

                <!-- ROLE FILTER -->
                <select name="role" id="roleFilter"
                    class="w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm">
                    <option value="all">All Roles</option>
                    <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="faculty" {{ request('role') == 'faculty' ? 'selected' : '' }}>Faculty</option>
                </select>

                <!-- STATUS FILTER -->
                <select name="status" id="statusFilter"
                    class="w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm">
                    <option value="all">All Status</option>
                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
        </form>

        <!-- USERS TABLE -->
        <div
            class="bg-white dark:bg-[#1e293b] rounded-2xl border border-gray-200 dark:border-gray-700 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="bg-gray-50 dark:bg-gray-800 text-gray-600 dark:text-gray-400">
                        <tr>
                            <th class="px-6 py-4">Name</th>
                            <th class="px-6 py-4">Email</th>
                            <th class="px-6 py-4">Role</th>
                            <th class="px-6 py-4">Position</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4">Last Login</th>
                            <th class="px-6 py-4">Last Logout</th>
                            <th class="px-6 py-4 text-right">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="text-gray-700 dark:text-gray-300">
                        @foreach($users as $user)
                            <tr
                                class="border-t border-gray-100 dark:border-gray-800 hover:bg-gray-50 dark:hover:bg-gray-800 transition">
                                <!-- NAME -->
                                <td class="px-6 py-4 font-medium">
                                    {{ $user->txt_fname }} {{ $user->txt_lname }}
                                </td>

                                <!-- EMAIL -->
                                <td class="px-6 py-4 text-gray-500">
                                    {{ $user->txt_email }}
                                </td>

                                <!-- ROLE -->
                                <td class="px-6 py-4">
                                    @if($user->txt_role == 'admin')
                                        <span class="px-3 py-1 text-xs rounded-full bg-purple-100 text-purple-600">
                                            Admin
                                        </span>

                                    @elseif($user->txt_role == 'faculty')
                                        <span class="px-3 py-1 text-xs rounded-full bg-blue-100 text-blue-600">
                                            Faculty
                                        </span>

                                    @else
                                        <span class="px-3 py-1 text-xs rounded-full bg-emerald-100 text-emerald-600">
                                            Staff {{-- ✅ correct --}}
                                        </span>
                                    @endif
                                </td>

                                <!-- POSITION -->
                                <td class="px-6 py-4 text-gray-700 dark:text-gray-300">
                                    {{ $user->txt_position ?? 'N/A' }}
                                </td>

                                <!-- STATUS -->
                                <td class="px-6 py-4">
                                    @if($user->txt_status == 'active')
                                        <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-600">
                                            Active
                                        </span>
                                    @else
                                        <span class="px-3 py-1 text-xs rounded-full bg-red-100 text-red-600">
                                            Inactive
                                        </span>
                                    @endif
                                </td>

                                <!-- LAST LOGIN -->
                                <td class="px-6 py-4 text-gray-500">
                                    {{ $user->txt_lastlogin ?? 'Never' }}
                                </td>

                                <!-- LAST LOGOUT -->
                                <td class="px-6 py-4 text-gray-500">
                                    {{ $user->txt_lastlogout ?? 'Never' }}
                                </td>

                                <!-- ACTIONS -->
                                <td class="px-6 py-4 flex justify-end gap-3">
                                    <!-- EDIT -->
                                    <button data-id="{{ $user->admin_id }}"
                                        class="editUserBtn p-2 rounded-lg bg-yellow-100 text-yellow-600 hover:bg-yellow-200 transition">
                                        <i data-lucide="edit" class="w-4 h-4"></i>
                                    </button>

                                    <!-- ACTIVATE / DEACTIVATE -->
                                    <form method="POST" action="{{ route('admin.user.toggle', $user->admin_id) }}">
                                        @csrf
                                        <button type="submit"
                                            class="p-2 rounded-lg {{ $user->txt_status == 'active' ? 'bg-red-100 text-red-600 hover:bg-red-200' : 'bg-green-100 text-green-600 hover:bg-green-200'}}">
                                            <i data-lucide="{{ $user->txt_status == 'active' ? 'user-x' : 'user-check' }}"
                                                class="w-4 h-4"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- ADD USER MODAL -->
                <div id="createUserModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">
                    <div class="bg-white dark:bg-[#1e293b] w-full max-w-lg rounded-2xl shadow-xl p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white flex items-center gap-2">
                                <i data-lucide="user-plus" class="w-5 h-5"></i>
                                Add New User
                            </h3>

                            <button onclick="closeModal('createUserModal')">
                                <i data-lucide="x" class="w-5 h-5 text-gray-400"></i>
                            </button>
                        </div>

                        <form method="POST" action="{{ route('admin.user.store') }}">
                            @csrf
                            <div class="grid grid-cols-2 gap-3">
                                <input name="txt_fname" placeholder="First Name" required
                                    class="px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm">
                                <input name="txt_lname" placeholder="Last Name" required
                                    class="px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm">
                            </div>

                            <div class="mt-3">
                                <input name="txt_email" type="email" placeholder="Email" required
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm">
                            </div>

                            <div class="grid grid-cols-2 gap-3 mt-3">
                                <input type="password" name="txt_password" placeholder="Password" required
                                    class="px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm">
                                <input type="password" name="txt_password_confirmation" placeholder="Confirm Password"
                                    required
                                    class="px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm">
                            </div>

                            <div class="mt-3">
                                <select name="txt_role"
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm">
                                    <option value="admin">Admin</option>
                                    <option value="faculty">Faculty</option>
                                    <option value="staff">Staff</option>
                                </select>
                            </div>

                            <div class="mt-3">
                                <input name="txt_position" type="text" placeholder="Position (e.g., Administrative Aide)"
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm">
                            </div>

                            <div class="flex justify-end gap-2 mt-5">
                                <button type="button" onclick="closeModal('createUserModal')"
                                    class="px-4 py-2 rounded-lg bg-gray-200 dark:bg-gray-600 text-sm">
                                    Cancel
                                </button>

                                <button type="submit"
                                    class="px-4 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700 text-sm">
                                    Create User
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- EDIT USER MODAL -->
                <div id="editUserModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">
                    <div class="bg-white dark:bg-[#1e293b] w-full max-w-lg rounded-2xl shadow-xl p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white flex items-center gap-2">
                                <i data-lucide="edit" class="w-5 h-5"></i>
                                Edit User
                            </h3>

                            <button onclick="closeModal('editUserModal')">
                                <i data-lucide="x" class="w-5 h-5 text-gray-400"></i>
                            </button>
                        </div>

                        <form method="POST" id="editUserForm">
                            @csrf
                            <div class="grid grid-cols-2 gap-3">
                                <input type="text" name="txt_fname" required
                                    class="px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm">
                                <input type="text" name="txt_lname" required
                                    class="px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm">
                            </div>

                            <div class="mt-3">
                                <input type="email" name="txt_email" required
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm">
                            </div>

                            <div class="grid grid-cols-2 gap-3 mt-3">
                                <input type="password" name="txt_password" placeholder="New Password (optional)"
                                    class="px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm">
                                <input type="password" name="txt_password_confirmation" placeholder="Confirm Password"
                                    class="px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm">
                            </div>

                            <div class="mt-3">
                                <select name="txt_role"
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm">
                                    <option value="admin">Admin</option>
                                    <option value="faculty">Faculty</option>
                                    <option value="staff">Staff</option>
                                </select>
                            </div>

                            <div class="mt-3">
                                <input type="text" name="txt_position" placeholder="Position (e.g., Administrative Aide)"
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm">
                            </div>

                            <div class="flex justify-end gap-2 mt-5">
                                <button type="button" onclick="closeModal('editUserModal')"
                                    class="px-4 py-2 rounded-lg bg-gray-200 dark:bg-gray-600 text-sm">
                                    Cancel
                                </button>

                                <button type="submit"
                                    class="px-4 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700 text-sm">
                                    Update User
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- LUCIDE ICONS -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();

        const form = document.getElementById('filterForm');
        const search = document.getElementById('searchInput');
        const role = document.getElementById('roleFilter');
        const status = document.getElementById('statusFilter');

        let debounceTimer;

        search.addEventListener('keyup', function () {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => {
                form.submit();
            }, 500);
        });

        role.addEventListener('change', () => form.submit());
        status.addEventListener('change', () => form.submit());

        function closeModal(id) {
            document.getElementById(id).classList.add('hidden');
        }

        document.querySelectorAll('[data-modal-target]').forEach(btn => {
            btn.addEventListener('click', () => {
                const modal = document.getElementById(btn.getAttribute('data-modal-target'));
                modal.classList.remove('hidden');
            });
        });

        document.querySelectorAll('.editUserBtn').forEach(btn => {
            btn.addEventListener('click', async () => {
                const id = btn.dataset.id;
                const res = await fetch(`/admin/user-management/edit/${id}`);
                const data = await res.json();
                const form = document.getElementById('editUserForm');
                form.action = `/admin/user-management/update/${id}`;
                form.txt_fname.value = data.txt_fname;
                form.txt_lname.value = data.txt_lname;
                form.txt_email.value = data.txt_email;
                form.txt_role.value = data.txt_role;
                form.txt_position.value = data.txt_position || '';
                document.getElementById('editUserModal').classList.remove('hidden');
            });
        });
    </script>
@endsection