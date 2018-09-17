<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="container">
    <div class="row">
        <p class="teal-text lighten-3 center-align">
            <?= $message ?>
        </p>
    </div>
</div>
