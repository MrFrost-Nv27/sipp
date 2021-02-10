$(document).ready(function() {
    $(".preloader").fadeOut();
    $("small").addClass("animatedDelay jackInTheBox");
    $("#tentang").click(function() {
        Swal.fire({
            title: 'SIPP v1',
            text: 'Sistem Informasi Pondok Pesantren',
            icon: 'success'
        });
    });
    $("#keluar").click(function() {
        Swal.fire({
            title: 'Apakah anda yakin ingin keluar ?',
            text: "jika iya, kembalilah kapan saja",
            icon: 'warning',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Keluar',
            showCancelButton: true,
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // window.location.replace("https://www.tutorialrepublic.com/");
                location.href = logout;
            }
        })
    });
});