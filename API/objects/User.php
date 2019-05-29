
<?php
// 'user' object
class User{
 
    // database connection and table name
    private $conn;
    private $table_name = "users";
 
    // object properties
    public $id;
    public $first_name;
    public $last_name;
    public $date_of_birth;
    public $email;
    public $password;
 
    // constructor
    public function __construct($db){
        $this->conn = $db;
    }
 





// create() method will be here
// create new user record
function create(){
 
    // insert query
    $query = "INSERT INTO " . $this->table_name . "
            SET
                first_name = :first_name,
                last_name = :last_name,
                date_of_birth = :date_of_birth,
                email = :email,
                password = :password";
 
    // prepare the query
    $stmt = $this->conn->prepare($query);
 
    // parametization of variables.. secure
    $this->first_name=mysqli_real_escape_string(strip_tags($this->first_name));
    $this->last_name=mysqli_real_escape_string(strip_tags($this->last_name));
    $this->email=mysqli_real_escape_string(strip_tags($this->email));
    $this->date_of_birth=mysqli_real_escape_string(strip_tags($this->date_of_birth));
    $this->password=mysqli_real_escape_string(strip_tags($this->password));
 
    // bind the values
    $stmt->bindParam(':first_name', $this->first_name);
    $stmt->bindParam(':last_name', $this->last_name);
    $stmt->bindParam(':date_of_birth', $this->date_of_birth);
    $stmt->bindParam(':email', $this->email);
 
    // hash the password before saving to database
    $password_hash = password_hash($this->password, PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password_hash);
 
    // execute the query, also check if query was successful
    if($stmt->execute()){
        return true;
    }
 
    return false;
}
 

// check if user exist in the database by email verification
function emailExists(){
 
    // query to check if email exists
    $query = "SELECT id, first_name, last_name, date_of_birth, password
            FROM " . $this->table_name . "
            WHERE email = ?
            LIMIT 0,1";
 
    // prepare the query
    $stmt = $this->conn->prepare( $query );
 
    // sanitize
    $this->email=mysqli_real_escape_string(strip_tags($this->email));
 
    // bind given email value
    $stmt->bindParam(1, $this->email);
 
    // execute the query
    $stmt->execute();
 
    // get number of rows
    $num = $stmt->rowCount();
 
    // if email exists, assign values to object properties for easy access and use for php sessions
    if($num>0){
 
        // get record details / values
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
        // assign values to object properties
        $this->id = $row['id'];
        $this->first_name = $row['first_name'];
        $this->last_name = $row['last_name'];
        $this->date_of_birth = $row['date_of_birth'];
        $this->password = $row['password'];
 
        // return true because email exists in the database
        return true;
    }
 
    // return false if email does not exist in the database
    return false;
}
 
// update() method will be here
// update a user record
// public function update(){
 
//     // if password needs to be updated
//     $password_set=!empty($this->password) ? ", password = :password" : "";
 
//     // if no posted password, do not update the password
//     $query = "UPDATE " . $this->table_name . "
//             SET
//                 firstname = :firstname,
//                 lastname = :lastname,
//                 email = :email
//                 {$password_set}
//             WHERE id = :id";
 
//     // prepare the query
//     $stmt = $this->conn->prepare($query);
 
//     // sanitize
//     $this->firstname=htmlspecialchars(strip_tags($this->firstname));
//     $this->lastname=htmlspecialchars(strip_tags($this->lastname));
//     $this->email=htmlspecialchars(strip_tags($this->email));
 
//     // bind the values from the form
//     $stmt->bindParam(':firstname', $this->firstname);
//     $stmt->bindParam(':lastname', $this->lastname);
//     $stmt->bindParam(':email', $this->email);
 
//     // hash the password before saving to database
//     if(!empty($this->password)){
//         $this->password=htmlspecialchars(strip_tags($this->password));
//         $password_hash = password_hash($this->password, PASSWORD_BCRYPT);
//         $stmt->bindParam(':password', $password_hash);
//     }
 
//     // unique ID of record to be edited
//     $stmt->bindParam(':id', $this->id);
 
//     // execute the query
//     if($stmt->execute()){
//         return true;
//     }
 
//     return false;
// }
}