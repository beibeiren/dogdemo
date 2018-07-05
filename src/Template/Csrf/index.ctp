<h1>サンプル見出し</h1>
<p>これはさんぷるぺーじです</p>
<div><?= $this->Flash->render('info') ?></div>
<?= $this->Form->create();?>
<fieldset>
	<?= $this->Form->text("name"); ?>
	<?= $this->Form->password("password"); ?>
</fieldset>
<?= $this->Form->button('送信'); ?>
<?= $this->Form->end(); ?>