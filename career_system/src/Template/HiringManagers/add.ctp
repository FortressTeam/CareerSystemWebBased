<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-head style-primary">
                <header>Create a hiringManagers</header>
            </div>
            <div class="card-body">
                <?= $this->Form->create($hiringManager, [
                        'class' => 'form',
                        'templates' => [
                            'formGroup' => '{{input}}{{label}}',
                            'nestingLabel' => '<div class="checkbox checkbox-styled"><label{{attrs}}>{{input}}<span>{{text}}</span></label></div>',
                            'inputContainer' => '<div class="form-group floating-label">{{content}}</div>'
                        ]
                    ])
                ?>
                <?php
                    echo $this->Form->input('hiring_manager_name', ['class' => 'form-control']);
                    echo $this->Form->input('hiring_manager_phone_number', ['class' => 'form-control']);
                    echo $this->Form->input('company_name', ['class' => 'form-control']);
                    echo $this->Form->input('company_address', ['class' => 'form-control']);
                    echo $this->Form->input('company_email', ['class' => 'form-control']);
                    echo $this->Form->input('company_size', ['class' => 'form-control']);
                    echo $this->Form->input('company_about', ['class' => 'form-control']);
                    echo $this->Form->input('company_logo', ['class' => 'form-control']);
                ?>
                <?= $this->Form->button(__('Submit'), ['class' => 'btn ink-reaction btn-raised btn-primary btn-block']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
