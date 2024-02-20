<!-- 
    Student ID: B00139596
    Student Name: Johny Ramos
    Course: T054 - Computer System Management
    Module: Web Application
    Lecturer: Robert Smith
 -->
 <!-- INDEX PHP File -->

<?php include "templates/header.php"; ?>

<nav class="navbar bg-light rounded-4">
    <div class="container-fluid justify-content-center navbar-expand">
        <ul class="navbar-nav text-center px-2">
            <!-- Add User -->
            <li class="nav-item px-2">
                <a href="create.php" class="nav-link text-uppercase">
                    <strong class="">Create</strong>
                    <br><small class="w-100">add a user</small>
                </a>
            </li>
            <!-- Find a User -->
            <li class="nav-item px-2">
                <a href="read.php" class="nav-link text-uppercase">
                    <strong>Read</strong>
                    <br><small class="w-100">find a user</small>
                </a>
                </li>
            <!-- Update a User -->
            <li class="nav-item px-2">
                <a href="update.php" class="nav-link text-uppercase">
                    <strong>Update</strong>
                    <br><small class="w-100">edit a user</small>
                </a>
            </li>
            <!-- Delete a User -->
            <li class="nav-item px-2">
                <a href="delete.php" class="nav-link text-uppercase">
                    <strong>Delete</strong>
                    <br><small class="w-100">delete a user</small>
                </a>
            </li>
        </ul>
    </div>
</div>

<?php include "templates/footer.php"; ?>