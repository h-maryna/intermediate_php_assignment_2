<?php if($errors) : ?>
	<ul>
		<?php foreach($errors as $key => $value) : ?>
			<li class="errors"><?=e($value)?></li>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>