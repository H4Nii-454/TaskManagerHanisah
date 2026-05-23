<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SubjectsFixture
 */
class SubjectsFixture extends TestFixture
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
                'subject_id' => 1,
                'subject_name' => 'Lorem ipsum dolor sit amet',
                'subject_code' => 'Lorem ipsum dolor ',
                'lecturer_name' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
