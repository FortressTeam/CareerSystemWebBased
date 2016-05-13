<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-head">
                <header>List Hiring Managers</header>
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
                    <table cellpadding="0" cellspacing="0" class="table">
                        <thead>
                            <tr>
                                <th class="col-xs-3"><?= $this->Paginator->sort('hiring_manager_name') ?></th>
                                <th class="col-xs-2"><?= $this->Paginator->sort('user.user_email', ['label' => 'Email']) ?></th>
                                <th class="col-xs-3"><?= $this->Paginator->sort('company_name') ?></th>
                                <th class="col-xs-2"><?= $this->Paginator->sort('company_email') ?></th>
                                <th class="col-xs-1"><?= $this->Paginator->sort('hiring_manager_status', ['label' => 'Status']) ?></th>
                                <th class="actions text-right col-xs-1"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($hiringManagers as $hiringManager): ?>
                            <tr>
                                <td><?= 
                                    $this->Html->link(h($hiringManager->hiring_manager_name),
                                    ['action' => 'view', 'slug' => Cake\Utility\Inflector::slug($hiringManager->hiring_manager_name), 'id' => $hiringManager->id],
                                    ['escape' => false]) ?></td>
                                <td><?= $hiringManager->has('user') ? h($hiringManager->user->user_email) : '' ?></td>
                                <td><?= h($hiringManager->company_name) ?></td>
                                <td><?= h($hiringManager->company_email) ?></td>
                                <td><?= $hiringManager->hiring_manager_status ? '<span class="label label-primary col-xs-12">Active</span>' : '<span class="label label-warning col-xs-12">Pending</span>' ?></td>
                                <td class="actions text-right">
                                <?= $this->Html->link(
                                    '<button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="View hiringManager"><i class="fa fa-info"></i></button>',
                                    ['action' => 'view', $hiringManager->id],
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
            '<button class="btn ink-reaction btn-floating-action btn-fix-bottom btn-lg btn-primary"><i class="fa fa-plus"></i></button>',
            ['action' => 'add'],
            ['escape' => false]) ?>
    </div>
</div>