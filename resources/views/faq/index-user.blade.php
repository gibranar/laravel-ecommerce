<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" name="viewport">
    <meta name="description" content="Stisla is a free Bootstrap admin template. Stisla will help you to speed up your project, design your own dashboard UI and the users will love it.">
    <meta name="keywords" content="stisla, stisla admin template, free admin template, free bootstrap admin, lite admin, admin template, bootstrap 4 template, bootstrap template, best admin template, html5 template, css3 template, free bootstrap admin template">
    <meta name="author" content="Muhamad Nauval Azhar">

    <meta name="kredibel-verification" value="TKWVQJ">
    <meta property="og:title" content="Free Bootstrap Admin Template &mdash; Stisla">
    <meta property="og:description" content="Stisla is a clean &amp; modern HTML5 admin template based on Bootstrap 4.">
    <meta property="og:image" content="https://getstisla.com/landing/stisla-share.png?v=1667264319">
    <meta property="og:url" content="https://getstisla.com">

    <meta name="twitter:title" content="Free Bootstrap Admin Template &mdash; Stisla">
    <meta name="twitter:description" content="Stisla is a clean &amp; modern HTML5 admin template based on Bootstrap 4.">
    <meta name="twitter:image" content="https://getstisla.com/landing/stisla-share.png">
    <meta name="twitter:card" content="summary_large_image">
    <title>Free Bootstrap Admin Template &mdash; Stisla</title>
    <link rel="shortcut icon" href="https://getstisla.com/landing/stisla.png">
    <link rel="stylesheet" href="https://getstisla.com/dist/modules/prism/prism.css">
    <link rel="stylesheet" href="https://getstisla.com/dist/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://getstisla.com/dist/modules/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="https://getstisla.com/dist/modules/chocolat/dist/css/chocolat.css">
    <link rel="stylesheet" href="https://getstisla.com/dist/css/style.css">
    <link rel="stylesheet" href="https://getstisla.com/dist/css/custom.css">
    <link rel="stylesheet" href="https://getstisla.com/landing/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="">

    <nav class="navbar navbar-reverse navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand smooth" href="https://getstisla.com">Stisla</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto ml-lg-3 align-items-lg-center">
                    <li class="nav-item dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle">Developers</a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-title">Getting Started</li>
                            <li><a href="https://getstisla.com/getting-started" class="dropdown-item">Getting Started</a></li>
                            <li><a href="https://getstisla.com/docs" class="dropdown-item">Documentation</a></li>
                            <li class="dropdown-title">Core</li>
                            <li><a href="http://demo.getstisla.com/index.html" class="dropdown-item">Dashboard</a></li>
                            <li><a href="http://demo.getstisla.com/layout-transparent.html" class="dropdown-item">Layouts</a></li>
                            <li><a href="http://demo.getstisla.com/bootstrap-alert.html" class="dropdown-item">Bootstrap</a></li>
                            <li><a href="http://demo.getstisla.com/components-article.html" class="dropdown-item">Components</a></li>
                            <li><a href="http://demo.getstisla.com/modules-calendar.html" class="dropdown-item">Third-party Libraries</a></li>
                            <li><a href="http://demo.getstisla.com/features-activities.html" class="dropdown-item">Pre-built Pages</a></li>
                            <li><a href="javascript:;" class="dropdown-item">Skeleton (Progress)</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a href="https://getstisla.com/blog" class="nav-link">Blog</a></li>
                    <li class="nav-item"><a href="https://getstisla.com/support" class="nav-link">Support</a></li>
                    <li class="nav-item"><a href="{{ route('landing') }}" class="nav-link">FAQ</a></li>
                    <li class="nav-item"><a href="https://getstisla.com/page/contact" class="nav-link">Contact</a></li>
                    <li class="nav-item d-lg-none d-md-block"><a href="https://getstisla.com/download" class="nav-link smooth" target="_blank">Download</a></li>
                </ul>
                <ul class="navbar-nav ml-auto align-items-lg-center d-none d-lg-block">
                    <li class="ml-lg-3 nav-item">
                        <a href="https://getstisla.com/download" class="btn btn-round smooth btn-icon icon-left" target="_blank">
                            <i class="fas fa-shopping-cart"></i> Download
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="hero-wrapper" id="top" style="height: 300px; margin-bottom: -230px;">
        <div class="hero">
            <div class="container">
            </div>
        </div>
    </div>
    <div class="callout container" style="margin-bottom: 50px;">
        <div class="landing-title pb-3 text-center">
            <h2>Frequently Asked Questions</h2>
        </div>
        <div>
            <div class="container bootdey">
                <div class="card">
                    <div class="card-body">
                        <div id="accordion">
                            <div class="accordion">
                                @foreach ($faqs as $faq)
                                <div class="accordion-header collapsed" role="button" data-toggle="collapse" data-target="#panel-body-{{ $faq->id }}" aria-expanded="false">
                                    <h4>{{ $loop->iteration }}. {{ $faq->question }}</h4>
                                </div>
                                <div class="accordion-body collapse" id="panel-body-{{$faq->id}}" data-parent="#accordion" style="">
                                    <p class="mb-0">{{ $faq->answer }}.</p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <h3 class="text-capitalize">Stisla</h3>
                    <div class="pr-lg-5">
                        <p>Stisla was created by <a href="https://twitter.com/mhdnauvalazhar">Muhamad Nauval Azhar</a> to help developers create their own UI designs for the dashboard. Stisla is free for anyone, support us by becoming a sponsor and keeping this project alive.</p>
                        <p>&copy; Stisla. With <i class="fas fa-heart text-danger"></i> from Indonesia</p>
                        <div class="mt-4 social-links">
                            <a href="https://github.com/stisla"><i class="fab fa-github"></i></a>
                            <a href="https://twitter.com/getstisla"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-md-4">
                            <h4>Core</h4>
                            <ul>
                                <li><a href="http://demo.getstisla.com/index.html">Dashboard</a></li>
                                <li><a href="http://demo.getstisla.com/layout-transparent.html">Layouts</a></li>
                                <li><a href="http://demo.getstisla.com/bootstrap-alert.html">Bootstrap</a></li>
                                <li><a href="http://demo.getstisla.com/components-article.html">Components</a></li>
                                <li><a href="http://demo.getstisla.com/modules-calendar.html">Third-party Libraries</a></li>
                                <li><a href="http://demo.getstisla.com/features-activities.html">Pre-built Pages</a></li>
                                <li><a href="javascript:;">Skeleton (Progress)</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <h4>Developers</h4>
                            <ul>
                                <li><a href="https://getstisla.com/getting-started">Get Started</a></li>
                                <li><a href="https://getstisla.com/download" target="_blank">Download</a></li>
                                <li><a href="https://getstisla.com/docs">Documentation</a></li>
                                <li><a href="https://getstisla.com/support">Support</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <h4>Company</h4>
                            <ul>
                                <li><a href="https://getstisla.com/blog">Blog</a></li>
                                <li><a href="https://getstisla.com/page/about">About</a></li>
                                <li><a href="https://getstisla.com/page/contact">Contact Us</a></li>
                                <li><a href="https://github.com/stisla/stisla/graphs/contributors">Team</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://getstisla.com/dist/modules/jquery.min.js"></script>
    <script src="https://getstisla.com/dist/modules/popper.js"></script>
    <script src="https://getstisla.com/dist/modules/tooltip.js"></script>
    <script src="https://getstisla.com/dist/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://getstisla.com/dist/modules/prism/prism.js"></script>
    <script src="https://getstisla.com/dist/js/stisla.js"></script>
    <script src="https://getstisla.com/landing/script.js"></script>


    <!--End mc_embed_signup-->

</body>

</html>