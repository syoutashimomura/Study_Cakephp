<?php
namespace App\controller;
/**
 *
 */
class HelloController extends AppController
{
    // public $name = 'Hello';
    // public $autoRender = true;

    public function initialize(){
        $this->name = 'Hello';
        // $this->autoRender = false;
        // $this->viewBuilder()->enableAutoLayout(true);
        $this->viewBuilder()->setLayout('Hello');
        $this->set('msg','Hello/index');
        $this->set('footer','Hello/footer2');
    }

    public function index(){
        // $this->name = 'Hello';
        // $this->autoRender = true;
        // echo "hello world!";
        // $this->viewBuilder()->enableAutoLayout(true);
        // $this->set('msg','ヘッダーエレメンと！！！');
        // $n = rand(1,2);
        // $this->set('footer','Hello/footer' . $n);
        $result = "";
        if ($this->request->isPost()) {
            $result = "<pre>※送信された情報<br>";
            foreach ($this->request->getData('HelloForm') as $key => $value) {
                $v_str = '';
                foreach ($value as $v) {
                    $v_str .= $v . ' ';
                }
                $result .= $key . ' => ' . $v_str;
            }
            $result .= "</pre>";
        } else {
            $result = "※何か入れてください";
        }
        $this->set("result",$result);
        $this->set("result2",$this->request->getData('HelloForm'));
    }

    public function other(){
        // echo "index以外！";
        $this->viewBuilder()->enableAutoLayout(false);
        $this->autoRender = true;
    }

    public function sendForm(){
        // $str = $this->request->getQuery('text1',"デフォルト");
        // $str2 = $this->request->getQueryParams();
        // $result = "";
        // if ($str != "") {
        //     $result = "you type: ". $str;
        // } else {
        //     $result = "empty.";
        // }
        // $this->set("result",h($result));
        // $this->set("result2",$str2);
        // $result = "※送信された情報<br>";
        // foreach ($this->request->getQueryParams() as $key => $value) {
        //     $result .= $key . "=>" . $value . "<br>";
        // }
        // $this->set("result",$result);
        // $this->set("result2",$this->request->getQueryParams());

        $str = $this->request->data('text1');
        $result = "";
        if ($str != "") {
            $result = "you type: " . $str;
        } else {
            $result = "empty.";
        }
        $this->set("result",h($result));
        $token = $this->request->getParam('_csrfToken');
    }

}
