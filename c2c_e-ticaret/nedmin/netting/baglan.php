<?php try {
  $db=new PDO("mysql:host=localhost;dbname=c2c;charset=utf8",'root','12345678');
 // echo "bağlantı başarılı";
} catch (Exception $e) {
   echo $e->getMessage();
} ?>