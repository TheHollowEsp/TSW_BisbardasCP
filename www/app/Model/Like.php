<?php
App::uses('AppModel', 'Model');
class Like extends AppModel {
    //public $belongsTo = 'User';
    public $belongsTo = 'Post';
    
public function beforeSave($options = array()) {
            $this->log('BeforeSave de Likes', 'debug');
            $idLiker = $this->data['Like']['author'];
            $idPost = $this->data['Like']['post_id'];
            $valido = $this->find('count',array(
            'conditions' => array('Like.author' => $idLiker,'Like.post_id' => $idPost)
        ));
            
        if ($valido === 0){
            $this->Post->addLike($idPost);
            return true;
        }else{
            
            return false;
        }
    
    }	
}
?>