<?
if(isset($_GET['debug']))
{
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include("simple_html_dom.php");
    ini_set('memory_limit','1024M');
    $col = array("number"=>0,"name"=>1,"position"=>2,"hometown"=>5); 
    $tmp = getRoster('http://wubearcats.com/sports/wvball/2015-16/roster',$col);
    echo '<pre>';
    print_r($tmp);
    echo '</pre>';
}

function getRoster($rosterURL,$columns)
{
    $roster = array();
    
    $html = file_get_html($rosterURL);
    foreach($html->find('div.roster table tbody tr') as $tr)
    {
       if($tr->parent->tag == 'tbody') 
       { 
           $info = $tr->find('td');
           $number = trim(strip_tags($info[$columns['number']]));
           $name = trim(strip_tags($info[$columns['name']]));
           $position = trim(strip_tags($info[$columns['position']]));
           $tmp = trim(strip_tags($info[$columns['hometown']]));
           $tmp = explode('/',$tmp);
           $hometown = trim($tmp[0]);
           $highschool = trim($tmp[1]);
           $roster[]  = array("number"=>$number,"name"=>$name,"position"=>$position,"hometown"=>$hometown, "highschool"=>$highschool); 
       }
    }
    
    $rosterURL = $rosterURL . '?view=headshot';
    $html = file_get_html($rosterURL);
    foreach($html->find('.headshot-layout ul li') as $li)
    {
        $tmp = $li->find('a');
        $imgUrl = $tmp[0]->children(0)->src;
        $imgUrl = explode('?',$imgUrl); 
        $imgUrl = $imgUrl[0];
        $imgName =  $tmp[0]->children(2)->plaintext;
        $imgName = str_replace('<br />', '', $imgName);
        $imgName = trim(preg_replace('/\s+/', ' ', $imgName));

        foreach($roster as $key=>$athlete)
        {
            if($athlete['name'] == $imgName)
                $roster[$key]['imgURL'] =  $imgUrl;
            
        }         
    }
    
    return $roster;
}

?>