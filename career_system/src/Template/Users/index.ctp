<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-head style-primary">
                <header>List Users</header>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table cellpadding="0" cellspacing="0" class="table table-condensed table-hover no-margin">
                        <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('id') ?></th>
                                <th><?= $this->Paginator->sort('username') ?></th>
                                <th><?= $this->Paginator->sort('password') ?></th>
                                <th><?= $this->Paginator->sort('user_email') ?></th>
                                <th><?= $this->Paginator->sort('user_registered') ?></th>
                                <th><?= $this->Paginator->sort('user_status') ?></th>
                                <th><?= $this->Paginator->sort('user_avatar') ?></th>
                                <th><?= $this->Paginator->sort('group_id') ?></th>
                                <th class="actions text-right"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?= $this->Number->format($user->id) ?></td>
                                <td><?= h($user->username) ?></td>
                                <td><?= h($user->password) ?></td>
                                <td><?= h($user->user_email) ?></td>
                                <td><?= h($user->user_registered) ?></td>
                                <td><?= h($user->user_status) ?></td>
                                <td><?= h($user->user_avatar) ?></td>
                                <td><?= $user->has('group') ? $this->Html->link($user->group->group_name, ['controller' => 'Groups', 'action' => 'view', $user->group->id]) : '' ?></td>
                                <td class="actions text-right">
                                <?= $this->Html->link(
                                    '<button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="View user"><i class="fa fa-info"></i></button>',
                                    ['action' => 'view', $user->id],
                                    ['escape' => false]) ?>
                                <?= $this->Html->link(
                                    '<button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Edit user"><i class="fa fa-pencil"></i></button>',
                                    ['action' => 'edit', $user->id],
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