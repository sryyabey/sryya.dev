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
                <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#projects">Projects</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <h1>We Build Future-Ready Web Platforms</h1>
        <p>Reliable, scalable, and innovative SaaS and network solutions.</p>
        <a href="#projects" class="btn btn-gradient btn-lg mt-4">View Projects</a>
    </div>
</section>

<!-- About Section -->
<section id="about" class="section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2 class="fw-bold">About Us</h2>
                <p>At sryya.dev, we specialize in developing innovative SaaS platforms and network marketing solutions tailored for modern businesses. We focus on building scalable, efficient, and user-centric web applications to help our clients succeed.</p>
            </div>
            <div class="col-md-6">
                <img src="https://via.placeholder.com/500x400?text=Team+Work" alt="About Image" class="img-fluid rounded">
            </div>
        </div>
    </div>
</section>

<!-- Projects Section -->
<section id="projects" class="section bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Our Projects</h2>
            <p class="text-muted">Solutions we have built for the digital age.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card h-100">
                    <img src="https://via.placeholder.com/600x300?text=bagla.app" class="card-img-top" alt="bagla.app">
                    <div class="card-body">
                        <h5 class="card-title">Bagla.app</h5>
                        <p class="card-text">A smart bio link platform offering customizable links, analytics, and engagement tools for content creators and businesses.</p>
                        <a href="#" class="btn btn-gradient">View Project</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <img src="https://via.placeholder.com/600x300?text=onlyMLM" class="card-img-top" alt="onlyMLM">
                    <div class="card-body">
                        <h5 class="card-title">OnlyMLM</h5>
                        <p class="card-text">An enterprise-grade MLM & binary network marketing SaaS platform integrated with e-commerce systems and automated financial tracking.</p>
                        <a href="#" class="btn btn-gradient">View Project</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="section text-center">
    <div class="container">
        <h2 class="fw-bold">Let’s build something amazing together.</h2>
        <p class="text-muted">Contact us to discuss your next big idea or project.</p>
        <a href="#contact" class="btn btn-gradient btn-lg mt-3">Contact Us</a>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="section bg-white">
    <div class="container text-center">
        <h2 class="fw-bold mb-4">Contact Us</h2>
        <p class="text-muted">Reach us via email: <a href="mailto:info@sryya.dev">info@sryya.dev</a></p>
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
