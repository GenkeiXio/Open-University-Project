<!DOCTYPE html>
<html lang="en" class="transition-colors duration-300">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>OU User Management Page</title>

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
            <div class="text-gray-400 font-semibold dark:text-gray-500">User Management</div>

        <!-- Collapsible Sections (Transcriptions, Minutes) -->
            <a href="{{ url('/dashboard') }}" class="flex items-center gap-2 w-full px-3 py-2 rounded-xl bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-100 hover:bg-blue-100 dark:hover:bg-blue-800/40 transition">
                <i data-lucide="house"></i> Dashboard
            </a>

            <a href="{{ route('admin.users') }}"
                class="flex items-center gap-2 w-full px-3 py-2 rounded-xl bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-100 hover:bg-blue-100 dark:hover:bg-blue-800/40 transition">
                <i data-lucide="users"></i> User Management
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

        <!-- Header -->
        <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-8">
          <div>
            <h2 class="text-2xl font-semibold tracking-tight">User Management</h2>
          </div>

          <div class="flex items-center gap-3">
            <button
              onclick="openAddUserModal()"
              class="flex items-center gap-2 px-4 py-2 rounded-lg bg-blue-600 text-white text-sm font-medium hover:bg-blue-700 active:scale-[.98] transition">
              <i data-lucide="user-plus" class="w-4 h-4"></i> Add User
            </button>

            <button id="themeToggle"
              class="text-gray-600 dark:text-gray-300 cursor-pointer"
              title="Toggle Dark Mode">
              <span id="themeIcon" data-lucide="moon"></span>
            </button>
          </div>
        </div>

        <!-- Stats -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
          <!-- Total Users -->
          <div class="relative p-5 bg-white dark:bg-gray-800 rounded-xl shadow">
            <div class="absolute top-4 right-4 text-gray-300 dark:text-gray-600">
              <i data-lucide="users" class="w-6 h-6"></i>
            </div>

            <p class="text-sm text-gray-500 dark:text-gray-400">Total Users</p>
            <h3 class="text-3xl font-bold mt-1">{{ $totalUsers }}</h3>
            <p class="text-xs text-green-500 mt-1">All Registered Users</p>
          </div>

          <!-- Active Users -->
          <div class="relative p-5 bg-white dark:bg-gray-800 rounded-xl shadow">
            <div class="absolute top-4 right-4 text-green-400/70">
              <i data-lucide="user-check" class="w-6 h-6"></i>
            </div>

            <p class="text-sm text-gray-500 dark:text-gray-400">Active Users</p>
            <h3 class="text-3xl font-bold text-green-500 mt-1">{{ $activeUsers }}</h3>
            <p class="text-xs text-green-500 mt-1">Currently Active</p>
          </div>

          <!-- Inactive Users -->
          <div class="relative p-5 bg-white dark:bg-gray-800 rounded-xl shadow">
            <div class="absolute top-4 right-4 text-red-400/70">
              <i data-lucide="user-x" class="w-6 h-6"></i>
            </div>

            <p class="text-sm text-gray-500 dark:text-gray-400">Inactive Users</p>
            <h3 class="text-3xl font-bold mt-1">{{ $inactiveUsers }}</h3>
            <p class="text-xs text-red-500 mt-1">Inactive Accounts</p>
          </div>

          <!-- Admins -->
          <div class="relative p-5 bg-white dark:bg-gray-800 rounded-xl shadow">
            <div class="absolute top-4 right-4 text-blue-400/70">
              <i data-lucide="shield-user" class="w-6 h-6"></i>
            </div>

            <p class="text-sm text-gray-500 dark:text-gray-400">Admins</p>
            <h3 class="text-3xl font-bold text-blue-500 mt-1">{{ $adminUsers }}</h3>
            <p class="text-xs text-blue-500 mt-1">Aministartive Staff</p>
          </div>
        </div>

        <!-- Filters -->
        <form method="GET"
          action="{{ route('admin.users') }}"
          class="border border-gray-200 dark:border-gray-700 rounded-2xl bg-white dark:bg-gray-900 px-6 py-4 mb-6 shadow-sm">

          <div class="flex flex-col md:flex-row items-center gap-4">

            <!-- Search -->
            <div class="flex flex-1 gap-2 w-full">
              <input type="text" id="userSearch" name="search" value="{{ request('search') }}" placeholder="Search by name or username..." autocomplete="off" class="flex-1 px-5 py-3 rounded-xl bg-gray-100 dark:bg-gray-800 text-sm outline-none focus:ring-2 focus:ring-blue-500/40 transition"/>

              <button type="button" id="searchBtn" class="px-5 py-3 rounded-xl bg-blue-600 text-white text-sm font-medium hover:bg-blue-700 transition flex items-center gap-2">
                <i data-lucide="search" class="w-4 h-4"></i>
                Search
              </button>
            </div>

            <!-- Role -->
            <select name="role" onchange="this.form.submit()" class="px-4 py-3 rounded-xl bg-gray-100 dark:bg-gray-800 text-sm">
              <option value="all">All Roles</option>
              <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
              <option value="staff" {{ request('role') == 'staff' ? 'selected' : '' }}>Staff</option>
            </select>

            <!-- Status -->
            <select name="status" onchange="this.form.submit()"
              class="px-5 py-3 rounded-xl bg-gray-100 dark:bg-gray-800 text-sm outline-none focus:ring-2 focus:ring-blue-500/40 transition">
              <option value="all">All Status</option>
              <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Active</option>
              <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>

          </div>
        </form>

        <!-- Users Table -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow overflow-x-auto">
          <table class="w-full text-sm">
            <thead class="bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300">
              <tr>
                <th class="px-4 py-3 text-left">User</th>
                <th class="px-4 py-3 text-left">Role</th>
                <th class="px-4 py-3 text-left">Status</th>
                <th class="px-4 py-3 text-left">Permissions</th>
                <th class="px-4 py-3 text-left">Last Login</th>
                <th class="px-4 py-3 text-center">Actions</th>
              </tr>
            </thead>

            <tbody id="usersTableBody" class="divide-y dark:divide-gray-700">

              @forelse($users as $user)
              <tr class="{{ $user->status === 'inactive' ? 'opacity-50' : '' }}">

                <!-- User -->
                <td class="px-4 py-3">
                  <p class="font-medium">{{ $user->name }}</p>
                  <p class="text-xs text-gray-500">{{ $user->username }}</p>
                </td>

                <!-- Role -->
                <td>
                  <span class="px-3 py-1 text-xs rounded-full
                    {{ $user->role === 'admin'
                        ? 'bg-blue-500/20 text-blue-500'
                        : 'bg-gray-500/20 text-gray-500' }}">
                    {{ ucfirst($user->role) }}
                  </span>
                </td>

                <!-- Status -->
                <td>
                  <span class="px-3 py-1 text-xs rounded-full
                    {{ $user->status === 'active'
                        ? 'bg-green-500/20 text-green-500'
                        : 'bg-red-500/20 text-red-500' }}">
                    {{ ucfirst($user->status) }}
                  </span>
                </td>

                <!-- Permissions-->
                <td class="flex gap-2 py-3 flex-wrap">
                  @foreach (['view','upload','download','delete'] as $perm)
                    @if($user->permissions[$perm] ?? false)
                      <span class="px-2 py-1 border rounded text-xs text-green-600 border-green-400">
                        {{ ucfirst($perm) }}
                      </span>
                    @else
                      <span class="px-2 py-1 border rounded text-xs text-gray-400 line-through">
                        {{ ucfirst($perm) }}
                      </span>
                    @endif
                  @endforeach
                </td>

                <!-- Last Login -->
                <td>
                  {{ $user->last_login
                    ? \Carbon\Carbon::parse($user->last_login)->format('M d, Y h:i A')
                    : '—' }}
                </td>

                <!-- Actions -->
                <td class="px-4 py-3">
                  <div class="flex justify-center gap-2">

                    @if(auth('staff')->id() !== $user->staff_id)
                      <button onclick="openEditUserModal({{ $user->staff_id }})"
                        class="p-2 rounded-lg border border-gray-200 dark:border-gray-700">
                        <i data-lucide="edit"></i>
                      </button>
                    @else
                      <button disabled
                        title="You cannot edit your own account"
                        class="p-2 rounded-lg border border-gray-200 dark:border-gray-700 opacity-40 cursor-not-allowed">
                        <i data-lucide="lock"></i>
                      </button>
                    @endif

                    @if(auth('staff')->id() !== $user->staff_id)
                    <form method="POST" action="{{ route('admin.users.toggle', $user->staff_id) }}">
                      @csrf
                      @method('PATCH')
                      <button class="p-2 rounded-lg border border-gray-200 dark:border-gray-700">
                        <i data-lucide="{{ $user->status === 'active' ? 'user-x' : 'user-check' }}"></i>
                      </button>
                    </form>
                    @else
                    <button disabled
                      class="p-2 rounded-lg border border-gray-200 dark:border-gray-700 opacity-40 cursor-not-allowed">
                      <i data-lucide="lock"></i>
                    </button>
                    @endif
                  </div>
                </td>

              </tr>

              @empty
              <tr>
                <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                  No users found.
                </td>
              </tr>
              @endforelse

            </tbody>
          </table>
        </div>

        <!-- Pagination -->
        <div class="flex items-center justify-between mt-4 text-sm text-gray-600 dark:text-gray-400">

          <!-- Rows Per Page -->
          <div>
            Rows per page
            <form method="GET" class="inline">
              <input type="hidden" name="search" value="{{ request('search') }}">
              <input type="hidden" name="role" value="{{ request('role') }}">
              <input type="hidden" name="status" value="{{ request('status') }}">

              <select name="per_page" onchange="this.form.submit()"
                class="ml-2 px-2 py-1 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-800 dark:text-white">
                <option value="10" {{ request('per_page',10)==10?'selected':'' }}>10</option>
                <option value="25" {{ request('per_page')==25?'selected':'' }}>25</option>
                <option value="50" {{ request('per_page')==50?'selected':'' }}>50</option>
              </select>
            </form>
          </div>

          <!-- Page Links -->
          <div>
            {{ $users->links() }}
          </div>

        </div>
      </main>
    </div>

    <!-- Add User Modal -->
    <div id="addUserModal"
        class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 backdrop-blur-sm">
      <div class="w-full max-w-md bg-white dark:bg-gray-900 rounded-2xl shadow-xl p-6 relative">

        <!-- Close Button -->
        <button onclick="closeAddUserModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
          <i data-lucide="x"></i>
        </button>

        <!-- Header -->
        <h3 class="text-lg font-semibold mb-1">Create New User</h3>
        <p class="text-sm text-gray-500 mb-6">Add a new user to the iFiLMS system</p>

        <!-- Form -->
        <form method="POST" action="{{ route('admin.users.store') }}" class="space-y-4">
        @csrf
          <!-- Username -->
          <div>
            <label class="text-sm font-medium">Username</label>
            <input name="username" type="text" placeholder="username" required class="mt-1 w-full px-4 py-3 rounded-xl bg-gray-100 dark:bg-gray-800 text-sm outline-none focus:ring-2 focus:ring-blue-500/40 transition">
          </div>

          <!-- Password -->
          <div>
            <label class="text-sm font-medium">Password</label>

            <div class="relative mt-1">
              <input id="addPassword" name="password" type="password" placeholder="••••••••" required class="w-full px-4 py-3 pr-12 rounded-xl bg-gray-100 dark:bg-gray-800 text-sm outline-none focus:ring-2 focus:ring-blue-500/40 transition">

              <!-- Toggle -->
              <button type="button" onclick="togglePassword('addPassword', this)" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                <i data-lucide="eye"></i>
              </button>
            </div>
          </div>

          <!-- Name -->
          <div>
            <label class="text-sm font-medium">Name</label>
            <input name="name" type="text" placeholder="Full name" required class="mt-1 w-full px-4 py-3 rounded-xl bg-gray-100 dark:bg-gray-800 text-sm outline-none focus:ring-2 focus:ring-blue-500/40 transition">
          </div>

          <!-- Role -->
          <div>
            <label class="text-sm font-medium">Role</label>
            <select name="role"class="px-5 py-3 rounded-xl bg-gray-100 dark:bg-gray-800 text-sm outline-none focus:ring-2 focus:ring-blue-500/40 transition">
                <option value="admin">Admin</option>
                <option value="staff">Staff</option>
            </select>
          </div>

          <!-- Permissions -->
          <div>
            <label class="text-sm font-medium mb-2 block">Permissions</label>
            <div class="grid grid-cols-2 gap-3 text-sm">
              <label class="flex items-center gap-2">
                <input type="checkbox" name="permissions[upload]" checked class="rounded text-blue-600"> Upload
              </label>

              <label class="flex items-center gap-2">
                <input type="checkbox" name="permissions[download]" checked class="rounded text-blue-600"> Download
              </label>

              <label class="flex items-center gap-2">
                <input type="checkbox" name="permissions[view]" checked class="rounded text-blue-600"> View
              </label>

              <label class="flex items-center gap-2">
                <input type="checkbox" name="permissions[delete]" class="rounded text-blue-600"> Delete
              </label>
            </div>
          </div>

          <!-- Actions -->
          <div class="flex justify-end gap-3 pt-4">
            <button type="button" onclick="closeAddUserModal()" class="px-4 py-2 rounded-lg text-sm border border-gray-300 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800 transition"> 
              Cancel
            </button>

            <button type="submit" class="px-4 py-2 rounded-lg text-sm font-medium bg-blue-600 text-white hover:bg-blue-700 active:scale-[.98] transition">
              Create User
            </button>
          </div>
        </form>
      </div>
    </div>

    <!-- Edit User Modal -->
    <div id="editUserModal"
      class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 backdrop-blur-sm">

      <div class="w-full max-w-md bg-white dark:bg-gray-900 rounded-2xl shadow-xl p-6 relative">

        <!-- Close -->
        <button onclick="closeEditUserModal()"
          class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
          <i data-lucide="x"></i>
        </button>

        <!-- Header -->
        <h3 class="text-lg font-semibold mb-1">Edit User</h3>
        <p class="text-sm text-gray-500 mb-6">Update user information and permissions</p>

        <!-- Form -->
        <form method="POST" action="{{ route('admin.users.update', $user->staff_id ?? 0) }}">
        @csrf
        @method('PUT')
          <!-- Username -->
          <div>
            <label class="text-sm font-medium">Username</label>
            <input name="username" type="text" class="mt-1 w-full px-4 py-3 rounded-xl bg-gray-100 dark:bg-gray-800 text-sm outline-none focus:ring-2 focus:ring-blue-500/40 transition">
          </div>

          <!-- Password -->
          <div>
            <label class="text-sm font-medium">
              Password <span class="text-xs text-gray-400">(leave blank to keep current)</span>
            </label>

            <div class="relative mt-1">
              <input id="editPassword" name="password" type="password" placeholder="••••••••" class="w-full px-4 py-3 pr-12 rounded-xl bg-gray-100 dark:bg-gray-800 text-sm outline-none focus:ring-2 focus:ring-blue-500/40 transition">

              <!-- Toggle -->
              <button type="button" onclick="togglePassword('editPassword', this)" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                <i data-lucide="eye"></i>
              </button>
            </div>
          </div>

          <!-- Name -->
          <div>
            <label class="text-sm font-medium">Name</label>
            <input name="name" type="text" class="mt-1 w-full px-4 py-3 rounded-xl bg-gray-100 dark:bg-gray-800 text-sm outline-none focus:ring-2 focus:ring-blue-500/40 transition">
          </div>

          <!-- Role -->
          <div>
            <label class="text-sm font-medium">Role</label>
            <select name="role" class="mt-1 w-full px-4 py-3 rounded-xl bg-gray-100 dark:bg-gray-800 text-sm outline-none focus:ring-2 focus:ring-blue-500/40 transition">
              <option value="admin">Admin</option>
              <option value="staff">Staff</option>
            </select>
          </div>

          <!-- Permissions -->
          <div>
            <label class="text-sm font-medium mb-2 block">Permissions</label>
            <div class="grid grid-cols-2 gap-3 text-sm">
              <label class="flex items-center gap-2">
                <input type="checkbox" name="permissions[upload]" class="rounded text-blue-600"> Upload
              </label>
              <label class="flex items-center gap-2">
                <input type="checkbox" name="permissions[download]" class="rounded text-blue-600"> Download
              </label>
              <label class="flex items-center gap-2">
                <input type="checkbox" name="permissions[view]" class="rounded text-blue-600"> View
              </label>
              <label class="flex items-center gap-2">
                <input type="checkbox" name="permissions[delete]" class="rounded text-blue-600"> Delete
              </label>
            </div>
          </div>

          <!-- Actions -->
          <div class="flex justify-end gap-3 pt-4">
            <button type="button" onclick="closeEditUserModal()"
              class="px-4 py-2 rounded-lg text-sm border border-gray-300 dark:border-gray-700
                    hover:bg-gray-100 dark:hover:bg-gray-800 transition">
              Cancel
            </button>

            <button type="submit"
              class="px-4 py-2 rounded-lg text-sm font-medium bg-blue-600 text-white
                    hover:bg-blue-700 active:scale-[.98] transition">
              Save Changes
            </button>
          </div>
        </form>
      </div>
    </div>

    <!-- Footer -->
    <footer class="text-center py-4 text-xs text-gray-400 dark:text-gray-500">
      © 2025 Bicol University Board of Regents • All rights reserved.
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/dayjs@1/dayjs.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/dayjs@1/plugin/relativeTime.js"></script>  
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

      // Run immediately and then every 60s
      refreshTimes();
      setInterval(refreshTimes, 60000);

      const searchBtn   = document.getElementById('searchBtn');
      const searchInput = document.getElementById('userSearch');
      const tableBody   = document.getElementById('usersTableBody');

      searchBtn.addEventListener('click', () => {
          const originalPlaceholder = searchInput.placeholder;
          searchInput.placeholder = 'Searching...';

          const params = new URLSearchParams({
              search: searchInput.value.trim(),
              role: document.querySelector('select[name="role"]').value,
              status: document.querySelector('select[name="status"]').value,
              per_page: document.querySelector('select[name="per_page"]')?.value ?? 10
          });

          fetch(`{{ route('admin.users') }}?${params.toString()}`, {
              headers: { 'X-Requested-With': 'XMLHttpRequest' }
          })
          .then(res => res.text())
          .then(html => {
              const parser = new DOMParser();
              const doc = parser.parseFromString(html, 'text/html');
              const newBody = doc.querySelector('#usersTableBody');

              if (newBody) {
                  tableBody.innerHTML = newBody.innerHTML;
                  lucide.createIcons();
              }

              searchInput.placeholder = originalPlaceholder;
          })
          .catch(() => {
              searchInput.placeholder = originalPlaceholder;
          });
      });

      function openAddUserModal() {
        document.getElementById('addUserModal').classList.remove('hidden');
        document.getElementById('addUserModal').classList.add('flex');
      }

      function closeAddUserModal() {
        document.getElementById('addUserModal').classList.add('hidden');
        document.getElementById('addUserModal').classList.remove('flex');
      }

      function toggleActionPopup(button) {
        const popup = button.nextElementSibling;

        // Close other popups
        document.querySelectorAll('.action-popup').forEach(p => {
          if (p !== popup) p.classList.add('hidden');
        });

        popup.classList.toggle('hidden');
      }

      document.addEventListener('click', (e) => {
        if (!e.target.closest('.relative')) {
          document.querySelectorAll('.action-popup').forEach(p => {
            p.classList.add('hidden');
          });
        }
      });

      function openEditUserModal(id) {
        fetch(`/admin/users/${id}/edit`)
          .then(r => r.json())
          .then(u => {
            const m = document.getElementById('editUserModal');

            m.querySelector('[name=name]').value = u.name;
            m.querySelector('[name=username]').value = u.username;
            m.querySelector('[name=role]').value = u.role;

            ['upload','download','view','delete'].forEach(p => {
              m.querySelector(`[name="permissions[${p}]"]`).checked = !!u.permissions?.[p];
            });

            // 🔐 IMPORTANT: clear password field
            m.querySelector('#editPassword').value = '';

            m.querySelector('form').action = `/admin/users/${id}`;
            m.classList.remove('hidden');
            m.classList.add('flex');
          });
      }

      document.addEventListener('DOMContentLoaded', () => {

          // Save original role when modal opens
          document.addEventListener('focusin', (e) => {
              if (e.target.classList.contains('edit-user-role')) {
                  e.target.dataset.original = e.target.value;
              }
          });

          // Confirm only when editing role
          document.addEventListener('change', (e) => {
              if (!e.target.classList.contains('edit-user-role')) return;

              const confirmed = confirm(
                  'Changing role will affect permissions. Continue?'
              );

              if (!confirmed) {
                  e.target.value = e.target.dataset.original;
              } else {
                  e.target.dataset.original = e.target.value;
              }
          });

      });

      function closeEditUserModal() {
        const modal = document.getElementById('editUserModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
      }

      function togglePassword(inputId, btn) {
        const input = document.getElementById(inputId);
        const icon = btn.querySelector('i');

        if (input.type === 'password') {
          input.type = 'text';
          icon.setAttribute('data-lucide', 'eye-off');
        } else {
          input.type = 'password';
          icon.setAttribute('data-lucide', 'eye');
        }

          lucide.createIcons();
        }
    </script>
  </body>
</html>
