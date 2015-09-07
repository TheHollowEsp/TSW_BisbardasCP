<!-- File: /app/View/Friendships/viewPending.ctp -->

<div class="pendtitle">
        <?php echo  __('Éstas son tus solicitudes de amistad pendientes'); ?>
    </div>

<ul>  
    <?php foreach ($pendingData as $pending): ?>
    <li>
        <?php echo $this->Html->image('profiles/' . $pending['User']['img'], array('alt' => $pending['User']['username'])); ?>
        <p><?php echo $this->Html->link($pending['User']['username'],array('controller' => 'users', 'action' => 'view', $pending['User']['id'])); ?></p>
         <p><?php echo $this->Form->postLink('Aceptar',array('controller' => 'friendships','action' => 'confirm',$pending['Friendship']['id']));?></p>
        
    </li>
        <?php endforeach; ?>
        <?php unset($pendings); ?>
    </ul>
</div>
    
    
    