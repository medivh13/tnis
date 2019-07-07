@extends('layouts.layout')

@section('content')
<div class="col-lg-12 panels" style="margin-left: -5px;margin-bottom: 25px;">
  <div class="panel panel-default">
    <div class="panel-heading">
      <strong id="title">Deposit Cash</strong>
      <span class="float-right" style="margin-top: -6px;">
        <!-- <button type="button" class="btn btn-success btn-sm tambah" data-toggle="modal"><i class="fa fa-plus"></i> Add</button> -->
        <a href="{{URL('admin/deposit')}}" class="btn btn-secondary">
          <i class="fa fa-refresh"></i> New</a>
        
      </span>
    </div>
    <br>
    <form id="depositForm" method="POST" action="{{ URL('admin/deposit') }}" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="panel-body">
        <div class="col-lg-6">
          <div class="form-group">
            <label for="nik" class="control-label mb-1">Customer Account</label>
            <input id="account_id" type="text" class="form-control account_id" name="account_id" placeholder="Customer Account">
            <em id="nik-error" class="error invalid-feedback">Please input an Identity Number</em>
          </div>
          <div class="form-group cashAmount">
            <label for="amount" class="control-label mb-1">Amount</label>
            <input id="amount" type="text" class="form-control amount" name="amount" placeholder="500000">
            <em id="amount-error" class="error invalid-feedback">Please input an Amount</em>
          </div>
          <button type="submit" id="saving" class="btn btn-primary btn-sm float-right saving"><i class="fa fa-save"></i> Submit</button>
        </div>
        
      </div>
    </form>
  </div>
</div>
</div>
@endsection

@section('js')
<script>
  (function ( $ ){

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
    });
    $('.account_id').focus();
    $('.amount').keypress(validateNumber);

  $("#depositForm").validate({
    rules:{
        account_id:{
          required:true,
          minlength: 13,
          maxlength:13
        },
      amount:{
          required:true,
          number:true
        },
    },
    messages:{
      nik:{
        required:'Please Input Customer Name',
        minlength:'NIK must consist of at least 16 characters',
        maxlength:'NIK max characteers is 16'
      },
      amount:{
        required:'Please Input Amount',
        number:'Please Input proper amount'
      },
    },
    errorElement:'em',
    errorPlacement:function(error,element){
      error.addClass('invalid-feedback');
    },
    highlight:function(element,errorClass,validClass){
      $(element).addClass('is-invalid').removeClass('is-valid');
    },
    unhighlight:function(element,errorClass,validClass){
      $(element).addClass('is-valid').removeClass('is-invalid');
    },
    submitHandler: function(form) {
        form.submit();
    }
  });

})( jQuery );
</script>
@endsection