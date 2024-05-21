<style>
.heading1{
	
}
#sidebar-wrapper .sidebar-heading {
    padding: 0.875rem 1.25rem;
    font-size: 3.2rem;
    font-weight: 600;
}
.list-group-flush .list-group-item {
    border-right: 0;
    border-left: 0;
    border-radius: 0;
    width: 125%;
}
.aa{
    width: 16%;
}
@media (min-width: 768px){
#wrapper.toggled #sidebar-wrapper {
    margin-left: -15rem;
    display: none;
}
}
li{
	list-style-type:none;
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Sidebar -->
    <div class="bg-light border-right aa" id="sidebar-wrapper">
      <div class="sidebar-heading heading1">Admin</div>
      <div class="list-group list-group-flush">
        <a href="home.php" class="list-group-item list-group-item-action bg-light">Home</a>
		<li>
        <a href="#m1" data-toggle="collapse" aria-expanded="false" class="list-group-item list-group-item-action bg-light">Registred Company&nbsp;<i class="	fa fa-angle-down" style="float:right;font-size:20px"></i></a>
			<ul class="collapse list-unstyled" id="m1">
				<li><a class="list-group-item list-group-item-action bg-light" href="company_reg.php"><i class="fa fa-check" style="font-size:15px;color:white"></i>Add Latest News</a></li>
				<li><a class="list-group-item list-group-item-action bg-light" href="View_company.php"><i class="fa fa-check" style="font-size:15px;color:white"></i>View Company</a></li>
			</ul>
		</li>
        <a href="#" class="list-group-item list-group-item-action bg-light">Overview</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Logout</a>
		<!--
        <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Status</a>
		-->
	  </div>
    </div>
    <!-- /#sidebar-wrapper -->