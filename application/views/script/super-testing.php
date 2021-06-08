<div class="modal fade" id="wappdb" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Whatsapp PPDB Test</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ml-2 mr-2">
                <form class="login100-form validate-form" id="formwappdbtest">
                    <div class="wrap-input100 validate-input">
                        <span class="label-input100">Nomor Whatsapp</span>
                        <input class="input100" type="tel" name="nowa" id="wa-ppdbtest"
                            placeholder="Masukkan Nomor Whatsapp" required>
                        <span class="focus-input100" data-symbol="pin"></span>
                    </div>
                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn" type="submit">
                                Kirim Mail Test
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="emailppdb" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Email PPDB Test</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ml-2 mr-2">
                <form class="login100-form validate-form" id="formemailppdbtest">
                    <div class="wrap-input100 validate-input">
                        <span class="label-input100">Alamat Email</span>
                        <input class="input100" type="email" name="email" id="email-ppdbtest"
                            placeholder="Masukkan Alamat Email" required>
                        <span class="focus-input100" data-symbol="email"></span>
                    </div>
                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn" type="submit">
                                Kirim Mail Test
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
var BaseURL = "<?= base_url() ?>";

$('#formwappdbtest').on('submit', function() {
    var param = 'wa';
    var nowa = $('#wa-ppdbtest').val();
    $.ajax({
        type: "post",
        url: "<?= base_url('testing/mailtest') ?>",
        beforeSend: function() {
            swal.fire({
                title: 'Menunggu',
                html: 'Memproses data',
                didOpen: () => {
                    swal.showLoading()
                }
            })
        },
        data: {
            param: param,
            nowa: nowa
        },
        dataType: "JSON",
        error: function(data) {
            console.log('gagal mengirim data');
        },
        success: function(data) {
            $.ajax({
                type: "GET",
                url: "https://panel.rapiwha.com/send_message.php",
                data: {
                    apikey: data.apikey,
                    number: data.nohp,
                    text: data.message,
                }, // ambil datanya dari form yang ada di variabel
                error: function(data) {
                    console.log("gagal mengirim WA");
                },
                success: function(data) {
                    $('#wa-ppdbtest').val('');
                    Swal.fire(
                        "Mail Testing",
                        "Berhasil Mengirim WA",
                        "success"
                    )
                },
            });
        }
    })
    return false;
});
$('#formemailppdbtest').on('submit', function() {
    var param = 'email';
    var email = $('#email-ppdbtest').val();
    $.ajax({
        type: "post",
        url: "<?= base_url('testing/mailtest') ?>",
        beforeSend: function() {
            swal.fire({
                title: 'Menunggu',
                html: 'Memproses data',
                didOpen: () => {
                    swal.showLoading()
                }
            })
        },
        data: {
            param: param,
            email: email
        },
        dataType: "JSON",
        error: function(data) {
            console.log('gagal mengirim data');
        },
        success: function(data) {
            $('#email-ppdbtest').val('');
            Swal.fire(
                "Mail Testing",
                "Berhasil Mengirim Email",
                "success"
            )
        }
    })
    return false;
});
</script>
