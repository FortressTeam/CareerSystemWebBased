<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-head style-primary">
                <header>Create a applicants</header>
            </div>
            <div class="card-body">
                <?= $this->Form->create($applicant, [
                        'class' => 'form',
                        'templates' => [
                            'formGroup' => '{{input}}{{label}}',
                            'nestingLabel' => '<div class="checkbox checkbox-styled"><label{{attrs}}>{{input}}<span>{{text}}</span></label></div>',
                            'inputContainer' => '<div class="form-group floating-label">{{content}}</div>'
                        ]
                    ])
                ?>
                <?php
                    echo $this->Form->input('applicant_name', ['class' => 'form-control']);
                    echo $this->Form->input('applicant_phone_number', ['class' => 'form-control']);
                    echo $this->Form->input('applicant_date_of_birth', ['class' => 'form-control']);
                    echo $this->Form->input('applicant_place_of_birth', ['class' => 'form-control']);
                    echo $this->Form->input('applicant_sex', ['class' => 'form-control']);
                    echo $this->Form->input('applicant_address', ['class' => 'form-control']);
                    echo $this->Form->input('applicant_country', ['class' => 'form-control']);
                    echo $this->Form->input('applicant_about', ['class' => 'form-control']);
                    echo $this->Form->input('applicant_marital_status', ['class' => 'form-control']);
                    echo $this->Form->input('applicant_objective', ['class' => 'form-control']);
                    echo $this->Form->input('applicant_website', ['class' => 'form-control']);
                    echo $this->Form->input('applicant_status', ['class' => 'form-control']);
                    echo $this->Form->input('major_id', ['class' => 'form-control', 'options' => $majors]);
                ?>
                <?= $this->Form->button(__('Submit'), ['class' => 'btn ink-reaction btn-raised btn-primary btn-block']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-head style-danger">
                <header>Danger Zone</header>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <h4><b>Delete this repository</b></h4>
                        Once you delete a repository, there is no going back. Please be certain.
                    </div>
                    <div class="col-md-4">
                        <?= $this->Form->postLink(
                                'Delete',
                                ['action' => 'delete', $applicant->id],
                                ['class' => 'btn ink-reaction btn-flat btn-danger col-xs-12', 'escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $applicant->id)]
                            )
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
