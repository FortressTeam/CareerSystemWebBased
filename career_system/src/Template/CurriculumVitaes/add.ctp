<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-head style-primary">
                <header>Create a curriculumVitaes</header>
            </div>
            <div class="card-body">
                <?= $this->Form->create($curriculumVitae, [
                        'class' => 'form',
                        'templates' => [
                            'formGroup' => '{{input}}{{label}}',
                            'nestingLabel' => '<div class="checkbox checkbox-styled"><label{{attrs}}>{{input}}<span>{{text}}</span></label></div>',
                            'inputContainer' => '<div class="form-group floating-label">{{content}}</div>'
                        ]
                    ])
                ?>
                <?php
                    echo $this->Form->input('applicant_id', ['class' => 'form-control', 'options' => $applicants]);
                    echo $this->Form->input('curriculum_vitae_template_id', ['class' => 'form-control', 'options' => $curriculumVitaeTemplates]);
                    echo $this->Form->input('curriculum_vitae_data', ['class' => 'form-control']);
                ?>
                <?= $this->Form->button(__('Submit'), ['class' => 'btn ink-reaction btn-raised btn-primary btn-block']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
