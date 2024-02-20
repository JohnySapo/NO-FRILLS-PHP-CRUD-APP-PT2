<!-- 
    Student ID: B00139596
    Student Name: Johny Ramos
    Course: T054 - Computer System Management
    Module: Web Application
    Lecturer: Robert Smith
 -->
 <!-- UPDATE PHP File -->
 <?php 
    try {
        require "common.php";
        require_once "src/DBconnect.php";

        $sql = "SELECT * FROM users";

        $statement = $connection -> prepare($sql);
        $statement -> execute();
        $result = $statement -> fetchAll();
    } catch (PDOException $pdoex) {
        echo $sql . "<br>" . $pdoex->getMessage();
    }    
?>

<?php include "templates/header.php";?>

    <h2 class="">Update users</h2>
    <table class="table table-striped table-hover">
        <thead class="">
            <tr class="">
                <th class="">#</th>
                <th class="">First name</th>
                <th class="">Last Name</th>
                <th class="">Email address</th>
                <th class="">Age</th>
                <th class="">Location</th>
                <th class="">Date</th>
                <th class="">Edit</th>
            </tr>
        </thead>
        <tbody class="">
            <?php foreach ($result as $row) : ?>
            <tr class="">
                <td class=""><?php echo escape($row["ID"]); ?></td>
                <td class=""><?php echo escape($row["firstname"]); ?></td>
                <td class=""><?php echo escape($row["lastname"]); ?></td>
                <td class=""><?php echo escape($row["email"]); ?></td>
                <td class=""><?php echo escape($row["age"]); ?></td>
                <td class=""><?php echo escape($row["location"]); ?></td>
                <td class=""><?php echo escape($row["date"]); ?></td>
                <td class="">
                    <a class="btn btn-primary" href="update-single.php?id=<?php echo escape($row["ID"]) ?>">Edit</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
<a href="index.php" class="text-black-50 text-decoration-none">Back Home</a>

<?php include "templates/footer.php"; ?>