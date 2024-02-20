<!-- 
    Student ID: B00139596
    Student Name: Johny Ramos
    Course: T054 - Computer System Management
    Module: Web Application
    Lecturer: Robert Smith
 -->
 <!-- DELETE PHP File -->

 <?php 
    require "common.php";

    if(isset($_GET['id'])) {
        try {
            require_once "src/DBconnect.php";

            $id = $_GET["id"];
            
            $sql = "DELETE FROM users WHERE id = :id";
            $statement = $connection -> prepare($sql);
            $statement -> bindValue(':id', $id);
            $statement -> execute();

            $success = "User ". $id. " successfully deleted";

        } catch (PDOException $pdoex) {
            echo $sql . "<br>" . $pdoex -> getMessage();
        }
    }

    try {
        require_once "src/DBconnect.php";

        $sql = "SELECT * FROM users";

        $statement = $connection -> prepare($sql);
        $statement -> execute();
        $result = $statement -> fetchAll();
    } catch (PDOException $pdoex) {
        echo $sql . "<br>" . $pdoex -> getMessage();
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
                    <a class="btn btn-primary" href="delete.php?id=<?php echo escape($row["ID"]) ?>">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
<a href="index.php" class="text-black-50 text-decoration-none">Back Home</a>

<?php include "templates/footer.php"; ?>