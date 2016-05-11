<?php
use Cake\Core\Configure;
use Cake\Error\Debugger;

$this->layout = 'error';

if (Configure::read('debug')):
    $this->layout = 'dev_error';

    $this->assign('title', $message);
    $this->assign('templateName', 'error500.ctp');

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
<?php if ($error instanceof Error) : ?>
        <strong>Error in: </strong>
        <?= sprintf('%s, line %s', str_replace(ROOT, 'ROOT', $error->getFile()), $error->getLine()) ?>
<?php endif; ?>
<?php
    echo $this->element('auto_table_warning');

    if (extension_loaded('xdebug')):
        xdebug_print_function_stack();
    endif;

    $this->end();
endif;
?>
<div class="row">
    <div class="col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
        <h1 class="text-xxxxl text-primary"><b>Uh... Error 500!</b> </h1>
        <p class="error text-xl text-primary">
            <strong><?= __d('cake', 'Sorry') ?>! </strong>
            <?= __('We\'re having technical difficulties.') ?>
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
