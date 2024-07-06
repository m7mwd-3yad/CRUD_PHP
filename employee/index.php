<?php
include_once ("../app/configDB.php");
include_once ("../app/function.php");
// ui
include_once ("../shared/header.php");
include_once ("../shared/nav.php");

$select = "SELECT * FROM `depart` ";
$result = mysqli_query($con, $select);

if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    $empimg="SELECT `image` FROM `employees` where id = $id ";
    $result = mysqli_query($con, $empimg);
    $row = mysqli_fetch_assoc($result);
    unlink("../assets/img/".$row['image']);

    $delete = "DELETE FROM `employees` where id = $id ";
    $result = mysqli_query($con, $delete);

    header("location:index.php");
}

?>
<div class="container col-10 pt-5">
    <h1 class="text-center">Hello For List Employees</h1>
    <div class="d-flex flex-wrap justify-content-center  ">
        <?php foreach ($result as $item): ?>
            <div class="card m-3 bg-dark text-light" style="width: 18rem;">
                <img src="<?= url("/assets/img/" . $item['image']) ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Name: <?= $item['employee_name'] ?></h5>
                    <p class="card-text">Description: <?= $item['description'] ?></p>
                    <p class="card-text">Phone: <?= $item['phone'] ?></p>
                    <p class="card-text">Department: <?= $item['department_name'] ?></p>
                    <hr>
                    <td><a href="edite.php?update=<?= $item['id'] ?>" class="btn btn-warning">Edite</a></td>
                    <td><a href="?delete=<?= $item['id'] ?>" class="btn btn-danger">Delete</a></td>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php
include_once ("../shared/footer.php");
?>