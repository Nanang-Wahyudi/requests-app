<!DOCTYPE html>
<html lang="en">

@include('layouts.header')

<body>
    <div id="app">
        <section class="section">
            <div class="d-flex flex-wrap align-items-stretch">
                <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
                    <div class="p-4 m-3">
                        <img src="../assets/img/logo.jpg" alt="logo" width="180" class=" mb-5 mt-2">
                        <h4 class="text-dark font-weight-normal">Welcome to <span class="font-weight-bold">REQUEST APP</span>
                        </h4>
                        <p class="text-muted">Before you get started, you must login.</p>
                        @if ($errors->any())
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Login Gagal!',
                                        text: 'Username atau password anda salah!',
                                        confirmButtonColor: '#d33'
                                    });
                                });
                            </script>
                        @endif

                        <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
                            @csrf
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="text" class="form-control" name="email" required
                                    autofocus>
                                <div class="invalid-feedback">Please enter your email</div>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="form-control" name="password" required>
                                <div class="invalid-feedback">Please enter your password</div>
                            </div>

                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>


                        <div class="text-center mt-5 text-small">
                            Copyright &copy; Nanang. Made with 💙 by Stisla
                            <div class="mt-2">
                                <a href="#">Privacy Policy</a>
                                <div class="bullet"></div>
                                <a href="#">Terms of Service</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom"
                    data-background="/assets/img/unsplash/login-bg.jpg">
                    <div class="absolute-bottom-left index-2">
                        <div class="text-light p-5 pb-2">
                            <div class="mb-5 pb-3">
                                <h2 class="mb-2 font-weight-bold">PT. Concord Consulting Indonesia</h2>
                                <h5 class="font-weight-normal text-muted-transparent">Jakarta</h5>
                            </div>
                            Photo by <a class="text-light bb" target="_blank"
                                href="https://unsplash.com/photos/a8lTjWJJgLA">Justin Kauffman</a> on <a
                                class="text-light bb" target="_blank" href="https://unsplash.com">Unsplash</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @include('layouts.footer')
</body>

</html>
