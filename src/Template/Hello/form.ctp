<?=$this->Form->create(null,
    ['type'=>'post','url'=>['action'=>'send_form']]) ?>
   <?=$this->Form->checkbox("chks",
    []) ?>checkbox
    <?=$this->Form->checkbox("HelloForm.check1", ['checked'=>true, 'id' => 'helloform-check1']) ?>
      <?=$this->Form->Label('HelloForm.check1')?> <br> 
      <?= $this->Form->text('HelloForm.text1'); ?>
      <?= $this->Form->text('HelloForm.text2'); ?><br>

      <?=$this->Form->radio("HelloForm.radio1",[
	      ['text'=>'ウインドウズ', 'value' => 'Windows'],
	      ['text'=>'リナックス', 'value' => 'Linux'],
	      ['text'=>'マックOS', 'value' => 'macOS']
      ],
      ['Lable'=>true,'value' => 'Linux']) ?>
      <br>
      <?php echo $this->Form->select('HelloForm.select1',
        ['ウインドウズ' => 'Windows', 'リナックス' => 'Linux', 'マックOS' => 'MacOS X'],
        ['size' => 5, 'multiple' => true,'empty'=>'項目を選んでください']
      ); ?>
      <?php
      echo $this->Form->dateTime('HelloForm.date');

      ?>
 
     
     <br><br><br>
   <?=$this->Form->submit("送信") ?>
<?=$this->Form->end(); ?>

