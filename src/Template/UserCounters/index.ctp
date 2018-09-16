<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserCounter[]|\Cake\Collection\CollectionInterface $userCounters
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User Counter'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Counters'), ['controller' => 'Counters', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Counter'), ['controller' => 'Counters', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Units'), ['controller' => 'Units', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Unit'), ['controller' => 'Units', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userCounters index large-9 medium-8 columns content">
    <h3><?= __('User Counters') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('counter_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('unit_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userCounters as $userCounter): ?>
            <tr>
                <td><?= $this->Number->format($userCounter->id) ?></td>
                <td><?= $userCounter->has('user') ? $this->Html->link($userCounter->user->id, ['controller' => 'Users', 'action' => 'view', $userCounter->user->id]) : '' ?></td>
                <td><?= $userCounter->has('counter') ? $this->Html->link($userCounter->counter->name, ['controller' => 'Counters', 'action' => 'view', $userCounter->counter->id]) : '' ?></td>
                <td><?= $userCounter->has('unit') ? $this->Html->link($userCounter->unit->name, ['controller' => 'Units', 'action' => 'view', $userCounter->unit->id]) : '' ?></td>
                <td><?= $this->Number->format($userCounter->quantity) ?></td>
                <td><?= h($userCounter->created) ?></td>
                <td><?= h($userCounter->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $userCounter->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userCounter->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userCounter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userCounter->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
