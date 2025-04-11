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

    /* إخفاء الشريط الجانبي في الموبايل */
    .mobile {
        display: none;
    }

    /* إظهار الزر في الموبايل فقط */
    .sidebar-toggle-btn {
        display: none;
    }

    /* إظهار الزر فقط في الموبايل */
    @media (max-width: 767px) {
        .sidebar-toggle-btn {
            display: block;
            position: fixed;
            top: 20px;
            left: 20px;
            background-color: #e3342f;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 20px;
            cursor: pointer;
            z-index: 1000;
        }

        .mobile.show {
            display: block;
        }
    }
</style>

<!-- الشريط الجانبي في النسخة الكبيرة -->
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

<!-- الزر لفتح الشريط الجانبي في الموبايل -->
<button class="sidebar-toggle-btn" onclick="toggleSidebar()">☰</button>

<!-- الشريط الجانبي في النسخة الموبايل -->
<nav class="mobile col-md-1 d-md-none sidebar shadow text-center position-relative pt-2">
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

<script>
    function toggleSidebar() {
        var sidebar = document.querySelector('.mobile');
        sidebar.classList.toggle('show');
    }
</script>
