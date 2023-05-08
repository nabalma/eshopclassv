<?php
// Cette classe extends le controlleur principal
class Login extends Controller{
  
    
    //*************************************** */
    // FONCTION  INDEX
    //**************************************** */

    // Il sagit ici de la fonction index du controleur Home. En effet, si lurl est home/index, cest cette fonction index qui sexecute. 
    
    public function index(){ 
        
          // *** 1- Connexion de l'utilisateur
        //--------------------------------------------------------------------------------------------
        //Recevoir les données du formulaire, verifier les données et autoriser/refuser la connexion 
        if($_SERVER["REQUEST_METHOD"]=="POST"){

            //1.0- Importer le fichier modele
             //Importation du modele User , necessaire pour le Sign up. En instancier un objet.
         $user = $this->load_model("User"); //Attention, le parametre a provider ici doit etre entre quote (cest un string ) et doit commencer par une majuscule


            //1.1- Execution de la fonction login de la classe User (Appel de la fonction --> Connexion du User)
         $user->login($_POST);
        }

        

        // *** 2- Affichage de la vue
        //--------------------------------------------------------------------------------------------
        //Ici, elle est faite,de par son contenu, pour afficher une vue. La vue index contenu dans le dossier boutique
        $data["title"]="ClassV | Admin";
       $this->view("login/login",$data); // le parametre $path est une chaine de caractere correspondant au chemin du fichier a afficher, a partir du dosseir views
        
                   
   
    }

   

}

?>