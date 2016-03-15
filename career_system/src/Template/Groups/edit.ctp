<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-head style-primary">
                <header>Create a groups</header>
            </div>
            <div class="card-body">
                <?= $this->Form->create($group, [
                        'class' => 'form',
                        'templates' => [
                            'formGroup' => '{{input}}{{label}}',
                            'inputContainer' => '<div class="form-group floating-label">{{content}}</div>'
                        ]
                    ])
                ?>
                <?php
                    echo $this->Form->input('group_name', ['class' => 'form-control']);
                    echo $this->Form->input('group_description', ['class' => 'form-control']);
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
                            ['action' => 'delete', $group->id],
                            ['class' => 'tile-content ink-reaction', 'escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $group->id)]
                        )
                    ?>
                    </li>
                    <li class="tile"><?= $this->Html->link(
                            '<div class="tile-icon"><i class="fa fa-dot-circle-o"></i></div>
                            <div class="tile-text">List Groups</div>',
                            ['action' => 'index'],
                            ['class' => 'tile-content ink-reaction', 'escape' => false]) ?>
                    </li>
                    <li class="tile"><?= $this->Html->link(
                        '<div class="tile-icon"><i class="fa fa-dot-circle-o"></i></div>
                        <div class="tile-text">List Users</div>',
                        ['controller' => 'Users', 'action' => 'index'],
                        ['class' => 'tile-content ink-reaction', 'escape' => false]
                        ) ?>
                    </li>
                    <li class="tile"><?= $this->Html->link(
                        '<div class="tile-icon"><i class="fa fa-dot-circle-o"></i></div>
                        <div class="tile-text">New User</div>',
                        ['controller' => 'Users', 'action' => 'add'],
                        ['class' => 'tile-content ink-reaction', 'escape' => false]
                        ) ?>
                    </li>
              </ul>
            </div>
        </div>
    </div>
</div>
