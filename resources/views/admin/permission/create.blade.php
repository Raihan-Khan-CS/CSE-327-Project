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
                        <form class="form-horizontal" action="{{ route('permission.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="brand">Permission :</label>
                                        <select class="custom-select" class="form-control" data-placeholder="Select one" name="role_id">
                                            <option label="Choose One"></option>
                                            @foreach ($role as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                            @error('role_id')
                                            <span class="invalid-feedback" role="alert"></span>
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Sumbit</button>
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
                                                                <h4 class="card-title">All Products</h4>
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
                                                                    <thead>
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
                                                                            <td>Brand</td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[brand][add]">
                                                                            </td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[brand][view]">
                                                                            </td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[brand][edit]"></td>

                                                                            <td> <input type="checkbox" value="1" name="permission[brand][delete]"></td>
                                                                            <td> <input type="checkbox" value="1" name="permission[brand][manage]"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Slider</td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[slider][add]">
                                                                            </td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[slider][view]">
                                                                            </td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[slider][edit]"></td>

                                                                            <td> <input type="checkbox" value="1" name="permission[slider][delete]"></td>
                                                                            <td> <input type="checkbox" value="1" name="permission[slider][manage]"></td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>Category</td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[cat][add]">
                                                                            </td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[cat][view]">
                                                                            </td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[cat][edit]"></td>

                                                                            <td> <input type="checkbox" value="1" name="permission[cat][delete]"></td>
                                                                            <td> <input type="checkbox" value="1" name="permission[cat][manage]"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Sub-Category</td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[subcat][add]">
                                                                            </td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[subcat][view]">
                                                                            </td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[subcat][edit]"></td>

                                                                            <td> <input type="checkbox" value="1" name="permission[subcat][delete]"></td>
                                                                            <td> <input type="checkbox" value="1" name="permission[subcat][manage]"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Sub-Sub-Category</td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[subsubcat][add]">
                                                                            </td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[subsubcat][view]">
                                                                            </td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[subsubcat][edit]"></td>

                                                                            <td> <input type="checkbox" value="1" name="permission[subsubcat][delete]"></td>
                                                                            <td> <input type="checkbox" value="1" name="permission[subsubcat][manage]"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Product</td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[product][add]">
                                                                            </td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[product][view]">
                                                                            </td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[product][edit]"></td>

                                                                            <td> <input type="checkbox" value="1" name="permission[product][delete]"></td>
                                                                            <td> <input type="checkbox" value="1" name="permission[product][manage]"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Coupon</td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[coupon][add]">
                                                                            </td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[coupon][view]">
                                                                            </td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[coupon][edit]"></td>

                                                                            <td> <input type="checkbox" value="1" name="permission[coupon][delete]"></td>
                                                                            <td> <input type="checkbox" value="1" name="permission[coupon][manage]"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Order</td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[order][add]">
                                                                            </td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[order][view]">
                                                                            </td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[order][edit]"></td>

                                                                            <td> <input type="checkbox" value="1" name="permission[order][delete]"></td>
                                                                            <td> <input type="checkbox" value="1" name="permission[order][manage]"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Report</td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[report][add]">
                                                                            </td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[report][view]">
                                                                            </td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[report][edit]"></td>

                                                                            <td> <input type="checkbox" value="1" name="permission[report][delete]"></td>
                                                                            <td> <input type="checkbox" value="1" name="permission[report][manage]"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Review</td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[review][add]">
                                                                            </td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[review][view]">
                                                                            </td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[review][edit]"></td>

                                                                            <td> <input type="checkbox" value="1" name="permission[review][delete]"></td>

                                                                            <td> <input type="checkbox" value="1" name="permission[review][manage]"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Role Management</td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[role_mgt][add]">
                                                                            </td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[role_mgt][view]">
                                                                            </td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[role_mgt][edit]"></td>

                                                                            <td> <input type="checkbox" value="1" name="permission[role_mgt][delete]"></td>

                                                                            <td> <input type="checkbox" value="1" name="permission[role_mgt][manage]"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Permission Management</td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[per_mgt][add]">
                                                                            </td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[per_mgt][view]">
                                                                            </td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[per_mgt][edit]"></td>

                                                                            <td> <input type="checkbox" value="1" name="permission[per_mgt][delete]"></td>

                                                                            <td> <input type="checkbox" value="1" name="permission[per_mgt][manage]"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>SubAdmin Management</td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[sub_mgt][add]">
                                                                            </td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[sub_mgt][view]">
                                                                            </td>
                                                                            <td>
                                                                                <input type="checkbox" value="1" name="permission[sub_mgt][edit]"></td>

                                                                            <td> <input type="checkbox" value="1" name="permission[sub_mgt][delete]"></td>

                                                                            <td> <input type="checkbox" value="1" name="permission[sub_mgt][manage]"></td>
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
