@extends('layouts.admin_master')

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
          <h5 class="mb-0">ADMIN DASHBOARD</h5>
          <nav aria-label="breadcrumb">
             <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Admin Dashboard</li>
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
          <div class="col-lg-12">
             <div class="iq-card">
                <div class="iq-card-body p-0">
                   <div class="iq-edit-list">
                      <ul class="iq-edit-profile d-flex nav nav-pills">
                         <li class="col-md-3 p-0">
                            <a class="nav-link active" data-toggle="pill" href="#personal-information">
                               Personal Information
                            </a>
                         </li>
                         <li class="col-md-3 p-0">
                            <a class="nav-link" data-toggle="pill" href="#chang-pwd">
                               Change Password
                            </a>
                         </li>
                         {{-- <li class="col-md-3 p-0">
                            <a class="nav-link" data-toggle="pill" href="#emailandsms">
                               Email and SMS
                            </a>
                         </li>
                          <li class="col-md-3 p-0">
                            <a class="nav-link" data-toggle="pill" href="#manage-contact">
                               Manage Contact
                            </a>
                         </li> --}}
                      </ul>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-lg-12">
             <div class="iq-edit-list-data">
                <div class="tab-content">
                   <div class="tab-pane fade active show" id="personal-information" role="tabpanel">
                       <div class="iq-card">
                         <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                               <h4 class="card-title">Personal Information</h4>
                            </div>
                         </div>
                         <div class="iq-card-body">
                            <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="old_img" value="{{ $admin->image }}">
                               <div class="form-group row align-items-center">
                                  <div class="col-md-12 mb-5">
                                     <div class="profile-img-edit">
                                        <img class="profile-pic img-fluid" src="{{ asset($admin->image) }}" alt="profile-pic">
                                        <div class="p-image">
                                          <i class="ri-pencil-line upload-button"></i>
                                          <input class="file-upload" name="image" type="file" accept="image/*"/>
                                       </div>
                                     </div>
                                  </div>
                               </div>
                               <div class=" row align-items-center">
                                  <div class="form-group col-sm-4">
                                     <label for="fname">Name:</label>
                                     <input type="text" class="form-control" name="name" value="{{ $admin->name }}">
                                  </div>
                                  <div class="form-group col-sm-4">
                                     <label for="lname">Email:</label>
                                     <input type="text" class="form-control" name="email" value="{{ $admin->email }}">
                                  </div>
                                  <div class="form-group col-sm-4">
                                     <label for="uname">Phone:</label>
                                     <input type="text" class="form-control"  name="phone" value="{{ $admin->phone }}">
                                  </div>
                                  <div class="form-group col-sm-12">
                                     <label>Address:</label>
                                     <textarea class="form-control" name="address" rows="5">{{ $admin->address }}</textarea>
                                  </div>
                               </div>
                               <button type="submit" class="btn btn-success mr-2" style="font-size: 18px">Save Profile</button>
                            </form>
                         </div>
                      </div>
                   </div>
                   <div class="tab-pane fade" id="chang-pwd" role="tabpanel">
                       <div class="iq-card">
                         <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                               <h4 class="card-title">Change Password</h4>
                            </div>
                         </div>
                         <div class="iq-card-body">
                            <form action="{{ route('admin.change.password') }}" method="POST">
                                @csrf
                               <div class="form-group">
                                  <label for="cpass">Current Password:</label>
                                  <a href="javascripe:void();" class="float-right">Forgot Password</a>
                                     <input type="Password" class="form-control" name="old_password" placeholder="Current Password" id="cpass" value="">
                                     @error('old_password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                  </div>
                               <div class="form-group">
                                  <label for="npass">New Password:</label>
                                  <input type="Password" class="form-control" name="new_password" placeholder="New Password" value="">
                                  @error('new_password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                               <div class="form-group">
                                  <label for="vpass">Confirm Password:</label>
                                     <input type="Password" class="form-control" name="confirmation_password" placeholder="Re-type Password">
                                     @error('confirmation_password')
                                     <span class="text-danger">{{ $message }}</span>
                                     @enderror
                               </div>
                               <button type="submit" class="btn btn-primary mr-2" style="font-size: 18px">Update Password</button>
                            </form>
                         </div>
                      </div>
                   </div>
                   {{-- <div class="tab-pane fade" id="emailandsms" role="tabpanel">
                       <div class="iq-card">
                         <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                               <h4 class="card-title">Email and SMS</h4>
                            </div>
                         </div>
                         <div class="iq-card-body">
                            <form>
                               <div class="form-group row align-items-center">
                                  <label class="col-md-3" for="emailnotification">Email Notification:</label>
                                  <div class="col-md-9 custom-control custom-switch">
                                     <input type="checkbox" class="custom-control-input" id="emailnotification" checked="">
                                     <label class="custom-control-label" for="emailnotification"></label>
                                  </div>
                               </div>
                               <div class="form-group row align-items-center">
                                  <label class="col-md-3" for="smsnotification">SMS Notification:</label>
                                  <div class="col-md-9 custom-control custom-switch">
                                     <input type="checkbox" class="custom-control-input" id="smsnotification" checked="">
                                     <label class="custom-control-label" for="smsnotification"></label>
                                  </div>
                               </div>
                               <div class="form-group row align-items-center">
                                  <label class="col-md-3" for="npass">When To Email</label>
                                  <div class="col-md-9">
                                     <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="email01">
                                        <label class="custom-control-label" for="email01">You have new notifications.</label>
                                     </div>
                                     <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="email02">
                                        <label class="custom-control-label" for="email02">You're sent a direct message</label>
                                     </div>
                                     <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="email03" checked="">
                                        <label class="custom-control-label" for="email03">Someone adds you as a connection</label>
                                     </div>
                                  </div>
                               </div>
                               <div class="form-group row align-items-center">
                                  <label class="col-md-3" for="npass">When To Escalate Emails</label>
                                  <div class="col-md-9">
                                     <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="email04">
                                        <label class="custom-control-label" for="email04"> Upon new order.</label>
                                     </div>
                                     <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="email05">
                                        <label class="custom-control-label" for="email05"> New membership approval</label>
                                     </div>
                                     <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="email06" checked="">
                                        <label class="custom-control-label" for="email06"> Member registration</label>
                                     </div>
                                  </div>
                               </div>
                               <button type="submit" class="btn btn-primary mr-2">Submit</button>
                               <button type="reset" class="btn iq-bg-danger">Cancle</button>
                            </form>
                         </div>
                      </div>
                   </div>
                   <div class="tab-pane fade" id="manage-contact" role="tabpanel">
                       <div class="iq-card">
                         <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                               <h4 class="card-title">Manage Contact</h4>
                            </div>
                         </div>
                         <div class="iq-card-body">
                            <form>
                               <div class="form-group">
                                  <label for="cno">Contact Number:</label>
                                  <input type="text" class="form-control" id="cno" value="001 2536 123 458">
                               </div>
                               <div class="form-group">
                                  <label for="email">Email:</label>
                                  <input type="text" class="form-control" id="email" value="nikjone@demo.com">
                               </div>
                               <div class="form-group">
                                  <label for="url">Url:</label>
                                  <input type="text" class="form-control" id="url" value="https://getbootstrap.com/">
                               </div>
                               <button type="submit" class="btn btn-primary mr-2">Submit</button>
                               <button type="reset" class="btn iq-bg-danger">Cancle</button>
                            </form>
                         </div>
                      </div>
                   </div> --}}
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>


@endsection
