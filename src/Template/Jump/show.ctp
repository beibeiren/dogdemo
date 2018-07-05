<div class="form large-9 medium-8 columns content">
    <?= $this->Form->create(null, ['type'=>'get','url' => ['action' => 'show1']]) ?>
    <fieldset>
        <legend><?= __('Jump') ?></legend>

    </fieldset>

    <?= $this->Html->image('5.jpg', ['width' => '100%', 'height' => 'auto']); ?>

    <?= $this->Form->submit(__('submit')) ?>
    <?= $this->Form->end() ?>
</div>
