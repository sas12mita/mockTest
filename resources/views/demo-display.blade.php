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
            <div class="col-md-10 col-lg-10 p-0">
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
                <div class="welcome-section">
                    <!-- Tenant Table Section -->
                    <div class="p-4">
                        <h2 class="fw-semibold text-dark mb-4">Tenant List</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Full Name</th>
                                        <th>Phone Number</th>
                                        <th>Email</th>
                                        <th>Subdomain</th>
                                        <th>Institution</th>
                                        <th>Keywords</th>
                                        <th>Database</th>
                                        <th>Status</th>
                                        <th>Days</th>
                                        <th>Created At</th>
                                        <th>Expired At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($demo_requests as $tenant)
                                    <tr>
                                        <td>{{ $tenant->id }}</td>
                                        <td>{{ $tenant->full_name }}</td>
                                        <td>{{ $tenant->phone_number }}</td>
                                        <td>{{ $tenant->email }}</td>
                                        <td>{{ $tenant->desired_subdomain }}</td>
                                        <td>{{ $tenant->institution_name }}</td>
                                        <td>{{ $tenant->keywords }}</td>
                                        <td>{{ $tenant->database }}</td>
                                        <td>
                                            <span class="badge {{ $tenant->status == 'approved' ? 'bg-success' : ($tenant->status == 'decline' ? 'bg-danger' : 'bg-warning') }}">
                                                {{ ucfirst($tenant->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            @if($tenant->days)
                                            {{ $tenant->days }}
                                            @else
                                            <span style="color: gray; font-style: italic;">no day</span>
                                            @endif
                                        </td>
                                        <td>{{ $tenant->created_at->format('Y-m-d') }}</td>
                                        <td>
                                            @if ($tenant->remaining_days === null)
                                            N/A
                                            @elseif ($tenant->remaining_days < 1)
                                                Expired
                                                @else
                                                {{ $tenant->remaining_days }} days left
                                                @endif
                                                </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton{{ $tenant->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bi bi-three-dot"></i>
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $tenant->id }}">
                                                    @if($tenant->status !== 'approved')
                                                    <li>
                                                        <a class="dropdown-item" href="#"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#approveModal"
                                                            data-tenant-id="{{ $tenant->id }}">
                                                            <i class="bi bi-check-circle-fill text-success me-2"></i>Approve
                                                        </a>
                                                    </li>
                                                    @endif
                                                    @if($tenant->status !== 'approved')
                                                    <li>
                                                        <a class="dropdown-item text-danger" href="#"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#deleteModal"
                                                            data-tenant-id="{{ $tenant->id }}"
                                                            data-tenant-name="{{ $tenant->full_name }}">
                                                            <i class="bi bi-trash-fill text-danger me-2"></i>Delete
                                                        </a>
                                                    </li>
                                                    @endif
                                                    <li>
                                                        <a class="dropdown-item" href="#"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#editmodel"
                                                            data-tenant-id="{{ $tenant->id }}"
                                                            data-tenant-name="{{ $tenant->full_name }}"
                                                            data-tenant-phone="{{ $tenant->phone_number }}"
                                                            data-tenant-email="{{ $tenant->email }}"
                                                            data-tenant-subdomain="{{ $tenant->desired_subdomain }}"
                                                            data-tenant-institution="{{ $tenant->institution_name }}"
                                                            data-tenant-keywords="{{ $tenant->keywords }}"
                                                            data-tenant-database="{{ $tenant->database }}"
                                                            data-tenant-days="{{ $tenant->days ?? '' }}"
                                                            data-tenant-status="{{ $tenant->status }}">
                                                            <i class="bi bi-pencil-fill text-primary me-2"></i>Edit
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="13" class="text-center text-muted">No demo requests found.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Tenant</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <p>Are you sure you want to delete <strong><span id="tenantNameToDelete"></span></strong>?</p>
                        <p class="text-danger">This action cannot be undone.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Approve Modal (Add Days) -->
    <div class="modal fade" id="approveModal" tabindex="-1" aria-labelledby="approveModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="approveModalLabel">Approve Tenant</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="approveForm" method="POST">
                    @csrf
                    <div class="modal-body">
                        <p>Are you sure you want to approve this tenant?</p>
                        <div class="mb-3">
                            <label for="daysInput" class="form-label">Number of Days</label>
                            <input type="number" class="form-control" id="daysInput" name="days" required min="1">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn text-white" style="background-color: #1AB08A;">Approve</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Decline Confirmation Modal -->
    <div class="modal fade" id="declineModal" tabindex="-1" aria-labelledby="declineModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="declineModalLabel">Decline Tenant</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="declineForm" method="POST">
                    @csrf
                    <div class="modal-body">
                        <p>Are you sure you want to decline this tenant?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Decline</button>
                    </div>
                </form>
            </div>
        </div>
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
    <!-- Edit Modal -->
    <!-- Full Edit Tenant Modal -->
    <div class="modal fade" id="editmodel" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form method="POST" action="" id="editTenantForm">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Tenant</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body row g-3">
                        <input type="hidden" name="tenant_id" id="editTenantId">

                        <div class="col-md-6">
                            <label for="editFullName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="editFullName" name="full_name" required>
                        </div>

                        <div class="col-md-6">
                            <label for="editPhone" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="editPhone" name="phone_number" required>
                        </div>

                        <div class="col-md-6">
                            <label for="editEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="editEmail" name="email" required>
                        </div>

                        <div class="col-md-6">
                            <label for="editSubdomain" class="form-label">Subdomain</label>
                            <input type="text" class="form-control" id="editSubdomain" name="desired_subdomain" required>
                        </div>

                        <div class="col-md-6">
                            <label for="editInstitution" class="form-label">Institution Name</label>
                            <input type="text" class="form-control" id="editInstitution" name="institution_name" required>
                        </div>

                        <div class="col-md-6">
                            <label for="editKeywords" class="form-label">Keywords</label>
                            <input type="text" class="form-control" id="editKeywords" name="keywords" required>
                        </div>

                        <div class="col-md-6">
                            <label for="editDatabase" class="form-label">Database</label>
                            <input type="text" class="form-control" id="editDatabase" name="database" required>
                        </div>

                        <div class="col-md-3">
                            <label for="editDays" class="form-label">Days</label>
                            <input type="number" class="form-control" id="editDays" name="days" min="0">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn text-white" style="background-color: #1AB08A;">Update</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery (optional, but useful for AJAX) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            // Handle approve button click
            $('#approveModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var tenantId = button.data('tenant-id'); // Extract info from data-* attributes
                var form = $(this).find('form');
                form.attr('action', '/dashboard/demo-list/updateday/' + tenantId);
            });

            // Handle decline button click
            $('#declineModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var tenantId = button.data('tenant-id'); // Extract info from data-* attributes
                var form = $(this).find('form');
                form.attr('action', '/dashboard/demo-list/statusupdate/' + tenantId);
            });
            // Handle delete button click
            $('#deleteModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var tenantId = button.data('tenant-id');
                var tenantName = button.data('tenant-name');
                var form = $(this).find('form');

                form.attr('action', '/dashboard/demo-list/delete/' + tenantId);
                $('#tenantNameToDelete').text(tenantName);
            });
            // Handle edit button click
            $('#editmodel').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var form = $('#editTenantForm');

                // Set form action
                form.attr('action', '/dashboard/demo-list/update/' + button.data('tenant-id'));

                // Populate all form fields
                $('#editTenantId').val(button.data('tenant-id'));
                $('#editFullName').val(button.data('tenant-name'));
                $('#editPhone').val(button.data('tenant-phone'));
                $('#editEmail').val(button.data('tenant-email'));
                $('#editSubdomain').val(button.data('tenant-subdomain'));
                $('#editInstitution').val(button.data('tenant-institution'));
                $('#editKeywords').val(button.data('tenant-keywords'));
                $('#editDatabase').val(button.data('tenant-database'));
                $('#editDays').val(button.data('tenant-days'));

                // Set the correct status option
                $('#editStatus').val(button.data('tenant-status'));
            });
        });
    </script>
</body>

</html>