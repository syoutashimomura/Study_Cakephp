<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Boards2 Entity
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $content
 * @property int|null $people_id
 *
 * @property \App\Model\Entity\Person $person
 */
class Boards2 extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
