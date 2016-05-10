<?php
$class = 'message';
if (!empty($params['class'])) {
    $class .= ' ' . $params['class'];
}
?>
<div class="alert alert-callout <?= h($class) ?> animated fadeInRight"><?= h($message) ?></div>
