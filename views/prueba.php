<?php
    require('../admin/conexionDB.php');
    if(!empty($_POST['busqueda'])){
        $busqueda = explode(" ", $_POST['busqueda']);
        $search = "SELECT * FROM cliente WHERE nombre LIKE '%".$busqueda[0]."%'";
        for ($i=1; $i < count($busqueda); $i++) { 
          if(!empty($busqueda[$i])){
            $search .= "AND nombre LIKE '%".$busqueda[$i]."%'";
          }
        }


        $stmt = $conex->prepare($search);
        $stmt->execute();
        while($item = $stmt->fetch(PDO::FETCH_ASSOC)){
            echo '
            <div class="">
                <div>
                    <label>'.$item["nombre"]." ".$item["apellido"].'</label>
                </div>
                <div>
                    <label></label>
                </div>
            </div>
            ';
        }
    }
?>