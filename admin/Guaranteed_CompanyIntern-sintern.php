<?php
session_start();
ob_start();
if (!$_SESSION['email']) {
	header('location:student_login.php');
}
include('admin/config/connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta name="author" content="Jobboard">
	<title>Interview Prepration | InternshipTime</title>
	<!-- Favicon -->
	<link rel="shortcut icon" href="#">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
	<link rel="stylesheet" href="assets/css/jasny-bootstrap.min.css" type="text/css">
	<link rel="stylesheet" href="assets/css/bootstrap-select.min.css" type="text/css">
	<!-- Material CSS -->
	<link rel="stylesheet" href="assets/css/material-kit.css" type="text/css">
	<!-- Font Awesome CSS -->
	<link rel="stylesheet" href="assets/fonts/font-awesome.min.css" type="text/css">
	<link rel="stylesheet" href="assets/fonts/themify-icons.css">
	<!-- Animate CSS -->
	<link rel="stylesheet" href="assets/extras/animate.css" type="text/css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="assets/extras/owl.carousel.css" type="text/css">
	<link rel="stylesheet" href="assets/extras/owl.theme.css" type="text/css">
	<!-- Rev Slider CSS -->
	<link rel="stylesheet" href="assets/extras/settings.css" type="text/css">
	<!-- Slicknav js -->
	<link rel="stylesheet" href="assets/css/slicknav.css" type="text/css">
	<!-- Main Styles -->
	<link rel="stylesheet" href="assets/css/main.css" type="text/css">
	<!-- Responsive CSS Styles -->
	<link rel="stylesheet" href="assets/css/responsive.css" type="text/css">
	<!-- Color CSS Styles  -->
	<link rel="stylesheet" type="text/css" href="assets/css/colors/red.css" media="screen" />
	<script src="assets/js/cities.js"></script>
	<style>
		.job-list .job-list-content {
			display: block;
			margin-left: 0px !important;
			position: relative;
		}

		.form-control {
			background-color: #FFF;
			border: 2px solid #d6d6d6;
			border-radius: 0px;
			box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.075);
			color: #444;
			display: block;
			height: 55px;
			padding: 15px 10px;
			width: 100%;
		}
	</style>
	<style>
		.hr1 {
			margin-top: 5px;
			margin-bottom: 5px;
			border: 0;
			border-top: 1px solid #fff;
		}

		.full-time1 {
			font-size: 20px;
			color: #fff;
			background: #000 !important;
			border-radius: 4px;
			margin-left: 10px;
			padding: 7px 18px;
		}

		.mb-5 {
			margin-bottom: 25px;
		}

		.btn-danger {
			color: #fff;
			background-color: #e40810;
			border-color: #e40810;
		}

		.reg-btn,
		.log-btn {
			margin-bottom: 20px;
		}

		.form-group {
			margin-bottom: 20px;
			position: relative;
			margin-left: 0%;
		}

		.mt {
			margin-top: 2%;
		}
	</style>
	<style type="text/css">
		span label a {
			color: #fff !important;
		}

		span label a:hover {
			color: #e40810 !important;
		}

		.btn-skyblue {
			background: #00A5EC;
			border-radius: 3px;
			border: 1px solid #00A5EC;
		}

		.text-skyblue {
			color: #00A5EC;
		}

		.mb-2 {
			margin-bottom: 2rem;
		}

		.mt-15 {
			margin-top: 15rem;
		}

		.mt-3 {
			margin-top: 3rem;
		}

		.mb-3 {
			margin-bottom: 3rem;
		}

		.mb-1 {
			margin-bottom: 5px;
		}

		.mb-2 {
			margin-bottom: 5px;
		}
	</style>

	<style type="text/css">
		.banner-area {
			background: url(images/blur-bg.jpg) center;
			background-size: cover;
		}

		.bannerTxt .pd {
			padding: 24px 0;
			font-size: 26px;
			line-height: 24px;

		}

		.font_26 {
			font-size: 26px;
		}

		.bolder {
			font-weight: 700;
		}

		.videoText {
			font-size: 16px;
			color: #fff;
			margin: 16px 0 7px;
			display: inline-block;
			line-height: 20px;
		}

		.text-white {
			color: #fff !important;
		}
	</style>

	<style type="text/css">
		.fadeInRight {
			-webkit-animation: fadeInRight 1s ease-in-out;
			-moz-animation: fadeInRight 1s ease-in-out;
			-o-animation: fadeInRight 1s ease-in-out;
			animation: fadeInRight 1s ease-in-out;
		}

		.contactWidget {
			width: 163px;
			*width: 165px;
			float: right;
			border: 1px solid #e2e2e2;
			-webkit-box-shadow: 1px 1px 9px rgba(0, 0, 0, .6);
			-moz-box-shadow: 1px 1px 9px rgba(0, 0, 0, .6);
			box-shadow: 1px 1px 9px rgba(0, 0, 0, .6);
		}

		.contactWidget .nopointr {
			cursor: auto;
			height: auto;
			padding: 5px 2px 10px 10px;
		}

		.contactWidget li {
			padding: 10px;
			font-size: 13px;
			background: #fff;
			overflow: hidden;
			border-bottom: 1px solid #e2e2e2;
			cursor: pointer;
			height: 45px;
		}

		.branchIc,
		.callIc,
		.chatIc,
		.tollIc {
			background-position: 1px -35px;
			height: 31px;
			width: 24px;
			float: left;
			margin: 11px 0 0;
		}

		.branchIc,
		.callIc,
		.closeForm em,
		.contactUsSuces em,
		.ffGnb>li a em,
		.formArr,
		.goTop em,
		.gryArwIc,
		.noJScript div em,
		.row.err em,
		.row.ok em,
		.testmnl .nCarousel .arrow,
		.thankMsg em,
		.tollIc,
		.widgtAr,
		footer .footrTwitr em {
			background: url(images/ffcommonIcons_v3.png") no-repeat;
			display: inline-block;
		}

		.widgtAr {
			background-position: 1px -387px;
			height: 13px;
			width: 26px;
			margin: 0 0 0 -15px;
		}

		.branchIc,
		.callIc,
		.closeForm em,
		.contactUsSuces em,
		.ffGnb>li a em,
		.formArr,
		.goTop em,
		.gryArwIc,
		.noJScript div em,
		.row.err em,
		.row.ok em,
		.testmnl .nCarousel .arrow,
		.thankMsg em,
		.tollIc,
		.widgtAr,
		footer .footrTwitr em {
			background: url(images/ffcommonIcons_v3.png") no-repeat;
			display: inline-block;
		}

		.contactWidget .cal {
			margin: -7px 0 0 33px;
			*margin: -3px 0 0 33px;
			font-weight: 400;
		}

		.contactWidget .cal p {
			margin-top: 2px;
			font-weight: 400;
		}

		.txtBlue {
			color: #004276;
		}

		.contactWidget .nopointr .txtRed {
			line-height: 1em;
		}

		.contactWidget .cal p {
			margin-top: 2px;
			font-weight: 400;
		}

		.txtRed {
			color: #c71e21;
		}

		.font_16 {
			font-size: 16px;
		}

		.contactWidget .cal p {
			margin-top: 2px;
			font-weight: 400;
		}

		.font_normal {
			font-size: 12px;
		}

		.fixedForm .row .leadFormTxtArea textarea,
		a,
		body,
		button,
		h1,
		h2,
		h3,
		h4,
		h5,
		h6,
		input,
		p {
			font-weight: 300;
		}

		.fixedForm .row .leadFormTxtArea textarea,
		body,
		dd,
		div,
		dl,
		dt,
		input,
		li,
		p,
		pre,
		select,
		td,
		textarea {
			font-size: 12px;
		}

		.contactWidget .cal p {
			margin-top: 2px;
			font-weight: 400;
		}

		.font_vsmall {
			font-size: 10px;
		}

		.icon-bars1 {
			position: fixed;
			top: 32%;
			z-index: 999;
			-webkit-transform: translateY(-68%);
			-ms-transform: translateY(-68%);
			transform: translateY(-50%);
			right: 0;
		}
	</style>
	<style type="text/css">
		.full-time2 {
			font-size: 20px;
			color: #000;
			background: #fafafa !important;
			/* margin-left: 10px; */
			padding: 27px 11px 0;
		}

		.font-size-s {
			font-size: 12px !important;
			color: #000 !important;
			text-align: center;
		}

		.cat-text {
			font-size: 15px !important;
			color: #000 !important;
		}

		.mt-5rem {
			margin-top: 5rem;
		}
	</style>
	<style type="text/css">
		.find-job table td {
			line-height: 32px !important;
			font-size: 14px;
			font-weight: 700;
		}

		find-job .table>caption+thead>tr:first-child>td,
		.find-job .table>caption+thead>tr:first-child>th,
		.find-job .table>colgroup+thead>tr:first-child>td,
		.find-job .table>colgroup+thead>tr:first-child>th,
		.find-job .table>thead:first-child>tr:first-child>td,
		.find-job .table>thead:first-child>tr:first-child>th {
			padding: 15px 8px !important;
			font-size: 14px;
			font-weight: 700;
		}

		.benefitGiven {
			background: azure;
			text-align: center;
			border-bottom: #f0f9fe solid 1px;
		}

		.thirdtd {
			color: #fff !important;
			background: #3f3b3a !important;
		}
	</style>
	<style type="text/css">
		.font_16 {
			font-size: 16px;
		}

		.subscription {
			background: #f3f1f2;
			font-size: 28px;
			color: #444;
			padding: 7px 0;
			font-weight: bolder;
			text-align: center;
		}
	</style>

	<style type="text/css">
		.bgGreen {
			background: #39b097;
			color: #fff;
		}

		.bg-12 {
			padding-top: 38px;
			padding-bottom: 0px;
		}

		.bg-12 ul li {
			font-size: 18px;
			padding: 0 0 35px 50px;
			line-height: 25px;
		}

		.whiteLabl {
			background: #fff;
			padding: 3px 10px;
			display: inline-block;
			margin: 10px 0 0;
		}

		.font_medium {
			font-size: 13px;
		}
	</style>

	<style type="text/css">
		.section1 {
			padding: 60px 0 0 0 0;
		}
	</style>

	<style type="text/css">
		.color-red {
			font-size: 26px;
			color: #f5153f;
			padding-bottom: 10px;
		}

		.font-weight-900 {
			color: #000;
			font-weight: 900;
		}

		.btn-darkblue {
			background: #133d5d;
			color: #fff;
		}
	</style>

	<style type="text/css">
		.gryLesPd {
			padding: 0px 0;
			border: 1px solid #e2e2e2;
			border-width: 1px 0;
		}

		.bgGray,
		.bgwhite {
			background: #f5f3f3;
			color: #444;
		}

		.ptb-25 {
			padding: 0 0 25px 50px;
		}

		.pt-4 {
			padding-top: 4rem !important;
		}
	</style>
	<style>
		.job-list .job-list-content {
			display: block;
			margin-left: 0px !important;
			position: relative;
		}

		.form-control {
			background-color: #FFF;
			border: 2px solid #d6d6d6;
			border-radius: 0px;
			box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.075);
			color: #444;
			display: block;
			height: 55px;
			padding: 15px 10px;
			width: 100%;
		}
	</style>
	<style>
		.hr1 {
			margin-top: 5px;
			margin-bottom: 5px;
			border: 0;
			border-top: 1px solid #fff;
		}

		.full-time1 {
			font-size: 20px;
			color: #fff;
			background: #000 !important;
			border-radius: 4px;
			margin-left: 10px;
			padding: 7px 18px;
		}

		.mb-5 {
			margin-bottom: 25px;
		}

		.btn-danger {
			color: #fff;
			background-color: #e40810;
			border-color: #e40810;
		}

		.reg-btn,
		.log-btn {
			margin-bottom: 20px;
		}

		.form-group {
			margin-bottom: 20px;
			position: relative;
			margin-left: 0%;
		}

		.mt {
			margin-top: 2%;
		}
	</style>
	<style type="text/css">
		span label a {
			color: #fff !important;
		}

		span label a:hover {
			color: #e40810 !important;
		}

		.btn-skyblue {
			background: #00A5EC;
			border-radius: 3px;
			border: 1px solid #00A5EC;
		}

		.text-skyblue {
			color: #00A5EC;
		}

		.mb-2 {
			margin-bottom: 2rem;
		}

		.mt-15 {
			margin-top: 15rem;
		}

		.mt-3 {
			margin-top: 3rem;
		}

		.mb-3 {
			margin-bottom: 3rem;
		}

		.mb-1 {
			margin-bottom: 5px;
		}

		.mb-2 {
			margin-bottom: 5px;
		}
	</style>

	<style type="text/css">
		.banner-area {
			background: url(images/blur-bg.jpg) center;
			background-size: cover;
		}

		.bannerTxt .pd {
			padding: 24px 0;
			font-size: 26px;
			line-height: 24px;

		}

		.font_26 {
			font-size: 26px;
		}

		.bolder {
			font-weight: 700;
		}

		.videoText {
			font-size: 16px;
			color: #fff;
			margin: 16px 0 7px;
			display: inline-block;
			line-height: 20px;
		}

		.text-white {
			color: #fff !important;
		}
	</style>

	<style type="text/css">
		.fadeInRight {
			-webkit-animation: fadeInRight 1s ease-in-out;
			-moz-animation: fadeInRight 1s ease-in-out;
			-o-animation: fadeInRight 1s ease-in-out;
			animation: fadeInRight 1s ease-in-out;
		}

		.contactWidget {
			width: 163px;
			*width: 165px;
			float: right;
			border: 1px solid #e2e2e2;
			-webkit-box-shadow: 1px 1px 9px rgba(0, 0, 0, .6);
			-moz-box-shadow: 1px 1px 9px rgba(0, 0, 0, .6);
			box-shadow: 1px 1px 9px rgba(0, 0, 0, .6);
		}

		.contactWidget .nopointr {
			cursor: auto;
			height: auto;
			padding: 5px 2px 10px 10px;
		}

		.contactWidget li {
			padding: 10px;
			font-size: 13px;
			background: #fff;
			overflow: hidden;
			border-bottom: 1px solid #e2e2e2;
			cursor: pointer;
			height: 45px;
		}

		.branchIc,
		.callIc,
		.chatIc,
		.tollIc {
			background-position: 1px -35px;
			height: 31px;
			width: 24px;
			float: left;
			margin: 11px 0 0;
		}

		.branchIc,
		.callIc,
		.closeForm em,
		.contactUsSuces em,
		.ffGnb>li a em,
		.formArr,
		.goTop em,
		.gryArwIc,
		.noJScript div em,
		.row.err em,
		.row.ok em,
		.testmnl .nCarousel .arrow,
		.thankMsg em,
		.tollIc,
		.widgtAr,
		footer .footrTwitr em {
			background: url(images/ffcommonIcons_v3.png") no-repeat;
			display: inline-block;
		}

		.widgtAr {
			background-position: 1px -387px;
			height: 13px;
			width: 26px;
			margin: 0 0 0 -15px;
		}

		.branchIc,
		.callIc,
		.closeForm em,
		.contactUsSuces em,
		.ffGnb>li a em,
		.formArr,
		.goTop em,
		.gryArwIc,
		.noJScript div em,
		.row.err em,
		.row.ok em,
		.testmnl .nCarousel .arrow,
		.thankMsg em,
		.tollIc,
		.widgtAr,
		footer .footrTwitr em {
			background: url(images/ffcommonIcons_v3.png") no-repeat;
			display: inline-block;
		}

		.contactWidget .cal {
			margin: -7px 0 0 33px;
			*margin: -3px 0 0 33px;
			font-weight: 400;
		}

		.contactWidget .cal p {
			margin-top: 2px;
			font-weight: 400;
		}

		.txtBlue {
			color: #004276;
		}

		.contactWidget .nopointr .txtRed {
			line-height: 1em;
		}

		.contactWidget .cal p {
			margin-top: 2px;
			font-weight: 400;
		}

		.txtRed {
			color: #c71e21;
		}

		.font_16 {
			font-size: 16px;
		}

		.contactWidget .cal p {
			margin-top: 2px;
			font-weight: 400;
		}

		.font_normal {
			font-size: 12px;
		}

		.fixedForm .row .leadFormTxtArea textarea,
		a,
		body,
		button,
		h1,
		h2,
		h3,
		h4,
		h5,
		h6,
		input,
		p {
			font-weight: 300;
		}

		.fixedForm .row .leadFormTxtArea textarea,
		body,
		dd,
		div,
		dl,
		dt,
		input,
		li,
		p,
		pre,
		select,
		td,
		textarea {
			font-size: 12px;
		}

		.contactWidget .cal p {
			margin-top: 2px;
			font-weight: 400;
		}

		.font_vsmall {
			font-size: 10px;
		}

		.icon-bars1 {
			position: fixed;
			top: 32%;
			z-index: 999;
			-webkit-transform: translateY(-68%);
			-ms-transform: translateY(-68%);
			transform: translateY(-50%);
			right: 0;
		}
	</style>
	<style type="text/css">
		.full-time2 {
			font-size: 20px;
			color: #000;
			background: #fafafa !important;
			/* margin-left: 10px; */
			padding: 27px 11px 0;
		}

		.font-size-s {
			font-size: 12px !important;
			color: #000 !important;
			text-align: center;
		}

		.cat-text {
			font-size: 15px !important;
			color: #000 !important;
		}

		.mt-5rem {
			margin-top: 5rem;
		}
	</style>
	<style type="text/css">
		.find-job table td {
			line-height: 32px !important;
			font-size: 14px;
			font-weight: 700;
		}

		find-job .table>caption+thead>tr:first-child>td,
		.find-job .table>caption+thead>tr:first-child>th,
		.find-job .table>colgroup+thead>tr:first-child>td,
		.find-job .table>colgroup+thead>tr:first-child>th,
		.find-job .table>thead:first-child>tr:first-child>td,
		.find-job .table>thead:first-child>tr:first-child>th {
			padding: 15px 8px !important;
			font-size: 14px;
			font-weight: 700;
		}

		.benefitGiven {
			background: azure;
			text-align: center;
			border-bottom: #f0f9fe solid 1px;
		}

		.thirdtd {
			color: #fff !important;
			background: #3f3b3a !important;
		}
	</style>
	<style type="text/css">
		.font_16 {
			font-size: 16px;
		}

		.subscription {
			background: #f3f1f2;
			font-size: 28px;
			color: #444;
			padding: 7px 0;
			font-weight: bolder;
			text-align: center;
		}
	</style>

	<style type="text/css">
		.bgGreen {
			background: #39b097;
			color: #fff;
		}

		.bg-12 {
			padding-top: 38px;
			padding-bottom: 0px;
		}

		.bg-12 ul li {
			font-size: 18px;
			padding: 0 0 35px 50px;
			line-height: 25px;
		}

		.whiteLabl {
			background: #fff;
			padding: 3px 10px;
			display: inline-block;
			margin: 10px 0 0;
		}

		.font_medium {
			font-size: 13px;
		}
	</style>

	<style type="text/css">
		.section1 {
			padding: 60px 0 0 0 0;
		}
	</style>

	<style type="text/css">
		.color-red {
			font-size: 26px;
			color: #f5153f;
			padding-bottom: 10px;
		}

		.font-weight-900 {
			color: #000;
			font-weight: 900;
		}

		.btn-darkblue {
			background: #133d5d;
			color: #fff;
		}
	</style>

	<style type="text/css">
		.gryLesPd {
			padding: 0px 0;
			border: 1px solid #e2e2e2;
			border-width: 1px 0;
		}

		.bgGray,
		.bgwhite {
			background: #f5f3f3;
			color: #444;
		}

		.ptb-25 {
			padding: 0 0 25px 50px;
		}

		.pt-4 {
			padding-top: 4rem !important;
		}
	</style>


	<style type="text/css">
		.jobSubCategory1 {
			padding: 5% 0;
		}

		.jobSubCategory2 {
			padding: 27% 0;
		}

		.jobSubCategory3 {
			padding: 0% 0;
		}

		.hexagon1 {
			background: url(images/icons/c1.png) no-repeat;
			height: 80px;
			width: 94px;
			float: left;
			text-align: center;
		}

		.hexagon2 {
			background: url(images/icons/c2.png) no-repeat;
			height: 80px;
			width: 94px;
			float: left;
			text-align: center;
		}

		.hexagon3 {
			background: url(images/icons/c3.png) no-repeat;
			height: 80px;
			width: 94px;
			float: left;
			text-align: center;
		}

		.bold {
			font-weight: 400;
			*font-weight: 700;
		}

		.catHead {
			font-size: 28px;
			padding: 0 0 10px;
		}

		.font_16 {
			font-size: 16px;
		}

		.transprnt_btn {
			background: #00a5ec;
			border: 1px solid #fff;
			color: #fff;
			font-size: 13px;
			padding: 5px 15px;
			cursor: pointer;
			display: inline-block;
		}

		.mT10 {
			margin-top: 10px;
		}
	</style>
</head>

<body>

	<!-- Header Section Start -->
	<?php include('include/sintern_header.php'); ?>

	<!-- Find Job Section Start -->


	<!------>

	<!------>


	<!------>
	<div class="col-lg-12 banner-area">
		<div class="container">

			<div class="col-lg-8 bannerTxt banr mt-3">
				<div class="col-lg-12">
					<div class="heroLine fadeInLeft pd">
						<h2 id="heading" class="videoText">
							Ace your next job Interview !
						</h2>
						<h1 class="font_26 text-white">
							Get trained & coached by <span class="bolder"> certified professionals / hiring managers in your field.</span>
						</h1>

					</div>
				</div>
			</div>
			<div class="col-lg-3 mt-3">
				<img src="images/test-resume-banner-img.png" width="100%" class="mt-5rem">
			</div>

		</div>
	</div>
	<!------>
	<section class="find-job section1" style="background: #eee;">
		<div class="container">
			<div class="row" style="background: #fff;">
				<div class="col-md-12" style="border:2px solid #d7d7d7;border-bottom:0px solid #d7d7d7;">
					<div class="col-lg-12" style="">
						<div class="">
							<div class="">
								<div class="panel-body clearfix">
									<div class="col-lg-8">
										<div class="panel-body clearfix">
											<div class="col-lg-6">
												<div class="jobSubCategory1">
													<div class="col-lg-3">
														<span class="hexagon1"></span>
													</div>
													<div class="col-lg-9">
														<h1 class="catHead bold">Talk to Us</h1>
														<p class="bold font_16">Call Us Toll Free: <span class="font_20">+91 7452052336</span></p>
														(9.00 AM to 9.00PM IST)<br>
														International Customer Call: <strong>+91 7452052336</strong><br>
														For Bulk queries call: <strong>+91 7452052336</strong>
													</div>
												</div>
												<div class="jobSubCategory2">
													<div class="col-lg-3">
														<span class="hexagon2"></span>
													</div>
													<div class="col-lg-9">
														<h1 class="catHead bold">Chat with Us</h1>
														Chat between (10 AM to 7 PM IST, Mon to Sun)<br>
														<a href="https://api.whatsapp.com/send/?phone=917452052336&text=I%27m+interested+in+service&app_absent=0" class="transprnt_btn mT10">Chat Now</a>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="col-lg-12 mt-3">
													<div class="col-lg-12">
														<h3 class="">We'll get in touch with you</h3>
													</div>
													<form action="send_mail3.php" method="post" autocomplete="off" class="">
														<div class="col-lg-12">
															<div class="form-group ">
																<input class="form-control" type="text" name="name" placeholder="Name" required />
															</div>
															<!--form-group-->
														</div>
														<div class="col-lg-12">
															<div class="form-group ">
																<input class="form-control" type="email" name="email" placeholder="Email" pattern="[A-Z0-9a-z._%+-]+@[A-Za-z0-9-]+\.[A-Za-z]{2,64}" required="required" />
															</div>
															<!--form-group-->
														</div>
														<div class="col-lg-12">
															<div class="form-group ">
																<input class="form-control" type="text" min="10" max="10" name="mobile" placeholder="Mobile" pattern="[1-9]{1}[0-9]{9}" minlength="10" maxlength="10" required="required" />
															</div>
															<!--form-group-->
														</div>
														<div class="clearfix"></div>
														<div class="col-lg-12">
															<div class="form-group ">
																<textarea class="form-control" type="text" name="message" placeholder="Message" required></textarea>
															</div>
															<!--form-group-->
														</div>
														<div class="clearfix"></div>
														<div class="col-lg-12 reg-btn">
															<button type="submit" name="submit" class="btn btn-info fs-4 text-white">Call Me Back</button>
														</div>
														<div class="clearfix"></div>
													</form>
													<!--form1-->
												</div>
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
									<div class="col-lg-4">
										<p class="text-center font_16 mb-2">Buy Guaranteed Company Intern</p>
										<div style="border:2px solid #d7d7d7;" class="mb-2">
											<hr class="hr1">
											<hr class="hr1">
											<div class="subscription mb-3">
												<h5 style="font-size:32px"><i class="fa-solid fa-indian-rupee-sign"></i> 9,999*</h5>
												<form action="initiate_payment_sintern.php" method="post" 			class="form-group">

													<div class="col-lg-8 text-center">
														<input type="hidden" name="fname" value="<?php echo $fname; ?>">
														<input type="hidden" name="phone" value="<?php echo $phone; ?>">
														<input type="hidden" name="email" value="<?php echo $email; ?>">
														<input type="hidden" name="service_from" value="Student_intern">
														<input type="hidden" name="service" value="Guaranteed Company Intern">
														<input type="hidden" name="amount" value="9999">
													</div>
													<div class="text-center mt-2rem mb-1">
														<div class="col-lg-12 mt-2rem">
															<button name="buy" class=" btn-danger" style="font-size: medium;"> Buy Now <br></button>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
						<!--6--> <!--<a href="apply_now.php" class="btn btn-danger btn-md">Apply Now</a>-->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>-->

	<!-- Footer Section Start -->
	<?php include('include/footer-sintern.php'); ?>
	<!-- Footer Section End -->

	<!-- Go To Top Link -->
	<a href="#" class="back-to-top">
		<i class="ti-arrow-up"></i> </a>

	<!-- Main JS  -->
	<script type="text/javascript" src="assets/js/jquery-min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/material.min.js"></script>
	<script type="text/javascript" src="assets/js/material-kit.js"></script>
	<script type="text/javascript" src="assets/js/jquery.parallax.js"></script>
	<script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery.slicknav.js"></script>
	<script type="text/javascript" src="assets/js/main.js"></script>
	<script type="text/javascript" src="assets/js/jquery.counterup.min.js"></script>
	<script type="text/javascript" src="assets/js/waypoints.min.js"></script>
	<script type="text/javascript" src="assets/js/jasny-bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-select.min.js"></script>
	<script type="text/javascript" src="assets/js/form-validator.min.js"></script>
	<script type="text/javascript" src="assets/js/contact-form-script.js"></script>
	<script type="text/javascript" src="assets/js/jquery.themepunch.revolution.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery.themepunch.tools.min.js"></script>
</body>

</html>