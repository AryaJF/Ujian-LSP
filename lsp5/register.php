<?php include 'template/session.php' ?>
<?php if (empty($user)) { ?>
<?php include 'template/header.php' ?>
<?php include 'template/navbar.php'?>
<?php
    if(isset($_COOKIE['error_register'])){
        $error = $_COOKIE['error_register'];
    }else{
        $error = null;
    }
?>
<form action="process/register.php" method="post">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Username</label>
        <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nama</label>
        <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input name="password" type="password" class="form-control" id="exampleInputPassword1">
    </div>
    <?php if($error){ ?>
    <div class="alert alert-danger"><?php echo $error ?></div>
    <?php } ?>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php include 'template/footer.php' ?>
<?php } else {
  header("Location:index.php");
}
?>