<?php try {
  $db=new PDO("mysql:host=localhost;dbname=eticaret;charset=utf8",'root','12345678');
  //echo "bağlantı başarılı";
} catch (Exception $e) {
   echo $e->getMessage();
} ?>