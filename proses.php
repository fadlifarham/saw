<?php 
	$speck_laptop = array(array("Asus A455LA-WX667D","2.0 Ghz","Intel HD Graphics 440","14 inch","4 GB","Standard","Rp. 4.990.000"), 
						array("Asus X441UV I3-6006","2-3 Ghz","NVDIA GT920 2GB","14 inch","8 GB","Standard","Rp. 5.949.000"),
						array("Asus VIVOBOOK S15 S510UQ","2.5-3.1 Ghz","nVidia GeForce GT940MX 2GB","15.6 inch","4 GB","SSD","Rp. 9.449.000"),
						array("Asus VIVOBOOK S15 S510UQ","2.5-3.1 Ghz","HD Graphics 620","15.6 inch","4 GB","Standard","Rp. 9.499.000"),
						array("Asus Zenbook UX410UQ-GV090T","2-3 Ghz","NVDIA GeForce 940MX 2GB","14 inch","8 GB DDR4 2133MHz","Standard+SSD","Rp. 14.599.000"));
	$bobot_speck_laptop = array("speed"=>array(5.0,6.0,7.0,7.0,6.5),
								"vga"=>array(5.0,8.0,8.3,6.2,7.3),
								"layar"=>array(7.0,7.0,8.7,8.7,7.5),
								"ram"=>array(7.5,8.2,7.5,7.5,8.7),
								"hd"=>array(7.0,7.0,8.2,7.0,8.8),
								"harga"=>array(4.0,4.7,6.5,6.5,8.5));
	
	$speed = $_POST['speed_processor'];
	$vga = $_POST['vga'];
	$layar = $_POST['layar'];
	$ram = $_POST['ram'];
	$hd = $_POST['jenis_hardisk'];
	$harga = $_POST['harga'];

//	$speed = 8.0;
//	$vga = 2.0;
//	$layar = 7.5;
//	$ram = 8.0;
//	$hd = 7.5;
//	$harga = 5.0;
	
	$max = -1;
	$index = -1;
	
	//cek nilai prioritas dan menentukan nilai min/max dari bobot tiap laptop
	
	for($i=0; $i<5; $i++){
		if($speed>5){
			$bobot_speed = max($bobot_speck_laptop["speed"]);
			$x["speed"][$i] = $bobot_speck_laptop["speed"][$i] / $bobot_speed;
			$v["speed"][$i] = $speed * $x["speed"][$i];
		}else{
			$bobot_speed = min($bobot_speck_laptop["speed"]);
			$x["speed"][$i] = $bobot_speed / $bobot_speck_laptop["speed"][$i];
			$v["speed"][$i] = $speed * $x["speed"][$i];
		}
		
		if($vga>5){
			$bobot_vga = max($bobot_speck_laptop["vga"]);
			$x["vga"][$i] = $bobot_speck_laptop["vga"][$i] / $bobot_speed;
			$v["vga"][$i] = $speed * $x["vga"][$i];
		}else{
			$bobot_vga = min($bobot_speck_laptop["vga"]);
			$x["vga"][$i] = $bobot_speed / $bobot_speck_laptop["vga"][$i];
			$v["vga"][$i] = $speed * $x["vga"][$i];
		}
		
		if($layar>5){
			$bobot_layar = max($bobot_speck_laptop["layar"]);
			$x["layar"][$i] = $bobot_speck_laptop["layar"][$i] / $bobot_speed;
			$v["layar"][$i] = $speed * $x["layar"][$i];
		}else{
			$bobot_layar = min($bobot_speck_laptop["layar"]);
			$x["layar"][$i] = $bobot_speed / $bobot_speck_laptop["layar"][$i];
			$v["layar"][$i] = $speed * $x["layar"][$i];
		}
		
		if($ram>5){
			$bobot_ram = max($bobot_speck_laptop["ram"]);
			$x["ram"][$i] = $bobot_speck_laptop["ram"][$i] / $bobot_speed;
			$v["ram"][$i] = $speed * $x["ram"][$i];
		}else{
			$bobot_ram = min($bobot_speck_laptop["ram"]);
			$x["ram"][$i] = $bobot_speed / $bobot_speck_laptop["ram"][$i];
			$v["ram"][$i] = $speed * $x["ram"][$i];
		}
		
		if($hd>5){
			$bobot_hd = max($bobot_speck_laptop["hd"]);
			$x["hd"][$i] = $bobot_speck_laptop["hd"][$i] / $bobot_speed;
			$v["hd"][$i] = $speed * $x["hd"][$i];
		}else{
			$bobot_hd = min($bobot_speck_laptop["hd"]);
			$x["hd"][$i] = $bobot_speed/$bobot_speck_laptop["hd"][$i];
			$v["hd"][$i] = $speed * $x["hd"][$i];
		}
		
		if($harga>5){
			$bobot_harga = max($bobot_speck_laptop["harga"]);
			$x["harga"][$i] = $bobot_speck_laptop["harga"][$i] / $bobot_speed;
			$v["harga"][$i] = $speed * $x["harga"][$i];
		}else{
			$bobot_harga = min($bobot_speck_laptop["harga"]);
			$x["harga"][$i] = $bobot_speed/$bobot_speck_laptop["harga"][$i];
			$v["harga"][$i] = $speed * $x["harga"][$i];
		}
		
		$total[$i] = $v["speed"][$i] + $v["vga"][$i] + $v["layar"][$i] + $v["ram"][$i] + $v["hd"][$i] + $v["harga"][$i];
		
		if($total[$i] > $max){
			$max = $total[$i];
			$index = $i;
		}
	}
	
//	echo "Alternatif Terbaik adalah : <br>";
//	print_r($speck_laptop[$index]);
?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="colorlib">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Sistem Pendukung Keputusan - SAW</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!--
    CSS
    ============================================= -->
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <div class="whole-wrap">
        <div class="container">

<!--            <div class="section-top-border">-->
<!--                <h3 class="mb-30">List Harga</h3>-->
<!--                <div class="progress-table-wrap">-->
<!--                    <div class="progress-table">-->
<!--                        <div class="table-head">-->
<!--                            <div class="serial">No.</div>-->
<!--                            <div class="percentage">Merek</div>-->
<!--                            <div class="country">Speed<br/>Processor</div>-->
<!--                            <div class="percentage">VGA</div>-->
<!--                            <div class="visit">Layar</div>-->
<!--                            <div class="visit">RAM</div>-->
<!--                            <div class="country">Jenis HD</div>-->
<!--                            <div class="percentage">Harga</div>-->
<!--                        </div>-->
<!--                        <div class="table-row">-->
<!--                            <div class="serial">1</div>-->
<!--                            <div class="percentage">Asus A455LA-WX667D</div>-->
<!--                            <div class="country">2.0 GHz</div>-->
<!--                            <div class="percentage">Intel HD Graphics 4400</div>-->
<!--                            <div class="visit">14"</div>-->
<!--                            <div class="visit">4 GB</div>-->
<!--                            <div class="country">Standard</div>-->
<!--                            <div class="percentage">Rp 4.990.000</div>-->
<!--                        </div>-->
<!--                        <div class="table-row">-->
<!--                            <div class="serial">2</div>-->
<!--                            <div class="percentage">Asus X441UV I3-6006</div>-->
<!--                            <div class="country">2 - 3 GHz</div>-->
<!--                            <div class="percentage">NVIDIA GT920 2GB</div>-->
<!--                            <div class="visit">14"</div>-->
<!--                            <div class="visit">8 GB</div>-->
<!--                            <div class="country">Standard</div>-->
<!--                            <div class="percentage">Rp 5.949.000</div>-->
<!--                        </div>-->
<!--                        <div class="table-row">-->
<!--                            <div class="serial">3</div>-->
<!--                            <div class="percentage">Asus VIVOBOOK S15 S510UQ</div>-->
<!--                            <div class="country">2.5 - 3.1 GHz</div>-->
<!--                            <div class="percentage">NVIDIA GeForce GT940MX 2GB DDR5</div>-->
<!--                            <div class="visit">15.6"</div>-->
<!--                            <div class="visit">4 GB</div>-->
<!--                            <div class="country">SSD</div>-->
<!--                            <div class="percentage">Rp 9.499.000</div>-->
<!--                        </div>-->
<!--                        <div class="table-row">-->
<!--                            <div class="serial">4</div>-->
<!--                            <div class="percentage">Asus VIVOBOOK S15 S510UQ</div>-->
<!--                            <div class="country">2.5 - 3.1 GHz</div>-->
<!--                            <div class="percentage">HD Graphics 620</div>-->
<!--                            <div class="visit">15.6"</div>-->
<!--                            <div class="visit">4 GB</div>-->
<!--                            <div class="country">Standard</div>-->
<!--                            <div class="percentage">Rp 9.499.000</div>-->
<!--                        </div>-->
<!--                        <div class="table-row">-->
<!--                            <div class="serial">5</div>-->
<!--                            <div class="percentage">Asus Zenbook UX410UQ-GV090T</div>-->
<!--                            <div class="country">2 - 3 GHz</div>-->
<!--                            <div class="percentage">NVIDIA GeForce 940MX 2GB</div>-->
<!--                            <div class="visit">14"</div>-->
<!--                            <div class="visit">8GB DDR4 2133MHz</div>-->
<!--                            <div class="country">Standard + SSD</div>-->
<!--                            <div class="percentage">Rp 14.599.000</div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->

            <div class="section-top-border">
                <h3 class="mb-30">Hasil SPK</h3>
                <div class="progress-table-wrap">
                    <div class="progress-table">
                        <div class="table-head">
                            <div class="serial"></div>
                            <div class="percentage">Merek</div>
                            <div class="country">Speed<br/>Processor</div>
                            <div class="percentage">VGA</div>
                            <div class="visit">Layar</div>
                            <div class="visit">RAM</div>
                            <div class="country">Jenis HD</div>
                            <div class="percentage">Harga</div>
                        </div>
                        <div class="table-row">
                            <div class="serial"></div>
                            <div class="percentage"><?=$speck_laptop[$index][0] ?></div>
                            <div class="country">Speed<br/><?=$speck_laptop[$index][1] ?></div>
                            <div class="percentage"><?=$speck_laptop[$index][2] ?></div>
                            <div class="visit"><?=$speck_laptop[$index][3] ?></div>
                            <div class="visit"><?=$speck_laptop[$index][4] ?></div>
                            <div class="country"><?=$speck_laptop[$index][5] ?></div>
                            <div class="percentage"><?=$speck_laptop[$index][6] ?></div>
                        </div>
                    </div>
                </div>
                <br/>
                <a href="sw.php" class="genric-btn primary-border circle arrow">
                    Back to SAW
                    <span class="lnr lnr-arrow-left"></span>
                </a>
            </div>


        </div>
    </div>



    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
    <script src="js/easing.min.js"></script>
    <script src="js/hoverIntent.js"></script>
    <script src="js/superfish.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.tabs.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/simple-skillbar.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/mail-script.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
