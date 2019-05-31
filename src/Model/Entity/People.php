<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class People extends Entity
{
    protected $_accessidle = [
        '*' => true,
        'id' => false
    ];
}
