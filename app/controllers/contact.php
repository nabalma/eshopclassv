<?php





// Cette classe extends le controlleur principal
class Contact extends Controller{
  
    
    //*************************************** */
    // FONCTION DAFFICHAGE DE LA VUE INDEX
    //**************************************** */

    // Il sagit ici de la fonction index du controleur Home. En effet, si lurl est home/index, cest cette fonction index qui sexecute. 
    
    public function index(){ 
        
        unset($_SESSION["msg_error"]);

         // *** 1- 
        //--------------------------------------------------------------------------------------------
        //Recevoir les données du formulaire Contact
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            


        //1.0- Importer le fichier modele Message
        //Importation du modele Message , necessaire pour le Save. En instancier un objet.
         $msg = $this->load_model("Message"); //Attention, le parametre a provider ici doit etre entre quote (cest un string ) et doit commencer par une majuscule



         //1.1- Execution de la fonction Save de la classe Message (Appel de la fonction --> Save du message)
        $msg->save($_POST);

                

           
        }

        









        // *** 2- Affichege de la vue
        //--------------------------------------------------------------------------------------------
        //Ici, elle est faite,de par son contenu, pour afficher une vue. La vue index contenu dans le dossier boutique
        $data["title"]="ClassV | Contacts";
       $this->view("contacts/index",$data); // le parametre $path est une chaine de caractere correspondant au chemin du fichier a afficher, a partir du dosseir views
   
   
   
    }




}

?>