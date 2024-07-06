<?php
include_once ("../app/configDB.php");
include_once ("../app/function.php");
// ui
include_once ("../shared/header.php");
include_once ("../shared/nav.php");

if (isset($_POST["send"])) {
    $departmentName = $_POST['Department'];
    $create = "INSERT INTO `department` VALUES (NULL ,'$departmentName' ) ";
    $query = mysqli_query($con, $create);
}

?>
<div class="container col-5 pt-5">
    <h1 class="text-center">Add New Department</h1>
    <div class="card bg-dark">
        <div class="card-body bg-dark text-light ">
            <form method="POST">
                <div class="from-group mb-2">
                    <label for="Department" class="form-lable mb-2">Department Name:</label>
                    <input type="text" name="Department" class="form-control" placeholder="Department Name"
                        id="Department">
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-primary" name="send">Add Department</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include_once ("../shared/footer.php");
?>