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
  
    $stmt = $conn->prepare("SELECT * FROM Jobs");
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        echo "<section class='job'>";
        echo "<div>" . $row['job_title'] . "</div>";
        echo "<div>" . $row['job_company'] . "</div>";
        echo "<div>" . $row['job_location'] . "</div>";
        echo "<div>" . $row['job_desc'] . "</div>";
        echo "<div>" . $row['job_skills'] . "</div>";
        echo "<div>" . $row['job_pay'] . "</div>";
        echo "<div>" . $row['job_contact'] . "</div>";
        echo "<div>" . $row['reg_date'] . "</div>";
        echo "</section>";
    }

  } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  
  $conn = null;

?>