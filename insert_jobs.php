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
    
    $sql = "INSERT INTO Jobs (job_title, job_company, job_location, job_desc, job_skills, job_pay, job_contact)
    VALUES ('Software Engineering Intern', 'McAfee Enterprise', 'Cork', 'McAfee have a number of Internships positions open in - Software Engineering Internships. If you are studying a Degree program with a 6 month or 9 month internships then these positions are for you. We are looking for Interns from an IT/Software Engineering/Computer Science/ or similar degree programs. You will become a full team player , be involved in projects, will get a better hands on experience in the Software Development Cycle and receive full training.', 'IT/Software Engineering/Computer Science/or similar degree pograms', '€11.50/hr', 'jobs@mcafee.ie')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
  } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }
  
  $conn = null;
  ?>