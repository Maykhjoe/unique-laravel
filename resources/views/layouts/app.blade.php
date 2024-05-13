<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product CRUD</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50">
   <nav class="bg-gray-900 text-white">
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between items-center">
            <a class="text-2xl font-bold" >Dashboard</a>
            <div class="flex items-center">
                <a href="{{ url('/')  }}" class="mr-4">Home</a>
                <a href="#" class="mr-4">About</a>
                <a href="#" class="mr-4">Contact</a>
            </div>
        </div>
    </div>
</nav>

<div class="container mx-auto px-4 py-8">
    @yield('content')
</div>

<footer class="bg-gray-900 text-gray-300 mt-8">
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            <div>
                <h2 class="text-lg font-semibold mb-4">About Us</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vel est id lorem dictum fringilla.</p>
            </div>
            <div>
                <h2 class="text-lg font-semibold mb-4">Contact Us</h2>
                <p>123 Main Street, Cityville</p>
                <p>Email: info@example.com</p>
                <p>Phone: +123 456 789</p>
            </div>
            <div>
                <h2 class="text-lg font-semibold mb-4">Follow Us</h2>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-300 hover:text-white"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="text-gray-300 hover:text-white"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-gray-300 hover:text-white"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-gray-800 py-4">
        <div class="container mx-auto px-4">
            <p class="text-center text-gray-400">© 2024 Product CRUD. All rights reserved.</p>
        </div>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

