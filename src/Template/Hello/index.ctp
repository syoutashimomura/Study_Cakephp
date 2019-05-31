
<h1>サンプル見出し</h1>
<p>
    <?=$result; ?>
</p>

<!-- <form action="/Study_Cakephp/hello/sendForm" method="get">
    <input type="hidden" name="check1" value="off">
    <input type="hidden" name="radio1" value="off">
    <input type="checkbox" name="check1" id="c1">
        <lablel for="c1">チェック</lablel><br>
    <input type="radio" name="radio1" id="r1" value="No.1">
        <lablel for="r1">ラジオ１</lablel><br>
    <input type="radio" name="radio2" id="r2" value="No.2">
        <lablel for="r2">ラジオ２</lablel><br>

    <select name="select" >
        <option value="Windows">Windows</option>
        <option value="Linux">Linux</option>
        <option value="MacOSX">MacOSX</option>
    </select>

    <input type="submit">
</form> -->

<?php
    echo $this->Form->create(null,
            ['type' => 'post',
             'url' => ['controller' => 'Hello', 'action' => 'index']]);

    // echo $this->Form->text("HelloForm.text1");
    // echo $this->Form->checkbox("HelloForm.check1",
    //         ['checked' => true, 'id' => 'hello1']);
    // echo $this->Form->label("hello1","HelloFormcheck1");
    // echo $this->Form->radio("HelloForm.radio",
    //         [
    //             ['text' => 'ウィンドウズ', 'value' => 'Windows'],
    //             ['text' => 'リナックス', 'value' => 'Linux'],
    //             ['text' => 'マックOS', 'value' => 'macOS']
    //         ],
    //         ['label' => true, 'value' => 'Linux', 'disabled' => true]);
            $options = [
                'PC' => [
                    'ウィンドウズ' => 'Windows',
                    'リナックス' => 'Linux',
                    'マックOS' => 'macOS'
                ],
                'mobile' => [
                    'アンドロイド' => 'Windows',
                    'アイフォン' => 'Linux',
                    'ガラケー' => 'macOS'
                ]
            ];
            $attributes = [
                'empty' => '項目を選んでください',
                // 'value' => 'Linux',
                // 'value' => 'macOS',
                'size' => 10,
                'multiple' => true
            ];
    echo $this->Form->select('HelloForm.select',$options,$attributes);
    echo $this->Form->password('PassWord.test1',['size' => 3]);
    echo $this->Form->textarea('textarea.test1',['cols' => 50,'rows' => 10]);
    echo $this->Form->dateTime('HelloForm.date', ['monthNames' => false]);
    echo $this->Form->submit("送信");
    echo $this->Form->end();
    print_r($result2);
 ?>
