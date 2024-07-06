<?php
include_once ("../app/configDB.php");
include_once ("../app/function.php");
// ui
include_once ("../shared/header.php");
include_once ("../shared/nav.php");

$SelectDepartment = "SELECT * FROM `department` ";
$departmentName = mysqli_query($con, $SelectDepartment);

if (isset($_GET['update'])) {
    $id = $_GET['update'];
    $select = "SELECT * FROM `depart` WHERE `id` = '$id'";
    $result = mysqli_query($con, $select);
    $row = mysqli_fetch_assoc($result);


    if (isset($_POST['update'])) {
        $employeeName = $_POST['employeeName'];
        $employeePhone = $_POST['employeePhone'];
        $Department = $_POST['Department'];
        $employeedescription = $_POST['employeedescription'];
    

        $update = "UPDATE `depart` SET `employee_name`='[$employeeName ]',`phone`=$employeePhone,``description`='[$employeedescription]'  WHERE id = $id";
        $result = mysqli_query($con, $update);
    }

}

?>

<div class="container col-5 pt-5">
    <h1 class="text-center">Hello For Edite Employees</h1>
    <div class="card bg-dark">
        <div class="card-body bg-dark text-light ">
            <form method="POST" enctype="multipart/form-data">
                <div class="from-group mb-2">
                    <label for="Employee" class="form-lable mb-2">Employee Name:</label>
                    <input type="text" value="<?= $row['employee_name'] ?>" name="employeeName" class="form-control"
                        placeholder="Employee Name" id="Employee">
                </div>
                <div class="from-group mb-2">
                    <label for="EmployeePohne" class="form-lable mb-2">Employee Phone:</label>
                    <input type="text" value="<?= $row['phone'] ?>" name="employeePhone" class="form-control"
                        placeholder="Employee Phone" id="EmployeePohne">
                </div>
                <div class="from-group mb-2">
                    <label for="Employeedescription" class="form-lable mb-2">Employee description:</label>
                    <input type="text" value="<?= $row['description'] ?>" name="employeedescription"
                        class="form-control" placeholder="Employee description" id="Employeedescription">
                </div>
                <div class="from-group mb-2">
                    <label for="Employeeimagme" class="form-lable mb-2">Employee Image:</label>
                    <input type="file" name="employeeImage" class="form-control" placeholder="Employee Image"
                        id="Employeeimagme">
                </div>
                <div class="from-group mb-2">
                    <label for="Department" class="form-lable ">Department Name:</label>
                    <select name="Department" id="Department" class="form-select">
                        <option value="" selected><?= $row['department_name'] ?></option>
                        <?php foreach ($departmentName as $item): ?>
                            <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-warning" name="update">Update</button>
                    <a href="<?= url('/employee/index.php') ?> " class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include_once ("../shared/footer.php");
?>