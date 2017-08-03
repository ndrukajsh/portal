<?php
    session_start();
    include_once ("connection.php");

        $emri=$_POST["username"];
		$pass=md5($_POST["password"]);

        $logged = FALSE;



            $sql = "SELECT * FROM user WHERE username = '".$emri."'AND password='".$pass."'";
            
            $get_id = getResult($sql);
            
            foreach ($get_id as $key) {
                $id = $key["id"];
            }
            
            $result = nr_total_elemente($sql); 

            if ($result == 1) {            
                $_SESSION["name"] = $emri; 
                $_SESSION["p"] = $pass;
                $_SESSION["id"] = $id;
                $logged = TRUE;
                echo $logged;
                
            }else{
                echo "Perdoruesi nuk ekziston!!!";
            }

?>


