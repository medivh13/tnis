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
            <label for="nik" class="control-label mb-1">Customer Identity Number</label>
            <input id="nik" type="text" class="form-control nik" name="nik" placeholder="Identity Number / NIK">
            <em id="nik-error" class="error invalid-feedback">Please input an Identity Number</em>
          </div>
          <div class="form-group">
            <label for="nik" class="control-label mb-1">Customer Email</label>
            <input id="email" type="text" class="form-control email" name="email" placeholder="email@email.com">
            <em id="email-error" class="error invalid-feedback">Please input an Email</em>
          </div>
          <div class="form-group">
            <label for="first_name" class="control-label mb-1">First Name</label>
            <input id="first_name" type="text" class="form-control first_name" name="first_name" placeholder="First Name">
            <em id="first_name-error" class="error invalid-feedback">Please input Customer First Name</em>
            <label for="last_name" class="control-label mb-1">Last Name</label>
            <input id="last_name" type="text" class="form-control last_name" name="last_name" placeholder="Last Name">
            <em id="last_name-error" class="error invalid-feedback">Please input Customer Last Name</em>
          </div>
          <div class="form-group">
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
    $('.nik').focus();
    $('.amount').keypress(validateNumber);

  $("#depositForm").validate({
    rules:{
      nik:{
          required:true,
          minlength: 16,
          maxlength:16
        },
      email:{
          required:true,
          email:true
        },
      first_name:{
          required:true,
          minlength:3
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
      email:{
        required:'Please Input Phone Number',
        email:'Please give a proper email'
      },
      first_name:{
        required:'Please Input Customer Name',
        minlength:'Name must consist of at least 3 characters'
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