 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-info elevation-4">
   <!-- <aside class="main-sidebar sidebar-info-light elevation-4"> -->
   <!-- Brand Logo -->
   <a href="index3.html" class="brand-link">
     <img src="<?= base_url(); ?>assets/img/logo-no-bg.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
     <span class="brand-text font-weight-light font-weight-bold">Etiket Farmasi</span>
   </a>

   <!-- Sidebar -->
   <div class="sidebar">

     <!-- Sidebar Menu -->
     <nav class="mt-2">
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <li class="nav-item">
           <a href="<?= $rajal ?>" class="nav-link <?= $this->uri->segment('2') == 'Rawat_jalan' ? 'active' : ''  ?>">
             <i class="nav-icon fas fa-prescription-bottle-alt"></i>
             <p>
               Rawat Jalan
               <span class="right badge badge-danger">New</span>
             </p>
           </a>
         </li>
         <li class="nav-item">
           <a href="<?= $ranap ?>" class="nav-link <?= $this->uri->segment('2') == 'Rawat_inap' ? 'active' : ''  ?>">
             <i class="nav-icon fas fa-file-medical"></i>
             <p>
               Rawat Inap
               <span class="right badge badge-danger">New</span>
             </p>
           </a>
         </li>
         <li class="nav-item">
           <a href="<?= $ugd ?>" class="nav-link <?= $this->uri->segment('2') == 'Ugd' ? 'active' : ''  ?>">
             <i class="nav-icon fas fa-clinic-medical"></i>
             <p>
               UGD
               <span class="right badge badge-danger">New</span>
             </p>
           </a>
         </li>
       </ul>
     </nav>
     <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
 </aside>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
 <script src="<?= base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
 <!-- <script src="<?= base_url(); ?>assets/script/global.js"></script> -->