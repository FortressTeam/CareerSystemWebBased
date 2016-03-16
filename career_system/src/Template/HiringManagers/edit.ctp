<div class="row">
    <div class="col-lg-8">
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
                    echo $this->Form->input('company_size', ['class' => 'form-control']);
                    echo $this->Form->input('company_about', ['class' => 'form-control']);
                    echo $this->Form->input('company_logo', ['class' => 'form-control']);
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
                            ['action' => 'delete', $hiringManager->id],
                            ['class' => 'tile-content ink-reaction', 'escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $hiringManager->id)]
                        )
                    ?>
                    </li>
                    <li class="tile"><?= $this->Html->link(
                            '<div class="tile-icon"><i class="fa fa-dot-circle-o"></i></div>
                            <div class="tile-text">List Hiring Managers</div>',
                            ['action' => 'index'],
                            ['class' => 'tile-content ink-reaction', 'escape' => false]) ?>
                    </li>
                    <li class="tile"><?= $this->Html->link(
                        '<div class="tile-icon"><i class="fa fa-dot-circle-o"></i></div>
                        <div class="tile-text">List Appointments</div>',
                        ['controller' => 'Appointments', 'action' => 'index'],
                        ['class' => 'tile-content ink-reaction', 'escape' => false]
                        ) ?>
                    </li>
                    <li class="tile"><?= $this->Html->link(
                        '<div class="tile-icon"><i class="fa fa-dot-circle-o"></i></div>
                        <div class="tile-text">New Appointment</div>',
                        ['controller' => 'Appointments', 'action' => 'add'],
                        ['class' => 'tile-content ink-reaction', 'escape' => false]
                        ) ?>
                    </li>
                    <li class="tile"><?= $this->Html->link(
                        '<div class="tile-icon"><i class="fa fa-dot-circle-o"></i></div>
                        <div class="tile-text">List Follow</div>',
                        ['controller' => 'Follow', 'action' => 'index'],
                        ['class' => 'tile-content ink-reaction', 'escape' => false]
                        ) ?>
                    </li>
                    <li class="tile"><?= $this->Html->link(
                        '<div class="tile-icon"><i class="fa fa-dot-circle-o"></i></div>
                        <div class="tile-text">New Follow</div>',
                        ['controller' => 'Follow', 'action' => 'add'],
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
