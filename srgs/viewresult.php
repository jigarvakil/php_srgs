<?php
     include("include/connection.php"); 

     $id=$_GET['id'];
     $studdatasql=" select * from tbl_result as r
          join tbl_student as st
          on st.nm_studentid=r.nm_studentid 
          join tbl_sem as s 
          on st.nm_semid=s.nm_semid 
         join tbl_course as c
         on c.nm_courseid=s.nm_courseid
          where nm_resultid=$id";
          
    
    $res=mysqli_query($con,$studdatasql);
    $studentdata=mysqli_fetch_assoc($res);

?>   
<!doctype html>
<html lang="en">

  <head>
    <title>Title</title>
    <style>
    @media print {
      .noprint {
        visibility: hidden;
      }
    }
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>

  <body>
    <br>
    <a href="result.php" class="btn btn-warning noprint">
      <- Back </a>
        <h2 class="text-center">Result</h2>
        <table border="2" class="table table-bordered">
            <tbody>
                <tr rowspan="2">
                    <td colspan="3">
                    Certificate showing the number of marks obtained by <br>
                    Shri/Smt./Kumari  <b><?= $studentdata['sz_name'] ?></b> <br>
                    in each header of passing at the <b><?= $studentdata['sz_coursename'] ?>  ( SEM <?= $studentdata['nm_sem'] ?> )</b>
                    </td>
                    
                </tr>
                <tr>
                    <td>
                    <table class="table table=borderd">
                        <tr>
                            <th>Subject Name</th>
                            <th>Passing Marks</th>
                            <th>Obtain Marks</th>
                            
                        </tr>
                        
                        <?php 
                            $i=1;
                             $sql="
                             select * from tbl_result as r
                             join tbl_student as st
                             on st.nm_studentid=r.nm_studentid 
                             join tbl_sem as s 
                             on st.nm_semid=s.nm_semid 
                             join tbl_subject as sub
                             on sub.nm_semid=s.nm_semid
                             join tbl_course as c
                             on c.nm_courseid=s.nm_courseid
                             where nm_resultid=$id
                          ";
                          
                          
                          $res=mysqli_query($con,$sql);
                         
                          while($data=mysqli_fetch_assoc($res))
                          {
                        ?>
                            <tr>
                                <td><?= $data['sz_subjectname'] ?></td>
                                <td>50/100</td>
                                <td>
                                    <?php 
                                        if($i==1)
                                        {
                                            if($data['nm_sub1_mark']<50)
                                                echo "<b style='color:red'>".$data['nm_sub1_mark']."</b>";
                                            else
                                                echo $data['nm_sub1_mark'];
                                        }
                                        elseif($i==2)
                                        {
                                            if($data['nm_sub2_mark']<50)
                                                echo "<b style='color:red'>".$data['nm_sub2_mark']."</b>";
                                            else
                                            echo  $data['nm_sub2_mark'];
                                        }
                                        elseif($i==3)
                                        {
                                            if($data['nm_sub3_mark']<50)
                                                echo "<b style='color:red'>".$data['nm_sub3_mark']."</b>";
                                            else
                                            echo $data['nm_sub3_mark'];
                                        }
                                        if($i==4)
                                        {
                                            if($data['nm_sub4_mark']<50)
                                                echo "<b style='color:red'>".$data['nm_sub4_mark']."</b>";
                                            else
                                            echo  $data['nm_sub4_mark'];
                                        }
                                        if($i==5)
                                        {
                                            if($data['nm_sub5_mark']<50)
                                                echo "<b style='color:red'>".$data['nm_sub5_mark']."</b>";
                                            else
                                            echo $data['nm_sub5_mark'];
                                        }

                                       
                                    ?>
                                </td>
                                
                            </tr>                 
                        <?php
                         $i++;
                          }
                        ?>
                        <tr>
                            <th Colspan="3"></th>
                        </tr>
                        <tr>
                            <th>Total</th>
                            <th>500</th>
                            <th><?= $studentdata['nm_total'] ?></th>
                        </tr>
                        <tr>
                            <th Colspan="3"></th>
                        </tr>
                        <tr>
                            <th colspan="2">Percentage</th>
                            <th><?= $studentdata['nm_persantage'] ?>%</th>
                        </tr>
                        <tr>
                            <th Colspan="3"></th>
                        </tr>
                        <tr>
                            <th colspan="2">Result</th>
                            <th>
                                <?php
                                    if($studentdata['nm_result']==1)
                                    {
                                        echo "<b style='color:green'>PASS</b>";
                                    }
                                    else
                                    {
                                        echo "<b style='color:red'>FAIL</b>";
                                    }

                                ?>
                            </th>
                        </tr>
                        <tr>
                            <th Colspan="3" style="text-align:center">
                            <button class="btn btn-dark noprint" onclick="window.print()"><i class="fas fa-print"></i> Print</button>
                            </th>
                        </tr>
                        <tr>
                            <th colspan="3">THIS IS AN INTERNET COPY PLEASE VERIFY WITH YOUR ORIGINAL DOCUMENT. INTERNET COPY IS ALSO VALID FOR REASSESSMENT    </th>
                        </tr>
                    </table>
                    </td>
                </tr>
               
            </tbody>
        </table>
        

    



        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
          integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
          integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
          integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
  </body>

</html>
