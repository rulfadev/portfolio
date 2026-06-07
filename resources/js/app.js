import './bootstrap';
import '@fortawesome/fontawesome-free/css/all.min.css';
import Alpine from 'alpinejs';
import Swal from 'sweetalert2';

window.Alpine = Alpine;
window.Swal = Swal;

Alpine.start();

const revealElements = document.querySelectorAll('.reveal');

const observer = new IntersectionObserver(
    entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
            }
        });
    },
    {
        threshold: 0.12,
    }
);

revealElements.forEach(element => observer.observe(element));

document.addEventListener('submit', function (event) {
    const form = event.target.closest('[data-confirm-delete]');

    if (!form) {
        return;
    }

    if (form.dataset.confirmed === 'true') {
        return;
    }

    event.preventDefault();

    const title = form.dataset.confirmTitle || 'Hapus data?';
    const text = form.dataset.confirmText || 'Data yang sudah dihapus tidak dapat dikembalikan.';
    const confirmButtonText = form.dataset.confirmButton || 'Ya, hapus';
    const cancelButtonText = form.dataset.cancelButton || 'Batal';

    Swal.fire({
        title,
        text,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText,
        cancelButtonText,
        reverseButtons: true,
        focusCancel: true,
        background: '#020617',
        color: '#f8fafc',
        confirmButtonColor: '#ef4444',
        cancelButtonColor: '#334155',
        customClass: {
            popup: 'rounded-3xl',
            confirmButton: 'rounded-full',
            cancelButton: 'rounded-full',
        },
    }).then(result => {
        if (result.isConfirmed) {
            form.dataset.confirmed = 'true';
            form.requestSubmit();
        }
    });
});