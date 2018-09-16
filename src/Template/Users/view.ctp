<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Counters'), ['controller' => 'Counters', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Counter'), ['controller' => 'Counters', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Counters'), ['controller' => 'UserCounters', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Counter'), ['controller' => 'UserCounters', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($user->first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($user->last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Counters') ?></h4>
        <?php if (!empty($user->counters)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Is Custom') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->counters as $counters): ?>
            <tr>
                <td><?= h($counters->id) ?></td>
                <td><?= h($counters->name) ?></td>
                <td><?= h($counters->is_custom) ?></td>
                <td><?= h($counters->user_id) ?></td>
                <td><?= h($counters->created) ?></td>
                <td><?= h($counters->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Counters', 'action' => 'view', $counters->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Counters', 'action' => 'edit', $counters->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Counters', 'action' => 'delete', $counters->id], ['confirm' => __('Are you sure you want to delete # {0}?', $counters->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related User Counters') ?></h4>
        <?php if (!empty($user->user_counters)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Counter Id') ?></th>
                <th scope="col"><?= __('Quantity') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->user_counters as $userCounters): ?>
            <tr>
                <td><?= h($userCounters->id) ?></td>
                <td><?= h($userCounters->user_id) ?></td>
                <td><?= h($userCounters->counter_id) ?></td>
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
