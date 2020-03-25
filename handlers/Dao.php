<?php 
class Dao{
    private $host = 'us-cdbr-iron-east-01.cleardb.net';
    private $dbname = 'heroku_6e96bae022bb61a';
    private $username = 'b6e14923d349d5';
    private $password = 'e87e58a7';
        
    public function __construct(){}
    
    public function getConnection() {
        try {
            $connection = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
        } catch (Exception $e) {
            return null;
        }
        return $connection;
    }
    
    public function getWorkspaces(){
        $connection = $this->getConnetion();
        if(is_null($connection)){
            return;
        }
        
        try{
            return $connection->query("select");
            
        } catch (Exception $e){
            return null;
        }
    
    }
    
    public function userExists($username, $password){
        $conn = $this->getConnection();
        $query = "Select user_id from users where username = :username and password = :password";
        $execute = $conn->prepare($query);
        $execute->bindParam(":username", $username);
        $execute->bindParam(":password", $password);
        $execute->execute();
    }
    
}
?>