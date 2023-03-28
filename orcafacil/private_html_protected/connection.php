<?php

    try {
        $user = 'update';
        $pass = 'hunter2';
        $dbh = new PDO('mysql:host=localhost;dbname=orcafacil', $user, $pass);
     //   foreach($dbh->query('SELECT * from FOO') as $row) {
         //   print_r($dbh);
        return $dbh;
            
        }
     //   $dbh = null;
     catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
        return False;
    }
?>
