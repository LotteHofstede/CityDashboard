
				<div class="content">
					<?php
                        require_once('../php/urlHelper.php');
                        session_start();
						$params = array (
                          "city"  => $_SESSION['city']
                        );
						$url = getUrl("data/cameras/webcams.php", $params);

						if($city == 'antwerpen'){
							$numberOfCams = 17;
						} else if ($city == 'gent'){
							$numberOfCams = 6;
						} else if ($city == 'brussel'){
							$numberOfCams = 14;
						}
						
						$jsondata = file_get_contents($url);
						$arrayData = json_decode($jsondata, true);
						
						for ($i = 1; $i<3; $i++){
							$id = mt_rand(1, $numberOfCams);
							$camera = $arrayData['camera' . $id]['link'];
							if (@GetImageSize($camera)) {
								$file = "../data/cameras/webcams_crop_img.php?url=" . $camera;
							} else {
								$file = "../img/camOffline.png";
							}
							$road = $arrayData['camera' . $id]['road'];
							echo '<div class="cam"><img class="trafCam" src="' . $file . '" title="' . $road . '"></img><br>' . $road . '</div>';
						}
					?>
				</div>
