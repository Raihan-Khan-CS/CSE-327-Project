<!doctype html>
<html lang="en">
<head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Twitter -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta name="twitter:site" content="@themepixels">
      <meta name="twitter:creator" content="@themepixels">
      <meta name="twitter:card" content="summary_large_image">
      <meta name="twitter:title" content="Starlight">
      <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
      <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">
      <!-- Facebook -->
      <meta property="og:url" content="http://themepixels.me/starlight">
      <meta property="og:title" content="Starlight">
      <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">
      <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
      <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
      <meta property="og:image:type" content="image/png">
      <meta property="og:image:width" content="1200">
      <meta property="og:image:height" content="600">

      <title>ADMIN DASHBOARD</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="{{ asset('public/admin') }}/images/favicon.ico" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="{{ asset('public/admin') }}/css/bootstrap.min.css">
      <!-- Typography CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css"/>
      <link rel="stylesheet" href="{{ asset('public/admin') }}/css/typography.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
      <!-- Style CSS -->
      <link rel="stylesheet" href="{{ asset('public/admin') }}/css/style.css">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="{{ asset('public/admin') }}/css/responsive.css">
      <style>
          .bootstrap-tagsinput .tag {
            margin-right: 2px;
            color: black;
            font-weight: bold;
            }
            .bootstrap-tagsinput {
            width: 100%;
            }
            .bootstrap-tagsinput input {
            padding: 5px 3px;
        }
      </style>
   </head>
   <body>
       @guest
        @else
      <!-- loader Start -->
      <div id="loading">
         <div id="loading-center">
            <div class="loader">
               <div class="cube">
                  <div class="sides">
                     <div class="top"></div>
                     <div class="right"></div>
                     <div class="bottom"></div>
                     <div class="left"></div>
                     <div class="front"></div>
                     <div class="back"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- loader END -->
      <!-- Wrapper Start -->

      @include('admin.inc.leftbar')

      <!-- TOP Nav Bar -->
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
         </div>
      </div>
      <!-- TOP Nav Bar END -->
      <!-- Responsive Breadcrumb End-->
         <!-- Page Content  -->
         <!-- Wrapper END -->
         @endguest
         @yield('admin_content')
         <!-- Footer -->
         <footer class="bg-white iq-footer">
             <div class="container-fluid">
                 <div class="row">
                     <div class="col-lg-6">
                         <ul class="list-inline mb-0">
                             <li class="list-inline-item"><a href="privacy-policy.html">Privacy Policy</a></li>
                             <li class="list-inline-item"><a href="terms-of-service.html">Terms of Use</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-6 text-right">
                            Copyright 2022 <a href="#">OSUD LAGBE</a> All Rights Reserved.
                        </div>
                    </div>
                </div>
            </footer>
      <!-- Footer END -->
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      {{-- <script src="{{ asset('public/admin') }}/js/jquery.min.js"></script> --}}
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="{{ asset('public/admin') }}/js/popper.min.js"></script>
      <script src="{{ asset('public/admin') }}/js/bootstrap.min.js"></script>
      <!-- Appear JavaScript -->
      <script src="{{ asset('public/admin') }}/js/jquery.appear.js"></script>
      <!-- Countdown JavaScript -->
      <script src="{{ asset('public/admin') }}/js/countdown.min.js"></script>
      <!-- Counterup JavaScript -->
      <script src="{{ asset('public/admin') }}/js/waypoints.min.js"></script>
      <script src="{{ asset('public/admin') }}/js/jquery.counterup.min.js"></script>
      <!-- Wow JavaScript -->
      <script src="{{ asset('public/admin') }}/js/wow.min.js"></script>
      <!-- Apexcharts JavaScript -->
      <script src="{{ asset('public/admin') }}/js/apexcharts.js"></script>
      <!-- Slick JavaScript -->
      <script src="{{ asset('public/admin') }}/js/slick.min.js"></script>
      <!-- Select2 JavaScript -->
      <script src="{{ asset('public/admin') }}/js/select2.min.js"></script>
      <!-- Owl Carousel JavaScript -->
      <script src="{{ asset('public/admin') }}/js/owl.carousel.min.js"></script>
      <!-- Magnific Popup JavaScript -->
      <script src="{{ asset('public/admin') }}/js/jquery.magnific-popup.min.js"></script>
      <!-- Smooth Scrollbar JavaScript -->
      <script src="{{ asset('public/admin') }}/js/smooth-scrollbar.js"></script>
      <!-- lottie JavaScript -->
      <script src="{{ asset('public/admin') }}/js/lottie.js"></script>
      <!-- Chart Custom JavaScript -->
      <script src="{{ asset('public/admin') }}/js/chart-custom.js"></script>
      <!-- Custom JavaScript -->
      <script src="{{ asset('public/admin') }}/js/custom.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
      <script src="{{ asset('public/admin') }}/js/alart.js"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    </body>
    </html>
   <script>
    @if(Session::has('message'))
        var type ="{{Session::get('alert-type','info')}}"
        switch(type){
            case 'info':
                toastr.info(" {{Session::get('message')}} ");
                break;

            case 'success':
                toastr.success(" {{Session::get('message')}} ");
                break;

            case 'warning':
                toastr.warning(" {{Session::get('message')}} ");
                break;

            case 'error':
                toastr.error(" {{Session::get('message')}} ");
                break;
        }
    @endif
  </script>

<script type="text/javascript">
    // Ajax Setup Start Here
    $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                }
            })
                // Ajax Setup End
  </script>
<script>
    // Course Search Button Start Ajax
    $('body').on('keyup','#userSearch',function(){
   var searchQuesr = $(this).val();

   $.ajax({
       method:"POST",
       dataType:'json',
       url :"{{ route('search.users') }}",
       data: {
           searchQuesr : searchQuesr,
       },
       success:function(res){
           var tableRow = "";
           $('#search_dynamic').html('');
           $.each(res, function(index, value){
           tableRow = `<tr>
                            <td>${value.id}</td>
                            <td><img src="{{ asset('${value.image}') }}" width="40" height="40" alt=""></td>
                            <td class="text-center">${value.name}</td>
                            <td class="text-center">${value.email}</td>
                            <td class="text-center">${value.phone}</td>
                            <td>
                                ${value.inban == 0 ? ` <span class="badge badge-primary" style=" font-size:14px;">Unbanned</span>`
                                :
                                `<span class="badge badge-danger" style=" font-size:14px;">Banned</span>`}
                            </td>
                            <td>
                            ${value.last_seen ? `-----`
                            :
                            `-------`}
                            </td>
                            <td>
                                ${value.inban == 0 ? `<a data-toggle="tooltip" data-placement="top" title="" data-original-title="Banned" href="{{ url('admin/user/banned/${value.id}') }}"><i class="fa fa-arrow-down"></i></a>`
                                :
                                `<a data-toggle="tooltip" data-placement="top" title="" data-original-title="Unbanned" href="{{ url('admin/user/unbanned/${value.id}') }}"><i class="fa fa-arrow-up"></i></a>`
                                }
                            </td>
                            </tr>`;
               $('#search_dynamic').append(tableRow);
           });
       }
   });
});
   // Course Search Button End Ajax
</script>
