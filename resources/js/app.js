import './bootstrap';

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

