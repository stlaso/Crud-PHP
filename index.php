<?php include("db.php")?>
<?php include("includes/header.php")?>

    <div class="container p-4">
    
        <div class="row">

            <div class="col-md-4">

            <?php if(isset($_SESSION['message'])){?>
                <div class="alert alert-<?=$_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message']?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            <?php session_unset();} ?>
            

                <div class="card card-body">

                    <form action="save_task.php" method="POST">

                        <div class="form-group">

                            <input type="text" name="title" class="form-control"
                             placeholder="Titulo de la tarea" autofocus>
                         </div>

                        <div class="form-group">
                            <textarea name="description"  rows="2" class="form-control" 
                            placeholder="Descripción de la tarea"></textarea>
                        </div>

                        <input type="submit" class="btn btn-success btn-block " name="save_task" value="Guardar tareas">

                            
                        
                    </form>
                </div>
            </div>

            <div class="col-md-8">
                
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Descripción</th>
                            <th>Creado el</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
               
                    <tbody>
                        <?php

                            $query="SELECT *  FROM tareas";
                            $result_task=mysqli_query($conn, $query);

                            while($row= mysqli_fetch_array($result_task))
                            {?>
                                <tr>
                                    <td><?php echo $row['Titulo'] ?></td>
                                    <td><?php echo $row['Descripción'] ?></td>
                                    <td><?php echo $row['Crear_at'] ?></td>
                                    <td>
                                        <a href="edit.php?id=<?php  echo $row['id'] ?>" class="btn btn-secondary">
                                           <i class="fas fa-marker"></i>
                                        </a>
                                        <a href="delete_task.php?id=<?php  echo $row['id'] ?>" class="btn btn-danger"> 
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>



    <?php include("includes/footer.php")?>
 