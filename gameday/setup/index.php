<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Game Day Program Setup</title>

    <!-- Bootstrap -->
    <link href="/gameday/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="container">
        
        <div class="page-header">
            <h1>Game Day Programs</h1></h1>
        </div>
    <?
            if(isset($_GET['error']))
            {
                echo '<div class="alert alert-danger" role="alert">ERROR: '.$_GET['error'].' not suported</div>';
            }
        ?>
        <form action="setup.php" method="POST">
            <div class="row">
                <div class="col-md-4">
                    <h3>General Settings</h3>
                    <div class="form-group">
                        <label for="sport">Sport</label>
                        <SELECT class="form-control" name="sport" id="sport">
                            <option value="fball">Football</option>
                            <option value="mbkb" selected="slected">Men's Basketball</option>
                            <option value="wsoc">Women's Soccer</option>
                            <option value="wvball">Volleyballl</option>
                            
                        </SELECT>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="year">Year</label>
                            <input type="text" class="form-control" id="year" name="year" value="2015-16">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input class="form-control" type="date" name="date" id="date" value="">
                    </div>
                    <div class="form-group">
                        <label for="time">Time</label>
                        <input class="form-control" type="time" name="time" id="time" value="">
                    </div>
                    <hr>
                    <h3>Preset</h3>
                    <div class="form-group">
                        <label for="presetOpponent">Opponent</label>
                        <SELECT class="form-control" name="presetOpponent" id="presetOpponent">
                            <option selected="slected">--</option>
                            <option>George Fox</option>
                            <option>Lewis &amp; Clark</option>
                        </SELECT>
                    </div>
                </div>
                <div class="col-md-4">
                    <h3>Home Team</h3>
                    <div class="form-group">
                        <label for="homeName">Full Name</label>
                        <input type="text" class="form-control" id="homeName" name="homeName" placeholder="Full Institution Name" value="Willamette University">
                    </div>
                    <div class="form-group">
                        <label for="homeNameShort">Short Name</label>
                        <input type="text" class="form-control" id="homeNameShort" name="homeNameShort" placeholder="Short Institution Name" value="Willamette">
                    </div>
                    <div class="form-group">
                        <label for="homeABV">Abbreviation</label>
                        <input type="text" class="form-control" id="homeABV" name="homeABV" placeholder="Institution Abbreviation" value="WU">
                    </div>
                    <div class="form-group">
                        <label for="homeMascot">Mascot</label>
                        <input type="text" class="form-control" id="homeMascot" name="homeMascot" placeholder="Mascot" value="Bearcats">
                    </div>
                    <div class="form-group">
                        <label for="homeWebHost">Web Host</label>
                        <SELECT class="form-control" name="homeWebHost" id="homeWebHost">
                            <option selected="slected">Presto</option>
                            <option>Sidearm</option>
                        </SELECT>
                    </div>
                    <div class="form-group">
                        <label for="homeURL">Website Address</label>
                        <div class="input-group">
                            <span class="input-group-addon">http://</span>
                            <input type="text" class="form-control" id="homeURL" name="homeURL" placeholder="something.com" value="wubearcats.com">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="homeRPI">RPI Code</label>
                        <input type="text" class="form-control" id="homeRPI" name="homeRPI" placeholder="RPI Code" value="785">
                    </div>
                    <h4>Roster Columns</h4>
                    <div class="form-group">
                        <label for="homeRosterNumber">Number</label>
                        <SELECT class="form-control" name="homeRosterNumber" id="homeRosterNumber">
                            <? 
                                for($i=0;$i<10;$i++)
                                    echo ($i==0)?'<option selected="slected" value="'.$i.'">'.($i+1).'</option> ':'<option value="'.$i.'">'.($i+1).'</option>';
                            ?>
                        </SELECT>
                    </div>
                    <div class="form-group">
                        <label for="homeRosterName">Name</label>
                        <SELECT class="form-control" name="homeRosterName" id="homeRosterName">
                            <? 
                                for($i=0;$i<10;$i++)
                                    echo ($i==1)?'<option selected="slected" value="'.$i.'">'.($i+1).'</option> ':'<option value="'.$i.'">'.($i+1).'</option>';
                            ?>
                        </SELECT>
                    </div>
                    <div class="form-group">
                        <label for="homeRosterPosition">Position</label>
                        <SELECT class="form-control" name="homeRosterPosition" id="homeRosterPosition">
                            <? 
                                for($i=0;$i<10;$i++)
                                    echo ($i==2)?'<option selected="slected" value="'.$i.'">'.($i+1).'</option> ':'<option value="'.$i.'">'.($i+1).'</option>';
                            ?>
                        </SELECT>
                    </div>
                    <div class="form-group">
                        <label for="homeRosterHometown">Hometown</label>
                        <SELECT class="form-control" name="homeRosterHometown" id="homeRosterHometown">
                            <? 
                                for($i=0;$i<10;$i++)
                                    echo ($i==5)?'<option selected="slected" value="'.$i.'">'.($i+1).'</option> ':'<option value="'.$i.'">'.($i+1).'</option>';
                            ?>
                        </SELECT>
                    </div>
                </div>
                <div class="col-md-4">
                    <h3>Visiting Team</h3>
                    <div class="form-group">
                        <label for="awayName">Full Name</label>
                        <input type="text" class="form-control" id="awayName" name="awayName" placeholder="Full Institution Name">
                    </div>
                    <div class="form-group">
                        <label for="awayNameShort">Short Name</label>
                        <input type="text" class="form-control" id="awayNameShort" name="awayNameShort" placeholder="Short Institution Name">
                    </div>
                    <div class="form-group">
                        <label for="awayABV">Abbreviation</label>
                        <input type="text" class="form-control" id="awayABV" name="awayABV" placeholder="Institution Abbreviation">
                    </div>
                    <div class="form-group">
                        <label for="awayMascot">Mascot</label>
                        <input type="text" class="form-control" id="awayMascot" name="awayMascot" placeholder="Mascot">
                    </div>
                    <div class="form-group">
                        <label for="awayWebHost">Web Host</label>
                        <SELECT class="form-control" name="awayWebHost" id="awayWebHost">
                            <option selected="slected">Presto</option>
                            <option>Sidearm</option>
                        </SELECT>
                    </div>
                    <div class="form-group">
                        <label for="awayURL">Website Address</label>
                        <div class="input-group">
                            <span class="input-group-addon">http://</span>
                            <input type="text" class="form-control" id="awayURL" name="awayURL" placeholder="something.com">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="awayRPI">RPI Code</label>
                        <input type="text" class="form-control" id="awayRPI" name="awayRPI" placeholder="RPI Code">
                    </div>
                    <h4>Roster Columns</h4>
                    <div class="form-group">
                        <label for="awayRosterNumber">Number</label>
                        <SELECT class="form-control" name="awayRosterNumber" id="awayRosterNumber">
                            <? 
                                for($i=0;$i<10;$i++)
                                    echo ($i==0)?'<option selected="slected" value="'.$i.'">'.($i+1).'</option> ':'<option value="'.$i.'">'.($i+1).'</option>';
                            ?>
                        </SELECT>
                    </div>
                    <div class="form-group">
                        <label for="awayRosterName">Name</label>
                        <SELECT class="form-control" name="awayRosterName" id="awayRosterName">
                            <? 
                                for($i=0;$i<10;$i++)
                                    echo ($i==1)?'<option selected="slected" value="'.$i.'">'.($i+1).'</option> ':'<option value="'.$i.'">'.($i+1).'</option>';
                            ?>
                        </SELECT>
                    </div>
                    <div class="form-group">
                        <label for="awayRosterPosition">Position</label>
                        <SELECT class="form-control" name="awayRosterPosition" id="awayRosterPosition">
                            <? 
                                for($i=0;$i<10;$i++)
                                    echo ($i==2)?'<option selected="slected" value="'.$i.'">'.($i+1).'</option> ':'<option value="'.$i.'">'.($i+1).'</option>';
                            ?>
                        </SELECT>
                    </div>
                    <div class="form-group">
                        <label for="awayRosterHometown">Hometown</label>
                        <SELECT class="form-control" name="awayRosterHometown" id="awayRosterHometown">
                            <? 
                                for($i=0;$i<10;$i++)
                                    echo ($i==7)?'<option selected="slected" value="'.$i.'">'.($i+1).'</option> ':'<option value="'.$i.'">'.($i+1).'</option>';
                            ?>
                        </SELECT>
                    </div>
                </div>
            </div>
            <hr>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/gameday/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            
            $( "#presetOpponent" ).change(function() {
            
                if($( "#presetOpponent" ).val() == 'George Fox' )
                {
                    $('#awayName').val('George Fox University');
                    $('#awayNameShort').val('George Fox');
                    $('#awayMascot').val('Bruins');
                    $('#awayABV').val('GFU');
                    $('#awayURL').val('athletics.georgefox.edu'); 
                    $('#awayRPI').val('1094');
                    $('#awayRosterNumber').val('0');
                    $('#awayRosterName').val('1');
                    $('#awayRosterPosition').val('2');
                    $('#awayRosterHometown').val('5');
                }
                if($( "#presetOpponent" ).val() == 'Lewis & Clark' )
                {
                    $('#awayName').val('Lewis &amp; Clark College');
                    $('#awayNameShort').val('Lewis &amp; Clark');
                    $('#awayMascot').val('Pioneers');
                    $('#awayABV').val('L&amp;C');
                    $('#awayURL').val('lcpioneers.com'); 
                    $('#awayRPI').val('22235');
                    $('#awayRosterNumber').val('0');
                    $('#awayRosterName').val('1');
                    $('#awayRosterPosition').val('2');
                    $('#awayRosterHometown').val('5');
                }
            });
        });
                        

            
    </script>
    
</body>

</html>
