<?php 

    include("db.php");

    if(isset($_GET['id']))
    {
        $id= $_GET['id'];

        $query ="SELECT * FROM tareas WHERE id=$id";
        $result=mysqli_query($conn, $query);
        if(mysqli_num_rows($result) == 1)
        {
            $row=mysqli_fetch_array($result);
            $title=$row['Titulo'];
            $descripcion=$row['descripción'];

        }
    }

?>

<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card car-body">
                <form action="">
                    <div class="form-group">
                        <input type="text" name="title" value=<?php echo $title;?>>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>