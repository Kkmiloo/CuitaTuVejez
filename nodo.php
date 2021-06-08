<html>

<head>
    <title>Proyecto IoT - Nodo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="./css/nodo.css">

</head>

<body>
    <?php
 $nodo = $_POST["nodo"];

$token= $_POST["token"];


 ?>

    <header>
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand mb-0 h1" href="seleccion.html">Volver</a>
            <?php  
            $nombre= $_POST["nombre"];
            echo "<h3> $nombre</h3>";
            ?>
            <p id='nombrePagina'> CuidaTuVejez</p>
        </nav>
    </header>

    <div class="row">
        <div>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Ritmo Cardiado (BPM)</th>
                        <th scope="col">Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
   
   function llamarAPI($nodo,$var,$token){
    $url_rest = "https://things.ubidots.com/api/v1.6/devices/$nodo/$var/values?token=$token";//verificar 
    date_default_timezone_set('America/Bogota');
    $curl = curl_init($url_rest);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   
    $respuesta = curl_exec($curl);
    
    if($respuesta===false){
    curl_close($curl);
    die ("Error...");
    }
    
    $resp = json_decode($respuesta);
    
    $result = $resp -> results;
    if($var == "Arritmia" ){
        $j = $result[0];
        $valor = $j -> value;
        echo "<p id='a1'> $valor </p>" ;

        echo "<script src='./nodo.js'></script>";
    }elseif($var =="AlertaGlucosa"){
        $j = $result[0];
        $valor = $j -> value;
        echo "<p id='a2'> $valor </p>" ;

        echo "<script src='./nodo.js'></script>";

    }else{
        for ($i=0; $i<10; $i++){
            $j = $result[$i];
            $valor = $j -> value;
            $time = $j -> timestamp;
            
             ;
            $fecha = date('d-m-Y H:i:s',$time/1000);
            echo "<tr><td>$valor</td><td>$fecha</td></tr>";
        }
  
    }
 }
 $var = "RitmoCardiaco";

 llamarAPI($nodo,$var,$token);
   
   
   
   ?>
                </tbody>
            </table>
        </div>
        <div class>
            <h2>Alerta<br> Arritmia</h2>
        <div id="circulo">
        <?php 
                $var= "Arritmia";
                $var = llamarAPI($nodo,$var,$token);          
                
        ?>
           
        </div>
        </div>
        <div>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Glucosa (Mg/Dl)</th>
                        <th scope="col">Fecha</th>
                    </tr>
                </thead>
                <tbody>

                    <?php 
        $var= "Glucosa";
         llamarAPI($nodo,$var,$token);
          ?>
                </tbody>
            </table>
        </div>

        <div class>
            <h2>Alerta<br> Glucosa</h2>
        <div id="circulo1">
        <?php 
                $var= "AlertaGlucosa";
                $var = llamarAPI($nodo,$var,$token);          
                
        ?>
           
            </script>
        </div>
        </div>

    </div>

</body>

</html>