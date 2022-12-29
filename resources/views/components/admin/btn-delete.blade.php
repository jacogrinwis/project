@props(['action', 'confirm'])

<form action="{{ $action }}" method="POST"
    class="inline">
    @csrf
    @method('DELETE')
    <button type="submit"
        class="px-2 py-1 text-xs text-black bg-red-200 rounded-md dark:text-white hover:bg-red-400 dark:bg-red-900 dark:hover:bg-red-700"
        onclick="confirm('{{ $confirm }}')">
        <i class="fa-solid fa-trash"></i>
    </button>
</form>
