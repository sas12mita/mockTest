<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Super Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('asset/CSS/style.css') }}">
    <style>
        body {
            background-color: #f8f9fc;
        }

        .sidebar {
            height: 100vh;
            background-color: white;
            border-right: 1px solid #e0e0e0;
        }

        .sidebar .nav-link {
            color: #555;
            font-weight: 500;
            padding: 12px 20px;
        }

        nav .nav-link.active {
            background-color: rgb(243, 247, 246);
            color: #1AB08A;
            border-left: 3px solid rgb(10, 79, 152);
        }

        .topbar {
            height: 70px;
            background-color: white;
            border-bottom: 1px solid #e0e0e0;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            padding: 0 30px;
            border-radius: 0 0 10px 10px;
        }

        .profile-img {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #1AB08A;
        }

        .welcome-section {
            padding: 40px;
        }

        .logo {
            width: 160px;
            padding: 15px 20px;
        }

        .nav-icon {
            margin-right: 10px;
        }

        .add-days-btn {
            display: inline-block;
            padding: 4px 10px;
            background-color: #1AB08A;
            color: white;
            font-size: 14px;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
            border: none;
        }

        .action-buttons {
            display: flex;
            gap: 5px;
        }

        .approve-btn {
            background-color: #1AB08A;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 14px;
        }

        .decline-btn {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 14px;
        }

        .edit-btn {
            background-color: #6c757d !important;
            /* Gray color for edit */
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">

            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 sidebar d-flex flex-column p-0">
                <div class="text-center border-bottom py-3">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="logo img-fluid">
                </div>
                <nav class="nav flex-column mt-3">
                    <a class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}"><i class="bi bi-house-door nav-icon"></i> Dashboard</a>
                    <a class="nav-link {{ Route::is('demorequest.index') ? 'active' : '' }}" href="{{ route('demorequest.index') }}"><i class="bi bi-briefcase nav-icon"></i> Demo Request</a>

                </nav>
            </div>

            <!-- Main Content Area -->
            <div class="col-md-9 col-lg-10 p-0">
                <div class="topbar">
                    <div class="d-flex align-items-center gap-3">
                        <!-- Logout Button -->
                        <form action="{{ route('admin.logout') }}" method="POST" class="mb-0">
                            @csrf
                            <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                <i class="bi bi-box-arrow-right"></i> Logout
                            </button>
                        </form>

                        <!-- Profile Image -->
                        <img src="https://randomuser.me/api/portraits/men/85.jpg" alt="Profile" class="profile-img">
                    </div>
                </div>
                <!-- Welcome Section -->
                <!-- Welcome Section -->
                <div class="welcome-section">
                    <h3 class="fw-bold text-dark">👋 Welcome, Admin!</h3>
                    <p class="text-muted">Here is an overview of your dashboard activities.</p>
                </div>
                <!-- Logout Modal -->
                <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="logoutModalLabel">Confirm Logout</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to logout?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <form id="logoutForm" action="{{ route('admin.logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Logout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
</body>

</html>