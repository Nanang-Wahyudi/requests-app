<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/home">REQUEST APP</a>
        </div>

        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ Request::is('home') ? 'active' : '' }}"><a class="nav-link" href=""><i
                        class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>

                <li class="menu-header">Starter Options</li>
                {{-- jika user atau tarif atau kondisi maka beri statu aktif --}}
                <li
                    class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                        <span>Data Master</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ url('roles') }}">Role</a></li>
                        <li><a class="nav-link" href="{{ url('requesttypes') }}">Request Type</a></li>

                    </ul>
                </li>

            <li class="menu-header">Request Management</li>
            <li
                class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa fa-id-card"
                        aria-hidden="true"></i>
                    <span>IT Infrastruktur</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ url('infrastructure-complated') }}">Request Complated</a></li>
                </ul>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="">Request On Progress</a></li>
                </ul>
                 <ul class="dropdown-menu">
                    <li><a class="nav-link" href="">Request Available</a></li>
                </ul>
            </li>
             <li
                class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa fa-id-card"
                        aria-hidden="true"></i>
                    <span>IT Network</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="">Request Complated</a></li>
                </ul>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="">Request On Progress</a></li>
                </ul>
                 <ul class="dropdown-menu">
                    <li><a class="nav-link" href="">Request Available</a></li>
                </ul>
            </li>
              <li
                class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa fa-id-card"
                        aria-hidden="true"></i>
                    <span>IT Architecture</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="">Request Complated</a></li>
                </ul>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="">Request On Progress</a></li>
                </ul>
                 <ul class="dropdown-menu">
                    <li><a class="nav-link" href="">Request Available</a></li>
                </ul>
            </li>
             <li
                class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa fa-id-card"
                        aria-hidden="true"></i>
                    <span>DevSecOps</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="">Request Complated</a></li>
                </ul>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="">Request On Progress</a></li>
                </ul>
                 <ul class="dropdown-menu">
                    <li><a class="nav-link" href="">Request Available</a></li>
                </ul>
            </li>
            <li
                class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa fa-id-card"
                        aria-hidden="true"></i>
                    <span>Database Administrator</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="">Request Complated</a></li>
                </ul>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="">Request On Progress</a></li>
                </ul>
                 <ul class="dropdown-menu">
                    <li><a class="nav-link" href="">Request Available</a></li>
                </ul>
            </li>
             <li
                class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa fa-id-card"
                        aria-hidden="true"></i>
                    <span>IT Infrastruktur</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="">Request Complated</a></li>
                </ul>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="">Request On Progress</a></li>
                </ul>
                 <ul class="dropdown-menu">
                    <li><a class="nav-link" href="">Request Available</a></li>
                </ul>
            </li>

                <li class="menu-header">User Management</li>
                {{-- jika user atau tarif atau kondisi maka beri statu aktif --}}
                <li class="nav-item">
                    <a href="{{ url('users') }}" class="nav-link"><i class="fas fa-user"></i>
                        <span>Data User</span>
                    </a>
                    <a href="#" class="nav-link"><i class="fas fa-user"></i>
                        <span>Invite User</span>
                    </a>
                </li>

    </aside>
</div>
