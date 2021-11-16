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
        echo "<div class='jobPostedDate'>" . $row['reg_date'] . "</div>";
        echo "<div class='jobTitle'>" . $row['job_title'] . "</div>";
        echo "<div class='jobCompany'>" . $row['job_company'] . ', ' . $row['job_location'] . "</div>";
        echo "<div class='jobDescription'>" . $row['job_desc'] . "</div>";
        echo "<div class='jobSkills'>Preferred Skills: " . $row['job_skills'] . "</div>";
        echo "<div class='jobPay'>Pay: " . $row['job_pay'] . "</div>";
        echo "<a href='mailto:". $row['job_contact'] . "'><div class='jobContact'>Apply</div></a>";
        echo "</section>";
    }

  } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  
  $conn = null;

?>