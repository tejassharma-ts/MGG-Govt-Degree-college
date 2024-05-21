<style>
.heading {
    padding: 0.875rem 1.25rem;
    font-size: 3.2rem;
    font-weight: 600;
}

.list-group-flush .list-group-item {
    border-right: 0;
    border-left: 0;
    border-radius: 0;

}
a{
    text-decoration: none !important;
}
@media (min-width: 768px) {
    #wrapper.toggled #sidebar-wrapper {
        margin-left: -15rem;
        display: none;
    }
}

li {
    list-style-type: none;
}
</style>


<!-- Sidebar -->
<div class="bg-light border-right aa" id="sidebar-wrapper">
    <div class="sidebar-heading heading1 fs-2 text-center fw-bold">Admin Panel</div>
    <div class="list-group list-group-flush">
        <a href="home.php" class="list-group-item list-group-item-action bg-light">Home</a>
        <li>
            <a href="#c9" data-toggle="collapse" aria-expanded="false"
                class="list-group-item list-group-item-action bg-light">Sub Admin&nbsp;<i class="	fa fa-angle-down"
                    style="float:right;font-size:20px"></i></a>
            <ul class="collapse list-unstyled" id="c9">
                <!--<li><a class="list-group-item list-group-item-action bg-light" href="viewtution_regcompany.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tution</a></li>-->
                <li><a class="list-group-item list-group-item-action bg-light"
                        href="addsubadmin.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add Sub Admin</a></li>
                <!--<li><a class="list-group-item list-group-item-action bg-light" href="viewhobby_regcompany.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hobby Classes</a></li>-->
                <li><a class="list-group-item list-group-item-action bg-light"
                        href="viewsubadmin.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;View Sub Admin</a></li>
            </ul>
        </li>
        <li>
            <a href="#c8" data-toggle="collapse" aria-expanded="false"
                class="list-group-item list-group-item-action bg-light">Teacher&nbsp;<i class="	fa fa-angle-down"
                    style="float:right;font-size:20px"></i></a>
            <ul class="collapse list-unstyled" id="c8">
                <!--<li><a class="list-group-item list-group-item-action bg-light" href="viewtution_regcompany.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tution</a></li>-->
                <li><a class="list-group-item list-group-item-action bg-light"
                        href="addteacher.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add Teacher</a></li>
                <!--<li><a class="list-group-item list-group-item-action bg-light" href="viewhobby_regcompany.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hobby Classes</a></li>-->
                <li><a class="list-group-item list-group-item-action bg-light"
                        href="viewteacher.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;View Teacher</a></li>
            </ul>
        </li>
        <li>
            <a href="view_regcompany.php" 
                class="list-group-item list-group-item-action bg-light">Reg. Company</a>
                   </li>
        <li>
            <a href="#s1" data-toggle="collapse" aria-expanded="false"
                class="list-group-item list-group-item-action bg-light">Reg. Student&nbsp;<i class="	fa fa-angle-down"
                    style="float:right;font-size:20px"></i></a>
            <ul class="collapse list-unstyled" id="s1">
                <!--<li><a class="list-group-item list-group-item-action bg-light" href="viewtution_regstudent.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tution</a></li>-->
                <li><a class="list-group-item list-group-item-action bg-light"
                        href="viewintern_regstudent.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Internship</a></li>
                <!--<li><a class="list-group-item list-group-item-action bg-light" href="viewhobby_regstudent.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hobby Classes</a></li>-->
                <li><a class="list-group-item list-group-item-action bg-light"
                        href="viewjobc_regstudent.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Job Category</a></li>
            </ul>
        </li>
        <li>
            <a href="#s9" data-toggle="collapse" aria-expanded="false"
                class="list-group-item list-group-item-action bg-light">View&nbsp;<i class="	fa fa-angle-down"
                    style="float:right;font-size:20px"></i></a>
            <ul class="collapse list-unstyled" id="s9">
              
                <li><a class="list-group-item list-group-item-action bg-light"
                        href="viewinternship.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Internship</a></li>
                
                <li><a class="list-group-item list-group-item-action bg-light"
                        href="viewjob.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Job</a></li>
            </ul>
        </li>
        <li>
            <a href="#m1" data-toggle="collapse" aria-expanded="false"
                class="list-group-item list-group-item-action bg-light">Categories&nbsp;<i class="	fa fa-angle-down"
                    style="float:right;font-size:20px"></i></a>
            <ul class="collapse list-unstyled" id="m1">
                <!--<li>
					<a href="#cat1" data-toggle="collapse" aria-expanded="false" class="list-group-item list-group-item-action bg-light">Tution Category&nbsp;<i class="fa fa-angle-down" style="float:right;font-size:20px"></i></a>
					<ul class="collapse list-unstyled" id="cat1">
						<li><a class="list-group-item list-group-item-action bg-light" href="add_tutionc.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add Class</a></li>
						<li><a class="list-group-item list-group-item-action bg-light" href="add_tutionc2.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add Subject</a></li>
					</ul>
				</li>-->
                <li>
                    <a href="#cat2" data-toggle="collapse" aria-expanded="false"
                        class="list-group-item list-group-item-action bg-light">Int. Category&nbsp;<i
                            class="fa fa-angle-down" style="float:right;font-size:20px"></i></a>
                    <ul class="collapse list-unstyled" id="cat2">
                        <li><a class="list-group-item list-group-item-action bg-light"
                                href="add_internc.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add Category</a></li>
                    </ul>
                </li>
                <!--<li>
					<a href="#cat3" data-toggle="collapse" aria-expanded="false" class="list-group-item list-group-item-action bg-light">Hobby Classes Category&nbsp;<i class="fa fa-angle-down" style="float:right;font-size:20px"></i></a>
					<ul class="collapse list-unstyled" id="cat3">
						<li><a class="list-group-item list-group-item-action bg-light" href="add_hobbyc.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add Category</a></li>
					</ul>
				</li>-->
                <li>
                    <a href="#cat4" data-toggle="collapse" aria-expanded="false"
                        class="list-group-item list-group-item-action bg-light">Job Category&nbsp;<i
                            class="fa fa-angle-down" style="float:right;font-size:20px"></i></a>
                    <ul class="collapse list-unstyled" id="cat4">
                        <li><a class="list-group-item list-group-item-action bg-light"
                                href="add_jobc.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add Category</a></li>
                    </ul>
                </li>

            </ul>
        </li>
        
        <li>
            <a href="#report" data-toggle="collapse" aria-expanded="false"
                class="list-group-item list-group-item-action bg-light">Report&nbsp;<i class="	fa fa-angle-down"
                    style="float:right;font-size:20px"></i></a>
            <ul class="collapse list-unstyled" id="report">
                <!--<li>
					<a href="#cat1" data-toggle="collapse" aria-expanded="false" class="list-group-item list-group-item-action bg-light">Tution Category&nbsp;<i class="fa fa-angle-down" style="float:right;font-size:20px"></i></a>
					<ul class="collapse list-unstyled" id="cat1">
						<li><a class="list-group-item list-group-item-action bg-light" href="add_tutionc.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add Class</a></li>
						<li><a class="list-group-item list-group-item-action bg-light" href="add_tutionc2.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add Subject</a></li>
					</ul>
				</li>-->
                <li>
                    <a href="#report2" data-toggle="collapse" aria-expanded="false"
                        class="list-group-item list-group-item-action bg-light">Student Report&nbsp;<i
                            class="fa fa-angle-down" style="float:right;font-size:20px"></i></a>
                    <ul class="collapse list-unstyled" id="report2">
                        <li><a class="list-group-item list-group-item-action bg-light"
                                href="viewreport_interns.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Internship</a></li>
                        <li><a class="list-group-item list-group-item-action bg-light"
                                href="viewreport_jobs.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Job</a></li>
                    </ul>
                </li>
                <!--<li>
					<a href="#cat3" data-toggle="collapse" aria-expanded="false" class="list-group-item list-group-item-action bg-light">Hobby Classes Category&nbsp;<i class="fa fa-angle-down" style="float:right;font-size:20px"></i></a>
					<ul class="collapse list-unstyled" id="cat3">
						<li><a class="list-group-item list-group-item-action bg-light" href="add_hobbyc.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add Category</a></li>
					</ul>
				</li>-->
                <li>
                    <a href="#report4" data-toggle="collapse" aria-expanded="false"
                        class="list-group-item list-group-item-action bg-light">Company Report<i
                            class="fa fa-angle-down" style="float:right;font-size:20px"></i></a>
                    <ul class="collapse list-unstyled" id="report4">
                        <li><a class="list-group-item list-group-item-action bg-light"
                                href="viewreport_internc.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Internship</a></li>
                        <li><a class="list-group-item list-group-item-action bg-light"
                                href="viewreport_jobc.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Job</a></li>
                    </ul>
                </li>

            </ul>
        </li>
        <li>
            <a href="#news" data-toggle="collapse" aria-expanded="false"
                class="list-group-item list-group-item-action bg-light">News&nbsp;<i class="fa fa-angle-down"
                    style="float:right;font-size:20px"></i></a>
            <ul class="collapse list-unstyled" id="news">
                <li><a class="list-group-item list-group-item-action bg-light"
                        href="add_news.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add News</a></li>
                <li><a class="list-group-item list-group-item-action bg-light"
                        href="view_news.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;View News</a></li>
            </ul>
        </li>
        <a href="payment.php" class="list-group-item list-group-item-action bg-light">Payment History</a>
        <a href="change_password.php" class="list-group-item list-group-item-action bg-light">Change Password</a>
        <a href="logout.php" class="list-group-item list-group-item-action bg-light">Logout</a>
    </div>
</div>
<!-- /#sidebar-wrapper -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
const currentLocation = location.href;
const menuItem = document.querySelectorAll('.list-group-item');
const menuLength = menuItem.length;
for (let i = 0; i < menuLength; i++) {
    if (menuItem[i].href === currentLocation) {
        menuItem[i].className = "list-group-item active";
    }
}
</script>
<script>

</script>
