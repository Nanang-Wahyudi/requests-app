<!DOCTYPE html>
<html lang="en">

@include('layouts.header')

<body>
    <div id="app">
        <div class="main-wrapper">
            @php
                $notifications = \App\Models\Requests::where('is_read', false)->limit(5)->get();
            @endphp

            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                                    class="fas fa-search"></i></a></li>
                    </ul>

                </form>
                <ul class="navbar-nav navbar-right">

                    <li class="dropdown dropdown-list-toggle">
                    <a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep">
                        <i class="far fa-bell"></i>
                    </a>
                    <div class="dropdown-menu dropdown-list dropdown-menu-right">
                        <div class="dropdown-header">Notifications
                            <div class="float-right">
                                <form action="{{ route('notifications.markAllRead') }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-link">Mark All As Read</button>
                                </form>
                            </div>
                        </div>

                    <div class="dropdown-list-content dropdown-list-icons">
                                @forelse($notifications as $notif)
                                    <a href="#" class="dropdown-item dropdown-item-unread">
                                        <div class="dropdown-item-icon bg-primary text-white">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                        <div class="dropdown-item-desc">
                                            {{ $notif->title ?? 'New Request' }}
                                            <div class="time text-primary">{{ $notif->request_date }}</div>
                                        </div>
                                    </a>
                                @empty
                                    <div class="dropdown-item">No new notifications</div>
                                @endforelse
                            </div>

                        </div>
                    </li>


                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, {{ auth()->user()->name ?? '' }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-title">User Active</div>

                            <div class="dropdown-divider"></div>

                            @if (auth()->user()->roles()->pluck('name') !== 'Manager IT')
                            <a href="{{ url('change-password') }}" class="dropdown-item has-icon text-warning">
                                <i class="fas fa-key"></i> Ubah Password
                            </a>
                            <div class="dropdown-divider"></div>
                            @endif

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                            <a href="#" class="dropdown-item has-icon text-danger"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>

                        </div>
                    </li>
                </ul>
            </nav>

            @include('layouts.sidebar')

            <!-- Main Content -->
            @yield('content')

            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2025 <div class="bullet"></div> Design By Nanang Wahyudi</a>
                </div>
                <div class="footer-right">
                    2.3.0
                </div>
            </footer>
        </div>
    </div>

    @include('layouts.footer')
</body>

</html>
