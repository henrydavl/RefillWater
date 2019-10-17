<nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
    <div class="container-fluid">
        <ul class="nav navbar-nav flex-nowrap ml-auto">
            <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">
                        <span class="badge badge-danger badge-counter">{{$empty}}</span><i class="fas fa-bell fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in"
                         role="menu">
                        <h6 class="dropdown-header">alerts center</h6>
                        @if(count($empty_gallons) > 0)
                            @foreach($empty_gallons as $gallon)
                            <a class="d-flex align-items-center dropdown-item" href="#">
                                <div class="mr-3">
                                    <div class="bg-danger icon-circle"><i class="fas fa-exclamation-triangle text-white"></i></div>
                                </div>
                                <div><span class="small text-gray-500">{{\Carbon\Carbon::parse($gallon->updated_at)->diffForHumans()}}</span>
                                    <p>{{$gallon->description . ' is empty!'}}</p>
                                </div>
                            </a>
                            @endforeach
                        @else
                            <a class="d-flex align-items-center dropdown-item" href="#">
                                    <p>Nothing to show</p>
                            </a>
                        @endif
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">
                        <i class="fas fa-envelope fa-fw"></i><span class="badge badge-danger badge-counter">{{$tic}}</span></a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in"
                         role="menu">
                        <h6 class="dropdown-header">pending tickets</h6>
                        @if(count($tickets) > 0)
                            @foreach($tickets as $ticket)
                            <a class="d-flex align-items-center dropdown-item" href="#">
                                <div class="font-weight-bold">
                                    <div class="text-truncate"><span>{{$ticket->title}}</span></div>
                                    <p class="small text-gray-500 mb-0">{{$ticket->description}}</p>
                                </div>
                            </a>
                            @endforeach
                        @else
                            <a class="d-flex align-items-center dropdown-item" href="#">
                                <p>Nothing to show</p>
                            </a>
                        @endif
                    </div>
                </div>
                <div class="shadow dropdown-list dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown"></div>
            </li>
            <div class="d-none d-sm-block topbar-divider"></div>
            <li class="nav-item dropdown no-arrow" role="presentation">
                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small">{{ Auth::user()->name }}</span>
                        <img class="border rounded-circle img-profile" src="{{asset('assets/img/avatars/avatar5.jpeg')}}"></a>
                    <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu">
                        <a class="dropdown-item" role="presentation" href="#"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a>
                        <a class="dropdown-item" role="presentation" href="#"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Settings</a>
                        <a class="dropdown-item" role="presentation" href="#"><i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Activity log</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" role="presentation" href="#" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>