the-peoples-gps-tracker
==================
a gps tracker by the people for the people

device = android
server = php

Contributions welcome in iphone code, blackberry, winphone.

Roadmap
=======

3 levels of complexity

*phase 1 - php only mode
*phase 2 - sqlite mode
*phase 3 - mysql mode

This project is still in heavy dev
========================

Currently the server code will track 3 devices. It is still buggy.

###New feature - device "id"
One primary feature has been added. Namely "id" of a device. For now this is a simple numeric number from "0". In future this will be a generated key.

###New Feature - caller.html
A html caller for testing without an android device. Series of buttons with predefined strings. Saves the hassle of setting up a phone when you want to test the server code.

###Todo

* gps-receiver.log
Called by all devices. This is not ideal since it will start to fail on too many requests at once. Need a better way to handle concurrent requests to the server for multiple devices. Already tried a gps-receiver.log for each user, would also be more secure if it had a unique name. Harder to guess.

* gps-history.log
Keeps track on all device history. Problem here is when the filesize gets that big it start it makes looking up history slower. This file is read on init, to snap all devices back to their last position. Have also tried seperate logs for each device as above. A bit tedious, but does provide cleaner separation of data. Not ruling out a sqlite version of this, but keeping focus on pure php version for scalabilty. Sqlite will come. Any takers? 

* implement bootstrap for various sized devices. Map must scale to screen otherwise it becomes cumbersome to view and edit. Need better device support.

* build a better front end for multiple device tracking. A map is great, but needs an editable key, some simple tags, different levels of activity based on each device. Yet still keep interface tight, clean and focussed.

###Renaming

* i-am-here.html renamed to gps-monitor.html - tracks multiple gps devices (limited to 3 devices for testing purposes)

* gps.php renamed to gps-listener.php - responds to calls from devices and breaks down string into utc, lat, lon, timestamp and id (of device). Will add mode later. Mode is a user initiated call like "distress", "waiting", "mayday", "fire", etc.

* i-am-here-position.php renamed to gps-get-last-call.php - reads last device call from file.

* gps-position.txt renamed to gps-lastcall.log - stores last device call to server.

###Added

* gps-history.log - running history of all devices

* caller.html - simple html button interface to pump test values to server.

###Changes

* Added different colored icons - will be configurable later

* Add first name lookup for "id" - more human readable when you click on a specific marker (eg: instead of seeing "id=1" you see "Ron") 
Currently shows id, human name and gps coordinates (hard coded for now).

* Removed google maps option. Doesn't need a explanation. If you need it feel free to add it back.



