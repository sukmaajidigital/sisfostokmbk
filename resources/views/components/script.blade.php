@section('script')
    {{-- script generate modal --}}
    <script>
        function loadEditForm(url) {
            $.ajax({
                url: url,
                method: 'GET',
                success: function(response) {
                    $('#editFormContainer').html(response);
                },
                error: function() {
                    alert('Failed to load the edit form.');
                }
            });
        }

        function loadCreateForm(url) {
            $.ajax({
                url: url,
                method: 'GET',
                success: function(response) {
                    $('#createFormContainer').html(response);
                },
                error: function() {
                    alert('Failed to load the edit form.');
                }
            });
        }
    </script>
    {{-- script datatables --}}
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                responsive: true,
                autoWidth: true,
                scrollX: true,
                searching: true,
                lengthChange: false,
                pageLength: 10
            });
        });
    </script>
    {{-- script untuk halaman cek stok bahan keluar --}}
    <script>
        function updateStok() {
            const bahanSelect = document.getElementById('id_bahan');
            const selectedOption = bahanSelect.options[bahanSelect.selectedIndex];
            const stok = selectedOption.getAttribute('data-stok');
            document.getElementById('stok').value = stok || 0;
        }
        document.addEventListener("DOMContentLoaded", function() {
            updateStok();
        });
    </script>
@endsection
