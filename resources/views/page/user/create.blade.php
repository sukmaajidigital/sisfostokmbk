    <div class="py-6">
        <form class="" action="{{ route('user.store') }}" method="POST">
            @csrf
            @include('page.user.form')
        </form>
    </div>
