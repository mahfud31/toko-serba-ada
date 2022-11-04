<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="" />
		<meta name="author" content="" />


		<!-- CSRF Token -->
		{{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

		<title>@yield('title')</title>

		<!-- Styles -->
		@stack('prepend-style')
		@include('includes.style')
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css"/>
		@stack('addon-style')

	</head>
	<body>
		<div class="page-dashboard">
			<div class="d-flex" id="wrapper" data-aos="fade-right">
				<!-- sidebar -->
				<div class="border-right" id="sidebar-wrapper">
					<div class="sidebar-heading text-center">
						<img src="/images/admin.png" alt="" class="my-4" style="max-width: 150px" />
					</div>
					<div class="list-group list-group-flush">
						<a
							href="{{ route('admin-dashboard') }}"
							class="list-group-item list-group-item-action
							{{ (request()->is('admin')) ? 'active' : '' }}"
						>
							Dashboard
						</a>
						<a
							href="{{ route('category.index') }}"
							class="list-group-item list-group-item-action
							{{ (request()->is('admin/category*')) ? 'active' : '' }}"
						>
							Categories
						</a>
						<a
							href="{{ route('product.index') }}"
							class="list-group-item list-group-item-action
							{{ (request()->is('admin/product*')) ? 'active' : '' }}"
						>
							Products
						</a>
						<a
							href="{{ route('gallery-product.index') }}"
							class="list-group-item list-group-item-action
							{{ (request()->is('admin/gallery-product*')) ? 'active' : '' }}"
						>
							Galleries
						</a>
						<a
							href="#"
							class="list-group-item list-group-item-action"
						>
							Transactions
						</a>
						<a
							href="{{ route('user.index') }}"
							class="list-group-item list-group-item-action
							{{ (request()->is('admin/user*')) ? 'active' : '' }}"
						>
							Users
						</a>
						<a
							href="{{ route('carousel.index') }}"
							class="list-group-item list-group-item-action
							{{ (request()->is('admin/carousel*')) ? 'active' : '' }}"
						>
							Carousel
						</a>

						{{-- <a
							href="/index.html"
							class="list-group-item list-group-item-action mt-5"
						>
							Sign Out
						</a> --}}
					</div>
				</div>

				<!-- Page content -->
				<div id="page-content-wrapper">
					<nav
						class="navbar navbar-expand-lg navbar-light navbar-store fixed-top"
						data-aos="fade-down"
					>
						<div class="container-fluid">
							<button
								class="btn btn-secondary d-md-none mr-auto mr-2"
								id="menu-toggle"
							>
								&laquo; Menu
							</button>
							<button
								class="navbar-toggler"
								type="button"
								data-toggle="collapse"
								data-target="#navbarSupportedContent"
							>
								<span class="navbar-toggler-icon"></span>
							</button>
							<div class="collapse navbar-collapse" id="navbarSupportedContent">
								<!-- desktop menu -->
								<ul class="navbar-nav d-none d-lg-flex ml-auto">
									<li class="nav-item dropdown">
										<a
											href="#"
											class="nav-link"
											id="navbarDropdown"
											role="button"
											data-toggle="dropdown"
										>
											<img
												src="/images/icon-user.png"
												alt=""
												class="rounded-circle mr-2 profile-picture"
											/>
											Hi, Mahfud
										</a>
										<div class="dropdown-menu">
											<a href="/" class="dropdown-item">Home</a>
                                            <div class="dropdown-divider"></div>
											<a href="/" class="dropdown-item">Logout</a>
										</div>
									</li>
								</ul>

								<!-- mobile menu -->
								<ul class="navbar-nav d-block d-lg-none">
									<li class="nav-item">
										<a href="#" class="nav-link"> Hi, Mahfud </a>
									</li>
									<li class="nav-item">
										<a href="#" class="nav-link d-inline-block"> Cart </a>
									</li>
								</ul>
							</div>
						</div>
					</nav>

					<!-- Section Content-->
					@yield('content')
				</div>
			</div>
		</div>

		{{-- script --}}
		@stack('prepend-script')
		<script src="/vendor/jquery/jquery.min.js"></script>
		<script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.js"></script>
		<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
		<script>
			AOS.init();
		</script>
		<script>
			$("#menu-toggle").click(function (e) {
				e.preventDefault();
				$("#wrapper").toggleClass("toggled");
			});
		</script>

		@stack('addon-script')
	</body>
</html>
