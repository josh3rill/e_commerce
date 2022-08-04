
  <header class="main-header ">
    <!-- Logo -->
    <a href="{{ route('home') }}" class="logo">
        <!-- mini logo-->
        <span class="logo-mini"><b>EFC</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><img src="{{ asset('images/'.$general_info->logo) }}" alt="" style=""></span>
    </a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" style="background-color: #CA8309">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ Auth::user()->image == null ? '/uploads/users/user-icon.png' : '/uploads/users/'.''.Auth::user()->image  }}" class="user-image" alt="User Image">
            </a>
            <ul class="dropdown-menu scale-up">
              <!-- User image -->
              <li class="user-header" style="background-color: #f8d053;">
                <img src="{{ Auth::user()->image == null ? '/uploads/users/user-icon.png' : '/uploads/users/'.''.Auth::user()->image  }}" class="img-responsive" alt="User Image">

                <p>
                  {{ Auth::user()->name }}
                  <small style="color: black">Member since {{ Auth::user()->created_at->format('M') }} . {{ Auth::user()->created_at->format('Y') }} </small>
                </p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ route('seller.profile') }}" class="btn btn-default btn-flat">Profile</a>
                </div>

                <div class="pull-right">
                  <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </div>
            </li>
          </ul>
        </li>



        <li class="dropdown messages-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-envelope"></i>
            <span class="label label-danger"> {{ $unread_message_count }}  </span>
          </a>
          <ul class="dropdown-menu scale-up">
            <li class="header">You have {{ $unread_message_count }} unread messages</li>
            <li>
              <!-- inner menu: contains the actual data -->
              <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 200px;"><ul class="menu inner-content-div" style="overflow: hidden; width: auto; height: 200px;">
                @foreach($unread_message as $unread_messages)

                <li><!-- start message -->
                  <a href="{{ route('seller.message.view',$unread_messages->slug) }}">
                    <div class="mail-contnet">
                      <span style="font-weight: bold;"> {{ Str::limit($unread_messages->description, 23)  }} <small class="text-danger"><i class="fa fa-clock-o text-danger"></i> {{ $unread_messages->created_at->diffForHumans() }} </small> </span>
                  </div>
                </a>
              </li>
              @endforeach

              <!-- end message -->

            </ul><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 112.676px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
          </li>
          <li class="footer"> <a href="{{route('seller.message.unread') }}" class="text-warning" style="font-weight: bold;"> See all unread message </a> </li>
        </ul>
      </li>


        {{-- <li class="dropdown messages-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-bell"></i>
            @if (Auth::user()->unreadNotifications->count() > 0)
                <span class="label label-primary"> {{ Auth::user()->unreadNotifications->count() }}  </span>
            @endif
          </a>
          <ul class="dropdown-menu scale-up">
            <li class="header">You have {{ Auth::user()->unreadNotifications->count() }} unread notification{{ Auth::user()->unreadNotifications->count() > 1 ? 's' : '' }}</li>
            <li>
              <!-- inner menu: contains the actual data -->
              <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 200px;"><ul class="menu inner-content-div" style="overflow: hidden; width: auto; height: 200px;">
                @foreach(Auth::user()->unreadNotifications as $unread_notifications)
                    <li><!-- start message -->
                        <a href="">

                            <div class="mail-contnet">
                            <span style="font-weight: bold;"> {{ Str::limit( $unread_notifications->data[0]['message'], 20) }} <small class="text-danger"><i class="fa fa-clock-o text-danger"></i> {{ $unread_notifications->created_at->diffForHumans() }} </small> </span>
                        </div>
                        </a>
                    </li>
                @endforeach

              <!-- end message -->

            </ul><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 112.676px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
          </li>
          <li class="footer"> <a href="{{route('admin.notification.all') }}" class="text-warning" style="font-weight: bold;"> See all  notification </a> </li>
        </ul> --}}
      </li>
</ul>






</ul>
</div>
</nav>
</header>
