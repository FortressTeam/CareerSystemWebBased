<div class="row">
    <div class="col-lg-8">
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
                    echo $this->Form->input('post_content', ['class' => 'form-control']);
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
                            ['action' => 'delete', $post->id],
                            ['class' => 'tile-content ink-reaction', 'escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $post->id)]
                        )
                    ?>
                    </li>
                    <li class="tile"><?= $this->Html->link(
                            '<div class="tile-icon"><i class="fa fa-dot-circle-o"></i></div>
                            <div class="tile-text">List Posts</div>',
                            ['action' => 'index'],
                            ['class' => 'tile-content ink-reaction', 'escape' => false]) ?>
                    </li>
                    <li class="tile"><?= $this->Html->link(
                        '<div class="tile-icon"><i class="fa fa-dot-circle-o"></i></div>
                        <div class="tile-text">List Categories</div>',
                        ['controller' => 'Categories', 'action' => 'index'],
                        ['class' => 'tile-content ink-reaction', 'escape' => false]
                        ) ?>
                    </li>
                    <li class="tile"><?= $this->Html->link(
                        '<div class="tile-icon"><i class="fa fa-dot-circle-o"></i></div>
                        <div class="tile-text">New Category</div>',
                        ['controller' => 'Categories', 'action' => 'add'],
                        ['class' => 'tile-content ink-reaction', 'escape' => false]
                        ) ?>
                    </li>
                    <li class="tile"><?= $this->Html->link(
                        '<div class="tile-icon"><i class="fa fa-dot-circle-o"></i></div>
                        <div class="tile-text">List Hiring Managers</div>',
                        ['controller' => 'HiringManagers', 'action' => 'index'],
                        ['class' => 'tile-content ink-reaction', 'escape' => false]
                        ) ?>
                    </li>
                    <li class="tile"><?= $this->Html->link(
                        '<div class="tile-icon"><i class="fa fa-dot-circle-o"></i></div>
                        <div class="tile-text">New Hiring Manager</div>',
                        ['controller' => 'HiringManagers', 'action' => 'add'],
                        ['class' => 'tile-content ink-reaction', 'escape' => false]
                        ) ?>
                    </li>
                    <li class="tile"><?= $this->Html->link(
                        '<div class="tile-icon"><i class="fa fa-dot-circle-o"></i></div>
                        <div class="tile-text">List Applicants Follow Posts</div>',
                        ['controller' => 'ApplicantsFollowPosts', 'action' => 'index'],
                        ['class' => 'tile-content ink-reaction', 'escape' => false]
                        ) ?>
                    </li>
                    <li class="tile"><?= $this->Html->link(
                        '<div class="tile-icon"><i class="fa fa-dot-circle-o"></i></div>
                        <div class="tile-text">New Applicants Follow Post</div>',
                        ['controller' => 'ApplicantsFollowPosts', 'action' => 'add'],
                        ['class' => 'tile-content ink-reaction', 'escape' => false]
                        ) ?>
                    </li>
                    <li class="tile"><?= $this->Html->link(
                        '<div class="tile-icon"><i class="fa fa-dot-circle-o"></i></div>
                        <div class="tile-text">List Posts Has Curriculum Vitaes</div>',
                        ['controller' => 'PostsHasCurriculumVitaes', 'action' => 'index'],
                        ['class' => 'tile-content ink-reaction', 'escape' => false]
                        ) ?>
                    </li>
                    <li class="tile"><?= $this->Html->link(
                        '<div class="tile-icon"><i class="fa fa-dot-circle-o"></i></div>
                        <div class="tile-text">New Posts Has Curriculum Vitae</div>',
                        ['controller' => 'PostsHasCurriculumVitaes', 'action' => 'add'],
                        ['class' => 'tile-content ink-reaction', 'escape' => false]
                        ) ?>
                    </li>
              </ul>
            </div>
        </div>
    </div>
</div>
