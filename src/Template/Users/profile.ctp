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
        <legend><?= __('Profile') ?></legend>
        <?php
        echo $this->Form->control('Username');
        echo $this->Form->control('Name');
        //            echo $this->Form->control('Password');
        echo $this->Form->control('Phonenumber');
        //            echo $this->Form->control('Type');
        //            echo $this->Form->control('Creation_Date', ['empty' => true]);
        //            echo $this->Form->control('Update_Date', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
