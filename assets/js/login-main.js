$(document).ready(function () {
	// Animasi
	$(".preloader").fadeOut();
	$(".card").addClass("animated fadeInLeft");
	$("small").addClass("animatedDelay jackInTheBox");
	$("#password").focus(function () {
		$(this).prop("type", "text");
	});
	$("#password").focusout(function () {
		$(this).prop("type", "password");
	});

	// Fungsi Form
	$("#tombolsignup").on("click", function () {
		$.ajax({
			url: BaseURL + "masuk/pagesignup",
			success: function (data) {
				swal.close();
				$("#main-page").removeClass("animated fadeInDown");
				$("#main-page").addClass("animated fadeInDown");
				$("#main-page").html(data);
			},
		});
	});
	$("#tombolsignin").on("click", function () {
		$.ajax({
			url: BaseURL + "masuk/pagesignin",
			success: function (data) {
				swal.close();
				$("#main-page").removeClass("animated fadeInDown");
				$("#main-page").addClass("animated fadeInDown");
				$("#main-page").html(data);
			},
		});
	});
	$("#gologin").on("submit", function () {
		// CSRF
		var csrfName = $("input[name=csrf_sipp_token]").attr("name");
		var csrfHash = $("input[name=csrf_sipp_token]").val(); // CSRF hash

		var username = $("#idpengguna").val();
		var password = $("#idpass").val();
		$.ajax({
			type: "post",
			url: BaseURL + "masuk/logindong",
			beforeSend: function () {
				swal.fire({
					title: "Menunggu",
					html: "Memproses data",
					didOpen: () => {
						swal.showLoading();
					},
				});
			},
			data: {
				username: username,
				password: password,
				[csrfName]: csrfHash,
			}, // ambil datanya dari form yang ada di variabel
			dataType: "JSON",
			error: function (data) {
				console.log("gagal mengirim data");
			},
			success: function (data) {
				$("input[name=csrf_sipp_token]").val(data.csrf);
				if (data.status == "password!!!") {
					swal.fire({
						icon: "error",
						title: "Login",
						text: "Password yang anda masukkan salah !",
					});
					$("#idpass").val("");
				} else if (data.status == "akun!!!") {
					swal.fire({
						icon: "error",
						title: "Login",
						text: "Akun tidak ditemukan !",
					});
					$("#idpengguna").val("");
					$("#idpass").val("");
				} else {
					location.reload();
				}
			},
		});
		return false;
	});

	// Daftar
	$("#signup").on("submit", function () {
		// CSRF
		var csrfName = $("input[name=csrf_sipp_token]").attr("name");
		var csrfHash = $("input[name=csrf_sipp_token]").val(); // CSRF hash

		// Data
		var nama = $("#daftar-nama").val();
		var password = $("#password").val();
		var nohp = $("#daftar-nohp").val();
		var email = $("#daftar-email").val();
		var jk = $("select#jeniskelamin").children("option:selected").val();
		$.ajax({
			type: "post",
			url: BaseURL + "masuk/daftardong",
			beforeSend: function () {
				swal.fire({
					title: "Menunggu",
					html: "Memproses data",
					didOpen: () => {
						swal.showLoading();
					},
				});
			},
			data: {
				nama: nama,
				password: password,
				nohp: nohp,
				email: email,
				jk: jk,
				[csrfName]: csrfHash,
			}, // ambil datanya dari form yang ada di variabel
			dataType: "JSON",
			error: function (data) {
				console.log("gagal mengirim data");
			},
			success: function (data) {
				$("input[name=csrf_sipp_token]").val(data.csrf);
				if (data.status == "email!!!") {
					swal.fire({
						icon: "error",
						title: "Daftar",
						text: "Email yang anda masukkan sudah terdaftar !",
					});
					$("#daftar-email").val("");
				} else if (data.status == "nohp!!!") {
					swal.fire({
						icon: "error",
						title: "Daftar",
						text: "Nomor Hp yang anda masukkan sudah terdaftar !",
					});
					$("#daftar-nohp").val("");
				} else {
					$.ajax({
						type: "GET",
						url: "http://panel.rapiwha.com/send_message.php",
						data: {
							apikey: data.apikey,
							number: data.nohp,
							text: data.message,
						}, // ambil datanya dari form yang ada di variabel
						error: function (data) {
							console.log("gagal mengirim WA");
						},
						success: function (data) {
							location.reload();
						},
					});
				}
			},
		});
		return false;
	});

	$("#formactive").on("submit", function () {
		// CSRF
		var csrfName = $("input[name=csrf_sipp_token]").attr("name");
		var csrfHash = $("input[name=csrf_sipp_token]").val(); // CSRF hash

		var kode = $("#kodeactive").val();
		$.ajax({
			type: "post",
			url: BaseURL + "masuk/actvcode",
			beforeSend: function () {
				swal.fire({
					title: "Menunggu",
					html: "Memproses data",
					didOpen: () => {
						swal.showLoading();
					},
				});
			},
			data: {
				kode: kode,
				[csrfName]: csrfHash,
			}, // ambil datanya dari form yang ada di variabel
			dataType: "JSON",
			error: function (data) {
				console.log(data.responseText);
			},
			success: function (res) {
				$("input[name=csrf_sipp_token]").val(res.csrf);
				console.log(res);
				if (res.status == "sejen!!!") {
					swal.fire({
						icon: "error",
						title: "Aktivasi",
						text: "Kode yang anda masukkan salah !",
					});
					$("#kodeactive").val("");
				} else {
					window.location.href = BaseURL;
				}
			},
		});
		return false;
	});
});
