<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-head style-primary">
                <header>List Hiring Managers</header>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table cellpadding="0" cellspacing="0" class="table table-condensed table-hover no-margin">
                        <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('id') ?></th>
                                <th><?= $this->Paginator->sort('hiring_manager_name') ?></th>
                                <th><?= $this->Paginator->sort('hiring_manager_phone_number') ?></th>
                                <th><?= $this->Paginator->sort('company_name') ?></th>
                                <th><?= $this->Paginator->sort('company_address') ?></th>
                                <th><?= $this->Paginator->sort('company_size') ?></th>
                                <th><?= $this->Paginator->sort('company_logo') ?></th>
                                <th class="actions text-right"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($hiringManagers as $hiringManager): ?>
                            <tr>
                                <td><?= $this->Number->format($hiringManager->id) ?></td>
                                <td><?= h($hiringManager->hiring_manager_name) ?></td>
                                <td><?= h($hiringManager->hiring_manager_phone_number) ?></td>
                                <td><?= h($hiringManager->company_name) ?></td>
                                <td><?= h($hiringManager->company_address) ?></td>
                                <td><?= $this->Number->format($hiringManager->company_size) ?></td>
                                <td><?= h($hiringManager->company_logo) ?></td>
                                <td class="actions text-right">
                                <?= $this->Html->link(
                                    '<button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="View hiringManager"><i class="fa fa-info"></i></button>',
                                    ['action' => 'view', $hiringManager->id],
                                    ['escape' => false]) ?>
                                <?= $this->Html->link(
                                    '<button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Edit hiringManager"><i class="fa fa-pencil"></i></button>',
                                    ['action' => 'edit', $hiringManager->id],
                                    ['escape' => false]) ?>
                                <?= $this->Form->postLink(
                                    '<button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Delete hiringManager"><i class="fa fa-trash"></i></button>', 
                                    ['action' => 'delete', $hiringManager->id],
                                    ['confirm' => __('Are you sure you want to delete # {0}?', $hiringManager->id), 'escape' => false]) ?>
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
                    <p><?= $this->Paginator->counter() ?></p>
                </div>
            </div>
        </div>
    </div>

<!--     <div class="col-lg-4">
        <div class="card">
            <div class="card-head">
                <header><?= __('Actions') ?></header>
            </div>
            <div class="card-body no-padding">
                <ul class="list divider-full-bleed">
                    <li class="tile"><?= $this->Html->link(
                        '<div class="tile-icon"><i class="fa fa-dot-circle-o"></i></div>
                        <div class="tile-text">New Hiring Manager</div>',
                        ['action' => 'add'],
                        ['class' => 'tile-content ink-reaction', 'escape' => false]) ?>
                    </li>
                    <li class="tile"><?= $this->Html->link(
                        '<div class="tile-icon"><i class="fa fa-dot-circle-o"></i></div>
                        <div class="tile-text">List Appointments</div>',
                        ['controller' => 'Appointments', 'action' => 'index'],
                        ['class' => 'tile-content ink-reaction', 'escape' => false]) ?>
                    </li>
                    <li class="tile"><?= $this->Html->link(
                        '<div class="tile-icon"><i class="fa fa-dot-circle-o"></i></div>
                        <div class="tile-text">New Appointment</div>',
                        ['controller' => 'Appointments', 'action' => 'add'],
                        ['class' => 'tile-content ink-reaction', 'escape' => false]) ?>
                    </li>
                    <li class="tile"><?= $this->Html->link(
                        '<div class="tile-icon"><i class="fa fa-dot-circle-o"></i></div>
                        <div class="tile-text">List Follow</div>',
                        ['controller' => 'Follow', 'action' => 'index'],
                        ['class' => 'tile-content ink-reaction', 'escape' => false]) ?>
                    </li>
                    <li class="tile"><?= $this->Html->link(
                        '<div class="tile-icon"><i class="fa fa-dot-circle-o"></i></div>
                        <div class="tile-text">New Follow</div>',
                        ['controller' => 'Follow', 'action' => 'add'],
                        ['class' => 'tile-content ink-reaction', 'escape' => false]) ?>
                    </li>
                    <li class="tile"><?= $this->Html->link(
                        '<div class="tile-icon"><i class="fa fa-dot-circle-o"></i></div>
                        <div class="tile-text">List Posts</div>',
                        ['controller' => 'Posts', 'action' => 'index'],
                        ['class' => 'tile-content ink-reaction', 'escape' => false]) ?>
                    </li>
                    <li class="tile"><?= $this->Html->link(
                        '<div class="tile-icon"><i class="fa fa-dot-circle-o"></i></div>
                        <div class="tile-text">New Post</div>',
                        ['controller' => 'Posts', 'action' => 'add'],
                        ['class' => 'tile-content ink-reaction', 'escape' => false]) ?>
                    </li>
                </ul>
            </div>
        </div>
    </div> -->
</div>