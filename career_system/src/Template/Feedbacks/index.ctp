<?= $this->Html->script('libs/morissjs/morris.min') ?>
<?= $this->Html->script('libs/morissjs/raphael.min.js') ?>


<div class="row">
    <div class="col-lg-4">
        <div class="row">
            <div class="card col-lg-12 col-md-6 col-sm-12">
                <div class="card-head">
                    <header>Line chart</header>
                </div>
                <div class="card-body">
                    <div id="lineChart" data-url="<?= $this->Url->build('/api/feedbacks/month'); ?>"></div>
                </div>
            </div>

            <div class="card col-lg-12 col-md-6 col-sm-12">
                <div class="card-head">
                    <header>Donut chart</header>
                </div>
                <div class="card-body">
                    <div id="typeDonutChart" data-url="<?= $this->Url->build('/api/feedbacks/type'); ?>"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-head">
                <header>List Feedbacks</header>
                <div class="tools">
                <?php
                    echo $this->Form->create('', [
                        'class' => 'form',
                        'templates' => [
                            'formGroup' => '{{input}}{{label}}',
                            'inputContainer' => '<div class="form-group floating-label  padd-0 marg-0 col-xs-10">{{content}}</div>'
                        ]
                    ]);
                    echo $this->Form->input('q', ['label' => '', 'class' => 'form-control', 'placeholder' => 'Search']);
                    echo $this->Form->button(
                        '<i class="fa fa-search"></i>',
                        ['type' => 'submit','class' => 'btn ink-reaction btn-flat btn-md'],
                        ['escape' => false]);
                    echo $this->Form->end();
                ?>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table cellpadding="0" cellspacing="0" class="table table-condensed table-hover no-margin">
                        <thead>
                            <tr>
                                <th class="col-xs-10 col-sm-5"><?= $this->Paginator->sort('feedback_title', ['label' => 'Title']) ?></th>
                                <th class="col-xs-2 hidden-xs"><?= $this->Paginator->sort('feedback_date', ['label' => 'Date']) ?></th>
                                <th class="col-xs-2 hidden-xs"><?= $this->Paginator->sort('feedback_type_id', ['label' => 'Type']) ?></th>
                                <th class="col-xs-2 hidden-xs"><?= $this->Paginator->sort('user_id') ?></th>
                                <th class="actions text-right col-xs-2 col-sm-1"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($feedbacks as $feedback): ?>
                            <tr>
                                <td><?= h($feedback->feedback_title) ?></td>
                                <td class="hidden-xs"><?= h($feedback->feedback_date->format('d-M-y')) ?></td>
                                <td class="hidden-xs"><?= $feedback->has('feedback_type') ? $this->Html->link($feedback->feedback_type->feedback_type_name, ['controller' => 'FeedbackTypes', 'action' => 'view', $feedback->feedback_type->id]) : '' ?></td>
                                <td class="hidden-xs"><?= $feedback->has('user') ? $this->Html->link($feedback->user->username, ['controller' => 'Users', 'action' => 'view', $feedback->user->id]) : '' ?></td>
                                <td class="actions text-right">
                                <?= $this->Html->link(
                                    '<button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="View feedback"><i class="fa fa-info"></i></button>',
                                    ['action' => 'view', $feedback->id],
                                    ['escape' => false]) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="paginator">
                    <ul class="pagination">
                        <?= $this->Paginator->prev('<i class="fa fa-angle-left"></i> ',
                        ['escape' => false]) ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next('<i class="fa fa-angle-right"></i>',
                        ['escape' => false]) ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="fab_wrapper">
        <?= $this->Html->link(
            '<button class="btn btn_fab btn-primary"><i class="fa fa-plus"></i></button>',
            ['action' => 'add'],
            ['escape' => false]) ?>
    </div>
</div>