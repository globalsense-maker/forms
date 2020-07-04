<?php

//connection
$dbhandle=mysqli_connect("localhost","root","","mrduro");

if(!$dbhandle)
{
die("Connection failed: " . mysqli_connect_error());
}

//$selected = mysqli_select_db("mrduro",$dbhandle) or die("Database not found");

//execute SQL query
$sql = "SELECT * FROM results";

$num_poller = mysqli_num_rows($sql);

$total_votes = 0;

//fetch the data from the database
while($row = mysqli_fetch_array($sql))

 {

 //calculates number of votes
  $total_votes += $row{'num_votes'};

}

//null pointer $result
mysqli_data_seek($sql,0);

//close the connection
mysqli_close($dbhandle);



//Tell gd2, where your fonts reside

putenv('GDFONTPATH=Fonts');

$font = 'arial.ttf';

//Set starting point for drawing
$y = 50;

//Specify constant values
//Image width in pixels
$width = 700;

//Bars height
$bar_height = 20; 

//Calculates image height
$height = $num_poller * $bar_height * 1.5 + 70;

//Distance on the bar chart standing for 1 unit
$bar_unit = ($width - 400) / 100; 

//Create the image resource
$image = ImageCreate($width, $height);

//making four colors, white, black, blue and red
$white = ImageColorAllocate($image, 255, 255, 255);

$black = ImageColorAllocate($image, 0, 0, 0);

$red   = ImageColorAllocate($image, 255, 0, 0);

$blue  = imagecolorallocate($image,0,0,255);

//Create image background
ImageFill($image,$width,$height,$white);

//Draw background shape
ImageRectangle($image, 0, 0, $width-1, $height-1, $black);

//Output header
ImageTTFText($image, 16, 0, $width/3 + 50, $y - 20, $black, $font, 'Poll Results');

while($row = mysqli_fetch_object($result))

 {

  if ($total_votes > 0)
 
   $percent = intval(round(($row->num_votes/$total_votes)*100));

  else

    $percent = 0;

//Output header for a particular value
ImageTTFText($image,12,0,10, $y+($bar_height/2), $black, $font, $row->book_type);

//Output percentage for a particular value
ImageTTFText($image, 12, 0, 170, $y + ($bar_height/2),$red,$font,$percent.'%');

$bar_length = $percent * $bar_unit;

//Draw a shape that corresponds to 100%
ImageRectangle($image, $bar_length+221, $y-2, (220+(100*$bar_unit)), $y+$bar_height, $black);

//Output a bar for a particular value
ImageFilledRectangle($image,220,$y-2,220+$bar_length, $y+$bar_height, $blue);

//Output the number of votes
ImageTTFText($image, 12, 0, 250+100*$bar_unit, $y+($bar_height/2), $black, $font, $row->num_votes.' votes cast.');

//Going down to the next bar
$y = $y + ($bar_height * 1.5);


}

//Tell the browser about types of file
header("Content-Type: image/jpeg");

//Displya in jpeg format newly created image
ImageJpeg($image);

//Free up resources
ImageDestroy($image);

?>

