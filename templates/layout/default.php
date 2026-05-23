<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->fetch('title') ?: 'Student Task Manager' ?></title>

    <!-- Custom CSS -->
    <?= $this->Html->css('style') ?>
    <?= $this->Html->css('dashboard') ?>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

<!-- ================= REMINDER MODAL ================= -->

<div class="modal fade" id="reminderModal" tabindex="-1">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content border-0 rounded-4 shadow-lg">

            <div class="modal-header border-0">

                <h5 class="modal-title fw-bold">
                    Task Reminders
                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <div class="reminder-item">

                    <h6 class="fw-bold mb-1">
                        Web Programming Assignment
                    </h6>

                    <p class="text-muted mb-0">
                        Due tomorrow at 11:59 PM
                    </p>

                </div>

                <hr>

                <div class="reminder-item">

                    <h6 class="fw-bold mb-1">
                        Database Project
                    </h6>

                    <p class="text-muted mb-0">
                        Submission this Friday
                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

<?php

    // Current controller & action
    $currentController = $this->request->getParam('controller');
    $currentAction = $this->request->getParam('action');

    // Pages that should NOT display sidebar
    $hideSidebarPages = [
        'Users' => ['login', 'register']
    ];

    // Show sidebar by default
    $showSidebar = true;

    // Check if current page should hide sidebar
    if (
        isset($hideSidebarPages[$currentController]) &&
        in_array($currentAction, $hideSidebarPages[$currentController])
    ) {
        $showSidebar = false;
    }
?>

<?php if ($showSidebar): ?>

    <!-- ================= MOBILE TOGGLE BUTTON ================= -->

    <button
        class="btn btn-primary d-lg-none position-fixed"
        type="button"
        data-bs-toggle="offcanvas"
        data-bs-target="#sidebarMenu"
        aria-controls="sidebarMenu"
        style="top: 15px; left: 15px; z-index: 2000;"
    >

        <i class="bi bi-list"></i>

    </button>

    <!-- ================= SIDEBAR ================= -->

    <div
        class="offcanvas-lg offcanvas-start sidebar d-flex flex-column"
        tabindex="-1"
        id="sidebarMenu"
        aria-labelledby="sidebarMenuLabel"
    >

        <!-- MOBILE HEADER -->

        <div class="offcanvas-header d-lg-none text-white border-bottom border-light border-opacity-25">

            <h5 class="offcanvas-title fw-bold" id="sidebarMenuLabel">
                Student Task Manager
            </h5>

            <button
                type="button"
                class="btn-close btn-close-white"
                data-bs-dismiss="offcanvas"
                aria-label="Close"
            ></button>

        </div>

        <!-- BRAND -->

        <div class="brand">

            <h5 class="fw-bold mb-0">

                <div class="logo-icon">
                    <i class="bi bi-kanban-fill"></i>
                </div>

                Student Task
                <br>
                Manager

            </h5>

        </div>

        <!-- NAVIGATION -->

        <ul class="nav flex-column">

            <!-- DASHBOARD -->

            <li class="nav-item">

                <?= $this->Html->link(
                    '<i class="bi bi-house-door"></i> Dashboard',
                    ['controller' => 'Dashboard', 'action' => 'index'],
                    [
                        'class' =>
                            'nav-link ' .
                            ($currentController === 'Dashboard'
                                ? 'active'
                                : ''),
                        'escape' => false
                    ]
                ) ?>

            </li>

            <!-- MY TASKS -->

            <li class="nav-item">

                <?= $this->Html->link(
                    '<i class="bi bi-list-task"></i> My Tasks',
                    ['controller' => 'Tasks', 'action' => 'index'],
                    [
                        'class' =>
                            'nav-link ' .
                            (
                                $currentController === 'Tasks' &&
                                $currentAction === 'index'
                                    ? 'active'
                                    : ''
                            ),
                        'escape' => false
                    ]
                ) ?>

            </li>

            <!-- ADD TASK -->

            <li class="nav-item">

                <?= $this->Html->link(
                    '<i class="bi bi-plus-lg"></i> Add Task',
                    ['controller' => 'Tasks', 'action' => 'add'],
                    [
                        'class' =>
                            'nav-link ' .
                            (
                                $currentController === 'Tasks' &&
                                $currentAction === 'add'
                                    ? 'active'
                                    : ''
                            ),
                        'escape' => false
                    ]
                ) ?>

            </li>

            <!-- SUBJECTS -->

            <li class="nav-item">

                <?= $this->Html->link(
                    '<i class="bi bi-journal-bookmark"></i> Subjects',
                    ['controller' => 'Subjects', 'action' => 'index'],
                    [
                        'class' =>
                            'nav-link ' .
                            ($currentController === 'Subjects'
                                ? 'active'
                                : ''),
                        'escape' => false
                    ]
                ) ?>

            </li>

        </ul>

        <!-- LOGOUT -->

        <div class="logout mt-auto">

            <?= $this->Html->link(
                '<i class="bi bi-box-arrow-right"></i> Logout',
                ['controller' => 'Users', 'action' => 'logout'],
                [
                    'class' => 'nav-link',
                    'escape' => false
                ]
            ) ?>

        </div>

    </div>

<?php endif; ?>

<!-- ================= MAIN CONTENT ================= -->

<main class="main<?= $showSidebar ? ' main-content' : '' ?>">

    <div class="container-fluid">

        <?= $this->Flash->render() ?>

        <?= $this->fetch('content') ?>

    </div>

</main>

<footer></footer>

</body>
</html>