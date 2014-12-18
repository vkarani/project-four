# P4 New York Sites and hotels

## Live URL
<http://p4.digitalwebapplications.com>

## Description
My Project #4 provides  a way for different users to login and share comments and itineraries when visiting a 
large, Well known city. 
Users can 
- sign up
- comment on various destinations
- create itineraries
- add friends and
- view their friends itineraries

## Demo
Jing:- http://www.screencast.com/t/p3nwp2qsf4 

## Details for teaching team
- login as user1@email.com/password. You can also create your own users.
- Please use chrome. May not work with other browsers
- Validated pages on http://validator.w3.org/  --- Note that the debugbar might produce errors, but the main site checks out fine

## Outside code and resources
- Bootstrap:            maxcdn.bootstrapcdn.com
- Google maps:          https://www.google.com/maps
- Google URL shortener: https://goo.gl/
- Wikimedia images:     http://upload.wikimedia.org/wikipedia/commons/a/a1/Statue_of_Liberty_7.jpg
- Wikimedia images:     http://upload.wikimedia.org/wikipedia/commons/1/18/3021-Central_Park-Sheep_Meadow.JPG
- Wikimedia images:     http://upload.wikimedia.org/wikipedia/commons/8/82/Gwb.jpg
- Standard Hotels:      Picture of the standard hotel
- W Hotel:              Picture of the W hotel
- Foobooks class demo/project https://github.com/susanBuck/foobooks
- Friends:  https://github.com/laravel/framework/issues/441

## Database
- Tables
* user                  --- has user information
* friend_user           --- pivot from user to user, for friends
* destinations          --- has info about destinations
* categories            --- has info on the type of destination i.e. hotel, park, etc
* category_destination  --- pivot between category and destination
* comments              --- comments about destinations              
* visitdates            --- itinerary information
* destination_visitdate --- pivot between destinations and visitdates

## Operations
* CREATE                --- can add users, comments, itineraries
* READ                  --- can read from all tables to update UI
* UPDATE                --- can update comments
* DELETE                --- can delete friends, your own comments
