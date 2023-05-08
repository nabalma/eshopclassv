<?php
class Controller{

    // La function view du controlleur principal qui permet dafficher une vue. (Elle prend deux parametres, et son affichage est juste un include)
    protected function view($path,$data=[]){
        if(file_exists("../app/views/".$path.".php"))
            {
                include "../app/views/".$path.".php"; 
            }       
    }


    // La function loadModel du controlleur principal qui permet dinclude la classe du modele dont on aura besoin. (Elle prend un parametre,le nom de la classe)
    // On profite ici pour instancier la classe et retourner un objet de cette classe lorsque cette fonction est appelée.
    protected function load_model($model){

        if(file_exists("../app/models/".strtolower($model).".class.php"))
        {
            include "../app/models/".strtolower($model).".class.php";
            $modelClass = new  $model(); //Attention, A cause de cette instruction, le parametre a provider ici doit commencer par une majuscule, Cest un string ...
            return $modelClass;
        }

        return false;       
}

}
?>