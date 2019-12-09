<ul class="nav navbar-nav text-light" id="accordionSidebar">
    <li class="nav-item" role="presentation"><a class="nav-link {{$pages == 'dash' ? 'active' : ''}}" href="{{ route('admin') }}"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
    <li class="nav-item" role="presentation">
        <a class="btn btn-link nav-link @if($pages=='uadd' || $pages=='ureg' || $pages=='uedt') active @endif" data-toggle="collapse" aria-expanded="false" aria-controls="collapse-1" href="#user" role="button">
            <i class="fas fa-user-cog"></i><span>Users Management</span>
        </a>
        <div class="collapse @if($pages=='uadd' || $pages=='ureg' || $pages=='uedt') show @endif" id="user">
            <div class="bg-white border rounded py-2 collapse-inner">
                <a class="collapse-item @if($pages=='ureg') active @endif" href="{{ route('users.index') }}">User List</a>
                <a class="collapse-item @if($pages=='uadd') active @endif" href="{{ route('users.create') }}">Add New User</a>
            </div>
        </div>
    </li>
    <li class="nav-item" role="presentation">
        <a class="btn btn-link nav-link @if($pages=='bindex' || $pages=='bcreate') active @endif" data-toggle="collapse" aria-expanded="false" aria-controls="collapse-1" href="#bottle" role="button">
            <i class="fas fa-wine-bottle"></i><span>Bottles Management</span>
        </a>
        <div class="collapse @if($pages=='bindex' || $pages=='bcreate') show @endif" id="bottle">
            <div class="bg-white border rounded py-2 collapse-inner">
                <a class="collapse-item @if($pages=='bindex') active @endif" href="{{ route('bottles.index') }}">Bottles List</a>
                <a class="collapse-item @if($pages=='bcreate') active @endif" href="{{ route('bottles.create') }}">Add New Bottle</a>
            </div>
        </div>
    </li>
    <li class="nav-item" role="presentation">
        <a class="btn btn-link nav-link @if($pages=='tindex' || $pages=='tnew') active @endif" data-toggle="collapse" aria-expanded="false" aria-controls="collapse-1" href="#topup" role="button">
            <i class="fas fa-money-bill-alt"></i><span>Top Up</span>
        </a>
        <div class="collapse @if($pages=='tindex' || $pages=='tnew') show @endif" id="topup">
            <div class="bg-white border rounded py-2 collapse-inner">
                <a class="collapse-item @if($pages=='tindex') active @endif" href="{{ route('top-up.index') }}">Transaction History</a>
                <a class="collapse-item @if($pages=='tnew') active @endif" href="{{ route('top-up.create') }}">New Transaction</a>
            </div>
        </div>
    </li>
    <li class="nav-item" role="presentation">
        <a class="btn btn-link nav-link @if($pages=='advlist' || $pages=='advnew') active @endif" data-toggle="collapse" aria-expanded="false" aria-controls="collapse-1" href="#ads" role="button">
            <i class="fas fa-ad"></i><span>Ads Management</span>
        </a>
        <div class="collapse @if($pages=='advlist' || $pages=='advnew') show @endif" id="ads">
            <div class="bg-white border rounded py-2 collapse-inner">
                <a class="collapse-item @if($pages=='advlist') active @endif" href="{{ route('advertisement.index') }}">Advertisements List</a>
                <a class="collapse-item @if($pages=='advnew') active @endif" href="{{ route('advertisement.create') }}">New Advertisement</a>
            </div>
        </div>
    </li>
    <li class="nav-item" role="presentation"><a class="nav-link {{$pages == 'trans' ? 'active' : ''}}" href="#"><i class="fas fa-table"></i><span>Refill Management</span></a></li>
    <li class="nav-item" role="presentation"><a class="nav-link {{$pages == 'gallons' ? 'active' : ''}} " href="#"><i class="fas fa-water"></i><span>Water Level</span></a></li>

    <li class="nav-item" role="presentation">
        <a class="btn btn-link nav-link @if($pages=='ticket' || $pages=='newtic' || $pages=='edttic') active @endif" data-toggle="collapse" aria-expanded="false" aria-controls="collapse-1" href="#ticket" role="button">
            <i class="fas fa-ticket-alt"></i><span>Ticket</span>
        </a>
        <div class="collapse @if($pages=='ticket' || $pages=='newtic' || $pages=='edttic') show @endif" id="ticket">
            <div class="bg-white border rounded py-2 collapse-inner">
                <a class="collapse-item @if($pages=='ticket') active @endif" href="{{ route('tickets.index') }}">My Ticket</a>
                <a class="collapse-item @if($pages=='newtic') active @endif" href="{{ route('tickets.create') }}">Add New Ticket</a>
            </div>
        </div>
    </li>
</ul>