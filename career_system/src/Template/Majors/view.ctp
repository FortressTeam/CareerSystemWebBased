<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Major'), ['action' => 'edit', $major->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Major'), ['action' => 'delete', $major->id], ['confirm' => __('Are you sure you want to delete # {0}?', $major->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Majors'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Major'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Applicants'), ['controller' => 'Applicants', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Applicant'), ['controller' => 'Applicants', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="majors view large-9 medium-8 columns content">
    <h3><?= h($major->major_name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Major Name') ?></th>
            <td><?= h($major->major_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($major->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Major Description') ?></h4>
        <?= $this->Text->autoParagraph(h($major->major_description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Applicants') ?></h4>
        <?php if (!empty($major->applicants)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Applicant Name') ?></th>
                <th><?= __('Applicant Phone Number') ?></th>
                <th><?= __('Applicant Date Of Birth') ?></th>
                <th><?= __('Applicant Sex') ?></th>
                <th><?= __('Applicant Address') ?></th>
                <th><?= __('Applicant About') ?></th>
                <th><?= __('Applicant Marital Status') ?></th>
                <th><?= __('Applicant Objective') ?></th>
                <th><?= __('Applicant Website') ?></th>
                <th><?= __('Applicant Status') ?></th>
                <th><?= __('Major Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($major->applicants as $applicants): ?>
            <tr>
                <td><?= h($applicants->id) ?></td>
                <td><?= h($applicants->applicant_name) ?></td>
                <td><?= h($applicants->applicant_phone_number) ?></td>
                <td><?= h($applicants->applicant_date_of_birth) ?></td>
                <td><?= h($applicants->applicant_sex) ?></td>
                <td><?= h($applicants->applicant_address) ?></td>
                <td><?= h($applicants->applicant_about) ?></td>
                <td><?= h($applicants->applicant_marital_status) ?></td>
                <td><?= h($applicants->applicant_objective) ?></td>
                <td><?= h($applicants->applicant_website) ?></td>
                <td><?= h($applicants->applicant_status) ?></td>
                <td><?= h($applicants->major_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Applicants', 'action' => 'view', $applicants->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Applicants', 'action' => 'edit', $applicants->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Applicants', 'action' => 'delete', $applicants->id], ['confirm' => __('Are you sure you want to delete # {0}?', $applicants->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
