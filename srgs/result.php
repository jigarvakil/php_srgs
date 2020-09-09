<?php
    include("include/connection.php");  
    if(isset($_GET['del']))
    {
        $id=$_GET['del'];
        $sqldel="delete from tbl_result where nm_resultid=$id";
        $res=mysqli_query($con,$sqldel);
        if($res)
        {
            header("location:result.php");
        }
        else
        {
            print_r(mysqli_error($con));
        }
    }  
?>
<!doctype html>
<html lang="en">

<head>
    <title>Result</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body style="background-color:gainsboro">

    <?php include('include/header.php') ?>

    <div class="container">
        <div class="card">
            <div class="card-header">Results</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12" align="right">
                        
                        <a href="addresult.php" class="btn btn-primary">+ Add New Result</a>
                        <br>
                        <br>
                        <table class="table table-dark table-striped" border="1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Course Name</th>
                                    <th>Semester</th>
                                    <th>Result</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i=1;
                                    $sql="
                                    select * from tbl_result as r
                                    join tbl_student as sub
                                    on sub.nm_studentid=r.nm_studentid 
                                    join tbl_sem as s 
                                    on sub.nm_semid=s.nm_semid 
                                    join tbl_course as c
                                    on c.nm_courseid=s.nm_courseid";
                                    $res=mysqli_query($con,$sql);
                                    while($r=mysqli_fetch_assoc($res))
                                    {
                                ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= strtoupper($r['sz_name']) ?></td>
                                    <td><?= strtoupper($r['sz_coursename']) ?></td>
                                    <td><?= strtoupper($r['nm_sem']) ?></td>
                                    <td>
                                        <?php
                                            if($r['nm_result']==0)
                                                echo "<b style='color:red'>FAIL</b>";
                                            else
                                            echo "<b style='color:green'>PASS</b>";
                                        ?>
                                    </td>
                                    
                                    <td>

                                        <a href="viewresult.php?id=<?= $r['nm_resultid'] ?>" class="btn btn-primary"><i class="fas fa-eye "></i>  View</a>
                                        <a href="result.php?del=<?= $r['nm_resultid'] ?>" class="btn btn-danger"><i
                                                class="fas fa-trash"></i> Delete</a>
                                    </>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-footer">

            </div>
        </div>

    </div>
    <?php include("include/footer.php"); ?>
    <!-- Body -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>