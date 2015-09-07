<?php
class LikesController extends AppController {
    public $helpers = array('Html', 'Form');
	
    // Funciona correctamente
	public function like($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Like invalido'));
        }
        if ($this->request->is('post')) {
            
            $this->Like->create();
             $this->request->data['Like']['author'] = $this->Auth->user('id');
             $this->request->data['Like']['post_id'] = $id;
            if ($this->Like->save($this->request->data)) {
                $this->log('Save de Likes', 'debug');
                $this->Session->setFlash(__('Your like has been saved.'));
                return $this->redirect(array('controller' => 'posts','action' => 'view',$id));
            }else{
                $this->Session->setFlash(__('Pero si ya te gusta este post.'), 'flash_notification');
            }
        }else{
        $this->Session->setFlash(__('Debe accederse mediante POST.'));
        }
        return $this->redirect(array('controller' => 'posts','action' => 'view',$id));
    }
    
    

}	
?>