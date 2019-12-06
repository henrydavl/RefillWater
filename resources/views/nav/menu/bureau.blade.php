<ul class="nav navbar-nav text-light" id="accordionSidebar">
    <li class="nav-item" role="presentation"><a class="nav-link {{$pages == 'dash' ? 'active' : ''}}" href="{{ route('bureau') }}"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
    <li class="nav-item" role="presentation"><a class="nav-link {{$pages == 'reward' ? 'active' : ''}}" href="{{ route('rewards.index') }}"><i class="fas fa-certificate"></i><span>Rewards</span></a></li>
    <li class="nav-item" role="presentation"><a class="nav-link {{$pages == 'ticket' ? 'active' : ''}}" href="{{ route('my-tickets.index') }}"><i class="fas fa-ticket-alt"></i><span>Ticket</span></a></li>
</ul>