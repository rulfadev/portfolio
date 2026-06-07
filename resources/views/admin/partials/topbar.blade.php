<header class="border-b border-white/10 bg-slate-950/80 px-5 py-4 backdrop-blur lg:px-8">
    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
        <div>
            <p class="text-sm text-slate-400">Welcome back,</p>
            <h1 class="text-xl font-black text-white">{{ auth()->user()->name }}</h1>
        </div>

        <div class="flex items-center gap-3">
            <a href="{{ route('home') }}" target="_blank"
                class="rounded-full border border-white/10 px-5 py-2 text-sm font-semibold text-slate-200 hover:bg-white/10">
                Lihat Website
            </a>

            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="rounded-full bg-red-500 px-5 py-2 text-sm font-bold text-white hover:bg-red-400">
                    Logout
                </button>
            </form>
        </div>
    </div>
</header>
