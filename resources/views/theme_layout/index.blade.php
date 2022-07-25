
   @include('theme_layout.header')


	<!--[if lt IE 9]>
		<div class="bg-danger text-center">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/" class="highlight">upgrade your browser</a> to improve your experience.</div>
	<![endif]-->

	<div class="preloader">
		<div class="preloader_image"></div>
	</div>

	@include('theme_layout.nav')

			<!-- Slider -->
			
		<?= view(''.$folder.'.'.$page.''); ?>
				


<!--footer -->		
	@include('theme_layout.footer')
