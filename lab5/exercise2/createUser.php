<?php
  if (empty($_POST['username'])) {
      exit('Username can not be empty.');
  }
  $mysql = new mysqli('mysql.eecs.ku.edu', 'joertel', 'P@$$word123', 'joertel');
  if ($mysql->connect_errno) {
      exit('Connect failed: '.$mysql->connect_error);
  }
  if ($mysql->query("SELECT * FROM Users WHERE ID = '{$_POST['username']}'")->num_rows) {
      echo 'Username already exists in the database.';
  } else {
      $mysql->query("INSERT INTO Users (ID) VALUES ('{$_POST['username']}')");
      echo 'Username has been added to the database.';
  }
  $mysql->close();
