<!DOCTYPE html>
<meta charset="UTF-8">

<script>
    function getDocHeight(doc) {
    doc = doc || document;
    // stackoverflow.com/questions/1145850/
    var body = doc.body, html = doc.documentElement;
    var height = Math.max( body.scrollHeight, body.offsetHeight,
        html.clientHeight, html.scrollHeight, html.offsetHeight );
    return height;
}

    function setIframeHeight(id) {
    var ifrm = document.getElementById(id);
    var doc = ifrm.contentDocument? ifrm.contentDocument:
        ifrm.contentWindow.document;
    ifrm.style.visibility = 'hidden';
    ifrm.style.height = "10px"; // reset to minimal height ...
    // IE opt. for bing/msn needs a bit added or scrollbar appears
    ifrm.style.height = getDocHeight( doc ) + 4 + "px";
    ifrm.style.visibility = 'visible';
</script>


<html>

    <head>
        <title>Sonic Spring Fling</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <?php include(__DIR__ . '/headScripts.php'); ?>

    </head>

    <body>
        <div class="page-wrap">

            <!-- Include the Header -->
            <?php include(__DIR__ . '/header.php'); ?>

            <div class="mainContent">


                <div class="jumbo container-fluid">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                            <div class="videoWrapper">
                                <iframe
                                    src="http://player.twitch.tv/?channel=halfemptyenergytank"
                                    width="100%"
                                    height="auto"
                                    onload="setIframeHeight(this.id)"
                                    frameborder="0"
                                    scrolling="no"
                                    muted="true"
                                    allowfullscreen="true">
                                </iframe>
                            </div><!--end videoWrapperdiv -->
                        </div><!-- end col div -->

                        <div class="col-large-4 col-md-4 col-sm-12 col-xs-12 video-info">
                            <?php require(__DIR__ . '/getCurrentGame.php'); ?>
                            
                            <?php 
                            if($duringSSF == 0){
                                echo "<h1><center>The Sonic Spring Fling starts Friday, May 6th at 8pm ET!
                                <br><br>You're welcome to go ahead and donate if you'd like, or you could check out our clips from previous years!</center></h1>";
                            }
                            else{ 
                            ?>
                            
                            <h3><small>Current Game</small>
                            <br><?php echo $gameName; ?></h3>
                            <h3><small>Player</small>
                            <br><?php echo $playerName; ?></h3>
                            <h3><small>Twitch</small>
                            <br><?php echo "<a href='http://".$playerTwitch."'>".$playerTwitch."</a>"; ?></h3>
                            <h3><small>Links</small>
                            <br><?php echo "<a href='http://".$playerLink."'>".$playerLink."</a>"; ?></h3>
                            <br>
                            <br>
                            <h3><small>Next Game</small>
                            <br><?php echo $nextGame; ?>
                                <br><small><a href="/schedule.php">Full Schedule &gt;</a></small></h3>
                            <br>
                            <h3><a href="http://www.twitch.tv/halfemptyenergytank/chat" onclick="window.open('http://www.twitch.tv/halfemptyenergytank/chat', 'newwindow', 'width=400, height=700'); return false;">Click here for the pop-out chat!</a></h3>
                            
                            <?php } //end the else bracket ?>
                            
                        </div><!-- end col div -->
                    </div><!-- end row -->
                </div><!-- end container-fluid -->


                <div class="wwf container-fluid">
                    <div class="row media">

                                <div class="media-left media-middle">
                                    <a href="#">
                                    <img class="media-object hidden-xs hidden-sm" src="/img/wwf.png" alt="World Wildlife Fund">
                                    </a>
                                </div>
                                <div class="media-body media-middle">
                                    <center><img class="hidden-md hidden-lg" src="/img/wwf.png" alt="World Wildlife Fund"></center>
                                    <h2 class="media-heading"><b><a href="/donate.php">Donate Now to Support the World Wildlife Fund!</a></b></h2>
                                    <h3>For 50 years, WWF has been protecting the future of nature.
                                    <br>
                                    <br>
                                    The world’s leading conservation organization, WWF works in 100 countries and is supported by 1.2 million members in the United States and close to 5 million globally. WWF's unique way of working combines global reach with a foundation in science, involves action at every level from local to global, and ensures the delivery of innovative solutions that meet the needs of both people and nature.
                                    <br>
                                    <br>
                                    <a href="http://wwf.org">Check out more about the WWF at their site!</a></h3>
                                </div><!-- end media-body div -->
                    </div><!-- end row -->
                </div><!-- end container-fluid -->



                <?php require(__DIR__ . '/incentive.php'); ?>

            </div><!-- end maincontent div -->




            <!-- Include the Footer -->
            <?php include(__DIR__ . '/footer.php'); ?>

        </div> <!-- end page-wrap div -->


    </body>
</html>
