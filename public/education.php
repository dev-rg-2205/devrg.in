<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../app/config/site_db.php'; // include read-only DB

// Fetch all published education
$stmt = $siteDB->query("SELECT * FROM education ORDER BY id DESC");
$educations = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
   

    <!-- Education Start -->
        <div class="experience" id="education">
        <div class="container">
            <header class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
                <p>My Education</p>
                <h2>Education</h2>
            </header>
    
            <div class="timeline">
            
             <?php if (!empty($educations)): ?>
                 <?php foreach ($educations as $index => $education): ?>
                    <?php
                    // even index → left, odd index → right
                    $position = ($index % 2 == 0) ? 'left' : 'right';
                    $animation = ($index % 2 == 0) ? 'slideInLeft' : 'slideInRight';
                    ?>
                    <div class="timeline-item <?= $position ?> wow <?= $animation ?>" data-wow-delay="0.1s">
                            <div class="timeline-text">
                                <div class="timeline-date">
                                <?php echo date('M Y', strtotime($education['startYear']));?> 
                                – 
                                <?php
                                if (!empty($education['endYear'])) {
                                    echo date('M Y', strtotime($education['endYear']));
                                } else {
                                    echo 'Present';
                                }
                                ?>
                                </div>
                                <h2><?php echo htmlspecialchars($education['course']); ?></h2>
                                <h4><?php echo htmlspecialchars($education['university']); ?></h4>
                                <p>
                                   <?php echo nl2br(htmlspecialchars($education['detail'])); ?>        
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
