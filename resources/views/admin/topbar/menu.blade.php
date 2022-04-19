<style>
    .nav-item span.dots {
    height: 8px;
    width: 8px;
    font-size: 0;
    text-align: center;
    padding: 0;
    position: absolute;
    top: 18px;
    right: 6px;
    animation: shadow-pulse-dots 1s infinite;
    border-radius: 50%;
    -webkit-border-radius: 50%;
}
</style>
<nav class="navbar navbar-expand-lg navbar-light p-0">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <i class="ri-menu-3-line"></i>
    </button>
    <div class="iq-menu-bt align-self-center">
       <div class="wrapper-menu">
          <div class="line-menu half start"></div>
          <div class="line-menu"></div>
          <div class="line-menu half end"></div>
       </div>
    </div>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
       <ul class="navbar-nav ml-auto navbar-list">
          <li class="nav-item">
             <a class="search-toggle iq-waves-effect" href="#"><i class="ri-search-line"></i></a>
             <form action="#" class="search-box">
                <input type="text" class="text search-input" placeholder="Type here to search..." />
             </form>
          </li>
          @php
              $user = App\Models\User::orderBy('id','DESC')->get();
              $count = count($user);
              $online_active = 0;
          @endphp
            @foreach ($user as $row)
            @php
                if ($row->userIsOnline()){
                    $online_active = $online_active +1;
                    }
            @endphp
            @endforeach
          <li class="nav-item">
             <a href="{{ url('all/users') }}" class="iq-waves-effect"><i class="ri-user-line">All Users ({{ $count }})</i></a>
          </li>
          <li class="nav-item">
             <a href="#" class="search-toggle iq-waves-effect">
                <i class="ri-user-line">Active Now ({{ $online_active }})</i>
                <span class="bg-success dots"></span>
             </a>
             <div class="iq-sub-dropdown">
                <div class="iq-card shadow-none m-0">
                   <div class="iq-card-body p-0 ">
                      <div class="bg-danger p-3">
                         <h5 class="mb-0 text-white">All Active Users<small class="badge  badge-light float-right pt-1">{{ $online_active }}</small></h5>
                      </div>
                      @foreach ($user as $row)
                      @if ($row->userIsOnline())
                        <a href="{{ url('active/users/'.$row->id) }}" class="iq-sub-card" >
                            <div class="media align-items-center">
                                <div class="">
                                <img class="avatar-40 rounded" src="{{ asset($row->image) }}" alt="">
                                </div>
                                <div class="media-body ml-3">
                                <h6 class="mb-0 ">{{ $row->name }}</h6>
                                <small class="float-right font-size-12 badge badge-success">Active</small>
                                </div>
                            </div>
                        </a>
                      @else
                      @endif
                      @endforeach
                   </div>
                </div>
             </div>
          </li>
          <li class="nav-item iq-full-screen"><a href="#" class="iq-waves-effect" id="btnFullscreen"><i class="ri-fullscreen-line"></i></a></li>
       </ul>
    </div>
    <ul class="navbar-list">
       <li>
          <a href="#" class="search-toggle iq-waves-effect bg-primary text-white">
              <img src="{{asset (Auth::user()->image) }}" class="img-fluid rounded" alt="user"></a>
          <div class="iq-sub-dropdown iq-user-dropdown">
             <div class="iq-card shadow-none m-0">
                <div class="iq-card-body p-0 ">
                   <div class="bg-primary p-3">
                      <h5 class="mb-0 text-white line-height">{{ Auth::user()->name }}</h5>
                      <span class="text-white font-size-12">Available</span>
                   </div>
                   <a href="{{ route('my-profile') }}" class="iq-sub-card iq-bg-primary-hover">
                      <div class="media align-items-center">
                         <div class="rounded iq-card-icon iq-bg-primary">
                            <i class="ri-file-user-line"></i>
                         </div>
                         <div class="media-body ml-3">
                            <h6 class="mb-0 ">My Profile</h6>
                            <p class="mb-0 font-size-12">View personal profile details.</p>
                         </div>
                      </div>
                   </a>
                   <a href="{{route('admin.edit.profile') }}" class="iq-sub-card iq-bg-primary-success-hover">
                      <div class="media align-items-center">
                         <div class="rounded iq-card-icon iq-bg-success">
                            <i class="ri-profile-line"></i>
                         </div>
                         <div class="media-body ml-3">
                            <h6 class="mb-0 ">Settings</h6>
                            <p class="mb-0 font-size-12">Modify your personal details.</p>
                         </div>
                      </div>
                   </a>
                   <div class="d-inline-block w-100 text-center p-3">
                       <form method="POST" action="{{ route('logout') }}">
                        @csrf
                      <a class="iq-bg-danger iq-sign-btn" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                             this.closest('form').submit();" role="button">Sign out<i class="ri-login-box-line ml-2"></i></a>
                             </form>
                   </div>
                </div>
             </div>
          </div>
       </li>
    </ul>
 </nav>
