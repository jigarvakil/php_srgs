<?php
    include("../include/connection.php");
?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
    .navbar-nav {
        flex-direction: row;
    }

    .nav-link {
        padding-right: .5rem !important;
        padding-left: .5rem !important;
    }

    /* Fixes dropdown menus placed on the right side */
    .ml-auto .dropdown-menu {
        left: auto !important;
        right: 0px;
    }
    </style>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body style="background-color:gainsboro">

    
    <h3 align="center" class="navbar navbar-expand-md navbar-dark bg-dark" style="color:white;font-size:20px">STUDENT
        RESULT GENERATION SYSTEM </h3>

    <header>

        <nav class="shadow p-3 mb-5 bg-white rounded navbar navbar-expand-md navbar-light bg-light">
            <a class="navbar-brand" href="#">|| SRGS ||</a>
            <ul class="navbar-nav">
            <li class="nav-item active">
                    <a href="index.php" class="nav-link">Results</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                
                <li class="nav-item">
                    <a href="../student.php" class="nav-link">
                        <i class="fas fa-sign-in-alt    "></i>
                    </a>
                </li>

            </ul>
        </nav>
    </header>

    <div class="container">
        <div class="card">
            <div class="card-header">Results</div>
            <div class="card-body">
                <div class="row">
                    <?php
                        $i=1;
                        $sql="select * from tbl_course";
                        $res=mysqli_query($con,$sql);
                        while($row=mysqli_fetch_assoc($res))
                        {
                    ?>
                    <div class="col-md-4">
                        <div
                            class="text-center card <?php if($i==1) echo "bg-primary text-white"; elseif($i==2) echo "bg-danger text-white"; else echo "bg-dark text-white" ?> ">
                            <div class="card-body">
                                <a href="viewsem.php?cid=<?= $row['nm_courseid'] ?>"
                                    class="text-white "><?= strtoupper($row['sz_coursename']); ?></a>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <?php
                        if($i==3)
                            $i=1;
                        else    
                            $i++;
                        }
                    ?>
                </div>
            </div>

        </div>
    </div>
    <?php include("../include/footer.php"); ?>

    <!-- Body -->
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