<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../app/config/site_db.php'; // include read-only DB

// Fetch all published blogs
$stmt = $siteDB->query("SELECT * FROM blogs ORDER BY id DESC");
$blogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
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

    <!-- Blog Start -->
    <div class="blog" id="blog">
        <div class="container">
            <div class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
                <p>From Blog</p>
                <h2>Latest Blog</h2>
            </div>

            <div class="row">
                <?php if (!empty($blogs)): ?>
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
                <?php else: ?>
                    <p class="text-center">No blogs found</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- Blog End -->
  
    <!-- Footer Start -->
    <?php include '../include/footer.php'; ?>
    <!-- Footer End -->

</body>
</html>
