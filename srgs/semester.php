<?php
    include("include/connection.php");

    if(isset($_REQUEST['submit']))
    {
        $cid=$_REQUEST['txtcname'];
        $sem=$_REQUEST['txtsem'];
        
        $sqlins="INSERT INTO `tbl_sem` (`nm_semid`, `nm_courseid`, `nm_sem`) VALUES (NULL, '$cid', '$sem')";
        $res=mysqli_query($con,$sqlins);
        if($res)
        {
            header("location:semester.php");
        }
        else
        {
            print_r(mysqli_error($con));
        }

    }

    if(isset($_REQUEST['usubmit']))
    {
        $sid=$_REQUEST['txtsid'];
        $cid=$_REQUEST['txtcname1'];
        $sem=$_REQUEST['txtsem1'];
        
        $sqlup="update tbl_sem set nm_courseid=$cid,nm_sem=$sem where nm_semid=$sid";
        
        $res=mysqli_query($con,$sqlup);
        if($res)
        {
            header("location:semester.php");
        }
        else
        {
            print_r(mysqli_error($con));
        }
    }


    if(isset($_GET['del']))
    {
        $id=$_GET['del'];
        $sqldel="delete from tbl_sem where nm_semid=$id";
        $res=mysqli_query($con,$sqldel);
        if($res)
        {
            header("location:semester.php");
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
    <title>Semester</title>
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
            <div class="card-header">Semesters</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12" align="right">
                        <!-- Button to Open the Modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            + Add New Semster
                        </button>
                        <br>
                        <br>
                        <table class="table table-dark table-striped" border="1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Course Name</th>
                                    <th>Semester</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i=1;
                                    $sql="select * from tbl_sem as s join tbl_course as c on c.nm_courseid=s.nm_courseid ";
                                    $res=mysqli_query($con,$sql);
                                    while($r=mysqli_fetch_assoc($res))
                                    {
                                ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= strtoupper($r['sz_coursename']) ?></td>
                                    <td><?= strtoupper($r['nm_sem']) ?></td>
                                    <td>

                                        <button type="button" class="btn btn-primary cup"
                                            data-sem="<?= $r['nm_sem'] ?>"
                                            data-sid="<?= $r['nm_semid'] ?>" data-cid="<?= $r['nm_courseid'] ?>" data-toggle="modal"
                                            data-target="#upModal">
                                            <i class="fas fa-edit"></i> Edit 
                                        </button>
                                        <a href="semester.php?del=<?= $r['nm_semid'] ?>" class="btn btn-danger"><i
                                                class="fas fa-trash"></i> Delete</a>
                                    </td>
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



            <div class="modal fade" id="myModal">
                <div class="modal-dialog">
                    <form method="post">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Insert Course</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6" style="margin-top:30px">
                                        Course Name:
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for=""></label>
                                            <select class="form-control" name="txtcname" id="txtcname">
                                                <option>--Select--</option>
                                                <?php
                                                    $i=1;
                                                    $sql="select * from tbl_course";
                                                    $res=mysqli_query($con,$sql);
                                                    while($r1=mysqli_fetch_assoc($res))
                                                    {
                                                ?>
                                                <option value=<?= $r1['nm_courseid'] ?>><?= $r1['sz_coursename'] ?>
                                                </option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6" style="margin-top:30px">
                                        Semester Number:
                                    </div>
                                    <div class="col-md-6">
                                        
                                            <div class="form-group">
                                                <label for=""></label>
                                                <input type="number" class="form-control" name="txtsem" id="txtsem"
                                                    aria-describedby="helpId" placeholder="">
                                                <small id="helpId" class="form-text text-muted">Enter Sem No</small>
                                            </div>
                                       
                                    </div>
                                </div>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>



            <div class="modal fade" id="upModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="post">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Update Course</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                            <div class="row">
                                    <div class="col-md-6" style="margin-top:30px">
                                        Course Name:
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for=""></label>
                                            <select class="form-control" name="txtcname1" id="txtcname1">
                                                <option>--Select--</option>
                                                <?php
                                                    $i=1;
                                                    $sql="select * from tbl_course";
                                                    $res=mysqli_query($con,$sql);
                                                    while($r1=mysqli_fetch_assoc($res))
                                                    {
                                                ?>
                                                <option value=<?= $r1['nm_courseid'] ?>><?= $r1['sz_coursename'] ?>
                                                </option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6" style="margin-top:30px">
                                        Semester Number:
                                    </div>
                                    <div class="col-md-6">
                                            <input type="hidden" name="txtsid" id="txtsid">
                                            <div class="form-group">
                                                <label for=""></label>
                                                <input type="number" class="form-control" name="txtsem1" id="txtsem1"
                                                    aria-describedby="helpId" placeholder="">
                                                <small id="helpId" class="form-text text-muted">Enter Sem No</small>
                                            </div>
                                       
                                    </div>
                                </div>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="usubmit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
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

    <script>
    $(document).ready(function() {
        $('.cup').click(function() {
            cid = $(this).data('cid');
            sem = $(this).data('sem');
            sid = $(this).data('sid');
            $('#txtsid').val(sid);
            $('#txtsem1').val(sem);
            $('#txtcname1').val(cid);

        });
    });
    </script>
</body>

</html>