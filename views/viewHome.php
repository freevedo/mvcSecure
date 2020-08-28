<?php $this->_t = 'Mon blog';
    foreach($articles as $article): ?>
    <h2><?= $article->getTitle()?></h2>
    <p><?= $article->getContent()?></p>
    <div></div>
        
<?php endforeach; ?>
