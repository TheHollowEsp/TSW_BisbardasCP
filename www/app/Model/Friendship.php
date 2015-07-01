<?php
App::uses('AppModel', 'Model');
class Frienship extends AppModel {

    public $belongsTo = 'User';
    
public function beforeSave($options = array()) {
           
        if ($valido === 0){

            return true;
        }else{
            
            return false;
        }
    
    }	
}
?>