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
      echo "Opened database successfully <br>";
   }

   /*$sql =<<<EOF
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
   */

/*$id = 5;
$name = "McKinnin";
$password = 'Tacocatman122222';
$clockedin = 0;

   $sql =<<<EOF

  INSERT INTO USERINFO (ID,USERNAME,PASSWORD,CLOCKEDIN)
  VALUES ($id, 'McKinnin', 'coolguy', $clockedin);
EOF;

$ret = $db->exec($sql);
if(!$ret) {
  echo $db->lastErrorMsg();
} else {
  echo "Records created successfully\n";
}
$db->close();
*/

$sql =<<<EOF
      SELECT * from USERINFO;
EOF;

   $ret = $db->query($sql);
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
      echo "ID = ". $row['ID'] . "\n";
      echo "USERNAME = ". $row['USERNAME'] ."\n";
      echo "PASSWORD = ". $row['PASSWORD'] ."\n";
      echo "CLOCKEDIN = ".$row['CLOCKEDIN'] ."<br><br>";
   }
   echo "Operation done successfully\n";
   $db->close();
   
?>