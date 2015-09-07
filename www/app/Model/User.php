<?php
    // app/Model/User.php
App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
class User extends AppModel {
    
     //No activar hasta que quieras que pete
     public $hasMany = array(
        'User' => array(
            'className' => 'Friendship',
            'foreignKey' => 'user'
        )
    );

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
            ),
            'length' => array(
                'rule'  => array('between', 4, 40),
                'message'   =>  'Entre 4 y 40 caracteres.',
            ),
        ),
        'password2' => array(
            'length' => array(
            'rule'      => array('between', 4, 40),
            'message'   => 'Entre 4 y 40 caracteres.',
            ),
            'compare'    => array(
            'rule'      => array('validate_passwords'),
            'message' => 'The passwords you entered do not match.',
            )
        ),
        'img' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'La foto es obligatoria'
            )
        )
        
    );

   
    // Pone la fecha en la request y encripta la password
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
    
    public function validate_passwords() {
        return $this->data[$this->alias]['password'] === $this->data[$this->alias]['password2'];
    }
}

    


?>