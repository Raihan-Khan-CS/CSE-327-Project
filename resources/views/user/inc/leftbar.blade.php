
    <img class="profile-pic img-fluid" src="{{asset (Auth::user()->image) }}" style="border-radius: 50%;" height="200;" width="200;" alt="profile-pic">
    <ul class="list-group list-group-flush mb-5">
        <a href="{{ url('/home') }}" class="btn btn-primary btn-sm btn-block">Home</a>
        <a href="{{ route('my_orders') }}" class="btn btn-danger btn-sm btn-block">My Orders</a>
        <a href="{{ route('return.order') }}" class="btn btn-danger btn-sm btn-block">Return Order</a>
        <a href="{{ route('cancel.order') }}" class="btn btn-danger btn-sm btn-block">Cancel Order</a>
        <a href="{{ url('user/update/image-page') }}" class="btn btn-primary btn-sm btn-block">Update Image</a>
        <a href="{{ url('user/change/password') }}" class="btn btn-primary btn-sm btn-block">Change Password</a>
        <a href="{{ route('logout') }}" class="btn btn-danger btn-sm btn-block" onclick  ="event.preventDefault();
        document.getElementById('logout-form').submit();">LOGOUT</a>
    </ul>
