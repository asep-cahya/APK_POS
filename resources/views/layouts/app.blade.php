<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>

        body {
            margin: 0;
            background: #f8fafc;
            color: #111827;
            font-family: Arial, Helvetica, sans-serif;
        }

        .container {
            max-width: 1200px;
        }

        .alert {
            border: none;
            border-radius: 12px;
            padding: 14px 18px;
            margin-top: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        }

        .alert-success {
            background: #ecfdf5;
            color: #047857;
        }

        .alert-danger {
            background: #fef2f2;
            color: #b91c1c;
        }

        .card {
            border: 1px solid #e5e7eb !important;
            box-shadow: 0 4px 15px rgba(15, 23, 42, 0.04) !important;
            border-radius: 16px !important;
            background: #ffffff;
        }

        .btn {
            border-radius: 9px !important;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .btn-dark {
            background: #111827 !important;
            border-color: #111827 !important;
        }

        .btn-dark:hover {
            background: #10b981 !important;
            border-color: #10b981 !important;
        }

        .btn-outline-dark {
            color: #111827 !important;
            border-color: #d1d5db !important;
        }

        .btn-outline-dark:hover {
            background: #111827 !important;
            border-color: #111827 !important;
            color: #ffffff !important;
        }

        .table {
            margin-bottom: 0;
        }

        .table thead th {
            background: #f8fafc;
            color: #6b7280;
            font-size: 13px;
            font-weight: 600;
            border-bottom: 1px solid #e5e7eb;
            padding: 14px 16px;
        }

        .table tbody td {
            padding: 15px 16px;
            border-bottom: 1px solid #f1f5f9;
            color: #374151;
        }

        .table tbody tr:last-child td {
            border-bottom: none;
        }

        .table tbody tr:hover {
            background: #f9fafb;
        }

        .form-control,
        .form-select {
            border: 1px solid #d1d5db;
            border-radius: 10px;
            padding: 11px 13px;
            color: #111827;
            box-shadow: none !important;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #10b981;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.10) !important;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: #111827;
            letter-spacing: -0.3px;
        }

        .text-muted {
            color: #6b7280 !important;
        }

    </style>

</head>

<body>

    <div class="container">

        @if(session('success'))

            <div class="alert alert-success alert-dismissible fade show">

                {{ session('success') }}

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
                </button>

            </div>

        @endif


        @yield('content')

    </div>

</body>

</html>
