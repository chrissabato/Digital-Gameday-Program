<?

function getschedule($url)
{
    $rss = file_get_contents($url . '?print=rss');
    $rss = str_replace('dc:date', 'dcdate', $rss);
    $rss = str_replace('ps:score', 'psscore', $rss);
    $rss = str_replace('ps:opponent', 'psopponent', $rss);
    $xml = simplexml_load_string($rss);
    
    $sch = array();
    unset($xml->channel->dclanguage);
    foreach ($xml->channel->item as $item) 
    {
        $opponent = $item->psopponent;        
        $opponent = explode('@', $opponent); //removes Neautral Site location from Opponent
        $opponent = $opponent[0];
        $date = date('n/j/y',strtotime($item->pubDate));
        $time = date('g:i A',strtotime($item->pubDate));
        if ($time == "12:00 AM") $time = 'TBD';
        $score = (string)$item->psscore;
        $sch[] = array('opponent'=>$opponent,'date'=>$date,'time'=>$time,'score'=>$score);
    }
    
    
    return $sch;
}

?>