<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Boards2 $boards2
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $boards2->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $boards2->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Boards2'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List People'), ['controller' => 'People', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Person'), ['controller' => 'People', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="boards2 form large-9 medium-8 columns content">
    <?= $this->Form->create($boards2) ?>
    <fieldset>
        <legend><?= __('Edit Boards2') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('content');
            echo $this->Form->control('people_id', ['options' => $people, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
