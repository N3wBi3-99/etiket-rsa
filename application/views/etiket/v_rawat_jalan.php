<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header bg-success">
          <h3 class="card-title">Etiket Resep Harian Rawat Jalan</h3>
        </div>
        <div class="card-body">
          <table id="rawjal" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>NO. RM</th>
                <th>BUKTI</th>
                <th>NAMA PASIEN</th>
                <th>TANGGAL LAHIR</th>
                <th>NAMA DOKTER</th>
                <th>AKSI</th>
              </tr>
            </thead>
            <tbody id="tampil_data">

            </tbody>
          </table>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- lihat obat -->
  <div class="modal fade" tabindex="-1" role="dialog" id="dataObat">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Lihat Obat</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table id="obat" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>NAMA OBAT</th>
                <th>ATURAN</th>
                <th>WAKTU</th>
                <th>KETERANGAN</th>
                <th>AKSI</th>
              </tr>
            </thead>
            <tbody id="obat_data">

            </tbody>
          </table>
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">Batal</button>
          <button type="submit" id="simpan" class="btn btn-primary">Cetak</button>
        </div>
      </div>
    </div>
  </div>
  <!-- lihat obat end -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- ini untuk content margin agak banyak -->
    </div>
  </section>