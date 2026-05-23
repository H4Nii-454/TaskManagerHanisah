<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task $task
 * @var \Cake\Collection\CollectionInterface|string[] $subjects
 */
?>

<div class="container-fluid py-4">

    <!-- Header -->
    <div class="mb-4">
        <h2 class="fw-bold mb-1">Add New Task</h2>
        <p class="text-muted mb-0">Create a new task and set your priorities.</p>
    </div>

    <!-- Card -->
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">

            <?= $this->Form->create($task) ?>

            <!-- Task Title -->
            <div class="mb-3">
                <?= $this->Form->control('task_title', [
                    'label' => 'Task Title',
                    'class' => 'form-control rounded-3',
                    'placeholder' => 'Enter task title'
                ]) ?>
            </div>

          <div class="mb-3">
    <?= $this->Form->control('subject_name', [
        'label' => 'Subject',
        'class' => 'form-select rounded-3',
        'placeholder' => 'Enter subject title'
    ]) ?>
</div>

            <!-- Description -->
            <div class="mb-3">
                <?= $this->Form->control('task_description', [
                    'type' => 'textarea',
                    'rows' => 4,
                    'label' => 'Description',
                    'class' => 'form-control rounded-3',
                    'placeholder' => 'Enter task description...'
                ]) ?>
            </div>

            <!-- Priority + Due Date -->
            <div class="row">
                <div class="col-md-6 mb-3">
                    <?= $this->Form->control('priority', [
                        'type' => 'select',
                        'options' => [
                            'Low' => 'Low',
                            'Medium' => 'Medium',
                            'High' => 'High'
                        ],
                        'empty' => 'Select priority',
                        'label' => 'Priority',
                        'class' => 'form-select rounded-3'
                    ]) ?>
                </div>

                <div class="col-md-6 mb-3">
                    <?= $this->Form->control('due_date', [
                        'type' => 'date',
                        'label' => 'Due Date',
                        'class' => 'form-control rounded-3'
                    ]) ?>
                </div>
            </div>

            <!-- Status -->
            <div class="mb-4">
                <?= $this->Form->control('status', [
                    'type' => 'select',
                    'options' => [
                        'Pending' => 'Pending',
                        'In Progress' => 'In Progress',
                        'Completed' => 'Completed'
                    ],
                    'default' => 'Pending',
                    'label' => 'Status',
                    'class' => 'form-select rounded-3'
                ]) ?>
            </div>

            <!-- Buttons -->
            <div class="d-flex justify-content-end gap-2">
                <?= $this->Html->link(
                    'Cancel',
                    ['action' => 'index'],
                    ['class' => 'btn btn-light px-4']
                ) ?>

                <?= $this->Form->button(
                    '<i class="bi bi-plus-lg me-2"></i>Add Task',
                    [
                        'type' => 'submit',
                        'class' => 'btn btn-primary px-4',
                        'escapeTitle' => false
                    ]
                ) ?>
            </div>

            <?= $this->Form->end() ?>

        </div>
    </div>
</div>