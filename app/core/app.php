<?php 
class App{
    protected $controller = "home";
    protected $method = "index";
    protected $params;

    //Constructeur de l'application
    public function __construct()
    {
        $url=$this->parseURL();
//        show($url);
        
        // **********************************************   
        //          I- CONTROLLEUR  
        //***********************************************
        // Vérfier si le controller contenu dans l'URL existe dans le fichier des controlleurs. On utilisera le controleur trouvé. Le cas echéant, ce sera le home, , valeur defaut de la classe de lattribut de classe.
        if(file_exists("../app/controllers/".strtolower($url[0]).".php"))
        {
            $this->controller=strtolower($url[0]);

            //On a recuperer le controller, donc on le supprime de lURL
            unset($url[0]);    //// Pourquoi on unset seulement lorsquon le trouve
        }

        // Puisqu'on va utiliser le controlleur, on doit le include dans le fichier
        require_once("../app/controllers/".$this->controller.".php");

        //Puisqu'on va utiliser une de proprietes ou methodes du controller , il faut linstancier
        $this->controller = new $this->controller;
        
        // **********************************************   
        //          II- METHODE DU CONTROLLEUR  
        //***********************************************
         
        if(isset($url[1])){

            $url[1]=strtolower($url[1]);
            // Si la methode existe dans le controlleur .On utilisera cette methode. Le cas echéant, ce sera le index, valeur defaut de la classe de lattribut de classe.
            if(method_exists($this->controller,$url[1]))
                {
                $this->method=$url[1]; 
                unset($url[1]); 
                }
        }

//        show($url);

        // **********************************************   
        //          III- LES AUTRES PARAMETRES DE LURL  
        //***********************************************
               
        $this->params = (count($url)>0) ? array_values($url):["home"];  //// Pourquoi le parametres est pris comme étant un controlleur
//        show($this->params);

        // **********************************************   
        //          IV- EXECUTION DE LA METHODE  DE LURL
        //**********************************************

        call_user_func_array([$this->controller,$this->method],$this->params); 
                 
    }


    // Methode qui permet de recuperer lURL
    private function parseURL(){
        $url = isset($_GET['url'])? $_GET['url']:"home";
        return explode("/", filter_var(trim($url,"/"),FILTER_SANITIZE_URL));

    }

}
?>