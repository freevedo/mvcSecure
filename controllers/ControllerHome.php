<?php
require_once ('views/View.php');
    class ControllerHome
    {
        private $_articleManager;
        private $_view;

        public function __construct($url)
        {
            if(isset($url) && count($url) > 1)//control le nombre de parametres sur nos differents controllers 
                throw new Exeception('Page introuvable');
            else
                $this->articles();
        }

        public function articles()
        {
            $this->_articleManager = new ArticleManager;
            $articles = $this->_articleManager->getArticles();

            $this->_view = new View('Home');
            $this->_view->generate(array('articles' => $articles));

            // require_once('views/viewHome.php');
        }
    }