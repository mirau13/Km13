<?php
	include_once 'header.php';
?>

<!-- content for frontpage -->
<section class="main-cont">
	<div class="main-frame">
		<h2>Acasă</h2>
		<?php
			if (isset ($_SESSION['u_id'])){
				echo "You are logged in!";
			}
		?>
	</div>
</section>

</body>
</html>