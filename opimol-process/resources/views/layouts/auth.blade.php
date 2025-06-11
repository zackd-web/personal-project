<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Authentication') - OPIMOL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #111827;
            color: white;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .auth-card {
            background-color: #1f2937;
            border-radius: 0.5rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            width: 100%;
            max-width: 450px;
            padding: 2rem;
        }
        .auth-logo {
            text-align: center;
            margin-bottom: 2rem;
        }
        .auth-logo img {
            height: 60px;
        }
        .btn-primary {
            background-color: #D42A2A;
            border-color: #D42A2A;
        }
        .btn-primary:hover {
            background-color: #b71c1c;
            border-color: #b71c1c;
        }
        .form-control {
            background-color: #374151;
            border-color: #4b5563;
            color: white;
        }
        .form-control:focus {
            background-color: #374151;
            border-color: #D42A2A;
            color: white;
            box-shadow: 0 0 0 0.25rem rgba(212, 42, 42, 0.25);
        }
        .form-check-input:checked {
            background-color: #D42A2A;
            border-color: #D42A2A;
        }
        .auth-footer {
            text-align: center;
            margin-top: 2rem;
            font-size: 0.875rem;
            color: #9ca3af;
        }
        .auth-links {
            margin-top: 1rem;
        }
        .auth-links a {
            color: #D42A2A;
            text-decoration: none;
        }
        .auth-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="auth-card">
                    <div class="auth-logo">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('images/straw-hat-logo.png') }}" alt="OPIMOL Logo">
                            <h2 class="text-danger mt-2">OPIMOL</h2>
                        </a>
                    </div>
                    
                    @yield('content')
                    
                    <div class="auth-footer">
                        <div>© {{ date('Y') }} OPIMOL - One Piece Indonesia Moluccas</div>
                        <div class="mt-1">All rights reserved.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>