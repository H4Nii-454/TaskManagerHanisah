<?php
/**
 * templates/Tasks/view.php
 *
 * FIXED VERSION:
 * - Avoids "Undefined variable $task"
 * - Avoids "Attempt to read property on null"
 * - Shows task details safely
 */

// Safety check: if $task is not passed from controller
if (!isset($task) || empty($task)) {
    echo '<div class="alert alert-danger m-4">Task data not found.</div>';
    return;
}
?>

<div class="main-content">
    <div class="container-fluid py-4">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold mb-1">
                    <?= h($task->task_title ?? 'Untitled Task') ?>
                </h2>
                <p class="text-muted mb-0">View complete task details.</p>
            </div>

            <?= $this->Html->link(
                '<i class="bi bi-arrow-left me-2"></i> Back to Tasks',
                ['action' => 'index'],
                [
                    'class' => 'btn btn-outline-secondary rounded-pill px-4',
                    'escape' => false
                ]
            ) ?>
        </div>

        <!-- Task Details Card -->
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-4">

                <!-- Task Title -->
                <div class="mb-4">
                    <label class="form-label fw-semibold text-muted">Task Title</label>
                    <div class="fs-4 fw-bold">
                        <?= h($task->task_title ?? '-') ?>
                    </div>
                </div>

                <!-- User and Subject -->
                <div class="row mb-4">

                    <!-- User -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-muted">User</label>
                        <div>
                            <?= !empty($task->user)
                                ? h($task->user->full_name)
                                : '-' ?>
                        </div>
                    </div>

                    <!-- Subject -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-muted">Subject</label>
                        <div>
                            <?= !empty($task->subject)
                                ? h($task->subject->subject_name)
                                : h($task->subject_name ?? '-') ?>
                        </div>
                    </div>

                </div>

                <!-- Description -->
                <div class="mb-4">
                    <label class="form-label fw-semibold text-muted">Description</label>
                    <div class="p-3 bg-light rounded-3">
                        <?= !empty($task->task_description)
                            ? nl2br(h($task->task_description))
                            : '-' ?>
                    </div>
                </div>

                <!-- Due Date / Priority / Status -->
                <div class="row mb-4">

                    <!-- Due Date -->
                    <div class="col-md-4">
                        <label class="form-label fw-semibold text-muted">Due Date</label>
                        <div>
                            <?= !empty($task->due_date)
                                ? h($task->due_date->format('d/m/Y'))
                                : '-' ?>
                        </div>
                    </div>

                    <!-- Priority -->
                    <div class="col-md-4">
                        <label class="form-label fw-semibold text-muted">Priority</label>
                        <div>
                            <?php
                            $priority = $task->priority ?? '';
                            $priorityClass = match ($priority) {
                                'High'   => 'bg-danger-subtle text-danger',
                                'Medium' => 'bg-warning-subtle text-warning',
                                'Low'    => 'bg-success-subtle text-success',
                                default  => 'bg-secondary-subtle text-secondary'
                            };
                            ?>
                            <span class="badge <?= $priorityClass ?> px-3 py-2 rounded-pill">
                                <?= h($priority ?: '-') ?>
                            </span>
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="col-md-4">
                        <label class="form-label fw-semibold text-muted">Status</label>
                        <div>
                            <?php
                            $status = $task->status ?? '';
                            $statusClass = match ($status) {
                                'Completed'   => 'bg-success-subtle text-success',
                                'Pending'     => 'bg-warning-subtle text-warning',
                                'In Progress' => 'bg-primary-subtle text-primary',
                                default       => 'bg-secondary-subtle text-secondary'
                            };
                            ?>
                            <span class="badge <?= $statusClass ?> px-3 py-2 rounded-pill">
                                <?= h($status ?: '-') ?>
                            </span>
                        </div>
                    </div>

                </div>

                <!-- Action Buttons -->
                <div class="d-flex justify-content-end gap-2 pt-3 border-top">

                    <?= $this->Html->link(
                        '<i class="bi bi-pencil-square me-2"></i> Edit',
                        ['action' => 'edit', $task->task_id],
                        [
                            'class' => 'btn btn-primary rounded-pill px-4',
                            'escape' => false
                        ]
                    ) ?>

                    <?= $this->Form->postLink(
                        '<i class="bi bi-trash me-2"></i> Delete',
                        ['action' => 'delete', $task->task_id],
                        [
                            'confirm' => 'Are you sure you want to delete this task?',
                            'class' => 'btn btn-outline-danger rounded-pill px-4',
                            'escape' => false
                        ]
                    ) ?>

                </div>

            </div>
        </div>

    </div>
</div>