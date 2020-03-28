<?php 
error_reporting(E_ALL);
    ini_set('display_errors', 1);

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
            $result = $execute->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }  catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
    
    public function getNumUI($wid){
        $conn = $this->getConnection();
        if(is_null($conn)) {
            return;
        }
        try{
            $query = "Select count(status_id) as count from tasks where workspace_id = :wid and status_id = 1 group by status_id;";
            $execute = $conn->prepare($query);
            $execute->bindParam(":wid", $wid);
            $execute->execute();
            $result = $execute->fetch(PDO::FETCH_ASSOC);
            return $result;
        }  catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
    
    public function getNumUsers($wid){
        $conn = $this->getConnection();
        if(is_null($conn)) {
            return;
        }
        try{
            $query = "Select count(Distinct(user_id)) as count from workspaces where workspace_id = :wid group by workspace_id;";
            $execute = $conn->prepare($query);
            $execute->bindParam(":wid", $wid);
            $execute->execute();
            $result = $execute->fetch(PDO::FETCH_ASSOC);
            return $result;
        }  catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
    
    public function hasAccess($uid, $wid){
        $conn = $this->getConnection();
        if(is_null($conn)) {
            return;
        }
        try{
            $query = "Select * from workspaces where user_id = :uid and workspace_id = :wid";
            $execute = $conn->prepare($query);
            $execute->bindParam(":uid", $uid);
            $execute->bindParam(":wid", $wid);
            $execute->execute();
            $result = $execute->fetch(PDO::FETCH_ASSOC);
            return $result;
        }  catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
    
}
?>