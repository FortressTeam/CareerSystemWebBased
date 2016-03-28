<?= $this->Html->css('theme/libs/summernote/summernote') ?>
<?= $this->Html->script('libs/summernote/summernote') ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-head style-primary">
                <header>Create a posts</header>
            </div>
            <div class="card-body">
                <?= $this->Form->create($post, [
                        'class' => 'form',
                        'templates' => [
                            'formGroup' => '{{input}}{{label}}',
                            'nestingLabel' => '<div class="checkbox checkbox-styled"><label{{attrs}}>{{input}}<span>{{text}}</span></label></div>',
                            'inputContainer' => '<div class="form-group floating-label">{{content}}</div>'
                        ]
                    ])
                ?>
                <?php
                    echo $this->Form->input('post_title', ['class' => 'form-control']);
                    echo $this->Form->input('post_content', ['class' => 'form-control', 'id' => 'summernote']);
                    echo $this->Form->input('post_salary', ['class' => 'form-control']);
                    echo $this->Form->input('post_location', ['class' => 'form-control']);
                    echo $this->Form->input('post_status', ['class' => 'form-control']);
                    echo $this->Form->input('category_id', ['class' => 'form-control', 'options' => $categories]);
                    echo $this->Form->input('hiring_manager_id', ['class' => 'form-control', 'options' => $hiringManagers]);
                ?>
                <?= $this->Form->button(__('Submit'), ['class' => 'btn ink-reaction btn-raised btn-primary col-xs-12']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $( "#summernote" ).focus(function() {
            $( this ).removeClass("form-control");
            $( this ).summernote();
            $( ".note-editable" ).focus();  
        });
    });
</script>
