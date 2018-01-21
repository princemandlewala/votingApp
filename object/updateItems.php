<?php
class items{

    // database connection and table name
    private $conn;
    private $table_name = "items";
    private $users_table = "users";
    private $log_table = "logTable";

    // object properties
    public $userNameUpdate;
    public $itemIdUpdate;
    public $voted;
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    function insertLog(){
        $query = "UPDATE
        " . $this->log_table . "
        SET
        voted=1
        WHERE
        userName=:userNameUpdate AND itemId=:itemIdUpdate";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":userNameUpdate", $this->userNameUpdate);
        $stmt->bindParam(":itemIdUpdate", $this->itemIdUpdate);

        if($stmt->execute()){
            return true;
        }

        return false;
    }
}

?>