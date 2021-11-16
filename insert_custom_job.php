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
    
    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO Jobs (job_title, job_company, job_location, job_desc, job_skills, job_pay, job_contact)
    VALUES (:job_title, :job_company, :job_location, :job_desc, :job_skills, :job_pay, :job_contact)");
        $stmt->bindParam(':job_title', $job_title);
        $stmt->bindParam(':job_company', $job_company);
        $stmt->bindParam(':job_location', $job_location);
        $stmt->bindParam(':job_desc', $job_desc);
        $stmt->bindParam(':job_skills', $job_skills);
        $stmt->bindParam(':job_pay', $job_pay);
        $stmt->bindParam(':job_contact', $job_contact);

    // insert a row
        $job_title = $_POST["title"];
        $job_company = $_POST["company"];
        $job_location = $_POST["location"];
        $job_desc = $_POST["description"];
        $job_skills = $_POST["skills"];
        $job_pay = $_POST["pay"];
        $job_contact = $_POST["contact"];
        $stmt->execute();

    echo "New record created successfully";
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
    $conn = null;
    header("Location: http://cs3204-hello-world.us-east-2.elasticbeanstalk.com/");
    die();
?>