  <!-- Begin Page Content -->
  <div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-8">
<h1 class="h3 mb-4 text-gray-800">Dashboard</h1>


</div>
<button class="btn mb-4 btn-danger btn-sm" data-toggle="modal" data-target="#myModalAdd">Add New</button>

<!-- Content Row -->
<div class="row">
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
  </div>
  <div class="card-body">

  <div class="form-row">
    <div class="col">
    <label>Status</label>
    <select class="custom-select custom-select-sm">
  <option selected>Open this select menu</option>
  <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option>
</select>
    </div>

    <div class="col">
    <label>Rumah Sakit</label>
      <!-- <input type="text" class="form-control" placeholder="Rumah sakit"> -->
      
    </div>
  </div>
    <div class="form-group">
    <label>Catatan</label>
    <textarea type="text" name="client" class="form-control" placeholder="Masukan Catatan" required></textarea>
    </div>

  </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modals -->

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
    <select class="custom-select custom-select-lg mb-3">
  <option selected>Open this select menu</option>
  <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option>
</select>
    </div>

    <div class="col">
    <label>Rumah Sakit</label>
      <input type="text" class="form-control" placeholder="Rumah sakit">
    </div>
  </div>
    <div class="form-group">
    <label>Catatan</label>
    <textarea type="text" name="client" class="form-control" placeholder="Masukan Catatan" required></textarea>
    </div>
      

</div> 

      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- /Modals -->    
<script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
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
                    "scrollY":        '50vh',
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
                        },{"data": "id_log_prov"}
                    ],
                    "oLanguage": {
                    "sSearch": "Cari Tahun"
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
<script>
// In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});</script>