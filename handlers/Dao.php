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
            return $connection;
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
    
    public function userExists($user, $pwd){
        $conn = $this->getConnection();
        if(is_null($conn)) {
            return;
        }
        try{
            $query = "Select user_id from users where username = :user and password = :pwd";
            $execute = $conn->prepare($query);
            $execute->bindParam(":user", $user);
            $execute->bindParam(":pwd", $pwd);
            $execute->execute();
            $result = $execute->fetch(PDO::FETCH_ASSOC);
            return $result;
        }  catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
    
    public function getWorkspaces($uid){
        $conn = $this->getConnection();
        if(is_null($conn)) {
            return;
        }
        try{
            $query = "Select * from workspaces where user_id = :id";
            $execute = $conn->prepare($query);
            $execute->bindParam(":id", $uid);
            $execute->execute();
            $result = $execute->fetch_array(PDO::FETCH_ASSOC);
            return $result;
        }  catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
    
}
?>