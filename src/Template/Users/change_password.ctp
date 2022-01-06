<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Notice'), ['controller' => 'Notice']) ?></li>
        <?php if($Type=='マネージャー'): ?>
            <li><?= $this->Html->link('User Management',['controller'=>'users',
                        'action'=> 'index']
                ); ?></a></li>
        <?php endif;?>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit Password') ?></legend>
        <?php
        echo $this->Form->control('Current_Password');
        echo $this->Form->control('NewPassword');

        echo $this->Form->control('Confirm_NewPassword');

        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
