<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Weighting $weighting
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Weighting'), ['action' => 'edit', $weighting->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Weighting'), ['action' => 'delete', $weighting->id], ['confirm' => __('Are you sure you want to delete # {0}?', $weighting->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Weightings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Weighting'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Words'), ['controller' => 'Words', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Word'), ['controller' => 'Words', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Books'), ['controller' => 'Books', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Book'), ['controller' => 'Books', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="weightings view large-9 medium-8 columns content">
    <h3><?= h($weighting->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($weighting->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Value') ?></th>
            <td><?= h($weighting->value) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Word') ?></th>
            <td><?= $weighting->has('word') ? $this->Html->link($weighting->word->name, ['controller' => 'Words', 'action' => 'view', $weighting->word->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Book') ?></th>
            <td><?= $weighting->has('book') ? $this->Html->link($weighting->book->name, ['controller' => 'Books', 'action' => 'view', $weighting->book->id]) : '' ?></td>
        </tr>
    </table>
</div>
