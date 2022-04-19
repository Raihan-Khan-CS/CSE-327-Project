<div class="wrapper">
    <!-- Sidebar  -->
      <div class="iq-sidebar">
          <div class="iq-sidebar-logo d-flex justify-content-between">
             <a href="{{ url('admin/home') }}">
             {{-- <img src="{{ asset('public/admin/') }}/images/logo.png" class="img-fluid" alt=""> --}}
             <span>OSUD LAGBE</span><br>
            </a>
            <div class="iq-menu-bt align-self-center">
                <div class="wrapper-menu">
                    <div class="line-menu half start"></div>
                    <div class="line-menu"></div>
                    <div class="line-menu half end"></div>
                </div>
            </div>
        </div>
          <div id="sidebar-scrollbar">
             <nav class="iq-sidebar-menu">
                <ul id="iq-sidebar-toggle" class="iq-menu">
                   <li class="iq-menu-title"><i class="ri-separator"></i><span>Main</span></li>
                   <a href="{{ url('/') }}" target="_blank"><li class="iq-menu-title"><i class="ri-separator"></i><span>Visit site</span></li></a>

                @isset(auth()->user()->role->permission['permission']['brand']['add'])
                   <li class="@yield('brands')">
                      <a href="#dashboard" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><i class="ri-home-4-line"></i><span>Brand</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                      <ul id="dashboard" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                         <li class="@yield('brand')"><a href="{{ route('brands') }}">Brands</a></li>
                      </ul>
                   </li>
                @endisset

                @isset(auth()->user()->role->permission['permission']['slider']['add'])

                   <li class="@yield('sliders')">
                        <a href="#slider" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><i class="ri-home-4-line"></i><span>Slider</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="slider" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li class="@yield('slider')"><a href="{{ route('sliders') }}">Slider</a></li>
                        </ul>
                    </li>
                 @endisset
                 @isset(auth()->user()->role->permission['permission']['cat']['manage'])
                    <li class="@yield('category')">
                        <a href="#category" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><i class="ri-home-4-line"></i><span>Categories</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="category" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">

                    @isset(auth()->user()->role->permission['permission']['cat']['add'])
                        <li class="@yield('add_category')"><a href="{{ route('category') }}">Add Category</a></li>
                    @endisset
                    @isset(auth()->user()->role->permission['permission']['subcat']['add'])
                        <li class="@yield('subcategory')"><a href="{{ route('subcategory') }}">Subcategory</a></li>
                    @endisset
                    @isset(auth()->user()->role->permission['permission']['subsubcat']['add'])
                        <li class="@yield('subsubcategory')"><a href="{{ route('subsubcategory') }}">Sub->Subcategory</a></li>
                    @endisset
                        </ul>
                    </li>
                @endisset
                @isset(auth()->user()->role->permission['permission']['product']['manage'])
                    <li class="@yield('product')">
                        <a href="#product" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><i class="ri-home-4-line"></i><span>Products</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="product" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        @isset(auth()->user()->role->permission['permission']['product']['add'])
                            <li class="@yield('add_product')"><a href="{{ route('add.product') }}">Add Product</a></li>
                        @endisset
                        @isset(auth()->user()->role->permission['permission']['product']['manage'])
                        <li class="@yield('manage_product')"><a href="{{ route('product.manage') }}">Manage Product</a></li>
                        @endisset
                        </ul>
                    </li>
                 @endisset
                 @isset(auth()->user()->role->permission['permission']['coupon']['add'])
                    <li class="@yield('coupons')">
                        <a href="#coupon" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><i class="ri-home-4-line"></i><span>Coupon</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="coupon" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li class="@yield('coupon')"><a href="{{ route('coupon') }}">Coupon</a></li>

                        </ul>
                    </li>
                @endisset
                @isset(auth()->user()->role->permission['permission']['shiparea']['add'])
                    <li class="@yield('shiparea')">
                        <a href="#shiparea" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><i class="ri-home-4-line"></i><span>ShipArea</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="shiparea" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li class="@yield('add_division')"><a href="{{ route('division') }}">Add Division</a></li>
                        <li class="@yield('add_district')"><a href="{{ route('district') }}">Add District</a></li>
                        <li class="@yield('add_state')"><a href="{{ route('state') }}">Add State</a></li>

                        </ul>
                    </li>
                @endisset
                @isset(auth()->user()->role->permission['permission']['order']['add'])
                    <li class="@yield('orders')">
                        <a href="#orders" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><i class="ri-home-4-line"></i><span>Orders</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="orders" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li class="@yield('pending_orders')"><a href="{{ route('pending.orders') }}">pending orders</a></li>
                        <li class="@yield('confirmed_orders')"><a href="{{ route('confirmed.orders') }}">confirmed orders</a></li>
                        <li class="@yield('processing_orders')"><a href="{{ route('processing.orders') }}">pocessing orders</a></li>
                        <li class="@yield('picked_orders')"><a href="{{ route('picked.orders') }}">picked orders</a></li>
                        <li class="@yield('shipped_orders')"><a href="{{ route('shipped.orders') }}">shipped orders</a></li>
                        <li class="@yield('delivered_orders')"><a href="{{ route('delivered.orders') }}">delivered orders</a></li>
                        <li class="@yield('cancel_orders')"><a href="{{ route('cancel.orders') }}">cancel orders</a></li>

                        </ul>
                    </li>
                @endisset
                @isset(auth()->user()->role->permission['permission']['report']['add'])
                 <li class="@yield('report')">
                    <a href="#report" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><i class="ri-home-4-line"></i><span>Report</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>

                    <ul id="report" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                       <li class="@yield('reports')"><a href="{{ route('reports') }}">Reports</a></li>
                    </ul>
                 </li>
                 @endisset
                 <li class="@yield('abouts')">
                    <a href="#pages" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><i class="ri-home-4-line"></i><span>Pages</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul id="pages" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                       <li class="@yield('about')"><a href="{{ route('about') }}">about page</a></li>
                       <li class="@yield('manage')"><a href="{{ route('about.manage') }}">About Manage</a></li>
                    </ul>
                 </li>

                 @isset(auth()->user()->role->permission['permission']['review']['add'])
                 <li class="@yield('review')">
                    <a href="#review" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><i class="ri-home-4-line"></i><span>Review</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul id="review" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                       <li class="@yield('reviews')"><a href="{{ route('product.review') }}">Review</a></li>
                    </ul>
                 </li>
                 @endisset

                 <li class="@yield('stock')">
                    <a href="#stock" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><i class="ri-home-4-line"></i><span>Stock Manegemanet</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul id="stock" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                       <li class="@yield('stocks')"><a href="{{ route('product.stock') }}">Stock Management</a></li>
                    </ul>
                 </li>
                 @isset(auth()->user()->role->permission['permission']['role_mgt']['add'])
                    <li class="@yield('role_management')">
                        <a href="#role_management" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><i class="ri-home-4-line"></i><span>Role Management</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="role_management" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li class="@yield('create_role')"><a href="{{ route('role.create') }}">Create Role</a></li>
                        <li class="@yield('all_role')"><a href="{{ route('role.index') }}">All Role</a></li>
                        </ul>
                    </li>
                 @endisset

                 @isset(auth()->user()->role->permission['permission']['per_mgt']['add'])
                    <li class="@yield('permission')">
                        <a href="#permission" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><i class="ri-home-4-line"></i><span>Permission Management</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="permission" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li class="@yield('add_permission')"><a href="{{ route('permission.create') }}">Add Permission</a></li>
                        <li class="@yield('all_permission')"><a href="{{ route('permission.index') }}">All Permission</a></li>
                        </ul>
                    </li>
                 @endisset
                 @isset(auth()->user()->role->permission['permission']['sub_mgt']['add'])
                    <li class="@yield('subadmin')">
                        <a href="#subadmin" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><i class="ri-home-4-line"></i><span>SubAdmin Management</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="subadmin" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li class="@yield('add_subadmin')"><a href="{{ route('subadmin.create') }}">Add Subadmin</a></li>
                        <li class="@yield('all_subadmin')"><a href="{{ route('subadmin.index') }}">All Subadmin</a></li>
                        </ul>
                    </li>
                 @endisset










                   <li>
                      <a href="#mailbox" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><i class="ri-mail-line"></i><span>Email</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                      <ul id="mailbox" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                         <li><a href="app/index.html">Inbox</a></li>
                         <li><a href="app/email-compose.html">Email Compose</a></li>
                      </ul>
                   </li>
                   <li>
                      <a href="#user-info" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><i class="ri-user-line"></i><span>User</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                      <ul id="user-info" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                         <li><a href="profile.html">User Profile</a></li>
                         <li><a href="profile-edit.html">User Edit</a></li>
                         <li><a href="add-user.html">User Add</a></li>
                         <li><a href="user-list.html">User List</a></li>
                      </ul>
                   </li>
                   <li>
                      <a href="#ecommerce" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><i class="ri-shopping-cart-line"></i><span>eCommerce</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                      <ul id="ecommerce" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                         <li><a href="product.html">Product</a></li>
                         <li><a href="itemdetails.html">Item Details</a></li>
                         <li><a href="checkout.html">Checkout</a></li>
                      </ul>
                   </li>
                      </ul>
                   </li>
                </ul>
             </nav>
             <div class="p-3"></div>
          </div>
       </div>
  </div>
