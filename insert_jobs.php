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
    VALUES 
    ('Software Engineering Intern', 'McAfee Enterprise', 'Cork', 'McAfee have a number of Internships positions open in - Software Engineering Internships. If you are studying a Degree program with a 6 month or 9 month internships then these positions are for you. We are looking for Interns from an IT/Software Engineering/Computer Science/ or similar degree programs. You will become a full team player , be involved in projects, will get a better hands on experience in the Software Development Cycle and receive full training.', 'Python, Machine Learning', '€11.50/hr', 'jobs@mcafee.ie'),
    ('IT Support Technician', 'Fluirse Education Solutions', 'Cork', 'A leading eLearning and Training organisation that provides both online and face to face training is seeking a IT Support Technician to join their organisation in Munster. Are you a practical, results and logical individual with a passion for IT and Technology? Do you love problem solving and helping people? Do you take on responsibility for your own performance, with the determination and drive to always deliver beyond expectations? Are you looking for a flexible, autonomous role where you can enjoy overseeing and managing your own work? If this sounds like you, then you could be the IT Support Technician for Flúirse Limited’s Pitman Training division!', 'Driving License, Problem Solving', '€12/hr', 'jobs@fluirse.ie')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
    $conn = null;
    header("Location: http://cs3204-hello-world.us-east-2.elasticbeanstalk.com/");
    die();
?>