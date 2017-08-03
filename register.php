<?php
    include_once ("connection.php");
        $check = false;

        $emri=$_POST["new_user"];
        $email=$_POST["n_email"];
        $pass=$_POST["n_pass"];

        $test_sql = "SELECT * FROM user WHERE username='". $emri."'";
        $u_name = nr_total_elemente($test_sql);
        if ($u_name != 0) {
             echo $check;
        }else{
            $encr_pass = md5($pass);
            $sql = "INSERT INTO user (username , password, subscribe, email ) VALUES ('".$emri."' , '".$encr_pass."', '0', '".$email."')";

            $conn = connect();

            if (mysqli_query($conn, $sql)) {
                $query = "SELECT * FROM user ORDER BY id DESC LIMIT 1";
                $fetch_id = getResult($query);
                foreach ($fetch_id as $u_id) {
                    $user_id = $u_id["id"];
                }
                
                $data = date("l j F Y h:i:s A");
                $sql_role = "INSERT INTO rolet (emri , data, id_user) VALUES ('i thjeshte' , '".$data."', '".$user_id."')";
                //CURTIME() per kohen e komenteve te lajmet
                mysqli_query($conn, $sql_role);
                $check = true;
                echo $check;
            }
            mysqli_close($conn);
        }






?>