<?php
class items{

    // database connection and table name
    private $conn;
    private $table_name = "items";
    private $users_table = "users";
    private $log_table = "logtable";

    // object properties
    public $userName;
    public $itemId;
    public $itemName;
    public $Description;
    public $ImgSrc;
    public $noOfVotes;
    public $votes;
    public $userNameUpdate;
    public $itemIdUpdate;
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    function read(){

    // select all query
        $query = "SELECT i.itemId,i.itemName, i.noOfVotes,i.ImgSrc,i.Description,lg.voted as votes FROM " . $this->table_name . " i JOIN logtable lg WHERE i.itemId=lg.itemId AND lg.userName=? ORDER BY noOfVotes DESC";

    // prepare query statement
        $stmt = $this->conn->prepare($query);
         $stmt->bindParam(1, $this->userName);

    // execute query
        $stmt->execute();

        return $stmt;
    }

    function update(){

    // update query
        $query = "UPDATE
        " . $this->table_name . "
        SET
        noOfVotes = :noOfVotes
        WHERE
        itemId = :itemId";

    // prepare query statement
        $stmt = $this->conn->prepare($query);

    // bind new values
        $stmt->bindParam(':noOfVotes', $this->noOfVotes);
        $stmt->bindParam(':itemId', $this->itemId);

    // execute the query
        if($stmt->execute()){
            return true;
        }
        return false;
    }

    function readUsers(){

    // select all query
        $query = "SELECT * FROM " . $this->users_table . " WHERE userName = ?";

    // prepare query statement
        $stmt = $this->conn->prepare($query);

    // execute query
        $stmt->bindParam(1, $this->userName);
        $stmt->execute();
        return $stmt;
    }
}

?>