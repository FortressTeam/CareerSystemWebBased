<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-head style-primary">
                <header>Create a categories</header>
            </div>
            <div class="card-body">
                <?= $this->Form->create($category, [
                        'class' => 'form',
                        'templates' => [
                            'formGroup' => '{{input}}{{label}}',
                            'nestingLabel' => '<div class="checkbox checkbox-styled"><label{{attrs}}>{{input}}<span>{{text}}</span></label></div>',
                            'inputContainer' => '<div class="form-group floating-label">{{content}}</div>'
                        ]
                    ])
                ?>
                <?php
                    echo $this->Form->input('category_name', ['class' => 'form-control']);
                    echo $this->Form->input('category_description', ['class' => 'form-control']);
                    echo $this->Form->input('parent_id', ['class' => 'form-control', 'options' => $parentCategories, 'empty' => true]);
                ?>
                <?= $this->Form->button(__('Submit'), ['class' => 'btn ink-reaction btn-raised btn-primary btn-block']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
