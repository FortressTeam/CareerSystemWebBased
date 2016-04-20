<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-head style-primary">
                <header>Create a administrators</header>
            </div>
            <div class="card-body">
                <?= $this->Form->create($administrator, [
                        'class' => 'form',
                        'templates' => [
                            'formGroup' => '{{input}}{{label}}',
                            'nestingLabel' => '<div class="checkbox checkbox-styled"><label{{attrs}}>{{input}}<span>{{text}}</span></label></div>',
                            'inputContainer' => '<div class="form-group floating-label">{{content}}</div>'
                        ]
                    ])
                ?>
                <?php
                    echo $this->Form->input('administrator_name', ['class' => 'form-control']);
                    echo $this->Form->input('administrator_phone_number', ['class' => 'form-control']);
                    echo $this->Form->input('administrator_date_of_birth', ['class' => 'form-control', 'empty' => true]);
                    echo $this->Form->input('administrator_address', ['class' => 'form-control']);
                ?>
                <?= $this->Form->button(__('Submit'), ['class' => 'btn ink-reaction btn-raised btn-primary btn-block']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
