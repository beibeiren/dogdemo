<h1>掲示板</h1>
<p><?=$this->Html->link(
'※一覧に戻る',
['action' => 'index']
) ?></p>
<table>
 <tr><th width="25%">投稿者</th>
 <td><?=$boards['person']['name'] ?></td></tr>
  <tr><th width="25%">タイトル</th>
  <td><?=$boards['title'] ?></td></tr>
   <tr><th width="25%">内容</th>
   <td><?=$boards['content'] ?></td></tr>
</table>

<p><?=$this->Html->link(
'※この投稿を編集する',
['action' => 'edit',$boards['id']]
) ?></p>
