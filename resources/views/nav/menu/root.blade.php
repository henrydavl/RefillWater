<ul class="nav navbar-nav text-light" id="accordionSidebar">
    <li class="nav-item" role="presentation"><a class="nav-link {{$pages == 'dash' ? 'active' : ''}}" href="{{ route('root') }}"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
    <li class="nav-item" role="presentation">
        <a class="btn btn-link nav-link @if($pages=='uadm' || $pages=='usc' || $pages=='ubur' || $pages=='uadd' || $pages=='ureg') active @endif" data-toggle="collapse" aria-expanded="false" aria-controls="collapse-1" href="#user" role="button">
            <i class="fas fa-user-cog"></i><span>Users Management</span>
        </a>
        <div class="collapse @if($pages=='uadm' || $pages=='usc' || $pages=='ubur' || $pages=='uadd' || $pages=='ureg') show @endif" id="user">
            <div class="bg-white border rounded py-2 collapse-inner">
                <a class="collapse-item @if($pages=='uadm') active @endif" href="{{ route('user.root') }}">Administrator Root</a>
                <a class="collapse-item @if($pages=='usc') active @endif" href="{{ route('user.admin') }}">Student Organization</a>
                <a class="collapse-item @if($pages=='ubur') active @endif" href="{{ route('user.bureau') }}">Bureau</a>
                <a class="collapse-item @if($pages=='ureg') active @endif" href="{{ route('user.index') }}">Regular User</a>
                <a class="collapse-item @if($pages=='uadd') active @endif" href="{{ route('user.create') }}">Add New User</a>
            </div>
        </div>
    </li>

    <li class="nav-item" role="presentation">
        <a class="btn btn-link nav-link @if($pages=='bottle' || $pages=='bottlecreate') active @endif" data-toggle="collapse" aria-expanded="false" aria-controls="collapse-1" href="#bottle" role="button">
            <i class="fas fa-user-cog"></i><span>Bottles Management</span>
        </a>
        <div class="collapse @if($pages=='bottle' || $pages=='bottlecreate') show @endif" id="bottle">
            <div class="bg-white border rounded py-2 collapse-inner">
                <a class="collapse-item @if($pages=='uadm') active @endif" href="{{ route('bottle.index') }}">Bottles List</a>
                <a class="collapse-item @if($pages=='usc') active @endif" href="{{ route('bottle.create') }}">Add New Bottle</a>
            </div>
        </div>
    </li>

    <li class="nav-item" role="presentation"><a class="nav-link {{$pages == 'trans' ? 'active' : ''}}" href="#"><i class="fas fa-table"></i><span>Transaction Management</span></a></li>
    <li class="nav-item" role="presentation"><a class="nav-link {{$pages == 'topUp' ? 'active' : ''}}" href="#"><i class="far fa-money-bill-alt"></i><span>Top-up</span></a></li>
    <li class="nav-item" role="presentation"><a class="nav-link {{$pages == 'tic' ? 'active' : ''}}" href="#"><i class="fas fa-tasks"></i><span>Ticket</span></a></li>
</ul>