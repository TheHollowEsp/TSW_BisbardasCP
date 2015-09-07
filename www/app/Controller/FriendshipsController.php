<?php
class FriendshipsController extends AppController {
    public $helpers = array('Html', 'Form');
	
    
    
    // Funciona correctamente
	public function add($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Usuario invalido'));
        }
        if ($this->request->is('post')) {
            
             $this->Friendship->create();
             $this->request->data['Friendship']['user'] = $this->Auth->user('id');
             $this->request->data['Friendship']['friend'] = $id;
             $this->request->data['Friendship']['userStatus'] = 'accepted';
            if ($this->Friendship->save($this->request->data)) {
                $this->log('Save de frienship', 'debug');
                $this->Session->setFlash(__('Tu solicitud de amistad ha sido enviada.'));
                return $this->redirect(array('controller' => 'users','action' => 'view',$id));
            }else{
                $this->Session->setFlash(__('Pero si ya eres amigo de este usuario.'));
            }
        }else{
        $this->Session->setFlash(__('Debe accederse mediante POST.'));
        }
        return $this->redirect(array('controller' => 'users','action' => 'view',$id));
    }
    
    public function viewPending($id = null){
        if (!$id) {
                throw new NotFoundException(__('Usuario invalido')); 
        }
        $pendings = $this->Friendship->find('all',array(
        'conditions' => array('Friendship.friend' => $id, 'Friendship.friendStatus' => 'pending')
        ));
        $this->log($pendings, 'debug');
        $pendingData = $this->Friendship->conseguirInfo($pendings);
        $this->set('pendingData',$pendingData);
        
        
    }
    
    public function confirm($id = null){
        $this->log('Friendship', 'debug');
        if (!$id) {
            throw new NotFoundException(__('Amistad invalida'));
        }   
        if ($this->request->is('post')) {
        $this->log('Post de frienship', 'debug');
        $this->Friendship->confirm($id);
        $this->Session->setFlash(__('Amistad confirmada.'));
        
    }else{
        $this->Session->setFlash(__('Debe accederse mediante POST.'));
        }
        return $this->redirect(array('controller' => 'users','action' => 'index'));
        }
    
    
        
}
?>