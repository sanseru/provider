    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>
          <script type="text/javascript">

<?php if($this->session->flashdata('success')){ ?>
    toastr.success("<?php echo $this->session->flashdata('success'); ?>");
<?php } ?>
    </script>

          <!-- Content Row -->
          <div class="row">
              <!-- Default Card Example -->
    <!--           <div class="card mb-12">
                <div class="card-header">
                  Default Card Example
                </div>
                <div class="card-body">
                  This card uses Bootstrap's default styling with no utility classes added. Global styles are the only things modifying the look and feel of this default card example.
                </div>
              </div> -->


            <div class="col-xl-12 col-md-6 mb-4">
              <!-- Default Card Example -->
              <div class="card mb-12">
                <div class="card-header">
                  Mengaktifkan Provider
                </div>
                <div class="card-body">
                  Halaman ini digunakan untuk melakukan pengaktifan provider yang sebelumnya sudha dibuat pada halaman ini. sehingga pada aplikasi lama akan tampil dan lakukan pengeditan.<br><br>
                  <p>###Jika sudah lakukan Pengatifan silahkan lakukan pengeditan pada aplikasi lama mas.medikapalza.com###</p>
                </div>
              </div>

            </div>

            <!-- Earnings (Monthly) Card Example -->
<!--             <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Provider</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jmlprovider ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-hospital-alt fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->

            <!-- Earnings (Monthly) Card Example -->
<!--             <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Provider Active</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $provideractive ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-hospital-alt fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->

            <!-- Earnings (Monthly) Card Example -->
            <!-- <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-hospital-alt fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->

            <!-- Pending Requests Card Example -->
            <!-- <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-hospital-alt fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>  -->
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
                  <?php
                          $no = 1;                        
                          foreach($ambil_info as $row){
                      ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><a href="<?php echo site_url('Welcome/history/'.$row->provider_id);?>"><i class="fa fa-pencil"></i> <?php echo $row->provider_name; ?></td>
                      <td><?php echo $row->address; ?></td>
                      <td><a class="btn btn-success btn-circle btn-xs" href="<?php echo site_url('Provider_ubah/update/'.$row->provider_id);?>" onclick="return confirm('Apakah Yakin Provider Ini sudah Selesai Status Follow Up Nya ?')"> <i class="fas fa-check"></i></a></td>

                    </tr>
                          
                    <?php 
                      }
                      ?>
                    

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