@props([
    'action',
    'title' => 'Hapus data?',
    'text' => 'Data yang sudah dihapus tidak dapat dikembalikan.',
    'button' => 'Hapus',
    'confirmButton' => 'Ya, hapus',
    'cancelButton' => 'Batal',
])

<form action="{{ $action }}" method="POST" data-confirm-delete data-confirm-title="{{ $title }}"
    data-confirm-text="{{ $text }}" data-confirm-button="{{ $confirmButton }}"
    data-cancel-button="{{ $cancelButton }}" class="inline-flex">
    @csrf
    @method('DELETE')

    <x-ui.action-button type="submit" variant="delete">
        {{ $button }}
    </x-ui.action-button>
</form>
