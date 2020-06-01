<!DOCTYPE html>
<html lang="en">
<head>
  <title>Aeolian Alexanders</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>

<?php
  include('dbconnect.php');
  try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
  }catch (PDOException $e) {
    echo "Error : " . $e->getMessage() . "<br/>";
    die();
  }

  //echo 'Hello ' . htmlspecialchars($_GET["coin_id"]) . '!';
  $id = strval($_GET["coin_id"]);
  //$id = '1';

  $sth = $pdo->prepare('SELECT * FROM all_coins WHERE coinid = :parameter');
  $sth->bindParam(':parameter', $id, PDO::PARAM_STR);
  $sth->execute();
  $result = $sth -> fetch();
  include('nav.php');
    ?>
    <br/>
    <br/>
    <br/>
    <main role="main">

    <br/>

    <div class="row">
      <div class="col-md-3" style="padding-left: 25px;">
        <h3>Coin Information</h3>
        <br/>
        <br/>

      <?php

          echo "<h6> Coin ID: " . $result["coinid"]. "</h4>";
          echo "<h6> Mint: " . $result["mint"]. "</h4>";
          echo "<h6> Title: " . $result["title"]. "</h4>";
          echo "<h6> Weight: " . $result["weight"]. "</h4>";;
          echo "<h6> Size: " . $result["size"]. "</h4>";
          echo "<h6> Material: " . $result["material"]. "</h4>";
          echo "<h6> Denomenation: " . $result["denom"]. "</h4>";
          echo "<h6> Rotation: " . $result["rotation"]. "</h4>";
          echo "<h6> Type ID: " . $result["typeid"]. "</h4>";
          echo "<h6> Obverse Die: " . $result["obvdie"]. "</h4>";
          echo "<h6> Reverse Die: " . $result["revdie"]. "</h4>";
      ?>
      </div>
      <div class="col-md-3"><h3>Obverse</h3>
        <?php
        echo '<img src="https://raw.githubusercontent.com/Aeolian-Alexanders/coins/master/images/'.$result["coinid"].'_o.png" alt="coin obverse image" class="img-thumbnail">';
        ?>
      </div>
      <div class="col-md-3"><h3>Reverse</h3>
            <?php
        echo '<img src="https://raw.githubusercontent.com/Aeolian-Alexanders/coins/master/images/'.$result["coinid"].'_r.png" alt="coin reverse image" class="img-thumbnail">';
        ?>
      </div>

    </div>
  </main>
<?php
include('footer.php');
?>


</body>
</html>
