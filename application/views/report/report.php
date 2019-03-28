              <!-- <?php var_dump($date1); ?> -->

<!-- Begin Page Content -->
<div class="container-fluid">
   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Report</h1>
   </div>

   <!-- Content Row -->
   <div class="row">
      <div class="col-xl-12 col-md-6 mb-4">
         <!-- Default Card Example -->
         <div class="card mb-6">
            <div class="card-header">
               Tarik Report
            </div>
            <div class="card-body">
               <div class="col-xl-12 col-md-6 mb-4">
                  <form class="user" action="<?php echo site_url('report');?>" method="post">
                     <div  class="form-group row date">
                        <div class="col-sm-6 mb-3 mb-sm-0" >
                           <input type="text" class="form-control form-control-user" id="datepicker" name="date1" placeholder="Tanggal Awal">
                        </div>
                        <div class="col-sm-6">
                           <input type="text" class="form-control form-control-user" id="datepicker2" name="date2" placeholder="Tanggal Akhir">
                        </div>
                     </div>
                     <br>
                             <button type="submit" class="btn btn-primary btn-user btn-block">Search</button>

                     <hr>

                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- DataTales Example -->
   <div class="card shadow mb-4">
      <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">History Data Provider</h6>
      </div>
      <div class="card-body">
         <div class="table-responsive">
            <div><?php echo anchor(site_url('Report/excel/'.$date1.'/'.$date2), '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-sm"'); ?></div><br>
            <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
               <thead>
                  <tr>
                     <th>No</th>
                     <th>Provider</th>
                     <th>Info Terakhir</th>
                  </tr>
               </thead>
               <tbody>
                  <?php if (!empty($ambil_info)): ?>
                  <?php

                     $no = 1;                        
                     foreach($ambil_info as $row){
                     ?>
                  <tr>
                     <td><?php echo $no++; ?></td>
                     <td>
                        <a href="<?php echo site_url('Welcome/history/'.$row->id_log_prov);?>">
                           <i class="fa fa-pencil"></i> <?php echo $row->nm_rs; ?>
                     </td>
                     <td><?php echo $row->notes; ?></td>
                  </tr>
                  <?php 
                     }
                     ?>
                  <?php endif; ?>
               </tbody>
               <tfoot>
                  <tr>
                     <th>No</th>
                     <th>Provider</th>
                     <th>Info Terakhir</th>
                  </tr>
               </tfoot>
            </table>
         </div>
      </div>
   </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->