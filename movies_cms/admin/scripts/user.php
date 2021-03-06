<?php 

function createUser($fname, $username, $password, $email){
    $pdo = Database::getInstance()->getConnection();
    
    //TODO: Finish the below so that it can run a SQL query
    // to create a new user with provided data
    $create_user_query = 'INSERT INTO tbl_user(user_fname, user_name, user_pass, user_email, user_ip)';
    $create_user_query .= ' VALUES (:fname, :username, :password, :email, "no")';

    $create_user_set = $pdo->prepare($create_user_query);
    $create_user_set->execute(
        array(
            ':fname'=>$fname,
            ':username'=>$username,
            ':password'=>$password,
            ':email'=>$email,
        )
    );

    // INSERT INTO `tbl_user` (`user_fname`, `user_name`, `user_pass`, `user_email`) VALUES (NULL, $fname, $username, $password, $email) MY ATTEMPT



    //TODO: redirect to index.php if create user succesfully 
    //otherwise, return a error message

    if($create_user_set){
        redirect_to('index.php');
    }else{
        return 'The user did not go through';
    }

    // if(isset($fname, $username, $password, $email)){
    //     redirect_to('index.php');
    // }else{
    // //User does not exist
    // $message = 'User does not exist';
    // } MY ATTEMPT

}

?>