<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal" onclick="loadEditForm('{{ $route }}')">
    <i class="bi bi-pencil"></i> {{ $label ?? '' }}
</button>
