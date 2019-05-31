
<style media="screen">
    .error {
        color:red;
        font-size:smaller;
        font-weith:bold;
    }
</style>

<h1><?=__('board2') ?></h1>
<p><a href="/Study_Cakephp/boards2/add"><?=__('post') ?></a></p>
<p><?=__('{0} post', $count) ?></p>

<div>
<table>
    <th><?=$this->Paginator->sort('id','投稿順') ?></th>
    <th><?=$this->Paginator->sort('people','名前') ?></th>
    <th><?=$this->Paginator->sort('title','タイトル') ?></th>
<?php foreach ($data as $obj) : ?>
    <?=$this->Html->tableCells(
            [
                $obj['id'],
                $obj['people']['name'],
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
