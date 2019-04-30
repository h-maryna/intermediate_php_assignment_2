<?php if(!empty($_SESSION['message'])) : ?>

		<div class="flash <?=$_SESSION['message'][0]?>">
			<?=$_SESSION['message'][1] ?>
		</div>

	<?php 
		unset($_SESSION['message']);
		endif; ?>