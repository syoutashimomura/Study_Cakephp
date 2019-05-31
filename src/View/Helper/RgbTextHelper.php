<?php
namespace App\View\Helper;

use Cake\View\Helper;

/**
 *
 */
class RgbTextHelper extends Helper
{
    public $helpers = ['Html'];

    function initialize(array $config)
    {
        parent::initialize($config);
    }

    public function redString($str)
    {
        return "<span style='background-color:#ff0000; color:#ffffff;'>{$str}</span>";
    }

    public function greenString($str)
    {
        return "<span style='background-color:#00ff00; color:#ffffff;'>{$str}</span>";
    }

    public function blueString($str)
    {
        return "<span style='background-color:#0000ff; color:#ffffff;'>{$str}</span>";
    }

    public function redLink($str,$url)
    {
        $style = "background-color:#ff0000; color:#ffffff;";
        return $this->Html->link($str,$url,['style'=>$style]);
    }

    public function greenLink($str,$url)
    {
        $style = "background-color:#00ff00; color:#ffffff;";
        return $this->Html->link($str,$url,['style'=>$style]);
    }

    public function blueLink($str,$url)
    {
        $style = "background-color:#0000ff; color:#ffffff;";
        return $this->Html->link($str,$url,['style'=>$style]);
    }
}
