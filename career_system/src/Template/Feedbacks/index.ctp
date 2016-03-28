<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-head style-primary">
                <header>List Feedbacks</header>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table cellpadding="0" cellspacing="0" class="table table-condensed table-hover no-margin">
                        <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('id') ?></th>
                                <th><?= $this->Paginator->sort('feedback_title') ?></th>
                                <th><?= $this->Paginator->sort('feedback_date') ?></th>
                                <th><?= $this->Paginator->sort('feedback_type_id') ?></th>
                                <th><?= $this->Paginator->sort('user_id') ?></th>
                                <th class="actions text-right"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($feedbacks as $feedback): ?>
                            <tr>
                                <td><?= $this->Number->format($feedback->id) ?></td>
                                <td><?= h($feedback->feedback_title) ?></td>
                                <td><?= h($feedback->feedback_date) ?></td>
                                <td><?= $feedback->has('feedback_type') ? $this->Html->link($feedback->feedback_type->id, ['controller' => 'FeedbackTypes', 'action' => 'view', $feedback->feedback_type->id]) : '' ?></td>
                                <td><?= $feedback->has('user') ? $this->Html->link($feedback->user->username, ['controller' => 'Users', 'action' => 'view', $feedback->user->id]) : '' ?></td>
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