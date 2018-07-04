<?php

?>



<div class="form large-9 medium-8 columns content">
    <?= $this->Form->create(null, ['type'=>'post','url' => ['controller' => 'forms', 'action' => 'index']]) ?>
    <fieldset>
        <legend><?= __('登録') ?></legend>
        <?php
            echo $this->Form->control('username');
            echo $this->Form->control('password');
        ?>
    </fieldset>

    <?= $this->Form->submit(__('submit')) ?>
    <?= $this->Form->end() ?>
</div>
