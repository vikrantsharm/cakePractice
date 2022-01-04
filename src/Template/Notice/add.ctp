<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Notice $notice
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Notice'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="notice form large-9 medium-8 columns content">
    <?= $this->Form->create($notice) ?>
    <fieldset>
        <legend><?= __('Add Notice') ?></legend>
        <?php
            echo $this->Form->control('Subject');
            echo $this->Form->control('Content');
//            echo $this->Form->control('Author');
//            echo $this->Form->control('Creation_Date', ['empty' => true]);
//            echo $this->Form->control('Update_Date', ['empty' => true]);
//            echo $this->Form->control('IsDeleted');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
