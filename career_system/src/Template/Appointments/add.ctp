<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-head style-primary">
                <header>Create a appointments</header>
            </div>
            <div class="card-body">
                <?= $this->Form->create($appointment, [
                        'class' => 'form',
                        'templates' => [
                            'formGroup' => '{{input}}{{label}}',
                            'nestingLabel' => '<div class="checkbox checkbox-styled"><label{{attrs}}>{{input}}<span>{{text}}</span></label></div>',
                            'inputContainer' => '<div class="form-group floating-label">{{content}}</div>'
                        ]
                    ])
                ?>
                <?php
                    echo $this->Form->input('appointment_name', ['class' => 'form-control']);
                    echo $this->Form->input('appointment_description', ['class' => 'form-control']);
                    echo $this->Form->input('appointment_start', ['class' => 'form-control', 'empty' => true]);
                    echo $this->Form->input('appointment_end', ['class' => 'form-control', 'empty' => true]);
                    echo $this->Form->input('appointment_address', ['class' => 'form-control']);
                    echo $this->Form->input('appointment_SMS_alert', ['class' => 'form-control']);
                    echo $this->Form->input('hiring_manager_id', ['class' => 'form-control', 'options' => $hiringManagers]);
                ?>
                <?= $this->Form->button(__('Submit'), ['class' => 'btn ink-reaction btn-raised btn-primary btn-block']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
