@extends('layouts.admin_master')
@section('shiparea')
    active show-sub
@endsection
@section('add_state')
    active
@endsection
@section('admin_content')
<div class="iq-top-navbar">
    <div class="iq-navbar-custom">
       <div class="iq-sidebar-logo">
          <div class="top-logo">
             <a href="index.html" class="logo">
             <img src="images/logo.png" class="img-fluid" alt="">
             <span>Sofbox</span>
             </a>
          </div>
       </div>
       <div class="navbar-breadcrumb">
          <h5 class="mb-0">SHIP STATE</h5>
          <nav aria-label="breadcrumb">
             <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('state') }}">Back</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ship State Edit</li>
             </ul>
          </nav>
       </div>
       @include('admin.topbar.menu')
    </div>
</div>
<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12 col-lg-8">
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title">Edit State</h4>
                   </div>
                </div>
                <div class="iq-card-body">
                   <form class="form-horizontal" action="{{ route('state.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $state->id }}">
                    <div class="form-group">
                        <label for="email">Division Name En:</label>
                        <select class="custom-select" name="division_id">
                            <option label="Choose One"></option>
                            @foreach ($divisions as $row)
                            <option value="{{ $row->id }}"{{ $row->id == $state->division_id ? 'selected': '' }}>{{ ucwords($row->division_name_en) }}</option>
                            @endforeach
                        </select>
                        @error('division_id')
                        <span class="invalid-feedback" role="alert"></span>
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                     </div>
                     <div class="form-group">
                        <label for="email">District Name En:</label>
                        <select class="custom-select" name="district_id">
                            <option label="Choose One"></option>
                            @foreach ($district as $item)
                            <option value="{{ $item->id }}" {{ $item->id == $state->district_id ? 'selected' : '' }}>{{ $item->district_name_en }}</option>
                            @endforeach
                        </select>
                        @error('district_id')
                        <span class="invalid-feedback" role="alert"></span>
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                     </div>
                      <div class="form-group">
                         <label for="email">State Name En:</label>
                            <input type="text" class="form-control" name="state_name_en" value="{{$state->state_name_en }}" >
                            @error('state_name_en')
                            <span class="invalid-feedback" role="alert"></span>
                            <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                      </div>
                      <div class="form-group">
                        <label for="email">State Name Bn:</label>
                           <input type="text" class="form-control" name="state_name_bn" value="{{$state->state_name_bn }}">
                           @error('state_name_bn')
                           <span class="invalid-feedback" role="alert"></span>
                           <strong class="text-danger">{{ $message }}</strong>
                           @enderror
                     </div>
                      <div class="form-group">
                            <button type="submit" class="btn btn-success" style="font-size: 18px">Update State</button>
                      </div>
                   </form>
                </div>
             </div>
             </div>
          </div>
       </div>
    </div>
 </div>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script src="{{ asset('public/admin') }}/js/alart.js"></script>

<script  type="text/Javascript">
    $(document).ready(function(){
    $('select[name="division_id"]').on('change',function(){
        var division_id = $(this).val();
        if(division_id){
            $.ajax({
                url: "{{ url('/admin/distrct/ajax') }}/"+division_id,
                type: "GET",
                dataType:"json",
                success:function(data){
                    var d= $('select[name="district_id"]').empty();
                    $.each(data,function(key,value){
                        $('select[name="district_id"]').append('<option value ="'+value.id +'">' +value.district_name_en + '</option>');
                    });
                },
            });
        }else{
            alert('Please Select your Category Name');
        }
    });
    });
</script>
@endsection
