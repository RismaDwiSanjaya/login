<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-blue-800 text-white h-screen fixed">
        <div class="p-4 text-lg font-bold">
            My Dashboard
        </div>
        <nav class="mt-4">
            <a href="" class="block py-2.5 px-4 hover:bg-blue-700">Home</a>
            <a href="" class="block py-2.5 px-4 hover:bg-blue-700">Products</a>
            <a href="" class="block py-2.5 px-4 hover:bg-blue-700">Customers</a>
            <a href="" class="block py-2.5 px-4 hover:bg-blue-700">Transactions</a>
            <a href="" class="block py-2.5 px-4 hover:bg-blue-700">Reports</a>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 ml-64">
        <!-- Navbar -->
        <header class="bg-white shadow px-6 py-4 flex justify-between items-center">
            <h1 class="text-xl font-semibold">Dashboard</h1>
            <div class="flex items-center space-x-4">
                @auth
                    <span>Hi, {{ Auth::user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-blue-800 hover:text-blue-600">Logout</button>
                    </form>
                @endauth
            </div>
        </header>

        <!-- Page Content -->
        <main class="p-6">
            @yield('content')
        </main>
    </div>

</body>
</html>
