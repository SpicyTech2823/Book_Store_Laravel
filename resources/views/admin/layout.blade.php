<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Book Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    @stack('styles')
    <style>
        :root {
            --primary-color: #3b82f6;
            --sidebar-bg: #1f2937;
            --sidebar-text: #e5e7eb;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f3f4f6;
        }

        .admin-layout {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background-color: var(--sidebar-bg);
            color: var(--sidebar-text);
            padding: 20px 0;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
        }

        .sidebar-brand {
            padding: 20px;
            font-size: 20px;
            font-weight: bold;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 20px;
        }

        .sidebar-menu {
            list-style: none;
        }

        .sidebar-menu li {
            margin: 0;
        }

        .sidebar-menu a {
            display: block;
            padding: 12px 20px;
            color: var(--sidebar-text);
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }

        .sidebar-menu a:hover {
            background-color: rgba(59, 130, 246, 0.1);
            border-left-color: var(--primary-color);
        }

        .sidebar-menu a.active {
            background-color: var(--primary-color);
            border-left-color: var(--primary-color);
        }

        .main-content {
            flex: 1;
            margin-left: 250px;
        }

        .topbar {
            background-color: white;
            padding: 15px 30px;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .topbar-title {
            font-size: 24px;
            font-weight: bold;
            color: #1f2937;
        }

        .topbar-user {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            background-color: var(--primary-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }

        .content {
            padding: 30px;
        }

        .card {
            border: none;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: #2563eb;
            border-color: #2563eb;
        }

        .table {
            background-color: white;
        }

        .table thead {
            background-color: #f3f4f6;
        }

        .badge-admin {
            background-color: var(--primary-color);
        }

        .stat-card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .stat-number {
            font-size: 32px;
            font-weight: bold;
            color: var(--primary-color);
        }

        .stat-label {
            color: #6b7280;
            font-size: 14px;
        }

        .alert {
            border-radius: 8px;
            border: none;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(59, 130, 246, 0.25);
        }

        @media (max-width: 768px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
                margin-bottom: 20px;
            }

            .main-content {
                margin-left: 0;
            }

            .admin-layout {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="admin-layout">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-brand">
                <i class="fas fa-book"></i> Book Store Admin
            </div>
            <ul class="sidebar-menu">
                <li><a href="{{ route('admin.dashboard') }}" class="@if(request()->routeIs('admin.dashboard')) active @endif"><i class="fas fa-chart-line"></i> Dashboard</a></li>

                <li><a href="{{ route('admin.books') }}" class="@if(request()->routeIs('admin.books*')) active @endif"><i class="fas fa-book-open"></i> Books</a></li>
                <li><a href="{{ route('admin.categories') }}" class="@if(request()->routeIs('admin.categories*')) active @endif"><i class="fas fa-list"></i> Categories</a></li>
                <li><a href="{{ route('admin.orders') }}" class="@if(request()->routeIs('admin.orders*')) active @endif"><i class="fas fa-shopping-cart"></i> Orders</a></li>
                <li><a href="{{ route('admin.users') }}" class="@if(request()->routeIs('admin.users*')) active @endif"><i class="fas fa-users"></i> Users</a></li>
                <li><a href="{{ route('admin.team-members') }}" class="@if(request()->routeIs('admin.team-members*')) active @endif"><i class="fas fa-users-gear"></i> Team Members</a></li>
                <li><a href="{{ route('admin.testimonials') }}" class="@if(request()->routeIs('admin.testimonials*')) active @endif"><i class="fas fa-star"></i> Testimonials</a></li>
                <li><a href="{{ route('admin.faqs') }}" class="@if(request()->routeIs('admin.faqs*')) active @endif"><i class="fas fa-question-circle"></i> FAQs</a></li>

                <li style="border-top: 1px solid rgba(255, 255, 255, 0.1); margin-top: 20px; padding-top: 20px;">
                    <a href="{{ route('home') }}"><i class="fas fa-home"></i> Back to Store</a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" style="background: none; border: none; color: var(--sidebar-text); padding: 12px 20px; text-align: left; width: 100%; cursor: pointer;">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Topbar -->
            <div class="topbar">
                <div class="topbar-title">@yield('page-title', 'Dashboard')</div>
                <div class="topbar-user">
                    <span>{{ auth()->user()->name }}</span>
                    <div class="user-avatar">{{ substr(auth()->user()->name, 0, 1) }}</div>
                </div>
            </div>

            <!-- Content -->
            <div class="content">
                @if($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle"></i> {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if($message = Session::get('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-circle"></i> {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>

    @stack('modals')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
