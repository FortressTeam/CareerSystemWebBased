<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-head style-primary">
                <header>List Curriculum Vitaes</header>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table cellpadding="0" cellspacing="0" class="table table-condensed table-hover no-margin">
                        <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('id') ?></th>
                                <th><?= $this->Paginator->sort('applicant_id') ?></th>
                                <th><?= $this->Paginator->sort('curriculum_vitae_template_id') ?></th>
                                <th class="actions text-right"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($curriculumVitaes as $curriculumVitae): ?>
                            <tr>
                                <td><?= $this->Number->format($curriculumVitae->id) ?></td>
                                <td><?= $curriculumVitae->has('applicant') ? $this->Html->link($curriculumVitae->applicant->applicant_name, ['controller' => 'Applicants', 'action' => 'view', $curriculumVitae->applicant->id]) : '' ?></td>
                                <td><?= $curriculumVitae->has('curriculum_vitae_template') ? $this->Html->link($curriculumVitae->curriculum_vitae_template->id, ['controller' => 'CurriculumVitaeTemplates', 'action' => 'view', $curriculumVitae->curriculum_vitae_template->id]) : '' ?></td>
                                <td class="actions text-right">
                                <?= $this->Html->link(
                                    '<button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="View curriculumVitae"><i class="fa fa-info"></i></button>',
                                    ['action' => 'view', $curriculumVitae->id],
                                    ['escape' => false]) ?>
                                <?= $this->Html->link(
                                    '<button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Edit curriculumVitae"><i class="fa fa-pencil"></i></button>',
                                    ['action' => 'edit', $curriculumVitae->id],
                                    ['escape' => false]) ?>
                                <?= $this->Form->postLink(
                                    '<button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Delete curriculumVitae"><i class="fa fa-trash"></i></button>', 
                                    ['action' => 'delete', $curriculumVitae->id],
                                    ['confirm' => __('Are you sure you want to delete # {0}?', $curriculumVitae->id), 'escape' => false]) ?>
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