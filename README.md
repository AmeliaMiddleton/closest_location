Get the closest location

HTTP Method
- GET,POST

REST Path
- closest_location.php

Parameters

|Parameter   |Optional    |Description|
|---|---|---|
|lat         |N          |Latitude of the location requested|
|long        |N           |Longitude of the location requested|

Request Example

`closest_location.php?lat=100&long=200`

Response Example

`{"name":"HY-VEE PHARMACY ","address":"109 NORTH BLUE JAY
DRIVE","city":"LIBERTY","state":"MO","zipcode":"64068","lat":"39.24575800","long":"-94.44702000","distance":3829.806751479}`
