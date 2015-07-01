<?php
// app/Controller/UsersController.php
App::uses('AppController', 'Controller');
App::uses('String', 'Utility');

class UsersController extends AppController {

     public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }
    
    // Funciona correctamente
    public function beforeFilter() {
        parent::beforeFilter();
        // Permisos de los usuarios
        $this->Auth->allow('add', 'logout','view');
    }
    
    // Funciona correctamente
    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Session->setFlash(__('Combinación de user/pass inválida.'));
        }
    }
    
    // Funciona correctamente
    public function logout() {
        return $this->redirect($this->Auth->logout());
    }
   
    // Funciona correctamente
    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuario inválido'));
        }
        // Pasa la variable user a la vista view        
        $this->set('userLogged',$this->Auth->user());
        $this->set('user', $this->User->read(null, $id));
    }
    
    // Funciona correctamente 
    public function add() {
        if ($this->request->is('post')) {
            if(!empty($this->request->data)) {
                    // Si hay imagen
                    if(!empty($this->request->data['User']['upload'])){
                        $this->log('Veo la imagen', 'debugUser');
                        $file = $this->request->data['User']['upload'];                        
                        move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img\profiles/' . $file['name']);
                        $this->request->data['User']['img'] = $file['name'];                     
                    }                    
                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash(__('Se ha guardado el usuario.')); 
                    return $this->redirect(array('action' => 'login'));                    
                }               
            }else{
            $this->Session->setFlash(__('No se pudo guardar el usuario, inténtelo de nuevo.'));
            }            
        }
    }
    
    // Vista lista, auth incorrecto
    public function edit($id = null) {
        $this->log($this->request->data, 'debug');
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuario inválido'));
            return $this->redirect(array('action' => 'login'));
        }
        
        // Si la peticion es POST o PUT, guarda el usuario de la variable data
        if ($this->request->is('post') || $this->request->is('put')) {
            if (!empty($this->request->data['User']['currentPassword'])) {
                $passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256'));
                $this->request->data['User']['currentPassword'] = $passwordHasher->hash($this->request->data['User']['currentPassword']);
            }            
            if($this->Auth->user('password') === $this->request->data['User']['currentPassword']){
              $this->request->data['User']['password'] = $this->request->data['User']['newpassword'];
                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash(__('Se ha guardado el usuario.'));
                    
                    return $this->redirect(array('action' => 'view',$id));
                }
                $this->Session->setFlash(
                    __('No se pudo guardar el usuario, inténtelo de nuevo.')
                );
            }else{
                $this->Session->setFlash(__('Incorrect password.'));
                return $this->redirect(array('action' => 'view',$id));
                }
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
            $this->Session->setFlash(__('Acceso denegado.'));
                return $this->redirect(array('action' => 'view',$id));
        }
    }
    
    // Funciona correctamente
    public function delete($id = null) {
        //$this->request->allowMethod('post'); 

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuario invalido'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('Usuario borrado'));
            return $this->redirect(array('action' => 'logout'));
        }
        $this->Session->setFlash(__('No se pudo borrar el usuario'));
        return $this->redirect(array('action' => 'view',$id));
    }
        
}
?>