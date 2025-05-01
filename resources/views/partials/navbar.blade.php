<header
    class="fixed top-0 w-full z-10 nav-menu p-6 bg-white dark:bg-black flex flex-col md:flex-row justify-between items-center">
    <div class="flex justify-between items-center md:w-1/5 w-full">
        <h1 class="lg:text-3xl text-2xl font-extrabold">
            <a href="{{ url('/') }}" class="text-black dark:text-white">⚡ Rulfadev</a>
        </h1>
        <button id="menu-toggle" class="block md:hidden text-black dark:text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
        </button>
    </div>
    <nav id="mobile-menu" class="hidden md:flex flex-col md:flex-row items-center">
        <ul class="flex flex-col md:flex-row items-center md:gap-1 lg:gap-5 gap-10 mt-10 my-0 md:my-5">
            <li>
                <a href="#about" class="nav-link lg:text-xl text-based text-black dark:text-white">Portofolio</a>
            </li>
            <li>
                <a href="#project" class="nav-link lg:text-xl text-based text-black dark:text-white">Project</a>
            </li>
            <li>
                <a href="#techstack" class="nav-link lg:text-xl text-based text-black dark:text-white">Tech
                    Stack</a>
            </li>
            <li>
                <a href="#experience" class="nav-link lg:text-xl text-based text-black dark:text-white">Experience</a>
            </li>
            <li>
                <a href="#contact" class="nav-link lg:text-xl text-based text-black dark:text-white">Contact</a>
            </li>
            <li class="toggle-switch">
                <label class="switch-label">
                    <input type="checkbox" class="checkbox" id="dark-mode-toggle">
                    <span class="slider"></span>
                </label>
            </li>
        </ul>
    </nav>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const menuToggle = document.getElementById('menu-toggle');
        const menu = document.getElementById('mobile-menu');
        const navLinks = document.querySelectorAll('.nav-link');

        menuToggle.addEventListener('click', function () {
            if (menu.classList.contains('hidden')) {
                menu.classList.remove('hidden');
                menu.style.maxHeight = '0';
                menu.style.overflow = 'hidden';
                menu.style.transition = 'max-height 0.3s ease-out';
                setTimeout(() => {
                    menu.style.maxHeight = menu.scrollHeight + 'px';
                }, 10);
            } else {
                menu.style.maxHeight = menu.scrollHeight + 'px';
                setTimeout(() => {
                    menu.style.maxHeight = '0';
                }, 10);
                menu.addEventListener('transitionend', function handler() {
                    menu.classList.add('hidden');
                    menu.style.maxHeight = '';
                    menu.style.overflow = '';
                    menu.style.transition = '';
                    menu.removeEventListener('transitionend', handler);
                });
            }
        });

        navLinks.forEach(link => {
            link.addEventListener('click', function () {
                menu.style.maxHeight = '0';
                menu.addEventListener('transitionend', function handler() {
                    menu.classList.add('hidden');
                    menu.style.maxHeight = '';
                    menu.style.overflow = '';
                    menu.style.transition = '';
                    menu.removeEventListener('transitionend', handler);
                });
            });
        });
    });
</script>