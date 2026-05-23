<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Task Entity
 *
 * @property int $task_id
 * @property int $user_id
 * @property int $subject_id
 * @property string $task_title
 * @property string $task_description
 * @property \Cake\I18n\Date $due_date
 * @property string $priority
 * @property string $status
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Subject $subject
 */
class Task extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
    'task_title' => true,
    'subject_name' => true, // Wajib pastikan ini TRUE
    'task_description' => true,
    'priority' => true,
    'due_date' => true,
    'status' => true,
    'user_id' => true,
];
}
