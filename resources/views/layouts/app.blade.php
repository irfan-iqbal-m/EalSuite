<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        .sidebar {
            width: 220px;
            min-height: 100vh;
        }
        .sidebar a {
            padding: 10px 15px;
            display: block;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }
        .sidebar a:hover, .sidebar a.active {
            background-color: #495057;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="bg-dark text-white sidebar p-3">
            <h5 class="mb-4"><i class="bi bi-speedometer2 me-2"></i>Admin Panel</h5>
            
            <a href="{{ route('customers.index') }}" class="{{ request()->is('customers*') ? 'active' : '' }}">
                <i class="bi bi-people me-2"></i>Customers
            </a>
            <a href="{{ route('invoices.index') }}" class="{{ request()->is('invoices*') ? 'active' : '' }}">
                <i class="bi bi-receipt me-2"></i>Invoices
            </a>
            <hr class="border-secondary my-3">
            <a href="{{ route('logout') }}">
                <i class="bi bi-box-arrow-right me-2"></i>Logout
            </a>
        </div>

        <!-- Main Content -->
        <div class="flex-grow-1 p-4 bg-light min-vh-100">
            @yield('content')
        </div>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

