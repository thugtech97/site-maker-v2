<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta http-equiv="x-ua-compatible" content="IE=edge">
	<meta name="author" content="SemiColonWeb">
	<meta name="description" content="Get Canvas to build powerful websites easily with the Highly Customizable &amp; Best Selling Bootstrap Template, today.">

	<!-- Font Imports -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital@0;1&display=swap" rel="stylesheet">

	<!-- Core Style -->
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">

	<!-- Font Icons -->
	<link rel="stylesheet" href="{{ asset('css/font-icons.css') }}">
    <link rel="icon" href="data:image/x-icon;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAYAAABw4pVUAAAACXBIWXMAAC4jAAAuIwF4pT92AAAGeGlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDIgNzkuMTYwOTI0LCAyMDE3LzA3LzEzLTAxOjA2OjM5ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdEV2dD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlRXZlbnQjIiB4bWxuczpwaG90b3Nob3A9Imh0dHA6Ly9ucy5hZG9iZS5jb20vcGhvdG9zaG9wLzEuMC8iIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgMjAxOCAoV2luZG93cykiIHhtcDpDcmVhdGVEYXRlPSIyMDE5LTA0LTE3VDEzOjQ5OjQ3KzA4OjAwIiB4bXA6TWV0YWRhdGFEYXRlPSIyMDE5LTA0LTE3VDEzOjQ5OjQ3KzA4OjAwIiB4bXA6TW9kaWZ5RGF0ZT0iMjAxOS0wNC0xN1QxMzo0OTo0NyswODowMCIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDo4OTQ5MmJhMy0zYzFkLWFkNDYtOTA1YS1mNGFlNDczYmNiYzAiIHhtcE1NOkRvY3VtZW50SUQ9ImFkb2JlOmRvY2lkOnBob3Rvc2hvcDplNTAyYjYyMi1mMWY0LWZiNDAtOTg0OS00MWE4ZDg3NjQ4Y2QiIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDplMzQ1MmExMC04OWY2LTgyNGQtYTM1MS1kMmM2YTRhOWRlZmEiIHBob3Rvc2hvcDpDb2xvck1vZGU9IjMiIHBob3Rvc2hvcDpJQ0NQcm9maWxlPSJzUkdCIElFQzYxOTY2LTIuMSIgZGM6Zm9ybWF0PSJpbWFnZS9wbmciPiA8eG1wTU06SGlzdG9yeT4gPHJkZjpTZXE+IDxyZGY6bGkgc3RFdnQ6YWN0aW9uPSJjcmVhdGVkIiBzdEV2dDppbnN0YW5jZUlEPSJ4bXAuaWlkOmUzNDUyYTEwLTg5ZjYtODI0ZC1hMzUxLWQyYzZhNGE5ZGVmYSIgc3RFdnQ6d2hlbj0iMjAxOS0wNC0xN1QxMzo0OTo0NyswODowMCIgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTggKFdpbmRvd3MpIi8+IDxyZGY6bGkgc3RFdnQ6YWN0aW9uPSJzYXZlZCIgc3RFdnQ6aW5zdGFuY2VJRD0ieG1wLmlpZDo4OTQ5MmJhMy0zYzFkLWFkNDYtOTA1YS1mNGFlNDczYmNiYzAiIHN0RXZ0OndoZW49IjIwMTktMDQtMTdUMTM6NDk6NDcrMDg6MDAiIHN0RXZ0OnNvZnR3YXJlQWdlbnQ9IkFkb2JlIFBob3Rvc2hvcCBDQyAyMDE4IChXaW5kb3dzKSIgc3RFdnQ6Y2hhbmdlZD0iLyIvPiA8L3JkZjpTZXE+IDwveG1wTU06SGlzdG9yeT4gPHBob3Rvc2hvcDpUZXh0TGF5ZXJzPiA8cmRmOkJhZz4gPHJkZjpsaSBwaG90b3Nob3A6TGF5ZXJOYW1lPSJXIiBwaG90b3Nob3A6TGF5ZXJUZXh0PSJXIi8+IDwvcmRmOkJhZz4gPC9waG90b3Nob3A6VGV4dExheWVycz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz509oeaAAAJ3UlEQVR4nO2de4wVVx3HP3ctzfIQ2nVt2LV0u0tZiqUgPlKhmlYaUx+JjdpQo9XYakTqK9ZYCRpjfBSxsSYqRTRiNa1BbG3/UWtS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" type="image/x-icon" />

	<!-- Custom CSS -->
	<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Document Title
	============================================= -->
	<title>Login - WSI-SITE-BUILDER</title>

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper">

		<!-- Content
		============================================= -->
		<section id="content">
			<div class="content-wrap py-0">

				<div class="row align-items-stretch g-0 min-vh-100">
					<div class="col-md-6">
						<img src="{{ asset('images/1.jpg') }}" alt="Image" class="object-cover w-100 h-100">
					</div>

					<div class="col-md-6 bg-contrast-100">
						<div class="text-center mt-5">
							<h2 class="font-primary text-transform-none">WSI-SITE-BUILDER</h2>
						</div>

						<div class="card mx-auto my-5 rounded-4 bg-transparent border-0" style="max-width: 360px;">
							<div class="card-body p-0">
								<form id="login-form" name="login-form" class="mb-0" action="{{ route('login') }}" method="post">
									@csrf
									<div class="fancy-title title-border title-center mb-4">
										<h1 class="fs-5 fw-semibold">Login to your Account</h1>
									</div>

									@if (session('error'))
										<div class="alert alert-danger" role="alert" style="margin: 20px;">
											{{ session('error') }}
										</div>
									@endif

									<div class="row">
										<div class="col-12 form-group mb-4">
											<label for="login-form-username">Email</label>
											<input type="text" id="login-form-username" name="email" value="" class="form-control not-dark">
										</div>

										<div class="col-12 form-group mb-4">
											<div class="d-flex justify-content-between">
												<label for="login-form-password">Password</label>
												<a href="#" class="fw-semibold text-smaller">Forgot Password?</a>
											</div>
											<input type="password" id="login-form-password" name="password" value="" class="form-control not-dark">
										</div>

										<div class="col-12 form-group mb-0">
											<button class="btn btn-lg text-white bg-black h-bg-color d-block w-100 m-0" id="login-form-submit" name="login-form-submit" value="login">Continue</button>
										</div>
									</div>
								</form>

								{{-- 
								<div class="divider divider-center mb-3">
									<div class="divider-text text-dark lh-base">or Login with</div>
								</div>

								<div class="d-flex justify-content-center">
									<a href="#" class="social-icon bg-facebook text-white rounded-circle" title="Login with Facebook">
										<i class="fa-brands fa-facebook-f"></i>
										<i class="fa-brands fa-facebook-f"></i>
									</a>

									<a href="#" class="social-icon bg-x-twitter text-white rounded-circle" title="Login with X (Twitter)">
										<i class="fa-brands fa-x-twitter"></i>
										<i class="fa-brands fa-x-twitter"></i>
									</a>

									<a href="#" class="social-icon bg-google text-white rounded-circle" title="Login with Google">
										<i class="fa-brands fa-google"></i>
										<i class="fa-brands fa-google"></i>
									</a>

									<a href="#" class="social-icon bg-github text-white rounded-circle" title="Login with Github">
										<i class="fa-brands fa-github"></i>
										<i class="fa-brands fa-github"></i>
									</a>
								</div>
								 --}}
								 
							</div>
						</div>

						<div class="text-center text-muted mt-6"><small>Copyrights &copy; All Rights Reserved by Canvas Inc.</small></div>
					</div>
				</div>

			</div>
		</section><!-- #content end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="uil uil-angle-up"></div>

	<!-- JavaScripts
	============================================= -->
	<script src="{{ asset('js/plugins.min.js') }}"></script>
	<script src="{{ asset('js/functions.bundle.js') }}"></script>

</body>
</html>