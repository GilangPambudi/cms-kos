@php
    $site_name = get_setting_data('site_name')['value'];
    $jumbotron = get_section_data('JUMBOTRON');
    $location = get_setting_data('location')['value'];
    $site_description = get_setting_data('site_description')['value'];
    $about = get_section_data('ABOUT');
    $facilities = get_facilities('FACILITIES');
    $first_wa = get_setting_data('first_wa')['value'];
    $second_wa = get_setting_data('second_wa')['value'];
    $first_wa_name = get_setting_data('first_wa')['label'];
    $second_wa_name = get_setting_data('second_wa')['label'];
    $photos = get_photos('PHOTOS');
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>{{ $site_name }}</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('template/assets/house-solid.svg') }}" />
    <!-- Font Awesome icons (free version)-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('template/css/styles.css') }}" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top">{{ $site_name }}</a>
            <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="#facilities">Fasilitas</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="#about">Tentang</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="#photos">Foto</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="#contact">Kontak</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Masthead-->
    <header class="masthead bg-primary text-white text-center">
        <div class="container d-flex align-items-center flex-row">
            <!-- Image on the left -->
            <div class="col-md-6">
                <img class="img-fluid rounded mb-5" src="{{ Storage::url($jumbotron->thumbnail) }}" alt="thumbnail" />
            </div>

            <!-- Text on the right -->
            <div class="col-md-6">
                <!-- Masthead Heading -->
                <h1 class="masthead-heading text-uppercase mb-0">{{ $jumbotron->title }}</h1>
                <!-- Icon Divider -->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Masthead Subheading -->
                <p class="masthead-subheading font-weight-light mb-0">{!! strip_tags($jumbotron->content) !!}</p>
            </div>
        </div>
    </header>

    <!-- Facilities Section-->
    <section class="page-section facilities" id="facilities">
        <div class="container">
            <!-- Facilities Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Fasilitas</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Facilities List Items-->
            <div class="row">
                @foreach ($facilities as $item)
                    <div class="col-md-4 mb-4 d-flex align-items-stretch">
                        <div class="card w-100 rounded border-0 text">
                            <div class="card-body d-flex flex-column bg-primary rounded">
                                <h4 class="card-title text-center text-white">{{ $item->title }}</h4>
                                {{-- <p class="card-text flex-grow-1 text-white">{!! strip_tags($item->content) !!}</p> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- About Section-->
    <section class="page-section bg-primary text-white mb-0" id="about">
        <div class="container">
            <!-- About Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-white">{{ $about->title }}</h2>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- About Section Content-->
            <div class="row align-items-center">
                <div class="col-lg-6 me-auto lead">
                    {!! strip_tags($about->content) !!}
                </div>
                <div class="col-lg-6 ms-auto text-center"><img class="img-fluid rounded"
                        src="{{ Storage::url($about->thumbnail) }}" class="w-75" /></div>
            </div>
        </div>
    </section>

    <!-- Photos Section -->
    <section class="page-section" id="photos">
        <div class="container">
            <!-- Photos Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Foto</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Photos List Items-->
            <div class="row justify-content-center">
                @foreach ($photos as $photo)
                    <div class="col-md-4">
                        <img class="img-fluid rounded mb-4" src="{{ Storage::url($photo->thumbnail) }}"
                            alt="thumbnail" />
                        <h4 class="text-center mb-4">{{ $photo->description }}</h4>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Contact Section-->
    <section class="page-section bg-primary" id="contact">
        <div class="container">
            <!-- Contact Section Heading-->
            <h2 class="page-section-heading text-center text-white text-uppercase mb-0">Kontak</h2>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <div class="row justify-content-center">
                <div class="text-center">
                    <a class="btn btn-dark btn-xl d-inline-block mx-4 text-primary">
                        <i class="fab fa-whatsapp"></i> {{ $first_wa }} ({{ $first_wa_name }})
                    </a>
                    <a class="btn btn-dark btn-xl d-inline-block mx-4 text-primary">
                        <i class="fab fa-whatsapp"></i> {{ $second_wa }} ({{ $second_wa_name }})
                    </a>
                </div>
            </div>
        </div>
    </section>


    <!-- Footer-->
    <footer class="footer text-center bg-white text-dark" id="profile">
        <div class="container">
            <div class="row">
                <!-- Footer Location-->
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Alamat</h4>
                    <p class="lead mb-0">
                        {{ $location }}
                    </p>
                </div>
                <!-- Footer About Text-->
                <div class="col-lg-6">
                    <h4 class="text-uppercase mb-4">Tentang Kami</h4>
                    <p class="lead mb-0">
                        {!! strip_tags($site_description) !!}
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Copyright Section-->
    <div class="copyright py-4 text-center text-white">
        <div class="container"><small>Copyright &copy; {{ $site_name }} 2024</small></div>
    </div>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('template/js/scripts.js') }}"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>
