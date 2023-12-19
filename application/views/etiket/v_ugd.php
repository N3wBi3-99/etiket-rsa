<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="card card-success collapsed-card">
        <div class="card-header">
          <h3 class="card-title">Etiket Resep Harian UGD (Rawat Jalan)</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <table id="rawjal" class="table table-bordered table-striped" style="width:100%">
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

      <div class="card card-success collapsed-card">
        <div class="card-header">
          <h3 class="card-title">Etiket Resep Harian UGD (Rawat Inap)</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <table id="rawnap" class="table table-bordered table-striped" style="width:100%">
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
  <div class="modal fade" tabindex="-1" role="dialog" id="dataObatJalan">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Lihat Obat</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table id="obat" class="table table-bordered table-striped" style="width:100%">
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