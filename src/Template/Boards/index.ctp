<h1>Boardsサンプル</h1>
<p><?=$this->Html->link(
'※投稿する',
['action' => 'add']
) ?></p>
<div>
<table>
<tr>
<th width="25%">投稿者</th><th>タイトル</th>
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
        <?=$this->Html->tableHeaders(
            ['投稿者', 'タイトル'],
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