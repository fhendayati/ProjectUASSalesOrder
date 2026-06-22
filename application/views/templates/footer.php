</div>

<script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/sb-admin-2.min.js'); ?>"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if($this->session->flashdata('error')): ?>

<script>

Swal.fire({
    icon: 'error',
    title: 'Failed',
    text: '<?= $this->session->flashdata('error'); ?>'
});

</script>

<?php endif; ?>

<?php if($this->session->flashdata('success')): ?>

<script>

Swal.fire({
    icon: 'success',
    title: 'Success',
    text: '<?= $this->session->flashdata('success'); ?>',
    timer: 2000,
    showConfirmButton: false
});

</script>

<?php endif; ?>

<script>
    $(document).ready(function(){
        $('#dataTable').DataTable({
            "language": {
                "search": "Cari:",
                "lengthMenu": "Tampilkan _MENU_ data",
                "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                "paginate":{
                    "previous": "Sebelumnya",
                    "next": "Berikutnya"
                }
            }
        });
    });
</script>

<?php if($this->session->flashdata('success')): ?>

<script>

Swal.fire({
    icon: 'success',
    title: 'Success!',
    text: '<?= $this->session->flashdata('success'); ?>',
    confirmButtonText: 'OK',
    confirmButtonColor: '#1e3c72',
});

</script>

<?php endif; ?>

<script>

$(document).ready(function(){

    $(document).on('click', '.btn-delete', function(e){

        let url   = $(this).data('url');
        let title = $(this).data('title');
        let text  = $(this).data('text');

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

    $(document).on('click', '.btn-status', function(e){

        e.preventDefault();

        let url   = $(this).data('url');
        let title = $(this).data('title');
        let text  = $(this).data('text');

        Swal.fire({
            title: title,
            text: text,
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No'
        }).then((result) => {

            if(result.isConfirmed){
                window.location.href = url;
            }

        });

    });

});

</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

$('.logout-btn').click(function(e){
    e.preventDefault();
    Swal.fire({
        title: 'Logout?',
        text: 'Are you sure want to exit the system?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Yes, Logout',
        cancelButtonText: 'No, Cancel',
        showCloseButton: true

    }).then((result) => {
        if(result.isConfirmed)
        {
            window.location.href =
            "<?= base_url('index.php/auth/logout'); ?>";
        }
    });
});

</script>

<footer class="sticky-footer bg-white">

    <div class="container my-auto">

        <div class="copyright text-center my-auto">

            <span>
                © 2026 Sales Order Management System |
                PT Maju Jaya
            </span>

        </div>

    </div>

</footer>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const salesLabels = [
<?php
foreach($sales_performance as $row)
{
    echo "'".$row->name."',";
}
?>
];

const salesData = [
<?php
foreach($sales_performance as $row)
{
    echo $row->total_sales.",";
}
?>
];

</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<?php if(isset($monthly_sales)): ?>

<script>

Chart.defaults.font.family = 'Georgia';

let salesChart =
document.getElementById('salesChart');

if(salesChart)
{
    const monthlyLabels = [
        <?php
        $bulan = [
            1 => 'Jan',
            2 => 'Feb',
            3 => 'Mar',
            4 => 'Apr',
            5 => 'Mei',
            6 => 'Jun',
            7 => 'Jul',
            8 => 'Agu',
            9 => 'Sep',
            10 => 'Okt',
            11 => 'Nov',
            12 => 'Des'
        ];
        foreach($monthly_sales as $row)
        {
            echo "'".$bulan[$row->month]."',";
        }
        ?>
    ];

    const monthlyData = [
        <?php
        foreach($monthly_sales as $row)
        {
            echo $row->total_sales.",";
        }
        ?>
    ];

    new Chart(
        salesChart,
        {
            type: 'line',
            data: {
                labels: monthlyLabels,
                datasets: [{
                    label: 'Revenue',
                    data: monthlyData,
                    borderColor: '#1e3c72',
                    backgroundColor:
                    'rgba(30,60,114,0.15)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4
                }]
            },

            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        }
    );
}

</script>

<?php endif; ?>

<script>

Chart.defaults.font.family = 'Georgia';

new Chart(
    document.getElementById(
        'salesPerformanceChart'
    ),
    {
        type: 'bar',
        data: {
            labels: salesLabels,
            datasets: [{
                label: 'Total Penjualan',
                data: salesData,
                backgroundColor: [
                    '#1e3c72',
                    '#2a5298',
                    '#3b6fc0',
                    '#5b84d6',
                    '#7da0e6'
                ]
            }]
        },

        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    }
);

</script>

<script>

let addBtn =
document.getElementById('add-product');

if(addBtn)
{
    addBtn.addEventListener(
        'click',
        function()
        {
            let row =
            document.querySelector(
                '.product-row'
            );

            let clone =
            row.cloneNode(true);

            clone.querySelector(
                'input'
            ).value = '';

            document
            .getElementById(
                'product-area'
            )
            .appendChild(clone);
        }
    );
}

document.addEventListener(
    'click',
    function(e)
    {
        if(
            e.target.classList.contains(
                'remove-row'
            )
        )
        {
            let rows =
                document.querySelectorAll(
                    '.product-row'
                );

            if(rows.length > 1)
            {
                e.target
                .closest('.product-row')
                .remove();
            }
        }
    }
);

</script>

<script>

function updateClock()
{
    const now = new Date();

    let hours =
        String(now.getHours())
        .padStart(2,'0');

    let minutes =
        String(now.getMinutes())
        .padStart(2,'0');

    let seconds =
        String(now.getSeconds())
        .padStart(2,'0');

    document.getElementById(
        'liveClock'
    ).innerHTML =
        hours + ':' +
        minutes + ':' +
        seconds +
        ' WIB';
}

setInterval(
    updateClock,
    1000
);

updateClock();

</script>

<script>

document.querySelectorAll('.card').forEach(card => {

    card.addEventListener('mousemove', (e) => {

        const rect =
            card.getBoundingClientRect();

        const x =
            e.clientX - rect.left;

        const y =
            e.clientY - rect.top;

        const centerX =
            rect.width / 2;

        const centerY =
            rect.height / 2;

        const rotateY =
            (x - centerX) / 20;

        const rotateX =
            (centerY - y) / 20;

        card.style.transform =
            `perspective(1000px)
            rotateX(${rotateX}deg)
            rotateY(${rotateY}deg)
            translateY(-8px)`;
    });

    card.addEventListener('mouseleave', () => {

        card.style.transform =
            'perspective(1000px) rotateX(0) rotateY(0)';
    });

});

</script>

</body>
</html>