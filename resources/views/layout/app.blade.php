<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title', 'Mock Test')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/theme.css') }}">
</head>

<body>
    @include('partial.header')

    @yield('content')
    @if (session()->has('success') || session()->has('error') || session()->has('info'))
    <div class="position-fixed toast-container top-0 end-0 p-3" style="z-index: 5000;">
        @foreach (['success', 'error', 'info'] as $type)
        @if (session()->has($type))
        <div class="bs-toast toast fade show 
        @if ($type == 'error') bg-danger text-white 
        @elseif($type == 'success') bg-primary  text-white
        @else bg-info text-white @endif"
            role="alert"
            aria-live="assertive"
            aria-atomic="true">
            <div class="toast-header 
            @if ($type == 'success') bg-primary  text-white @endif">
                <i class="bx 
                @if ($type == 'success') bx-check-circle 
                @elseif($type == 'error') bx-error 
                @else bx-info-circle @endif 
                me-2"></i>
                <div class="me-auto fw-semibold text-capitalize">
                    {{ $type == 'error' ? 'Error' : ucfirst($type) }}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body 
            @if ($type == 'success') text-white @else text-white @endif">
                {{ session($type) }}
            </div>
        </div>
        @endif
        @endforeach
    </div>
    @endif
    @include('partial.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>