<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    header("Access-Control-Allow-Methods: *");

    /*
    session_start();

    if(isset($_POST['email'])) {
        $correct = true;
        $login = $_POST['login'];

        //walidacja długości loginu
        if((@strlen($login)<3) || (@strlen($login)>20)) {
            $correct = false;
            $_SESSION['e_login']="Login needs to consist of minimum 3 and maximum 20 signs";
        }

        //walidacja poprawności rodzaju znaków
        if(@ctype_alnum($login)==false) {
            $correct = false;
            $_SESSION['e_login']="Username needs to consist of only alphanumeric signs";
        }

        //walidacja email
        $email = $_POST['email'];
        $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
        if((filter_var($emailB, FILTER_SANITIZE_EMAIL)==false) || ($emailB!=$email)) {
            $correct = false;
            $_SESSION['e_email']="Nieprawidłowy adres email!";
        }

        //walidacja hasła
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];

        if((strlen($password1)<8) || (strlen($password1)>20)) {
            $correct = false;
            $_SESSION['e_password']="Hasło musi zawierać od 8 do 20 znaków!";
        }

        if($password1 != $password2) {
            $correct = false;
            $_SESSION['e_password']="Podane hasła nie są identyczne!";
        }

        //zabezpieczenie przed odczytem hasła
        $password_hash = password_hash($password1, PASSWORD_DEFAULT);

        //walidacja checkboxa
        if(!isset($_POST['checkbox'])) {
            $correct = false;
            $_SESSION['e_checkbox']="Zaakceptuj regulamin";
        }

        //walidacja reCAPTCHA
        //dekodowanie $check

        //walidacja powtórzenia loginu
        require_once "DbConnect.php";
        */

        //      PDO

        include 'DbConnect.php';
        $objDb = new DbConnect;
        $conn = $objDb->connect();

        $method = $_SERVER['REQUEST_METHOD'];
        switch($method) {

            case "POST":
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
        

        ?>

        <?php
        /*
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