<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Boards2 $boards2
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Boards2'), ['action' => 'edit', $boards2->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Boards2'), ['action' => 'delete', $boards2->id], ['confirm' => __('Are you sure you want to delete # {0}?', $boards2->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Boards2'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Boards2'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List People'), ['controller' => 'People', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Person'), ['controller' => 'People', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="boards2 view large-9 medium-8 columns content">
    <h3><?= h($boards2->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($boards2->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Person') ?></th>
            <td><?= $boards2->has('person') ? $this->Html->link($boards2->person->name, ['controller' => 'People', 'action' => 'view', $boards2->person->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($boards2->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Content') ?></h4>
        <?= $this->Text->autoParagraph(h($boards2->content)); ?>
    </div>
</div>
