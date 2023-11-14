let table;
$(document).ready(function(){
	getDataKlaimRawatJalan();
	$('#tabel_klaim_rj_length').on('change', function() {
		table.page.len($(this).val()).draw();
		table.ajax.reload();
		// console.log('change');
	});
});

function getDataKlaimRawatJalan() {
	table = $('#tabel_klaim_rj').DataTable({
		"scrollY": '400px',
		"scrollCollapse": true,
		"responsive": true,
		"fixedHeader": true,
		"autoWidth": true,
		"processing": true,
		"serverSide": true,
		"destroy": true,
		"ajax": {
			"url": baseUrl + "/dataclaim/rawat_jalan/getDataKlaimRawatJalan",
			"type": "POST"
		},
		"columnDefs": [{
			"targets": [0],
			"orderable": false,
		},
		],
		"lengthMenu": [[ 20, 50, 100, -1], [20, 50, 100, "All"]],
		"pageLength": 20,
		"language": {
			"lengthMenu": "Show _MENU_ entries",
			"info": "Showing _START_ to _END_ of _TOTAL_ entries",
			"infoFiltered": "(filtered from _MAX_ total entries)",
			"search": "Search:",
			"paginate": {
				"first": "First",
				"last": "Last",
				"next": "Next",
				"previous": "Previous"
			}
		},
		"buttons": [
		{
			extend: 'excel',
			text: 'Excel',
			className: 'btn btn-success',
			exportOptions: {
				columns: ':visible'
			}
		},
		{
			extend: 'copy',
			text: 'Copy',
			className: 'btn btn-info',
			exportOptions: {
				columns: ':visible'
			}
		},
		{
			extend: 'pdf',
			text: 'PDF',
			className: 'btn btn-danger',
			exportOptions: {
				columns: ':visible'
			}
		},
		{
			extend: 'colvis',
			text: 'Column Visibility',
			className: 'btn btn-secondary'
		}
		],
		"dom": 'Bfrtip',
	});
	$('#tabel_klaim_rj_length select').addClass('custom-select custom-select-sm form-control form-control-sm');
}