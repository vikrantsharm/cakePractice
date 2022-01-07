<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Notice List'), ['controller'=>'notice',
                'action'=> 'index']) ?></li>
        <?php if($Type=='マネージャー'): ?>
            <li><?= $this->Html->link('User Management',['controller'=>'users',
                        'action'=> 'index']
                ); ?></a></li>
        <?php endif;?>
    </ul>
</nav>
<div class="users index large-9 medium-8 columns content">
    <h3><?= __('Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Username') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Phonenumber') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Creation_Date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Update_Date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $this->Number->format($user->Id) ?></td>
                <td><?= h($user->Username) ?></td>
                <td><?= h($user->Name) ?></td>
                <td><?= h($user->Phonenumber) ?></td>
                <td><?= h($user->Type) ?></td>
                <td><?= h($user->Creation_Date) ?></td>
                <td><?= h($user->Update_Date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->Id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->Id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->Id)]) ?>
                    <?= $this->Form->postLink(__('Reset Password'), ['action' => 'reset', $user->Id], ['confirm' => __('Are you sure you want to reset password for user # {0}?', $user->Id)]) ?>
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
