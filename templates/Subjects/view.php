<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Subject $subject
 */
?>

<div class="main-content-dashboard">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">

        <div>
            <h1 class="fw-bold mb-1" style="
                background: linear-gradient(90deg,#0f172a,#0f766e,#2dd4bf);
                -webkit-background-clip:text;
                -webkit-text-fill-color: transparent;
            ">
                <?= h($subject->subject_name) ?>
            </h1>

            <p class="text-muted mb-0">
                Subject Details & Information
            </p>
        </div>

        <!-- ACTION BUTTONS -->
        <div class="d-flex gap-2 flex-wrap">

            <?= $this->Html->link(
                '<i class="bi bi-pencil-square me-1"></i> Edit',
                ['action' => 'edit', $subject->subject_id],
                [
                    'class' => 'btn btn-warning rounded-pill px-4 shadow-sm',
                    'escape' => false
                ]
            ) ?>

            <?= $this->Form->postLink(
                '<i class="bi bi-trash me-1"></i> Delete',
                ['action' => 'delete', $subject->subject_id],
                [
                    'confirm' => __('Are you sure you want to delete this subject?'),
                    'class' => 'btn btn-danger rounded-pill px-4 shadow-sm',
                    'escape' => false
                ]
            ) ?>

        </div>

    </div>

    <!-- MAIN CARD -->
    <div class="card border-0 shadow-lg rounded-4 overflow-hidden content-card">

        <!-- TOP GRADIENT LINE -->
        <div style="
            height: 8px;
            background: linear-gradient(
                90deg,
                #0f172a=,
                #0f766e,
                #2dd4bf
            );
        "></div>

        <div class="card-body p-5">

            <div class="row g-4">

                <!-- SUBJECT NAME -->
                <div class="col-md-6">
                    <div class="p-4 rounded-4 bg-light h-100 shadow-sm">

                        <small class="text-muted d-block mb-2">
                            Subject Name
                        </small>

                        <h4 class="fw-bold mb-0">
                            <?= h($subject->subject_name) ?>
                        </h4>

                    </div>
                </div>

                <!-- SUBJECT CODE -->
                <div class="col-md-6">
                    <div class="p-4 rounded-4 bg-light h-100 shadow-sm">

                        <small class="text-muted d-block mb-2">
                            Subject Code
                        </small>

                        <h4 class="fw-bold mb-0">
                            <?= h($subject->subject_code) ?>
                        </h4>

                    </div>
                </div>

                <!-- LECTURER -->
                <div class="col-md-6">
                    <div class="p-4 rounded-4 bg-light h-100 shadow-sm">

                        <small class="text-muted d-block mb-2">
                            Lecturer Name
                        </small>

                        <h4 class="fw-bold mb-0">
                            <?= h($subject->lecturer_name) ?>
                        </h4>

                    </div>
                </div>

                <!-- SUBJECT ID -->
                <div class="col-md-6">
                    <div class="p-4 rounded-4 bg-light h-100 shadow-sm">

                        <small class="text-muted d-block mb-2">
                            Subject ID
                        </small>

                        <h4 class="fw-bold mb-0">
                            #<?= $this->Number->format($subject->subject_id) ?>
                        </h4>

                    </div>
                </div>

            </div>

            <!-- BOTTOM BUTTONS -->
            <div class="mt-5 d-flex gap-3 flex-wrap">

                <?= $this->Html->link(
                    '<i class="bi bi-arrow-left me-1"></i> Back to Subjects',
                    ['action' => 'index'],
                    [
                        'class' => 'btn btn-dark rounded-pill px-4 text-white',
                        'style' => '
                        background:linear-gradient(90deg, #0f766e, #2dd4bf);
                        border:none;
                        ',
                        'escape' => false
                    ]
                ) ?>

                <?= $this->Html->link(
                    '<i class="bi bi-plus-circle me-1"></i> New Subject',
                    ['action' => 'add'],
                    [
                      'class' => 'btn rounded-pill px-4 text-white',
                      'style' => 'background:#14b8a6;border:none;
                      ',
                      'escape' => false
                      
                    ]
                ) ?>

            </div>

        </div>
    </div>

</div>