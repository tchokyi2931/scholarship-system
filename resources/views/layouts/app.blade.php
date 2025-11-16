<!DOCTYPE html>
<html>
<head>
    <title>Scholarship System</title>

    <!-- Bootstrap 5 -->
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
</head>

<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('scholarships.index') }}">
                Scholarship System
            </a>

            <div>
                <a class="nav-link d-inline text-white" href="{{ route('students.index') }}">
                    Students
                </a>
                <a class="nav-link d-inline text-white" href="{{ route('scholarships.index') }}">
                    Scholarships
                </a>
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

</body>
</html>

