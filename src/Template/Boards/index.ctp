<?= $this->Html->css('cake') ?>
<div>
<?= $this->Form->create(null, ['url' => ['action' => 'index']]); ?>
    <select class="lang" name="lang">
        <option value="en_US">English</option>
        <option value="ja_JP">日本語</option>
    </select>
<?= $this->Form->button(__('submit')); ?>
<?= $this->Form->end(); ?>
</div>

<h1><?= __('boards') ?></h1>
<p><?=$this->Html->link(
__('add.board') ,
['action' => 'add']
) ?></p>
<div>
<p><?= __('{0} post', $count) ?></p>
<table>
<tr>
<th width="25%"><?= __('user') ?></th><th><?php echo __('title') ?></th>
</tr>
<?php foreach ($boards as $obj): ?>
  <tr>
  <td style='color:red'><?=$this->Html->link(
  $obj['person']['name'],
  ['action' => 'show2',$obj['person_id']]
  ) ?></td>
  <td><?=$this->Html->link(
  $obj['title'],
   ['action' => 'show',$obj['id']]
    ) ?></td>
  </tr>
 <?php endforeach; ?>
 </table>
 </div>
 <hr>
 <div>
    <table>
        <th><?= $this->Paginator->sort('person_id', __('user')); ?></th>
        <th><?= $this->Paginator->sort('title', __('title')); ?></th>
        <?=$this->Html->tableHeaders(
            [__('user'), __('title')],
            ['style' => 'color:#000066; background-color:#AAAAFF'],
            ['style' => 'color:#000066; background-color:#EEEEFF']
        ); ?>
        <?php foreach ($boards as $obj): ?>
            <?= $this->Html->tableCells(
                [$obj['person']['name'], $obj['title']],
                ['style' => 'color:#000099; background-color:#CCCCFF'],
                ['style' => 'color:#006600; background-color:#EEFFEE'],
                false, true); ?>
        <?php endforeach; ?>
    </table>
 </div>
 <div class="paginator">
   <ul class="pagination">
     <?= $this->Paginator->first(' << first', ['target' => '_blank']) ?>
     <?= $this->Paginator->prev(' < prev', ['target' => '_blank']) ?>
     <?= $this->Paginator->next(' next >', ['target' => '_blank']) ?>
     <?= $this->Paginator->last(' last >>', ['target' => '_blank']) ?>
   </ul>
 </div>
 <div class="paginator">
   <ul class="pagination">
     <?= $this->Paginator->numbers() ?>
   </ul>
 </div>
  <div class="paginator">
   <ul class="pagination">
     <?= $this->Paginator->numbers([
      'before' => $this->Paginator->hasPrev()? $this->Paginator->first('<<')  : '',
      'after'  => $this->Paginator->hasNext()? $this->Paginator->last('>>') : '',
      'modulus' => 4,
      'separator' => '.'
     ]) ?>
   </ul>
 </div>
 <hr>
 <p>
    <?php
        $this->Html->addCrumb('First', '/boards/index');
        $this->Html->addCrumb('Second', '/boards/index');
        $this->Html->addCrumb('Last', '/boards/index');
    ?>
    <?= $this->Html->getCrumbs(' | ', 'Top'); ?>
 </p>
 <hr>
 <div >
    <?= $this->Html->div('div-class', 'this is a &ltdiv&gt ',['onclick' => 'alert(222)', 'align' => 'center']); ?>
    <?= $this->Html->link('Google', 'http://google.com', ['target' => '_blank']); ?>
    <?= $this->Html->para('p-class', 'test html &ltp&gt', ['align' => 'center', 'font-size' => '24pt']); ?>
    <?= $this->Html->tag('span', h('test <span>'), ['style' => 'color:#000066']); ?>
    <?= $this->Html->image('7.jpeg', ['width' => '100%', 'height' => 'auto']); ?>
 </div>