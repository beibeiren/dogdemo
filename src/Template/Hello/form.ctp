<?=$this->Form->create(null,
    ['type'=>'post','url'=>['action'=>'index']]) ?>
   <?=$this->Form->checkbox("HelloForm.check1",
    ['checked'=>true]) ?>checkbox
    <?=$this->Form->checkbox("HelloForm.check1",
        []) ?>checkbox2
     <br><br><br>
   <?=$this->Form->submit("送信") ?>
<?=$this->Form->end(); ?>

