<?php $this->_t = 'Mon blog';
    foreach($articles as $article): ?>
    <h2><?= $article->getTitle()?></h2>
    <p><?= $article->getContent()?></p>
<?php endforeach; ?>
<?php 
    foreach($images as $image): ?>
    <h2><?= $image->getTitle()?></h2>
    <?php endforeach; ?>