 </div>
 <!-- /.content-wrapper -->
 <footer class="main-footer">
   <strong>Copyright &copy; 2014 - <?= date('Y') ?> <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
   All rights reserved.
   <div class="float-right d-none d-sm-inline-block">
     <b>Version</b> 3.2.0
   </div>
 </footer>

 <aside class="control-sidebar control-sidebar-dark">
 </aside>
 </div>

 <!-- jQuery -->

 <script>
   $.widget.bridge('uibutton', $.ui.button)
 </script>
 <!-- Bootstrap 4 -->
 <script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

 <!-- AdminLTE App -->
 <script src="<?= base_url(); ?>assets/dist/js/adminlte.js"></script>
 <!-- SweetAlert2 -->
 <script src="<?= base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
 <!-- Toastr -->
 <script src="<?= base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>
 <!-- DataTables  & Plugins -->
 <script src="<?= base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
 <script src="<?= base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
 <script src="<?= base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
 <script src="<?= base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
 <script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
 <script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
 <script src="<?= base_url(); ?>assets/plugins/jszip/jszip.min.js"></script>
 <script src="<?= base_url(); ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
 <script src="<?= base_url(); ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
 <script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
 <script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
 <script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

 <script>
   const base_url = '<?= base_url() ?>';
 </script>

 <?= (isset($js)) ? $js : ''; ?>
 <?= $this->session->flashdata('message'); ?>

 <script>
   $(function() {
     $("#example1").DataTable({
       "responsive": true,
       "lengthChange": false,
       "autoWidth": false,
       "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
     }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
     $('#example2').DataTable({
       "paging": true,
       "lengthChange": false,
       "searching": false,
       "ordering": true,
       "info": true,
       "autoWidth": false,
       "responsive": true,
     });
   });
 </script>
 </body>

 </html>