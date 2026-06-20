<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../app/config/site_db.php'; // include read-only DB

$stmt = $siteDB->query("SELECT * FROM pageBanner ORDER BY id ASC");
$pageBanners = $stmt->fetchAll(PDO::FETCH_ASSOC);

$currentFile = basename($_SERVER['PHP_SELF'], ".php"); // index, experience, blog etc.

$pageNameMap = [
    'index' => 'Home',
    'experience' => 'Experience',
    'education' => 'Education',
    'projects' => 'Projects',
    'blogs' => 'Blog',
    'contact' => 'Contact'
];

$currentPageName = $pageNameMap[$currentFile] ?? 'Home';

$pageBannerIndex = 0; // default fallback
foreach ($pageBanners as $index => $banner) {
    if ($banner['pageName'] === $currentPageName) {
        $pageBannerIndex = $index;
        break;
    }
}
$banner = $pageBanners[$pageBannerIndex];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Rishabh Gupta - Android & iOS Mobile App Developer</title>

    <!-- Favicon -->
    <link rel="icon" href="../public/assets/img/logo.png">

    <!-- Basic SEO -->
    <meta name="description" content="Rishabh Gupta - Mobile App Developer skilled in Android, iOS, Kotlin, Swift, React Native, and modern mobile architectures.">
    <meta name="keywords" content="Rishabh Gupta, Android Developer, iOS Developer, Kotlin, Swift">
    <meta name="author" content="Rishabh Gupta">
    <meta name="robots" content="index, follow">

    <!-- Viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#2563EB">

    <!-- Open Graph -->
    <meta property="og:title" content="Rishabh Gupta - Mobile App Developer Portfolio">
    <meta property="og:description" content="Professional Android & iOS Developer | Kotlin | Swift | React Native | MVVM | Clean Architecture">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://devrg.in">
    <meta property="og:image" content="https://devrg.in/img/profile.jpg">
    <meta property="og:site_name" content="Rishabh Gupta Portfolio">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Rishabh Gupta - Mobile App Developer">
    <meta name="twitter:description" content="Explore the mobile apps developed by Rishabh Gupta using modern Android & iOS technologies.">
    <meta name="twitter:image" content="https://devrg.in/img/profile.jpg">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="../lib/animate/animate.min.css" rel="stylesheet">
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="../public/assets/css/style.css" rel="stylesheet">
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="51">

<!-- Navbar Start -->
<div class="navbar navbar-expand-lg bg-light navbar-light">
    <div class="container-fluid">
        <a href="index.php" class="navbar-brand d-flex align-items-center">
            <img src="../public/assets/img/logo.png" alt="Dev.rg Logo" class="brand-logo">
            <span class="ml-2">Dev.rg</span>
        </a>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav ml-auto">
                <a href="../public/index.php" class="nav-item nav-link active">Home</a>
                <a href="../public/experience.php" class="nav-item nav-link">Experience</a>
                <a href="../public/education.php" class="nav-item nav-link">Education</a>
                <a href="../public/projects.php" class="nav-item nav-link">Projects</a>
                <a href="../public/blogs.php" class="nav-item nav-link">Blog</a>
                <a href="../public/contact.php" class="nav-item nav-link">Contact</a>
            </div>
        </div>
    </div>
</div>
<!-- Navbar End -->

<!-- Page Banner Start -->

<div class="hero" id="home">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-sm-12 col-md-6">
                <div class="hero-content">
                    <div class="hero-text">
                        <p><?php echo $banner['title']; ?></p>
                        <h1><?php echo $banner['subTitle']; ?></h1>
                        <h2></h2>
                        <div class="typed-text"><?php echo $banner['description']; ?></div>
                    </div>  
                    <?php if ($banner['pageName'] == 'Home' ): ?>                     
                    <div class="hero-btn">
                        <a class="btn" href="../public/uploads/files/CV_Rishabh_Gupta_Android.pdf" target="_blank" download>Download CV</a>
                        <a class="btn" href="#contact">Contact Me</a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 d-none d-md-block">
                <div class="hero-image">
                    <img src="../public/uploads/pageBanners/<?php echo $banner['image']; ?>" alt="Rishabh Gupta - Sr. Android Developer">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Page Banner End -->

                


