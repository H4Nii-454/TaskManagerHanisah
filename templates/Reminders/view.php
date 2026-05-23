<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reminder $reminder
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Reminder'), ['action' => 'edit', $reminder->reminder_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Reminder'), ['action' => 'delete', $reminder->reminder_id], ['confirm' => __('Are you sure you want to delete # {0}?', $reminder->reminder_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Reminders'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Reminder'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="reminders view content">
            <h3><?= h($reminder->reminder_status) ?></h3>
            <table>
                <tr>
                    <th><?= __('Task') ?></th>
                    <td><?= $reminder->hasValue('task') ? $this->Html->link($reminder->task->task_title, ['controller' => 'Tasks', 'action' => 'view', $reminder->task->task_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Reminder Status') ?></th>
                    <td><?= h($reminder->reminder_status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Reminder Id') ?></th>
                    <td><?= $this->Number->format($reminder->reminder_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Reminder Date') ?></th>
                    <td><?= h($reminder->reminder_date) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>