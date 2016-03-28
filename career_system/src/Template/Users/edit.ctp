<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-head style-primary">
                <header>Create a users</header>
            </div>
            <div class="card-body">
                <?= $this->Form->create($user, [
                        'class' => 'form',
                        'templates' => [
                            'formGroup' => '{{input}}{{label}}',
                            'nestingLabel' => '<div class="checkbox checkbox-styled"><label{{attrs}}>{{input}}<span>{{text}}</span></label></div>',
                            'inputContainer' => '<div class="form-group floating-label">{{content}}</div>'
                        ]
                    ])
                ?>
                <?php
                    echo $this->Form->input('username', ['class' => 'form-control']);
                    echo $this->Form->input('password', ['class' => 'form-control']);
                    echo $this->Form->input('user_email', ['class' => 'form-control']);
                    echo $this->Form->input('user_registered', ['class' => 'form-control']);
                    echo $this->Form->input('user_status', ['class' => 'form-control']);
                    echo $this->Form->input('user_activation_key', ['class' => 'form-control']);
                    echo $this->Form->input('user_avatar', ['class' => 'form-control']);
                    echo $this->Form->input('group_id', ['class' => 'form-control', 'options' => $groups]);
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
                                ['action' => 'delete', $user->id],
                                ['class' => 'btn ink-reaction btn-flat btn-danger col-xs-12', 'escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
                            )
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
