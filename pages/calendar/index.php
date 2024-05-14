<?php
define("PAGE_TITLE", "Calendar");
define("NAVIGATION_PAGE", "calendar"); 

session_start();

if(empty($_SESSION['id'])){
    header("Location: ../../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

    <?php include "../../includes/components/head.php"; ?>   

<body class="bg-gray-900">


    <h1>calendario</h1>
    <?php include "../../includes/components/structure/navigations/main/bottom.php";?>


</body>
</html>
