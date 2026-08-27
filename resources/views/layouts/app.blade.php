<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>

        /* =========================
           GLOBAL
        ========================= */

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;

            background: #f4f5f7;
            color: #111827;

            font-family: Arial, Helvetica, sans-serif;
        }


        /* =========================
           CONTENT CONTAINER
        ========================= */

        .container {
            max-width: 1200px;
        }


        /* =========================
           ALERT
        ========================= */

        .alert {
            border: none;
            border-radius: 10px;

            padding: 13px 16px;
            margin: 18px auto;

            box-shadow: 0 2px 8px rgba(15, 23, 42, 0.04);
        }

        .alert-success {
            background: #ecfdf5;
            color: #047857;
        }

        .alert-danger {
            background: #fef2f2;
            color: #b91c1c;
        }


        /* =========================
           CARD
        ========================= */

        .card {
            background: #ffffff;

            border: 1px solid #e5e7eb !important;

            border-radius: 14px !important;

            box-shadow: 0 3px 12px rgba(15, 23, 42, 0.04) !important;
        }


        /* =========================
           BUTTON
        ========================= */

        .btn {
            border-radius: 8px !important;

            font-weight: 500;

            transition: all 0.2s ease;
        }

        .btn-dark {
            background: #20242c !important;
            border-color: #20242c !important;
        }

        .btn-dark:hover {
            background: #10b981 !important;
            border-color: #10b981 !important;
        }

        .btn-outline-dark {
            color: #20242c !important;
            border-color: #d1d5db !important;
        }

        .btn-outline-dark:hover {
            background: #20242c !important;
            border-color: #20242c !important;
            color: #ffffff !important;
        }


        /* =========================
           TABLE
        ========================= */

        .table {
            margin-bottom: 0;
        }

        .table thead th {
            background: #f8fafc;

            color: #6b7280;

            font-size: 11px;
            font-weight: 600;

            border-bottom: 1px solid #e5e7eb;

            padding: 12px 14px;
        }

        .table tbody td {
            padding: 13px 14px;

            border-bottom: 1px solid #f1f5f9;

            color: #374151;

            font-size: 12px;
        }

        .table tbody tr:last-child td {
            border-bottom: none;
        }

        .table tbody tr:hover {
            background: #fafafa;
        }


        /* =========================
           FORM
        ========================= */

        .form-control,
        .form-select {
            border: 1px solid #d1d5db;

            border-radius: 9px;

            padding: 10px 12px;

            color: #111827;

            box-shadow: none !important;

            font-size: 13px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #10b981;

            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.10) !important;
        }


        /* =========================
           HEADING
        ========================= */

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


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 768px) {

            .container {
                width: 100%;
                padding-left: 16px;
                padding-right: 16px;
            }

        }

    </style>

</head>


<body>

    {{-- NAVBAR --}}
    @yield('content')


</body>

</html>