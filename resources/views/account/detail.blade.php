@extends('layouts.layout')

@section('content')
<div class="col-lg-12 panels" style="margin-left: -5px;margin-bottom: 25px;">
  <div class="panel panel-default">
    <div class="panel-heading">
      <strong id="title">Customer Detail Trans</strong>
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
                  <th style="text-align:center;">Bank Officer</th>
                  <th style="text-align:center;">Amount</th>
                  <th style="text-align:center;">Type</th>
                  <th style="text-align:center;">Transaction's Date</th>
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
  table.ajax.reload(null,false);
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
    ajax: '{!! route('account.detail', ['id' => $id]) !!}',

    columns: [
        {data: 'nomor',name: 'nomor',orderable: false, searchable: false, render: function(data, type, row, meta) {  return meta.row + meta.settings._iDisplayStart + 1; }},
        {data: 'created_by', name: 'created_by', orderable: false, searchable: false},
        {data: 'amount', name: 'amount', orderable: true, searchable: false},
        {data: 'type', name: 'type', orderable: true, searchable: false},
        {data: 'created_at', name: 'created_at', orderable: true, searchable: true},
    ],
  });
}


</script>
@endsection
