<?php
    include("include/connection.php");   
    
    if(isset($_REQUEST['submit']))
    {
        $student=$_REQUEST['txtsname'];
        $sub1=$_REQUEST['txtsub1'];
        $sub2=$_REQUEST['txtsub2'];
        $sub3=$_REQUEST['txtsub3'];
        $sub4=$_REQUEST['txtsub4'];
        $sub5=$_REQUEST['txtsub5'];
        $mark1=$_REQUEST['txtmark1'];
        $mark2=$_REQUEST['txtmark2'];
        $mark3=$_REQUEST['txtmark3'];
        $mark4=$_REQUEST['txtmark4'];
        $mark5=$_REQUEST['txtmark5'];
        $total=$mark1+$mark2+$mark3+$mark4+$mark5;
        $per= ($total*100)/500;
        if($mark1<50 || $mark2<50 || $mark3<50 || $mark4<50 || $mark5<50){
            $result=0;
        }
        else{
            $result=1;
        }

        $sqlins="INSERT INTO `tbl_result` (`nm_resultid`, `nm_studentid`, `nm_subid1`, `nm_subid2`, `nm_subid3`, `nm_subid4`, `nm_subid5`, `nm_sub1_mark`, `nm_sub2_mark`, `nm_sub3_mark`, `nm_sub4_mark`, `nm_sub5_mark`, `nm_total`, `nm_persantage`, `nm_result`) VALUES (NULL, '$student', '$sub1', '$sub2', '$sub3', '$sub4', '$sub5', '$mark1', '$mark2', '$mark3', '$mark4', '$mark5', '$total', '$per', '$result')";
        $res=mysqli_query($con,$sqlins);
        if($res)
        {
            header("location:result.php");
        }
        else{
            print_r(mysqli_error($conn));
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
        <form method="post">
            <div class="card">
                <div class="card-header">Add Result</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            Student Name:
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="form-control" name="txtsname" id="txtsname">
                                    <option>--select--</option>
                                    <?php
                                $sql="select * from tbl_student as sub 
                                join tbl_sem as s 
                                on sub.nm_semid=s.nm_semid 
                                join tbl_course as c
                                on c.nm_courseid=s.nm_courseid";
                                $res=mysqli_query($con,$sql);
                                while($r=mysqli_fetch_assoc($res))
                                {
                            ?>
                                    <option value="<?= $r['nm_studentid'] ?>">
                                        <?php echo $r['sz_name']." - ". $r['sz_coursename']. " Sem-".$r['nm_sem'] ?>
                                    </option>
                                    <?php
                                }
                            ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Subject 1:
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <select class="form-control" name="txtsub1" id="txtsub1">
                                    <option>--select--</option>
                                    <?php
                                $sql="SELECT * FROM `tbl_subject` ORDER BY `tbl_subject`.`sz_subjectname` ASC";
                                $res=mysqli_query($con,$sql);
                                while($r=mysqli_fetch_assoc($res))
                                {
                            ?>
                                    <option value="<?= $r['nm_subjectid'] ?>"><?= $r['sz_subjectname'] ?></option>
                                    <?php
                                }
                            ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">

                                <input type="text" class="form-control" name="txtmark1" id="txtmark1"
                                    aria-describedby="helpId" placeholder="Enter Marks">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Subject 2:
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <select class="form-control" name="txtsub2" id="txtsub2">
                                    <option>--select--</option>
                                    <?php
                                $sql="SELECT * FROM `tbl_subject` ORDER BY `tbl_subject`.`sz_subjectname` ASC";
                                $res=mysqli_query($con,$sql);
                                while($r=mysqli_fetch_assoc($res))
                                {
                            ?>
                                    <option value="<?= $r['nm_subjectid'] ?>"><?= $r['sz_subjectname'] ?></option>
                                    <?php
                                }
                            ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">

                                <input type="text" class="form-control" name="txtmark2" id="txtmark2"
                                    aria-describedby="helpId" placeholder="Enter Marks">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Subject 3:
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <select class="form-control" name="txtsub3" id="txtsub3">
                                    <option>--select--</option>
                                    <?php
                                $sql="SELECT * FROM `tbl_subject` ORDER BY `tbl_subject`.`sz_subjectname` ASC";
                                $res=mysqli_query($con,$sql);
                                while($r=mysqli_fetch_assoc($res))
                                {
                            ?>
                                    <option value="<?= $r['nm_subjectid'] ?>"><?= $r['sz_subjectname'] ?></option>
                                    <?php
                                }
                            ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">

                                <input type="text" class="form-control" name="txtmark3" id="txtmark3"
                                    aria-describedby="helpId" placeholder="Enter Marks">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Subject 4:
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <select class="form-control" name="txtsub4" id="txtsub4">
                                    <option>--select--</option>
                                    <?php
                                $sql="SELECT * FROM `tbl_subject` ORDER BY `tbl_subject`.`sz_subjectname` ASC";
                                $res=mysqli_query($con,$sql);
                                while($r=mysqli_fetch_assoc($res))
                                {
                            ?>
                                    <option value="<?= $r['nm_subjectid'] ?>"><?= $r['sz_subjectname'] ?></option>
                                    <?php
                                }
                            ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">

                                <input type="text" class="form-control" name="txtmark4" id="txtmark4"
                                    aria-describedby="helpId" placeholder="Enter Marks">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Subject 5:
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <select class="form-control" name="txtsub5" id="txtsub5">
                                    <option>--select--</option>
                                    <?php
                                $sql="SELECT * FROM `tbl_subject` ORDER BY `tbl_subject`.`sz_subjectname` ASC";
                                $res=mysqli_query($con,$sql);
                                while($r=mysqli_fetch_assoc($res))
                                {
                            ?>
                                    <option value="<?= $r['nm_subjectid'] ?>"><?= $r['sz_subjectname'] ?></option>
                                    <?php
                                }
                            ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">

                                <input type="text" class="form-control" name="txtmark5" id="txtmark5"
                                    aria-describedby="helpId" placeholder="Enter Marks">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer" align="right">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>

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