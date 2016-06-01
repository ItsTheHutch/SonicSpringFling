<?php
    $donationTotalNoDollar = floatval(file_get_contents('./donationTotalNoDollar.txt', true));

    $boomPercentage = number_format(($donationTotalNoDollar/2500)*100, 0);
    $sonic06Percentage = number_format(($donationTotalNoDollar/5000)*100, 0);

    $boomSuccess = "";
    $sonic06Success = "";

    if($boomPercentage >= 100){
        $boomSuccess = "progress-bar-success";
        $boomPercentage = 100;
    }
    if($sonic06Percentage >= 100){
        $sonic06Success = "progress-bar-success";
        $sonic06Percentage = 100;
    }

    
echo '
<div class="incentive container-fluid">
    <div class="row">
        <h1>Overtime Game Incentives<small><p>All donations apply to both incentives!</p></h1>
        <br>

        <div class="col-large-6 col-md-6 col-sm-12 col-xs-12">
            <div class="image">
                <img src="./img/sonicboom.jpg" height="100%" width="100%">
                <div class="gameTitle">
                    <h2>Sonic Boom: Rise of Lyric
                      <br>$'.$donationTotalNoDollar.'/$2500</h2>
                </div>
            </div>
            <div class="progress">
                <div class="progress-bar '.$boomSuccess.'" role="progressbar" aria-valuenow="'.$boomPercentage.'" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: '.$boomPercentage.'%;">
                    '.$boomPercentage.'%
                </div>
            </div><!-- end progress div -->
        </div><!-- end col div -->

        <div class="col-large-6 col-md-6 col-sm-12 col-xs-12">
            <div class="image">
                <img src="img/sonic06.jpg" height="100%" width="100%">
                <div class="gameTitle">
                    <h2>Sonic The Hedgehog v.2006<br>ALL CHARACTERS<br>$'.$donationTotalNoDollar.'/$5000</h2>
                </div>
            </div>
            <div class="progress">
                <div class="progress-bar '.$sonic06Success.'" role="progressbar" aria-valuenow="'.$sonic06Percentage.'" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: '.$sonic06Percentage.'%;">
                    '.$sonic06Percentage.'%
                </div>
            </div><!-- end progress div -->
        </div><!-- end col div -->

    </div><!-- end row -->
</div><!-- end container-fluid -->';
?>                        