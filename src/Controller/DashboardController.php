<?php
declare(strict_types=1);

namespace App\Controller;

class DashboardController extends AppController
{
    public function index()
    {
        // Load Tasks table
        $tasksTable = $this->fetchTable('Tasks');

        // Total Tasks
        $totaltasks = $tasksTable->find()->count();

        // Pending Tasks
        $pendingtasks = $tasksTable->find()
            ->where(['status' => 'Pending'])
            ->count();

        // Completed Tasks
        $completedtasks = $tasksTable->find()
            ->where(['status' => 'Completed'])
            ->count();

        // Overdue Tasks
        $overduetasks = $tasksTable->find()
            ->where([
                'due_date <' => date('Y-m-d'),
                'status !=' => 'Completed'
            ])
            ->count();

        // Upcoming Tasks (5 terdekat yang belum completed)
        $upcomingTasks = $tasksTable->find()
            ->where(['status !=' => 'Completed'])
            ->order(['due_date' => 'ASC'])
            ->limit(5)
            ->all();

        // Recent Completed (5 task completed terbaru)
        $recentCompleted = $tasksTable->find()
            ->where(['status' => 'Completed'])
            ->order(['task_id' => 'DESC'])
            ->limit(5)
            ->all();
            

        // Hantar data ke view
        $this->set(compact(
            'totaltasks',
            'pendingtasks',
            'completedtasks',
            'overduetasks',
            'upcomingTasks',
            'recentCompleted'
        ));
    }
}