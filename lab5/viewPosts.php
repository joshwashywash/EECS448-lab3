<?php
  echo "<link rel='stylesheet' type='text/css' href='../../stylesheet.css'>";
  $DB = new mysqli('mysql.eecs.ku.edu', 'joertel', 'P@$$word123', 'joertel');
  if ($DB->connect_errno) {
      exit('Connection failed: ' . $DB->connect_error);
  }
  if (empty($DB->query('SELECT * FROM Posts')->num_rows)) {
      exit('There are no Posts within the database');
  }
  $result = $DB->query('SELECT ID FROM Users');
  if ($result->num_rows > 0) {
      echo "<form action='tabulatePosts.php' method='post'><select name='user'>";
      while ($row = $result->fetch_assoc()) {
          echo "<option value='{$row['ID']}'>{$row['ID']}</option>";
      }
      echo "</select><br><br><input type='submit' value='Submit'></form>";
  } else {
      echo 'There are no Users within the database.';
  }
  $result->free();
  $DB->close();
