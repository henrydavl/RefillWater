<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
    <div class="container-fluid d-flex flex-column p-0">
        <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
            <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-water  "></i></div>
            <div class="sidebar-brand-text mx-3"><span>Refill Water</span></div>
        </a>
        <hr class="sidebar-divider my-0">
        <ul class="nav navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item" role="presentation"><a class="nav-link {{$pages == 'dash' ? 'active' : ''}}" href="#"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
            <li class="nav-item" role="presentation"><a class="nav-link {{$pages == 'user' ? 'active' : ''}}" href="#"><i class="fas fa-user-cog"></i><span>User Management</span></a></li>
            <li class="nav-item" role="presentation"><a class="nav-link {{$pages == 'trans' ? 'active' : ''}}" href="#"><i class="fas fa-table"></i><span>Transaction Management</span></a></li>
            <li class="nav-item" role="presentation"><a class="nav-link {{$pages == 'topUp' ? 'active' : ''}}" href="#"><i class="far fa-money-bill-alt"></i><span>Top-up</span></a></li>
            <li class="nav-item" role="presentation"><a class="nav-link {{$pages == 'tic' ? 'active' : ''}}" href="#"><i class="fas fa-tasks"></i><span>Ticket</span></a></li>
        </ul>
    </div>
</nav>