<?php 

abstract class Model {

    // information sur la connexion et la base de donnees
  

    private $host = "localhost:3307";
    private $db_name = "tabibe";
    private $username = "root";
    private $password = "";
    


    // propriete contenant la connexion

    protected $_connexion;
   


    // variable de requet table et id

    public $table;
    public $id;

    
    public function getConnexion() {
      
        // vider la propriete _connexion au debut de la connexion
        $this->_connexion = null;

        // affecter les parametres de connexion si tout passe bien
        try {
            $this->_connexion = new PDO('mysql:host=' .$this->host .';
            dbname='. $this->db_name, $this->username, $this->password);  
        
        // executer la connexion avec l'unicode entre client et server
            $this->_connexion->exec('set names utf8'); 
          

        // sinon afficher erreur            
        } catch (PDOException $exception) {
            echo 'Erreur :' .$exception->getMessage();
        }

    } 

}

?>