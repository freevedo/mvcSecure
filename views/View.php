<?php
     class  View
     {
         private $_file;
         private $_t;

         public function __construct($action)
         {
             $this->_file = 'views/view'.$action.'.php';
         }

         //genere et affiche la vue
         public function generate($data)
         {
             //partie specifique de la vue sans le header et le footer
             $content = $this->generateFile($this->_file,$data);

             $view = $this->generateFile('views/template.php',array('t'=> $this->_t,'content' => $content));

             echo $view;
         }

         //genere un fichier vue et renvoie le resultat produit
         private function generateFile($file,$data)
         {
             if(file_exists($file))
             {
                 extract($data);

                 ob_start();
                //inclure le fichier vue
                 require $file;

                 return ob_get_clean();
             }
             else
                throw new Exception('Fichier '.$file.' introuvable');
         }
     }