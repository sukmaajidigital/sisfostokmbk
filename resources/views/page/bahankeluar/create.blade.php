    <div class="py-6">
        <form class="" action="{{ route('bahankeluar.store') }}" method="POST">
            @csrf
            @include('page.bahankeluar.form')
        </form>
    </div>
