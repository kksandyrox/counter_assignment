<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserCounter $userCounter
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List User Counters'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Counters'), ['controller' => 'Counters', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Counter'), ['controller' => 'Counters', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Units'), ['controller' => 'Units', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Unit'), ['controller' => 'Units', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userCounters form large-9 medium-8 columns content">
    <?= $this->Form->create($userCounter) ?>
    <fieldset>
        <legend><?= __('Add User Counter') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('counter_id', ['options' => $counters]);
            echo $this->Form->control('unit_id', ['options' => $units]);
            echo $this->Form->control('quantity');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
