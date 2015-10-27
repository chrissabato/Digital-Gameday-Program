<?
if(isset($_GET['debug']))
{
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include("simple_html_dom.php");
    ini_set('memory_limit','1024M');
   
    $tmp = getplayer('http://wubearcats.com/sports/wvball/2015-16/bios/fincher_sarah_rn3f');
    echo '<pre>';
    print_r($tmp);
    echo '</pre>';
}

function getPlayer($URL)
{
    
    $html = file_get_html($URL);
    
    $img = $html->find('.player-headshot img');
    
    $info = $html->find('.player-info table');
    
    $player = array('src'=>$img[0]->attr['src'],'info'=>(string)$info[0]); 
    
    
    
    return $player;
    
}

?>