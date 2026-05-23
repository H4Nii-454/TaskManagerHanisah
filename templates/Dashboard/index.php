<div class="main-content-dashboard">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-start flex-wrap mb-4">

        <div>

            <h2 class="fw-bold dashboard-title">
                Good Morning, Hani!
            </h2>

            <p class="text-muted fs-5">
                Here's what's happening with your tasks today.
            </p>

        </div>

        <!-- PROFILE + NOTIFICATION -->
        <div class="header-actions">

            <!-- Notification -->
            <div
                class="notification"
                data-bs-toggle="modal"
                data-bs-target="#reminderModal"
            >

                <i class="bi bi-bell"></i>

                <span class="badge">
                    3
                </span>

            </div>

            <!-- USER -->
            <div class="profile-card floating-card">

                <img
                    src="https://api.dicebear.com/7.x/notionists/svg?seed=Hani"
                    alt="Profile"
                >

                <div>

                    <h6 class="mb-0 fw-bold">
                        Hani
                    </h6>

                    <small class="text-muted">
                        Student
                    </small>

                </div>

            </div>

        </div>

    </div>

    <!-- TOP STATISTICS -->
    <div class="row g-4 mb-4">

        <!-- TOTAL -->
        <div class="col-lg-3 col-md-6">

            <div class="card stat-card floating-card h-100">

                <div class="card-body">

                    <p class="text-muted mb-2">
                        Total Tasks
                    </p>

                    <h1>
                        <?= $totaltasks ?>
                    </h1>

                    <a href="<?= $this->Url->build([
                        'controller'=>'Tasks',
                        'action'=>'index'
                    ]) ?>">
                        View all tasks
                    </a>

                </div>

            </div>

        </div>

        <!-- PENDING -->
        <div class="col-lg-3 col-md-6">

            <div class="card stat-card floating-card h-100">

                <div class="card-body">

                    <p class="text-muted mb-2">
                        Pending Tasks
                    </p>

                    <h1>
                        <?= $pendingtasks ?>
                    </h1>

                    <p class="text-muted">
                        Tasks to do
                    </p>

                </div>

            </div>

        </div>

        <!-- COMPLETED -->
        <div class="col-lg-3 col-md-6">

            <div class="card stat-card floating-card h-100">

                <div class="card-body">

                    <p class="text-muted mb-2">
                        Completed Tasks
                    </p>

                    <h1>
                        <?= $completedtasks ?>
                    </h1>

                    <p class="text-muted">
                        Well done!
                    </p>

                </div>

            </div>

        </div>

        <!-- OVERDUE -->
        <div class="col-lg-3 col-md-6">

            <div class="card stat-card floating-card h-100">

                <div class="card-body">

                    <p class="text-muted mb-2">
                        Overdue Tasks
                    </p>

                    <h1>
                        <?= $overduetasks ?>
                    </h1>

                    <p class="text-muted">
                        Take action
                    </p>

                </div>

            </div>

        </div>

    </div>

    <!-- CHART SECTION -->
    <div class="row g-4 mb-4">

        <!-- OVERVIEW -->
        <div class="col-lg-6">

            <div class="card content-card floating-card h-100">

                <div class="card-body">

                    <h3 class="fw-bold mb-5">
                        Tasks Overview
                    </h3>

                    <div class="d-flex justify-content-center align-items-center"
                         style="height:320px;">

                        <div class="rounded-circle bg-light d-flex flex-column justify-content-center align-items-center shadow-sm donut-placeholder"
                             style="width:220px;height:220px;">

                            <h1 class="fw-bold text-success">
                                <?= $totaltasks ?>
                            </h1>

                            <p class="text-muted">
                                Total
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- PRIORITY -->
        <div class="col-lg-6">

            <div class="card content-card floating-card h-100">

                <div class="card-body">

                    <h3 class="fw-bold mb-5">
                        Tasks by Priority
                    </h3>

                    <div class="d-flex justify-content-around align-items-end"
                         style="height:320px;">

                        <div class="text-center">

                            <div class="bg-danger rounded-4 shadow-sm"
                                 style="width:70px;height:180px;">
                            </div>

                            <h4 class="mt-3 fw-semibold">
                                High
                            </h4>

                        </div>

                        <div class="text-center">

                            <div class="bg-warning rounded-4 shadow-sm"
                                 style="width:70px;height:240px;">
                            </div>

                            <h4 class="mt-3 fw-semibold">
                                Medium
                            </h4>

                        </div>

                        <div class="text-center">

                            <div class="bg-success rounded-4 shadow-sm"
                                 style="width:70px;height:140px;">
                            </div>

                            <h4 class="mt-3 fw-semibold">
                                Low
                            </h4>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

    <!-- =========================================
         UPCOMING + COMPLETED
    ========================================== -->
    <div class="row g-4">

        <!-- UPCOMING -->
        <div class="col-lg-6">

            <div class="card content-card floating-card">

                <div class="card-body">

                    <div class="d-flex justify-content-between mb-4">

                        <h3 class="fw-bold">
                            Upcoming Tasks
                        </h3>

                        <?= $this->Html->link(
                            'View all',
                            [
                                'controller'=>'Tasks',
                                'action'=>'index'
                            ],
                            [
                                'class'=>'text-decoration-none fw-semibold'
                            ]
                        ) ?>

                    </div>

                    <?php if (!empty($upcomingTasks)): ?>

                        <?php foreach ($upcomingTasks as $task): ?>

                            <?php
                            $badgeClass='bg-secondary';

                            switch(strtolower($task->priority)){

                                case 'high':
                                    $badgeClass='bg-danger';
                                    break;

                                case 'medium':
                                    $badgeClass='bg-warning text-dark';
                                    break;

                                case 'low':
                                    $badgeClass='bg-success';
                                    break;
                            }
                            ?>

                            <div class="border-bottom py-3">

                                <div class="d-flex justify-content-between align-items-center">

                                    <h5 class="fw-semibold mb-0">
                                        <?= h($task->task_title) ?>
                                    </h5>

                                    <span class="badge <?= $badgeClass ?>">
                                        <?= h($task->priority) ?>
                                    </span>

                                </div>

                                <small class="text-muted">

                                    Due:
                                    <?= date(
                                        'd/m/Y',
                                        strtotime($task->due_date)
                                    ) ?>

                                </small>

                            </div>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <p class="text-muted">
                            No upcoming tasks.
                        </p>

                    <?php endif; ?>

                </div>

            </div>

        </div>

        <!-- COMPLETED -->
        <div class="col-lg-6">

            <div class="card content-card floating-card">

                <div class="card-body">

                    <div class="d-flex justify-content-between mb-4">

                        <h3 class="fw-bold">
                            Recent Completed
                        </h3>

                        <?= $this->Html->link(
                            'View all',
                            [
                                'controller'=>'Tasks',
                                'action'=>'index'
                            ],
                            [
                                'class'=>'text-decoration-none fw-semibold'
                            ]
                        ) ?>

                    </div>

                    <?php if (!empty($recentCompleted)): ?>

                        <?php foreach ($recentCompleted as $task): ?>

                            <div class="border-bottom py-3">

                                <h5 class="fw-semibold">

                                    <i class="bi bi-check-circle-fill text-success me-2"></i>

                                    <?= h($task->task_title) ?>

                                </h5>

                                <small class="text-muted">
                                    Completed Task
                                </small>

                            </div>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <p class="text-muted">
                            No completed tasks yet.
                        </p>

                    <?php endif; ?>

                </div>

            </div>

        </div>

    </div>

</div>