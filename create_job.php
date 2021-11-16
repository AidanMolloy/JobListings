<?php
include 'header.php';
?>
<main>
    <h1>Create a Job</h1>
    <form action="insert_custom_job.php" method="post">
        Title: <input type="text" name="title"><br>
        Company Name: <input type="text" name="company"><br>
        Location: <input type="text" name="location"><br>
        Description: <input type="text" name="description"><br>
        Preferred Skills: <input type="text" name="skills"><br>
        Pay: <input type="text" name="pay"><br>
        Email Address (for applications): <input type="text" name="contact"><br>
        <input type="submit">
    </form>
</main>
<?php
include 'footer.php';
?>