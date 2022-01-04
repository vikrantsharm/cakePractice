<?php

use Cake\I18n\FrozenTime;

?>
<br/>
<div class="index large-4 medium-4 large-offset-4 medium-offset-4 columns">
    <div class="panel">
        <h2 class="text-center">Please Register</h2>
        <?= $this->Form->create($user); ?>
        <?=  $this->Form->input('Name'); ?>
        <?=  $this->Form->input('Username'); ?>
        <?=  $this->Form->input('Password',array('type'=>'password')); ?>
        <?=  $this->Form->input('Phonenumber'); ?>
        <?=  $this->Form->submit('Register',array('class'=>'button')); ?>

        <?= $this->Form->end(); ?>
    </div>
