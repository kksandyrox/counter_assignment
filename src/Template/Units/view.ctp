<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Unit $unit
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Unit'), ['action' => 'edit', $unit->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Unit'), ['action' => 'delete', $unit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $unit->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Units'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Unit'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Counters'), ['controller' => 'UserCounters', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Counter'), ['controller' => 'UserCounters', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="units view large-9 medium-8 columns content">
    <h3><?= h($unit->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($unit->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $unit->has('user') ? $this->Html->link($unit->user->id, ['controller' => 'Users', 'action' => 'view', $unit->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($unit->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Custom') ?></th>
            <td><?= $this->Number->format($unit->is_custom) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($unit->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($unit->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related User Counters') ?></h4>
        <?php if (!empty($unit->user_counters)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Counter Id') ?></th>
                <th scope="col"><?= __('Unit Id') ?></th>
                <th scope="col"><?= __('Quantity') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($unit->user_counters as $userCounters): ?>
            <tr>
                <td><?= h($userCounters->id) ?></td>
                <td><?= h($userCounters->user_id) ?></td>
                <td><?= h($userCounters->counter_id) ?></td>
                <td><?= h($userCounters->unit_id) ?></td>
                <td><?= h($userCounters->quantity) ?></td>
                <td><?= h($userCounters->created) ?></td>
                <td><?= h($userCounters->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserCounters', 'action' => 'view', $userCounters->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserCounters', 'action' => 'edit', $userCounters->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserCounters', 'action' => 'delete', $userCounters->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userCounters->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
