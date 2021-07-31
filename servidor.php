<?php 
//conexion a la base de datos
    function conexion(){
        $servidor = "localhost";
        $usuario = "root";
        $password =  "";
        $bd = "sistemasweb";

        $conexion = mysqli_connect($servidor,$usuario,$password,$bd);

        return $conexion;
    }

    $conexion = conexion();

    $sql = "SELECT id_tarea, tarea, estado FROM t_tareas";
    $respuesta = mysqli_query($conexion,$sql);

    $cadenaTabla="";
    $cadenaTabla = $cadenaTabla.'<table class="table table-striped" border="1" >
                                    <thead>
                                        <th>#</th>
                                        <th>tarea</th>
                                        <th>estado</th>
                                        <th>Eliminar</th>
                                    </thead>
                                    <tbody>';
    while ($mostrar = mysqli_fetch_array($respuesta)) {
        $cadenaTabla= $cadenaTabla. '<tr>
                                        <td>'.$mostrar['id_tarea'].'</td>
                                        <td>'.$mostrar['tarea'].'</td>
                                        <td>'.$mostrar['estado'].'</td>
                                        <td>  <button class="btn btn-danger">Eliminar</button></td>
                                    </tr>';
    }

    $titulo =  '<p class=" h1 text-center font-weight-normal "> Crear html desde servidor PHP.</p>';
    
    $letrero='<label for="fecha">Agregar listado de tareas </label>';

    $agregar= '<textarea 
    name="tarea" 
    id="tarea" 
    cols="30" 
    rows="3"
    required 
    class="form-control"
    ></textarea>';

    $boton = '<button class="btn btn-primary">Agregar</button>';

    echo $titulo;
    echo "<br>";
    echo $letrero . $agregar;
    echo "<br>";
    echo $boton;
    echo "<br><br>";
    echo $cadenaTabla = $cadenaTabla . '</tbody></table>';


?>