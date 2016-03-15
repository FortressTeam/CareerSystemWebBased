<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-head style-primary">
                <header>List Notifications</header>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table cellpadding="0" cellspacing="0" class="table table-condensed table-hover no-margin">
                        <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('id') ?></th>
                                <th><?= $this->Paginator->sort('notification_title') ?></th>
                                <th><?= $this->Paginator->sort('notification_time') ?></th>
                                <th><?= $this->Paginator->sort('is_seen') ?></th>
                                <th><?= $this->Paginator->sort('user_id') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
            <?php foreach ($notifications as $notification): ?>
                        <tr>
                                <td><?= $this->Number->format($notification->id) ?></td>
                                <td><?= h($notification->notification_title) ?></td>
                                <td><?= h($notification->notification_time) ?></td>
                                <td><?= $this->Number->format($notification->is_seen) ?></td>
                                <td><?= $notification->has('user') ? $this->Html->link($notification->user->id, ['controller' => 'Users', 'action' => 'view', $notification->user->id]) : '' ?></td>
                                <td class="actions">
                                <?= $this->Html->link(__('View'), ['action' => 'view', $notification->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $notification->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $notification->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notification->id)]) ?>
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

    <div class="col-lg-4">
        <div class="card">
            <div class="card-head">
                <header><?= __('Actions') ?></header>
            </div>
            <div class="card-body no-padding">
                <ul class="list divider-full-bleed">
                    <li class="tile"><?= $this->Html->link(
                        '<div class="tile-icon"><i class="fa fa-dot-circle-o"></i></div>
                        <div class="tile-text">New Notification</div>',
                        ['action' => 'add'],
                        ['class' => 'tile-content ink-reaction', 'escape' => false]) ?>
                    </li>
                    <li class="tile"><?= $this->Html->link(
                        '<div class="tile-icon"><i class="fa fa-dot-circle-o"></i></div>
                        <div class="tile-text">List Users</div>',
                        ['controller' => 'Users', 'action' => 'index'],
                        ['class' => 'tile-content ink-reaction', 'escape' => false]) ?>
                    </li>
                    <li class="tile"><?= $this->Html->link(
                        '<div class="tile-icon"><i class="fa fa-dot-circle-o"></i></div>
                        <div class="tile-text">New User</div>',
                        ['controller' => 'Users', 'action' => 'add'],
                        ['class' => 'tile-content ink-reaction', 'escape' => false]) ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>