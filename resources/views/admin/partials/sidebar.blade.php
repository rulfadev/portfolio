<aside x-data="{ open: false }"
    class="border-b border-white/10 bg-slate-900/80 lg:min-h-screen lg:w-72 lg:border-b-0 lg:border-r">
    <div class="flex items-center justify-between px-5 py-5 lg:px-6">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
            <span class="flex h-11 w-11 items-center justify-center rounded-2xl bg-blue-600 font-black text-white">
                R
            </span>
            <span>
                <span class="block font-bold text-white">RulfaDev</span>
                <span class="block text-xs text-slate-400">Admin Panel</span>
            </span>
        </a>

        <button type="button" class="rounded-xl border border-white/10 px-3 py-2 text-white lg:hidden"
            @click="open = !open">
            ☰
        </button>
    </div>

    <nav class="space-y-1 px-4 pb-5 lg:block" :class="{ 'block': open, 'hidden': !open }">
        <a href="{{ route('admin.dashboard') }}"
            class="block rounded-2xl px-4 py-3 text-sm font-semibold transition {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white' : 'text-slate-300 hover:bg-white/10 hover:text-white' }}">
            Dashboard
        </a>

        <a href="{{ route('admin.projects.index') }}"
            class="block rounded-2xl px-4 py-3 text-sm font-semibold transition {{ request()->routeIs('admin.projects.*') ? 'bg-blue-600 text-white' : 'text-slate-300 hover:bg-white/10 hover:text-white' }}">
            Projects
        </a>
        <a href="{{ route('admin.services.index') }}"
            class="block rounded-2xl px-4 py-3 text-sm font-semibold transition {{ request()->routeIs('admin.services.*') ? 'bg-blue-600 text-white' : 'text-slate-300 hover:bg-white/10 hover:text-white' }}">
            Services
        </a>
        <a href="{{ route('admin.brands.index') }}"
            class="block rounded-2xl px-4 py-3 text-sm font-semibold transition {{ request()->routeIs('admin.brands.*') ? 'bg-blue-600 text-white' : 'text-slate-300 hover:bg-white/10 hover:text-white' }}">
            Brands
        </a>
        <a href="{{ route('admin.testimonials.index') }}"
            class="block rounded-2xl px-4 py-3 text-sm font-semibold transition {{ request()->routeIs('admin.testimonials.*') ? 'bg-blue-600 text-white' : 'text-slate-300 hover:bg-white/10 hover:text-white' }}">
            Testimonials
        </a>
        <a href="{{ route('admin.review-links.index') }}"
            class="block rounded-2xl px-4 py-3 text-sm font-semibold transition {{ request()->routeIs('admin.review-links.*') ? 'bg-blue-600 text-white' : 'text-slate-300 hover:bg-white/10 hover:text-white' }}">
            Review Links
        </a>
        <a href="{{ route('admin.inquiries.index') }}"
            class="block rounded-2xl px-4 py-3 text-sm font-semibold transition {{ request()->routeIs('admin.inquiries.*') ? 'bg-blue-600 text-white' : 'text-slate-300 hover:bg-white/10 hover:text-white' }}">
            Inquiries
        </a>
        <a href="{{ route('admin.settings.edit') }}"
            class="block rounded-2xl px-4 py-3 text-sm font-semibold transition {{ request()->routeIs('admin.settings.*') ? 'bg-blue-600 text-white' : 'text-slate-300 hover:bg-white/10 hover:text-white' }}">
            Site Settings
        </a>
    </nav>
</aside>
