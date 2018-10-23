<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Word $word
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Word'), ['action' => 'edit', $word->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Word'), ['action' => 'delete', $word->id], ['confirm' => __('Are you sure you want to delete # {0}?', $word->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Words'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Word'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Weightings'), ['controller' => 'Weightings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Weighting'), ['controller' => 'Weightings', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="words view large-9 medium-8 columns content">
    <h3><?= h($word->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($word->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($word->name) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Weightings') ?></h4>
        <?php if (!empty($word->weightings)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Value') ?></th>
                <th scope="col"><?= __('Word Id') ?></th>
                <th scope="col"><?= __('Book Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($word->weightings as $weightings): ?>
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
