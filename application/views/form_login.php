<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Bootstrap Brain</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            margin: 0;
            font-family: 'Nunito', sans-serif;
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .container-login {
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            display: flex;
            max-width: 900px;
            width: 100%;
        }

        .login-left {
            background-color: #007bff;
            color: white;
            padding: 50px;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .login-left h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .login-left p {
            font-size: 1.1rem;
            text-align: center;
            line-height: 1.5;
        }

        .login-right {
            flex: 1;
            padding: 50px 30px;
        }

        .login-right h2 {
            font-size: 1.8rem;
            margin-bottom: 30px;
            color: #333;
            text-align: center;
        }

        .form-control {
            margin-bottom: 20px;
            height: 45px;
            font-size: 1rem;
        }

        .btn-login {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }

        .btn-login:hover {
            background-color: #0056b3;
        }

        .forgot-password {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #007bff;
            text-decoration: none;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        .carousel-container,
        .ukm-description-container {
            margin-top: 30px;
            max-width: 900px;
            width: 100%;
        }

        .ukm-description-container .ukm-card {
            margin-bottom: 20px;
        }

        .ukm-card {
            background: #ffffff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .ukm-card h5 {
            font-size: 1.4rem;
            color: #007bff;
        }

        .ukm-card p {
            font-size: 1rem;
            color: #555;
        }
        .feature-section {
            margin: 50px auto;
            max-width: 1200px;
            padding: 20px;
        }

        .feature-card {
            text-align: center;
            padding: 20px;
        }

        .feature-card img {
            border-radius: 50%;
            margin-bottom: 15px;
        }

        .featurette-divider {
            margin: 50px 0;
        }

        .featurette-heading {
            font-size: 2rem;
            margin-bottom: 15px;
        }

        .featurette {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-bottom: 50px;
        }

        .featurette img {
            max-width: 100%;
            height: auto;
        }
        .navbar {
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .carousel-container,
        .ukm-description-container {
            margin-top: 30px;
            max-width: 900px;
            width: 100%;
        }
    </style>
</head>

<body>
     <!-- Header Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#ukmCarousel">UKM</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#featureSection">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#loginSection">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav><br><br>

    <!-- Login Container -->
    <div class="container-login" id="loginSection">
        <!-- Left Section -->
        <div class="login-left">
            <h1>Welcome Back!</h1>
            <p>We create digital solutions that help you stand out from the competition.<br>Join us today!</p>
        </div>

        <!-- Right Section -->
        <div class="login-right">
            <h2>Sign In</h2>
            <form method="POST" action="#">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Enter your username" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter your password" name="password" required>
                </div>
                <button type="submit" class="btn btn-login">Log in now</button>
            </form>
        </div>
    </div>

    <!-- UKM Carousel -->
    <div class="carousel-container" id="ukmCarousel">
        <div id="ukmCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://via.placeholder.com/900x400" class="d-block w-100" alt="UKM 1">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>UKM Seni dan Budaya</h5>
                        <p>Kegiatan seni kreatif mahasiswa.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://via.placeholder.com/900x400" class="d-block w-100" alt="UKM 2">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>UKM Olahraga</h5>
                        <p>Latihan rutin olahraga mahasiswa.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://via.placeholder.com/900x400" class="d-block w-100" alt="UKM 3">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>UKM Teknologi</h5>
                        <p>Inovasi dan pengembangan teknologi.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#ukmCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#ukmCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div><br>

    <!-- Feature Section -->
    <div class="feature-section" id="featureSection">
        <div class="row text-center">
            <div class="col-lg-4 feature-card">
                <img src="https://via.placeholder.com/100" alt="Feature 1">
                <h3>Heading</h3>
                <p>Some representative placeholder content for the first column of text below the carousel.</p>
                <a href="#" class="btn btn-primary">View details</a>
            </div>
            <div class="col-lg-4 feature-card">
                <img src="https://via.placeholder.com/100" alt="Feature 2">
                <h3>Heading</h3>
                <p>Another exciting bit of representative placeholder content. This time, we've moved on to the second column.</p>
                <a href="#" class="btn btn-primary">View details</a>
            </div>
            <div class="col-lg-4 feature-card">
                <img src="https://via.placeholder.com/100" alt="Feature 3">
                <h3>Heading</h3>
                <p>And lastly this, the third column of representative placeholder content.</p>
                <a href="#" class="btn btn-primary">View details</a>
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It’ll blow your mind.</span></h2>
                <p class="lead">Some great placeholder content for the first featurette here. Imagine some exciting prose here.</p>
            </div>
            <div class="col-md-5">
                <img src="https://via.placeholder.com/500x500" alt="First featurette">
            </div>
        </div>

        <div class="featurette">
            <div class="col-md-5">
                <img src="https://via.placeholder.com/500x500" alt="Second featurette">
            </div>
            <div class="col-md-7">
                <h2 class="featurette-heading">Oh yeah, it’s that good. <span class="text-muted">See for yourself.</span></h2>
                <p class="lead">Another featurette? Of course. More placeholder content to give you an idea of how this layout would work with some actual real-world content in place.</p>
            </div>
        </div>

        <div class="featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
                <p class="lead">And yes, this is the last block of representative placeholder content. Again, not really intended to be actually read, simply here to give you a better view of what this would look like with some actual content. Your content.</p>
            </div>
            <div class="col-md-5">
                <img src="https://via.placeholder.com/500x500" alt="Third featurette">
            </div>
        </div>
    </div>

    


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
