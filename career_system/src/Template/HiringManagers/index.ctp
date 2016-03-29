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
                                <th><?= $this->Paginator->sort('company_name') ?></th>
                                <th><?= $this->Paginator->sort('company_address') ?></th>
                                <th><?= $this->Paginator->sort('company_email') ?></th>
                                <th class="actions text-right"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($hiringManagers as $hiringManager): ?>
                            <tr>
                                <td><?= $this->Number->format($hiringManager->id) ?></td>
                                <td><?= h($hiringManager->hiring_manager_name) ?></td>
                                <td><?= h($hiringManager->company_name) ?></td>
                                <td><?= h($hiringManager->company_address) ?></td>
                                <td><?= h($hiringManager->company_email) ?></td>
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
            '<button class="btn btn_fab btn-primary"><i class="fa fa-plus"></i></button>',
            ['action' => 'add'],
            ['escape' => false]) ?>
    </div>
</div>