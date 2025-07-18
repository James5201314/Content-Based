<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php
    $pageTitles = [
        'index.php' => 'Home',
        'about.php' => 'About',
        'services.php' => 'Services',
        'proprietary-solutions.php' => 'Proprietary Solutions',
    ];

    $current = basename($_SERVER['PHP_SELF']);
    $titleSuffix = isset($pageTitles[$current]) ? ' - ' . $pageTitles[$current] : '';
    ?>

    <title>OCTO Digital<?= $titleSuffix ?></title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gabarito:wght@400..900&family=Kanchenjunga:wght@400;500;600;700&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Parkinsans:wght@300..800&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Gabarito:wght@400..900&family=Kanchenjunga:wght@400;500;600;700&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Parkinsans:wght@300..800&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="assets/js/main.js" defer></script>

</head>
<body>





<nav class="sidebar-nav"> 
    <ul class="nav-links">
        <li><a href="index.php" class="<?= basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : '' ?>">Home</a></li>
        <li><a href="about.php" class="<?= basename($_SERVER['PHP_SELF']) == 'about.php' ? 'active' : '' ?>">About</a></li>
        <li><a href="services.php" class="<?= basename($_SERVER['PHP_SELF']) == 'services.php' ? 'active' : '' ?>">Services</a></li>
        <li><a href="proprietary-solutions.php" class="<?= basename($_SERVER['PHP_SELF']) == 'proprietary-solutions.php' ? 'active' : '' ?>">Proprietary Solutions</a></li>
    </ul>
</nav>

<div class="burger-btn" onclick="myFunction(this)">
    <div class="bar1"></div>
    <div class="bar2"></div>
    <div class="bar3"></div>
</div>


<header class="site-header">
    <div class="header-container">
        <div class="logo">
            <a href="index.php">
                <img src="assets/img/logo.webp" alt="OctoDigital Logo" height="90">
            </a>
        </div>

        
        <nav class="main-nav">
            <ul class="nav-links">
                <li><a href="index.php" class="<?= basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : '' ?>">Home</a></li>
                <li><a href="about.php" class="<?= basename($_SERVER['PHP_SELF']) == 'about.php' ? 'active' : '' ?>">About</a></li>
                <li><a href="services.php" class="<?= basename($_SERVER['PHP_SELF']) == 'services.php' ? 'active' : '' ?>">Services</a></li>
                <li><a href="proprietary-solutions.php" class="<?= basename($_SERVER['PHP_SELF']) == 'proprietary-solutions.php' ? 'active' : '' ?>">Proprietary Solutions</a></li>
            </ul>
        </nav>
    </div>
</header>

<main class="contents" style="margin: 0; padding: 0;">

<!-- Breadcrumbs -->
<?php
    $baseUrl = '/index.php';
    $segments = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'));

    $path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    $isHome = ($path === '' || strtolower($path) === 'index.php');


    if (!$isHome): ?>
        <nav class="breadcrumb">
        <?php
            $baseUrl = '/index.php';
            $segments = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'));
            $isHome = empty($segments) || (count($segments) === 1 && strtolower($segments[0]) === 'index.php');

            if (!$isHome):
                $segments = array_filter($segments, fn($seg) => strtolower($seg) !== 'index.php');
                echo '<a href="' . $baseUrl . '" class="breadcrumb-link">HOME</a>';

                $path = '';
                $total = count($segments);
                $i = 0;

                foreach ($segments as $segment) {
                    $i++;
                    $path .= '/' . $segment;
                    $label = strtoupper(str_replace(['-', '_'], ' ', preg_replace('/\.php$/i', '', $segment)));

                    echo ' <span class="breadcrumb-separator">/</span> ';
                    if ($i < $total) {
                        echo '<a href="' . $path . '" class="breadcrumb-link">' . $label . '</a>';
                    } else {
                        echo '<span class="breadcrumb-current">' . $label . '</span>';
                    }
                }
            endif;
        ?>
        </nav>
<?php endif; ?>





