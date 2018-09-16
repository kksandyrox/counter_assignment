<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserCounter $userCounter
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User Counter'), ['action' => 'edit', $userCounter->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User Counter'), ['action' => 'delete', $userCounter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userCounter->id)]) ?> </li>
        <li><?= $this->Html->link(__('List User Counters'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Counter'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Counters'), ['controller' => 'Counters', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Counter'), ['controller' => 'Counters', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Units'), ['controller' => 'Units', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Unit'), ['controller' => 'Units', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="userCounters view large-9 medium-8 columns content">
    <h3><?= h($userCounter->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $userCounter->has('user') ? $this->Html->link($userCounter->user->id, ['controller' => 'Users', 'action' => 'view', $userCounter->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Counter') ?></th>
            <td><?= $userCounter->has('counter') ? $this->Html->link($userCounter->counter->name, ['controller' => 'Counters', 'action' => 'view', $userCounter->counter->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Unit') ?></th>
            <td><?= $userCounter->has('unit') ? $this->Html->link($userCounter->unit->name, ['controller' => 'Units', 'action' => 'view', $userCounter->unit->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($userCounter->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($userCounter->quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($userCounter->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($userCounter->modified) ?></td>
        </tr>
    </table>
</div>
