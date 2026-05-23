<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task $task
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $subjects
 */

$this->assign('title', 'Edit Task');
?>

<div class="main-content-dashboard">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
        <div>
            <h1 class="fw-bold mb-2">Edit Task</h1>
            <p class="text-muted mb-0">
                Update your task information.
            </p>
        </div>

        <?= $this->Html->link(
            '<i class="bi bi-arrow-left me-2"></i>Back to Tasks',
            ['action' => 'index'],
            [
                'class' => 'btn btn-outline-secondary rounded-pill px-4',
                'escape' => false
            ]
        ) ?>
    </div>

    <!-- Form Card -->
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4 p-md-5">

            <?= $this->Form->create($task) ?>

            <div class="row g-4">

                <!-- User -->
                <div class="col-md-6">
                    <?= $this->Form->control('user_id', [
                        'label' => 'User',
                        'options' => $users,
                        'class' => 'form-select',
                        'empty' => 'Select User'
                    ]) ?>
                </div>

                <!-- Subject -->
                <div class="col-md-6">
                    <?= $this->Form->control('subject_id', [
                        'label' => 'Subject',
                        'options' => $subjects,
                        'class' => 'form-select',
                        'empty' => 'Select Subject'
                    ]) ?>
                </div>

                <!-- Task Title -->
                <div class="col-12">
                    <?= $this->Form->control('task_title', [
                        'label' => 'Task Title',
                        'class' => 'form-control',
                        'placeholder' => 'Enter task title'
                    ]) ?>
                </div>

                <!-- Task Description -->
                <div class="col-12">
                    <?= $this->Form->control('task_description', [
                        'type' => 'textarea',
                        'rows' => 5,
                        'label' => 'Task Description',
                        'class' => 'form-control',
                        'placeholder' => 'Enter task description'
                    ]) ?>
                </div>

                <!-- Due Date -->
                <div class="col-md-6">
                    <?= $this->Form->control('due_date', [
                        'type' => 'date',
                        'label' => 'Due Date',
                        'class' => 'form-control'
                    ]) ?>
                </div>

                <!-- Priority -->
                <div class="col-md-6">
                    <?= $this->Form->control('priority', [
                        'type' => 'select',
                        'label' => 'Priority',
                        'options' => [
                            'High' => 'High',
                            'Medium' => 'Medium',
                            'Low' => 'Low'
                        ],
                        'class' => 'form-select',
                        'empty' => 'Select Priority'
                    ]) ?>
                </div>

                <!-- Status -->
                <div class="col-md-6">
                    <?= $this->Form->control('status', [
                        'type' => 'select',
                        'label' => 'Status',
                        'options' => [
                            'Pending' => 'Pending',
                            'In Progress' => 'In Progress',
                            'Completed' => 'Completed'
                        ],
                        'class' => 'form-select'
                    ]) ?>
                </div>

            </div>

            <!-- Buttons -->
            <div class="d-flex justify-content-between align-items-center mt-5 flex-wrap gap-3">

                <!-- Delete Button -->
                <?= $this->Form->postLink(
                    '<i class="bi bi-trash me-2"></i>Delete Task',
                    ['action' => 'delete', $task->task_id],
                    [
                        'confirm' => __('Are you sure you want to delete "{0}"?', $task->task_title),
                        'class' => 'btn btn-outline-danger px-4 py-2 rounded-3',
                        'escape' => false
                    ]
                ) ?>

                <!-- Right Buttons -->
                <div class="d-flex gap-3">
                    <?= $this->Html->link(
                        'Cancel',
                        ['action' => 'index'],
                        [
                            'class' => 'btn btn-light border px-4 py-2 rounded-3'
                        ]
                    ) ?>

                    <?= $this->Form->button(
                        '<i class="bi bi-save me-2"></i>Update Task',
                        [
                            'class' => 'btn btn-primary px-4 py-2 rounded-3',
                            'escapeTitle' => false
                        ]
                    ) ?>
                </div>

            </div>

            <?= $this->Form->end() ?>

        </div>
    </div>

</div>
