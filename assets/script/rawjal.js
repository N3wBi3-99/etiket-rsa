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
			ajax: {
				type: "GET",
				data: { id: id },
				url: base_url + "obat/Rawat_jalan/getObat",
			},
			columnDefs: [
				{
					orderable: false,
					defaultContent: "",
					className: "select-checkbox",
					targets: 0,
				},
			],
			select: {
				style: "multi",
				selector: "td:first-child",
			},
		});

		// Get selected rows when the button is clicked
		$("#getSelectedRowsBtn").on("click", function () {
			var selectedRows = $("#obat")
				.DataTable()
				.rows({ selected: true })
				.nodes();
			// var selectedRows = table.rows({ selected: true }).nodes();
			var selectedRowsData = [];
			$(selectedRows).each(function () {
				var rowData = [];
				// Get the data from the cells in the row

				$("input", this).each(function () {
					rowData.push($(this).val());
				});
				selectedRowsData.push(rowData);
			});

			console.log(selectedRowsData);
			// You can perform actions with the selectedRowsData here
		});

		// end
		$("#dataObat").on("hide.bs.modal", function () {
			obat.destroy();
		});
		return false;
	});
});
