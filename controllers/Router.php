<?php
    require_once('views/View.php');    
    /**
     * Router
     * controlle tous les controlleurs et se charge dappeler le bon controleur
     */
    class Router 
    {        
        /**
         * _ctrl
         * _view
         * @var mixed
         */
        private $_ctrl;
        private $_view;
        
        /**
         * routeReq
         *
         * @return void
         */
        public function routeReq()
        {
            try
            {
                //chargement automatique des classes
                spl_autoload_register(function($class){
                    require_once('models/'.$class.'.php');
                });

                $url = '';
                //controlller les differentes actions de l'user
                if(isset($_GET['url']))
                {
                    //recuperer tous les parametres de lurl de facon separer et securiser ce que l'on recupere
                    $url = explode('/',filter_var($_GET['url'],FILTER_SANITIZE_URL));

                    //gere l'appel du bon controller suivant l'action de l'utilisateur
                    $controller = ucfirst(strtolower($url[0]));
                    $controllerClass = "Controller".$controller;
                    $controllerFile  = "controllers/".$controllerClass.".php";

                    //verify if file exist
                    if(file_exists($controllerFile))
                    {
                        require_once($controllerFile);
                        $this->_ctrl = new $controllerClass($url);
                    }
                    else
                    {
                        throw new Exception('Page introuvable');
                    }
                }
                else//charge la page de defaut lorsque on fait pas appel a une page en particulier
                {
                    require_once('controllers/ControllerHome.php');
                    $this->_ctrl = new ControllerHome($url);
                }
            }
            //gestion des erreurs
            catch(Exception $e)
            {
                $errorMsg = $e->getMessage();
                $this->_view = new View('Error');
                $this->_view->generate(array('errorMsg' => $errorMsg));
                // require_once ('views/viewError.php');//charger page d'erreur
            }
        }
    }