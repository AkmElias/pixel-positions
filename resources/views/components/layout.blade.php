<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pixel Positions</title>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:ital,wght@0,100..600;1,100..600&display=swap"
     rel="stylesheet">
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body class="bg-black text-white font-hanken-grotesk pb-20">
   <div class="px-10">
    <nav class="flex justify-between items-center py-4 border-b border-white/10">
        <div>
            <a href="/">
                <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="Pixel Positions">
            </a>
        </div>
        <div class="space-x-6">
            <a href="/jobs">Jobs</a>
            <a href="/career">Careers</a>
            <a href="/salaries">Salaries</a>
            <a href="/companies">Companies</a>
        </div>
        @auth
            <div class="space-x-6 flex">
                <a href="/jobs/create">Post a Job</a>
                <form method="POST" action="/logout">
                    @csrf
                    @method('DELETE')

                    <button>Log Out</button>
                </form>
            </div>
        @endauth

        @guest
            <div class="space-x-6">
                <a href="/register">Sign Up</a>
                <a href="/login">Log In</a>
                <a href="/salaries">Salaries</a>
                <a href="/companies">Companies</a>
            </div>
        @endguest
        
    </nav>
    <main class="mt-10 mx-w-[986px] mx-auto">
        {{ $slot }}
    </main>
   </div>
</body>
</html>