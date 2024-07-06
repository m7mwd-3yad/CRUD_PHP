<?php
include_once ("../app/configDB.php");
include_once ("../app/function.php");
// ui
include_once ("../shared/header.php");
include_once ("../shared/nav.php");

if (isset($_GET['update'])) {
    $id = $_GET['update'];
    $select = "SELECT * FROM `department` WHERE id = $id ";
    $data = mysqli_query($con, $select);
    $row = mysqli_fetch_assoc($data);
    if (isset($_POST['update'])) {
        $name = $_POST['Department'];
        $update = "UPDATE `department` SET `name` = '$name' WHERE id = $id";
        $update = mysqli_query($con,$update);
        header("location:index.php");
    }
}
?>
<div class="container col-5 pt-5">
    <h1 class="text-center">Add New Department</h1>
    <div class="card bg-dark">
        <div class="card-body bg-dark text-light ">
            <form method="POST">
                <div class="from-group mb-2">
                    <label for="Department" class="form-lable mb-2">Department Name:</label>
                    <input type="text" name="Department" value="<?= $row['name'] ?>" class="form-control"
                        placeholder="Department Name" id="Department">
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-warning" name="update">Update</button>
                    <a href="<?= url('/department/index.php') ?> " class="btn btn-danger">Cancel</a>

                </div>
            </form>
        </div>
    </div>
</div>
<?php
include_once ("../shared/footer.php");
?>