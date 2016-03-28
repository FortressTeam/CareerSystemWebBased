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
                                <th><?= $this->Paginator->sort('applicant_place_of_birth') ?></th>
                                <th><?= $this->Paginator->sort('applicant_sex') ?></th>
                                <th><?= $this->Paginator->sort('applicant_address') ?></th>
                                <th><?= $this->Paginator->sort('applicant_country') ?></th>
                                <th><?= $this->Paginator->sort('applicant_marital_status') ?></th>
                                <th><?= $this->Paginator->sort('applicant_website') ?></th>
                                <th><?= $this->Paginator->sort('applicant_status') ?></th>
                                <th><?= $this->Paginator->sort('career_path_id') ?></th>
                                <th class="actions text-right"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($applicants as $applicant): ?>
                            <tr>
                                <td><?= $this->Number->format($applicant->id) ?></td>
                                <td><?= h($applicant->applicant_name) ?></td>
                                <td><?= h($applicant->applicant_phone_number) ?></td>
                                <td><?= h($applicant->applicant_date_of_birth) ?></td>
                                <td><?= h($applicant->applicant_place_of_birth) ?></td>
                                <td><?= h($applicant->applicant_sex) ?></td>
                                <td><?= h($applicant->applicant_address) ?></td>
                                <td><?= h($applicant->applicant_country) ?></td>
                                <td><?= h($applicant->applicant_marital_status) ?></td>
                                <td><?= h($applicant->applicant_website) ?></td>
                                <td><?= h($applicant->applicant_status) ?></td>
                                <td><?= $applicant->has('career_path') ? $this->Html->link($applicant->career_path->id, ['controller' => 'CareerPaths', 'action' => 'view', $applicant->career_path->id]) : '' ?></td>
                                <td class="actions text-right">
                                <?= $this->Html->link(
                                    '<button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="View applicant"><i class="fa fa-info"></i></button>',
                                    ['action' => 'view', $applicant->id],
                                    ['escape' => false]) ?>
                                <?= $this->Html->link(
                                    '<button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Edit applicant"><i class="fa fa-pencil"></i></button>',
                                    ['action' => 'edit', $applicant->id],
                                    ['escape' => false]) ?>
                                <?= $this->Form->postLink(
                                    '<button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Delete applicant"><i class="fa fa-trash"></i></button>', 
                                    ['action' => 'delete', $applicant->id],
                                    ['confirm' => __('Are you sure you want to delete # {0}?', $applicant->id), 'escape' => false]) ?>
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