<?php
    session_start();

    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    header("Access-Control-Allow-Methods: *");

        //walidacja reCAPTCHA
        //dekodowanie $check
        //walidacja powtórzenia loginu


        //      PDO

        include 'DbConnect.php';
        $objDb = new DbConnect;
        $conn = $objDb->connect();

        $method = $_SERVER['REQUEST_METHOD'];
        switch($method) {

            case "POST":

                /*  Warunki                
                

                if(isset($_POST['email'])){
                    $correct=true;

                    //LOGIN
                    $login = $_POST['login'];

                    if((@strlen($login)<3) || (@strlen($login)>20)) {
                        $correct=false;
                    }

                    if(@ctype_alnum($login)==false) {
                        $correct=false;
                    }

                    //EMAIL
                    $email = $_POST['email'];
                    $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);

                    if((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email)) {
                        $correct=false;
                    }

                    //PASSWORD
                    $password1 = $_POST['password'];
                    $password2 = $_POST['password2'];

                    if((strlen($password1)<8) || (strlen($password1)>20)) {
                        $correct=false;
                    }

                    if($password1 != $password2){
                        $correct=false;
                    }

                    $password_hash = password_hash($password1, PASSWORD_DEFAULT);

                    //CHECKBOX
                    if(!isset($_POST['checkbox'])) {
                        $correct=false;
                    }

                    //Walidacja ostateczna
                    if($correct = true){
                /*
                */

            //if(isset($_POST['email'])){
                //$correct=true;

                $user = json_decode( file_get_contents('php://input') );

                
                $sql = "INSERT INTO users(id, login, email, password, username, created_at) VALUES(null, :login, :email, :password, :username, :created_at)";
                $stmt = $conn->prepare($sql);
                $created_at = date('Y-m-d');
                $stmt->bindParam(':login', $user->login);
                $stmt->bindParam(':email', $user->email);
                $stmt->bindParam(':password', $user->password);
                $stmt->bindParam(':username', $user->username);
                $stmt->bindParam(':created_at', $created_at);
        
                if($stmt->execute()) {
                    $response = ['status' => 1, 'message' => 'Record created successfully.'];
                } else {
                    $response = ['status' => 0, 'message' => 'Failed to create record.'];
                }
                echo json_encode($response);
                break;
            } 
        //}
        
        /*
        } 
        */
   
        /*
         }
        */

        ?>

        <?php

        /*

        ========== MYSQLI ==========

        mysqli_report(MYSQLI_REPORT_STRICT);

        try {
            $conn = new mysqli($host, $db_user, $db_pass, $db_name);
            if($conn -> connect_errno!=0) {
                throw new Exception(mysqli_connect_errno());
            } else {
                //walidacja powtórzenia adresu email
                $result = $conn->query("SELECT id FROM users WHERE email = '$email'");

                if(!$result) throw new Exception($conn->error);

                $emails = $result->num_rows;
                if($emails>0) {
                    $correct = false;
                    $_SESSION['e_email']="W bazie danych istnieje konto o podanym adresie email!";
                }

                //walidacja powtórzenia nickname
                $result = $conn->query("SELECT id FROM users WHERE nickname = '$nickname");

                if(!$result) throw new Exception($conn->error);

                $nicknames = $result->num_rows;
                if($nicknames>0) {
                    $correct = false;
                    $_SESSION['e_nickname']="Istnieje już konto o podanym nicku! Wybierz inny!";
                }

                //Jeśli wszystkie dane zostały wpisane prawidłowo
                if($correct = true) {
                    if($conn->query("INSERT INTO users VALUES (NULL, '$username', '$email', '$password_hash', '$nickname', '$datetime')")) {
                        $_SESSION['register_complete'] = true;
                        header('Location: messpage');
                    } else {
                        throw new Exception($conn->error);
                    }
                }
                $conn->close();
            }
        } catch(Exception $e) {
            echo '<span style="color:red;">Błąd serwera! Spróbuj później</span>';
            echo '<br/>Informacja developerska: '.$e; 
        }
    }

    */
    ?>