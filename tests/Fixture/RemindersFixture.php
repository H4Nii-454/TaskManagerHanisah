<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RemindersFixture
 */
class RemindersFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'reminder_id' => 1,
                'task_id' => 1,
                'reminder_date' => '2026-05-10 08:02:21',
                'reminder_status' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
