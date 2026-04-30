

<?php 
    include("header.html");
    include 'navbar.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="images/general/Miner/minerBase.png" rel="icon" type="image/x-icon">
		<title>Suh HOLLOW</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link href="css/homePageCSS.css" rel="stylesheet" type="text/css">
		<link href="css/bootstrap-4.4.1.css" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Metamorphous" rel="stylesheet"> <!-- General Font -->
		
		<link href="https://fonts.googleapis.com/css?family=Astloch" rel="stylesheet"> <!-- Fantasy Font -->
		<link href="https://fonts.googleapis.com/css?family=Bangers" rel="stylesheet"> <!-- Action Font -->
		<link href="https://fonts.googleapis.com/css?family=IBM Plex Mono" rel="stylesheet"> <!-- Strategy Font -->
		<link href="https://fonts.googleapis.com/css?family=Bungee Inline" rel="stylesheet"> <!-- Puzzle Font -->
		<link href="https://fonts.googleapis.com/css?family=Press Start 2P" rel="stylesheet"> <!-- Adventure Font -->
		
		<style>
			:root {
				--subtitleShadowY: -10px;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<header id="headerScriptLocal"></header>
			<section>
				<div>
					<div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#carouselExampleIndicators1" data-slide-to="0" class="active"></li>
							<li data-target="#carouselExampleIndicators1" data-slide-to="1"></li>
							<li data-target="#carouselExampleIndicators1" data-slide-to="2"></li>
						</ol>
						<div class="carousel-inner" role="listbox">
							<div class="carousel-item active">
								<a href="MHProductPage.html?GameID=7">
									<img class="d-block mx-auto" src="images/games/PortalBackground.jpg" alt="First slide" height="520px">
									<img class="carousel-caption" src="images/games/PortalText.png" alt="First slide" height="520px" style="width: 640px; height: 209px;">
								</a>
							</div>
							<div class="carousel-item">
								<a href="MHProductPage.html?GameID=8">
									<img class="d-block mx-auto" src="images/games/TF2Background.jpg" alt="Second slide" height="520px">
									<img class="carousel-caption" src="images/games/TF2Text.png" alt="Second slide" height="520px" style="width: 480px; height: 103px; bottom: 25%;">
								</a>
							</div>
							<div class="carousel-item">
								<a href="MHProductPage.html?GameID=1">
									<img class="d-block mx-auto" src="images/games/SlimeRancherBackground.jpg" alt="Third slide" height="520px">
									<img class="carousel-caption" src="images/games/SlimeRancherText.png" alt="Third slide" height="520px">
								</a>
							</div>
						</div>
						<a class="carousel-control-prev" href="#carouselExampleIndicators1" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleIndicators1" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>
			</section>
			<div class="breakpoint"></div>
			<section style="padding-bottom: 50px">
				<a href="MHDiscover.html?category=Fantasy">
					<div class="parallax rounded">
						<img src="images/general/podium1.png" class="podium" id="podiumFantasy" alt="podiumFantasy">
						<div class="fantasyMiner"></div>
						<div class="subtitle" id="fantasyTitle"><h1>Fantasy</h1></div>
					</div>
				</a>
				<a href="MHDiscover.html?category=Action">
					<div class="parallax rounded">
						<div class="subtitle" id="actionTitle"><h1>Action</h1></div>
						<div class="actionMiner"></div>
						<img src="images/general/podium2.png" class="podium" id="podiumAction" alt="podiumAction">
					</div>
				</a>
				<a href="MHDiscover.html?category=Strategy">
					<div class="parallax rounded">
						<div class="subtitle" id="strategyTitle"><h1>Strategy</h1></div>
						<div class="strategyMiner"></div>
						<img src="images/general/podium3.png" class="podium" id="podiumStrategy" alt="podiumStrategy">
					</div>
				</a>
				<a href="MHDiscover.html?category=Puzzle">
					<div class="parallax rounded">
						<div class="subtitle" id="puzzleTitle"><h1>Puzzle</h1></div>
						<div class="puzzleMiner"></div>
						<img src="images/general/podium4.png" class="podium" id="podiumPuzzle" alt="podiumPuzzle">
					</div>
				</a>
				<a href="MHDiscover.html?category=Adventure">
					<div class="parallax rounded">
						<div class="subtitle" id="adventureTitle"><h1>Adventure</h1></div>
						<div class="adventureMiner"></div>
						<img src="images/general/podium5.png" class="podium" id="podiumAdventure" alt="podiumAdventure">
					</div>
				</a>
			</section>

			<footer class="secondary_header footer">
				<div class="copyright">&copy;2025 - <strong>Suh Hollow</strong></div>
			</footer>
		</div>

		<script src="js/jquery-3.4.1.min.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap-4.4.1.js"></script>
		<script src="js/defaultJS.js"></script>
		
		<script>
			//Getting root element
			var r = document.querySelector(':root');
			
			window.addEventListener(
				"scroll",
				() => {
					// Get the scroll percentage
					const scrollPercentage = window.pageYOffset / (document.documentElement.scrollHeight - window.innerHeight);

					// Update the --scroll variable for animations
					document.body.style.setProperty("--scroll", scrollPercentage);
					
					// Updating the --subtitleShadowY variable for shadows
					r.style.setProperty("--subtitleShadowY", (((scrollPercentage - 0.5) * 2) * 10) + "px");
				},
				false
			);
		</script>
	</body>
</html>
<?php 
    include("footer.html");
?>