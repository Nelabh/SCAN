<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                   <!--  <img alt="image" src="{{URL::asset('img/bpcl.png')}}"/> -->
                </span>
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Welcome {{Auth::user()->name}}</strong>
                    </span> <span class="text-muted text-xs block"></span> </span> </a>
                    
                </div>
                <div class="logo-element">
                    SCAN                
                </div>
                </li>  

            </ul>

             @if(Request::path() == 'studentprofile')

        <li class="active">
            <a href="{{URL::route('studentprofile')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Profile</span></a>
        </li>
        @else

        <li >
            <a href="{{URL::route('studentprofile')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Profile</span></a>
        </li>
        @endif  

        </div>
    </nav>

