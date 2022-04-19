@extends('layouts.frontend_master')

@section('frontend_content')
 <!-- Breadcrumb Area start -->
 <section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-content">
                    <h1 class="breadcrumb-hrading">My Review</h1>
                    <ul class="breadcrumb-links">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>My Review</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Area End -->
<!-- account area start -->

<section class="mb-3 mt-5" style="width: 90%; margin-left:5%">
    <div class="row d-flex">
        <div class="col-lg-2">
            @include('user.inc.leftbar')
        </div>
            <div class="col-lg-2">
                <div class="review-wrapper">
                    <div class="single-review">
                        <div class="review-img">
                            <img class="img-fluid" src="{{asset (Auth::user()->image) }}" style="border-radius: 50%" />
                        </div>
                        <div class="review-content">
                            <div class="review-top-wrap">
                                <div class="review-left">
                                    <div class="review-name">
                                        <h4>{{ Auth::user()->name }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="ratting-form-wrapper pl-50">
                    <h3>Add a Review</h3>
                    <div class="ratting-form">
                        <form action="{{ route('store.review') }}" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $id }}">
                            <div class="star-box">
                                <span>Your rating:</span>
                                <div class="rating-product">
                                    <div class="iq-card-body">
                                        <div class="table-responsive">
                                            <table id="user-list-table" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                                                <thead>
                                                    <tr>
                                                    <th class="text-center">1 Star</th>
                                                    <th class="text-center">2 Star</th>
                                                    <th class="text-center">3 Star</th>
                                                    <th class="text-center">4 Star</th>
                                                    <th class="text-center">5 Star</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center"><input type="radio" name="rating" value="1"></td>
                                                        <td class="text-center"><input type="radio" name="rating" value="2"></td>
                                                        <td class="text-center"><input type="radio" name="rating" value="3"></td>
                                                        <td class="text-center"><input type="radio" name="rating" value="4"></td>
                                                        <td class="text-center"><input type="radio" name="rating" value="5"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="rating-form-style form-submit">
                                        <textarea name="comment" placeholder="Comments"></textarea>

                                        <input type="submit" value="Submit" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- account area end -->
@endsection
