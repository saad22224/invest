

<style>
    .logout-btn {
        display: inline-block;
        padding: 8px 16px;
        background-color: #e3342f;
        color: #fff;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        text-decoration: none;
    }

    .logout-btn:hover {
        background-color: #cc1f1a;
    }
</style>

<nav class="col-md-1 d-none d-md-block sidebar shadow text-center position-relative pt-2">
    <a href="{{ asset('admin/index.html') }}" class="active">
        <img src="{{ asset('admin/assets/Group 1000007883.png') }}" alt="Dashboard">
        <p class="mb-4">Dashboard</p>
    </a>
    <a href="{{ route('users.index') }}">
        <img src="{{ asset('admin/assets/Group 1000008235.png') }}" alt="User Management">
        <p class="mb-4">User Management</p>
    </a>
    <a href="{{ route('plans.index') }}" target="_self">
        <img src="{{ asset('admin/assets/Vector (2).png') }}" alt="Subscriptions">
        <p class="mb-4">Subscriptions</p>
    </a>
    <a href="{{ asset('admin/sitesetting.html') }}">
        <img src="{{ asset('admin/assets/Group 1000008236.png') }}" alt="Settings">
        <p class="mb-4">Settings</p>
    </a>
    <a href="{{ asset('admin/securitysetting.html') }}">
        <img src="{{ asset('admin/assets/Vector (3).png') }}" alt="Security Settings">
        <p class="mb-4">Security Settings</p>
    </a>
    <a href="{{ asset('admin/backup.html') }}">
        <img src="{{ asset('admin/assets/Group 1000008239.png') }}" alt="Backups">
        <p class="mb-4">Backups</p>
    </a>
    <a href="{{ asset('admin/newapi.html') }}">
        <img src="{{ asset('admin/assets/Group 1000008238.png') }}" alt="API">
        <p class="mb-4">API</p>
    </a>
    
    
    <form action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit" class="logout-btn">
            Logout
        </button>
    </form>
    
    
</nav>
