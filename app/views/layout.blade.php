<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Work &amp; Issue Tracking System</title>

		<link type="image/x-icon" href="favicon.ico" rel="shortcut icon">

		<!-- Bootstrap -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<style type="text/css">
			body {
				margin: 70px 35px;
			}

			a > i.fa {
				width: 20px;
				display: inline-block;
				text-align: center;
				margin-right: 0;
			}
		</style>

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="/">WITS 2.0</a>
				</div>

				<div class="collapse navbar-collapse" id="navbar-collapse">
					<ul class="nav navbar-nav">
						<li class="dropdown">
							<a id="work-menu" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
								Works
								<span class="badge alert-danger" data-toggle="tooltip" data-placement="bottom" data-original-title="Unfinished">{{$unfinished}}</span>
								<span class="badge alert-success" data-toggle="tooltip" data-placement="bottom" data-original-title="Finished">{{$finished}}</span>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu" role="menu" aria-labelledby="work-menu">
								<li role="presentation">
									<a role="menuitem" tabindex="-1" href="#create_new_work"><i class="fa fa-file-o"></i> Create New Work</a>
								</li>
								<li role="presentation">
									<a role="menuitem" tabindex="-1" href="#list_work"><i class="fa fa-list"></i> List Works</a>
								</li>
							</ul>
						</li>
						<li class="dropdown">
							<a id="issue-menu" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
								Issues
								<span class="badge alert-danger" data-toggle="tooltip" data-placement="bottom" data-original-title="Open">{{$open}}</span>
								<span class="badge alert-info" data-toggle="tooltip" data-placement="bottom" data-original-title="In-Progress">{{$in_progress}}</span>
								<span class="badge alert-success" data-toggle="tooltip" data-placement="bottom" data-original-title="Resolved">{{$resolved}}</span>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu" role="menu" aria-labelledby="issue-menu">
								<li role="presentation">
									<a role="menuitem" tabindex="-1" href="#create_new_issue"><i class="fa fa-file-o"></i> Create New Issue</a>
								</li>
								<li role="presentation">
									<a role="menuitem" tabindex="-1" href="#list_issue"><i class="fa fa-list"></i> List Issues</a>
								</li>
							</ul>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li>
							<form class="navbar-form navbar-left" role="search">
								<div class="form-group">
									<input class="form-control" placeholder="Search Work or Issue" type="text">
								</div>
								<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
							</form>
						</li>
						<li class="dropdown">
							<a id="notification-menu" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
								<span class="glyphicon glyphicon-bell"></span>
							</a>
							<div class="dropdown-menu" role="menu" aria-labelledby="notification-menu">
								Notifications
							</div>
						</li>
						<li class="dropdown">
							<a id="settings-menu" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
								<span class="glyphicon glyphicon-cog"></span>
							</a>
							<ul class="dropdown-menu" role="menu" aria-labelledby="settings-menu">
								<li role="presentation">
									<a role="menuitem" tabindex="-1" href="#setting_1">Setting One</a>
								</li>
								<li role="presentation">
									<a role="menuitem" tabindex="-1" href="#setting_2">Setting Two</a>
								</li>
								<li role="presentation">
									<a role="menuitem" tabindex="-1" href="#setting_3">Setting Three</a>
								</li>
								<li role="presentation">
									<a role="menuitem" tabindex="-1" href="#setting_4">Setting Four</a>
								</li>
								<li role="presentation">
									<a role="menuitem" tabindex="-1" href="#setting_5">Setting Five</a>
								</li>
							</ul>
						</li>
						<li class="dropdown">
							<a id="user-menu" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
								<span class="glyphicon glyphicon-user"></span>
							</a>
							<ul class="dropdown-menu" role="menu" aria-labelledby="user-menu">
								<li role="presentation">
									<a role="menuitem" tabindex="-1" href="#change_password"><i class="fa fa-key"></i> Change Password</a>
								</li>
								<li role="presentation">
									<a role="menuitem" tabindex="-1" href="#logout"><i class="fa fa-sign-out"></i> Logout (<b>rudilee</b>)</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>

		<h1>Cuman Ngetest</h1>

		@yield('content')

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery-1.11.1.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>

		<script type="text/javascript">
			$('.badge').tooltip();
		</script>
	</body>
</html>