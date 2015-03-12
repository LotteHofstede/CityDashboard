
				<div class="content">
					<?php
						session_start();
						$url = "../data/news/news_" . $_SESSION['city'] . ".json";
						$jsondata = file_get_contents($url);
						$arrayData = json_decode($jsondata, true);
						
						echo '<ul>';
						for ($i = 1; $i<6; $i++){
							$title = $arrayData['newsitem' . $i]['title'];
							$link = $arrayData['newsitem' . $i]['link'];
							if(strlen($title)>40){
								echo '<a href="'.$link.'"><li title="' . $title . '">' . substr($title,0,40) . '...</li></a>';
							} else {
								echo '<a href="'.$link.'"><li title="' . $title . '">' . $title . '</li></a>';
							}
						}
						echo '</ul>';
					?>
				</div>
