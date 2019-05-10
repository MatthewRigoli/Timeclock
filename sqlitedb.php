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

   $sql =<<<EOF
      CREATE TABLE USERINFO
      (ID INT PRIMARY KEY     NOT NULL,
      USERNAME       TEXT     NOT NULL,
      PASSWORD       TEXT     NOT NULL,
      CLOCKEDIN      INT      NOT NULL);
EOF;

   $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo "Table created successfully\n";
   }
   $db->close();
?>