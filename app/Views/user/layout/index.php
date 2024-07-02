<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->

<head>
	<base href="">
	<meta charset="utf-8" />
	<title><?= $title; ?> - Pencarian Kost</title>
	<!-- START Custom js from HARY-IT -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- END Custom js from HARY-IT -->
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="shortcut icon" href="<?= base_url() ?>/public/logo/temankost.png" />
	<!--begin::Fonts-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" />
	<!--end::Fonts-->
	<!--begin::Global Stylesheets Bundle(used by all pages)-->
	<link href="<?= base_url() ?>/public/user/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url() ?>/public/user/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.30.1/moment.min.js" integrity="sha512-hUhvpC5f8cgc04OZb55j0KNGh4eh7dLxd/dPSJ5VyzqDWxsayYbojWyl5Tkcgrmb/RVKCRJI1jNlRbVP4WWC4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<!--end::Global Stylesheets Bundle-->
	<style>
		*::-webkit-scrollbar {
			width: 0.8em;
		}

		*::-webkit-scrollbar-track {
			background-color: transparent;


		}

		*::-webkit-scrollbar-thumb {
			background-color: rgba(117, 117, 117, 0.3);
			border-radius: 100em;


		}

		*::-webkit-scrollbar-thumb:hover {
			background-color: rgba(117, 117, 117, 0.6);
		}

		*::-webkit-scrollbar-button {
			height: 2px;
			background-color: rgba(117, 117, 117, 0);
		}

		/* clears the ‘X’ from Internet Explorer */
		input[type=search]::-ms-clear {
			display: none;
			width: 0;
			height: 0;
		}

		input[type=search]::-ms-reveal {
			display: none;
			width: 0;
			height: 0;
		}

		/* clears the ‘X’ from Chrome */
		input[type="search"]::-webkit-search-decoration,
		input[type="search"]::-webkit-search-cancel-button,
		input[type="search"]::-webkit-search-results-button,
		input[type="search"]::-webkit-search-results-decoration {
			display: none;
		}

		.my-card {
			background-size: cover;
			transition: 0.3s;
		}

		.my-card .card-footer {
			color: white;
			background: rgb(2, 0, 36);
			background: linear-gradient(0deg, rgba(2, 0, 36, 0.8463760504201681) 0%, rgba(2, 0, 36, 0.4009978991596639) 59%, rgba(255, 255, 255, 0) 94%);
		}

		.my-card:hover {
			transform: scale(103%);
		}
	</style>

	<style>
		.cropimg {
			width: 100%;
			/* width of container */
			height: 350px;
			/* height of container */
			object-fit: cover;
		}

		.imessage {
			background-color: #fff;
			border: 1px solid #e5e5ea;
			border-radius: 0.25rem;
			display: flex;
			flex-direction: column;
			font-family: "SanFrancisco";
			font-size: 1.25rem;
			margin: 0 auto 1rem;
			max-width: 600px;
			padding: 0.5rem 1.5rem;
		}

		.imessage p {
			border-radius: 1.15rem;
			line-height: 1.25;
			max-width: 75%;
			padding: 0.5rem .875rem;
			position: relative;
			word-wrap: break-word;
		}

		.imessage p::before,
		.imessage p::after {
			bottom: -0.1rem;
			content: "";
			height: 1rem;
			position: absolute;
		}

		p.from-me {
			align-self: flex-end;
			background-color: #248bf5;
			color: #fff;
		}

		p.from-me::before {
			border-bottom-left-radius: 0.8rem 0.7rem;
			border-right: 1rem solid #248bf5;
			right: -0.35rem;
			transform: translate(0, -0.1rem);
		}

		p.from-me::after {
			background-color: #fff;
			border-bottom-left-radius: 0.5rem;
			right: -40px;
			transform: translate(-30px, -2px);
			width: 10px;
		}

		p[class^="from-"] {
			margin: 0.5rem 0;
			width: fit-content;
		}

		p.from-me~p.from-me {
			margin: 0.25rem 0 0;
		}

		p.from-me~p.from-me:not(:last-child) {
			margin: 0.25rem 0 0;
		}

		p.from-me~p.from-me:last-child {
			margin-bottom: 0.5rem;
		}

		p.from-them {
			align-items: flex-start;
			background-color: #e5e5ea;
			color: #000;
		}

		p.from-them:before {
			border-bottom-right-radius: 0.8rem 0.7rem;
			border-left: 1rem solid #e5e5ea;
			left: -0.35rem;
			transform: translate(0, -0.1rem);
		}

		p.from-them::after {
			background-color: #fff;
			border-bottom-right-radius: 0.5rem;
			left: 20px;
			transform: translate(-30px, -2px);
			width: 10px;
		}

		p[class^="from-"].emoji {
			background: none;
			font-size: 2.5rem;
		}

		p[class^="from-"].emoji::before {
			content: none;
		}

		.no-tail::before {
			display: none;
		}

		.margin-b_none {
			margin-bottom: 0 !important;
		}

		.margin-b_one {
			margin-bottom: 1rem !important;
		}

		.margin-t_one {
			margin-top: 1rem !important;
		}


		.comment {
			color: #222;
			font-size: 1.25rem;
			line-height: 1.5;
			margin-bottom: 1.25rem;
			max-width: 100%;
			padding: 0;
		}

		@media screen and (max-width: 800px) {
			body {
				margin: 0 0.5rem;
			}

			.container {
				padding: 0.5rem;
			}

			.imessage {
				font-size: 1.05rem;
				margin: 0 auto 1rem;
				max-width: 600px;
				padding: 0.25rem 0.875rem;
			}

			.imessage p {
				margin: 0.5rem 0;
			}
		}
	</style>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-fixed aside-secondary-disabled">
	<!--begin::Main-->
	<!--begin::Root-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Page-->
		<div class="page d-flex flex-row flex-column-fluid">
			<!--begin::Aside-->
			<?= view('user/layout/aside'); ?>
			<!--end::Aside-->
			<!--begin::Wrapper-->
			<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
				<!--begin::Header-->
				<?= view('user/layout/header'); ?>
				<!--end::Header-->
				<!--begin::Content-->
				<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
					<!--begin::Container-->
					<?= $this->renderSection('content'); ?>
					<!--end::Container-->
				</div>
				<!--end::Content-->
				<!--begin::Footer-->
				<?= view('user/layout/footer'); ?>
				<!--end::Footer-->
			</div>
			<!--end::Wrapper-->
		</div>
		<!--end::Page-->
	</div>
	<!--end::Root-->



	<!--end::Modals-->
	<!--begin::Scrolltop-->
	<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
		<!--begin::Svg Icon | path: icons/duotone/Navigation/Up-2.svg-->
		<span class="svg-icon">
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
					<polygon points="0 0 24 0 24 24 0 24" />
					<rect fill="#000000" opacity="0.5" x="11" y="10" width="2" height="10" rx="1" />
					<path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
				</g>
			</svg>
		</span>
		<!--end::Svg Icon-->
	</div>
	<!--end::Scrolltop-->
	<!--end::Main-->
	<!--begin::Javascript-->
	<!--begin::Global Javascript Bundle(used by all pages)-->
	<script src="<?= base_url() ?>/public/user/assets/plugins/global/plugins.bundle.js"></script>
	<script src="<?= base_url() ?>/public/user/assets/js/scripts.bundle.js"></script>
	<!--end::Global Javascript Bundle-->
	<!--begin::Page Custom Javascript(used by this page)-->
	<script src="<?= base_url() ?>/public/user/assets/js/custom/widgets.js"></script>
	<!--end::Page Custom Javascript-->
	<!--end::Javascript-->
	<script>
		const current = location.pathname.split("/").slice(-1)[0].replace(/^\/|\/$/g, '');
		$('.menu-item a[href~="<?= base_url() ?>/' + current + '"]').addClass('active');
	</script>
	<?= view("admin/partials/_utils/crud") ?>
	<script>
		function setfav(id) {
			$('#' + id).toggleClass('btn-color-danger');
			$('#' + id).toggleClass('btn-color-white');
			$.ajax({
					url: '<?= base_url() ?>/Favorit/set',
					type: 'GET',
					dataType: 'json',
					data: {
						id: id
					}
				})
				.done(function(res) {

				})
				.fail(function(res) {
					console.log(res);
				})
		}
	</script>
	<?= $this->renderSection('script'); ?>
</body>
<!--end::Body-->

</html>