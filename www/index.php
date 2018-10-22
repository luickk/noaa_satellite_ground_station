<!DOCTYPE html>
<html lang="en">
   <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="referrer" content="origin">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<link rel="stylesheet" media="all" href="./src/css" debug="false">
	<link rel="stylesheet" media="all" href="./src/vendor-a61a03899abb4c0d4581c63599cc415ad5f69bc647322f06aa0a98d4fda002fa.css">
	<link rel="stylesheet" media="all" href="./src/app-201af6d997619b5b1ae556826377995d661010e79ccc2ca9b5e86af6c6ea432a.css">
	<style>
	 @import url("https://fonts.googleapis.com/css?family=Roboto+Mono:400,100,300,500,700");
	</style>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<title>Satellite Ground Station</title>

	<script type="text/javascript"> 
		$( document ).ready(function() {    
			// get height and width of screen
			var h=$(window).height(),
            w=$(window).width();
			
			// check for mobile device
			if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) || (w < 764 || h < 719)) {
				$(".mobile").remove();
				$("#dif").css("overflow", "scroll");
			}
		});
		function show_image(path, sat_time, sat_name, sat_freq){
			// adding sat information when img is loaded
			$("#show_name").html(sat_name);
			$("#show_freq").html("Frequency: " + sat_freq + " MHz");
			$("#show_time").html(sat_time);
			$("#show_time_ac").html("Time of pass");
			$("#show_emp").html("");
			$("#img_sat").attr("src","");
			
			// get height and width of screen
			var h=$(window).height(),
            w=$(window).width();
			// check for mobile device
			if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) || (w < 1200 || h < 719)) {
				// opening img in new tab when device screen size is too small
				window.open(path);
			} else {
				// set src img path 
				$("#img_sat").attr("src",path);
			}
		}
	</script>
   </head>
   <body id="dif" style="overflow:hidden;">			
      <div class="component-app">
         <span data-reactroot="" class="layerWrapper">
            <!-- react-empty: 3 -->
            <span class="layerWrapper">
               <div class="mapWrapper">
                  <div id="map" class="leaflet-container leaflet-touch leaflet-fade-anim leaflet-grab leaflet-touch-drag leaflet-touch-zoom" tabindex="0" style="position: relative; outline: none;">
                     <div class="leaflet-pane leaflet-map-pane" style="transform: translate3d(0px, -24px, 0px);">
                        <div class="leaflet-pane leaflet-tile-pane">
                           <div class="leaflet-layer " style="z-index: 1; opacity: 1;">
                              <div class="leaflet-tile-container leaflet-zoom-animated" style="z-index: 18; transform: translate3d(0px, 0px, 0px) scale(1);"><img alt="" role="presentation" src="./src/2" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(746px, 512px, 0px); opacity: 1;"><img alt="" role="presentation" src="./src/1" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(746px, 256px, 0px); opacity: 1;"><img alt="" role="presentation" src="./src/2(1)" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(1002px, 512px, 0px); opacity: 1;"><img alt="" role="presentation" src="./src/1(1)" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(490px, 256px, 0px); opacity: 1;"><img alt="" role="presentation" src="./src/1(2)" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(1002px, 256px, 0px); opacity: 1;"><img alt="" role="presentation" src="./src/2(2)" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(490px, 512px, 0px); opacity: 1;"><img alt="" role="presentation" src="./src/0" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(746px, 0px, 0px); opacity: 1;"><img alt="" role="presentation" src="./src/3" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(746px, 768px, 0px); opacity: 1;"><img alt="" role="presentation" src="./src/0(1)" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(490px, 0px, 0px); opacity: 1;"><img alt="" role="presentation" src="./src/0(2)" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(1002px, 0px, 0px); opacity: 1;"><img alt="" role="presentation" src="./src/3(1)" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(1002px, 768px, 0px); opacity: 1;"><img alt="" role="presentation" src="./src/3(2)" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(490px, 768px, 0px); opacity: 1;"><img alt="" role="presentation" src="./src/1(3)" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(1258px, 256px, 0px); opacity: 1;"><img alt="" role="presentation" src="./src/1(3)" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(234px, 256px, 0px); opacity: 1;"><img alt="" role="presentation" src="./src/2(3)" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(234px, 512px, 0px); opacity: 1;"><img alt="" role="presentation" src="./src/2(3)" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(1258px, 512px, 0px); opacity: 1;"><img alt="" role="presentation" src="./src/0(3)" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(234px, 0px, 0px); opacity: 1;"><img alt="" role="presentation" src="./src/3(3)" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(1258px, 768px, 0px); opacity: 1;"><img alt="" role="presentation" src="./src/0(3)" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(1258px, 0px, 0px); opacity: 1;"><img alt="" role="presentation" src="./src/3(3)" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(234px, 768px, 0px); opacity: 1;"><img alt="" role="presentation" src="./src/2(2)" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(1514px, 512px, 0px); opacity: 1;"><img alt="" role="presentation" src="./src/1(1)" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(1514px, 256px, 0px); opacity: 1;"><img alt="" role="presentation" src="./src/1(2)" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(-22px, 256px, 0px); opacity: 1;"><img alt="" role="presentation" src="./src/2(1)" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(-22px, 512px, 0px); opacity: 1;"><img alt="" role="presentation" src="./src/3(1)" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(-22px, 768px, 0px); opacity: 1;"><img alt="" role="presentation" src="./src/0(2)" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(-22px, 0px, 0px); opacity: 1;"><img alt="" role="presentation" src="./src/0(1)" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(1514px, 0px, 0px); opacity: 1;"><img alt="" role="presentation" src="./src/3(2)" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(1514px, 768px, 0px); opacity: 1;"></div>
                           </div>
                        </div>
                        <div class="leaflet-pane leaflet-shadow-pane"></div>
                        <div class="leaflet-pane leaflet-overlay-pane">
                           <svg pointer-events="none" class="leaflet-zoom-animated" width="1996" height="962" viewBox="-166 -80 1996 962" style="transform: translate3d(-166px, -80px, 0px);">
                              <g>
                                 <path class="leaflet-interactive" stroke="#505050" stroke-opacity="1" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" stroke-dasharray="5 10" fill="none" d="M894 434L856 612L839 680L826 724L811 765L791 808L764 851L738 882M470 882L440 847L419 812L401 775L381 721L367 674L352 614L312 426L292 345L279 301L269 273L252 232L244 217"></path>
                                 <path class="leaflet-interactive" stroke="#505050" stroke-opacity="1" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" fill="none" d="M1237 105L1204 91L1186 86L1146 82L1125 84L1088 94L1072 101L1043 119L1020 139L994 168L981 187L962 220L945 257L923 319L905 386L895 431"></path>
                                 <path class="leaflet-interactive" stroke="#505050" stroke-opacity="1" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" stroke-dasharray="5 10" fill="none" d="M355 580L401 592L443 597L486 596L533 588L567 577L614 558L634 548L751 480L793 459L859 436L898 429L919 427L949 427L986 431L1018 438L1065 454L1113 477L1223 541L1247 553"></path>
                                 <path class="leaflet-interactive" stroke="#505050" stroke-opacity="1" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" fill="none" d="M244 527L297 556L330 571L352 579"></path>
                              </g>
                           </svg>
                        </div>
                        <div class="leaflet-pane leaflet-marker-pane"><img src="./src/64aece98ed56c49ef0b60f3ea5e5c160.png" class="leaflet-marker-icon leaflet-zoom-animated leaflet-interactive" alt="" tabindex="0" style="margin-left: -32px; margin-top: -32px; width: 64px; height: 64px; transform: translate3d(895px, 432px, 0px); z-index: 432;"><img src="./src/78b73a3599f04c2d904a18961bd41c58.png" class="leaflet-marker-icon leaflet-zoom-animated leaflet-interactive" alt="" tabindex="0" style="margin-left: -11.25px; margin-top: -11.25px; width: 22.5px; height: 22.5px; transform: translate3d(353px, 579px, 0px); z-index: 579;"></div>
                        <div class="leaflet-pane leaflet-tooltip-pane"></div>
                        <div class="leaflet-pane leaflet-popup-pane"></div>
                        <div class="leaflet-proxy leaflet-zoom-animated"></div>
                     </div>
                     <div class="leaflet-control-container">
                        <div class="leaflet-top leaflet-left"></div>
                        <div class="leaflet-top leaflet-right"></div>
                        <div class="leaflet-bottom leaflet-left"></div>
                        <div class="leaflet-bottom leaflet-right"></div>
                     </div>
                  </div>
                  <div class="gridTexture"></div>
                  <div id="map-tmp"><span></span></div>
               </div>
               <span class="layerWrapper">
                  <!-- react-empty: 9 -->
                  <span class="layerWrapper">
					<div ></div>
                     <span>
                        <span class="layerWrapper">
                           <span>
                              <div class="gradientZoom"></div>
                              <div class="gradientBg"></div>
                           </span>
                           <span>
                              <div style="padding-top: 100px" class="left-side">
                                 <div>
                                    <div>
                                       <!-- react-empty: 89 -->
                                       <div class="userInfo">
                                          <div class="user">
                                             <h5>NOAA Ground Station</h5>
                                             <h1 id="show_name" class="username">Fuerth - Germany</h1>
                                             <span>
                                                <p class="planExpireDate"><span id="show_freq">
													Satellites:  NOAA 18,  NOAA 19 </span>
                                                </p>
                                             </span> <br>
                                             <section class="userRanking">
                                                <div class="points">
                                                   <p id="show_time"></p> <br>
                                                </div>
                                             </section>
											  <p id="show_emp" class="planExpireDate">Autonomous Satellite Ground station,<br> capturing images from NOAA 18, 19<br> weather satellites</p>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
							  <img class="mobile" id="img_sat" alt="img_sat" src="" style="margin-left: 20%; position: absolute;"/>
                              <div style="padding-top: 100px;" class="right-side">
                                 <div>
                                    <div class="">
                                       <div class="latestVulnerabilities">
                                          <div class="vulButtons">
                                             <div class="globalVul vulBtn active">Today's satellite passes</div>
                                           
                                          </div>
                                          <div style="height:300px;" class="vulnerabilitiesTable">
                                             <div class="tableShown">
                                                <table>
												   	<?php

													
													$passes = explode("\n", file_get_contents("sat/passes.txt"));
													
													foreach ($passes as $pass) {
														if ('' === $pass) continue;
														
														$pass_txt = explode(",", $pass);
														
														$sat_name = $pass_txt[0];
														$sat_time = $pass_txt[2];
														$sat_freq = $pass_txt[1];
														?>
													   <tbody class="clickable">
														  <tr>
															 <th>Satellite</th>
															 <th>Time</th>
															 <th>Freq</th>
														  </tr>
														  <tr data-index="1">
															 <td><?php echo $sat_name ?></td>
															 <td><?php echo $sat_time ?></td>
															 <td class="points"><?php echo $sat_freq ?></td>
														  </tr>
													   </tbody>
														<?php
														}
													?>
                                                </table>
                                             </div>
                                          </div>
										  
										  
                                       </div>
									   <div style="margin-top: 10%;"></<div>
									   <div class="latestVulnerabilities">
                                          <div class="vulButtons">
                                             <div class="globalVul vulBtn active">Satellites passed</div>
                                           
                                          </div>
                                          <div style="height:300px;" class="vulnerabilitiesTable">
                                             <div class="tableShown">
                                                <table>
												   	<?php
																										
													function listdir_by_date($path){
														$dir = opendir($path);
														$list = array();
														while($file = readdir($dir)){
															if ($file != '.' and $file != '..'){
																// add the filename, to be sure not to
																// overwrite a array key
																$ctime = date('Y-m-d', filectime($data_path . $file)) . ',' . $file;
																$list[$ctime] = $file;
															}
														}
														closedir($dir);
														krsort($list);
														return $list;
													}
													
													$directory = '/var/www/html/sat';
													
													foreach (listdir_by_date($directory) as $dir) {
														if ('.' === $dir) continue;
														if ('..' === $dir) continue;
														if ('passes.txt' === $dir) continue;
														
														$text_file = "sat/".$dir."/NOAA.txt";
														$img_file = "sat/".$dir."/NOAA.png";
														$img_map_file = "sat/".$dir."/NOAA-map.png";
														$wav_file = "sat/".$dir."/NOAA.wav";
														
														$noaa_txt = explode(",", file_get_contents($text_file));
														
														$sat_name = str_replace('"','',$noaa_txt[0]);
														$sat_time = $noaa_txt[2];
														// Limit length of time stamp
														$sat_time = substr($sat_time, 0, 25);
														$sat_freq = $noaa_txt[1];
														?>
													   <tbody onClick="show_image('<?php echo $img_file; ?>', '<?php echo $sat_time; ?>', '<?php echo $sat_name; ?>', '<?php echo $sat_freq; ?>')" class="clickable">
														  <tr>
															 <th>Satellite</th>
															 <th>Time</th>
															 <th>Freq</th>
														  </tr>
														  <tr data-index="1">
															 <td><?php echo $sat_name ?></td>
															 <td><?php echo $sat_time ?></td>
															 <td class="points"><?php echo $sat_freq ?></td>
														  </tr>
													   </tbody>
														<?php
														}
													?>
                                                </table>
                                             </div>
                                          </div>
                                       </div>
									   
                                    </div>
                                 </div>
                              </div>
                           </span>
                        </span>
                     </span>
                  </span>
               </span>
            </span>
         </span>
      </div>
      <div class="dirtyContent">
      </div>
   </body>
</html>
