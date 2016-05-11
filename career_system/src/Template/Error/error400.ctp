<?php
use Cake\Core\Configure;
use Cake\Error\Debugger;

$this->layout = 'error';

if (Configure::read('debug')):
    $this->layout = 'dev_error';

    $this->assign('title', $message);
    $this->assign('templateName', 'error400.ctp');

    $this->start('file');
?>
<?php if (!empty($error->queryString)) : ?>
    <p class="notice">
        <strong>SQL Query: </strong>
        <?= h($error->queryString) ?>
    </p>
<?php endif; ?>
<?php if (!empty($error->params)) : ?>
        <strong>SQL Query Params: </strong>
        <?= Debugger::dump($error->params) ?>
<?php endif; ?>
<?= $this->element('auto_table_warning') ?>
<?php
    if (extension_loaded('xdebug')):
        xdebug_print_function_stack();
    endif;

    $this->end();
endif;
?>
<div class="row">
    <div class="col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
        <h1 class="text-xxxxl text-primary"><b>404!</b> <?= h($message) ?></h1>
        <p class="error text-xl text-primary">
            <strong><?= __d('cake', 'Opps') ?>, </strong>
            <?= __('The page you was looking doesn\'t exist!') ?>
        </p>
        <p class="text-xl text-primary">Visit 
            <b><u><?= $this->Html->link(
                    __('Homepage'),
                    ['controller' => 'Pages', 'action' => 'home']
                ); ?></u></b>
             or go
             <b><u><?= $this->Html->link(
                    __('back'),
                    $this->request->referer()
                ); ?></u></b></u></b>.
        </p>
        <span class="text-default-light text-xs"><?= sprintf(
            __d('cake', 'Address: %s'),
            "<strong>'{$url}'</strong>"
        ) ?></span>
    </div>
</div>
