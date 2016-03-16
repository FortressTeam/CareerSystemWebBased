<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-head style-primary">
                <header>List Posts</header>
                <div class="tools">
                    <div class="btn-group">
                        <a class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Create new post"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table cellpadding="0" cellspacing="0" class="table table-condensed table-hover no-margin">
                        <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('id') ?></th>
                                <th><?= $this->Paginator->sort('post_title') ?></th>
                                <th><?= $this->Paginator->sort('post_salary') ?></th>
                                <th><?= $this->Paginator->sort('post_location') ?></th>
                                <th><?= $this->Paginator->sort('post_date') ?></th>
                                <th><?= $this->Paginator->sort('post_status') ?></th>
                                <th><?= $this->Paginator->sort('category_id') ?></th>
                                <th><?= $this->Paginator->sort('hiring_manager_id') ?></th>
                                <th class="actions text-right"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($posts as $post): ?>
                            <tr>
                                <td><?= $this->Number->format($post->id) ?></td>
                                <td><?= h($post->post_title) ?></td>
                                <td><?= $this->Number->format($post->post_salary) ?></td>
                                <td><?= h($post->post_location) ?></td>
                                <td><?= h($post->post_date) ?></td>
                                <td><?= h($post->post_status) ?></td>
                                <td><?= $post->has('category') ? $this->Html->link($post->category->category_name, ['controller' => 'Categories', 'action' => 'view', $post->category->id]) : '' ?></td>
                                <td><?= $post->has('hiring_manager') ? $this->Html->link($post->hiring_manager->hiring_manager_name, ['controller' => 'HiringManagers', 'action' => 'view', $post->hiring_manager->id]) : '' ?></td>
                                <td class="actions text-right">
                                <?= $this->Html->link(
                                    '<button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="View post"><i class="fa fa-info"></i></button>',
                                    ['action' => 'view', $post->id],
                                    ['escape' => false]) ?>
                                <?= $this->Html->link(
                                    '<button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Edit post"><i class="fa fa-pencil"></i></button>',
                                    ['action' => 'edit', $post->id],
                                    ['escape' => false]) ?>
                                <?= $this->Form->postLink(
                                    '<button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Delete post"><i class="fa fa-trash"></i></button>', 
                                    ['action' => 'delete', $post->id],
                                    ['confirm' => __('Are you sure you want to delete # {0}?', $post->id), 'escape' => false]) ?>
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
                    <p><?= $this->Paginator->counter() ?></p>
                </div>
            </div>
        </div>
    </div>

<!--     <div class="col-lg-4">
        <div class="card">
            <div class="card-head">
                <header><?= __('Actions') ?></header>
            </div>
            <div class="card-body no-padding">
                <ul class="list divider-full-bleed">
                    <li class="tile"><?= $this->Html->link(
                        '<div class="tile-icon"><i class="fa fa-dot-circle-o"></i></div>
                        <div class="tile-text">New Post</div>',
                        ['action' => 'add'],
                        ['class' => 'tile-content ink-reaction', 'escape' => false]) ?>
                    </li>
                    <li class="tile"><?= $this->Html->link(
                        '<div class="tile-icon"><i class="fa fa-dot-circle-o"></i></div>
                        <div class="tile-text">List Categories</div>',
                        ['controller' => 'Categories', 'action' => 'index'],
                        ['class' => 'tile-content ink-reaction', 'escape' => false]) ?>
                    </li>
                    <li class="tile"><?= $this->Html->link(
                        '<div class="tile-icon"><i class="fa fa-dot-circle-o"></i></div>
                        <div class="tile-text">New Category</div>',
                        ['controller' => 'Categories', 'action' => 'add'],
                        ['class' => 'tile-content ink-reaction', 'escape' => false]) ?>
                    </li>
                    <li class="tile"><?= $this->Html->link(
                        '<div class="tile-icon"><i class="fa fa-dot-circle-o"></i></div>
                        <div class="tile-text">List Hiring Managers</div>',
                        ['controller' => 'HiringManagers', 'action' => 'index'],
                        ['class' => 'tile-content ink-reaction', 'escape' => false]) ?>
                    </li>
                    <li class="tile"><?= $this->Html->link(
                        '<div class="tile-icon"><i class="fa fa-dot-circle-o"></i></div>
                        <div class="tile-text">New Hiring Manager</div>',
                        ['controller' => 'HiringManagers', 'action' => 'add'],
                        ['class' => 'tile-content ink-reaction', 'escape' => false]) ?>
                    </li>
                    <li class="tile"><?= $this->Html->link(
                        '<div class="tile-icon"><i class="fa fa-dot-circle-o"></i></div>
                        <div class="tile-text">List Applicants Follow Posts</div>',
                        ['controller' => 'ApplicantsFollowPosts', 'action' => 'index'],
                        ['class' => 'tile-content ink-reaction', 'escape' => false]) ?>
                    </li>
                    <li class="tile"><?= $this->Html->link(
                        '<div class="tile-icon"><i class="fa fa-dot-circle-o"></i></div>
                        <div class="tile-text">New Applicants Follow Post</div>',
                        ['controller' => 'ApplicantsFollowPosts', 'action' => 'add'],
                        ['class' => 'tile-content ink-reaction', 'escape' => false]) ?>
                    </li>
                    <li class="tile"><?= $this->Html->link(
                        '<div class="tile-icon"><i class="fa fa-dot-circle-o"></i></div>
                        <div class="tile-text">List Posts Has Curriculum Vitaes</div>',
                        ['controller' => 'PostsHasCurriculumVitaes', 'action' => 'index'],
                        ['class' => 'tile-content ink-reaction', 'escape' => false]) ?>
                    </li>
                    <li class="tile"><?= $this->Html->link(
                        '<div class="tile-icon"><i class="fa fa-dot-circle-o"></i></div>
                        <div class="tile-text">New Posts Has Curriculum Vitae</div>',
                        ['controller' => 'PostsHasCurriculumVitaes', 'action' => 'add'],
                        ['class' => 'tile-content ink-reaction', 'escape' => false]) ?>
                    </li>
                </ul>
            </div>
        </div>
    </div> -->
</div>