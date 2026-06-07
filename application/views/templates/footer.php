</div>

<script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/sb-admin-2.min.js'); ?>"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if($this->session->flashdata('success')): ?>

<script>

Swal.fire({
    icon: 'success',
    title: 'Success!',
    text: '<?= $this->session->flashdata('success'); ?>',
    confirmButtonText: 'OK'
});

</script>

<?php endif; ?>

<script>

$(document).ready(function(){

    $('.btn-delete').on('click', function(e){

        e.preventDefault();

        let url = $(this).data('url');

        Swal.fire({
            title: 'Are you sure?',
            text: 'This product will be deleted!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Delete'
        }).then((result) => {

            if(result.isConfirmed){
                window.location.href = url;
            }

        });

    });

    $('.btn-status').on('click', function(e){

    e.preventDefault();

    let url   = $(this).data('url');
    let title = $(this).data('title');
    let text  = $(this).data('text');

    Swal.fire({
        title: title,
        text: text,
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Batal'
    }).then((result) => {

        if(result.isConfirmed){
            window.location.href = url;
        }

    });

    });

});

</script>

</body>
</html>