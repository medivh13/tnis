@extends('layouts.layout')

@section('content')
<div class="col-lg-12 panels" style="margin-left: -5px;margin-bottom: 25px;">
  <div class="panel panel-default">
    <div class="panel-heading">
      <strong id="title">{{$title}}</strong>
    </div>
    <br>
    <div class="panel-body">
      <div class="row">
        <div class="container">
            <div class="col-md-3 classic">
            </div>
            <div class="col-md-6 classic">
              <table class="table table-bordered table-hover" id="table">
                <thead>
                  <tr >
                    <td colspan=4><input type="text" id="text1" placeholder="0" style="text-align:right; width:100%;font-weight:bold; font-family:arial;"/></td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><button type="button" class="btn btn-danger clear" style="width:100%;font-weight:bold;">AC</button></td>
                    <td><button type="button" class="btn btn-success element" style="width:100%;font-weight:bold;" value="/">/</button></td>
                    <td><button type="button" class="btn btn-success element" style="width:100%;font-weight:bold;" value="*">*</button></td>
                    <td><button type="button" class="btn btn-success element" style="width:100%;font-weight:bold;" value="-">-</button></td>
                  </tr>
                  <tr>
                    <td><button type="button" class="btn btn-info element" style="width:100%;font-weight:bold;" value="7">7</button></td>
                    <td><button type="button" class="btn btn-info element" style="width:100%;font-weight:bold;" value="8">8</button></td>
                    <td><button type="button" class="btn btn-info element" style="width:100%;font-weight:bold;" value="9">9</button></td>
                    <td rowspan=2><button type="button" class="btn btn-success element" style="width:100%;height: 100px;font-weight:bold;" value="+">+</td>
                    </tr>
                    <tr>
                      <td><button type="button" class="btn btn-info element" style="width:100%;font-weight:bold;" value="4">4</button></td>
                      <td><button type="button" class="btn btn-info element" style="width:100%;font-weight:bold;" value="5">5</button></td>
                      <td><button type="button" class="btn btn-info element" style="width:100%;font-weight:bold;" value="6">6</button></td>
                    </tr>
                    <tr>
                      <td><button type="button" class="btn btn-info element" style="width:100%;font-weight:bold;" value="1">1</button></td>
                      <td><button type="button" class="btn btn-info element" style="width:100%;font-weight:bold;" value="2">2</button></td>
                      <td><button type="button" class="btn btn-info element" style="width:100%;font-weight:bold;" value="3">3</button></td>
                      <td rowspan=2><button type="button" class="btn btn-success equal" style="width:100%; height:100px;font-weight:bold;" >=</button></td>
                    </tr>
                    <tr>
                      <td colspan=2><button type="button" class="btn btn-info element" style="width:100%;font-weight:bold;" value="0">0</button></td>
                      <td><button type="button" class="btn btn-info element" style="width:100%;font-weight:bold;" value=".">.</button></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="col-md-3 classic">
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
  @endsection
  @section('js')
  <script>
  (function ( $ ){
    $(document).off('click', '.clear').on('click', '.clear', function(e){
      clear();
    });
    $(document).off('click', '.element').on('click', '.element', function(e){
      event1(this.value);
    });
    $(document).off('click', '.equal').on('click', '.equal', function(e){
      event2();
    });
  })( jQuery );
  function event1(x){
    document.getElementById("text1").value+=x;
  }
  function event2(){
    var x = document.getElementById("text1").value;
    document.getElementById("text1").value = eval(x);
  }
  function clear(){
    document.getElementById("text1").value ='';
  }
  </script>
  @endsection
