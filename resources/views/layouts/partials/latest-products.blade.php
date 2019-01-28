<div class="middle-content">
	<h3>Latest Products</h3>
	<!-- start content_slider -->
	<div id="owl-demo" class="owl-carousel text-center">
		<div class="item">
			<img class="lazyOwl img-responsive" data-src="images/na.jpg" alt="name">
		</div>
		<div class="item">
			<img class="lazyOwl img-responsive" data-src="images/na1.jpg" alt="name">
		</div>
		<div class="item">
			<img class="lazyOwl img-responsive" data-src="images/na2.jpg" alt="name">
		</div>
		<div class="item">
			<img class="lazyOwl img-responsive" data-src="images/na.jpg" alt="name">
		</div>
		<div class="item">
			<img class="lazyOwl img-responsive" data-src="images/na1.jpg" alt="name">
		</div>
		<div class="item">
			<img class="lazyOwl img-responsive" data-src="images/na2.jpg" alt="name">
		</div>
		<div class="item">
			<img class="lazyOwl img-responsive" data-src="images/na.jpg" alt="name">
		</div>				
	</div>
</div>
<!--//sreen-gallery-cursual---->
<!-- requried-jsfiles-for owl -->

<link href="css/owl.carousel.css" rel="stylesheet">
<script src="js/owl.carousel.js"></script>
<script>
	$(document).ready(function() {
		$("#owl-demo").owlCarousel({
			items : 3,
			lazyLoad : true,
			autoPlay : true,
			pagination : true,
			nav:true,
		});
	});
</script>
<!-- //requried-jsfiles-for owl -->
