<?php 
    class connect{   

   public static function conn() {


        $dbhost="mysql.zzz.com.ua";
        $dbuser="Workapp1";
        $dbpass="Workapp12020@";
        $dbname="daniel_developer_rus";
       
        try {
        $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass); 
        $conn->exec("SET CHARACTER SET utf8");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();

        }

        return $conn;
    }
}
?>