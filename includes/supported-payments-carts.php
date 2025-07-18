<div class="supported-block">
    <h2>List of Supported Payments</h2>
    <div class="supported-payment-columns">
        <div class="supported-payment-left">
            <?php
            function renderPaymentColumn($title, $subfolder) {
                $basePath = 'assets/img/payments/';
                $fullPath = __DIR__ . '/../' . $basePath . $subfolder;
                $webPath = $basePath . $subfolder;

                if (!is_dir($fullPath)) return;

                $images = array_filter(scandir($fullPath), function ($file) use ($fullPath) {
                    return is_file("$fullPath/$file") && preg_match('/\.(png|jpe?g|gif|webp|svg)$/i', $file);
                });

                if (empty($images)) return;

                echo "<div class='supported-payment-column'>";
                echo "<h3>$title</h3>";
                echo "<div class='supported-image-grid'>";
                foreach ($images as $img) {
                    echo "<img src='/$webPath/$img' alt='" . pathinfo($img, PATHINFO_FILENAME) . "' />";
                }
                echo "</div></div>";
            }

            renderPaymentColumn("Payment Methods", "methods");
            renderPaymentColumn("e-Wallet", "e-wallet");
            ?>
        </div>
        <div class="supported-payment-right">
            <?php
            renderPaymentColumn("Online Banks (Current / Savings / Credit Card Accounts)", "banks");
            ?>
        </div>
    </div>
</div>

<div class="supported-block">
    <h2>List of Supported Shopping Carts</h2>
    <div class="supported-image-grid">
        <?php
        $cartPath = __DIR__ . '/../assets/img/carts';
        $cartWeb = 'assets/img/carts';

        if (is_dir($cartPath)) {
            $cartImages = array_filter(scandir($cartPath), function ($file) use ($cartPath) {
                return is_file("$cartPath/$file") && preg_match('/\.(png|jpe?g|gif|webp|svg)$/i', $file);
            });

            foreach ($cartImages as $img) {
                echo "<img src='/$cartWeb/$img' alt='" . pathinfo($img, PATHINFO_FILENAME) . "' />";
            }
        }
        ?>
    </div>
</div>
