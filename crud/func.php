<?php
include 'db.php';

$name = $_POST['name'];
$last_name = $_POST['last_name'];
$pos = $_POST['pos'];
$get_id = $_GET['id'];
$edit_name = $_POST['edit_name'];
$edit_last_name = $_POST['edit_last_name'];
$edit_pos = $_POST['edit_pos'];

// Create

if (isset($_POST['submit'])) {
	$sql = ("INSERT INTO `users_1`(`name`, `last_name`, `pos`) VALUES(?,?,?)");
	$query = $pdo->prepare($sql);
	$query->execute([$name, $last_name, $pos]);
	header('Location: /Проект/admin/tableWorker.php ');
}

// Read

$sql = $pdo->prepare("SELECT * FROM `users_1`");
$sql->execute();
$result = $sql->fetchAll();

// Update

if (isset($_POST['edit-submit'])) {
	$sqll = "UPDATE users_1 SET name=?, last_name=?, pos=? WHERE id=?";
	$querys = $pdo->prepare($sqll);
	$querys->execute([$edit_name, $edit_last_name, $edit_pos, $get_id]);
  header('Location: /Проект/admin/tableWorker.php ' );
}

// DELETE
if (isset($_POST['delete_submit'])) {
	$sql = "DELETE FROM users_1 WHERE id=?";
	$query = $pdo->prepare($sql);
	$query->execute([$get_id]);
  header('Location: /Проект/admin/tableWorker.php ' );
}
?>