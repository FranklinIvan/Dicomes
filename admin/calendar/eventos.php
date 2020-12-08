<?php
    session_start();
    require('../conexionDB.php');
    header('Content-type: application/json');

    $accion = (isset($_REQUEST['accion']))?$_GET['accion']:'leer';

    switch ($accion) {
        case 'agregar':
            // Instrucción para agregar servicio
            try {
                $sql = "INSERT INTO servicio (start,
                                            ubicacion,
                                            hora_inicio, 
                                            hora_final, 
                                            tipo_servicio, 
                                            tipo_evento, 
                                            cantidad_personas, 
                                            title, 
                                            descripcion,
                                            estado,
                                            color,
                                            id_cliente)
                                    VALUES (:start,
                                            :ubicacion,
                                            :hora_inicio, 
                                            :hora_final, 
                                            :tipo_servicio, 
                                            :tipo_evento, 
                                            :cantidad_personas, 
                                            :title, 
                                            :descripcion,
                                            :estado,
                                            :color,
                                            :id_cliente)";
                $stmt = $conex->prepare($sql);
                $stmt->bindParam(':start',$_POST['fecha']);
                $stmt->bindParam(':ubicacion',$_POST['ubicacion']);
                $stmt->bindParam(':hora_inicio',$_POST['horaInicio']);
                $stmt->bindParam(':hora_final',$_POST['horaFinal']);
                $stmt->bindParam(':tipo_servicio',$_POST['tipoServicio']);
                $stmt->bindParam(':tipo_evento',$_POST['tipoEvento']);
                $stmt->bindParam(':cantidad_personas',$_POST['cantidadPersonas']);
                $stmt->bindParam(':title',$_POST['titulo']);
                $stmt->bindParam(':descripcion',$_POST['descripcion']);
                $estado = 'pendiente';
                $stmt->bindParam(':estado',$estado);
                $color = 'lightslategray';
                $stmt->bindParam(':color',$color);
                $cliente = $_SESSION['id'];
                $stmt->bindParam(':id_cliente',$cliente);
                $stmt->execute();

                $sql2 = "INSERT INTO notificaciones(mensaje,leido,id_cliente,id_servicio) VALUES(:mensaje,:leido,:id_cliente,:id_servicio)";

                $stmt2 = $conex->prepare($sql2);
                $mensaje = 'Ha solicitado una cobertura de evento.';
                $leido = 0;
                $stmt2->bindParam(':mensaje',$mensaje);
                $stmt2->bindParam(':leido',$leido);
                $stmt2->bindParam(':id_cliente',$cliente);
                $lastInsertId = $conex->lastInsertId($sql);
                $stmt2->bindParam(':id_servicio',$lastInsertId);
                $stmt2->execute();
    
                if($stmt == true and $stmt2 == true){
                    
                    header("location: ../../views/bienvenido.php?solicitudEnviada");
                    exit;
                }else{
                    header("location: ../../views/bienvenido.php?error");
                    exit;
                }
            } catch (PDOException $e) {
                echo "Error al ingresar datos".$e;
            }
            break;

        case 'eliminar':
            // Intrucción para eliminar servicio
            try{
                $sql = "DELETE FROM servicio WHERE id =:id";
                $stmt = $conex->prepare($sql);
                $stmt->bindParam(':id',$_POST['idEliminar']);
                if($stmt->execute() == true){
                    if (isset ($_REQUEST['listaEventos'])){
                        header ("Location: ../../views/listaEventos.php?msgEliminado=Eliminado");
                    }
                    else{
                        header("location: ../../views/Cli_misSolicitudes.php?solicitudEliminada");
                    }
                    
                    exit;
                }else{
                    if (isset ($_REQUEST['listaEventos'])){
                        echo "La variable no esta definida";
                    }
                    else{
                        header("location: ../../views/Cli_misSolicitudes.php?error");
                    }
                    exit;
                }
            }catch(PDOException $e){
                echo "Error al eliminar datos".$e;
            }
            break;
        
        default:
            $sql = $conex->prepare("SELECT * FROM v_servicio");
            $sql->execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($result);
            break;
    }

?>