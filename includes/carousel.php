<?php
function showCarousel($folderName, $label) {
    $folderPath = "assets/img/" . $folderName;
    $images = glob($folderPath . "/*.{jpg,jpeg,png,webp,gif}", GLOB_BRACE);
    if (!$images) return;

    $carouselId = "carousel-" . $folderName;

    echo "<article class='carousel-section'>";
    echo "  <div class='carousel-container'>";

    echo "    <div class='carousel-header'>";
    echo "      <p class='carousel-desc'>" . strtoupper(htmlspecialchars($folderName)) . "</p>";
    echo "      <h2 class='carousel-desc-title'>" . htmlspecialchars($label) . "</h2>";
    echo "      <div class='divider'></div>";
    if ($folderName === 'clients') {
        echo "        <p class='carousel-paragraph'>Some of Our Clients</p>";
        echo "        <br>";
    } elseif ($folderName === 'partners') {
        echo "        <p class='carousel-paragraph'>We partner with key industry players who share our passion and trust for efficient and effective solutions delivery.</p>";
        echo "        <br>";
    }
    echo "    </div>";
    echo "    <div class='carousel-content'>";
    echo "      <div class='carousel-inner'>";
    echo "        <div class='carousel-visual'>";
    echo "          <div class='swiper $carouselId'>";
    echo "            <div class='swiper-wrapper'>";
    foreach ($images as $img) {
        $safeImg = htmlspecialchars($img);
        $alt = htmlspecialchars($label . " Logo");
        echo "              <div class='swiper-slide'>";
        echo "                <div class='carousel-box'>";
        echo "                  <img src='$safeImg' alt='$alt'>";
        echo "                </div>";
        echo "              </div>";
    }
    echo "            </div>"; // .swiper-wrapper
    echo "            <div class='swiper-pagination'></div>";
    echo "          </div>"; // .swiper
    echo "          <div class='swiper-button-prev'></div>";
    echo "          <div class='swiper-button-next'></div>";
    echo "        </div>"; // .carousel-visual
    echo "      </div>"; // .carousel-inner
    echo "    </div>"; // .carousel-content

    echo "  </div>"; // .carousel-container
    echo "</article>";
}
?>
