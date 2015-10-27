<?

function getStandings($URL)
{
    $standings = array();
    
    $html = file_get_html($URL);
    foreach($html->find('table tr') as $tr)
    {
       if($tr->class != 'stats-header' and $tr->class != 'table-header')
       {
           $td = $tr->find('td');
           $team = trim(strip_tags($td[0]));
           $record = $td[6]->plaintext;
           $nwcRecord = $td[1]->plaintext;
           
           $standings[] = array('team'=>$team,'nwcrecord'=>$nwcRecord,'record'=>$record);
 
       }
        
    }
   return $standings;
}

?>