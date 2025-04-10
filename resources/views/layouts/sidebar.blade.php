

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
    <a href="{{ route('admin.dashboard') }}" class="active">
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
    <a href="{{route('withdrawls.index')}}">
        <img src="{{ asset('admin/assets/Group 1000008236.png') }}" alt="Settings">
        <p class="mb-4">withdrawls</p>
    </a>
   
    
    <form action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit" class="logout-btn">
            Logout
        </button>
    </form>
    
    
</nav>
