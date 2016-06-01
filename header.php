<?php

$donationTotal = htmlspecialchars(file_get_contents($_SERVER['DOCUMENT_ROOT']."/donationTotal.txt", true));

echo '
  <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">
            <img src="/img/LogoHeader.png" alt="Sonic Spring Fling"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class=""><a href="/schedule.php">Schedule<span class="sr-only">(current)</span></a></li>
            <li class="dropdown">
              <a href="videos.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Videos <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/videos/2015/videos2015.php">Sonic Spring Fling 2015</a></li>
                <li><a href="/videos/2014/videos2014.php">Sonic Spring Fling 2014</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="http://youtube.com/HalfEmptyEnergyTank/">HEET on YouTube</a></li>
              </ul>
            </li>
            <li><a href="/about.php">About</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="/donate.php" id="donationLabel">Donations:</a></li>
            <li id="donationTotal"><a href="#">'.$donationTotal.'</a></li>
          </ul>
          <a href="/donate.php" class="nav navbar-right"><button type="button" class="btn btn-success navbar-btn">DONATE</button></a>

        </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>';
?>
            
            
            <!--
            <header>
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 headerLeft">
                        <a href="/"><img src="img/SonicSpringFling.png" alt="Sonic Spring Fling"></a></li>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 headerMiddle">
                        <ul class="menu">
                                    <li class="col-lg-6 col-md-6 col-sm-12 col-xs-12"><a href="donate.php">DONATE</a></li>
                                    <li class="col-lg-6 col-md-6 col-sm-12 col-xs-12"><a href="schedule.php">SCHEDULE</a></li>
                                    <li class="col-lg-6 col-md-6 col-sm-12 col-xs-12"><a href="videos.php">VIDEOS</a></li>
                                    <li class="col-lg-6 col-md-6 col-sm-12 col-xs-12"><a href="about.php">ABOUT SSF</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 headerRight">
                        <div id="donation">

                            <div id="donation-total"><h4><small>Total Donations Raised for the WWF</small></h4><h1>$1234.56</h1></li></div>

                    </div>
                </div>
            </header>
            
            __>

            <!--
            <nav>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <ul>
                            <li><a href="donate.php">Donate</a></li>
                            <li><a href="schedule.php">Schedule</a></li>
                            <li><a href="videos.php">Videos</a></li>
                            <li><a href="about.php">About SSF</a></li>
                        </ul>
                    </div>
                </div>
            </nav>-->
