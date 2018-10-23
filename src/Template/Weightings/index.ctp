<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Weighting[]|\Cake\Collection\CollectionInterface $weightings
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Weighting'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Words'), ['controller' => 'Words', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Word'), ['controller' => 'Words', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Books'), ['controller' => 'Books', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Book'), ['controller' => 'Books', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="weightings index large-9 medium-8 columns content">
    <h3><?= __('Weightings') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('value') ?></th>
                <th scope="col"><?= $this->Paginator->sort('word_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('book_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($weightings as $weighting): ?>
            <tr>
                <td><?= h($weighting->id) ?></td>
                <td><?= h($weighting->value) ?></td>
                <td><?= $weighting->has('word') ? $this->Html->link($weighting->word->name, ['controller' => 'Words', 'action' => 'view', $weighting->word->id]) : '' ?></td>
                <td><?= $weighting->has('book') ? $this->Html->link($weighting->book->name, ['controller' => 'Books', 'action' => 'view', $weighting->book->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $weighting->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $weighting->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $weighting->id], ['confirm' => __('Are you sure you want to delete # {0}?', $weighting->id)]) ?>
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
