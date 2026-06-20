<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../app/config/site_db.php'; // include read-only DB

// Fetch all published blogs
$stmt = $siteDB->query("SELECT * FROM blogs ORDER BY id DESC LIMIT 3");
$blogs = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $siteDB->query("SELECT * FROM experience ORDER BY id DESC");
$experiences = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $siteDB->query("SELECT * FROM service ORDER BY id DESC");
$services = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $siteDB->query("SELECT * FROM projects ORDER BY id DESC LIMIT 3");
$projects = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $siteDB->query("SELECT * FROM skill ORDER BY id ASC");
$skills = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rishabh Gupta | Founding Engineer</title>
    <link rel="icon" type="image/x-icon" href="assets/img/logo.png">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

        <!-- Nav Bar Start -->
        <?php include '../include/header.php'; ?>
        <!-- Nav Bar End -->

        <!-- About Start -->
        <div class="about wow fadeInUp" data-wow-delay="0.1s" id="about">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about-img">
                            <img src="assets/img/about.jpg" alt="Rishabh Gupta - Founding Enginner Mobile">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-content">
                            <div class="section-header text-left">
                                <p>Learn About Me</p>
                                <h2>4+ Years Experience</h2>
                            </div>
                            <div class="about-text">
                            <p>
                             I’m Rishabh Gupta, a Senior Mobile Developer with 4+ years of experience in creating fast, scalable, and user-centric Android and iOS applications.
                             As a Founding Engineer at Happi Labs, I have architected end-to-end mobile solutions — owning everything from UI engineering and API integration to performance tuning and deployment.
                             I enjoy solving complex engineering challenges, building apps from the ground up, and delivering seamless mobile experiences that make a real impact.
                            </p>
                            </div>

                            <?php if (!empty($skills)): ?>
                            <?php foreach ($skills as $skill): ?>
                            <div class="skills">
                                <div class="skill-name">
                                    <p><?= htmlspecialchars($skill['title']) ?></p><p><?= htmlspecialchars($skill['score']) ?>%</p>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="<?= htmlspecialchars($skill['score']) ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            <a class="btn" href="https://www.linkedin.com/in/rishabh-gupta-005169177" target="_blank">Learn More</a> 
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->
        
        
         <!-- Service Start -->
        <?php if (!empty($services)): ?>
        <div class="service" id="service">
            <div class="container">
                <div class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
                <p>What I do</p>
                <h2>Awesome Quality Services</h2>
                </div>
                    <div class="row">
                            <?php foreach ($services as $service): ?>
                                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.4s">
                                    <div class="service-item">
                                        <div class="service-icon">
                                            <i class="fab <?= htmlspecialchars($service['icon']) ?>"></i>
                                        </div>
                                        <div class="service-text">
                                            <h3><?= htmlspecialchars($service['title']) ?></h3>
                                            <p>
                                                <?= htmlspecialchars($service['description']) ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>        
                            <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>    
         <!-- Service End -->
            
 
          <!-- Project Start -->
            <?php if (!empty($projects)): ?>
            <div class="portfolio" id="portfolio">
                <div class="container">
                    <div class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
                        <p>From Projects</p>
                        <h2>My Latest Projects</h2>
                    </div>
                    <div class="row portfolio-container">
                        <?php foreach ($projects as $project): ?>
                
                        <div class="col-lg-4 col-md-6 col-sm-12 portfolio-item <?= htmlspecialchars($project['type']) ?> wow fadeInUp" data-wow-delay="0.0s">
                            <div class="portfolio-wrap">
                                <div class="portfolio-img">
                                    <img src="uploads/projects/<?= htmlspecialchars($project['image']) ?>" alt="Rishabh Gupta Android Project 1">
                                </div>
                                <div class="portfolio-text">
                                    <h3><?= htmlspecialchars($project['name']) ?></h3>
                                    <a class="btn" href="<?= htmlspecialchars($project['url']) ?>" target="_blank">></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    
                    </div>
                </div>
            </div>
            <div style="text-align: center; margin-top: 5px;">
                <a class="btn" href="projects.php" target="_blank">Explore More Projects</a>
            </div>
            <?php else: ?>
            <?php endif; ?>
         <!-- Project End -->        
          
        
        
        
         <!-- Blog Start -->
           <?php if (!empty($blogs)): ?>
             <div class="blog" id="blog">
            <div class="container">
                <div class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
                    <p>From Blogs</p>
                    <h2>Latest Blog</h2>
                </div>

                <div class="row">
                        <?php foreach ($blogs as $blog): ?>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="blog-item wow fadeInUp" data-wow-delay="0.1s">

                                    <div class="blog-img">
                                        <img src="uploads/blogs/<?= htmlspecialchars($blog['image']) ?>" alt="Blog">
                                    </div>

                                    <div class="blog-text">
                                        <h2><?= htmlspecialchars($blog['title']) ?></h2>

                                        <div class="blog-meta">
                                            <p><i class="far fa-list-alt"></i> <?= htmlspecialchars($blog['subject']) ?></p>
                                            <p><i class="far fa-calendar-alt"></i> <?= date("d-M-Y", strtotime($blog['createdAt'])) ?></p>
                                        </div>

                                        <p class="blog-paragraph">
                                            <?= substr(strip_tags($blog['content']), 0, 140) ?>...
                                        </p>

                                        <a class="btn" href="<?= htmlspecialchars($blog['url']) ?>" target="_blank">
                                            Read More <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        <?php endforeach; ?>
                </div>
            </div>
        </div>
        <!-- Blog End -->

        <div style="text-align: center; margin-top: 5px;">
            <a class="btn" href="blogs.php" target="_blank">Explore More Blogs</a>
        </div>
       <?php else: ?>
        <?php endif; ?>
   
       
        <!-- Contact Start -->
        <?php include 'partials/contact-form.php'; ?>
        <!-- Contact End -->

         <!-- Footer Start -->
         <?php include '../include/footer.php'; ?>
         <!-- Footer End -->

</body>
</html>

