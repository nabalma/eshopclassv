<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class User {

        // La variable de collecte des erreurs. 
        //1- La seule variable qui se verra cumulative des erreurs eventuelles. 
        //2-Comme cest une variable derreur, On ne la chargera quen cas derreur (on utilisere le !  la negation, sil le faut) 
    private $loginerror = "";
    private $reseterror="";
    private $register_error="";
    
   
   
    /**********************************************************
                     I- SIGN UP FONCTION
    ***********************************************************/

    public function signUp($post){
            
        //1.1 -- Instanciation de la BD, Ne pas instancier une db car il se peut qune soit deja instancier quelque part. Faire plutot get instance...
        $db=Database::getDbInstance();

        
        //1.2 -- Collecte des donnees recues 
        $name = trim($post['name']);
        $firstname = trim($post['firstname']);
        $email = trim($post['email']);
        $phone = trim($post['phone']);
        $password = trim($post['password']);
        $repassword =trim($post['repassword']);
        $profil =trim($post['profil']);
    
      //  preg_match("//"); Et on met a linterieur des slash la valeur de la regex



      /*    1.3 -- Validation du nom
            --------------------------------------------------------------------------------
        -	A valid name should start with an alphabet so, [A-Za-z].
        -  All other characters can be alphabets, numbers or an underscore so, [A-Za-z0-9_].
        - Since length constraint was given as 5-15 and we had already fixed the first character, so we give {4,14}.
      */

        if(empty($name) OR !preg_match("/^[A-Za-z][A-Za-z0-9_]{4,14}$/",$name)){
            $this->register_error.=" - Prière entrez un nom valide. Le nom doit etre entre 3 et 15 caractéres ! <br>";
        };


        
      /*    1.4 -- Validation du prenom (firstname)
            --------------------------------------------------------------------------------
        -	A valid firstname should start with an alphabet so, [A-Za-z].
        -  All other characters can be alphabets, numbers or an underscore so, [A-Za-z0-9_].
        - Since length constraint was given as 5-15 and we had already fixed the first character, so we give {4,14}.
      */

      if(empty($firstname) OR !preg_match("/^[A-Za-z][A-Za-z0-9_]{4,14}$/",$firstname)){
        $this->register_error.=" - Prière entrez un prénom valide. Le prénom doit etre entre 3 et 15 caractéres ! <br>";
    };


         /* 1.4 -- Validation de lemail
            --------------------------------------------------------------------------------
       Simple email expression. 
       Doesn't allow numbers in the domain name and doesn't allow for top level domains that are less than 2 or more than 3 letters (which is fine until they allow more). 
       Doesn't handle multiple &quot;.&quot; in the domain (joe@abc.co.uk).
      */

        if(empty($email) OR !preg_match("/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/",$email)){
          $this->register_error.=" - Prière entrez un email valide. Simple email au format habituel : email@domaine.extension <br>";
        } 


        
         /* 1.4 -- Validation du phone
            --------------------------------------------------------------------------------
       Phone number in Canada like 438-278-2589
      */

      if(empty($phone) OR !preg_match("/^(\(\+[0-9]{2}\))?([0-9]{3}-?)?([0-9]{3})\-?([0-9]{4})(\/[0-9]{4})?$/",$phone)){
        $this->register_error.=" - Prière entrez un numéro de téléphone valide : 111-111-1111 <br>";
    } 



        /* 1.5 -- Validation of password input
            --------------------------------------------------------------------------------
      Minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character:
      */
      if(empty($password) OR empty($repassword) OR !preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/",$password) OR !preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/",$repassword)){
        $this->register_error.=" - Prière entrez un mot de passe valide : 8 lettres minimum, Au moins une majuscule, Au moins une minuscule, Au moins un chiffre et Au moins un caractére spécial <br>";
    } 

    /*1.6 -- Checking the Matching of the two passwords provided */

    if($password !== $repassword){
      $this->register_error.=" - Les mots de passe entrés ne correspondant pas <br>";
    }

    // Verification que l'utilisateur n'est pas deja dans la base de donnees 
    // before saving the user, check if the email is not yet already in the database
    $query="SELECT * FROM users WHERE email =:email";
    $data["email"]=$email;
    $check=$db->read($query,$data);
    if(count($check)>0){
      $this->register_error.="Oups, cet courriel est déja utilisé. Merci d'essayer un autre ! <br>";
    }


    
      /*  Saving the user in the db 
     --------------------------------------------------------------------------------*/
    if($this->register_error==""){

      // Hashage du password
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
      // Enregistrement de lutilisateur et affichage du message de succees 
        // Parametrized query. The values are preceded with : with the same names of the database table column names
       $query ="INSERT INTO users(nom,prenom,email,telephone,motdepasse,profil) VALUES(:nom,:prenom,:email,:telephone,:motdepasse,:profil)";
       
        // The data to be used to execute the request. data is an array Object. its values will be the parameters of the query
        $data["nom"]=$name;
        $data["prenom"]= $firstname;
        $data["email"]=$email;
        $data["telephone"]=$phone;
        $data["motdepasse"]= $hashed_password;
        $data["profil"]=$profil;
       
        $result = $db->write($query,$data);
        
    }
  
      /*
      ---------Creation dune session pour sauvegarder les erreurs, et eventuellement les afficher dans la page Sign up 
      */
      $_SESSION["register_error"]=$this->register_error; 
        
    }





    public function collect_SignUp_Data($post){
      
    }

    public function check_SignUp_Data($post){
      
    }

    public function SignUp_Data($post){
      
    }







/*******************************************************************
                 II- LOGIN FONCTION
********************************************************************/    
    public function login($post){

      unset($_SESSION["login_error"]);
      unset($_SESSION["connectedUser"]);
            
       //1.1 -- Instanciation de la BD, Ne pas instancier une db car il se peut qune soit deja instancier quelque part. Faire plutot get instance...
       $db=Database::getDbInstance();
      
       //1.2 -- Collecte des donnees recues 
      
       $email = trim($post['email']);
       $password = trim($post['password']);

       
     // 1.3 -- Validation de l'email non vide 
          
       if(empty($email)){
           $this->loginerror.=" - Vous devez indiquer une adresse email ! <br> ";
       };
      
     //   1.4 -- Validation du mot de passe non vide

           if(empty($password)){
            $this->loginerror.="- Vous devez indiquer un mot de passe ! <br>";
        };

    //    1.5 -- Verification de lexistance du compte(Verification dans la base de données)

          // 1.5-1 -- before saving the user, check if the email is  in the database
          $query="SELECT * FROM users WHERE email =:email";
          $data["email"]=$email;
          $check=$db->read($query,$data);

          // 1.5-1-1 -- If the user is not in the db
          if(count($check)==0){
            $this->loginerror.="Oups, Courriel et/ou Mot de passe incorrecte (s). Merci de réessayer ! <br>";
          } 
          // 1.5-1-2 -- If the user is in the db
          else{
            $db_hashed_pass=$check[0]["motdepasse"];

            // 1.5-1-2-1 -- If the password matches
            if (password_verify($password, $db_hashed_pass)) {
             $_SESSION["connectedUser"]=$check;
             if($_SESSION["connectedUser"][0]["profil"]=="client"){
              
             header("Location: ". ROOT ."home");
             exit;

             }else{

              header("Location: ". ROOT ."admin");
              exit;

             }
            
             
            
          } 
           // 1.5-1-2-2 -- If the password does not match
          else {
            $this->loginerror.="Oups, Courriel et/ou Mot de passe incorrecte (s). Merci de réessayer ! <br>";
          }

          }

    $_SESSION["login_error"]=$this->loginerror; 
    }




    /***********************************************************
                 III- RESET PASSWORD FONCTION
    ************************************************************/    
    public function resetpassword($post){
     
      //1.1 -- Instanciation de la BD, Ne pas instancier une db car il se peut qune soit deja instancier quelque part. Faire plutot get instance...
      $db=Database::getDbInstance();
     
      //1.2 -- Collecte des donnees recues 
      $email = trim($post['email']);
     

    /*1.3 -- Validation de l'email (Verification que le champ de saisie de l'email n'est pas saisie)
          --------------------------------------------------------------------------------
    */
      if(empty($email)){
          $this->reseterror.=" - Vous devez indiquer une adresse email ! <br> ";
      };


       /*1.4 -- Validation de l'email (Verification que ce Email existe dans la base de données)
          --------------------------------------------------------------------------------
    */
  
    // 1.4-1 -- before saving the user, check if the email is  in the database
    $query="SELECT * FROM users WHERE email =:email";
    $data["email"]=$email;
    $check=$db->read($query,$data);

    //Si le count, ou le nbre de lignes retournées =0
    if(count($check)==0){
      $this->reseterror.=" - Cet email n'est pas enregistré dans la boutique. Merci de revérifier ! <br> ";
    }else{
              if($_SESSION["reset_error"]=="")/*Si lemail est dans la base de données et il ya pas derreur de saisie */
              {
              
            //Create an instance; passing `true` enables exceptions
            $mail=new PHPMailer(true);
            
            try {
              //Server settings
        //      $mail->SMTPDebug=SMTP::DEBUG_SERVER;           //Enable verbose debug output
        //      $mail->SMTPDebug=3;                            //To get more verbose debug output

              $mail->isSMTP();                                //Send using SMTP
              $mail->SMTPAuth=true;                         //Enable SMTP authentication  
              
              $mail->Host=SMTP_SERVER_HOST;                //Set the SMTP server to send through  // mail.mochahost.com or smtp.gmail.com
              $mail->SMTPSecure='ssl';                      //Enable implicit TLS encryption. Or use ssl if required
              $mail->Port=465;                              //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS` or 465 if you are using SSL
              
              
              $mail->Username=SMTP_SERVER_USERNAME; //SMTP username. This is the sender email. The email whon the smtp server is coming from. The adresse gmail if smtp gmail is used
              $mail->Password=SMTP_SERVER_PASSWORD;          //SMTP password. The password for the account (for gmail in less secured case) or the password for the application that goes throught the SMTP
                                              
              
              //Recipients
              $mail->setFrom(SMTP_SET_FROM_EMAIL,SMTP_SET_FROM_NAME); // gmail adress, gmail user name . The account credentiels for the smtp user in the smtp server 
              $mail->addAddress($email);     //Add a recipient

                //Content
              // $mail->isHTML(true);                                  //Set email format to HTML
                
                
                $mail->Subject = "Changement de Mot de Passe / Password Resetting";                         // Setting the subject

                $content="Bonjour .\n";                      // setting the content format
                $content.="Merci de suivre ce lien pour la modification de votre mot de passe ci dessous .\n ";
                $content.="Please, follow the link below to reset your password .\n ";

                $mail->Body = mb_convert_encoding($content,'UTF-8');                          // setting the body of the email with an encoding that allow the accents


        //       $mail->AltBody = 'This is the body in plain text for non-HTML mail clients'
            
          
              //Attachments
        //      $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //      $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
          
        //disable the SMTP certificate verification if required
        $mail->SMTPOptions = array(
          'ssl' => array(
              'verify_peer' => false,
              'verify_peer_name' => false,
              'allow_self_signed' => true
          )
        );
              
            
              $mail->send();                                            // Send the email
//              echo 'Message has been sent';
                  
            } catch (Exception $e) {                                    // Or catch the exception if applicable
              echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
                           
          }; 

    };

    $_SESSION["reset_error"]=$this->reseterror;

  
   }






   
    







    public function delete($url){

    }

    public function get_user($url){

    }

    public function get_users(){

    }



   

}

?>