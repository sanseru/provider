  <!-- Begin Page Content -->
  <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-8">
<h1 class="h3 mb-4 text-gray-800">PROVIDER PROGRESS</h1>


</div>
<div class="row">

<div class="col-xl-3 col-md-6 mb-7">
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
            <th>Provider</th>
            <th>PKS</th>
 
          </tr>
        </thead>
        <tfoot>
          <tr>
          <th>No</th>
            <th>Provider</th>
            <th>PKS</th>

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
<form id="add-row-form" action="<?php echo site_url('Pks_upload/create_action');?>" method="post" enctype="multipart/form-data">
<div class="modal" id="myModalAdd" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Upload PKS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="overflow:hidden;">
      <div class="form-row">

    <div class="col" style="text-align: center;">
    <label>Provider Category</label><br>
      <select class="custom-select custom-select-sm" name="provider" required>
      <option selected>Pilih Provider yang Akan Di Upload PKS Nya</option>
      <?php 

foreach($provs as $row)
{ 
  echo '<option value="'.$row->provider_id.'">'.$row->provider_name.'</option>';
}
?>
</select>
    </div>
  </div>

  <br>
    <div class="form-group" style="text-align: center;">
    <label>Upload File</label><br>
    </div>
    <div style="text-align: right;">
    <input type="file" name="pks" /> 
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
                    ajax: {"url": "Pks_upload/json", "type": "POST"},
                    columns: [
                        {
                            "data": "id_pks",
                            "orderable": false
                        },{"data": "nm_provider"},
                        {"data": "file_pks",
                        "render" : 
                        function ( data, type, full, meta ) { 
                                                return '<a href="<?php echo base_url();?>/upload/'+data+'" target="_blank"><i class="fas fa-download"></i><span> PKS</span></a>';}},
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

        </script>

        <script>$(document).ready(function() {
    $('.custom-select').select2();
});</script>
