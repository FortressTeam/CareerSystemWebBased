<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Skill Type'), ['action' => 'edit', $skillType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Skill Type'), ['action' => 'delete', $skillType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $skillType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Skill Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Skill Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Skills'), ['controller' => 'Skills', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Skill'), ['controller' => 'Skills', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="skillTypes view large-9 medium-8 columns content">
    <h3><?= h($skillType->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Skill Type Name') ?></th>
            <td><?= h($skillType->skill_type_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Skill Type Description') ?></th>
            <td><?= h($skillType->skill_type_description) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($skillType->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Skills') ?></h4>
        <?php if (!empty($skillType->skills)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Skill Name') ?></th>
                <th><?= __('Skill Type Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($skillType->skills as $skills): ?>
            <tr>
                <td><?= h($skills->id) ?></td>
                <td><?= h($skills->skill_name) ?></td>
                <td><?= h($skills->skill_type_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Skills', 'action' => 'view', $skills->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Skills', 'action' => 'edit', $skills->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Skills', 'action' => 'delete', $skills->id], ['confirm' => __('Are you sure you want to delete # {0}?', $skills->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
