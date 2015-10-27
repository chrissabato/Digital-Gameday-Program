<?
//include("simple_html_dom.php");
//echo getStats('http://www.nwcsports.com/sports/fball/2015-16/teams/willamette?tmpl=teaminfo-network-monospace-template');



function getStats($URL)
{
    $standings = array();
    
    $html = file_get_html($URL);
    $stats = $html->find('div.monostats');

   
    $stats = str_replace("\t", '', $stats[0]);
    $stats = str_replace("  ", '', $stats);
    return $stats;
}




?>