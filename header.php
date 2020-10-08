<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Homepage</title>
    <link rel="stylesheet" href="css/style.css" />
    <link
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
      rel="stylesheet"
      integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
    />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Roboto:wght@100;300;400;500;700;900&display=swap"
      rel="stylesheet"
    />
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>
<!-- Header Start  -->
<header class="container border-bottom pb-2">
        <div class="row d-flex justify-content-between">
            <div class="col-md-4 col-sm-6">
                <div class="social">
                    <a href="#"><img src="images/facebook_icon.png" alt=""></a>
                    <a href="#"><img src="images/Instagram-Icon.png" alt=""></a>
                    <a href="#"><img src="images/Twitter_icon.png" alt=""></a>  
                </div>
            </div>
			<div class="col-md-4 col-sm-6 d-flex justify-content-end">
				<div class="phone">
					<?php if(!empty($_SESSION["session_login"])){ echo "Bonjour : ".($_SESSION["session_login"]).''; } ?>
				</div>
			</div>			
            <div class="col-md-4 col-sm-6 d-flex justify-content-end">
                <div class="phone">
                   telephone  : +212 666 666 666
                </div>
            </div>           
        </div>
		<div id="detect"></div>
		<div id="detect-check"></div>
		<div id="detect-pay"></div>
<?php 
 include 'headerSession.php';
?>