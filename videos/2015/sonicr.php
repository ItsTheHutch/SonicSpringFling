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
        
        <?php include($_SERVER['DOCUMENT_ROOT'].'/headScripts.php'); ?>

    </head>

    <body>
        <div class="page-wrap">

            <!-- Include the Header -->
            <?php include($_SERVER['DOCUMENT_ROOT'].'/header.php'); ?>

            <div class="mainContent">
            
                <div class="ssf2015 container-fluid">
                    <div class="row">
                        <div class="col-large-12 col-md-12 col-sm-12 col-xs-12 video-page-header">
                            <h1><a href="/videos/2015/videos2015.php">Sonic Spring Fling 2015</a></h1>
                        </div><!-- end wwf div -->
                    </div><!-- end row -->
                </div><!-- end container-fluid -->


                <div class="jumbo container-fluid">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                            <div class="videoWrapper">
                                <iframe
                                    src="http://player.twitch.tv/?video=v44292152"
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
                            <h3>
                            <br>Sonic R</h3>
                            <h3><small>Player</small>
                            <br>Bryan Belcher</h3>
                            <h3><small>Twitch</small>
                                <br><a href="http://twitch.tv/halfemptyenergytank">twitch.tv/HalfEmptyEnergyTank</a></h3>
                            <h3><small>Links</small>
                                <br><a href="http://halfemptyenergytank.com/">Half Empty Energy Tank</a></h3>
                            <br>
                            <h4>So Bryan's pretty good at Sonic R.  How good?  You'll have to watch to find out!  CAN YOU FEEL THE SUNSHINE?</h4>    
                        </div><!-- end col div -->
                    </div><!-- end row -->
                </div><!-- end container-fluid -->




                

            </div><!-- end maincontent div -->




            <!-- Include the Footer -->
            <?php include($_SERVER['DOCUMENT_ROOT'].'/footer.php'); ?>

        </div> <!-- end page-wrap div -->


    </body>
</html>
