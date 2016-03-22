<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-head style-primary">
                <header>List Posts</header>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table cellpadding="0" cellspacing="0" class="table table-condensed table-hover no-margin">
                        <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('id') ?></th>
                                <th><?= $this->Paginator->sort('post_title') ?></th>
                                <th><?= $this->Paginator->sort('post_salary') ?></th>
                                <th><?= $this->Paginator->sort('post_location') ?></th>
                                <th><?= $this->Paginator->sort('post_date') ?></th>
                                <th><?= $this->Paginator->sort('post_status') ?></th>
                                <th><?= $this->Paginator->sort('hiring_manager_id') ?></th>
                                <th class="actions text-right"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($posts as $post): ?>
                            <tr>
                                <td><?= $this->Number->format($post->id) ?></td>
                                <td><?= h($post->post_title) ?></td>
                                <td><?= $this->Number->currency($post->post_salary, 'VND', ['pattern' => 'VND #,###.00']) ?></td>
                                <td><?= h($post->post_location) ?></td>
                                <td><?= h($post->post_date->format('e')) ?></td>
                                <td><?= ($post->post_status == 0)?'<span class="label label-warning">Pending</span>':'<span class="label label-success">Active</span>' ?></td>
                                <td><?= $post->has('hiring_manager') ? $this->Html->link($post->hiring_manager->hiring_manager_name, ['controller' => 'HiringManagers', 'action' => 'view', $post->hiring_manager->id]) : '' ?></td>
                                <td class="actions text-right">
                                <?= $this->Html->link(
                                    '<button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="View post"><i class="fa fa-info"></i></button>',
                                    ['action' => 'view', $post->id],
                                    ['escape' => false]) ?>
                                <?= $this->Html->link(
                                    '<button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Edit post"><i class="fa fa-pencil"></i></button>',
                                    ['action' => 'edit', $post->id],
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