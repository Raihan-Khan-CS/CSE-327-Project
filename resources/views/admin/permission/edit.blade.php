@extends('layouts.admin_master')

@section('permission')
    active show-sub
@endsection
@section('add_permission')
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
          <h5 class="mb-0">Create Permission</h5>
          <nav aria-label="breadcrumb">
             <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('brands') }}">Create Permission</a></li>
                <li class="breadcrumb-item active" aria-current="page">Permission</li>
             </ul>
          </nav>
       </div>
       @include('admin.topbar.menu')
    </div>
</div>
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Create Permissions</h4>
                    </div>
                    </div>
                    <div class="iq-card-body">
                        <form class="form-horizontal" action="{{ route('permission.update',$permission->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="brand">Permission :</label>
                                        <select class="custom-select" class="form-control" data-placeholder="Select one" name="role_id" id="role">
                                            <option label="Choose One"></option>
                                            @foreach ($role as $item)
                                            <option value="{{ $item->id }}" {{ $permission->role_id == $item->id ? 'selected':'' }}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                            @error('role_id')
                                            <span class="invalid-feedback" role="alert"></span>
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div id="content-page">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="iq-card">
                                                        <div class="iq-card-header d-flex justify-content-between">
                                                            <div class="iq-header-title">
                                                                <h4 class="card-title">Permission List</h4>
                                                            </div>
                                                        </div>
                                                        <div class="iq-card-body">
                                                            <div class="table-responsive">
                                                                <div class="row justify-content-between">
                                                                    <div class="col-sm-12 col-md-6">
                                                                        <div id="user_list_datatable_info" class="dataTables_filter">
                                                                        </div>
                                                                        </div>
                                                                </div>
                                                                <table id="user-list-table" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                                                                    <thead class="text-center">
                                                                        <tr>
                                                                            <th>Permission</th>
                                                                            <th>Add</th>
                                                                            <th>View</th>
                                                                            <th>Edit</th>
                                                                            <th>Delete</th>
                                                                            <th>List</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>Brand </td>
                                                                            <td>
                                                                                <input type="checkbox"  name="permission[brand][add]" @isset($permission ['permission']['brand']['add']) checked @endisset value="1">
                                                                            </td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[brand][view]"
                                                                                @isset($permission ['permission']['brand']['view']) checked
                                                                                @endisset>
                                                                            </td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[brand][edit]"  @isset($permission['permission']['brand']['edit']) checked
                                                                                @endisset>
                                                                            </td>

                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[brand][delete]" @isset($permission['permission']['brand']['delete']) checked
                                                                                @endisset>
                                                                            </td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[brand][manage]" @isset($permission['permission']['brand']['manage']) checked
                                                                                @endisset>
                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>Slider</td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[slider][add]" @isset($permission['permission']['slider']['add']) checked
                                                                                @endisset>
                                                                            </td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[slider][view]" @isset($permission['permission']['slider']['view']) checked
                                                                                @endisset>
                                                                            </td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[slider][edit]" @isset($permission['permission']['slider']['edit']) checked
                                                                                @endisset>
                                                                            </td>

                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[slider][delete]" @isset($permission['permission']['slider']['delete']) checked
                                                                                @endisset>
                                                                            </td>
                                                                            <td> <input type="checkbox" value="1" name="permission[slider][manage]" @isset($permission['permission']['slider']['manage']) checked  @endisset>
                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>Category</td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[cat][add]" @isset($permission['permission']['cat']['add']) checked  @endisset>
                                                                            </td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[cat][view]"  @isset($permission['permission']['cat']['edit']) checked  @endisset>
                                                                            </td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[cat][edit]" @isset($permission['permission']['cat']['edit']) checked  @endisset></td>

                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[cat][delete]" @isset($permission['permission']['cat']['delete']) checked  @endisset>
                                                                            </td>

                                                                            <td> <input type="checkbox" value="1" name="permission[cat][manage]" @isset($permission['permission']['cat']['manage']) checked  @endisset>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Sub-Category</td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[subcat][add]" @isset($permission['permission']['subcat']['add']) checked  @endisset>
                                                                            </td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[subcat][view]" @isset($permission['permission']['subcat']['view']) checked  @endisset>
                                                                            </td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[subcat][edit]" @isset($permission['permission']['subcat']['edit']) checked  @endisset>
                                                                            </td>

                                                                            <td> <input type="checkbox" value="1" name="permission[subcat][delete]" @isset($permission['permission']['subcat']['delete']) checked  @endisset>
                                                                            </td>

                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[subcat][manage]" @isset($permission['permission']['subcat']['manage']) checked  @endisset>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Sub-Sub-Category</td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[subsubcat][add]" @isset($permission['permission']['subsubcat']['add']) checked  @endisset>
                                                                            </td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[subsubcat][view]" @isset($permission['permission']['subsubcat']['view']) checked  @endisset>
                                                                            </td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[subsubcat][edit]" @isset($permission['permission']['subsubcat']['edit']) checked  @endisset>
                                                                            </td>

                                                                            <td> <input type="checkbox" value="1" name="permission[subsubcat][delete]" @isset($permission['permission']['subsubcat']['delete']) checked  @endisset>
                                                                            </td>
                                                                            <td> <input type="checkbox" value="1" name="permission[subsubcat][manage]" @isset($permission['permission']['subsubcat']['manage']) checked  @endisset>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Product</td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[product][add]" @isset($permission['permission']['product']['add']) checked  @endisset>
                                                                            </td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[product][view]" @isset($permission['permission']['product']['view']) checked  @endisset>
                                                                            </td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[product][edit]" @isset($permission['permission']['product']['edit']) checked  @endisset>
                                                                            </td>

                                                                            <td> <input type="checkbox" value="1" name="permission[product][delete]" @isset($permission['permission']['product']['delete']) checked  @endisset>
                                                                            </td>
                                                                            <td> <input type="checkbox" value="1" name="permission[product][manage]" @isset($permission['permission']['product']['manage']) checked  @endisset>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Coupon</td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[coupon][add]" @isset($permission['permission']['coupon']['add']) checked  @endisset>
                                                                            </td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[coupon][view]" @isset($permission['permission']['coupon']['view']) checked  @endisset>
                                                                            </td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[coupon][edit]" @isset($permission['permission']['coupon']['edit']) checked  @endisset></td>

                                                                            <td> <input type="checkbox" value="1" name="permission[coupon][delete]" @isset($permission['permission']['coupon']['delete']) checked  @endisset></td>
                                                                            <td> <input type="checkbox" value="1" name="permission[coupon][manage]" @isset($permission['permission']['coupon']['manage']) checked  @endisset></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Order</td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[order][add]" @isset($permission['permission']['order']['add']) checked  @endisset>
                                                                            </td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[order][view]"  @isset($permission['permission']['order']['view']) checked  @endisset>
                                                                            </td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[order][edit]"  @isset($permission['permission']['order']['edit']) checked  @endisset></td>

                                                                            <td> <input type="checkbox" value="1" name="permission[order][delete]"  @isset($permission['permission']['order']['delete']) checked  @endisset></td>
                                                                            <td> <input type="checkbox" value="1" name="permission[order][manage]"  @isset($permission['permission']['order']['manage']) checked  @endisset></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Report</td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[report][add]"  @isset($permission['permission']['report']['add']) checked  @endisset>
                                                                            </td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[report][view]" @isset($permission['permission']['report']['view']) checked  @endisset>
                                                                            </td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[report][edit]" @isset($permission['permission']['report']['edit']) checked  @endisset></td>

                                                                            <td> <input type="checkbox" value="1" name="permission[report][delete]" @isset($permission['permission']['report']['delete']) checked  @endisset></td>
                                                                            <td> <input type="checkbox" value="1" name="permission[report][manage]" @isset($permission['permission']['report']['manage']) checked  @endisset></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Review</td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[review][add]" @isset($permission['permission']['review']['add']) checked  @endisset>
                                                                            </td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[review][view]" @isset($permission['permission']['review']['view']) checked  @endisset>
                                                                            </td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[review][edit]" @isset($permission['permission']['review']['edit']) checked  @endisset></td>

                                                                            <td> <input type="checkbox" value="1" name="permission[review][delete]" @isset($permission['permission']['review']['delete']) checked  @endisset></td>
                                                                            <td> <input type="checkbox" value="1" name="permission[review][manage]" @isset($permission['permission']['review']['manage']) checked  @endisset></td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>Role Management</td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[role_mgt][add]" @isset($permission['permission']['role_mgt']['add']) checked  @endisset>
                                                                            </td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[role_mgt][view]" @isset($permission['permission']['role_mgt']['view']) checked  @endisset>
                                                                            </td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[role_mgt][edit]" @isset($permission['permission']['role_mgt']['edit']) checked  @endisset></td>

                                                                            <td> <input type="checkbox" value="1" name="permission[role_mgt][delete]" @isset($permission['permission']['role_mgt']['delete']) checked  @endisset></td>

                                                                            <td> <input type="checkbox" value="1" name="permission[role_mgt][manage]" @isset($permission['permission']['role_mgt']['manage']) checked  @endisset></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Permission Management</td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[per_mgt][add]" @isset($permission['permission']['per_mgt']['add']) checked  @endisset>
                                                                            </td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[per_mgt][view]"  @isset($permission['permission']['per_mgt']['view']) checked  @endisset>
                                                                            </td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[per_mgt][edit]"  @isset($permission['permission']['per_mgt']['edit']) checked  @endisset></td>

                                                                            <td> <input type="checkbox" value="1" name="permission[per_mgt][delete]"  @isset($permission['permission']['per_mgt']['delete']) checked  @endisset></td>

                                                                            <td> <input type="checkbox" value="1" name="permission[per_mgt][manage]"  @isset($permission['permission']['per_mgt']['manage']) checked  @endisset></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>SubAdmin Management</td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[sub_mgt][add]"  @isset($permission['permission']['sub_mgt']['add']) checked  @endisset>
                                                                            </td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[sub_mgt][view]" @isset($permission['permission']['sub_mgt']['view']) checked  @endisset>
                                                                            </td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[sub_mgt][edit]" @isset($permission['permission']['sub_mgt']['edit']) checked  @endisset></td>

                                                                            <td> <input type="checkbox" value="1" name="permission[sub_mgt][delete]" @isset($permission['permission']['sub_mgt']['delete']) checked  @endisset></td>

                                                                            <td> <input type="checkbox" value="1" name="permission[sub_mgt][manage]" @isset($permission['permission']['sub_mgt']['manage']) checked  @endisset></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
