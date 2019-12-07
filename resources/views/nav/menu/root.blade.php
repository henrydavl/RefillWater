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

    <li class="nav-item" role="presentation">
        <a class="btn btn-link nav-link @if($pages=='topUp' || $pages=='TopUpCreate') active @endif" data-toggle="collapse" aria-expanded="false" aria-controls="collapse-1" href="#topup" role="button">
            <i class="fas fa-money-bill-alt"></i><span>Top Up</span>
        </a>
        <div class="collapse @if($pages=='topUp' || $pages=='TopUpCreate') show @endif" id="topup">
            <div class="bg-white border rounded py-2 collapse-inner">
                <a class="collapse-item @if($pages=='uadm') active @endif" href="{{ route('topup.index') }}">Top Up List</a>
                <a class="collapse-item @if($pages=='usc') active @endif" href="{{ route('topup.create') }}">Add New Top Up</a>
            </div>
        </div>
    </li>
    
    <li class="nav-item" role="presentation">
        <a class="btn btn-link nav-link @if($pages=='ads_images' || $pages=='adscreate') active @endif" data-toggle="collapse" aria-expanded="false" aria-controls="collapse-1" href="#ads" role="button">
            <i class="fas fa-ad"></i><span>Ads Management</span>
        </a>
        <div class="collapse @if($pages=='ads_images' || $pages=='adscreate') show @endif" id="ads">
            <div class="bg-white border rounded py-2 collapse-inner">
                <a class="collapse-item @if($pages=='ads_images') active @endif" href="{{ route('ad.index') }}">Advertisements List</a>
                <a class="collapse-item @if($pages=='adscreate') active @endif" href="{{ route('ad.create') }}">New Advertisement</a>
            </div>
        </div>
    </li>

    <li class="nav-item" role="presentation"><a class="nav-link ($pages == 'trans' ? 'active' : '') " href="#transaction"><i class="fas fa-table"></i><span>Transaction Management</span></a></li>
    
    <li class="nav-item" role="presentation">
        <a class="btn btn-link nav-link @if($pages=='gallons' || $pages=='gallonscreate' || $pages=='gallonsedit') active @endif" data-toggle="collapse" aria-expanded="false" aria-controls="collapse-1" href="#gallons" role="button">
            <i class="fas fa-wine-bottle"></i><span>Gallons Management</span>
        </a>
        <div class="collapse @if($pages=='gallons' || $pages=='gallonscreate' || $pages=='gallonsedit') show @endif" id="gallons">
            <div class="bg-white border rounded py-2 collapse-inner">
                <a class="collapse-item @if($pages=='gallons') active @endif" href="{{ route('galon.index') }}">Gallons List</a>
                <a class="collapse-item @if($pages=='gallonscreate') active @endif" href="{{ route('galon.create') }}">Add New Gallons</a>
            </div>
        </div>
    </li>

    <li class="nav-item" role="presentation">
        <a class="btn btn-link nav-link @if($pages=='Ticket' || $pages=='TicketCreate') active @endif" data-toggle="collapse" aria-expanded="false" aria-controls="collapse-1" href="#ticket" role="button">
            <i class="fas fa-ticket-alt"></i><span>Ticket</span>
        </a>
        <div class="collapse @if($pages=='Ticket' || $pages=='TicketCreate') show @endif" id="ticket">
            <div class="bg-white border rounded py-2 collapse-inner">
                <a class="collapse-item @if($pages=='uadm') active @endif" href="{{ route('ticket.index') }}">Ticket List</a>
                <a class="collapse-item @if($pages=='usc') active @endif" href="{{ route('ticket.create') }}">Add New Ticket</a>
            </div>
        </div>
    </li>

</ul>