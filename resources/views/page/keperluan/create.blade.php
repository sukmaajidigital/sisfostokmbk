    <div class="py-6">
        <form class="" action="{{ route('keperluan.store') }}" method="POST">
            @csrf
            @include('page.keperluan.form')
        </form>
    </div>
