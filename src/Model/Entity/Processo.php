<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Processo Entity
 *
 * @property int $id
 * @property string $identificador
 * @property string $tipo
 * @property string|null $pais_destino
 * @property string|null $valor_total
 * @property string|null $via_transporte
 * @property float|null $peso_bruto
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $updated
 */
class Processo extends Entity
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
        'identificador' => true,
        'tipo' => true,
        'pais_destino' => true,
        'valor_total' => true,
        'via_transporte' => true,
        'peso_bruto' => true,
        'created' => true,
        'updated' => true,
    ];
}
