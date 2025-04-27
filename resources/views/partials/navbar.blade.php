<header class="fixed top-0 w-full z-10 nav-menu flex justify-between items-center p-6 bg-white dark:bg-black">
    <h1 class="text-4xl font-extrabold">
        <a href="{{ url('') }}" class="text-black dark:text-white">⚡ Blogger</a>
    </h1>
    <nav>
        <ul class="md:flex items-center justify-between">
            <li>
                <a href="{{ url('/') }}" class="nav-link text-xl mx-4 text-black dark:text-white">Portofolio</a>
            </li>
            <li>
                <a href="#services" class="nav-link text-xl mx-4 text-black dark:text-white">Project</a>
            </li>
            <li>
                <a href="#process" class="nav-link text-xl mx-4 text-black dark:text-white">Process</a>
            </li>
            <li>
                <a href="#contact" class="nav-link text-xl mx-4 text-black dark:text-white">Contact</a>
            </li>
            <li class="toggle-switch md:mx-3">
                <label class="switch-label">
                    <input type="checkbox" class="checkbox" id="dark-mode-toggle">
                    <span class="slider"></span>
                </label>
            </li>
        </ul>
    </nav>
</header>

<script>
    // Check local storage for dark mode preference
    if (localStorage.getItem('dark-mode') === 'true') {
        document.documentElement.classList.add('dark');
        document.getElementById('dark-mode-toggle').checked = true;
    }

    // Save dark mode preference to local storage and update dark mode class
    document.getElementById('dark-mode-toggle').addEventListener('change', function () {
        localStorage.setItem('dark-mode', this.checked);
        if (this.checked) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    });
</script>