<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-head">
                <header>Groups</header>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table cellpadding="0" cellspacing="0" class="table">
                        <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('id') ?></th>
                                <th><?= $this->Paginator->sort('group_name') ?></th>
                                <th><?= $this->Paginator->sort('description') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($groups as $group): ?>
                            <tr>
                                <td><?= $this->Number->format($group->id) ?></td>
                                <td><?= h($group->group_name) ?></td>
                                <td><?= h($group->group_description) ?></td>
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
</div>