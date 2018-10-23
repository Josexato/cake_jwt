<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Book $book
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Book'), ['action' => 'edit', $book->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Book'), ['action' => 'delete', $book->id], ['confirm' => __('Are you sure you want to delete # {0}?', $book->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Books'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Book'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Weightings'), ['controller' => 'Weightings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Weighting'), ['controller' => 'Weightings', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="books view large-9 medium-8 columns content">
    <h3><?= h($book->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($book->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($book->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $book->has('user') ? $this->Html->link($book->user->id, ['controller' => 'Users', 'action' => 'view', $book->user->id]) : '' ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Weightings') ?></h4>
        <?php if (!empty($book->weightings)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Value') ?></th>
                <th scope="col"><?= __('Word Id') ?></th>
                <th scope="col"><?= __('Book Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($book->weightings as $weightings): ?>
            <tr>
                <td><?= h($weightings->id) ?></td>
                <td><?= h($weightings->value) ?></td>
                <td><?= h($weightings->word_id) ?></td>
                <td><?= h($weightings->book_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Weightings', 'action' => 'view', $weightings->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Weightings', 'action' => 'edit', $weightings->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Weightings', 'action' => 'delete', $weightings->id], ['confirm' => __('Are you sure you want to delete # {0}?', $weightings->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
