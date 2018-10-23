<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Weighting $weighting
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $weighting->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $weighting->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Weightings'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Words'), ['controller' => 'Words', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Word'), ['controller' => 'Words', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Books'), ['controller' => 'Books', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Book'), ['controller' => 'Books', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="weightings form large-9 medium-8 columns content">
    <?= $this->Form->create($weighting) ?>
    <fieldset>
        <legend><?= __('Edit Weighting') ?></legend>
        <?php
            echo $this->Form->control('value');
            echo $this->Form->control('word_id', ['options' => $words]);
            echo $this->Form->control('book_id', ['options' => $books]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
