<?php
    session_start();
    require('../conexionDB.php');
    header('Content-type: application/json');

    $accion = (isset($_REQUEST['accion']))?$_GET['accion']:'leer';

    switch ($accion) {
        case 'agregar':
            // Instrucciones para agregar servicio.
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
            // Intrucciones para eliminar servicio.
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

        case 'actualizar':
            // Intrucciones para controlar actualizaciones de eventos.
            try{
                if(isset($_REQUEST['id_servicioU'])){
                    $sql = ("INSERT INTO actualizar (fecha,
                                                    hora_inicio,
                                                    hora_final,
                                                    ubicacion,
                                                    descripcion,
                                                    id_cliente,
                                                    id_servicio)
                                            VALUES  (:fecha,
                                                    :hora_inicio,
                                                    :hora_final,
                                                    :ubicacion,
                                                    :descripcion,
                                                    :id_cliente,
                                                    :id_servicio)");
                    $stmt = $conex->prepare($sql);
                    $stmt->bindParam(':fecha',$_POST['fechaU']);
                    $stmt->bindParam(':hora_inicio',$_POST['horaIniU']);
                    $stmt->bindParam(':hora_final',$_POST['horaFinU']);
                    $stmt->bindParam(':ubicacion',$_POST['ubicacionU']);
                    $stmt->bindParam(':descripcion',$_POST['descripcionU']);
                    $stmt->bindParam(':id_cliente',$_SESSION['id']);
                    $stmt->bindParam(':id_servicio',$_POST['id_servicioU']);

                    $mensaje = "Ha solicitado la actualización de su evento.";
                    $leido = 0;
                    $id_servicio = $_POST['id_servicioU'];

                    $sql2=$conex->exec("UPDATE notificaciones SET mensaje='$mensaje', leido='$leido' WHERE id_servicio = '$id_servicio'" );

                    if($stmt->execute() == true and $sql2 == true){
                        header("location: ../../views/Cli_misSolicitudes.php?solicitudActuEnviada");
                        exit;
                    }else{
                        header("location: ../../views/Cli_misSolicitudes.php?error");
                        exit;
                    }
                }
            }catch(PDOException $e){
                echo "Error al procesar la actualización".$e;
            }
            break;

        case 'notificaciones':
            // Intrucciones para controlar notificaciones.
            try{
                // Apartado de sugerencias
                if(isset($_REQUEST['sugerencia']) and ($_REQUEST['id_clienteSugerencia'])){
                    $mensaje = $_REQUEST['sugerencia'];
                    $id = $_REQUEST['id_clienteSugerencia'];
                    $leido = 0;
                    $sql=$conex->exec("INSERT INTO notificaciones (mensaje,leido,id_cliente) VALUES('$mensaje','$leido','$id')");
                
                    if($sql == true){
                        header("location: ../../views/bienvenido.php?sugerenciaEnviada");
                        exit;
                    }else{
                        header("location: ../../views/bienvenido.php?error");
                        exit;
                    }
                // Apartado de mensajes leídos    
                }else if(isset($_REQUEST['msjId_notificacion']) and ($_REQUEST['msjId_cliente'])){
                    $idNoti = $_REQUEST['msjId_notificacion'];
                    $idCli = $_REQUEST['msjId_cliente'];
                    echo $idNoti;
                    echo $idCli;
                    $leido = 2;
                    $sql=$conex->exec("UPDATE notificaciones SET leido='$leido' WHERE id_cliente='$idCli' and id_notificacion='$idNoti'");
                    if($sql == true){
                        header("location: ../../views/bienvenido.php");
                        exit;
                    }else{
                        header("location: ../../views/bienvenido.php");
                        exit;
                    }
                }
            }catch(PDOException $e){
                echo "Error al procesar las notificaciones".$e;
            }
            break;
        
        default:
            $sql = $conex->prepare("SELECT * FROM v_servicio");
            $sql->execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($result);
            break;
    }
