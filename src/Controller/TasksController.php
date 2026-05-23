<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Tasks Controller
 *
 * @property \App\Model\Table\TasksTable $Tasks
 */
class TasksController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
 
// src/Controller/TasksController.php

public function index()
{
    // Ambil semua task, susun ikut task terbaru
    $query = $this->Tasks->find()
        ->orderBy(['task_id' => 'DESC']);

    // Pagination: 5 rekod setiap page
    $tasks = $this->paginate($query, [
        'limit' => 5
    ]);

    // Hantar data ke view
    $this->set(compact('tasks'));
}

    /**
     * View method
     *
     * @param string|null $id Task id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
   public function view($id = null)
{
    $task = $this->Tasks->get($id, [
        'contain' => ['Users', 'Subjects'],
    ]);

    $this->set(compact('task'));
}

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
   // src/Controller/TasksController.php

public function add()
{
    $task = $this->Tasks->newEmptyEntity();

    if ($this->request->is('post')) {
        $data = $this->request->getData();

        // Set user_id sementara
        $data['user_id'] = 1;

        // Jika status kosong, set Pending
        if (empty($data['status'])) {
            $data['status'] = 'Pending';
        }

        // Patch semua data termasuk subject_name yang ditaip
        $task = $this->Tasks->patchEntity($task, $data);

        if ($this->Tasks->save($task)) {
            $this->Flash->success('Task has been saved successfully.');
            return $this->redirect(['action' => 'index']);
        }

        $this->Flash->error('Unable to save task.');
    }

    $this->set(compact('task'));
}
    /**
     * Edit method
     *
     * @param string|null $id Task id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $task = $this->Tasks->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $task = $this->Tasks->patchEntity($task, $this->request->getData());
            if ($this->Tasks->save($task)) {
                $this->Flash->success(__('The task has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The task could not be saved. Please, try again.'));
        }
        $users = $this->Tasks->Users->find('list', limit: 200)->all();
        $subjects = $this->Tasks->Subjects->find('list', limit: 200)->all();
        $this->set(compact('task', 'users', 'subjects'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Task id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $task = $this->Tasks->get($id);
        if ($this->Tasks->delete($task)) {
            $this->Flash->success(__('The task has been deleted.'));
        } else {
            $this->Flash->error(__('The task could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
