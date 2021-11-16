<?php
$dbhost = $_SERVER['RDS_HOSTNAME'];
$dbport = $_SERVER['RDS_PORT'];
$dbname = $_SERVER['RDS_DB_NAME'];
$charset = 'utf8' ;

$dsn = "mysql:host={$dbhost};port={$dbport};dbname={$dbname};charset={$charset}";
$username = $_SERVER['RDS_USERNAME'];
$password = $_SERVER['RDS_PASSWORD'];

try {
    $conn = new PDO($dsn, $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
    // sql to create table
    $sql = "DROP TABLE Jobs";
  
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Table Jobs deleted successfully";
    // sql to create table
    $sql = "CREATE TABLE Jobs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    job_title VARCHAR(50) NOT NULL,
    job_company VARCHAR(50) NOT NULL,
    job_location VARCHAR(30) NOT NULL,
    job_desc VARCHAR(1000) NOT NULL,
    job_skills VARCHAR(200) NOT NULL,
    job_pay VARCHAR(30) NOT NULL,
    job_contact VARCHAR(50) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
  
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Table Jobs created successfully";
  } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }
  
  $conn = null;
  header("Location: http://cs3204-hello-world.us-east-2.elasticbeanstalk.com/");
  die();
?>