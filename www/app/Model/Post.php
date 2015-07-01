<?php
App::uses('AppModel', 'Model');
class Post extends AppModel {
    public $hasMany = 'Like';
    //public $belongsTo = 'User';
    public $validate = array(
        'title' => array(
            'rule' => 'notEmpty'
        ),
        'body' => array(
            'rule' => 'notEmpty'
        )
    );
    
 public function isOwnedBy($post, $user) {
    return $this->field('id', array('id' => $post, 'author' => $user)) !== false;
}
    
public function addLike($id){       
        $this->updateAll(
            array('Post.likes' => 'Post.likes+1'),                    
            array('Post.id' => $id)
        );        
    }
}
?>