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

            @role('Manager IT')
                <li class="menu-header">Master Management</li>
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

                <li class="menu-header">User Management</li>
                {{-- jika user atau tarif atau kondisi maka beri statu aktif --}}
                <li class="nav-item">
                    <a href="{{ url('users') }}" class="nav-link"><i class="fas fa-user"></i>
                        <span>Data User</span>
                    </a>
                </li>

            @endrole

            @role('Developer')
                <li class="menu-header">Create Request</li>
                <li
                    class="nav-item dropdown">
                    <a href="" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa fa-id-card"
                            aria-hidden="true"></i>
                        <span>IT Infrastruktur</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ url('form-spec-upgrade') }}">Server Spec Upgrade</a></li>
                    </ul>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ url('form-soft-install') }}">Server Software Install</a></li>
                    </ul>
                </li>
                <li
                    class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa fa-id-card"
                            aria-hidden="true"></i>
                        <span>IT Network</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ url('form-address-ip') }}">IP Address Location</a></li>
                    </ul>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ url('form-firewall-access') }}">Firewall Access</a></li>
                    </ul>
                </li>
                <li
                    class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa fa-id-card"
                            aria-hidden="true"></i>
                        <span>IT Architecture</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ url('form-review-arch') }}">Review</a></li>
                    </ul>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ url('form-doc-arch') }}">Documentation</a></li>
                    </ul>
                </li>
                <li
                    class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa fa-id-card"
                            aria-hidden="true"></i>
                        <span>DevSecOps</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ url('form-sec-scan') }}">Security Scan</a></li>
                    </ul>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ url('form-prod-merge') }}">Production Merge</a></li>
                    </ul>
                </li>
                <li
                    class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa fa-id-card"
                            aria-hidden="true"></i>
                        <span>Database Administrator</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ url('form-query-exec') }}">Query Execution</a></li>
                    </ul>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ url('form-data-retrieval') }}">Data Retrieval</a></li>
                    </ul>
                </li>

                <li class="menu-header">Your Request</li>
                 <li class="nav-item">
                    <a href="{{ url('developer-request-complated') }}" class="nav-link"><i class="fas fa-table"></i>
                        <span>Requests Complated</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('developer-request-onprogress') }}" class="nav-link"><i class="fas fa-table"></i>
                        <span>Requests On Progress</span>
                    </a>
                </li>
            @endrole

            @role('IT Infrastructure')
                <li class="menu-header">IT Infrastructure</li>
                 <li class="nav-item">
                    <a href="" class="nav-link"><i class="fas fa-table"></i>
                        <span>Requests Available</span>
                    </a>
                </li>

                <li class="menu-header">Your Request</li>
                 <li class="nav-item">
                    <a href="" class="nav-link"><i class="fas fa-table"></i>
                        <span>Requests Complated</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link"><i class="fas fa-table"></i>
                        <span>Requests On Progress</span>
                    </a>
                </li>
            @endrole

            @role('IT Architecture')
                <li class="menu-header">IT Architecture</li>
                 <li class="nav-item">
                    <a href="" class="nav-link"><i class="fas fa-table"></i>
                        <span>Requests Available</span>
                    </a>
                </li>

                <li class="menu-header">Your Request</li>
                 <li class="nav-item">
                    <a href="" class="nav-link"><i class="fas fa-table"></i>
                        <span>Requests Complated</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link"><i class="fas fa-table"></i>
                        <span>Requests On Progress</span>
                    </a>
                </li>
            @endrole

            @role('IT Network')
                <li class="menu-header">IT Network</li>
                 <li class="nav-item">
                    <a href="" class="nav-link"><i class="fas fa-table"></i>
                        <span>Requests Available</span>
                    </a>
                </li>

                <li class="menu-header">Your Request</li>
                 <li class="nav-item">
                    <a href="" class="nav-link"><i class="fas fa-table"></i>
                        <span>Requests Complated</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link"><i class="fas fa-table"></i>
                        <span>Requests On Progress</span>
                    </a>
                </li>
            @endrole

            @role('DevSecOps')
                <li class="menu-header">DevSecOps</li>
                 <li class="nav-item">
                    <a href="" class="nav-link"><i class="fas fa-table"></i>
                        <span>Requests Available</span>
                    </a>
                </li>

                <li class="menu-header">Your Request</li>
                 <li class="nav-item">
                    <a href="" class="nav-link"><i class="fas fa-table"></i>
                        <span>Requests Complated</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link"><i class="fas fa-table"></i>
                        <span>Requests On Progress</span>
                    </a>
                </li>
            @endrole

            @role('Database Administrator')
                <li class="menu-header">Database Administrator</li>
                 <li class="nav-item">
                    <a href="" class="nav-link"><i class="fas fa-table"></i>
                        <span>Requests Available</span>
                    </a>
                </li>

                <li class="menu-header">Your Request</li>
                 <li class="nav-item">
                    <a href="" class="nav-link"><i class="fas fa-table"></i>
                        <span>Requests Complated</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link"><i class="fas fa-table"></i>
                        <span>Requests On Progress</span>
                    </a>
                </li>
            @endrole

    </aside>
</div>
