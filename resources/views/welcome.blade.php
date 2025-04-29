<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sryya.dev - Web Solutions Company</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f0fdfa;
            color: #0f172a;
        }
        .navbar {
            background-color: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
        }
        .navbar.scrolled {
            background-color: #ffffff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }
        .hero {
            background: linear-gradient(to right, #14b8a6, #2563eb);
            color: white;
            padding: 120px 0;
            text-align: center;
        }
        .hero h1 {
            font-size: 3.5rem;
            font-weight: 800;
        }
        .hero p {
            font-size: 1.25rem;
            margin-top: 20px;
            color: #e0f2fe;
        }
        .btn-gradient {
            background: linear-gradient(to right, #14b8a6, #2563eb);
            border: none;
            color: white;
            font-weight: 600;
        }
        .btn-gradient:hover {
            background: linear-gradient(to right, #2563eb, #14b8a6);
            color: white;
        }
        .section {
            padding: 80px 0;
        }
        .card {
            background-color: #ffffff;
            transition: all 0.3s ease;
            border-radius: 12px;
            border: none;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
            background-color: #e0f2fe;
        }
        footer {
            background-color: #f1f5f9;
            color: #64748b;
            padding: 40px 0;
            text-align: center;
        }
        footer a {
            color: #64748b;
            margin: 0 10px;
            text-decoration: none;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">
            @php($logo = $settings->where('key', 'logo')->first())
            @if($logo)
                <img src="{{ asset('storage/' . $logo->file) }}" width="120px" alt="Logo">
            @else
                <img src="https://via.placeholder.com/100x50?text=Logo" width="100px" alt="Logo">
            @endif
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="#about">
                    {{ __('panel.navbar.about') }}
                </a></li>
                <li class="nav-item"><a class="nav-link" href="#projects">
                    {{ __('panel.navbar.projects') }}
                </a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">
                    {{ __('panel.navbar.contact') }}
                    </a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ app()->getLocale() == 'en' ? '🇬🇧 EN' : (app()->getLocale() == 'tr' ? '🇹🇷 TR' : '🇷🇺 RU') }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                        <li><a class="dropdown-item" href="{{ route('locale', 'en') }}">🇬🇧 EN</a></li>
                        <li><a class="dropdown-item" href="{{ route('locale', 'tr') }}">🇹🇷 TR</a></li>
                        <li><a class="dropdown-item" href="{{ route('locale', 'ru') }}">🇷🇺 RU</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
@php($hero = $pages->where('category.slug', 'hero')->first())
<section class="hero">
    <div class="container">
        <h1> {{ $hero->title ?? '' }} </h1>
        <p> {!! $hero->content ?? '' !!}</p>
        <a href="#projects" class="btn btn-gradient btn-lg mt-4">
            {{ __('panel.homepage.view_projects') }}
        </a>
    </div>
</section>

<!-- About Section -->
@php($about = $pages->where('category.slug', 'about')->first())
<section id="about" class="section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2 class="fw-bold">
                    {{ $about->title ?? '' }}
                </h2>
                <p>
                    {!! $about->content ?? '' !!}
                </p>
            </div>
            <div class="col-md-6">
                @if ($about->image)
                    <img src="{{ asset('storage/' . $about->image) }}" alt="About Image" class="img-fluid rounded">
                @else
                    <img src="https://via.placeholder.com/500x400?text=About+Image" alt="About Image" width="100px" class="img-fluid rounded">
                @endif
           </div>
        </div>
    </div>
</section>

<!-- Projects Section -->
<section id="projects" class="section bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">
                {{ __('panel.homepage.our_projects') }}
            </h2>
            <p class="text-muted">
                {{ __('panel.homepage.our_projects_title') }}
            </p>
        </div>
        <div class="row g-4">
            @php($projects = $pages->where('category.slug', 'projects'))
            @forelse ($projects as $project )
            <div class="col-md-6">
                <div class="card h-100">
                   @if ($project->image)
                        <div style="border: 2px solid #e2e8f0; border-radius: 12px; overflow: hidden; padding: 5px;">
                            <img src="{{ asset('storage/' . $project->image) }}" class="" alt="{{ $project->title ?? 'Project Image' }}" style="max-height: 100px; object-fit: cover;">
                        </div>
                    @else
                        <div style="border: 2px solid #e2e8f0; border-radius: 12px; overflow: hidden; padding: 5px;">
                            <img src="https://via.placeholder.com/600x300?text=Project+Image" class="card-img-top" alt="{{ $project->title ?? 'Project Image' }}" style="max-height: 120px; object-fit: cover;">
                        </div>
                    @endif
                   <div class="card-body">
                        <h5 class="card-title">
                            {{ $project->title ?? '' }}
                        </h5>
                        <p class="card-text">
                            {!! $project->content ?? '' !!}
                        </p>
                        <a href="{{ $project->tags ?? '#' }}" class="btn btn-gradient">
                            {{ __('panel.homepage.view_projects') }}
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-md-6">
                <div class="card h-100">
                    <img src="https://via.placeholder.com/600x300?text=bagla.app" class="card-img-top" alt="bagla.app">
                    <div class="card-body">
                        <h5 class="card-title">Bagla.app</h5>
                        <p class="card-text">A smart bio link platform offering customizable links, analytics, and engagement tools for content creators and businesses.</p>
                        <a href="#" class="btn btn-gradient">
                            {{ __('panel.homepage.view_projects') }}
                        </a>
                    </div>
                </div>
            </div>
            @endforelse


        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="section text-center">
    <div class="container">
        <h2 class="fw-bold">
            {{ __('panel.homepage.lets_build') }}
        </h2>
        <p class="text-muted">
            {{ __('panel.homepage.contact_us_title') }}
        </p>
        <a href="#contact" class="btn btn-gradient btn-lg mt-3">
            {{ __('panel.homepage.contact_us_button') }}
        </a>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="section bg-white">
    <div class="container text-center">
        <h2 class="fw-bold mb-4">
            {{ __('panel.homepage.contact_us') }}
        </h2>
        <p class="text-muted"> <a href="mailto:sryyadev@gmail.com">sryyadev@gmail.com</a></p>
    </div>
</section>

<!-- Footer -->
<footer>
    <div class="container">
        <p class="mb-2">&copy; 2025 sryya.dev. All Rights Reserved.</p>
        <div>
            <a href="#">Terms</a> |
            <a href="#">Privacy</a> |
            <a href="#">Contact</a>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    window.addEventListener('scroll', function() {
        const navbar = document.querySelector('.navbar');
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });
</script>
</body>
</html>
