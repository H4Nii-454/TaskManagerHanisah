<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Subject $subject
 */
?>

<div class="main-content-dashboard">

    <!-- PAGE HEADER -->
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">

        <div>

            <h1 class="dashboard-title mb-2">

                Edit Subject

            </h1>

            <p class="text-muted mb-0">

                Update your subject information here.

            </p>

        </div>

        <?= $this->Html->link(
            '← Back to Subjects',
            ['action' => 'index'],
            [
                'class' => 'btn btn-light rounded-pill px-4 py-2 shadow-sm border'
            ]
        ) ?>

    </div>

    <!-- EDIT CARD -->
    <div class="card border-0 shadow-lg rounded-5 overflow-hidden">

        <div class="card-body p-5">

            <?= $this->Form->create($subject) ?>

            <div class="row g-4">

                <!-- SUBJECT NAME -->
                <div class="col-md-6">

                    <label class="form-label fw-semibold mb-2">

                        Subject Name

                    </label>

                    <?= $this->Form->control('subject_name', [
                        'label' => false,
                        'class' => 'form-control custom-input',
                        'placeholder' => 'Enter subject name'
                    ]) ?>

                </div>

                <!-- SUBJECT CODE -->
                <div class="col-md-6">

                    <label class="form-label fw-semibold mb-2">

                        Subject Code

                    </label>

                    <?= $this->Form->control('subject_code', [
                        'label' => false,
                        'class' => 'form-control custom-input',
                        'placeholder' => 'Enter subject code'
                    ]) ?>

                </div>

                <!-- LECTURER -->
                <div class="col-12">

                    <label class="form-label fw-semibold mb-2">

                        Lecturer Name

                    </label>

                    <?= $this->Form->control('lecturer_name', [
                        'label' => false,
                        'class' => 'form-control custom-input',
                        'placeholder' => 'Enter lecturer name'
                    ]) ?>

                </div>

            </div>

            <!-- BUTTONS -->
            <div class="d-flex justify-content-end gap-3 mt-5">

                <?= $this->Html->link(
                    'Cancel',
                    ['action' => 'index'],
                    [
                        'class' => 'btn btn-light border rounded-pill px-4 py-3 fw-semibold'
                    ]
                ) ?>

                <button type="submit" class="btn save-btn rounded-pill px-5 py-3">

                    Save Changes

                </button>

            </div>

            <?= $this->Form->end() ?>

        </div>

    </div>

</div>