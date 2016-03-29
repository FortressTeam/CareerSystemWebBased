<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-head style-primary">
                <header>List Applicants</header>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table cellpadding="0" cellspacing="0" class="table table-condensed table-hover no-margin">
                        <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('id') ?></th>
                                <th><?= $this->Paginator->sort('applicant_name') ?></th>
                                <th><?= $this->Paginator->sort('applicant_phone_number') ?></th>
                                <th><?= $this->Paginator->sort('applicant_date_of_birth') ?></th>
                                <th><?= $this->Paginator->sort('applicant_address') ?></th>
                                <th><?= $this->Paginator->sort('applicant_status') ?></th>
                                <th class="actions text-right"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($applicants as $applicant): ?>
                            <tr>
                                <td><?= $this->Number->format($applicant->id) ?></td>
                                <td><?= h($applicant->applicant_name) ?></td>
                                <td><?= h($applicant->applicant_phone_number) ?></td>
                                <td><?= h($applicant->applicant_date_of_birth->format('d-M-Y')) ?></td>
                                <td><?= h($applicant->applicant_address) ?></td>
                                <td><?= $applicant->applicant_status ? '<span class="label label-success">Active</span>' : '<span class="label label-warning">Pending</span>' ?></td>
                                <td class="actions text-right">
                                <?= $this->Html->link(
                                    '<button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="View applicant"><i class="fa fa-info"></i></button>',
                                    ['action' => 'view', $applicant->id],
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