$(document).ready(function () {
	let table = $("#rawjal").DataTable({
		processing: false,
		serverside: false,
		ajax: {
			url: base_url + "obat/Rawat_jalan/rawjal_data",
			type: "GET",
		},
		columnDefs: [
			{
				targets: [-1],
				className: "text-center",
				width: "100px",
				orderable: false,
			},
		],
	});
	// cek

	setInterval(function () {
		table.ajax.reload(null, false);
	}, 30000);

	//GET Data
	$("#tampil_data").on("click", ".lihat", function () {
		// menemapilkan data pasien di modal
		let pasien = table.row($(this).closest("tr")).data();

		var today = new Date();
		let lahir = pasien[4].split("-");
		let age = today.getFullYear() - lahir[2];
		if (today.getMonth() < lahir[1] - 1) {
			age -= 1;
		} else if (today.getMonth() == lahir[1] - 1) {
			if (today.getDate() < lahir[0]) {
				age -= 1;
			}
		}

		$("#dataObat").modal("show");
		$(".modal-title").text(pasien[3] + " ( " + age + " Tahun )");

		// proses ajax tabel obat
		let id = $(this).attr("data");
		let obat = $("#obat").DataTable({
			processing: false,
			serverside: false,
			ajax: {
				type: "GET",
				data: { id: id },
				url: base_url + "obat/Rawat_jalan/getObat",
			},
			columnDefs: [
				{
					targets: [-1],
					className: "text-center",
					orderable: false,
				},
			],
		});
		// end
		$("#dataObat").on("hide.bs.modal", function () {
			obat.destroy();
		});
		return false;
	});
});
