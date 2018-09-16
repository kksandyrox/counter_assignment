<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Counter[]|\Cake\Collection\CollectionInterface $counters
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Counter'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Counters'), ['controller' => 'UserCounters', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Counter'), ['controller' => 'UserCounters', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="counters index large-9 medium-8 columns content">
    <h3><?= __('Counters') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($counters as $counter): ?>
            <tr>
                <td><?= $this->Number->format($counter->id) ?></td>
                <td><?= h($counter->name) ?></td>
                <td><?= $counter->has('user') ? $this->Html->link($counter->user->id, ['controller' => 'Users', 'action' => 'view', $counter->user->id]) : '' ?></td>
                <td><?= h($counter->created) ?></td>
                <td><?= h($counter->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $counter->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $counter->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $counter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $counter->id)]) ?>
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
