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
            $query = "Select * from workspaces ws
                join workspace w on ws.workspace_id = w.workspace_id where user_id = :uid";
            $execute = $conn->prepare($query);
            $execute->bindParam(":uid", $uid);
            $execute->execute();
            $result = $execute->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }  catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
    
    public function getUsername($uid){
        $conn = $this->getConnection();
        if(is_null($conn)) {
            return;
        }
        try{
            $query = "Select concat(first_name, \" \", last_name) as name from users where user_id = :uid";
            $execute = $conn->prepare($query);
            $execute->bindParam(":uid", $uid);
            $execute->execute();
            $result = $execute->fetch(PDO::FETCH_ASSOC);
            return $result;
        }  catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
    
    public function getWorkspaceName($wid){
        $conn = $this->getConnection();
        if(is_null($conn)) {
            return;
        }
        try{
            $query = "Select w.workspace_name as name from workspaces ws
                join workspace w on w.workspace_id = ws.workspace_id where w.workspace_id = :wid";
            $execute = $conn->prepare($query);
            $execute->bindParam(":wid", $wid);
            $execute->execute();
            $result = $execute->fetch(PDO::FETCH_ASSOC);
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
            $query = "select count(distinct (user_id)) as count from workspaces where workspace_id = :wid group by workspace_id";
            $execute = $conn->prepare($query);
            $execute->bindParam(":wid", $wid);
            $execute->execute();
            $result = $execute->fetch(PDO::FETCH_ASSOC);
            return $result;
        }  catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
    
    public function getUsers($wid){
        $conn = $this->getConnection();
        if(is_null($conn)) {
            return;
        }
        try{
            $query = "select * from workspaces w join users u on u.user_id = w.user_id where w.workspace_id = :wid";
            $execute = $conn->prepare($query);
            $execute->bindParam(":wid", $wid);
            $execute->execute();
            $result = $execute->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }  catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
    
    public function validUser($wid, $email){
        $conn = $this->getConnection();
        if(is_null($conn)) {
            return;
        }
        try{
            $query = "select * from workspaces w join users u on u.user_id = w.user_id where w.workspace_id = :wid AND u.email = :email";
            $execute = $conn->prepare($query);
            $execute->bindParam(":wid", $wid);
            $execute->bindParam(":email", $email);
            $execute->execute();
            $result = $execute->fetch(PDO::FETCH_ASSOC);
            return $result;
        }  catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
    
    public function getStatuses(){
        $conn = $this->getConnection();
        if(is_null($conn)) {
            return;
        }
        try{
            return $conn->query("select * from statuses",PDO::FETCH_ASSOC);
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
    
    public function homeSortByStatus($wid){
        $conn = $this->getConnection();
        if(is_null($conn)) {
            return;
        }
        try{
            $query = "select * from tasks t
                left join users u on u.user_id = t.user_id
	            join statuses s	on s.status_id = t.status_id
                where workspace_id = :wid order by s.status_id, t.created_date";
            $execute = $conn->prepare($query);
            $execute->bindParam(":wid", $wid);
            $execute->execute();
            $result = $execute->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }  catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
    
    public function homeSortByUser($wid){
        $conn = $this->getConnection();
        if(is_null($conn)) {
            return;
        }
        try{
            $query = "select * from tasks t
                left join users u on u.user_id = t.user_id
	            join statuses s	on s.status_id = t.status_id
                where workspace_id = :wid order by u.last_name, s.status_id";
            $execute = $conn->prepare($query);
            $execute->bindParam(":wid", $wid);
            $execute->execute();
            $result = $execute->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }  catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
    
    public function homeSortByDate($wid){
        $conn = $this->getConnection();
        if(is_null($conn)) {
            return;
        }
        try{
            $query = "select * from tasks t
                left join users u on u.user_id = t.user_id
	            join statuses s	on s.status_id = t.status_id
                where workspace_id = :wid order by t.created_date, s.status_id ";
            $execute = $conn->prepare($query);
            $execute->bindParam(":wid", $wid);
            $execute->execute();
            $result = $execute->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }  catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
    
    public function addTask($wid,$sid, $text){
        $conn = $this->getConnection();
        if(is_null($conn)) {
            return;
        }
        try{
            $query = "insert into tasks(workspace_id, task_name, status_id)
                values(:wid,:text,:sid)";
            $execute = $conn->prepare($query);
            $execute->bindParam(":wid", $wid);
            $execute->bindParam(":text", $text);
            $execute->bindParam(":sid", $sid);
            $execute->execute();
            $result = $execute->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }  catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
   
    public function addTask($wid,$sid, $text, $uid){
        $conn = $this->getConnection();
        if(is_null($conn)) {
            return;
        }
        try{
            $query = "insert into tasks(workspace_id, task_name, status_id, user_id)
                values(:wid,:text,:sid, :uid)";
            $execute = $conn->prepare($query);
            $execute->bindParam(":wid", $wid);
            $execute->bindParam(":text", $text);
            $execute->bindParam(":sid", $sid);
            $execute->bindParam(":uid", $uid);
            $execute->execute();
            $result = $execute->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }  catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
    
}
?>