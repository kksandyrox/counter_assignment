<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="container">
	<div class="row">
        <p class="deep-orange-text lighten-3 center-align">
            <?= $message ?>
        </p>
	</div>
</div>
