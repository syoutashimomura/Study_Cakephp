
<style media="screen">
    .error {
        color:red;
        font-size:smaller;
        font-weith:bold;
    }
    span.highlight{
        color:white;
        background:blue;
        font-weight:bold;
    }
</style>

<h1><?=$this->RgbText->redString('掲示板') ?></h1>
<p><?=$this->RgbText->greenLink('※投稿する','/boards/add') ?></p>
<p><?=__('{0} post', $count) ?></p>

<div>
<table>
    <th><?=$this->Paginator->sort('id','投稿順') ?></th>
    <th><?=$this->Paginator->sort('person','名前') ?></th>
    <th><?=$this->Paginator->sort('title','タイトル') ?></th>
<?php foreach ($data as $obj) : ?>
    <?=$this->Html->tableCells(
            [
                $obj['id'],
                $obj['person']['name'],
                $obj['title']
            ],
            ['style' => 'color:#000066; background-color:#ccccff'],
            ['style' => 'color:#006600; background-color:#eeffee'],
            false,true
        ) ?>
<?php endforeach; ?>
</table>
</div>
<div class="paginator">
    <ul class="pagination">
        <?=$this->Paginator->numbers([
                'before' => $this->Paginator->first('<<'),
                'after' => $this->Paginator->last('>>'),
                'modulus' => 4,
                'separator' => '*'
            ]) ?>
    </ul>
</div>
<?php
// $res = $this->Text->autoLink("please check http://google.com/ .", array());
// echo $this->Html->para(null,$res,array());

$content = 'this is <b>sample page</b> for cake3app.sample pag';
$hstr = $this->Text->highlight(
    $content,
    "sample page",
    [
        'format' => '<span class="highlight">\1</span>',
        'html' => true
    ]
);
$t = '2019-05-25 21:22:01';
?>

<p>
<?=$this->Text->excerpt($content,'page',10,'***') ?>
</p>
<p>
<?=$this->Text->truncate($content,15,['ellipsis' => '...?','html' => true,]) ?>
</p>

<?=$this->Html->para('p',$hstr) ?>

<?=$this->Time->format($t, 'yyyy年MM月dd日 HH時mm分ss秒') ?>
<br>
<?=$this->Time->toAtom($t) ?>
<br>
<?=$this->Time->toRSS($t) ?>
<br>
<?=$t ?>

<?php
  print_r($this->Time->toQuarter($t,true));
 ?>
 <br>
 <?=$this->element('SampleBanner') ?>
