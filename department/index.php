<?php
include_once ("../app/configDB.php");
include_once ("../app/function.php");
// ui
include_once ("../shared/header.php");
include_once ("../shared/nav.php");
$index = 1;

$select = "SELECT * FROM `department` ";
$data = mysqli_query($con, $select);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = "DELETE FROM `department` WHERE id =$id";
    $delete = mysqli_query($con, $delete);
    header("location:index.php");
}
?>
<div class="container col-5 pt-5">
    <h1 class="text-center">All Departments</h1>
    <div class="card bg-dark">
        <div class="card-body text-light table-responsive">
            <table class="table table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th colspan="2">Action</th>
                </tr>
                <?php foreach ($data as $item): ?>
                    <tr>
                        <td><?= $index++ ?></td>
                        <td><?= $item['name'] ?></td>
                        <td><a href="edite.php?update=<?=$item['id']?>" class="btn btn-warning">Edite</a></td>
                        <td><a href="?delete=<?= $item['id'] ?>" class="btn btn-danger">Delete</a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>

<?php
include_once ("../shared/footer.php");
?>