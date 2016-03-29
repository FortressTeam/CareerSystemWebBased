<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Skill'), ['action' => 'edit', $skill->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Skill'), ['action' => 'delete', $skill->id], ['confirm' => __('Are you sure you want to delete # {0}?', $skill->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Skills'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Skill'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Applicants Has Skills'), ['controller' => 'ApplicantsHasSkills', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Applicants Has Skill'), ['controller' => 'ApplicantsHasSkills', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="skills view large-9 medium-8 columns content">
    <h3><?= h($skill->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Skill Name') ?></th>
            <td><?= h($skill->skill_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($skill->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Skill Type Id') ?></th>
            <td><?= $this->Number->format($skill->skill_type_id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Applicants Has Skills') ?></h4>
        <?php if (!empty($skill->applicants_has_skills)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Applicant Id') ?></th>
                <th><?= __('Skill Id') ?></th>
                <th><?= __('Skill Level') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($skill->applicants_has_skills as $applicantsHasSkills): ?>
            <tr>
                <td><?= h($applicantsHasSkills->applicant_id) ?></td>
                <td><?= h($applicantsHasSkills->skill_id) ?></td>
                <td><?= h($applicantsHasSkills->skill_level) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ApplicantsHasSkills', 'action' => 'view', $applicantsHasSkills->applicant_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ApplicantsHasSkills', 'action' => 'edit', $applicantsHasSkills->applicant_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ApplicantsHasSkills', 'action' => 'delete', $applicantsHasSkills->applicant_id], ['confirm' => __('Are you sure you want to delete # {0}?', $applicantsHasSkills->applicant_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
