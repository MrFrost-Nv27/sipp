$(document).ready(function () {
	// Animasi
	$(".preloader").fadeOut();

	$("#formsatu").submit(function (e) {
		e.preventDefault();
		var $form = $(this);
		return (
			false,
			($step = $form.parents(".modal-body")),
			(stepIndex = $step.index()),
			($pag = $(".modal-header span").eq(stepIndex)),
			step1($step, $pag)
		);
	});

	$("#formdua").submit(function (e) {
		e.preventDefault();
		var $form = $(this);
		return (
			false,
			($step = $form.parents(".modal-body")),
			(stepIndex = $step.index()),
			($pag = $(".modal-header span").eq(stepIndex)),
			step1($step, $pag)
		);
	});

	$("#formtiga").on("submit", function () {
		var nohp = $("#nohp").val();
		var nik = $("#nik").val();
		var tmplahir = $("#tmplahir").val();
		var tgllahir = $("#tgllahir").val();
		var agama = $("#agama").val();
		var hobby = $("#hobby").val();
		var jl = $("#jl").val();
		var rt = $("#rt").val();
		var rw = $("#rw").val();
		var no = $("#no").val();
		var dk = $("#dk").val();
		var ds = $("#ds").val();
		var kec = $("#kec").val();
		var kab = $("#kab").val();
		var ayah_nama = $("#ayah_nama").val();
		var ayah_nohp = $("#ayah_nohp").val();
		var ayah_kerja = $("#ayah_kerja").val();
		var ibu_nama = $("#ibu_nama").val();
		var ibu_nohp = $("#ibu_nohp").val();
		var ibu_kerja = $("#ibu_kerja").val();
		var sdrkandung = $("#sdrkandung").val();
		var avghasil = $("#avghasil").val();
		$.ajax({
			type: "post",
			url: BaseURL + "ppdb/inputdata",
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
				nohp: nohp,
				nik: nik,
				tmplahir: tmplahir,
				tgllahir: tgllahir,
				agama: agama,
				hobby: hobby,
				jl: jl,
				rt: rt,
				rw: rw,
				no: no,
				dk: dk,
				ds: ds,
				kec: kec,
				kab: kab,
				ayah_nama: ayah_nama,
				ayah_nohp: ayah_nohp,
				ayah_kerja: ayah_kerja,
				ibu_nama: ibu_nama,
				ibu_nohp: ibu_nohp,
				ibu_kerja: ibu_kerja,
				sdrkandung: sdrkandung,
				avghasil: avghasil,
			}, // ambil datanya dari form yang ada di variabel
			dataType: "JSON",
			error: function (data) {
				console.log("gagal mengirim data");
			},
			success: function (data) {
				Swal.fire(
					"Input Biodata",
					"Datamu berhasil diinput, lanjut ke tahap berikutnya",
					"success"
				).then((result) => {
					/* Read more about isConfirmed, isDenied below */
					if (result.isConfirmed) {
						window.location.href = BaseURL;
					}
				});
			},
		});
		return false;
	});

	$(".button").click(function () {
		var $btn = $(this),
			$step = $btn.parents(".modal-body"),
			stepIndex = $step.index(),
			$pag = $(".modal-header span").eq(stepIndex);
		step1($step, $pag);
	});

	function step1($step, $pag) {
		console.log("step1");
		// animate the step out
		$step.addClass("animate-out");

		// animate the step in
		setTimeout(function () {
			$step.removeClass("animate-out is-showing").next().addClass("animate-in");
			$pag.removeClass("is-active").next().addClass("is-active");
		}, 600);

		// after the animation, adjust the classes
		setTimeout(function () {
			$step.next().removeClass("animate-in").addClass("is-showing");
		}, 1200);
	}
});
