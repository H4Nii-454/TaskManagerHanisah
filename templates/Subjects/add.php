<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Subject $subject
 */
?>

<div class="container-fluid py-4">

    <!-- Header -->
    <div class="mb-4">
        <h2 class="fw-bold mb-1">Add New Subject</h2>
        <p class="text-muted mb-0">Create a new subject and assign the lecturer.</p>
    </div>

    <!-- Card -->
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">

            <?= $this->Form->create($subject) ?>

            <div class="mb-3">
    <?= $this->Form->control('subject_name', [
        'type' => 'text',
        'label' => 'Subject',
        'class' => 'form-control rounded-3',
        'placeholder' => 'Enter subject title'
    ]) ?>
</div>

            <!-- Subject Code -->
            <div class="mb-3">
                <?= $this->Form->control('subject_code', [
                    'label' => 'Subject Code',
                    'class' => 'form-control rounded-3',
                    'placeholder' => 'e.g. IMS566',
                    'templates' => [
                        'inputContainer' => '<div class="mb-3">{{content}}</div>'
                    ]
                ]) ?>
            </div>

            <!-- Lecturer Name -->
            <div class="mb-4">
                <?= $this->Form->control('lecturer_name', [
                    'label' => 'Lecturer Name',
                    'class' => 'form-control rounded-3',
                    'placeholder' => 'Enter lecturer name',
                    'templates' => [
                        'inputContainer' => '<div class="mb-3">{{content}}</div>'
                    ]
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
                    '<i class="bi bi-plus-lg me-2"></i>Add Subject',
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