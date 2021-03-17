<?php
    session_start();
    if(isset($_SESSION['username'])){
        require 'koneksi.php';
        $stmt = $conn->prepare('SELECT * FROM user WHERE username=:username');
        $stmt->bindValue(':username', $_SESSION['username']);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_OBJ);
    }else{
        $user = null;
    }
?>
<?php require 'template/header.php'; ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            <?php if($user){ ?>
                <a class="nav-link" href="dashboard.php"><?php echo $user->nama ?></a>
                <a class="nav-link" href="process/signout.php">Signout</a>
            <?php }else{ ?>
                <a class="nav-link" href="login.php">Login</a>
                <a class="nav-link" href="register.php">Register</a>
            <?php } ?>
            </div>
        </div>
    </div>
</nav>

<h1>LSP</h1>
<?php require 'template/footer.php'; ?>