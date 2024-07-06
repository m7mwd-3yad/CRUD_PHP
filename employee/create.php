<?php
include_once ("../app/configDB.php");
include_once ("../app/function.php");
// ui
include_once ("../shared/header.php");
include_once ("../shared/nav.php");

$SelectDepartment = "SELECT * FROM `department` ";
$departmentName = mysqli_query($con, $SelectDepartment);

if (isset($_POST['send'])) {
    $employeeName = $_POST['employeeName'];
    $employeePhone = $_POST['employeePhone'];
    $Department = $_POST['Department'];
    $employeedescription = $_POST['employeedescription'];

    $image_name = rand(0, 255) . rand(0, 255) . $_FILES['employeeImage']['name'];
    $image_tmp = $_FILES['employeeImage']['tmp_name'];
    $location = "../assets/img/" . $image_name;

    move_uploaded_file($image_tmp, $location);

    $create = "INSERT INTO `employees` VALUES (NULL ,'$employeeName', '$employeePhone', '$image_name',$Department,'$employeedescription' ) ";
    $insert = mysqli_query($con, $create);
}

?>

<div class="container col-5 pt-5">
    <h1 class="text-center">Hello For Create Employees</h1>
    <div class="card bg-dark">
        <div class="card-body bg-dark text-light ">
            <form method="POST" enctype="multipart/form-data">
                <div class="from-group mb-2">
                    <label for="Employee" class="form-lable mb-2">Employee Name:</label>
                    <input type="text" name="employeeName" class="form-control" placeholder="Employee Name"
                        id="Employee">
                </div>
                <div class="from-group mb-2">
                    <label for="EmployeePohne" class="form-lable mb-2">Employee Phone:</label>
                    <input type="text" name="employeePhone" class="form-control" placeholder="Employee Phone"
                        id="EmployeePohne">
                </div>
                <div class="from-group mb-2">
                    <label for="Employeedescription" class="form-lable mb-2">Employee description:</label>
                    <input type="text" name="employeedescription" class="form-control" placeholder="Employee description"
                        id="Employeedescription">
                </div>
                <div class="from-group mb-2">
                    <label for="Employeeimagme" class="form-lable mb-2">Employee Image:</label>
                    <input type="file" name="employeeImage" class="form-control" placeholder="Employee Image"
                        id="Employeeimagme">
                </div>
                <div class="from-group mb-2">
                    <label for="Department" class="form-lable ">Department Name:</label>
                    <select name="Department" id="Department" class="form-select">
                        <option value="" selected disabled >Select Department</option>
                        <?php foreach ($departmentName as $item): ?>
                            <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-primary" name="send">Add Employee</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include_once ("../shared/footer.php");
?>