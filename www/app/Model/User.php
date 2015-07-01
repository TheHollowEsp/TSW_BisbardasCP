<?php
    // app/Model/User.php
App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
class User extends AppModel {
    
     public $hasMany = 'Friendship';

    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'El username es obligatorio'
            )
        ),
        'email' => array(
            'valid' => array(
                'rule' => array('notEmpty'),
                'message' => 'El email es obligatorio',
                
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'La contraseña es obligatoria'
            )
        ),
        'img' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'La foto es obligatoria'
            )
        )
        
    );


    public function beforeSave($options = array()) {
        $this->data[$this->alias]['registered'] = date("Y-m-d H:i:s");
        if (!empty($this->data[$this->alias]['password'])) {
            $passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256'));
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                $this->data[$this->alias]['password']
            );
        }
        return true;
    }
}




?>