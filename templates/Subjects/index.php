<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Subject> $subjects
 */
?>

<div class="container-fluid py-4">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1">
                Subjects
            </h2>

            <p class="text-muted mb-0">
                Manage your subjects and lecturers.
            </p>

        </div>

        <?= $this->Html->link(
            '<i class="bi bi-plus-lg me-2"></i>Add New Subject',
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

            <!-- SEARCH -->
            <div class="row mb-4">

                <div class="col-md-6">

                    <input
                        type="text"
                        class="form-control rounded-3 toolbar-input"
                        placeholder="Search subjects..."
                    >

                </div>

            </div>

            <!-- TABLE -->
            <div class="table-responsive">

                <table class="table align-middle subject-table">

                    <thead class="table-light">

                        <tr>

                            <th>
                                Subject Name
                            </th>

                            <th>
                                Subject Code
                            </th>

                            <th>
                                Lecturer Name
                            </th>

                            <th class="text-center">
                                Actions
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                    <?php if (count($subjects) > 0): ?>

                        <?php foreach ($subjects as $subject): ?>

                            <tr>

                                <!-- SUBJECT NAME -->
                                <td class="fw-semibold">

                                    <?= h($subject->subject_name) ?>

                                </td>

                                <!-- SUBJECT CODE -->
                                <td>

                                    <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill">

                                        <?= h($subject->subject_code) ?>

                                    </span>

                                </td>

                                <!-- LECTURER -->
                                <td>

                                    <?= h($subject->lecturer_name) ?>

                                </td>

                                <!-- ACTIONS -->
                                <td class="text-center">

                                    <?= $this->Html->link(
                                        '<i class="bi bi-eye"></i>',
                                        ['action' => 'view', $subject->subject_id],
                                        [
                                            'class' => 'btn btn-sm btn-outline-info me-1',
                                            'escape' => false
                                        ]
                                    ) ?>

                                    <?= $this->Html->link(
                                        '<i class="bi bi-pencil"></i>',
                                        ['action' => 'edit', $subject->subject_id],
                                        [
                                            'class' => 'btn btn-sm btn-outline-primary me-1',
                                            'escape' => false
                                        ]
                                    ) ?>

                                    <?= $this->Form->postLink(
                                        '<i class="bi bi-trash"></i>',
                                        ['action' => 'delete', $subject->subject_id],
                                        [
                                            'confirm' => 'Are you sure you want to delete this subject?',
                                            'class' => 'btn btn-sm btn-outline-danger',
                                            'escape' => false
                                        ]
                                    ) ?>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>

                            <td colspan="4" class="text-center text-muted py-5">

                                No subjects found.

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
                        'Showing {{current}} of {{count}} subjects'
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