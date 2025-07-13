@php
    $role = Auth::user()->role_id ?? '';
@endphp

<aside style="width: 220px; background: #fff; min-height: 100vh; box-shadow: 2px 0 12px rgba(41,128,185,0.07); padding: 0; display: flex; flex-direction: column;">
    <nav style="flex: 1; padding: 24px 0;">
        <ul class="nav flex-column" style="gap: 8px;">
            @if($role === 1)
                <li class="nav-item"><a class="nav-link" href="/admin/dashboard">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="/admin/users">Manage Users</a></li>
                <li class="nav-item"><a class="nav-link" href="/admin/groups">Manage Groups</a></li>
                {{-- <li class="nav-item"><a class="nav-link" href="/admin/settings">Settings</a></li> --}}
            @elseif($role === 2)
                <li class="nav-item"><a class="nav-link" href="/lecturer/dashboard">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="/lecturer/groups">My Groups</a></li>
                <li class="nav-item"><a class="nav-link" href="/lecturer/students">My Students</a></li>
            @elseif($role === 3)
                <li class="nav-item"><a class="nav-link" href="/student/dashboard">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="/student/groups">My Groups</a></li>
                <li class="nav-item"><a class="nav-link" href="/student/lecturers">My Chats</a></li>
                <li class="nav-item"><a class="nav-link" href="/student/profile">Profile</a></li>
            @endif
        </ul>
    </nav>
    <div style="padding: 18px; border-top: 1px solid #e0eafc; text-align: center;">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-outline-danger btn-sm w-100">Logout</button>
        </form>
    </div>
</aside>
