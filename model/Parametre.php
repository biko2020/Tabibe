<?php

class Parametre extends Model {

 // etendre notre model sur la classe Parametre
  
    public function __construct() { 
        // recuperer la fonction getconnexion
        $this->getConnexion();     
    
    }


    public function getTableName($table) {
        $this->table = $table;
        
    }

    /**
     * @param nom  nom de l'utilisateur
     * @param prenom
     * @param email
     * @param gsm
     * @param dte
     * @param heure
     * @return array tableau contenant les infos des users
     * @return TRUE
     * @return FALSE 
     * @return NULL
     */

    public function createPatient($nom,$prenom,$email,$gsm,$dte,$heure) {
      
        $sql = "INSERT INTO $this->table (nom,prenom,email,gsm,dte,heure) VALUES (:nom,:prenom,:email,:gsm,:dte,:heure)";

        try {
            $result = $this->_connexion->prepare($sql);
            
            $var = $result->execute(array(
                ':nom'    => $nom,
                ':prenom' => $prenom,
                ':email'  => $email,
                ':gsm'    => $gsm,
                ':dte'    => $dte,
                ':heure'  => $heure
            ));
          
            if($var){
               return TRUE;
            } else {
                return FALSE;                                  
            }
            
        } catch (PDOException $th) {
            
                return NULL;
               
        }
        

    }


 /**

     * @param dte
     * @param heure
     * @return array tableau contenant les infos des users
     * @return TRUE
     * @return FALSE 
     * @return NULL
     */

    public function createRendezVous($dte,$heure) {
       
        $sql = "INSERT INTO rendezvous (dte,heure) VALUES (:dte,:heure)";
        
        try {
            $result = $this->_connexion->prepare($sql);
           
            $var = $result->execute(array(

                ':dte'    => $dte,
                ':heure'  => $heure
            ));
           
            if($var){
               return TRUE;
               
            } else {
                return FALSE;                                  
            }
            
        } catch (PDOException $th) {
            
                return NULL;
               
        }
        

    }


    # selection des file d'attente 
 
    public function getFileAttente() {

        $sql = "SELECT * FROM $this->table";

        try {

            $result = $this->_connexion->prepare($sql);
            $var = $result->execute();
            $data = $result->fetchAll(PDO::FETCH_ASSOC);

                if($var) {
                    return $data;
                } else {
                    return FALSE;
                }

        } catch (PDOException $th) {

            return NULL;
        }   

    }

    public function getRendezVous() {

        $sql = "SELECT * FROM $this->table";

        try {

            $result = $this->_connexion->prepare($sql);
            $var = $result->execute();
            $data = $result->fetchAll(PDO::FETCH_ASSOC);

                if($var) {
                    return $data;
                } else {
                    return FALSE;
                }

        } catch (PDOException $th) {

            return NULL;
        }   

    }


    # Creer des sessions pour les medecins
       /**
     * @param nom
     * @param email
     * @param password
     * @param True cas de succes 
     * @return Null dans le cas d'exception
     */
    public function CreatUsers($nom,$email,$password) {

        $sql ="INSERT INTO $this->table(nom,email,password) VALUES (:nom,:email,:password)";
        
        try {

            $result = $this->_connexion->prepare($sql);
            $var = $result->execute(array(

                ':nom'     => $nom,
                ':email'   => $email,
                ':password'=> sha1($password)

            ));

            if($var) {
                return TRUE;
            } else {
                return FALSE;
            }

        } catch (PDOException $th) {
            return NULL;
        }

    }
    
    # fonction qui verifier la session d'un user
    /**
     * @param email
     * @param password
     * @return tableau return les data saisi par user
     * @return False cas d'identification éhouée
     * @return Null cas d'exception 
     */

    public function session($email, $password) {
       
        $sql = "SELECT * FROM $this->table WHERE email = :email";
        
        try {
           
            
            $result = $this->_connexion->prepare($sql);
            $result->execute(array(
                ':email' => $email
            ));
           
            $data = $result->fetch(PDO::FETCH_ASSOC);
        
                if($data && ($data['password'] == sha1($password))) { //teste si le mot de passe est correct et crypté ce dernier avec la fonction sha1
                   
                    unset($data['password']);//unset permete de masquer le mot de passe 
                    return $data;

                } else {

                    return False;
                }

        } catch (PDOException $th) {
            return NULL;
        }

    }

//********** */ supprimer un rendez vous
    public function deleteRendezVous($id) {


        $sql = "DELETE FROM $this->table";

        try {
            
            if (!is_null($id)) {

                $sql .= ' WHERE idPatients =  ? ';

            }

            $result = $this->_connexion->prepare($sql);
            $var    = $result->execute(array($id));
           

            if($var) {
                return '<h1>Enregistrement Patient supprimer</h2>';
            }    else {              
                return false;
            }

        } catch (PDOException $th) {
            return null;
        } 

    }

// selectionne un patient par son Id

    public function selectPationById($id) {

        $sql = "SELECT * FROM $this->table";

        try {

            if(!is_null($id)) {
                $sql .= ' WHERE idPatients = ? ';
            }

            $result = $this->_connexion->prepare($sql);
            $var = $result->execute([$id]);
            $data = $result->fetchAll(PDO::FETCH_ASSOC);

                if($var) {
                    return $data;
                } else {
                    return FALSE;
                }

        } catch (PDOException $th) {

            return NULL;
        }   
    }
    

    
    public function updateOnePatient() {

    }

} # ------fermeture class


?>


