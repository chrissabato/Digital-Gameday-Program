<?
    $json = file_get_contents('../json/'. $sportCode);
    $data = json_decode($json, true);
    
    switch($sportCode)
    {
        case 'mbkb':
            $sportDisplay = "Men's Basketball";
            break;
        case 'fball':
            $sportDisplay = "Football";
            break;
        case 'wvball':
            $sportDisplay = "Volleyball";
            break;
        case 'wsoc':
            $sportDisplay = "Women's Soccer";
            break;
        default:
            $sportDisplay ='';
    }

    $title = "Bearcat $sportDisplay Gameday Program";

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>
            <? echo $title; ?>
        </title>

        <!-- Bootstrap -->
        <link href="/gameday/css/bootstrap.min.css" rel="stylesheet">
        <link href="/gameday/css/style.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

        <meta property="og:title" content="<? echo $title; ?>" />
        <meta property="og:description" content="<? echo $data['home']['name'] .' '. $title; ?>" />
        <meta property="og:site_name" content="<? echo $data['home']['name']; ?>Athletics" />
        <meta property="og:url" content="http://athletics.app.willamette.edu/gameday/<? echo $sportCode; ?>/" />
        <meta property="og:image" content="http://wubearcats.com/images/setup/thumbnail_default.jpg" />

        <script src="https://use.typekit.net/yvn2pyd.js"></script>
        <script>
            try {
                Typekit.load({
                    async: true
                });
            } catch (e) {}
        </script>

    </head>

    <body>
        <div class="container">
            <div class="header-row">

                <div class="conference-matchup">
                    Northwest Conference <? echo $sportDisplay; ?> Matchup
                </div>
                <div class="header">

                    <img class="header-logo" src="/gameday/images/headers/<? echo $data['sport']; ?>.png" />
                    <div class="matchup"><? echo $data[home][nameShort]; ?> vs <? echo $data[away][nameShort]; ?></div>
                    <div class="header-image-block">
                        <img class="header-image" src="/gameday/images/headers/<? echo $data['sport']; ?>.jpg" />
                        <div class="date">
                            <? echo date('l F jS @ g:i A', $data['date']); ?>
                        </div>
                        
                    </div>
                    <h1>GAMEDAY</h1>
                    <h2><span>Digital</span> PROGRAM</h2>

                </div>
            </div>
            <div class="row">

                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Home Team</h3>
                        </div>
                        <div class="panel-body">

                            <div class="panel-group" id="accordion1" role="tablist" aria-multiselectable="true">

                                <!-- Home Team -->
                                <div class="team-title">
                                    <img src="<? echo $data[home][logo]; ?>" />
                                    <p class="teamName">
                                        <? echo $data[home][name]; ?>
                                    </p>
                                    <p class="teamMascot">
                                        <? echo $data[home][mascot]; ?>
                                    </p>
                                </div>

                                <!-- Home Team Record -->
                                <div class="records">
                                    <h5>Record: 
                                    <span><? echo $data[home][record][overall]; ?></span>
                                    <span>(<? echo $data[home][record][conf]; ?> Conference)</span></h5>
                                </div>

                                <!-- Home Team Roster -->
                                <div class="panel panel-primary">
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#homeRoster" aria-expanded="false" aria-controls="homeRoster"><? echo $data[home][nameShort]; ?>'s Roster</a>
                            </h4>
                                    </div>
                                    <div id="homeRoster" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                        <div class="panel-body">
                                            <? roster($data[home][roster]); ?>
                                        </div>
                                    </div>
                                </div>

                                <!-- Home Team Schedule -->
                                <div class="panel panel-primary">
                                    <div class="panel-heading" role="tab" id="headingThree">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#homeSchedule" aria-expanded="false" aria-controls="homeSchedule"><? echo $data[home][nameShort]; ?>'s Schedule</a>
                                        </h4>
                                    </div>
                                    <div id="homeSchedule" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                        <div class="panel-body">
                                            <? schedule($data[home][schedule]); ?>
                                        </div>
                                    </div>
                                </div>



                                <!-- Home Team coaches -->
                                <?
                                    if(file_exists('coaches.php'))
                                        include('coaches.php');
                                ?>
                                
                                
                                
                                <!-- Home Team news -->
                                <div class="panel panel-primary">
                                    <div class="panel-heading" role="tab" id="headingThree">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#homeNews" aria-expanded="false" aria-controls="homeNews">Recent News</a>
                                        </h4>
                                    </div>
                                    <div id="homeNews" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                        <div class="panel-body">
                                            <div class="news">
                                            <? getNews($data['home']['url']); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                                
                                
                                <!-- Home Team Links -->
                                <hr>

                                <a class="btn btn-primary btn-lg btn-block btn-sm" href="<? echo 'http://' . $data['home']['url'];   ?>" role="button">
                                    <? echo $data['home']['url']; ?>
                                        &nbsp;<span class="glyphicon glyphicon-share" aria-hidden="true"></span>
                                </a>


                            </div>
                        </div>
                    </div>
                </div>




                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Visiting Team</h3>
                        </div>
                        <div class="panel-body">

                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">



                                <!-- Away Team -->
                                <div class="team-title">
                                    <img src="<? echo $data[away][logo]; ?>" />
                                    <p class="teamName">
                                        <? echo $data[away][name]; ?>
                                    </p>
                                    <p class="teamMascot">
                                        <? echo $data[away][mascot]; ?>
                                    </p>
                                </div>

                                <!-- Away Team Record -->
                                <div class="records">
                                    <h5>Record: 
                                    <span><? echo $data[away][record][overall]; ?></span>
                                    <span>(<? echo $data[away][record][conf]; ?> Conferance)</span></h5>
                                </div>

                                <!-- Away Team Roster -->
                                <div class="panel panel-primary">
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#awayRoster" aria-expanded="false" aria-controls="awayRoster"><? echo $data[away][nameShort]; ?>'s Roster</a>
                                        </h4>
                                    </div>
                                    <div id="awayRoster" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                        <div class="panel-body">
                                            <? roster($data[away][roster]); ?>
                                        </div>
                                    </div>
                                </div>

                                <!-- Away Team Schedule -->
                                <div class="panel panel-primary">
                                    <div class="panel-heading" role="tab" id="headingThree">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#awaySchedule" aria-expanded="false" aria-controls="awaySchedule"><? echo $data[away][nameShort]; ?>'s Schedule</a>
                                        </h4>
                                    </div>
                                    <div id="awaySchedule" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                        <div class="panel-body">
                                            <? schedule($data[away][schedule]); ?>
                                        </div>
                                    </div>
                                </div>


                                <!-- Away Team news -->
                                <div class="panel panel-primary">
                                    <div class="panel-heading" role="tab" id="headingThree">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#awayNews" aria-expanded="false" aria-controls="awayNews">Recent News</a>
                                        </h4>
                                    </div>
                                    <div id="awayNews" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                        <div class="panel-body">
                                            <div class="news">
                                            <? getNews($data['away']['url']); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- Away Team Links -->
                                <hr>
                                <a class="btn btn-primary btn-lg btn-block btn-sm" href="<? echo 'http://' . $data['away']['url'];   ?>" role="button">
                                    <? echo $data['away']['url']; ?>
                                        &nbsp;<span class="glyphicon glyphicon-share" aria-hidden="true"></span>
                                </a>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Northwest Conference Standings</h3>
                        </div>
                        <div class="panel-body">
                            <p>&nbsp;</p>


                            <table class="table table-striped">
                                <tr>
                                    <th>Team</th>
                                    <th>NWC</th>
                                    <th>Overall</th>
                                </tr>

                                <?
                    foreach($data[standings] as $team)
                    {
                        echo '<tr>';
                        echo ' <td>'.$team['team'].'</td>';
                        echo ' <td>'.$team['nwcrecord'].'</td>';
                        echo ' <td>'.$team['record'].'</td>';
                        echo '</tr>';
                    }
                    ?>
                            </table>
                        </div>

                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <?
                        $dir = "ads";

                        // Open a directory, and read its contents
                        if (is_dir($dir)){
                          if ($dh = opendir($dir)){
                            while (($file = readdir($dh)) !== false)
                            {
                              if($file != '.' and $file != '..')
                              {
                                echo '<div class="col-md-2 col-xs-6">';
                                echo '<a href="#" class="thumbnail" data-toggle="modal" data-target="#lightbox"><img src="'.$dir  .'/'. $file .'" alt="ad"></a>';
                                echo '</div>';
                              }
                            }
                            closedir($dh);
                          }
                        }
                    ?>
                    </div>
                </div>



            </div>




        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="/gameday/js/bootstrap.min.js"></script>

        <?
        modal($data['home']['roster'],$data['home']['url']);
        modal($data['away']['roster'],$data['away']['url']);
        function modal($team, $url)
        {
            GLOBAL $sportCode;
            foreach($team as $roster)
            {
                $modalName = createModalName($roster['number'],$roster['name']);
                $imgURL = 'http://' . $url . $roster['imgURL'];
                $position = position($sportCode, $roster['position']);

            echo '
            <!-- Modal -->
            <div class="modal" id="'.$modalName.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">

                        <div class="modal-body">
                            <div class="modal-number">'.$roster['number'].'</div>
                            <img src="'.$imgURL.'" />
                            <h2>'.$roster['name'].'</h2>
                            <p><span>Position:</span> '.$position.'</p>
                            <p><span>Hometown:</span> '.$roster['hometown'].'</p>
                            <p><span>High School:</span> '.$roster['highschool'].'</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            ';
            }
        }
        ?>
            <!-- Light Box Modal -->
            <div id="lightbox" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog-ad">
                            <img data-dismiss="modal" src="" alt="" />
                </div>
            </div>

            <script>
                $(document).ready(function () {
                    var $lightbox = $('#lightbox');

                    $('[data-target="#lightbox"]').on('click', function (event) {
                        var $img = $(this).find('img'),
                            src = $img.attr('src'),
                            alt = $img.attr('alt'),
                            css = {
                                'maxWidth': $(window).width() - 30,
                                'maxHeight': $(window).height() - 30,
                                'margin-top': ($(window).height()/2)-$img.height()
                            };

                        $lightbox.find('img').attr('src', src);
                        $lightbox.find('img').attr('alt', alt);
                        $lightbox.find('img').css(css);
                    });

                    $lightbox.on('shown.bs.modal', function (e) {
                        var $img = $lightbox.find('img');

                        $lightbox.find('.modal-dialog-ad').css({
                            'width': $img.width() 
                        });
                    });
                });
            </script>
    </body>

    </html>

    <?
    function createModalName($NUM,$NAME)
    {
        $tmp = $NUM . $NAME;
        $tmp = str_replace(" ", '', $tmp);
        return $tmp;
    }


    function schedule($games)
    {
        echo '<table class="table table-striped">
        <tr>
         <th>Date</th>
         <th>Opponent</th>
         <th>Time</th>
         <th>Result</th>  
        </tr>';
   
        foreach($games as $game)
        {
            echo '<tr>';
            echo ' <td>'. date('M d',strtotime($game['date'])) .'</td>';
            echo ' <td>'.$game['opponent'].'</td>';
            echo ' <td>'.$game['time'].'</td>';
            echo ' <td>'.$game['score'].'</td>';
            echo '</tr>';
        }
        echo '</table>';  
    }
    function roster($team)
    {
        echo '<table class="table table-striped">
        <tr>
         <th>#</th>
         <th>Name</th>
         <th>Pos.</th>
         <th>Hometown</th>  
        </tr>';
   
        foreach($team as $roster)
        {
            $modalName = createModalName($roster[number],$roster[name]);
            echo '<tr>';
            echo ' <td>'.$roster[number].'</td>';
            echo ' <td><a href="" data-toggle="modal" data-target="#'.$modalName.'" />'.$roster[name].'</a></td>'; echo '
                        <td>'.$roster[position].'</td>'; 
            echo '
                        <td>'.$roster[hometown].'</td>'; 
            echo '</tr>'; } 
        echo '</table>'; 
    }


    //Get Reccent News
    function getNews($url)
    {     
        global $sportCode;
        $url = "http://$url/sports/$sportCode/headlines-featured?print=rss";
        $rss = file_get_contents($url);
        $rss = str_replace('?max_width=160&amp;max_height=120', '', $rss);
        $xml = simplexml_load_string($rss);
        $count = 0;
        foreach ($xml->channel->item as $item) 
        {         
            $title =  $item->title;
            $img = $item->enclosure['url'];
            
            echo '
                <div class="news-item">
                  <img src="'.$img.'" alt="'.$title.'">
                    <p>'.$title.'</p>
                </div>
            ';
             
            $count++;
            if($count >3)
                break;     
        }
            
    }

function position($sport, $pos) 
{ 
    if($sport == 'wvball') 
    { 
        $positions = array(); 
        $newp = ''; 
        $pos = explode('/',$pos);
        foreach($pos as $p) { $positions[] = posWVBALL($p); } 
        foreach($positions as $position) { $newp .= "$position, " ; } 
        return trim($newp, ', '); 
    }
    if($sport == 'wsoc' or $sport == 'msoc') 
    { 
        $positions = array(); 
        $newp = ''; 
        $pos = explode('/',$pos);
        foreach($pos as $p) { $positions[] = posSOC($p); } 
        foreach($positions as $position) { $newp .= "$position, " ; } 
        return trim($newp, ', '); 
    } 
    else return $pos; 
} 

function posSOC($pos) 
{ 
    switch($pos) 
    { 
        case 'GK': 
            $p = 'Goal Keeper'; 
            break; 
        case 'D': 
            $p = 'Defense'; 
            break; 
        case 'F': 
            $p = 'Forward'; 
            break; 
        case 'M': 
            $p = 'Midfield'; 
            break; 
        case 'MF': 
            $p = 'Midfield'; 
            break; 
        default: 
            $p = $pos; 
    } 
    return $p; 
} 

function posWVBALL($pos) 
{ 
    switch($pos) 
    { 
        case 'S': 
            $p = 'Setter'; 
            break; 
        case 'OH': 
            $p = 'Outside Hitter'; 
            break; 
        case 'OPP': 
            $p = 'Opposite'; 
            break; 
        case 'DS': 
            $p = 'Defensive Specialist'; 
            break; 
        case 'MH': 
            $p = 'Middle Hitter'; 
            break; 
        case 'LIB':
            $p = 'Libero';
            break;
        default: 
            $p = $pos; 
    } 
    return $p; 
} 

?>