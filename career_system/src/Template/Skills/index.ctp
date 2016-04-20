<div class="row">
    <div class="col-md-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body no-padding">
                        <div class="alert alert-callout alert-info no-margin">
                            <h1 class="pull-right text-info"><i class="fa fa-tags"></i></h1>
                            <strong class="text-xl"><?= $countSkills->first()->count ?> Skills</strong><br>
                            <span class="opacity-50">Total skills on the system</span>
                        </div>
                    </div><!--end .card-body -->
                </div><!--end .card -->
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-head">
                        <header>Add a new skills</header>
                    </div>
                    <div class="card-body">
                        <?= $this->Form->create($skill, [
                                'url' => ['action' => 'add'],
                                'class' => 'form',
                                'templates' => [
                                    'formGroup' => '{{input}}{{label}}',
                                    'nestingLabel' => '<div class="checkbox checkbox-styled"><label{{attrs}}>{{input}}<span>{{text}}</span></label></div>',
                                    'inputContainer' => '<div class="form-group floating-label">{{content}}</div>'
                                ]
                            ])
                        ?>
                        <?php
                            echo $this->Form->input('skill_name', ['class' => 'form-control']);
                            echo $this->Form->input('skill_type_id', ['class' => 'form-control']);
                        ?>
                        <?= $this->Form->button(__('Submit'), ['class' => 'btn ink-reaction btn-raised btn-primary btn-block']) ?>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-head">
                <header>Skills</header>
                <div class="tools">
                <?php
                    echo $this->Form->create('', [
                        'class' => 'form',
                        'templates' => [
                            'formGroup' => '{{input}}{{label}}',
                            'inputContainer' => '<div class="form-group floating-label  padd-0 marg-0 col-xs-10">{{content}}</div>'
                        ]
                    ]);
                    echo $this->Form->input('q', ['label' => '', 'class' => 'form-control', 'placeholder' => 'Search']);
                    echo $this->Form->button(
                        '<i class="fa fa-search"></i>',
                        ['type' => 'submit','class' => 'btn ink-reaction btn-flat btn-md'],
                        ['escape' => false]);
                    echo $this->Form->end();
                ?>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table cellpadding="0" cellspacing="0" class="table table-condensed table-hover no-margin">
                        <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('id') ?></th>
                                <th><?= $this->Paginator->sort('skill_name') ?></th>
                                <th><?= $this->Paginator->sort('skill_type_id') ?></th>
                                <th class="actions text-right"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($skills as $skill): ?>
                            <tr>
                                <td><?= $this->Number->format($skill->id) ?></td>
                                <td><?= h($skill->skill_name) ?></td>
                                <td><?= $skill->has('skill_type') ? $skill->skill_type->skill_type_name : '' ?></td>
                                <td class="actions text-right">
                                <?= $this->Html->link(
                                    '<button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Edit skill"><i class="fa fa-pencil"></i></button>',
                                    ['action' => 'edit', $skill->id],
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
</div>