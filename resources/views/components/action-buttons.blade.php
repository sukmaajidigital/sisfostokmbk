<div>
    @include('components.editmodalbutton', [
        'route' => $editRoute,
        'label' => 'Edit Bahan',
    ])
    @include('components.deletebutton', [
        'route' => $deleteRoute,
        'confirmationMessage' => $deleteMessage,
        'label' => 'Delete',
    ])
</div>
