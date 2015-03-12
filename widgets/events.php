<div id="start">
				<div class="content">
					<?php
						session_start();
						$url = "../data/events/events_" . $_SESSION['city'] . ".json";
						$jsondata = file_get_contents($url);
						$arrayData = json_decode($jsondata, true);
					?>
					<div class="event">
						<?php
							$title = $arrayData['event1']['title'];
							$thumb = $arrayData['event1']['thumb'];
							$date = $arrayData['event1']['date'];
							$location = $arrayData['event1']['location'];
						?>
						<img class="thumb" src="<?php echo $thumb; ?>"></img>
						<div class="description">
							<span class="eventTitle"><?php echo substr($title,0,25) . '…';?></span>
							<span class="eventDate"><?php echo substr($date,0,30); ?></span>
							<span class="eventLocation"><?php echo substr($location,0,30) ;?></span>
						</div>
					</div>
					<div class="event">
						<?php
							$title = $arrayData['event2']['title'];
							$thumb = $arrayData['event2']['thumb'];
							$date = $arrayData['event2']['date'];
							$location = $arrayData['event2']['location'];
						?>
						<img class="thumb" src="<?php echo $thumb; ?>"></img>
						<div class="description">
							<span class="eventTitle"><?php echo substr($title,0,25) . '…'; ?></span>
							<span class="eventDate"><?php echo substr($date,0,30); ?></span>
							<span class="eventLocation"><?php echo substr($location,0,30); ?></span>
						</div>
					</div>
				</div>
</div>

<div id="more">
			<div class="content">
					<div class="event">
						<?php
							$title = $arrayData['event3']['title'];
							$thumb = $arrayData['event3']['thumb'];
							$date = $arrayData['event3']['date'];
							$location = $arrayData['event3']['location'];
						?>
						<img class="thumb" src="<?php echo $thumb; ?>"></img>
						<div class="description">
							<span class="eventTitle"><?php echo substr($title,0,25) . '…'; ?></span>
							<span class="eventDate"><?php echo substr($date,0,30); ?></span>
							<span class="eventLocation"><?php echo substr($location,0,30); ?></span>
						</div>
					</div>
					<div class="event">
						<?php
							$title = $arrayData['event4']['title'];
							$thumb = $arrayData['event4']['thumb'];
							$date = $arrayData['event4']['date'];
							$location = $arrayData['event4']['location'];
						?>
						<img class="thumb" src="<?php echo $thumb; ?>"></img>
						<div class="description">
							<span class="eventTitle"><?php echo substr($title,0,25) . '…'; ?></span>
							<span class="eventDate"><?php echo substr($date,0,30); ?></span>
							<span class="eventLocation"><?php echo substr($location,0,30); ?></span>
						</div>
					</div>
			</div>
</div>
