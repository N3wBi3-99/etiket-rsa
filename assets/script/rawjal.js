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

	setInterval(function () {
		table.ajax.reload(null, false);
	}, 30000);

	//GET Data
	$("#tampil_data").on("click", ".lihat", function () {
		$("#dataObat").modal("show");
		let id = $(this).attr("data");
		let obat = $("#obat").DataTable({
			processing: false,
			serverside: false,
			ajax: {
				url: base_url + "obat/Rawat_jalan/getObat",
				type: "GET",
				data: { id: id },
			},
			columnDefs: [
				{
					targets: [-1],
					className: "text-center",
					orderable: false,
				},
			],
		});
		$("#dataObat").on("hide.bs.modal", function () {
			obat.destroy();
		});
		return false;
	});
});
