<?
if($_POST['homeWebHost'] == 'Sidearm' or $_POST['awayWebHost'] == 'Sidearm')
{
    header("location: http://athletics.app.willamette.edu/gameday/setup/?error=sidearm");
}
else
{    
date_default_timezone_set('America/Los_Angeles');
include("simple_html_dom.php");
ini_set('memory_limit','1024M');
    
/*    
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/
    
$data['date'] = strtotime($_POST['date'] .' '. $_POST['time']);

$data['sport'] = $_POST['sport'];
$data['year'] = $_POST['year'];

$data['home']['name'] = $_POST['homeName'];
$data['home']['nameShort'] = $_POST['homeNameShort'];
$data['home']['abv'] = $_POST['homeABV'];
$data['home']['mascot'] = $_POST['homeMascot'];
$data['home']['logo'] = 'http://cdn87.psbin.com/logos/rpi/'.$_POST['homeRPI'].'/img.png';
$data['home']['url'] = $_POST['homeURL'];
$data['home']['rosterColumns'] = array('number'=>$_POST['homeRosterNumber'],'name'=>$_POST['homeRosterName'],'position'=>$_POST['homeRosterPosition'],'hometown'=>$_POST['homeRosterHometown']);  
    
$data['away']['name'] = $_POST['awayName'];
$data['away']['nameShort'] = $_POST['awayNameShort'];
$data['away']['abv'] = $_POST['awayABV'];
$data['away']['mascot'] = $_POST['awayMascot'];
$data['away']['logo'] = 'http://cdn87.psbin.com/logos/rpi/'.$_POST['awayRPI'].'/img.png';
$data['away']['url'] = $_POST['awayURL'];
$data['away']['rosterColumns'] = array('number'=>$_POST['awayRosterNumber'],'name'=>$_POST['awayRosterName'],'position'=>$_POST['awayRosterPosition'],'hometown'=>$_POST['awayRosterHometown']);


/*
$data['date'] = strtotime('10/31/2015 13:00.00');

$data['sport'] = 'mbkb';
$data['year'] = '2015-16';

$data['home']['name'] = 'Willamette University';
$data['home']['nameShort'] = 'Willamette';
$data['home']['abv'] = 'WU';
$data['home']['mascot'] = 'Bearcats';
$data['home']['logo'] = 'http://cdn87.psbin.com/logos/rpi/785/'.$data['sport'].'.png';
$data['home']['url'] = 'wubearcats.com';
$data['home']['rosterColumns'] = array('number'=>0,'name'=>1,'position'=>2,'hometown'=>6);

$data['away']['name'] = 'Lewis &amp; Clark College';
$data['away']['nameShort'] = 'Lewis &amp; Clark';
$data['away']['abv'] = 'L&amp;C';
$data['away']['mascot'] = 'Pioneers';
$data['away']['logo'] = 'http://cdn87.psbin.com/logos/rpi/22235/'.$data['sport'].'.png';
$data['away']['url'] = 'lcpioneers.com';
$data['away']['rosterColumns'] = array('number'=>0,'name'=>1,'position'=>2,'hometown'=>7);
*/
    
   
// Get Schedules
// ***************************************
include('schedule.php');
$data['home']['schedule'] = getschedule('http://'.$data['home']['url'].'/sports/'.$data['sport'].'/'.$data['year'].'/schedule');
$data['away']['schedule'] = getschedule('http://'.$data['away']['url'].'/sports/'.$data['sport'].'/'.$data['year'].'/schedule');


// Get Records
// ***************************************
include('record.php');
$data['home']['record'] = getRecord('http://'.$data['home']['url'].'/sports/'.$data['sport'].'/'.$data['year'].'/schedule');
$data['away']['record'] = getRecord('http://'.$data['away']['url'].'/sports/'.$data['sport'].'/'.$data['year'].'/schedule');



// Get Rosters
// ***************************************
include('rosters.php');
//get home roster
$rosterURL = 'http://'.$data['home']['url'].'/sports/'.$data['sport'].'/'.$data['year'].'/roster';
$data['home']['roster'] = getRoster($rosterURL,$data['home']['rosterColumns']);

//get away roster
$rosterURL = 'http://'.$data['away']['url'].'/sports/'.$data['sport'].'/'.$data['year'].'/roster';
$data['away']['roster'] = getRoster($rosterURL,$data['away']['rosterColumns']);

 

// Get Standings
// ***************************************
include('standings.php');
$data['standings'] = getStandings('http://www.nwcsports.com/sports/'.$data['sport'].'/'.$data['year'].'/standings?dec=printer-decorator');


/*
// Get Stats
// ***************************************
include('stats.php');
$data['home']['stats'] = getStats('http://www.nwcsports.com/sports/fball/2015-16/teams/willamette?tmpl=teaminfo-network-monospace-template');
$data['away']['stats'] = getStats('http://www.nwcsports.com/sports/fball/2015-16/teams/lewisampclark?tmpl=teaminfo-network-monospace-template');
*/

$json = json_encode($data);

//Write json to file
$jsonFileName = $_SERVER["DOCUMENT_ROOT"] . '/gameday/json/' . $data['sport'];
$jsonFile = fopen($jsonFileName, "w") or die("Unable to open $jsonFileName");
fwrite($jsonFile, $json);
fclose($jsonFile);


$redirectURL = 'location: http://athletics.app.willamette.edu/gameday/'.$data['sport'].'/';
header($redirectURL);
}

?>