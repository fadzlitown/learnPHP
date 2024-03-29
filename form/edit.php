<!DOCTYPE HTML>
<html>
<head>
    <title>PDO Update a Record</title>

</head>
<body>

<h1>PDO: Update a Record</h1>

<?php
//include database connection
include 'db_connect.php';

//will get the action from index page (update n select)
$action = isset( $_POST['action'] ) ? $_POST['action'] : "";
if($action == "update"){
    try{

        //write query
        //in this case, it seemed like we have so many fields to pass and 
        //its kinda better if we'll label them and not use question marks
        //like what we used here
        $query = "update users 
                    set firstname = :firstname, lastname = :lastname, username = :username, password  = :password
                    where id = :id";

        //prepare query for excecution
        $stmt = $con->prepare($query);

        //bind the parameters
        //bindParam('parameter name of the form :name',','Name of the PHP variable to bind to the SQL statement parameter')
        $stmt->bindParam(':firstname', $_POST['firstname']);
        $stmt->bindParam(':lastname', $_POST['lastname']);
        $stmt->bindParam(':username', $_POST['username']);
        $stmt->bindParam(':password', $_POST['password']);
        $stmt->bindParam(':id', $_POST['id']);

        // Execute the query
        if($stmt->execute()){
            echo "Record was updated.";
        }else{
            die('Unable to update record.');
        }

    }catch(PDOException $exception){
        //to handle error
        echo "Error: " . $exception->getMessage();
    }
}

//this block will select the query data from db n set the existing value to the form by id
try {

    //prepare query
    $query = "select id, firstname, lastname, username, password from users where id = ? limit 0,1";
    $stmt = $con->prepare( $query );

    //this is the first question mark
    $stmt->bindParam(1, $_REQUEST['id']);

    //execute our query
    $stmt->execute();

    //store retrieved row to a variable
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    //values to fill up our form
    $id = $row['id'];
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $username = $row['username'];
    $password = $row['password'];

}catch(PDOException $exception){ //to handle error
    echo "Error: " . $exception->getMessage();
}


?>
<!--we have our html form here where new user information will be entered n pass to update action-->
<form action='#' method='post' border='0'>
    <table>
        <tr>
            <td>Firstname</td>
            <td><input type='text' name='firstname' value='<?php echo $firstname;  ?>' /></td>
        </tr>
        <tr>
            <td>Lastname</td>
            <td><input type='text' name='lastname' value='<?php echo $lastname;  ?>' /></td>
        </tr>
        <tr>
            <td>Username</td>
            <td><input type='text' name='username'  value='<?php echo $username;  ?>' /></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type='password' name='password'  value='<?php echo $password;  ?>' /></td>
        <tr>
            <td></td>
            <td>
                <!-- so that we could identify what record is to be updated -->
                <input type='hidden' name='id' value='<?php echo $id ?>' />

                <!-- we will set the action to edit -->
                <input type='hidden' name='action' value='update' />
                <input type='submit' value='Edit' />

                <a href='index.php'>Back to index</a>
            </td>
        </tr>
    </table>
</form>

</body>
</html>