@extends('layouts.admin_master')
@section('report')
    active show-sub
@endsection
@section('reports')
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
          <h5 class="mb-0">REPORTS</h5>
          <nav aria-label="breadcrumb">
             <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('reports') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Report Page</li>
             </ul>
          </nav>
       </div>
       @include('admin.topbar.menu')
    </div>
</div>
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-lg-4">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Date wise Search</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <form class="form-horizontal" action="{{ route('search_by_date') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="email">Date by Search:</label>
                                <input style="padding-top: 0px;" name="date" type="date" class="form-control">
                                    @error('date')
                                    <span class="invalid-feedback" role="alert"></span>
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success" style="font-size: 18px">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-4">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Month wise Search</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <form class="form-horizontal" action="{{ route('search_by_month') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="email">Search By Month:</label>
                                <select class="custom-select" class="form-control" data-placeholder="Select one"        name="month">
                                    <option label="Choose One"></option>
                                    <option value="january">january</option>
                                    <option value="february">february</option>
                                    <option value="march">march</option>
                                    <option value="april">april</option>
                                    <option value="may">may</option>
                                    <option value="june">june</option>
                                    <option value="july">july</option>
                                    <option value="august">august</option>
                                    <option value="september">september</option>
                                    <option value="october">october</option>
                                    <option value="november">november</option>
                                    <option value="december">december</option>
                                </select>
                                    @error('month')
                                    <span class="invalid-feedback" role="alert"></span>
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Search By Year:</label>
                                <select class="custom-select" class="form-control" data-placeholder="Select one"        name="year">
                                    <option label="Choose One"></option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                    <option value="2028">2028</option>
                                    <option value="2029">2029</option>
                                    <option value="2030">2030</option>
                                </select>
                                    @error('year')
                                    <span class="invalid-feedback" role="alert"></span>
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success" style="font-size: 18px">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-4">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Year wise Search</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <form class="form-horizontal" action="{{ route('search_by_year') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="email">Search By Year:</label>
                                <select class="custom-select" class="form-control" data-placeholder="Select one"        name="year_r">
                                    <option label="Choose One"></option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                    <option value="2028">2028</option>
                                    <option value="2029">2029</option>
                                    <option value="2030">2030</option>
                                </select>
                                    @error('year_r')
                                    <span class="invalid-feedback" role="alert"></span>
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success" style="font-size: 18px">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

