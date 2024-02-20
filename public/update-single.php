<!-- 
    Student ID: B00139596
    Student Name: Johny Ramos
    Course: T054 - Computer System Management
    Module: Web Application
    Lecturer: Robert Smith
 -->
 <!-- UPDATE-SINGLE PHP File -->

 <?php
    require "common.php";

    if(isset($_POST['submit'])) {
        try {
            require_once "src/DBconnect.php";

            $user = [
                "ID"        =>  escape($_POST['ID']),
                "fistname"  =>  escape($_POST['fistname']),
                "lastname"  =>  escape($_POST['lastname']),
                "email"     =>  escape($_POST['email']),
                "age"       =>  escape($_POST['age']),
                "location"  =>  escape($_POST['location']),
                "date"      =>  escape($_POST['date'])
            ];

            $sql = "UPDATE userS SET ID = :id, 
                        firstname = :firstname,
                        lastname = :lastname,
                        email = :email,
                        age = :age, 
                        locaiton = :location, 
                    WHERE ID = :id";
            $statement = $connection -> prepare($sql);
            $statement -> execute($user);
        } catch (PDOException $pdoex) {
            echo $sql. "<br>" . $error -> getMessage();
        }
    }

    if (isset($_GET['id'])) {
        try {
            require_once "src/DBconnect.php";

            $id = $_GET['id'];

            $sql = "SELECT * FROM users WHERE ID = :id";
            $statement = $connection -> prepare($sql);
            $statement -> bindValue(':id', $id);
            $statement -> execute();

            $user = $statement -> fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $pdoex) {
            echo $sql . "<br>" . $pdoex -> getMessage();
        }
    } else {
        echo "something went wrong!";
        exit;
    }
 ?>

<?php if(isset($_POST['submit']) && $statement) : ?>
    <?php echo escape($_POST['firstname']); ?>
<?php endif; ?>

<?php require "templates/header.php";?>

<div class="form-control p-5">
    <form class="row" method="POST">
    <h2 class="">Edit a user</h2>
        <?php foreach($user as $key => $value) : ?>
            <label for="<?php echo $key; ?>" class="form-label mt-3">
                <?php echo ucfirst($key);?>
            </label>
            <input type="text" 
                name="<?php echo $key;?>" 
                id="<?php echo $key;?>" 
                value="<?php echo escape($value) ?>" <?php echo ($key === 'ID' ? 'readonly' : null) ?> 
                class="form-control" />
        <?php endforeach; ?>
        <input type="submit" name="submit" value="Submit" class="btn form-control mt-2 btn-primary" />
    </form>
</div>
<a href="index.php" class="text-black-50 text-decoration-none">Back Home</a>