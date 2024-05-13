<?php
define("PAGE_TITLE", "HOME");

session_start();

?>
<!DOCTYPE html>
<html lang="en">

    <?php include "includes/components/head.php"; ?>   

<body class="bg-gray-100">

    <?php if(!empty($_SESSION['id'])): ?>

        <?php include "pages/home.php"; ?>

    <?php else: ?>

        <?php include "pages/login.php"; ?>
        
    <?php endif; ?>

</body>
</html>