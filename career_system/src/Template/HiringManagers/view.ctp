<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Hiring Manager'), ['action' => 'edit', $hiringManager->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Hiring Manager'), ['action' => 'delete', $hiringManager->id], ['confirm' => __('Are you sure you want to delete # {0}?', $hiringManager->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Hiring Managers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Hiring Manager'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Appointments'), ['controller' => 'Appointments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Appointment'), ['controller' => 'Appointments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Follow'), ['controller' => 'Follow', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Follow'), ['controller' => 'Follow', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Posts'), ['controller' => 'Posts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Post'), ['controller' => 'Posts', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="hiringManagers view large-9 medium-8 columns content">
    <h3><?= h($hiringManager->hiring_manager_name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Hiring Manager Name') ?></th>
            <td><?= h($hiringManager->hiring_manager_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Hiring Manager Phone Number') ?></th>
            <td><?= h($hiringManager->hiring_manager_phone_number) ?></td>
        </tr>
        <tr>
            <th><?= __('Company Name') ?></th>
            <td><?= h($hiringManager->company_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Company Address') ?></th>
            <td><?= h($hiringManager->company_address) ?></td>
        </tr>
        <tr>
            <th><?= __('Company Logo') ?></th>
            <td><?= h($hiringManager->company_logo) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($hiringManager->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Company Size') ?></th>
            <td><?= $this->Number->format($hiringManager->company_size) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Company About') ?></h4>
        <?= $this->Text->autoParagraph(h($hiringManager->company_about)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Appointments') ?></h4>
        <?php if (!empty($hiringManager->appointments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Appointment Name') ?></th>
                <th><?= __('Appointment Description') ?></th>
                <th><?= __('Appointment Start') ?></th>
                <th><?= __('Appointment End') ?></th>
                <th><?= __('Appointment Address') ?></th>
                <th><?= __('Appointment SMS Alert') ?></th>
                <th><?= __('Hiring Manager Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($hiringManager->appointments as $appointments): ?>
            <tr>
                <td><?= h($appointments->id) ?></td>
                <td><?= h($appointments->appointment_name) ?></td>
                <td><?= h($appointments->appointment_description) ?></td>
                <td><?= h($appointments->appointment_start) ?></td>
                <td><?= h($appointments->appointment_end) ?></td>
                <td><?= h($appointments->appointment_address) ?></td>
                <td><?= h($appointments->appointment_SMS_alert) ?></td>
                <td><?= h($appointments->hiring_manager_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Appointments', 'action' => 'view', $appointments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Appointments', 'action' => 'edit', $appointments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Appointments', 'action' => 'delete', $appointments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appointments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Follow') ?></h4>
        <?php if (!empty($hiringManager->follow)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Hiring Manager Id') ?></th>
                <th><?= __('Applicant Id') ?></th>
                <th><?= __('Follow Hiring Manager') ?></th>
                <th><?= __('Follow Applicant') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($hiringManager->follow as $follow): ?>
            <tr>
                <td><?= h($follow->hiring_manager_id) ?></td>
                <td><?= h($follow->applicant_id) ?></td>
                <td><?= h($follow->follow_hiring_manager) ?></td>
                <td><?= h($follow->follow_applicant) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Follow', 'action' => 'view', $follow->hiring_manager_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Follow', 'action' => 'edit', $follow->hiring_manager_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Follow', 'action' => 'delete', $follow->hiring_manager_id], ['confirm' => __('Are you sure you want to delete # {0}?', $follow->hiring_manager_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Posts') ?></h4>
        <?php if (!empty($hiringManager->posts)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Post Title') ?></th>
                <th><?= __('Post Content') ?></th>
                <th><?= __('Post Salary') ?></th>
                <th><?= __('Post Location') ?></th>
                <th><?= __('Post Date') ?></th>
                <th><?= __('Post Status') ?></th>
                <th><?= __('Category Id') ?></th>
                <th><?= __('Hiring Manager Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($hiringManager->posts as $posts): ?>
            <tr>
                <td><?= h($posts->id) ?></td>
                <td><?= h($posts->post_title) ?></td>
                <td><?= h($posts->post_content) ?></td>
                <td><?= h($posts->post_salary) ?></td>
                <td><?= h($posts->post_location) ?></td>
                <td><?= h($posts->post_date) ?></td>
                <td><?= h($posts->post_status) ?></td>
                <td><?= h($posts->category_id) ?></td>
                <td><?= h($posts->hiring_manager_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Posts', 'action' => 'view', $posts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Posts', 'action' => 'edit', $posts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Posts', 'action' => 'delete', $posts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $posts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
