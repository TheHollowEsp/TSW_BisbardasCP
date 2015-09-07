<!-- File: /app/View/Posts/view.ctp -->
<?php $imageAv = 'posts/' . $post['Post']['imgPath'];?>
   <div class="bb-post">        
        <div class="post-image">
         <?php echo $this->Html->image('posts/' . $post['Post']['imgPath'], array('alt' => $post['Post']['title']));?> 
        </div>
        <div class="post-body">
          <div class="title">
           <?php echo $post['Post']['title']; ?>
          </div>
          <div class="content">
            <div class="ctext">
              <p><?php echo $post['Post']['body']; ?></p>
            </div>
            
          </div>
          <div class="social">
            <span class="like-button">
            
             <?php echo $this->Form->postLink('Me gusta',array('controller' => 'likes','action' => 'like',$post['Post']['id']))?></button>
            <?php  
             if ($post['Post']['author'] === $userLogged['id']){ //Si eres el propietario, borrar
             ?> 
                <button onclick="window.location.href='<?php echo Router::url(array('controller'=>'posts', 'action'=>'delete',$post['Post']['id']))?>'"><?php echo __('Borrar post') ?></button>   
             <?php } ?></span>
            <span class="social-resume"><?php        
                $likes = $post['Post']['likes']; // Numero de likes
                if ( $likes > '0'){
                    if ( $likes === '1'){
                        echo 'A un jubileta le gusta esto';    
                    }else{
                        echo 'A ' . $likes . ' jubiletas les gusta esto';    
                    }
                } 
             ?> </span>
          </div>
          <div class="clear-float"></div>
        </div>
        <div class="clear-float"></div>
</div>