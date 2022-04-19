@extends('layouts.admin_master')
@section('product')
    active show-sub
@endsection
@section('add_product')
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
          <h5 class="mb-0">PRODUCTS</h5>
          <nav aria-label="breadcrumb">
             <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('product.manage') }}">Back</a></li>
                <li class="breadcrumb-item active" aria-current="page">Product Create</li>
             </ul>
          </nav>
       </div>
       @include('admin.topbar.menu')
    </div>
</div>
 <!-- Page Content  -->
 <div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12 col-lg-12">
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title"> Create Product</h4>
                   </div>
                </div>
                <div class="iq-card-body">
                   <form class="" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                       <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">product Name English</label>
                                    <input type="text" class="form-control" name="product_name_en" value="{{ old('product_name_en') }}" placeholder="Product Name English">
                                    @error('product_name_en')
                                    <span class="invalid-feedback" role="alert"></span>
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">product Name Bangla</label>
                                    <input type="text" class="form-control" name="product_name_bn" value="{{ old('product_name_bn') }}" placeholder="Product Name English">
                                    @error('product_name_bn')
                                    <span class="invalid-feedback" role="alert"></span>
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Product Code</label>
                                    <input type="text" class="form-control" name="product_code" value="{{ old('product_code') }}" placeholder="Product Product Code">
                                    @error('product_code')
                                    <span class="invalid-feedback" role="alert"></span>
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="brand">Brand Name</label>
                                    <select class="custom-select" id="brand" class="form-control" name="brand_id" data-placeholder="Select one">
                                        <option label="Choose One"></option>
                                        @foreach ($brand as $item)
                                        <option value="{{ $item->id }}">{{ $item->brand_name_en }}</option>
                                        @endforeach
                                    </select>
                                        @error('brand_id')
                                        <span class="invalid-feedback" role="alert"></span>
                                        <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="brand">Category Name</label>
                                    <select class="custom-select" class="form-control" data-placeholder="Select one" name="category_id">
                                        <option label="Choose One"></option>
                                        @foreach ($category as $item)
                                        <option value="{{ $item->id }}">{{ $item->category_name_en }}</option>
                                        @endforeach
                                    </select>
                                        @error('category_id')
                                        <span class="invalid-feedback" role="alert"></span>
                                        <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="brand">SubCategory Name</label>
                                    <select class="custom-select" class="form-control" name="subcategory_id" data-placeholder="Select one">
                                        <option label="Choose One"></option>
                                    </select>
                                        @error('subcategory_id')
                                        <span class="invalid-feedback" role="alert"></span>
                                        <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="brand">SubSubCategory Name</label>
                                    <select class="custom-select" class="form-control" name="subsubcategory_id" data-placeholder="Select one">
                                        <option label="Choose One"></option>
                                    </select>
                                        @error('subsubcategory_id')
                                        <span class="invalid-feedback" role="alert"></span>
                                        <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Selling Price</label>
                                    <input type="text" class="form-control" name="selling_price" value="{{ old('selling_price') }}" placeholder="Product color bangla">
                                    @error('selling_price')
                                    <span class="invalid-feedback" role="alert"></span>
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Discount Price</label>
                                    <input type="text" class="form-control" name="discount_price" value="{{ old('discount_price') }}" placeholder="Product Code">
                                    @error('discount_price')
                                    <span class="invalid-feedback" role="alert"></span>
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Product tags Enlish</label><br>
                                    <input type="text" class="form-control" data-role="tagsinput" name="product_tags_en" value="{{ old('product_tags_en') }}" placeholder="Product english">
                                    @error('product_tags_en')
                                    <span class="invalid-feedback" role="alert"></span>
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Product tags bangla</label><br>
                                    <input type="text" class="form-control" data-role="tagsinput" name="product_tags_bn" value="{{ old('product_tags_bn') }}" placeholder="Product tags Bangla">
                                    @error('product_tags_bn')
                                    <span class="invalid-feedback" role="alert"></span>
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Product size English</label><br>
                                    <input type="text" class="form-control" name="product_size_en" data-role="tagsinput" value="{{ old('product_size_en') }}" placeholder="Product tags Enlish">
                                    @error('product_size_en')
                                    <span class="invalid-feedback" role="alert"></span>
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Product size bangla</label><br>
                                    <input type="text" class="form-control" data-role="tagsinput" name="product_size_bn" value="{{ old('product_size_bn') }}" placeholder="Product tags bangla">
                                    @error('product_size_bn')
                                    <span class="invalid-feedback" role="alert"></span>
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Product color English</label><br>
                                    <input type="text" class="form-control" name="product_color_en" data-role="tagsinput" value="{{ old('product_color_en') }}" placeholder="Product color English">
                                    @error('product_color_en')
                                    <span class="invalid-feedback" role="alert"></span>
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Product color bangla</label><br>
                                    <input type="text" class="form-control text-danger" style="color: red;" data-role="tagsinput" name="product_color_bn" value="{{ old('product_color_bn') }}" placeholder="Product color bangla">
                                    @error('product_color_bn')
                                    <span class="invalid-feedback" role="alert"></span>
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Short Description English</label>
                                    <textarea class="form-control form-control-lg" name="short_descp_en" placeholder="Short Descripion Enlish"></textarea>
                                    @error('short_descp_en')
                                    <span class="invalid-feedback" role="alert"></span>
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Short Description bangla</label>
                                    <textarea class="form-control form-control-lg" name="short_descp_bn" placeholder="Short Desciption Bangla"></textarea>
                                    @error('short_descp_bn')
                                    <span class="invalid-feedback" role="alert"></span>
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Long Description English</label>
                                    <textarea class="form-control form-control-lg" name="long_descp_en" placeholder="long Description English"></textarea>
                                    @error('short_descp_en')
                                    <span class="invalid-feedback" role="alert"></span>
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Long Description bangla</label>
                                    <textarea class="form-control form-control-lg" name="long_descp_bn" placeholder="Long Description Bangla"></textarea>
                                    @error('long_descp_bn')
                                    <span class="invalid-feedback" role="alert"></span>
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Product Quantity</label>
                                    <input type="text" class="form-control" name="product_qty" value="{{ old('product_qty') }}" placeholder="Product Qty">
                                    @error('product_qty')
                                    <span class="invalid-feedback" role="alert"></span>
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Main Thumbnail</label>
                                    <input type="file" class="form-control" name="product_thambnail" onchange="mainThambUrl(this)">
                                    @error('product_thambnail')
                                    <span class="invalid-feedback" role="alert"></span>
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <img src="" id="mainthamb">
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Secound Image</label>
                                    <input type="file" class="form-control" name="secound_image" onchange="secoundImg(this)">
                                    @error('secound_image')
                                    <span class="invalid-feedback" role="alert"></span>
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <img src="" id="secoundimage">
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Multiple Img</label>
                                    <input type="file" class="form-control" name="multi_img[]" id="multiImg" multiple>
                                    @error('multi_img')
                                    <span class="invalid-feedback" role="alert"></span>
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                    <div class="row" id="preview_img"></div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="custom-control custom-checkbox custom-checkbox-color-check custom-control-inline">
                                    <input type="checkbox" name="best_seller" value="1" class="custom-control-input bg-success" id="check-1">
                                    <label class="custom-control-label" for="check-1">Best Seller</label>
                                 </div>
                            </div>
                            <div class="col-lg-12">

                                <div class="custom-control custom-checkbox custom-checkbox-color-check custom-control-inline">
                                    <input type="checkbox" name="featured" value="1" class="custom-control-input bg-success" id="check-2">
                                    <label class="custom-control-label" for="check-2">Featured</label>
                                 </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="custom-control custom-checkbox custom-checkbox-color-check custom-control-inline">
                                    <input type="checkbox" name="hot_deals" value="1" class="custom-control-input bg-success" id="check-3">
                                    <label class="custom-control-label" for="check-3">Hot deals</label>
                                 </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="custom-control custom-checkbox custom-checkbox-color-check custom-control-inline">
                                    <input type="checkbox" name="new_arrivals" value="1" class="custom-control-input bg-success" id="check-4">
                                    <label class="custom-control-label" for="check-4">New arrivals</label>
                                 </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-success btn-lg mt-2" style="font-size: 18px">Product Update</button>
                            </div>
                        </div>
                    </form>
                    <div class="form-group">
                        <a href="{{ route('product.manage') }}" class="btn btn-outline-primary"><i class="fa fa-chevron-left"></i> Back</a>
                    </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script  type="text/Javascript">
    $(document).ready(function(){
        //Start Category Name select with Ajax
    $('select[name="category_id"]').on('change',function(){
        var category_id = $(this).val();
        if(category_id){
            $.ajax({
                url: "{{ url('/admin/subcategory/ajax') }}/"+category_id,
                type: "GET",
                dataType:"json",
                success:function(data){
                    $('select[name="subsubcategory_id"]').html('');
                    // SubsubCategory k auto reload deyer jonno beboar kora hoyse
                    var d= $('select[name="subcategory_id"]').empty();
                    //
                    $.each(data,function(key,value){
                        $('select[name="subcategory_id"]').append('<option value ="'+value.id +'">' +value.subcategory_name_en + '</option>');
                    });
                },
            });
        }else{
            alert('Please Select your Category Name');
        }
    });
    //End Category id with Ajax
    // SubCategory With Ajax
    $('select[name="subcategory_id"]').on('change',function(){
        var subcategory_id = $(this).val();
        if(subcategory_id){
            $.ajax({
                url: "{{ url('/admin/subsubcategory/ajax') }}/"+subcategory_id,
                type: "GET",
                dataType:"json",
                success:function(data){
                    var d= $('select[name="subsubcategory_id"]').empty();
                    $.each(data,function(key,value){
                        $('select[name="subsubcategory_id"]').append('<option value ="'+value.id +'">' +value.subsubcategory_name_en + '</option>');
                    });
                },
            });
        }else{
            alert('Please Select your SubCategory Name');
        }
    });
    });
</script>
<script>
    $(document).ready(function(){
      $('#multiImg').on('change', function(){
        if(window.File && window.FileReader && window.FileList && window.Blob)
        {
          var data =$(this)[0].files;
          $.each(data, function(index, file){
            if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){
              var fRead = new FileReader();
              fRead.onload = (function(file){
                return function(e){
                  var img = $('<img/>').addClass('thumb').attr('src', e.target.result).width(80).height(80);
                  $('#preview_img').append(img);
                };
              })(file);
              fRead.readAsDataURL(file);
            }
          });
        }else{
          alert("You Browser dosen't support file API");
        }
      });
    });
  </script>
  <!-- Single Image Show With Ajax -->
  <script>
    function mainThambUrl(input){
      if(input.files && input.files[0]){
        var reader = new FileReader();
        reader.onload = function(e){
          $('#mainthamb').attr('src',e.target.result).width(80).height(80);
        };
        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>
  <script>
    function secoundImg(input){
      if(input.files && input.files[0]){
        var reader = new FileReader();
        reader.onload = function(e){
          $('#secoundimage').attr('src',e.target.result).width(80).height(80);
        };
        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>
