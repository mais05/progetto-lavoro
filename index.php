<?php
set_include_path($_SERVER['DOCUMENT_ROOT']);
define("PAGE_TITLE", "Ore Lavoro App");
define("NAVIGATION_PAGE", "home");

require_once "includes/utils/session.php";
?>

<!DOCTYPE html>
<html lang="en">

    <?php include "includes/components/structure/head.php"; ?>   

<body class="bg-gray-900">

<main id="swup" class="bg-base-200">

		<?php include "includes/components/structure/navigations/main/top.php";?>

		<div class="transition-transform">

			<div class="container mx-auto pb-24">

				<div class="px-4 py-4">
					
					<h1 class="text-4xl font-bold text-gray-800 my-3">
						<?php if (USER_IS_LOGGED): ?>
						<?php else: ?>
						<span class="text-indigo-600"><a href="pages/login/">Accedi</a></span> a Ore Lavoro App
						<?php endif;?>
					</h1>

				</div>

			</div>

		</div>

		<?php include "includes/components/structure/navigations/main/bottom.php";?>
	</main>

</body>
</html>
