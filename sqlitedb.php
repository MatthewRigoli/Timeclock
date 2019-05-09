<?php
   class Sqlitedb extends SQLite3 {
      function __construct() {
         $this->open('database.db');
      }
   }
   $db = new Sqlitedb();
   if(!$db) {
      echo $db->lastErrorMsg();
   } else {
      echo "Opened database successfully\n";
   }
?>