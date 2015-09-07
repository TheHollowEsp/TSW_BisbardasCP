<!-- File: /app/View/Posts/index.ctp -->
<button onclick="window.location.href='<?php echo Router::url(array('controller'=>'posts', 'action'=>'add'))?>'"><?php echo __('Publicar post') ?></button>

    <?php foreach ($posts as $post): ?>
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
            <div class="mtext">
              <span class="more-tag"> 
                <?php echo $this->Html->link(__('Leer la noticia completa'),
            array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?></span>
            </div>
          </div>
          <div class="social">
            <span class="like-button"></span>
            <span class="social-resume"></span>
          </div>
        </div>
        <div style="clear: both;"></div>
</div>
<?php endforeach; ?>
<?php unset($post); ?>