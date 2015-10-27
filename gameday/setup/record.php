<?
    if(isset($_GET['debug']))
    {
    date_default_timezone_set('America/Los_Angeles');

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include("simple_html_dom.php");
    ini_set('memory_limit','1024M');

    $tmp = getRecord('http://wubearcats.com/sports/wvball/2015-16/schedule');
    echo '<hr>';
    print_r($tmp);
        
    }



function getRecord($url)
{
    $record = array();
    
    $html = file_get_html($url);
    foreach($html->find('.schedule-record table tr td ') as $r)
    {
        $tmp[] = (string)$r;   
   // print_r($r);
    }
    
    $record['overall'] = $tmp[0];
    $record['conf'] = $tmp[2];
    return $record;
}

?>