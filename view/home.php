<?php
include '../services/conexion.php';
session_start();
if (isset($_SESSION['username'])){

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <script type="text/javascript" src="../js/menu.js"></script>
    <title>PROYECTO</title>
</head>
<body>
<div id="mySidepanel" class="sidepanel">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="historial.php">Historial</a>
  <a href="../processes/logout.proc.php">Logout</a>
</div>
<div class="msgopen">

<button class="openbtn" onclick="openNav()">&#9776;</button>
</div>
<h1>Benvingut
    <?php 
     echo $_SESSION['username'];?>
</h1>
<br>
<h2 id='count2'></h2>
<div class="cuerpo-home">
  <div class="container-filtros">
    <form action="home.php" method="post" class="form-filtros">
        <div>
          <h3>Filtrar taules</h3>
        </div>
        <br>
          <div>
            <label for="num_taula" class="fuente">Num. de taula</label>
            <select name="num_taula">
            <option value="*">Totes les taules</option>
            <?php
                  $stmt = $pdo->prepare("SELECT num_taula FROM tbl_taula order by num_taula");
                  $stmt->execute();
                  $taules = $stmt->fetchAll(PDO::FETCH_ASSOC);
                  foreach($taules as $taula){
                ?>
                <option value="<?php echo $taula['num_taula']; ?>"><?php echo $taula['num_taula']; ?></option>
            
                <?php
                  }
                ?>
            </select>
          </div>
          <br>
          <div>
            <label for="sala" class="fuente">Sala</label>
            <select name="sala">
                <option value="*">Totes les sales</option>
                <?php
                  $stmt = $pdo->prepare("SELECT nom_sala FROM tbl_sala");
                  $stmt->execute();
                  $sales = $stmt->fetchAll(PDO::FETCH_ASSOC);
                  foreach($sales as $sala){
                ?>
                <option value="<?php echo $sala['nom_sala']; ?>"><?php echo $sala['nom_sala']; ?></option>
            
                <?php
                  }
                ?>
            </select>
          </div>
          <br>
          <div>
            <label for="estado" class="fuente">Estat de la taula</label>
            <select name="estado" id="estado">
                <option value="ambas" selected>Ambdues</option>
                <option value="1">Reservada</option>
                <option value="0">Lliure</option>
            </select>
          </div>
          <br>
          <div>
            <input type="submit" name="enviarfiltro" value="BUSCAR">
          </div>
      </form>
    </div>
    <div class="mostrar-mesas">
      <?php
      if(!isset($_POST['enviarfiltro'])){
        $stmt=$pdo->prepare("SELECT t.num_taula, t.num_llocs_taula, t.id_sala, t.estat_taula, s.nom_sala from tbl_taula t inner join tbl_sala s on t.id_sala=s.id_sala order by t.estat_taula, t.num_taula;");
        $stmt->execute();
        $listamesas=$stmt->fetchAll(PDO::FETCH_ASSOC);    
      }else{
            //000
          if(($_POST['estado']=='ambas') && ($_POST['num_taula']=="*") && $_POST['sala']=='*'){
              $stmt=$pdo->prepare("SELECT t.num_taula, t.num_llocs_taula, t.id_sala, t.estat_taula, s.nom_sala from tbl_taula t inner join tbl_sala s on t.id_sala=s.id_sala order by t.estat_taula, t.num_taula;");
              $stmt->execute();
              $listamesas=$stmt->fetchAll(PDO::FETCH_ASSOC);  
          }//100
          elseif($_POST['estado']!='ambas' && ($_POST['num_taula']=="*") && ($_POST['sala']=='*')){
              $stmt=$pdo->prepare("SELECT t.num_taula, t.num_llocs_taula, t.id_sala, t.estat_taula, s.nom_sala from tbl_taula t inner join tbl_sala s on t.id_sala=s.id_sala where t.estat_taula='".$_POST['estado']."' order by t.estat_taula, t.num_taula;");
              $stmt->execute();
              $listamesas=$stmt->fetchAll(PDO::FETCH_ASSOC);  
          }//110
          elseif($_POST['estado']!='ambas' && ($_POST['num_taula']!="*") && ($_POST['sala']=='*')){
            $stmt=$pdo->prepare("SELECT t.num_taula, t.num_llocs_taula, t.id_sala, t.estat_taula, s.nom_sala from tbl_taula t inner join tbl_sala s on t.id_sala=s.id_sala where t.estat_taula='".$_POST['estado']."' and t.num_taula='".$_POST['num_taula']."' order by t.estat_taula, t.num_taula;");
            $stmt->execute();
            $listamesas=$stmt->fetchAll(PDO::FETCH_ASSOC);     
          }//101
          elseif($_POST['estado']!='ambas' && ($_POST['num_taula']=="*") && ($_POST['sala']!='*')){
            $stmt=$pdo->prepare("SELECT t.num_taula, t.num_llocs_taula, t.id_sala, t.estat_taula, s.nom_sala from tbl_taula t inner join tbl_sala s on t.id_sala=s.id_sala where t.estat_taula='".$_POST['estado']."' and s.nom_sala='".$_POST['sala']."' order by t.estat_taula, t.num_taula;");
            $stmt->execute();
            $listamesas=$stmt->fetchAll(PDO::FETCH_ASSOC);     
          }//010
          elseif($_POST['estado']=='ambas' && ($_POST['num_taula']!="*") && ($_POST['sala']=='*')){
            $stmt=$pdo->prepare("SELECT t.num_taula, t.num_llocs_taula, t.id_sala, t.estat_taula, s.nom_sala from tbl_taula t inner join tbl_sala s on t.id_sala=s.id_sala where t.num_taula='".$_POST['num_taula']."' order by t.estat_taula, t.num_taula;");
            $stmt->execute();
            $listamesas=$stmt->fetchAll(PDO::FETCH_ASSOC);     
          }//011
          elseif($_POST['estado']=='ambas' && ($_POST['num_taula']!="*") && ($_POST['sala']!='*')){
            $stmt=$pdo->prepare("SELECT t.num_taula, t.num_llocs_taula, t.id_sala, t.estat_taula, s.nom_sala from tbl_taula t inner join tbl_sala s on t.id_sala=s.id_sala where t.num_taula='".$_POST['num_taula']."' and s.nom_sala='".$_POST['sala']."' order by t.estat_taula, t.num_taula;");
            $stmt->execute();
            $listamesas=$stmt->fetchAll(PDO::FETCH_ASSOC);     
          }//001
          elseif($_POST['estado']=='ambas' && ($_POST['num_taula']=="*") && ($_POST['sala']!='*')){
            $stmt=$pdo->prepare("SELECT t.num_taula, t.num_llocs_taula, t.id_sala, t.estat_taula, s.nom_sala from tbl_taula t inner join tbl_sala s on t.id_sala=s.id_sala where s.nom_sala='".$_POST['sala']."' order by t.estat_taula, t.num_taula;");
            $stmt->execute();
            $listamesas=$stmt->fetchAll(PDO::FETCH_ASSOC);  
          }//111
          else{
            $stmt=$pdo->prepare("SELECT t.num_taula, t.num_llocs_taula, t.id_sala, t.estat_taula, s.nom_sala from tbl_taula t inner join tbl_sala s on t.id_sala=s.id_sala where t.estat_taula='".$_POST['estado']."' and t.num_taula='".$_POST['num_taula']."' and s.nom_sala='".$_POST['sala']."' order by t.estat_taula, t.num_taula;");
            $stmt->execute();
            $listamesas=$stmt->fetchAll(PDO::FETCH_ASSOC);                
          }
      }
      
      foreach ($listamesas as $mesa) {

        ?>
        <div class="mesa">
          <div class="parte-mesa">
            <?php 
              if($mesa['estat_taula']==0){
                ?>
                <img class="tamanoimagen" width="100%" src="../img/silla_verde.png" alt="logomesa_libre">
                <?php
              }else{
                ?>
                <img class="tamanoimagen2" width="100%" src="../img/silla_roja.png" alt="logomesa">
                <?php
              }
            ?>
          </div>
          <div class="parte-mesa">
            <h4><?php echo "<br>Taula num. ".$mesa['num_taula']; ?></h4>
            <h6><?php echo "<br>Sala: ".$mesa['nom_sala']; ?></h6>
            <h6><?php echo "<br>Num. de llocs: ".$mesa['num_llocs_taula']; ?></h6>
            <h6><?php 
            if($mesa['estat_taula']==1){
              echo "<br>Estat de la taula: <span class='estat-taula-reservada'>Reservada</span></h6>";
            }else{
              echo "<br>Estat de la taula: <span class='estat-taula-lliure'>Lliure</span></h6>";
            }
            ?>
          </div>
          <div class="parte-mesa  contenedor">
              <?php 
                if($mesa['estat_taula']==1){
                  echo "<button type='button' class='boton uno' onclick='window.location.href=`../processes/home2.php?num_taula=".$mesa['num_taula']."&estat_taula=".$mesa['estat_taula']."`'><span>ALLIBERAR</span></button>";
                }else{
                  echo "<button type='button' class='boton dos' onclick='window.location.href=`../processes/home2.php?num_taula=".$mesa['num_taula']."&estat_taula=".$mesa['estat_taula']."`'><span>RESERVAR</span></button>";
                }

              ?>
          </div>
        </div>
        <?php
      }
      $count= count($listamesas);
      ?>
              <input type=hidden value='<?php echo $count;?>' id='count'>
    </div>
  </div>
</body>
</html>
<?php } else {header('location:login.php');}?>
