@extends('layouts.layout')

@section('content')
<div class="col-lg-12 panels" style="margin-left: -5px;margin-bottom: 25px;">
  <div class="panel panel-default">
    <div class="panel-heading">
      <strong id="title">Customer Monitoring</strong>
    </div>
    <br>
    <div class="panel-body">
      <div class="row">
        <div class="table-responsive">
          <div class="col-md-12 classic">
            <table class="table table-bordered table-hover" id="table">
              <thead>
                <tr>
                  <th width="5%";>#</th>
                  <th style="text-align:center;">Account Number</th>
                  <th style="text-align:center;">Name</th>
                  <th style="text-align:center;">Balance</th>
                  <th style="text-align:center;">Action</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('template/DataTables2/datatables.min.css') }}" />
<style type="text/css">
@media only screen and (max-width: 1026px) {
    .tombol {
        display: none;
    }
}
</style>
@endsection
@section('js')
<script type="text/javascript" src="{{ asset('template/DataTables2/datatables.min.js') }}"></script>
<script type="text/javascript">
(function ( $ ){
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
  });
  getData();

})( jQuery );

function reloadTable(){
  table.ajax.reload(null,false); //reload datatable ajax
}

function getData(){
  jQuery.noConflict();
  table = jQuery('#table').DataTable({
    dom: "lBfrtip",
    processing: true,
    responsive: true,
    serverSide: true,
    destroy: true,
    bFilter:true,
    searching: true,
    order: [],
    ajax: 'account/show',

    columns: [
        {data: 'nomor',name: 'nomor',orderable: false, searchable: false, render: function(data, type, row, meta) {  return meta.row + meta.settings._iDisplayStart + 1; }},
        {data: 'id', name: 'id', orderable: true, searchable: true},
        {data: 'name', name: 'name', orderable: false, searchable: false},
        {data: 'balance', name: 'balance', orderable: true, searchable: false},
        //{data: 'email', name: 'email', orderable: true, searchable: true},
        {data: 'action', name: 'action', orderable: true, searchable: true},
    ],
  });
}


</script>
@endsection
