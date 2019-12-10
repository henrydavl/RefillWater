<ul class="nav navbar-nav text-light" id="accordionSidebar">
    <li class="nav-item" role="presentation"><a class="nav-link {{$pages == 'dash' ? 'active' : ''}}" href="{{ route('root') }}"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
    <li class="nav-item" role="presentation">
        <a class="btn btn-link nav-link @if($pages=='uadm' || $pages=='usc' || $pages=='ubur' || $pages=='uadd' || $pages=='ureg' || $pages=='uedt') active @endif" data-toggle="collapse" aria-expanded="false" aria-controls="collapse-1" href="#user" role="button">
            <i class="fas fa-user-cog"></i><span>Users Management</span>
        </a>
        <div class="collapse @if($pages=='uadm' || $pages=='usc' || $pages=='ubur' || $pages=='uadd' || $pages=='ureg' || $pages=='uedt') show @endif" id="user">
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
        <a class="btn btn-link nav-link @if($pages=='bottle' || $pages=='bottlecreate' || $pages=='bottleedit') active @endif" data-toggle="collapse" aria-expanded="false" aria-controls="collapse-1" href="#bottle" role="button">
            <i class="fas fa-wine-bottle"></i><span>Bottles Management</span>
        </a>
        <div class="collapse @if($pages=='bottle' || $pages=='bottlecreate' || $pages=='bottleedit') show @endif" id="bottle">
            <div class="bg-white border rounded py-2 collapse-inner">
                <a class="collapse-item @if($pages=='bottle' || $pages=='bottleedit') active @endif" href="{{ route('bottle.index') }}">Bottles List</a>
                <a class="collapse-item @if($pages=='bottlecreate') active @endif" href="{{ route('bottle.create') }}">Add New Bottle</a>
            </div>
        </div>
    </li>

    <li class="nav-item" role="presentation"><a class="nav-link {{$pages == 'topUp' ? 'active' : ''}} " href="{{ route('topup.index') }}"><i class="fas fa-money-bill-alt"></i><span>Top Up</span></a></li>
    
    <li class="nav-item" role="presentation">
        <a class="btn btn-link nav-link @if($pages=='ads_images' || $pages=='adscreate') active @endif" data-toggle="collapse" aria-expanded="false" aria-controls="collapse-1" href="#ads" role="button">
            <i class="fas fa-ad"></i><span>Advertisements</span>
        </a>
        <div class="collapse @if($pages=='ads_images' || $pages=='adscreate') show @endif" id="ads">
            <div class="bg-white border rounded py-2 collapse-inner">
                <a class="collapse-item @if($pages=='ads_images') active @endif" href="{{ route('ad.index') }}">Advertisements List</a>
                <a class="collapse-item @if($pages=='adscreate') active @endif" href="{{ route('ad.create') }}">New Advertisement</a>
            </div>
        </div>
    </li>

    <li class="nav-item" role="presentation"><a class="nav-link {{$pages == 'trans' ? 'active' : ''}} " href="{{ route('transaction.index') }}"><i class="fas fa-receipt"></i><span>Transaction</span></a></li>
    <li class="nav-item" role="presentation"><a class="nav-link {{$pages == 'gallon' ? 'active' : ''}} " href="{{ route('galon.index') }}"><i class="fas fa-water"></i><span>Water Level</span></a></li>
    <li class="nav-item" role="presentation"><a class="nav-link {{$pages == 'ticket' ? 'active' : ''}} " href="{{ route('ticket.index') }}"><i class="fas fa-ticket-alt"></i><span>Tickets</span></a></li>

</ul>