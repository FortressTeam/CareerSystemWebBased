<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-head style-primary">
                <header>Create a majors</header>
            </div>
            <div class="card-body">
                <?= $this->Form->create($major, [
                        'class' => 'form',
                        'templates' => [
                            'formGroup' => '{{input}}{{label}}',
                            'nestingLabel' => '<div class="checkbox checkbox-styled"><label{{attrs}}>{{input}}<span>{{text}}</span></label></div>',
                            'inputContainer' => '<div class="form-group floating-label">{{content}}</div>'
                        ]
                    ])
                ?>
                <?php
                    echo $this->Form->input('major_name', ['class' => 'form-control']);
                    echo $this->Form->input('major_description', ['class' => 'form-control']);
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
                        <h4><b>Delete this major</b></h4>
                        Once you delete a major, there is no going back. Please be certain.
                    </div>
                    <div class="col-md-4">
                        <?= $this->Form->postLink(
                                'Delete',
                                ['action' => 'delete', $major->id],
                                ['class' => 'btn ink-reaction btn-flat btn-danger col-xs-12', 'escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $major->id)]
                            )
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
