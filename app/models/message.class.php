<?php

   //Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;




class Message {


  
   // La variable de collecte des erreurs. 
        //1- La seule variable qui se verra cumulative des erreurs eventuelles. 
        //2-Comme cest une variable derreur, On ne la chargera quen cas derreur (on utilisere le !  la negation, sil le faut) 
        private $msg_error = "";
    
   
        /*********************************************
                     I- SAVE MESSAGE
        **********************************************/

    public function save($post){
            
        //1.1 -- Instanciation de la BD, Ne pas instancier une db car il se peut qune soit deja instancier quelque part. Faire plutot get instance...
        $db=Database::getDbInstance();

        
       
        //1.2 -- Collecte des donnees recues 
        $name = trim($post['name']);
        $email = trim($post['email']);
        $phone = trim($post['phone']);
        $subject = trim($post['subject']);
        $message = trim($post['message']);
       
    
      //  preg_match("//"); Et on met a linterieur des slash la valeur de la regex



      /*    1.3 -- Validation du nom
            --------------------------------------------------------------------------------
        -	A valid name should start with an alphabet so, [A-Za-z].
        -  All other characters can be alphabets, numbers or an underscore so, [A-Za-z0-9_].
        - Since length constraint was given as 5-30 and we had already fixed the first character, so we give {4,29}.
      */

        if(empty($name) OR !preg_match("/^[A-Za-z][A-Za-z0-9_]{4,29}$/",$name)){
            $this->msg_error.=" - Prière entrez un nom valide: Au moins 5 caractères ! <br>";
        };

        
         /* 1.4 -- Validation de lemail
            --------------------------------------------------------------------------------
       Simple email expression. 
       Doesn't allow numbers in the domain name and doesn't allow for top level domains that are less than 2 or more than 3 letters (which is fine until they allow more). 
       Doesn't handle multiple &quot;.&quot; in the domain (joe@abc.co.uk).
      */

        if(empty($email) OR !preg_match("/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/",$email)){
            $this->msg_error.=" - Prière entrez un email valide : email@domaine.extension <br>";
        } 

        
         /* 1.4 -- Validation du phone
            --------------------------------------------------------------------------------
       Phone number in Canada like 438-278-2589
      */

      if(empty($phone) OR !preg_match("/^(\(\+[0-9]{2}\))?([0-9]{3}-?)?([0-9]{3})\-?([0-9]{4})(\/[0-9]{4})?$/",$phone)){
        $this->msg_error.=" - Prière entrez un numéro de téléphone valide : 111-111-1111 <br>";
    }
    
      /* 1.5 -- Sending the message to the recipient
            --------------------------------------------------------------------------------
      */
      //Create an instance; passing `true` enables exceptions
      $mail=new PHPMailer(true);
     
      try {
        //Server settings
//        $mail->SMTPDebug=SMTP::DEBUG_SERVER;           //Enable verbose debug output
//      $mail->SMTPDebug=3;                            //To get more verbose debug output

        $mail->isSMTP();                                //Send using SMTP
        $mail->SMTPAuth=true;                         //Enable SMTP authentication  
        
        $mail->Host= SMTP_SERVER_HOST;                //Set the SMTP server to send through  // mail.mochahost.com or smtp.gmail.com
        $mail->SMTPSecure='ssl';                      //Enable implicit TLS encryption. Or use ssl if required
        $mail->Port=465;                              //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS` or 465 if you are using SSL
        
        
        $mail->Username=SMTP_SERVER_USERNAME; //SMTP username. This is the sender email. The email whon the smtp server is coming from. The adresse gmail if smtp gmail is used
        $mail->Password=SMTP_SERVER_PASSWORD;          //SMTP password. The password for the account (for gmail in less secured case) or the password for the application that goes throught the SMTP
                                       
       
        //Recipients
        $mail->setFrom(SMTP_SET_FROM_EMAIL,SMTP_SET_FROM_NAME); // gmail adress, gmail user name . The account credentiels for the smtp user in the smtp server 
        $mail->addAddress('contact@classevmode.com','Classe V');     //Add a recipient

         //Content
        // $mail->isHTML(true);                                  //Set email format to HTML
         
         
         $mail->Subject = $subject;                         // Setting the subject

         $content="Expediteur : .\n ";                      // setting the content format
         $content.="\tNom  : $name.\n ";
         $content.="\tEmail : $email.\n";
         $content.="\tTelephone : $phone .\n.\n";
         $content.="Sujet : $subject .\n";
         $content.="Message : $message .\n";

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
        echo 'Message has been sent';
    
        
     } catch (Exception $e) {                                    // Or catch the exception if applicable
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
     }


      


 
      /*  Saving the message in the db 
     --------------------------------------------------------------------------------*/
    if($this->msg_error==""){
        
    }

       

   
      /*
      ---------Creation dune session pour sauvegarder les erreurs, et eventuellement les afficher dans la page Sign up 
      */
      $_SESSION["msg_error"]=$this->msg_error; 
        
            

    }




   

}

?>