<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2 class="mb-4 text-center">⚙️ Admin Dashboard</h2>

    <div class="row">

        <!-- Products -->
        <div class="col-md-4 mb-4">
            <div class="card shadow text-center p-4">
                <h4>🛍 Products</h4>
                <p>Manage all products</p>
                <a href="/admin/products" class="btn btn-primary">Manage Products</a>
            </div>
        </div>

        <!-- Categories -->
        <div class="col-md-4 mb-4">
            <div class="card shadow text-center p-4">
                <h4>📂 Categories</h4>
                <p>Manage categories</p>
                <a href="/admin/categories" class="btn btn-success">Manage Categories</a>
            </div>
        </div>

        <!-- Subcategories -->
        <div class="col-md-4 mb-4">
            <div class="card shadow text-center p-4">
                <h4>📁 Subcategories</h4>
                <p>Manage subcategories</p>
                <a href="/admin/subcategories" class="btn btn-warning">Manage Subcategories</a>
            </div>
        </div>

    </div>

    <!-- Logout Button -->
    <div class="text-center mt-4">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn btn-danger">Logout</button>
        </form>
    </div>

</div>

</body>
</html>