<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="{{ session('theme', 'retro') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Knock Off Fashion</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-base-200 text-base-content">

    <header class="w-full border-b bg-base-100">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">
            <div>
                <h1 class="text-2xl font-bold">Knock Off Fashion</h1>
                <p class="text-sm opacity-80">Why buy Gucci when you can buy Guggi?</p>
            </div>

            @if (Route::has('login'))
                <nav aria-label="Main navigation" class="flex items-center gap-3">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-primary btn-sm">
                            Dashboard
                        </a>
                    @else
                    @endauth
                </nav>
            @endif
        </div>
    </header>

    <main class="mx-auto grid min-h-[calc(100vh-81px)] max-w-7xl items-center gap-10 px-6 py-12 lg:grid-cols-2">
        <section aria-labelledby="welcome-heading" class="space-y-6">
            <div class="relative">

   
                <img 
                    src="{{ asset('images/KnockOffFashion.png') }}"
                    alt=""
                    aria-hidden="true"
                    class="absolute left-0 top-1/2 -translate-y-1/2 w-[420px] opacity-25 pointer-events-none"
                >

    
                <div class="relative z-10">
                    <p class="text-sm text-gray-500 mb-2">
                        Admin Panel
                    </p>

                    <h1 class="text-5xl font-bold leading-tight mb-6">
                        Manage your cheap knock off fashion catalog with ease
                    </h1>

                    <a href="{{ route('login') }}"
                        class="inline-flex items-center rounded bg-yellow-400 px-6 py-3 text-gray-900 font-semibold hover:bg-yellow-300 focus:outline-none focus:ring-2 focus:ring-yellow-500">
                            Log in Admin
                    </a>
                </div>

            </div>
        </section>

        <section aria-labelledby="feature-heading" class="card bg-base-100 shadow-xl">
            <div class="card-body">
                <h3 id="feature-heading" class="card-title text-2xl">What you can do</h3>

                <ul class="space-y-3 text-sm leading-6 sm:text-base">
                    <li>✔ Create new products</li>
                    <li>✔ Update existing products</li>
                    <li>✔ Delete products from the catalog</li>
                    <li>✔ Filter by brand, category and price</li>
                    <li>✔ Browse paginated product lists</li>
                </ul>

                <div class="divider"></div>

                <p class="text-sm opacity-75">
                    Built with Laravel, Blade, Tailwind CSS, DaisyUI, Breeze, SQLite and realistic seeded mock data.
                </p>
            </div>
        </section>
    </main>

</body>
</html>