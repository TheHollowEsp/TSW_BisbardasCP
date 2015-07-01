<!-- File: /app/View/Posts/view.ctp -->

<h1><?php echo h($post['Post']['title']); ?></h1>

<p><small>Created: <?php echo $post['Post']['created']; ?></small></p>

<p><?php echo h($post['Post']['body']); ?></p>

    <?php
        if ($post['Post']['author'] === $userLogged['id']){ //Si eres el propietario, borrar
            echo $this->Form->postLink('Borrar',array('controller' => 'posts','action' => 'delete',$post['Post']['id']));   
        }
        $likes = $post['Post']['likes']; // Numero de likes
        if ( $likes > '0'){
            if ( $likes === '1'){
                echo 'A un jubileta le gusta esto';    
            }else{
                echo 'A ' . $likes . ' jubiletas les gustas esto';    
            }
        }
    
    echo $this->Form->postLink('Like',array('controller' => 'likes','action' => 'like',$post['Post']['id']));//Dale a Like       
    
    echo $this->Form->create('Post',array('url' => array('controller' => 'posts', 'action' => 'add'))); //Cambiamos de accion
    echo $this->Form->input('title');
    echo $this->Form->hidden('parent_id', array('value' => $post['Post']['id']));
    echo $this->Form->input('body', array('rows' => '2'));
    echo $this->Form->end('Comentar');
    
    ?>