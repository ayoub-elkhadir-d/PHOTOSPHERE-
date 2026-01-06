<?php
require_once __DIR__ . '/../App/Repositories/Album_repo.php';
require_once __DIR__ . '/../Config/DataBase/db_con.php';
?>
<?php 
$obj_album = new Album_Repo();
$all_albums = $obj_album->fetchAll();
// print_r($all_albums);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photography Portfolio</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="styles/index.css">
</head>
<body>

    <nav>
        <div class="logo">PHOTOSPHERE</div>
        <ul class="nav-links">
            <li><a href="#">Home</a></li>
            <li><a href="#">Portfolio</a></li>
            <li><a href="#">Stories</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
        <div class="auth-buttons">
          <a href="register.php">  <button class="btn btn-login">Regester</button></a>
            <button class="btn btn-create">Sign Up</button>
        </div>
    </nav>

    <div class="container">
        <div class="section-header">
            <div class="section-subtitle">Selected Works</div>
            <h1 class="section-title">Visual Stories</h1>
        </div>

        <div class="albums-grid">
            
<?php foreach($all_albums as $album){ ?>
  
            <div class="album-card">
                <img src="<?php echo $album->getCover()?>" alt="Mountain" class="album-image">
                <div class="album-overlay">
                    <span class="category-tag"><?php echo $album->getName()?></span>
                    <h2 class="album-title"><?php echo $album->getDescription()?></h2>
                    <span class="view-details">View Collection</span>
                </div>
            </div>

<?php } ?>

        </div>
    </div>
</body>
</html>