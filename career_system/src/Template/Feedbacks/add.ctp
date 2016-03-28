<?= $this->Form->create($feedback, [
        'class' => 'form',
        'templates' => [
            'formGroup' => '{{input}}{{label}}',
            'nestingLabel' => '<div class="checkbox checkbox-styled"><label{{attrs}}>{{input}}<span>{{text}}</span></label></div>',
            'inputContainer' => '<div class="form-group">{{content}}</div>'
        ]
    ])
?>
<?php
    echo $this->Form->input('user_id', ['class' => 'form-control', 'type' => 'hidden', 'value' => 1]);
    echo $this->Form->input('feedback_type_id', ['class' => 'form-control', 'options' => $feedbackTypes]);
    echo $this->Form->input('feedback_title', ['class' => 'form-control']);
    echo $this->Form->input('feedback_comment', ['class' => 'form-control']);
?>
<?= $this->Form->button(__('Submit feedback'), ['class' => 'btn ink-reaction btn-raised btn-primary btn-block']) ?>
<?= $this->Form->end() ?>
