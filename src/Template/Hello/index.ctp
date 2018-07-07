<!DOCTYPE html>
<html lang="ja">
<head>
 <meta http-equiv="content-type" content="text/html;charset=UFT-8">
 <title>Hello Page</title>
 <?= $this->Html->css('style'); ?>
</head>

<body>
<h1>サンプル見出し</h1>
    <p>こんにちは、これは、CAKEPHPのサンプルです。</p>
    <br><br/>
    <?=date('Y/m/d',time()) ?>
</body>
</html>
