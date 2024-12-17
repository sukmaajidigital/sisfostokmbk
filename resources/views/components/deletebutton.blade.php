<form action="{{ $route }}" method="POST" onsubmit="return confirm('{{ $confirmationMessage }}')" style="display: inline-block;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">
        <i class="bi bi-trash"></i> {{ $label ?? 'Delete' }}
    </button>
</form>
