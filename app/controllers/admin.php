<?php
// Cette classe extends le controlleur principal
class Admin extends Controller{
  
    
    //*************************************** */
    // FONCTION DAFFICHAGE DE LA VUE INDEX
    //**************************************** */

    // Il sagit ici de la fonction index du controleur Home. En effet, si lurl est home/index, cest cette fonction index qui sexecute. 
    
    public function index(){  
        









        // *** 2- Affichege de la vue
        //--------------------------------------------------------------------------------------------
        //Ici, elle est faite,de par son contenu, pour afficher une vue. La vue index contenu dans le dossier boutique
        $data["title"]="ClassV | Admin";
       $this->view("admin/index",$data); // le parametre $path est une chaine de caractere correspondant au chemin du fichier a afficher, a partir du dosseir views
   
   
   
    }




}

?>