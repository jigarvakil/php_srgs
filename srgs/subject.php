<?php
    include("include/connection.php");

    if(isset($_REQUEST['submit']))
    {
        $subject=$_REQUEST['txtsub'];
        $sem=$_REQUEST['txtsem'];
        
        $sqlins="INSERT INTO `tbl_subject` (`nm_subjectid`, `nm_semid`, `sz_subjectname`) VALUES (NULL, '$sem', '$subject')";
        $res=mysqli_query($con,$sqlins);
        if($res)
        {
            header("location:subject.php");
        }
        else
        {
            print_r(mysqli_error($con));
        }

    }

    if(isset($_REQUEST['usubmit']))
    {
        $subid=$_REQUEST['txtsubid'];
        $subject=$_REQUEST['txtsubject1'];
        $sem=$_REQUEST['txtsem1'];
        
        $sqlup="update tbl_subject set nm_semid=$sem,sz_subjectname='$subject' where nm_subjectid=$subid";
        
        $res=mysqli_query($con,$sqlup);
        if($res)
        {
            header("location:subject.php");
        }
        else
        {
            print_r(mysqli_error($con));
        }
    }


    if(isset($_GET['del']))
    {
        $id=$_GET['del'];
        $sqldel="delete from tbl_subject where nm_subjectid=$id";
        $res=mysqli_query($con,$sqldel);
        if($res)
        {
            header("location:subject.php");
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
    <title>Subjects</title>
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
            <div class="card-header">Subjects</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12" align="right">
                        <!-- Button to Open the Modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            + Add New Course
                        </button>
                        <br>
                        <br>
                        <table class="table table-dark table-striped" border="1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Course Name</th>
                                    <th>Semester</th>
                                    <th>Subject</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i=1;
                                    $sql="select * from tbl_subject as sub 
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
                                    <td><?= strtoupper($r['sz_coursename']) ?></td>
                                    <td><?= strtoupper($r['nm_sem']) ?></td>
                                    <td><?= strtoupper($r['sz_subjectname']) ?></td>
                                    <td>

                                        <button type="button" class="btn btn-primary cup"
                                            data-sem="<?= $r['nm_semid'] ?>"
                                            data-subid="<?= $r['nm_subjectid'] ?>" data-subject="<?= $r['sz_subjectname'] ?>" data-toggle="modal"
                                            data-target="#upModal">
                                            <i class="fas fa-edit"></i>  Edit 
                                        </button>
                                        <a href="subject.php?del=<?= $r['nm_subjectid'] ?>" class="btn btn-danger"><i
                                                class="fas fa-trash"></i>  Delete</a>
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
                                <h4 class="modal-title">Insert Subject</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6" style="margin-top:30px">
                                        Course Name/ Semester:
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for=""></label>
                                            <select class="form-control" name="txtsem" id="txtsem">
                                                <option>--Select--</option>
                                                <?php
                                                    $i=1;
                                                    $sql="select * from tbl_sem as s join tbl_course as c on c.nm_courseid=s.nm_courseid ";
                                                    $res=mysqli_query($con,$sql);
                                                    while($r1=mysqli_fetch_assoc($res))
                                                    {
                                                ?>
                                                <option value=<?= $r1['nm_semid'] ?>><?php echo strtoupper($r1['sz_coursename']). " Sem-". $r1['nm_sem']; ?>
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
                                        Subject Name:
                                    </div>
                                    <div class="col-md-6">
                                            <div class="form-group">
                                                <label for=""></label>
                                                <input type="text" class="form-control" name="txtsub" id="txtsub"
                                                    aria-describedby="helpId" placeholder="">
                                                <small id="helpId" class="form-text text-muted">Enter Subject Name i.e PHP</small>
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
                                            <select class="form-control" name="txtsem1" id="txtsem1">
                                                <option>--Select--</option>
                                                <?php
                                                    $i=1;
                                                    $sql="select * from tbl_sem as s join tbl_course as c on c.nm_courseid=s.nm_courseid ";
                                                    $res=mysqli_query($con,$sql);
                                                    while($r1=mysqli_fetch_assoc($res))
                                                    {
                                                ?>
                                                <option value=<?= $r1['nm_semid'] ?>><?php echo strtoupper($r1['sz_coursename']). " Sem-". $r1['nm_sem']; ?>
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
                                            <input type="hidden" name="txtsubid" id="txtsubid">
                                            <div class="form-group">
                                                <label for=""></label>
                                                <input type="text" class="form-control" name="txtsubject1" id="txtsubject1"
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
            
            sem = $(this).data('sem');
            subid = $(this).data('subid');
            subject = $(this).data('subject');
            $('#txtsubid').val(subid);
            $('#txtsubject1').val(subject);
            $('#txtsem1').val(sem);

        });
    });
    </script>
</body>

</html>