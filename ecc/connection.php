<?php

        $conn = new mysqli('localhost','root','','ecc');

        if(!$conn){
            die(mysqli_error($conn));
        }
        
    ?>