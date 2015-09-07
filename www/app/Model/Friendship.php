<?php
class Friendship extends AppModel {
  //var $name = 'Friendship';
  public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user'
        )
    );
  
  // Funciona correctamente
  public function beforeSave($options = array()) {
            
            $this->log('BeforeSave de Friends', 'debug');
            $idUser = $this->data['Friendship']['user'];
            $idFriend = $this->data['Friendship']['friend'];
            $valido1 = $this->find('count',array(
            'conditions' => array('Friendship.user' => $idUser,'Friendship.friend' => $idFriend)
        ));
            $valido2 = $this->find('count',array(
            'conditions' => array('Friendship.user' => $idFriend,'Friendship.friend' => $idUser)
        ));
   
        if (($valido1 == 0)&&($valido2 == 0)){
            $this->log('Friendship valido', 'debug');
            return true;
        }else{            
            return false;
        }
    
    }
    
    public function conseguirInfo($pendientes){
        foreach ($pendientes as $pend){
            $userI = $this->User->read($pend['Friendship']['user']);
            $this->log($userI, 'debug');
            $pend['User']['img'] = $userI['User']['img'];
            $pend['User']['username'] = $userI['User']['username'];
            $pend['User']['id'] = $userI['User']['id'];
        }
     unset($userI);
     return $pendientes;
    }
    
    public function getFriends($id){
        $friends1 = $this->find('all',array(
            'conditions' => array('Friendship.user' => $id,'Friendship.friendStatus' => "'accepted'")
        ));
        $friends2 = $this->find('all',array(
            'conditions' => array('Friendship.friend' => $id,'Friendship.friendStatus' => "'accepted'")
        ));
        $friends = array_merge($friends1,$friends2);
        return $friends;
    }	
    
    public function confirm($id){
        $this->updateAll(
            array('Friendship.friendStatus' => "'accepted'"),                    
            array('Friendship.id' => $id)
        );
        
    }
    
     
}

?>