<!DOCTYPE html>
<html>

<head>
    <title>Cuida Tu Vejez </title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>  
    <?php        
            if (isset($_POST["enviar"])) {
                $login= $_POST["login"];
                $pass= $_POST["pass"];
                if($login==="admin" && $pass==="1234"){
                    header('Location: seleccion.html');
                }else{
                    header("Location: index.php");
                }
            }else{
    ?>
       <div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <h1>Bienvenido a <br> Cuida Tu Vejez</h1>
    <!-- Login Form -->
    <form action="index.php" method="post">
      <input type="text" id="login" class="fadeIn second" name="login" placeholder="login">
      <input type="password" id="password" class="fadeIn third" name="pass" placeholder="password">
      <input type="submit" class="fadeIn fourth" value="enviar" name="enviar"  >
    </form>    
    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Haz olvidado la Contraseña?</a>
    </div>

  </div>
</div>
      
</body>

<?php } ?>

</html>



 
<!--  -->
