<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../app/config/site_db.php'; // include read-only DB

// Fetch all published projects
$stmt = $siteDB->query("SELECT * FROM projects ORDER BY id DESC");
$projects = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rishabh Gupta | Founding Engineer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="assets/img/logo.png">
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <!-- Nav Bar Start -->
    <?php include '../include/header.php'; ?>
    <!-- Nav Bar End -->
   

         <!-- Project Start -->
        <div class="portfolio" id="portfolio">
            <div class="container">
                <div class="section-header text-center wow zoomIn" >
                    <p>My Projects</p>
                    <h2>My Excellent Projects</h2>
                </div>
                   <?php if (!empty($projects)): ?>
                 <div class="row">
                    <div class="col-12">
                        <ul id="portfolio-filter">
                            <li data-filter="*" class="filter-active">All</li>
                            <li data-filter=".Android">Android Apps</li>
                            <li data-filter=".IOS">IOS Apps</li>
                        </ul>
                    </div>
                </div>
                <div class="row portfolio-container">
                    <?php foreach ($projects as $project): ?>
             
                    <div class="col-lg-4 col-md-6 col-sm-12 portfolio-item <?= htmlspecialchars($project['type']) ?> wow fadeInUp">
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
                <?php else: ?>
                    <p class="text-center">No Project found</p>
                <?php endif; ?>
            
                </div>
            </div>
        </div>
        <!-- Project End -->


        

    <!-- Footer Start -->
    <?php include '../include/footer.php'; ?>
    <!-- Footer End -->

</body>
</html>
