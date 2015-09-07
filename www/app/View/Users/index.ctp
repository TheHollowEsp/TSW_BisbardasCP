<!-- File: /app/View/Users/index.ctp -->
   
    <div class="pendtitle">
        <?php echo  __('Éstos son los usuarios de la plataforma'); ?>
    </div>
    <ul>
    <?php foreach ($users as $user): ?>
        <li>
            <?php 
                echo $this->Html->image('profiles/'.$user['User']['img'], array(
                      "alt" => $user['User']['username'],
                      'url' => array('controller' => 'users', 'action' => 'view',$user['User']['id'])
                    )); 
                ?>
            <p> <?php echo $user['User']['username'] ?> </p>  
        </li>
    
    <?php endforeach; ?>
    <?php unset($user); ?>
    </ul>

