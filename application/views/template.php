<!DOCTYPE html>
<?php if(!$this->session->userdata['login']){redirect(base_url('login'));	} ?>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title><?php echo $webconf->office_name; ?></title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?php echo base_url('./assets/template/AtlantisLite/'); ?>assets/img/icon.ico" type="image/x-icon"/>
	<script src="<?php echo base_url('./assets/template/AtlantisLite/'); ?>assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
	WebFont.load({
		google: {"families":["Lato:300,400,700,900"]},
		custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?php echo base_url('./assets/template/AtlantisLite/'); ?>assets/css/fonts.min.css']},
		active: function() {
			sessionStorage.fonts = true;
		}
	});
	</script>
	<link rel="stylesheet" href="<?php echo base_url('./assets/template/AtlantisLite/'); ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url('./assets/template/AtlantisLite/'); ?>assets/css/atlantis.min.css">
	<link rel="stylesheet" href="<?php echo base_url('./assets/template/AtlantisLite/'); ?>assets/css/demo.css">
</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="<?php echo $webconf->background_color; ?>">
				<a href="<?php echo base_url() ?>" class="logo">
					<img src="<?php echo base_url('./assets/template/AtlantisLite/'); ?>assets/img/logo.svg" alt="navbar brand" class="navbar-brand">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="<?php echo $webconf->background_color; ?>">
				<div class="container-fluid">
				<div class="collapse" id="search-nav" style="margin-left:-30px;">
						<form class="navbar-left navbar-form nav-search mr-md-3" method="post">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1" name="search" value="search">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Pencarian ..." class="form-control" name="keyword">
							</div>
						</form>
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
						<li class="nav-item dropdown hidden-caret" <?php if(!$this->session->userdata['login']){echo 'hidden';} ?>>
							<a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" hidden>
								<i class="fa fa-envelope"></i>
							</a>
							<ul class="dropdown-menu messages-notif-box animated fadeIn" aria-labelledby="messageDropdown">
								<li>
									<div class="dropdown-title d-flex justify-content-between align-items-center">
										Messages
										<a href="#" class="small">Mark all as read</a>
									</div>
								</li>
								<li>
									<div class="message-notif-scroll scrollbar-outer">
										<div class="notif-center">
											<a href="#">
												<div class="notif-img">
													<img src="<?php echo base_url('./assets/template/AtlantisLite/'); ?>assets/img/jm_denis.jpg" alt="Img Profile">
												</div>
												<div class="notif-content">
													<span class="subject">Jimmy Denis</span>
													<span class="block">
														How are you ?
													</span>
													<span class="time">5 minutes ago</span>
												</div>
											</a>
										</div>
									</div>
								</li>
								<li>
									<a class="see-all" href="javascript:void(0);">See all messages<i class="fa fa-angle-right"></i> </a>
								</li>
							</ul>
						</li>
						<li class="nav-item dropdown hidden-caret" <?php if(!$this->session->userdata['login']){echo 'hidden';} ?>>
							<a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
								<i class="fa fa-bell"></i>
								<span class="notification">4</span>
							</a>
							<ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
								<li>
									<div class="dropdown-title">You have 4 new notification</div>
								</li>
								<li>
									<div class="notif-scroll scrollbar-outer">
										<div class="notif-center">
											<a href="#">
												<div class="notif-icon notif-primary"> <i class="fa fa-user-plus"></i> </div>
												<div class="notif-content">
													<span class="block">
														New user registered
													</span>
													<span class="time">5 minutes ago</span>
												</div>
											</a>
										</div>
									</div>
								</li>
								<li>
									<a class="see-all" href="javascript:void(0);">See all notifications<i class="fa fa-angle-right"></i> </a>
								</li>
							</ul>
						</li>

						<li class="nav-item dropdown hidden-caret" <?php if(!$this->session->userdata['login']){echo 'hidden';} ?>>
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="<?php echo base_url('./assets/upload/'.$this->session->userdata['display_picture']); ?>" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg"><img src="<?php echo base_url('./assets/upload/'.$this->session->userdata['display_picture']); ?>" alt="image profile" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4><?php echo $this->session->userdata['fullname']; ?></h4>
												<p class="text-muted"><?php echo $this->session->userdata['email']; ?></p><a href="<?php echo base_url('profile'); ?>" class="btn btn-xs btn-<?php echo $webconf->theme_color; ?> btn-sm">Lihat Profil</a>
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="<?php echo base_url('goPremium'); ?>" <?php if($this->session->userdata['role']!='user' || $this->session->userdata['exp']>0){echo "hidden";} ?>>Beralih ke Premium</a>
										<a class="dropdown-item" href="<?php echo base_url('profile'); ?>"> <i class="fas fa-user"></i> Profil Saya</a>
										<a class="dropdown-item" href="<?php echo base_url('inbox'); ?>" hidden>Pesan</a>
										<a class="dropdown-item" href="<?php echo base_url('logout'); ?>" <i class="fas fa-money-bill-alt"></i>>Keluar</a>
									</li>
								</div>
							</ul>
						</li>
						<a href="<?php echo base_url('login'); ?>" class="btn btn-success" <?php if($this->session->userdata['login']){echo 'hidden';} ?>>Login</a>
					</ul>
				</div>
			</nav>
		</div>
		<div class="sidebar sidebar-style-2">
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user" <?php if(!$this->session->userdata['login']){echo 'hidden';} ?>>
						<div class="avatar-sm float-left mr-2">
							<img src="<?php echo base_url('./assets/upload/'.$this->session->userdata['display_picture']); ?>" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<?php echo '@'.$this->session->userdata['username']; ?>
									<span class="user-level"><?php echo $this->session->userdata['role']; ?></span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>
							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="<?php echo base_url('profile'); ?>">
											<span class="link-collapse">Profil Saya</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav nav-<?php echo $webconf->theme_color;?>">
						<?php if($this->session->userdata['login']){ $this->load->view($this->session->userdata['role'].'/menu');}
						else{$this->load->view('guest/menu');}?>
					</ul>
				</div>
			</div>
		</div>
		<div class="main-panel">
			<div class="content">
				<?php if($this->session->userdata['login']){ $this->load->view($this->session->userdata['role'].'/'.$view_name);}
				else{$this->load->view('guest/'.$view_name);}?>
			</div>
			<footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">
						<ul class="nav">
							<li class="nav-item">
								<a class="nav-link" href="#">
									Licenses
								</a>
							</li>
						</ul>
					</nav>
					<div class="copyright ml-auto">
						<?php echo date('Y') ?>, made with <i class="fa fa-heart heart text-danger"></i> by <a href="mailto:2015@student.ce.undip.ac.id">SPECTRUM</a>
					</div>
				</div>
			</footer>
		</div>
	</div>
	<script src="<?php echo base_url('./assets/template/AtlantisLite/'); ?>assets/js/core/jquery.3.2.1.min.js"></script>

	<script src="<?php echo base_url('./assets/template/AtlantisLite/'); ?>assets/js/core/popper.min.js"></script>
	<script src="<?php echo base_url('./assets/template/AtlantisLite/'); ?>assets/js/core/bootstrap.min.js"></script>
	<script src="<?php echo base_url('./assets/template/AtlantisLite/'); ?>assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="<?php echo base_url('./assets/template/AtlantisLite/'); ?>assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
	<script src="<?php echo base_url('./assets/template/AtlantisLite/'); ?>assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
	<script src="<?php echo base_url('./assets/template/AtlantisLite/'); ?>assets/js/plugin/chart.js/chart.min.js"></script>
	<script src="<?php echo base_url('./assets/template/AtlantisLite/'); ?>assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>
	<script src="<?php echo base_url('./assets/template/AtlantisLite/'); ?>assets/js/plugin/chart-circle/circles.min.js"></script>
	<script src="<?php echo base_url('./assets/template/AtlantisLite/'); ?>assets/js/plugin/datatables/datatables.min.js"></script>
	<script src="<?php echo base_url('./assets/template/AtlantisLite/'); ?>assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
	<script src="<?php echo base_url('./assets/template/AtlantisLite/'); ?>assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="<?php echo base_url('./assets/template/AtlantisLite/'); ?>assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>
	<script src="<?php echo base_url('./assets/template/AtlantisLite/'); ?>assets/js/plugin/sweetalert/sweetalert.min.js"></script>
	<script src="<?php echo base_url('./assets/template/AtlantisLite/'); ?>assets/js/atlantis.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

	<script type="text/javascript">
		//PASCE LIAT INI
		<?php if($this->session->userdata['notify']){
			echo "$.notify({icon: '".$this->session->userdata['icon']."',
			title: '".$this->session->userdata['title']."',
			message: '".$this->session->userdata['message']."',},{
				type: '".$this->session->userdata['type']."',
				placement : { from: 'top', align: 'center'}, time: 1000 });";
			} ?>
		</script>

		<script type="text/javascript">
			$(document).ready(function() {
				$('.select2basic').select2();

			});
		</script>

		<script >
			$(document).ready(function() {
				$('#basic-datatables').DataTable({
				});

				$('#basic-datatables1').DataTable({
				});
				$('#basic-datatables2').DataTable({
				});

				$('#basic-datatables3').DataTable({
				});


				$('#multi-filter-select').DataTable( {
					"pageLength": 5,
					initComplete: function () {
						this.api().columns().every( function () {
							var column = this;
							var select = $('<select class="form-control"><option value=""></option></select>')
							.appendTo( $(column.footer()).empty() )
							.on( 'change', function () {
								var val = $.fn.dataTable.util.escapeRegex(
									$(this).val()
									);

								column
								.search( val ? '^'+val+'$' : '', true, false )
								.draw();
							} );

							column.data().unique().sort().each( function ( d, j ) {
								select.append( '<option value="'+d+'">'+d+'</option>' )
							} );
						} );
					}
				});

				// Add Row
				$('#add-row').DataTable({
					"pageLength": 5,
				});

				var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

				$('#addRowButton').click(function() {
					$('#add-row').dataTable().fnAddData([
						$("#addName").val(),
						$("#addPosition").val(),
						$("#addOffice").val(),
						action
						]);
					$('#addRowModal').modal('hide');

				});
			});
		</script>


	</body>
	</html>
