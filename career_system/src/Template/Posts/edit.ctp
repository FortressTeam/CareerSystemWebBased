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
                    echo $this->Form->input('post_content', ['id' => 'summernote']);
                    echo $this->Form->input('post_salary', ['class' => 'form-control']);
                    echo $this->Form->input('post_location', ['class' => 'form-control']);
                    echo $this->Form->input('category_id', ['class' => 'form-control findable', 'options' => $categories]);
                    echo $this->Form->input('hiring_manager_id', ['class' => 'form-control', 'options' => $hiringManagers]);
                ?>
                <?= $this->Form->button(__('Submit'), ['class' => 'btn ink-reaction btn-raised btn-primary col-xs-12']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-head style-primary">
                <header>Control</header>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-6">
                        <h4><b>Active</b></h4>
                    </div>
                    <div class="col-xs-6">
                        <?= $this->Form->button(
                            $post->post_status ? 'ON' : 'OFF',
                            [
                                'type' => 'button',
                                'class' => ($post->post_status ? 'btn-primary' : 'btn-default') . ' btn ink-reaction btn-block',
                                'id' => 'buttonChangeStatus',
                                'data-controller' => 'posts',
                                'data-id' => $post->id,
                                'data-field' => 'post_status',
                                'data-value' => $post->post_status ? '0' : '1',
                            ]
                        ) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-head style-danger">
                <header>Danger Zone</header>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <h4><b>Delete this post</b></h4>
                    </div>
                    <div class="col-md-4">
                        <?= $this->Form->postLink(
                                'Delete',
                                ['action' => 'delete', $post->id],
                                ['class' => 'btn ink-reaction btn-flat btn-danger col-xs-12', 'escape' => false, 'confirm' => __('Once you delete a applicant, there is no going back. Are you sure you want to delete # {0}?', $post->id)]
                            )
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>
