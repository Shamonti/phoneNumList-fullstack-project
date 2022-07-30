<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>

<!-- BOOTSTRAP JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

<!-- Chart JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- DataTable JS -->
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

<!-- Bootstrap Table JS -->
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<!-- Custom JS -->

<script src="{{ asset('/') }}adminAsset/assets/js/chart.js"></script>
<script src="{{ asset('/') }}adminAsset/assets/js/script.js"></script>
<script src="{{ asset('/') }}adminAsset/assets/js/dashboard.js"></script>
<script src="{{ asset('/') }}adminAsset/assets/js/addUser.js"></script>

<script>
    $(document).ready(function () {
        $('#table').DataTable();
    });
</script>


