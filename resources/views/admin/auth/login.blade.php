<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - {{ config('app.name', 'RulfaDev') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-950 text-slate-100 noise-bg">
    <main class="flex min-h-screen items-center justify-center px-5 py-12">
        <div class="w-full max-w-md">
            <div class="mb-8 text-center">
                <div
                    class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-3xl bg-blue-600 text-2xl font-black text-white shadow-2xl shadow-blue-600/30">
                    R
                </div>
                <h1 class="text-3xl font-black text-white">Admin Login</h1>
                <p class="mt-2 text-sm text-slate-400">Masuk untuk mengelola portfolio.</p>
            </div>

            @if (session('success'))
                <div
                    class="mb-5 rounded-2xl border border-emerald-400/20 bg-emerald-500/10 px-5 py-4 text-sm text-emerald-200">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-5 rounded-2xl border border-red-400/20 bg-red-500/10 px-5 py-4 text-sm text-red-200">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('admin.login.store') }}" method="POST" class="glass-card rounded-[2rem] p-6">
                @csrf

                <div>
                    <label for="email" class="mb-2 block text-sm font-semibold text-slate-200">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full rounded-2xl border border-white/10 bg-slate-950 px-4 py-3 text-white outline-none transition placeholder:text-slate-600 focus:border-blue-400"
                        placeholder="admin@rulfadev.com">
                </div>

                <div class="mt-5">
                    <label for="password" class="mb-2 block text-sm font-semibold text-slate-200">Password</label>
                    <input type="password" id="password" name="password" required
                        class="w-full rounded-2xl border border-white/10 bg-slate-950 px-4 py-3 text-white outline-none transition placeholder:text-slate-600 focus:border-blue-400"
                        placeholder="••••••••">
                </div>

                <label class="mt-5 flex items-center gap-3 text-sm text-slate-300">
                    <input type="checkbox" name="remember" value="1" class="rounded border-white/10 bg-slate-950">
                    Ingat saya
                </label>

                <button type="submit"
                    class="mt-6 w-full rounded-2xl bg-amber-400 px-5 py-3 text-sm font-black text-slate-950 transition hover:bg-amber-300">
                    Masuk Dashboard
                </button>
            </form>

            <a href="{{ route('home') }}" class="mt-6 block text-center text-sm text-slate-400 hover:text-white">
                ← Kembali ke website
            </a>
        </div>
    </main>
</body>

</html>
