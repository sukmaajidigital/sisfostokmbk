<div class="">
    <form class="" action="{{ route('bahanmasuk.update', $bahanmasuk) }}" method="POST">
        @csrf
        @method('PUT')
        @include('page.bahanmasuk.form')
    </form>
</div>
