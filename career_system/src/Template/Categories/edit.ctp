<div class="row">
    <div class="col-lg-8">
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
                    echo $this->Form->input('parent_id', ['class' => 'form-control', 'options' => $parentCategories]);
                ?>
                <?= $this->Form->button(__('Submit'), ['class' => 'btn ink-reaction btn-raised btn-primary col-xs-12']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-head">
                <header><?= __('Actions') ?></header>
            </div>
            <div class="card-body no-padding">
                <ul class="list divider-full-bleed">
                    <li class="tile"><?= $this->Form->postLink(
                            '<div class="tile-icon"><i class="fa fa-dot-circle-o"></i></div>
                            <div class="tile-text">Delete</div>',
                            ['action' => 'delete', $category->id],
                            ['class' => 'tile-content ink-reaction', 'escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $category->id)]
                        )
                    ?>
                    </li>
                    <li class="tile"><?= $this->Html->link(
                            '<div class="tile-icon"><i class="fa fa-dot-circle-o"></i></div>
                            <div class="tile-text">List Categories</div>',
                            ['action' => 'index'],
                            ['class' => 'tile-content ink-reaction', 'escape' => false]) ?>
                    </li>
                    <li class="tile"><?= $this->Html->link(
                        '<div class="tile-icon"><i class="fa fa-dot-circle-o"></i></div>
                        <div class="tile-text">List Parent Categories</div>',
                        ['controller' => 'Categories', 'action' => 'index'],
                        ['class' => 'tile-content ink-reaction', 'escape' => false]
                        ) ?>
                    </li>
                    <li class="tile"><?= $this->Html->link(
                        '<div class="tile-icon"><i class="fa fa-dot-circle-o"></i></div>
                        <div class="tile-text">New Parent Category</div>',
                        ['controller' => 'Categories', 'action' => 'add'],
                        ['class' => 'tile-content ink-reaction', 'escape' => false]
                        ) ?>
                    </li>
                    <li class="tile"><?= $this->Html->link(
                        '<div class="tile-icon"><i class="fa fa-dot-circle-o"></i></div>
                        <div class="tile-text">List Posts</div>',
                        ['controller' => 'Posts', 'action' => 'index'],
                        ['class' => 'tile-content ink-reaction', 'escape' => false]
                        ) ?>
                    </li>
                    <li class="tile"><?= $this->Html->link(
                        '<div class="tile-icon"><i class="fa fa-dot-circle-o"></i></div>
                        <div class="tile-text">New Post</div>',
                        ['controller' => 'Posts', 'action' => 'add'],
                        ['class' => 'tile-content ink-reaction', 'escape' => false]
                        ) ?>
                    </li>
              </ul>
            </div>
        </div>
    </div>
</div>
