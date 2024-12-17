    <div class="">
        <form class="" action="{{ route('supplier.update', $supplier->id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('page.supplier.form')
        </form>
    </div>
