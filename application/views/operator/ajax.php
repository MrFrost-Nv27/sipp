<script>
$(document).ready(function() {
    // ini adalah fungsi untuk mengambil data santri dan di incluce ke dalam datatable
    var datasantri = $('#datasantri').DataTable({
        "processing": true,
        "ajax": "<?= base_url("operator/datasantri") ?>",
        stateSave: true,
        "order": []
    })
});
</script>
