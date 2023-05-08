<?php 

class Database{

public static $con;

//-----------------------------------------------------------------------------------
// I- CONSTRUCTEUR de la classe DATABASE (il a pour role de creer une connexion a la BD)
//------------------------------------------------------------------------------------
public function __construct()
{
    try{

      //Defintion de la connection String, de meme que la variable de connection appelée $con (un exemple en dure codé)
      //  $string ="mysql:host=localhost;dbname=eshop_db";
      //  self::$con = new PDO($string,"root","");

      //Defintion de la connection String, de meme que la variable de connection appelée $con (en fonction des parametres de config)
        $string =DB_TYPE.":host=".DB_HOST.";"."dbname=".DB_NAME;
        self::$con = new PDO($string,DB_USER,DB_PASS);

    }
    catch (PDOException $e){
        die($e->getMessage());
    }
   
}


//------------------------------------------------------------------------------------
// II- RECUPERATION DUNE INSTANCE DE CONNEXION
//Si elle est deja instanciée sa connection est retournée, 
//sinon, elle instancie la classe (la construit) et return linstance (la classe en entier)
//------------------------------------------------------------------------------------

public static function getConnInstance()
{
    if(self::$con){
        return self::$con;
    }
    
    $dbaInstance = new self();
    return $dbaInstance::$con;

}

public static function getDbInstance()
{ 
    $dbaInstance = new self();
    return $dbaInstance;

}


//--------------------------------------------------------------------------------------------------------------
// III- FONCTION READ DEPUIS LA BD (Concerne les requetes pour lesquels on attend des valeurs retours de la BD). Cette fonction admet deux parametres.
//--------------------------------------------------------------------------------------------------------------

//Read function from the Database
public function read($query,$data=array()){

    //Preparation de la requete, avec l'objet de la connection
    $stm = self::$con->prepare($query);

    //executer la preparation, en y passant le tableau des data, Si rien n'est indiqué comme $data, la query devra sy accomoder et le systeme utilisera le tableau vide
    $result = $stm->execute($data);

    //Gestion du resultat de la requete 
    if($result){
        $data = $stm->fetchAll(PDO::FETCH_ASSOC);
        if(is_array($data)){
            return $data;
        }

    }
    return false;
}


//--------------------------------------------------------------------------------------------------------------
// III- FONCTION WRITE DANS LA BD (Concerne les requetes pour lesquels on n'attend pas de valeurs retours de la BD). Cette fonction admet deux parametres.
//--------------------------------------------------------------------------------------------------------------

//Read function from the Database
public function write($query,$data=array()){

    //Preparation de la requete, avec l'objet de la connection
    $stm = self::$con->prepare($query);

    //executer la preparation, en y passant le tableau des data, Si rien n'est indiqué comme $data, la query devra sy accomoder et le systeme utilisera le tableau vide
    $result = $stm->execute($data);

    //Gestion du resultat de la requete 
    if($result){
        return true;
    }
    return false;
}


}


?>