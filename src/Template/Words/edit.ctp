<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Word $word
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $word->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $word->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Words'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Weightings'), ['controller' => 'Weightings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Weighting'), ['controller' => 'Weightings', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="words form large-9 medium-8 columns content">
    <?= $this->Form->create($word) ?>
    <fieldset>
        <legend><?= __('Edit Word') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
