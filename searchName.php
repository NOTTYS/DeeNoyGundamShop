<?php
include('Database/db.con.php');
if (isset($_POST['name'])) {
    $text = $_POST['name'];
    $sql = "SELECT * FROM tb_product WHERE name LIKE '%$text%' LIMIT 10";
    $result = $conn->query($sql);
    while ($row = mysqli_fetch_array($result)) { ?>
    <div class="list-group-item align-middle"><div class="d-flex"><p>ID: <?php echo $row['product_id'] ?></p>&nbsp;<p>Grade: <?php echo $row['protype_id'] ?></p>&nbsp;<div class="align-middle"><span class="d-flex"><img class="rounded" width="70px" height="70px" src="upload/<?php echo $row['image'] ?>" alt="<?php echo $row['image'] ?>">&nbsp;<p id="eiei" class="text-center"><?php echo $row['name'] ?></p></span></div></div></div>
<?php
    }
}
?>