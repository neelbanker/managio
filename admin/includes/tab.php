<section id="tab">
<?php $fileName = "/managio/admin/"; ?>
    <ul>
    	<li <?php if($_SERVER['REQUEST_URI'] == $fileName."dashboard.php") echo 'class="active"'; ?> ><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>

        <li><i class="fa fa-users" aria-hidden="true"></i> Student
            <ul>
                <li><a href="create-student.php" <?php if($_SERVER['REQUEST_URI'] == $fileName."create-student.php") echo 'class="active"'; ?> >Create</a></li>
                <li><a href="student.php" <?php if($_SERVER['REQUEST_URI'] == $fileName."student.php") echo 'class="active"'; ?> >View</a></li>
            </ul>
        </li>

        <li><i class="fa fa-users" aria-hidden="true"></i>Faculty
            <ul>
                <li><a href="create-employee.php" <?php if($_SERVER['REQUEST_URI'] == $fileName."create-employee.php") echo 'class="active"'; ?> >Create</a></li>
                <li><a href="employee.php" <?php if($_SERVER['REQUEST_URI'] == $fileName."employee.php") echo 'class="active"'; ?> >View</a></li>
            </ul>
        </li>

        <li><i class="fa fa-check-square-o" aria-hidden="true"></i>Subjects
            <ul>
                <li><a href="create-subject.php" <?php if($_SERVER['REQUEST_URI'] == $fileName."create-subject.php") echo 'class="active"'; ?> >Create</a></li>
                <li><a href="view-subject.php" <?php if($_SERVER['REQUEST_URI'] == $fileName."subject.php") echo 'class="active"'; ?> >View</a></li>
            </ul>
        </li>

        <li><i class="fa fa-check-square-o"></i> Task
            <ul>
                <li><a href="create-task.php" <?php if($_SERVER['REQUEST_URI'] == $fileName."create-task.php") echo 'class="active"'; ?> >Create</a></li>
                <li><a href="task.php" <?php if($_SERVER['REQUEST_URI'] == $fileName."task.php") echo 'class="active"'; ?> >View</a></li>
            </ul>
        </li>
        <li><i class="fa fa-flag"></i> Leave
            <ul>
                <li><a href="create-leave.php" <?php if($_SERVER['REQUEST_URI'] == $fileName."create-leave.php") echo 'class="active"'; ?> >Create</a></li>
                <li><a href="leave.php" <?php if($_SERVER['REQUEST_URI'] == $fileName."leave.php") echo 'class="active"'; ?> >View</a></li>
            </ul>
        </li>
        
        
        <li><i class="fa fa-paper-plane-o"></i> Event
            <ul>
                <li><a href="create-event.php" <?php if($_SERVER['REQUEST_URI'] == $fileName."create-event.php") echo 'class="active"'; ?> >Create</a></li>
                <li><a href="event.php" <?php if($_SERVER['REQUEST_URI'] == $fileName."event.php") echo 'class="active"'; ?> >View</a></li>
            </ul>
        </li>
        <li><i class="fa fa-inr" aria-hidden="true"></i> Salary
            <ul>
                <li><a href="salary.php" <?php if($_SERVER['REQUEST_URI'] == $fileName."salary.php") echo 'class="active"'; ?> >Create</a></li>
                <li><a href="salary-log.php" <?php if($_SERVER['REQUEST_URI'] == $fileName."salary-log.php") echo 'class="active"'; ?> >Log</a></li>
            </ul>
        </li>
        <!-- <<li><i class="fa fa-pencil-square-o"></i> Notes 
            <ul>
                <li><a href="create-notes.php" <?php if($_SERVER['REQUEST_URI'] == $fileName."create-notes.php") echo 'class="active"'; ?> >Create</a></li>
                <li><a href="notes.php" <?php if($_SERVER['REQUEST_URI'] == $fileName."notes.php") echo 'class="active"'; ?> >View</a></li>
            </ul>
        </li>-->
        <li><i class="fa fa-pencil-square-o"></i> Attendance
            <ul>
                <li><a href="create-attendance.php" <?php if($_SERVER['REQUEST_URI'] == $fileName."create-attendance.php") echo 'class="active"'; ?> >QR</a></li>
                <li><a href="view-attendance.php" <?php if($_SERVER['REQUEST_URI'] == $fileName."view-attendance.php") echo 'class="active"'; ?> >View</a></li>
                
            </ul>
        </li>
    </ul>
</section>

