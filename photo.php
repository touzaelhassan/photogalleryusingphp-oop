<?php include "./includes/head.php"; ?>

<?php
if (isset($_GET["photo_id"])) {
  $photo_id = $_GET['photo_id'];
}

$photo = Photo::get_photo_by_id($photo_id);

if (isset($_POST["add_comment"])) {
  $comment_author = $_POST["comment_author"];
  $comment_body = $_POST["comment_body"];

  $comment = Comment::instantiation_comment($photo->photo_id, $comment_author, $comment_body);

  if ($comment && $comment->create_comment()) {
    header("location: photo.php?photo_id=$photo->photo_id");
  }
}

?>

<?php include "./includes/header.php"; ?>

<div class="">
  <h1>PHOTO</h1>
  <div class="comments">
    <form action="" method="POST" class="comments__form">
      <div class="form-group">
        <label>Author</label>
        <input type="text" class="form-control" name="comment_author">
      </div>
      <div class="form-group">
        <label>Comment</label>
        <textarea name="comment_body" class="form-control" cols="30" rows="10"></textarea>
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-primary" value="ADD COMMENT" name="add_comment">
      </div>
    </form>
    <div class="comments__content"></div>
  </div>
</div>

<?php include "./includes/footer.php"; ?>

<?php include "./includes/foot.php"; ?>