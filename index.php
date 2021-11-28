<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reading a file with PHP</title>
</head>

<body>

<?php
//this to turn off unnecessary warning by PHP
error_reporting(E_ERROR | E_PARSE);

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

//declare file path
//it's practical to break down into parts like this when scaling up
$path = $DOCUMENT_ROOT.'/data/';
$filename = 'cities.txt';
$file_location = $path.$filename;

//open the file stream
$file = fopen($file_location,'r');

//only do things when file is opened
//you can also use
//$file = fopen($file_location,'r') or die('File cannot be opened');

if ($file) {
    //loop through all lines in the text file
    //same purpose with your for loop
    //but since you don't need to iterate
    //please read: https://stackoverflow.com/questions/12847502/for-loop-vs-while-loop-vs-foreach-loop-php
    while (($city = fgets($file)) !== false) {
        // process the line read.
        echo 'City: '.$city.'<br />';
    }

    //after finishing the loop
    //close the file
    fclose($file);
} else {
    echo "File path is: ".$file_location;
}

?>

</body>
</html>