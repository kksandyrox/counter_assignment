<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Counter $counter
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $counter->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $counter->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Counters'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Counters'), ['controller' => 'UserCounters', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Counter'), ['controller' => 'UserCounters', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="counters form large-9 medium-8 columns content">
    <?= $this->Form->create($counter) ?>
    <fieldset>
        <legend><?= __('Edit Counter') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('user_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
