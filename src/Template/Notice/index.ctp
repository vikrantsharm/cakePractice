<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Notice[]|\Cake\Collection\CollectionInterface $notice
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Notice'), ['action' => 'add']) ?></li>
        <?php if($Type=='マネージャー'): ?>
        <li><?= $this->Html->link('User Management',['controller'=>'users',
                    'action'=> 'index']
            ); ?></a></li>
        <?php endif;?>
    </ul>
</nav>
<div class="notice index large-9 medium-8 columns content">
    <h3><?= __('Notice') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Subject') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Content') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Author') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Creation_Date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Update_Date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($notice as $notice): ?>
            <tr>
                <td><?= $this->Number->format($notice->id) ?></td>
                <td><?= h($notice->Subject) ?></td>
                <td><?= h($notice->Content) ?></td>
                <td><?= $this->Number->format($notice->Author) ?></td>
                <td><?= h($notice->Creation_Date) ?></td>
                <td><?= h($notice->Update_Date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $notice->id]) ?>
                    <?php if($userId==$notice->Author || $Type=='マネージャー'):?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $notice->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $notice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notice->Subject)]) ?>
                    <?php endif;?>
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
