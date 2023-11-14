$(document).ready(function () {
  let table = $('#table').DataTable({
    "processing": false,
    "serverside": false,
    "ajax": {
      "url": base_url + 'obat/Rawat_jalan/rawjal_data',
      "type": "GET",
    },
    "columnDefs": [{
      "targets": [-1],
      "className": 'text-center',
      "width": "100px",
      "orderable": false,
    }],
  });

})