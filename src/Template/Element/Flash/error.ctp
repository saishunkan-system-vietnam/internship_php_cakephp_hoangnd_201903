<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="alert alert-danger">
  <strong>Danger!</strong> <?= $message ?>
</div>