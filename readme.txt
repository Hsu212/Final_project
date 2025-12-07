Test the function of the flight data retrieve 


The name of airports are shorten to DXB , SVO etc.


Example of FLights in the Data Base

101
American Airlines Flight 101
JFK
LAX
06:00:00
2024-06-21


Input JFK in dept airport and arr airport is LAX 
Then input the date.


Make sure to input those correctly in order not to get not found flith error message.



Code structure



index.php ======= work for home page
home.php ====== user can manage their ticket and see recent bookings
searchflight.php ====== user can search FLights
connect.php ======== this is where the user is ased for the input their infos
 The flight infos are retrieved from sql server and saved in the session as variable then pass these flight infos and user infos to the book.php
 