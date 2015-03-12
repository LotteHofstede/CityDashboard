
				<div class="content" style="float:left; clear:both;">
					<?php
						session_start();
						require_once('../php/MongoDBHandler.php');
						$COLLECTION = 'busStops';


						$stop = MongoDBHandler::request($COLLECTION);
						$stopNumber = $stop[0]['code'];
						$stopLat = $stop[0]['loc'][0];
						$stopLong = $stop[0]['loc'][1];
						
						
						require_once('../php/config.php');					
						$url = $SITE_PATH . 'data/busses/delijn.php?id=' . $stopNumber;
						$jsondata = file_get_contents($url);
						$arrayData = json_decode($jsondata, true);
					?>
					<div id="schedule">
						<div id="time">
							<div id="time-icon">
								<div class="typicons-time"></div>
							</div>
							<div id="time-list">
								<?php
									for ($i = 1; $i<6; $i++){
										$arrival = $arrayData['bus' . $i]['arrival'];
										echo $arrival . '<br>';
									}
								?>
							</div>
						</div>
						<div id="destination">
							<div id="destination-icon">
								<div class="typicons-location"></div>
							</div>
							<div id="destination-list">
								<?php
									for ($i = 1; $i<6; $i++){
										$dest = $arrayData['bus' . $i]['dest'];
										if(strlen($dest)>23){
											echo substr($dest,0,23) . '…<br>';
										} else {
											echo $dest . '<br>';
										}
									}
								?>
							</div>
						</div>
					</div>
					<a href="https://maps.google.be/maps?q=<?php echo $stopLat.','.$stopLong;?>&z=15" title="Show on map"><span id="stopCode">Show bus stop on map</span></a>
				</div>
