<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="container">
	<div class="row">
		<div class="col l6 offset-l4">
			<div class="chip deep-orange lighten-3">
			   	<?= $message ?>
			    <i class="close material-icons">close</i>
			 </div>
		</div>
	</div>
</div>