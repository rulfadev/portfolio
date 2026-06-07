<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Portfolio' }} - {{ config('app.name', 'RulfaDev') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-950 text-slate-100">
    <div class="min-h-screen lg:flex">
        @include('admin.partials.sidebar')

        <div class="min-w-0 flex-1">
            @include('admin.partials.topbar')

            <main class="px-5 py-8 lg:px-8">
                @include('admin.partials.alert')

                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>
