
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>{{$page_title}}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="Resturent, Bangla Resturent" />
	<meta name="c_url" content="{{url('cart')}}">
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<link rel="icon" type="image/png" sizes="16x16" href="{{asset('public/favicon-16x16.png')}}">
	<link href="{{asset('public/frontend/css/bootstrap.css')}}" rel='stylesheet' type='text/css' />
	<link href="{{asset('public/frontend/css/login_overlay.css')}}" rel='stylesheet' type='text/css' />
	<link href="{{asset('public/frontend/css/style6.css')}}" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="{{asset('public/frontend/css/shop.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('public/frontend/css/owl.carousel.css')}}" type="text/css" media="all">
	<link rel="stylesheet" href="{{asset('public/frontend/css/owl.theme.css')}}" type="text/css" media="all">
	<link rel="stylesheet" href="{{asset('public/frontend/css/easy-responsive-tabs.css')}}" type="text/css" media="all">
	<link rel="stylesheet" href="{{asset('public/frontend/css/flexslider.css')}}" type="text/css" media="all">
	<link rel="stylesheet" href="{{asset('public/frontend/css/contact.css')}}" type="text/css" media="all">
	<link rel="stylesheet" href="{{asset('public/frontend/css/checkout.css')}}" type="text/css" media="all">
	<link href="{{asset('public/frontend/css/style.css')}}" rel='stylesheet' type='text/css' />

	<link rel="stylesheet" href="{{asset('public/css/kitchen.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('public/css/custom.css')}}" type="text/css">

	<link href="{{asset('public/frontend/css/fontawesome-all.css')}}" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Inconsolata:400,700" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
	    rel="stylesheet">

</head>

<body>
	<div class="banner-top container-fluid" id="home">
		<!-- header -->
		<header>
			@include('frontend.partials._header')
		</header>
		<!-- //header -->
		<!-- banner -->
		@if(Request::is('/'))
		@include('frontend.partials._banner')
		@else
		<hr>
		@endif
		<!--//banner-sec-->		
	</div>

	@yield('content')

	@include('frontend.partials._login-form')
	@include('frontend.common.cart-container')
	@include('frontend.partials._footer')	

	<!--jQuery-->
	<script src="{{asset('public/frontend/js/jquery-2.2.3.min.js')}}"></script>
	
	<!-- cart-js -->

	<script>
		$(document).ready(function () {
			$(".button-log a").click(function () {
				$(".overlay-login").fadeToggle(200);
				$(this).toggleClass('btn-open').toggleClass('btn-close');
			});
		});

		$('.overlay-close1').on('click', function () {
			$(".overlay-login").fadeToggle(200);
			$(".button-log a").toggleClass('btn-open').toggleClass('btn-close');
			open = false;
		});
	</script>
	<!-- carousel -->

	<div style="position: fixed; bottom: 10px; right: 15px; margin-left: 15px">
		@if(session()->has('success'))
		    <div class="alert alert-success flash" style="padding: 8px">
		        {{ session()->get('success') }}
		    </div>
		@endif
	</div>
	<div style="position: fixed; bottom: 10px; right: 15px; margin-left: 15px">
		@if(session()->has('error'))
		    <div class="alert alert-danger flash" style="padding: 8px">
		        {{ session()->get('error') }}
		    </div>
		@endif
	</div>
	<script type="text/javascript">
		$(document).ready(function() {
		    $('.flash').delay(5000).fadeOut(1000);
		});
	</script>


	<script src="{{asset('public/js/axios.min.js')}}"></script>

	<script type="text/javascript">
		function cart(id, type)
	    {
	    	axios.post($('meta[name=c_url]').attr("content"), {
			    id: id,
			    type: type
			})
			.then(function (response) {
				$('#cart_subtotal').html(response.data.subtotal);
				$('#total_items').html(response.data.totalQty);
				if(response.data.qty > 0)
					$('#'+id+'qty').html(response.data.qty);
				else
					$('#'+id).remove();
			})
			.catch(function (error) {
			    console.log(error);
			});
	    }
	</script>

   <!-- //cart-js -->
	<script>
		$(document).ready(function () {
			$(".sbmincart-closer").click(function () {
				$("#staplesbmincart").fadeToggle(200);
			});


			$('.top_googles_cart').on('click', function () {
				$("#staplesbmincart").fadeToggle(200);
			});

		});

		function update(){
			//alert("ok");
		}
		

		
	</script>
	<!-- carousel -->
	
	<script src="{{asset('public/frontend/js/owl.carousel.js')}}"></script>
	<script>
		$(document).ready(function () {
			$('.owl-carousel').owlCarousel({
				loop: true,
				margin: 10,
				responsiveClass: true,
				responsive: {
					0: {
						items: 1,
						nav: true
					},
					600: {
						items: 2,
						nav: false
					},
					900: {
						items: 3,
						nav: false
					},
					1000: {
						items: 4,
						nav: true,
						loop: false,
						margin: 20
					}
				}
			})
		})
	</script>

	<!-- //end-smooth-scrolling -->

	<!-- single -->
		<script src="{{asset('public/frontend/js/imagezoom.js')}}"></script>
		<!-- single -->
		<!-- script for responsive tabs -->
		<script src="{{asset('public/frontend/js/easy-responsive-tabs.js')}}"></script>
		<script>
			$(document).ready(function () {
				$('#horizontalTab').easyResponsiveTabs({
					type: 'default', //Types: default, vertical, accordion           
					width: 'auto', //auto or any width like 600px
					fit: true, // 100% fit in a container
					closed: 'accordion', // Start closed if in accordion view
					activate: function (event) { // Callback function if tab is switched
						var $tab = $(this);
						var $info = $('#tabInfo');
						var $name = $('span', $info);
						$name.text($tab.text());
						$info.show();
					}
				});
				$('#verticalTab').easyResponsiveTabs({
					type: 'vertical',
					width: 'auto',
					fit: true
				});
			});
		</script>


	<!-- FlexSlider -->
		<script src="{{asset('public/frontend/js/jquery.flexslider.js')}}"></script>
		<script>
			// Can also be used with $(document).ready()
			$(window).load(function () {
				$('.flexslider1').flexslider({
					animation: "slide",
					controlNav: "thumbnails"
				});
			});
		</script>
		<!-- //FlexSlider-->


	<!-- dropdown nav -->
	<script>
		$(document).ready(function () {
			$(".dropdown").hover(
				function () {
					$('.dropdown-menu', this).stop(true, true).slideDown("fast");
					$(this).toggleClass('open');
				},
				function () {
					$('.dropdown-menu', this).stop(true, true).slideUp("fast");
					$(this).toggleClass('open');
				}
			);
		});
	</script>
	<!-- //dropdown nav -->


  <script src="{{asset('public/frontend/js/move-top.js')}}"></script>
    <script src="{{asset('public/frontend/js/easing.js')}}"></script>
    <script>
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 900);
            });
        });
    </script>
    
    <!--// end-smoth-scrolling -->

	<script src="{{asset('public/frontend/js/bootstrap.js')}}"></script>
	<!-- js file -->
</body>

</html>