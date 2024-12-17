    <div class="">
        <form class="" action="{{ route('bahankeluar.update', $bahankeluar) }}" method="POST">
            @csrf
            @method('PUT')
            @include('page.bahankeluar.form')
        </form>
    </div>
