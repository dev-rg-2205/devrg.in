<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../app/config/site_db.php'; // include read-only DB

// Fetch all published experience
$stmt = $siteDB->query("SELECT * FROM experience ORDER BY id DESC");
$experiences = $stmt->fetchAll(PDO::FETCH_ASSOC);
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


    <!-- Experience Start -->
        <div class="experience" id="education">
        <div class="container">
            <header class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
                <p>My Experience</p>
                <h2>Experience</h2>
            </header>
    
            <div class="timeline">
            
             <?php if (!empty($experiences)): ?>
                 <?php foreach ($experiences as $index => $experience): ?>
                    <?php
                    // even index → left, odd index → right
                    $position = ($index % 2 == 0) ? 'left' : 'right';
                    $animation = ($index % 2 == 0) ? 'slideInLeft' : 'slideInRight';
                    ?>
                    <div class="timeline-item <?= $position ?> wow <?= $animation ?>" data-wow-delay="0.1s">
                            <div class="timeline-text">
                                <div class="timeline-date">
                                <?php echo date('M Y', strtotime($experience['startYear']));?> 
                                – 
                                <?php
                                if (!empty($experience['endYear'])) {
                                    echo date('M Y', strtotime($experience['endYear']));
                                } else {
                                    echo 'Present';
                                }
                                ?>
                                </div>
                                <h2><?php echo htmlspecialchars($experience['designation']); ?></h2>
                                <h4><?php echo htmlspecialchars($experience['companyName']); ?></h4>
                                <p>
                                   <?php echo nl2br(htmlspecialchars($experience['detail'])); ?>        
                                </p>
                            </div>
                        </div>
                 <?php endforeach; ?>
            <?php else: ?>
                <p>No education records found.</p>
            <?php endif; ?>
            </div>
        </div>
         </div>
         <!-- Education End -->
 

        

    <!-- Footer Start -->
    <?php include '../include/footer.php'; ?>
    <!-- Footer End -->

</body>
</html>
