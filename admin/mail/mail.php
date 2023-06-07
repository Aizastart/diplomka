<?php
  $user="root";
  $password="";
  $host="localhost";
  $db="bd_sweet";
  $dbh = 'mysql:host='.$host.';dbname='.$db.';charset=utf8';
  $pdo = new PDO($dbh, $user, $password);

  $name = $_POST['name'];
  $email = $_POST['email'];
  $content = $_POST['content'];
  
  
  $sql = "INSERT INTO user_message (name, email, content) VALUES (:name, :email, :content)";
  $query = $pdo->prepare($sql);
  $query->execute([
      'name' => $name,
      'email' => $email,
      'content' => $content,
      
  ]);
  
  echo '<meta HTTP-EQUIV="Refresh" Content="1; URL=../../../../index.php">';
  ?>