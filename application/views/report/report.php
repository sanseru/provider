    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>
          <script type="text/javascript">

<?php if($this->session->flashdata('success')){ ?>
    toastr.success("<?php echo $this->session->flashdata('success'); ?>");
<?php } ?>
    </script>

          <!-- Content Row -->
          <div class="row">
            <div class="col-xl-12 col-md-6 mb-4">
              <!-- Default Card Example -->
              <div class="card mb-12">
                <div class="card-header">
                  Mengaktifkan Provider
                </div>
                <div class="card-body">
                  Halaman ini digunakan untuk melakukan pengaktifan provider yang sebelumnya sudah dibuat pada halaman ini. sehingga pada aplikasi lama akan tampil dan lakukan pengeditan.<br><br>
                  <p>###Jika sudah lakukan Pengaktifan silahkan lakukan pengeditan pada aplikasi lama https://mas.medikapalza.com ###</p>
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
                <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <th>No</th>
                      <th>Provider</th>
                      <th>Info Terakhir</th>
                      <th>Action</th>
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
                      <td><a href="<?php echo site_url('Welcome/history/'.$row->provider_id);?>"><i class="fa fa-pencil"></i> <?php echo $row->provider_name; ?></td>
                      <td><?php echo $row->address; ?></td>
                      <td><a class="btn btn-success btn-circle btn-xs" href="<?php echo site_url('Provider_ubah/update/'.$row->provider_id);?>" onclick="return confirm('Apakah Yakin Provider Ini akan di aktifkan kembali ?')"> <i class="fas fa-check"></i></a></td>

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
                      <th>Action</th>
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