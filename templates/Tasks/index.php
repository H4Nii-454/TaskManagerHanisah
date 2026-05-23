<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Task> $tasks
 */
?>

<div class="container-fluid py-4">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                My Tasks
            </h2>

            <p class="text-muted mb-0">
                Manage and organize your tasks.
            </p>
        </div>

        <?= $this->Html->link(
            '<i class="bi bi-plus-lg me-2"></i>Add New Task',
            ['action' => 'add'],
            [
                'class' => 'btn btn-primary px-4 py-3 rounded-pill shadow-sm fw-semibold',
                'escape' => false
            ]
        ) ?>

    </div>

    <!-- CARD -->
    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4">

            <!-- FILTER TOOLBAR -->
            <div class="task-toolbar">

                <!-- SEARCH -->
                <div class="search-box">

                    <input
                        type="text"
                        class="form-control toolbar-input"
                        placeholder="Search tasks..."
                    >

                </div>

                <!-- PRIORITY -->
                <select class="form-select toolbar-select">

                    <option>
                        All Priorities
                    </option>

                    <option>
                        High
                    </option>

                    <option>
                        Medium
                    </option>

                    <option>
                        Low
                    </option>

                </select>

                <!-- STATUS -->
                <select class="form-select toolbar-select">

                    <option>
                        All Status
                    </option>

                    <option>
                        Pending
                    </option>

                    <option>
                        In Progress
                    </option>

                    <option>
                        Completed
                    </option>

                </select>

            </div>

            <!-- TABLE -->
            <div class="table-responsive">

                <table class="table align-middle">

                    <thead class="table-light">

                        <tr>

                            <th>
                                Task
                            </th>

                            <th>
                                Subject
                            </th>

                            <th>
                                Due Date
                            </th>

                            <th>
                                Priority
                            </th>

                            <th>
                                Status
                            </th>

                            <th class="text-center">
                                Actions
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php if (!empty($tasks)): ?>

                            <?php foreach ($tasks as $task): ?>

                                <tr>

                                    <!-- TASK -->
                                    <td>
                                        <?= h($task->task_title) ?>
                                    </td>

                                    <!-- SUBJECT -->
                                    <td>
                                        <?= h($task->subject_name) ?>
                                    </td>

                                    <!-- DUE DATE -->
                                    <td>
                                        <?= h($task->due_date) ?>
                                    </td>

                                    <!-- PRIORITY -->
                                    <td>

                                        <?php
                                            $priorityClass = '';

                                            if ($task->priority == 'High') {
                                                $priorityClass = 'priority-high';
                                            } elseif ($task->priority == 'Medium') {
                                                $priorityClass = 'priority-medium';
                                            } elseif ($task->priority == 'Low') {
                                                $priorityClass = 'priority-low';
                                            }
                                        ?>

                                        <span class="priority-badge <?= $priorityClass ?>">

                                            <?= h($task->priority) ?>

                                        </span>

                                    </td>

                                    <!-- STATUS -->
                                    <td>

                                        <?php
                                            $statusClass = '';

                                            if ($task->status == 'Pending') {
                                                $statusClass = 'status-pending';
                                            } elseif ($task->status == 'In Progress') {
                                                $statusClass = 'status-progress';
                                            } elseif ($task->status == 'Completed') {
                                                $statusClass = 'status-completed';
                                            }
                                        ?>

                                        <span class="status-badge <?= $statusClass ?>">

                                            <?= h($task->status) ?>

                                        </span>

                                    </td>

                                    <!-- ACTIONS -->
                                    <td class="text-center">

                                        <?= $this->Html->link(
                                            '<i class="bi bi-eye"></i>',
                                            ['action' => 'view', $task->task_id],
                                            [
                                                'class' => 'btn btn-sm btn-outline-info me-1',
                                                'escape' => false
                                            ]
                                        ) ?>

                                        <?= $this->Html->link(
                                            '<i class="bi bi-pencil"></i>',
                                            ['action' => 'edit', $task->task_id],
                                            [
                                                'class' => 'btn btn-sm btn-outline-primary me-1',
                                                'escape' => false
                                            ]
                                        ) ?>

                                        <?= $this->Form->postLink(
                                            '<i class="bi bi-trash"></i>',
                                            ['action' => 'delete', $task->task_id],
                                            [
                                                'confirm' => 'Are you sure?',
                                                'class' => 'btn btn-sm btn-outline-danger',
                                                'escape' => false
                                            ]
                                        ) ?>

                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        <?php else: ?>

                            <tr>

                                <td colspan="6" class="text-center text-muted py-5">

                                    No tasks found.

                                </td>

                            </tr>

                        <?php endif; ?>

                    </tbody>

                </table>

            </div>

            <!-- PAGINATION -->
            <div class="d-flex justify-content-between align-items-center mt-4">

                <small class="text-muted">

                    <?= $this->Paginator->counter(
                        'Showing {{current}} of {{count}} tasks'
                    ) ?>

                </small>

                <div class="custom-pagination">

                    <?= $this->Paginator->prev('« Previous') ?>

                    <?= $this->Paginator->next('Next »') ?>

                </div>

            </div>

        </div>

    </div>

</div>