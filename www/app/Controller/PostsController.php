<?php
    App::uses('AppController', 'Controller');
class PostsController extends AppController {
    public $helpers = array('Html', 'Form');
	
	public function index() {

        $this->set('posts', $this->Post->find('all'));
		
    }
	// Funciona correctamente
	public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('post', $post);
        $this->set('userLogged',$this->Auth->user());
    }
    
    
    // Funciona correctamente
    public function add() {
        if ($this->request->is('post')) {
            $this->Post->create();
             $this->request->data['Post']['author'] = $this->Auth->user('id');
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash(__('Your post has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your post.'));
        }
    }
    public function delete($id = null) {
        $this->Post->id = $id;
        if (!$this->Post->exists()) {
            throw new NotFoundException(__('Post invalido'));
        }
        if ($this->Post->delete()) {
            $this->Session->setFlash(__('Post borrado'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('No se pudo borrar el post'));
        return $this->redirect(array('action' => 'view',$id));
    }
    
    public function isAuthorized($user) {
    // All registered users can add posts
    if ($this->action === 'add') {
        return true;
    }

    // The owner of a post can edit and delete it
    if (in_array($this->action, array('edit', 'delete'))) {
        $postId = (int) $this->request->params['pass'][0];
        if ($this->Post->isOwnedBy($postId, $user['id'])) {
            return true;
        }
    }

    return parent::isAuthorized($user);
}
    
}
?>