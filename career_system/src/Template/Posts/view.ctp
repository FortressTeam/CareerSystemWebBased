<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Post'), ['action' => 'edit', $post->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Post'), ['action' => 'delete', $post->id], ['confirm' => __('Are you sure you want to delete # {0}?', $post->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Posts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Post'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Hiring Managers'), ['controller' => 'HiringManagers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Hiring Manager'), ['controller' => 'HiringManagers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Applicants Follow Posts'), ['controller' => 'ApplicantsFollowPosts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Applicants Follow Post'), ['controller' => 'ApplicantsFollowPosts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Posts Has Curriculum Vitaes'), ['controller' => 'PostsHasCurriculumVitaes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Posts Has Curriculum Vitae'), ['controller' => 'PostsHasCurriculumVitaes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="posts view large-9 medium-8 columns content">
    <h3><?= h($post->post_title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Post Title') ?></th>
            <td><?= h($post->post_title) ?></td>
        </tr>
        <tr>
            <th><?= __('Post Location') ?></th>
            <td><?= h($post->post_location) ?></td>
        </tr>
        <tr>
            <th><?= __('Category') ?></th>
            <td><?= $post->has('category') ? $this->Html->link($post->category->category_name, ['controller' => 'Categories', 'action' => 'view', $post->category->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Hiring Manager') ?></th>
            <td><?= $post->has('hiring_manager') ? $this->Html->link($post->hiring_manager->hiring_manager_name, ['controller' => 'HiringManagers', 'action' => 'view', $post->hiring_manager->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($post->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Post Salary') ?></th>
            <td><?= $this->Number->format($post->post_salary) ?></td>
        </tr>
        <tr>
            <th><?= __('Post Date') ?></th>
            <td><?= h($post->post_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Post Status') ?></th>
            <td><?= $post->post_status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Post Content') ?></h4>
        <?= $this->Text->autoParagraph(h($post->post_content)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Applicants Follow Posts') ?></h4>
        <?php if (!empty($post->applicants_follow_posts)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Applicant Id') ?></th>
                <th><?= __('Post Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($post->applicants_follow_posts as $applicantsFollowPosts): ?>
            <tr>
                <td><?= h($applicantsFollowPosts->applicant_id) ?></td>
                <td><?= h($applicantsFollowPosts->post_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ApplicantsFollowPosts', 'action' => 'view', $applicantsFollowPosts->applicant_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ApplicantsFollowPosts', 'action' => 'edit', $applicantsFollowPosts->applicant_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ApplicantsFollowPosts', 'action' => 'delete', $applicantsFollowPosts->applicant_id], ['confirm' => __('Are you sure you want to delete # {0}?', $applicantsFollowPosts->applicant_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Posts Has Curriculum Vitaes') ?></h4>
        <?php if (!empty($post->posts_has_curriculum_vitaes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Post Id') ?></th>
                <th><?= __('Curriculum Vitae Id') ?></th>
                <th><?= __('Apply Status Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($post->posts_has_curriculum_vitaes as $postsHasCurriculumVitaes): ?>
            <tr>
                <td><?= h($postsHasCurriculumVitaes->post_id) ?></td>
                <td><?= h($postsHasCurriculumVitaes->curriculum_vitae_id) ?></td>
                <td><?= h($postsHasCurriculumVitaes->apply_status_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PostsHasCurriculumVitaes', 'action' => 'view', $postsHasCurriculumVitaes->post_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PostsHasCurriculumVitaes', 'action' => 'edit', $postsHasCurriculumVitaes->post_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PostsHasCurriculumVitaes', 'action' => 'delete', $postsHasCurriculumVitaes->post_id], ['confirm' => __('Are you sure you want to delete # {0}?', $postsHasCurriculumVitaes->post_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
