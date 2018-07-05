<div class="form large-9 medium-8 columns content">
    <?= $this->Form->create(null, ['type'=>'post','url' => [ 'action' => 'show2']]) ?>
    <fieldset>
        <legend><?= __('Jump') ?></legend>

    </fieldset>

    <?= $this->Html->image('6.jpg', ['width' => '100%', 'height' => 'auto']); ?>

    <?= $this->Form->submit(__('submit')) ?>
    <?= $this->Form->end() ?>
</div>
