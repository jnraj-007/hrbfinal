<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">

        <div class="-reddit-square"><img style="width: 100px;" src="{{url('/image/admins/',auth()->user()->image)}}" alt="Halai SuperAdmin" ></div>
        <div class="title">
            <h1 class="h5">{{auth()->user()->name}}</h1>
            <p>{{auth()->user()->role}}</p>
        </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
        <li class=""><a href="{{route('home')}}"> <i class="icon-home"></i>Home </a></li>
        <li><a href="{{route('category.view')}}"> <i class="icon-grid"></i>categories </a></li>
        <li><a href="#exampledropdownDropdow" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Purchase </a>
            <ul id="exampledropdownDropdow" class="collapse list-unstyled ">
                <li><a href="{{route('purchase.request.list')}}">Purchase Request</a></li>
                <li><a href="#">Purchase History</a></li>
                <li><a href="#">Purchase Disapproved</a></li>
            </ul>
        </li>
        <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>posts </a>
            <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="{{route('post.view')}}">view post</a></li>
                <li><a href="{{route('post.form')}}">add post</a></li>
            </ul>
        </li>
        <li><a href="#exampledrop" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>user </a>
            <ul id="exampledrop" class="collapse list-unstyled ">
                <li><a href="{{route('view.user')}}">view user</a></li>
                <li><a href="{{route('user.form')}}">add user</a></li>
            </ul>
        </li>

        <li><a href="#example" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Admin </a>
            <ul id="example" class="collapse list-unstyled ">
                <li><a href="{{route('admin.list')}}">view Admin</a></li>
                <li><a href="#">Add Admin</a></li>
            </ul>
        </li>

        <li><a href="{{route('package.view')}}"> <i class="fa fa-bar-chart"></i>packages </a></li>
           <li><a href="#"> <i class="icon-user"></i> profile</a></li>
        <li><a href="{{route('admin.logout')}}"> <i class="icon-logout"></i>Login page </a></li>
    {{--</ul><span class="heading">Extras</span>
    <ul class="list-unstyled">
        <li> <a href="#"> <i class="icon-settings"></i>Demo </a></li>
        <li> <a href="#"> <i class="icon-writing-whiteboard"></i>Demo </a></li>
        <li> <a href="#"> <i class="icon-chart"></i>Demo </a></li>
    </ul>--}}
</nav>
