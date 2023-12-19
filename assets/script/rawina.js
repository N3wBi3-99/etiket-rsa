$(document).ready(function () {
	let table = $("#rawina").DataTable({
		processing: false,
		serverSide: false,
		ajax: {
			url: base_url + "obat/Rawat_inap/rawina_data",
			type: "GET",
		},
		columnDefs: [
			{
				targets: [1, 2, 4, -1],
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
	// menemapilkan data pasien di modal
	let pasienData;

	$("#tampil_data").on("click", ".lihat", function () {
		pasienData = table.row($(this).closest("tr")).data();
		var today = new Date();
		let lahir = pasienData[4].split("-");
		let age = today.getFullYear() - lahir[2];
		if (today.getMonth() < lahir[1] - 1) {
			age -= 1;
		} else if (today.getMonth() == lahir[1] - 1) {
			if (today.getDate() < lahir[0]) {
				age -= 1;
			}
		}

		$("#dataObat").modal("show");
		$(".modal-title").text(pasienData[3] + " ( " + age + " Tahun )");

		// proses ajax tabel obat
		let id = $(this).attr("data");
		let nodoku = $(this).attr("data-obat");
		let obat = $("#obat").DataTable({
			processing: false,
			serverSide: false,
			ajax: {
				type: "POST",
				data: { id: id, nodoku: nodoku },
				url: base_url + "obat/Rawat_inap/getObat",
			},
			columnDefs: [
				{
					targets: [0, 2, 3, 4, 5],
					className: "text-center",
					orderable: false,
					sortable: false,
				},
			],
		});
		// end
		$("#dataObat").on("hide.bs.modal", function () {
			obat.destroy();
		});
		return false;
	});

	$("[data-checkboxes]").each(function () {
		var me = $(this),
			group = me.data("checkboxes"),
			role = me.data("checkbox-role");

		me.change(function () {
			var all = $(
					'[data-checkboxes="' + group + '"]:not([data-checkbox-role="dad"])'
				),
				checked = $(
					'[data-checkboxes="' +
						group +
						'"]:not([data-checkbox-role="dad"]):checked'
				),
				dad = $('[data-checkboxes="' + group + '"][data-checkbox-role="dad"]'),
				total = all.length,
				checked_length = checked.length;

			if (role == "dad") {
				if (me.is(":checked")) {
					all.prop("checked", true);
				} else {
					all.prop("checked", false);
				}
			} else {
				if (checked_length >= total) {
					dad.prop("checked", true);
				} else {
					dad.prop("checked", false);
				}
			}
		});
	});
	$("#cetak").on("click", function () {
		var modalTitle = $(".modal-title").text();
		var selectedRows = $("#obat").DataTable().rows({ selected: true }).nodes();
		var selectedRowsData = [];
		$(selectedRows).each(function () {
			var rowData = [];
			// Cek apakah checkbox pada baris ini dicentang
			var isChecked = $(this).find('input[type="checkbox"]:checked').length > 0;

			if (isChecked) {
				// Ambil nilai dari textbox yang baru saja diketikkan
				var obatNama = $(this).find("td:eq(1)").text();
				var aturan = $(this).find('select[name="aturan"]').val();
				var waktu = $(this).find('select[name="waktu"]').val();
				var keterangan = $(this).find('input[name="keterangan"]').val();
				rowData.push(modalTitle, obatNama, aturan, waktu, keterangan); // Tambahkan nilai input ke dalam rowData
				selectedRowsData.push(rowData);
			}
		});

		console.log(pasienData[3]);
		console.log(selectedRowsData);
		// You can perform actions with the selectedRowsData here
	});
	function printData(data) {
		var printContent =
			'<h1>Data untuk Cetak</h1><table border="1"><tr><th>Judul Modal</th><th>Obat</th><th>Aturan</th><th>Waktu</th><th>Keterangan</th></tr>';

		for (var i = 0; i < data.length; i++) {
			printContent += "<tr>";
			for (var j = 0; j < data[i].length; j++) {
				printContent += "<td>" + data[i][j] + "</td>";
			}
			printContent += "</tr>";
		}
		printContent += "</table>";

		var printWindow = window.open("", "_blank");
		printWindow.document.open();
		printWindow.document.write(
			"<html><head><title>Cetak Data</title></head><body>" +
				printContent +
				"</body></html>"
		);
		printWindow.document.close();

		// Cetak jendela baru
		printWindow.print();
	}
});
