<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  
</head>
<body>

    <nav class="navbar navbar-expand-sm bg-dark">
    <!-- Links-->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link text-light" href="/">Products</a>
        </li>
    </ul>
    </nav>
    @if($message = Session::get("success"))
        <div class="alert alert-success alert-block">
            <strong>{{$message}}</strong>
        </div>
    @endif

    @yield('main')
</body>
</html>
