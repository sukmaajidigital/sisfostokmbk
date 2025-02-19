<div>
    @include('components.editmodalbutton', [
        'route' => $editRoute,
        'label' => $editLabel,
    ])
    @include('components.deletebutton', [
        'route' => $deleteRoute,
        'confirmationMessage' => $deleteMessage,
        'label' => $deleteLabel,
    ])
</div>
