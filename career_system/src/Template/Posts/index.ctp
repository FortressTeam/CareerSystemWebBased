<?= $this->Html->script('libs/morissjs/morris.min') ?>
<?= $this->Html->script('libs/morissjs/raphael.min.js') ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-head">
                <header>Posts</header>
                <div class="tools">
                <?php
                    echo $this->Form->create('', [
                        'class' => 'form',
                        'templates' => [
                            'formGroup' => '{{input}}{{label}}',
                            'inputContainer' => '<div class="form-group floating-label  padd-0 marg-0 col-xs-10">{{content}}</div>'
                        ]
                    ]);
                    echo $this->Form->input('q', ['label' => '', 'class' => 'form-control', 'placeholder' => 'Search']);
                    echo $this->Form->button(
                        '<i class="fa fa-search"></i>',
                        ['type' => 'submit','class' => 'btn ink-reaction btn-flat btn-md'],
                        ['escape' => false]);
                    echo $this->Form->end();
                ?>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table cellpadding="0" cellspacing="0" class="table">
                        <thead>
                            <tr>
                                <th class="col-xs-5"><?= $this->Paginator->sort('post_title', ['label' => 'Title']) ?></th>
                                <th class="col-xs-2"><?= $this->Paginator->sort('hiring_manager_id', ['label' => 'Hiring Manager']) ?></th>
                                <th class="col-xs-2"><?= $this->Paginator->sort('post_date', ['label' => 'Date']) ?></th>
                                <th class="col-xs-1"><?= $this->Paginator->sort('post_status', ['label' => 'Status']) ?></th>
                                <th class="actions text-right col-xs-2"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($posts as $post): ?>
                            <tr>
                                <td><?= 
                                    $this->Html->link(h($post->post_title),
                                    ['action' => 'view', 'slug' => Cake\Utility\Inflector::slug($post->post_title), 'id' => $post->id],
                                    ['escape' => false]) ?></td>
                                <td><?= $post->has('hiring_manager') ? $this->Html->link($post->hiring_manager->hiring_manager_name, ['controller' => 'HiringManagers', 'action' => 'view', $post->hiring_manager->id]) : '' ?></td>
                                <td><?= h($post->post_date->format('d-M-y')) ?></td>
                                <td><?= $post->post_status ? '<span class="label label-primary col-xs-12">Active</span>' : '<span class="label label-warning col-xs-12">Pending</span>' ?></td>
                                <td class="actions text-right">
                                <?= $this->Html->link(
                                    '<button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="View post"><i class="fa fa-info"></i></button>',
                                    ['action' => 'view', 'slug' => Cake\Utility\Inflector::slug($post->post_title), 'id' => $post->id],
                                    ['escape' => false]) ?>
                                <?= $this->Html->link(
                                    '<button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Edit post"><i class="fa fa-pencil"></i></button>',
                                    ['action' => 'edit', $post->id],
                                    ['escape' => false]) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="paginator">
                    <ul class="pagination">
                        <?= $this->Paginator->prev('<i class="fa fa-angle-left"></i> ',
                        ['escape' => false]) ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next('<i class="fa fa-angle-right"></i>',
                        ['escape' => false]) ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php if((isset($loggedUser['group_id'])) && ($loggedUser['group_id'] == '1')): ?>
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-3 col-sm-12">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="card">
                            <div class="card-body no-padding">
                                <div class="alert alert-callout alert-info no-margin">
                                    <h1 class="pull-right text-info"><i class="fa fa-tags"></i></h1>
                                    <strong class="text-xl"><?= $countCats->first()->count ?> Categoies</strong><br>
                                    <span class="opacity-50">Total categories on the system</span>
                                </div>
                            </div><!--end .card-body -->
                        </div><!--end .card -->
                    </div>
                    <div class="col-xs-12">
                        <div class="card">
                            <div class="card-body no-padding">
                                <div class="alert alert-callout alert-info no-margin">
                                    <h1 class="pull-right text-info"><i class="fa fa-thumb-tack"></i></h1>
                                    <strong class="text-xl"><?= $countPosts->first()->count ?> Posts</strong><br>
                                    <span class="opacity-50">Total posts on the system   </span>
                                </div>
                            </div><!--end .card-body -->
                        </div><!--end .card -->
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-12">
                <div class="card">
                    <div class="card-head">
                        <header>Post history</header>
                    </div>
                    <div class="card-body">
                        <div id="lineChart" data-url="<?= $this->Url->build('/api/posts/this_year'); ?>"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <div class="fab_wrapper">
        <?= $this->Html->link(
            '<button class="btn ink-reaction btn-floating-action btn-fix-bottom btn-lg btn-primary"><i class="fa fa-plus"></i></button>',
            ['action' => 'add'],
            ['escape' => false]) ?>
    </div>
</div>