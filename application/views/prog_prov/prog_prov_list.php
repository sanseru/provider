  <!-- Begin Page Content -->
  <div class="container-fluid">

<!-- Page Heading -->
<!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
  <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>

</div> -->
<div class="d-sm-flex align-items-center justify-content-between mb-8">
<h1 class="h3 mb-4 text-gray-800">PROVIDER PROGRESS</h1>


</div>
<div class="row">

<div class="col-xl-3 col-md-6 mb-7">
</div>
<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-5 col-md-6 mb-7">
  <div class="card border-left-primary shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Data Input Pada hari Ini</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $countaday ?></div>
        </div>
        <div class="col-auto">
          <i class="fas fa-calendar fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<button class="btn mb-4 btn-danger btn-sm" data-toggle="modal" data-target="#myModalAdd">Add New</button>

<!-- Content Row -->


<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Progress Provider</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Status</th>
            <th>Provider</th>
            <th>Notes</th>
            <th>created By</th>
            <th>Created Date</th>
            <th>Action</th>

            <!-- <th>Start date</th>
            <th>Salary</th> -->
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>No</th>
            <th>Status</th>
            <th>Provider</th>
            <th>Notes</th>
            <th>created By</th>
            <th>Created Date</th>
            <th>Action</th>

            <!-- <th>Office</th>
            <th>Age</th>
            <th>Start date</th>
            <th>Salary</th> -->
          </tr>
        </tfoot>
        <tbody>
        
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modals -->
<form id="add-row-form" action="<?php echo site_url('Prog_prov/create_action');?>" method="post">
<div class="modal" id="myModalAdd" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Log Provider</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="overflow:hidden;">
      <div class="form-row">
    <div class="col">
    <label>Status</label>
    <select name ="status" class="custom-select custom-select-sm">
  <option selected><---- PILIH STATUS ----></option>
  <?php 

            foreach($groups as $row)
            { 
              echo '<option value="'.$row->id_status.'">'.$row->status.'</option>';
            }
            ?>
</select>
    </div>

    <div class="col">
    <label>Rumah Sakit</label>
      <select class="custom-select custom-select-sm" name="provider">
      <option selected>Pilih Provider Yang Di Tuju</option>
      <?php 

foreach($provs as $row)
{ 
  echo '<option value="'.$row->provider_id.'">'.$row->provider_name.'</option>';
}
?>
</select>
    </div>
  </div>
    <div class="form-group">
    <label>Catatan</label>
    <textarea type="text" name="catatan" class="form-control" placeholder="Masukan Catatan" required></textarea>
    </div>
      

</div> 

      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</form>
<!-- /Modals -->

<!-- Modals -->
<form id="add-row-form" action="<?php echo site_url('Prog_prov/update_action');?>" method="post">
<div class="modal" id="myModalEdit" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Log Provider</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="overflow:hidden;">
      <div class="form-row">
    <div class="col">
    <label>Status</label>
    <input type="hidden" name="id_main">
    <select name ="status" id="status" class="custom-select custom-select-sm">
  <?php 

            foreach($groups as $row)
            { 
              echo '<option value="'.$row->id_status.'">'.$row->status.'</option>';
            }
            ?>
</select>
    </div>

    <div class="col">
    <label>Rumah Sakit</label>
      <select class="custom-select custom-select-sm" name="provider">
      <?php 

foreach($provs as $row)
{ 
  echo '<option value="'.$row->provider_id.'">'.$row->provider_name.'</option>';
}
?>
</select>
    </div>
  </div>
    <div class="form-group">
    <label>Catatan</label>
    <textarea type="text" name="catatan" class="form-control" placeholder="Masukan Catatan" required></textarea>
    </div>
      

</div> 

      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</form>
<!-- /Modals -->



<!-- Modals -->
<form id="add-row-form" action="<?php echo site_url('Prog_prov/delete');?>" method="post">
<div class="modal" id="myModalDel" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Log Provider</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="overflow:hidden;">
 
      <input type="hidden" id="id_main" name="id_main" >
          <strong>Apakah anda Ingin Menghapus ini?
          </strong>

</div> 

      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Ya</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</form>
<!-- /Modals -->
<script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?php echo base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <!-- <script src="<?php echo base_url(); ?>assets/js/demo/datatables-demo.js"></script> -->
        <script type="text/javascript">
            $(document).ready(function() {
                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                {
                    return {
                        "iStart": oSettings._iDisplayStart,
                        "iEnd": oSettings.fnDisplayEnd(),
                        "iLength": oSettings._iDisplayLength,
                        "iTotal": oSettings.fnRecordsTotal(),
                        "iFilteredTotal": oSettings.fnRecordsDisplay(),
                        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };

                var t = $("#dataTable").dataTable({
                    "scrollX": true,
                    "scrollY":        '100vh',
                    "scrollCollapse": true,
                    initComplete: function() {
                        var api = this.api();
                        $('#mytable_filter input')
                                .off('.DT')
                                .on('keyup.DT', function(e) {
                                    if (e.keyCode == 13) {
                                        api.search(this.value).draw();
                            }
                        });
                        
                    },
                    oLanguage: {
                        sProcessing: "loading..."
                    },
                    processing: true,
                    serverSide: true,
                    ajax: {"url": "Prog_prov/json", "type": "POST"},
                    columns: [
                        {
                            "data": "id_log_prov",
                            "orderable": false
                        },{"data": "status"},{"data": "nm_rs"},{"data": "notes"},{"data": "created_by_username"}, {"data": "created_date"},{"data": "view"}
                    ],
                    "oLanguage": {
                    "sSearch": "Search"
                    },
                    order: [[0, 'desc']],
                    rowCallback: function(row, data, iDisplayIndex) {
                        var info = this.fnPagingInfo();
                        var page = info.iPage;
                        var length = info.iLength;
                        var index = page * length + (iDisplayIndex + 1);
                        $('td:eq(0)', row).html(index);
                    }
                });
            });

             // get Edit Records
             $('#dataTable').on('click','.edit_record',function(){
            var code=$(this).data('code');
                        var id_stat=$(this).data('stat');
                        var id_rumahsakit=$(this).data('idrs');
                        var notes=$(this).data('notes');
// alert(id_stat);
            $('#myModalEdit').modal('show');
                        $('[name="id_main"]').val(code);
                        // $('#status option[value='+id_stat+']').attr("selected", true).siblings().removeAttr("selected");
                        $("form select[name=status]").val(id_stat).change();                        
                        // $('select[name="id_rumahsakit"] option:selected').val(id_rumahsakit);
                        $("form select[name=provider]").val(id_rumahsakit).change();                        
                        $('[name="catatan"]').val(notes);
   

      });

                  // get delete Records
        $('#dataTable').on('click','.delete_record',function(){
        var code=$(this).data('code');
        $('#myModalDel').modal('show');
        $('[name="id_main"]').val(code);
      });
        </script>

        <script>$(document).ready(function() {
    $('.custom-select').select2();
});</script>
