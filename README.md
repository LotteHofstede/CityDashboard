# City Dashboard
## Description
This is the repository for the city dashboards for Leuven, Antwerpen, Gent and Brussel.
<br>Current address of the dashboard is [http://534634.webontwerp.khleuven.be/stage/](http://534634.webontwerp.khleuven.be/stage/).

## Contents
### index.php
This file simply redirects the visitor to the intro page where he/she must choose how to share his/her location.

### folders
#### cities
The files in this folder are the html templates for each city.
<br>Not all cities use the same widgets (the dashboard parts), so every city has it's own template.

#### css
This are the css files used bij the website. 
<br>There is a file for the desktop version and a file for the mobile version.
<br>The detection of desktop/mobile is done by media queries.

#### data
This folder contains the scrapers, scripts, json files, … to get the data used by the dashboard.
* JSON file generators	-> widgets get their data from the JSON files
	+ airquality
	+ bikes
	+ cambiocars
	+ events
	+ news
	+ parkings
	+ twitter trends and streams
	+ weather
* Real-time scrapers	-> widgets get their data real-time from the scrapers
	+ busses
	+ cameras
	+ wikipedia
* Use MongoDB 	->	widgets get their data from your mongodb
	+ foursquare
	+ instagram
	+ twitter

#### img
Images used by the dashboard.

#### intro
When a visitor starts or restarts a session, he will be redirected here the first time.
<br>The users location is defined here, and the information is stored in de database.

#### php
Some php files/scripts used all over the dashboard.

#### weather
All the required stuff for the weather.

#### widgets
The pages that are loaded into the widgets (the dashboard parts) with jQuery.

## Setup
1. upload all the folders/files to your web host
2. go to php/config.php and edit the $SITE_PATH so it's correct for you
3. set up the database connections
	+ go to php/dbconnect.php and change the API key and database to yours
	+ eventually change the collection names ($COLLECTION) in the data folder for instagram, twitter and foursquare
	+ the visitor's info is stored in collection 'visitors', to change that, go to info/storeVisitor.php and change $COLLECTION there
	+ comments from the comment box are stored in collection 'comments', to change that, go to php/addCOmment and change $COLLECTION there
4. set the cronjobs to update the JSON files on the webserver (check dropbox for cronjobs.txt)
