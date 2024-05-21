	<style>
	<!--nav bar css-->
.nav-body {
    font-family: "Lato", sans-serif;
}
.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 2;
    top: 0;
    left: 0;
    background-color: #202020;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}
.sidenav a {
    padding: 8px 8px 8px 16px;
    text-decoration: none;
    font-size: 15px;
    color: #818181;
    display: block;
    transition: 0.3s;
	line-height:20px;
	border-bottom-style: solid;
}
.sidenav a:hover {
    color: #f1f1f1;
	background: #087d38;
}
.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
	<!--/nav bar css-->
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Start Bootstrap</div>
      <div class="list-group list-group-flush">
        <a href="#" class="list-group-item list-group-item-action bg-light">Dashboard</a>
		<li>
			<a href="#master2" data-toggle="collapse" aria-expanded="false"><i class="fa fa-list-alt" style="font-size:19px"></i>&nbsp;Latest News&nbsp;<i class="fa fa-angle-down" style="float:right;font-size:20px"></i></a>
			<ul class="collapse list-unstyled" id="master2">
				<li><a href="add_news.php">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-check" style="font-size:15px;color:white"></i>&nbsp;Add Latest News</a></li>
				<li><a href="View_company.php">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-check" style="font-size:15px;color:white"></i>&nbsp;View Latest News</a></li>
			</ul>
		</li>
        <a href="#" class="list-group-item list-group-item-action bg-light">Shortcuts</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Overview</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Events</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Status</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->