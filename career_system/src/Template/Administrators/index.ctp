<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-head">
                <header>List Administrators</header>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table cellpadding="0" cellspacing="0" class="table">
                        <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('administrator_name', ['label' => 'Name']) ?></th>
                                <th><?= $this->Paginator->sort('administrator_phone_number', ['label' => 'Phone number']) ?></th>
                                <th><?= $this->Paginator->sort('administrator_date_of_birth', ['label' => 'Date of birth']) ?></th>
                                <th><?= $this->Paginator->sort('administrator_address', ['label' => 'Address']) ?></th>
                                <th class="actions text-right"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($administrators as $administrator): ?>
                            <tr>
                                <td><?= 
                                    $this->Html->link(h($administrator->administrator_name),
                                    ['action' => 'view', 'slug' => Cake\Utility\Inflector::slug($administrator->administrator_name), 'id' => $administrator->id],
                                    ['escape' => false]) ?></td>
                                <td><?= h($administrator->administrator_phone_number) ?></td>
                                <td><?= h($administrator->administrator_date_of_birth) ?></td>
                                <td><?= h($administrator->administrator_address) ?></td>
                                <td class="actions text-right">
                                <?= $this->Html->link(
                                    '<button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="View administrator"><i class="fa fa-info"></i></button>',
                                    ['action' => 'view', 'slug' => Cake\Utility\Inflector::slug($administrator->administrator_name), 'id' => $administrator->id],
                                    ['escape' => false]) ?>
                                <?= $this->Html->link(
                                    '<button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Edit administrator"><i class="fa fa-pencil"></i></button>',
                                    ['action' => 'edit', $administrator->id],
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