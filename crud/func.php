<?php
include 'db.php';

$topic = $_POST['topic'];
$post_text = $_POST['post_text'];
$get_id = $_GET['id_post'];
$edit_topic = $_POST['edit_topic'];
$edit_post_text = $_POST['edit_post_text'];

// Update

if (isset($_POST['edit_submit'])) {
	$sqll = "UPDATE crud_post SET topic=?, post_text=? WHERE id_post=?";
	$querys = $pdo->prepare($sqll);
	$querys->execute([$edit_topic, $edit_post_text, $get_id]);
  header('Location: /Микроблог Newswriter/admin/index.php' );
}

// DELETE
if (isset($_POST['delete_submit'])) {
	$sql = "DELETE FROM crud_post WHERE id_post=?";
	$query = $pdo->prepare($sql);
	$query->execute([$get_id]);
  header('Location: /Микроблог Newswriter/admin/index.php' );
}
?>