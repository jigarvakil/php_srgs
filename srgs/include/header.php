<?php
    $page=basename($_SERVER['PHP_SELF']);
?>
<h3 align="center" class="navbar navbar-expand-md navbar-dark bg-dark" style="color:white;font-size:20px" >STUDENT RESULT GENERATION SYSTEM </h3>
       
<header>

        <nav class="shadow p-3 mb-5 bg-white rounded navbar navbar-expand-md navbar-light bg-light">
            <a href="#" class="navbar-brand">|| SRGS ||</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav">
                    <a href="student.php" class="nav-item nav-link <?php if($page=="student.php") echo "active disabled"; ?>">Students</a>
                    <a href="course.php" class="nav-item nav-link <?php if($page=="course.php") echo "active disabled"; ?>" >Courses</a>
                    <a href="semester.php" class="nav-item nav-link <?php if($page=="semester.php") echo "active disabled"; ?>" >Semesters</a>
                    <a href="subject.php" class="nav-item nav-link <?php if($page=="subject.php") echo "active disabled"; ?>">Subjects</a>
                    <a href="result.php" class="nav-item nav-link <?php if($page=="result.php") echo "active disabled"; ?>">Results</a>

                </div>
            </div>

            </div>
        </nav>
    </header>