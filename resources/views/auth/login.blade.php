<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Makaan - Real Estate HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('Backend/assets/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('Backend/assets/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Backend/assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('Backend/assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('Backend/assets/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        @include('navbar')
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Sign in</h1>
                    {{-- <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p> --}}
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="wow fadeInUp" data-wow-delay="0.5s">
                            {{-- <p class="mb-4">The contact form is currently inactive. Get a functional and working contact form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're done. <a href="https://htmlcodex.com/contact-form">Download Now</a>.</p> --}}
                            <form class="forms-sample" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="login" class="form-label">Email/Phone/Username</label>
                                    <input type="text" class="form-control" name="login" id="login"
                                        placeholder="Email">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        autocomplete="current-password" placeholder="Password">
                                </div>
                                <div class="form-check mb-3">
                                    <input type="checkbox" class="form-check-input" id="authCheck">
                                    <label class="form-check-label" for="authCheck">
                                        Remember me
                                    </label>
                                </div>
                                <div>

                                    <button type="submit" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                                        Sign In
                                    </button>
                                </div>
                                <a href="{{ route('register') }}" class="d-block mt-3 text-muted">Not a user? Sign
                                    up</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Footer Start -->
        @include('footer')
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('Backend/assets/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('Backend/assets/js/main.js') }}"></script>
</body>

</html>
