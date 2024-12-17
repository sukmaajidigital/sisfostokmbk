<div class="py-6">
    <form class="" action="{{ route('bahanmasuk.store') }}" method="POST">
        @csrf
        @include('page.bahanmasuk.form')
    </form>
</div>
