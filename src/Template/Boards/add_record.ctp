
<style media="screen">
    .error {
        color:red;
        font-size:smaller;
        font-weith:bold;
    }
</style>

<h1>Databaseサンプル</h1>
<?=$this->Form->create($entity, ['url' => ['action' => 'addRecord']]) ?>
<fieldset>
    <div class="error"><?=$this->Form->error('name') ?></div>
    <?=$this->Form->control('name', ['type' => 'text', 'error' => false]) ?>
    <div class="error"><?=$this->Form->error('title') ?></div>
    <?=$this->Form->control('title', ['type' => 'text']) ?>
    <div class="error"><?=$this->Form->error('content') ?></div>
    <?=$this->Form->control('content') ?>
</fieldset>
<?=$this->Form->button("送信") ?>
<?=$this->Form->end() ?>
