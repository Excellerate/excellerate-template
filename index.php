<?php include JPATH_BASE . '/templates/excellerate/tmpl.php'; ?>
<!DOCTYPE html>
<html>
  <head>

    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Excellerate Font -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>

    <!-- Joomla Head -->
    <jdoc:include type="head" />

    <!--[if IE]>
    <link rel="stylesheet" type="text/css" href="<?= $template; ?>/assets/css/ie.css" />
    <![endif]-->

    <!-- Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="/templates/excellerate/assets/icons/apple-touch-icon.png?v=1">
    <link rel="icon" type="image/png" sizes="32x32" href="/templates/excellerate/assets/icons/favicon-32x32.png?v=1">
    <link rel="icon" type="image/png" sizes="16x16" href="/templates/excellerate/assets/icons/favicon-16x16.png?v=1">
    <link rel="manifest" href="/templates/excellerate/assets/icons/manifest.json">
    <link rel="mask-icon" href="/templates/excellerate/assets/icons/safari-pinned-tab.svg?v=1" color="#5bbad5">
    <link rel="icon" type="image/x-icon" href="/templates/excellerate/assets/icons/favicon.ico?v=1" >

    <meta name="theme-color" content="#ffffff">
  </head>

    <style>
    <?php include('templates/' . $this->template . '/assets/css/styles/'.$style.'.css'); ?>
    </style>

  <body>

    <!-- Mobile Menu -->
    <?php if(IS_MOBILE) : ?>
    <div id="sidebar" class="ui sidebar inverted vertical menu">
        <jdoc:include type="modules" name="menu" />
      </div>
    </div>
    <?php endif; ?>

    <!-- Mobile Menu Push -->
    <div class="pusher">

      <!-- CONTENT -->
      <div id="main" class="ui main container stackable grid">
        <div id="epsLogo" class="two column row">
          <?php if( ! $logoOveride) : ?>
          <div class="left floated left aligned computer only column">
            <a href="<?= MOTHERSHIP; ?>"><img class="ui image" src="/templates/excellerate/assets/img/epsLogo.svg"></a>
          </div>
          <div class="left floated left aligned mobile tablet only column">
            <a href="<?= MOTHERSHIP; ?>"><img class="ui small image" src="/templates/excellerate/assets/img/epsLogo.svg"></a>
          </div>
          <?php else : ?>
          <div class="left floated left aligned computer only column">
            <a href="#"><img class="ui image" src="/templates/excellerate/assets/img/groupLogos/<?= $logoOveride; ?>.svg"></a>
          </div>
          <div class="left floated left aligned mobile tablet only column">
            <a href="#"><img class="ui small image" src="/templates/excellerate/assets/img/groupLogos/<?= $logoOveride; ?>.svg"></a>
          </div>
          <?php endif; ?>
          
          <?php if($subsites) : ?>
          <div id="subsitesWrapper" class="right floated right aligned wide column">
            <table id="subsites" class="ui very basic compact unstackable table">
              <?php include("parts/subsites.php"); ?>
            </table>
          </div>
          <div class="right floated right aligned column ">
            <table id="portraitSubsites" class="ui very basic compact table">
              <?php include("parts/subsites.php"); ?>
            </table>
          </div>
          <?php else: ?>
          <div class="right floated right aligned column">
            <a id="numberRight" href="tel:<?= $number; ?>"><?= $number; ?></a>
          </div>
          <?php endif; ?>
        </div>

        <!-- BRANDING ROW -->
        <?php if($branding) : ?>
        <div id="brand" class="two column <?= $style; ?> row">
          <div class="left floated left aligned column">
            <a href="<?= JUri::base(); ?>"><h1 class="ui header">
              <?= $company; ?>
            </h1></a>
          </div>
          <div class="right floated right aligned five wide column">
            <span class="slogan"><?= $slogan; ?></span>
          </div>
        </div>
        <?php endif; ?>

        <!-- SLIDER ROW -->
        <?php if($slider) : ?>
        <div id="slider" class="row">
          <div class="ten wide column">
            <jdoc:include type="modules" name="slider" />
          </div>
          <div class="three wide logos column">
            <img src="/templates/excellerate/assets/img/vitalSkills.png" style="border:1px solid #ccc;">
          </div>
         <div class="three wide logos column">
            <img src="/templates/excellerate/assets/img/beeLevel2.png" style="border:1px solid #ccc;">
          </div>
        </div>
        <?php endif; ?>

        <!-- MENU ROW -->
        <div id="menu" class="computer only row">
          <div class="column">
            <nav>
              <div class="ui stackable menu">
                <jdoc:include type="modules" name="menu" />
              </div>
            </nav>
          </div>
        </div>

        <!-- NEWSFLASH ROW -->
        <?php if($newsFlashA or $newsFlashB or $newsFlashC or $newsFlashD or $newsFlashE) : ?>
        <div id="newsFlash" class="row">
          <div class="column">
            <?php include("parts/newsflash.php"); ?>
          </div>
        </div>
        <?php endif; ?>

        <?= $showPageHeading; ?>

        <!-- ABOVE CONTENT ROW -->
        <?php if($topA or $topB or $topC or $topD) : ?>
        <div id="top" class="row">
          <div class="column">
            <?php include("parts/top.php"); ?>
          </div>
        </div>
        <?php endif; ?>

        <!-- CONTENT ROW -->
        <div id="content" class="row">
          <div class="column">
            <?php include("parts/content.php"); ?>
          </div>
        </div>

        <!-- CARDS ROW -->
        <?php if($cardA or $cardB or $cardC or $cardD or $cardE or $cardF) : ?>
        <div id="cards" class="row">
          <div class="ui column">
            <?php include("parts/cards.php"); ?>
          </div>
        </div>
        <?php endif; ?>

        <!-- BELOW CONTENT ROW -->
        <?php if($bottomA or $bottomB or $bottomC or $bottomD) : ?>
        <div id="bottom" class="row">
          <div class="column">
            <?php include("parts/bottom.php"); ?>
          </div>
        </div>
        <?php endif; ?>

        <!-- FOOTER ROW -->
        <?php if($footerA or $footerB or $footerC or $footerD) : ?>
        <div id="footer" class="dark row">
          <div class="column">
            <?php include("parts/footer.php"); ?>
          </div>
        </div>
        <?php endif; ?>

        <!-- COPYRIGHT ROW -->
        <div id="copyright" class="very dark two column row">
          <div class="column">
            <p class="copyright">Copyright &copy; <?php echo date("Y"); ?> <a target="_blank" href="<?= MOTHERSHIP; ?>">Excellerate Services</a></p>
          </div>
          <div class="right floated right aligned column">
            <?php include("parts/social.php"); ?>
          </div>
        </div>
      </div>

        <!-- AFFILIATIONS ROW -->
        <div id="affiliations" class="ui center aligned container grid">
          <div class="ui column">
            <div class="ui centered seven cards">
              <div class="card"><img class="ui centered tiny image" src="/images/affiliations/protea-coin.png" /></div>
              <div class="card"><img class="ui centered tiny image" src="/images/affiliations/irc.png" /></div>
              <div class="card"><img class="ui centered tiny image" src="/images/affiliations/hollywood-bets-net.png" /></div>
              <div class="card"><img class="ui centered tiny image" src="/images/affiliations/sodexo.svg" /></div>
              <div class="card"><img class="ui centered tiny image" src="/images/affiliations/eoh.svg" /></div>
              <div class="card"><img class="ui centered tiny image" src="/images/affiliations/blackrock.png" /></div>
              <div class="card"><img class="ui centered tiny image" src="/images/affiliations/fidelity.png" /></div>
              <div class="card"><img class="ui centered tiny image" src="/images/affiliations/excellerate.svg" /></div>
              <div class="card"><img class="ui centered tiny image" src="/images/affiliations/child-welfare.png" /></div>
              <div class="card"><img class="ui centered tiny image" src="/images/affiliations/toyota.svg" /></div>
              <div class="card"><img class="ui centered tiny image" src="/images/affiliations/cartrack.svg" /></div>
              <div class="card"><img class="ui centered tiny image" src="/images/affiliations/sabt.png" /></div>
              <div class="card"><img class="ui centered tiny image" src="/images/affiliations/vital-consulting.png" /></div>
              <div class="card"><img class="ui centered tiny image" src="/images/affiliations/nashua.svg" /></div>
              <div class="card"><img class="ui centered tiny image" src="/images/affiliations/bosasa.png" /></div>
              <div class="card"><img class="ui centered tiny image" src="/images/affiliations/adt.svg" /></div>
              <div class="card"><img class="ui centered tiny image" src="/images/affiliations/smit.png" /></div>
            </div>
          </div>
        </div>

      <!-- CREDITS ROW -->
      <div id="end" class="ui two column container grid">
        <div class="left floated left aligned five wide column">
          <a class="login" href="<?= JUri::base(); ?>administrator/index.php">Admin Login</a>
        </div>
        <div class="right floated right aligned eleven wide column">
          <a href="http://codechap.com">CodeChap</a> | <?= 'PHP '.$phpver;?> <?= $env ? ' | ' . ucFirst($env) . ' Server' : null; ?>
        </div>
      </div>

      <br>

      <?php if(IS_MOBILE) : ?>
      <div id="sidebarButton" class="ui black icon button"><i class="ui bars icon"></i></div>
      <?php endif; ?>

    </div>

    <jdoc:include type="modules" name="debug" style="none" />

    <script>

      // Analytics
      <?php if( ($env == false or $env == 'production') and $analytics ) : ?>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      ga('create', '<?= $analytics; ?>', 'auto');
      ga('send', 'pageview');
      <?php endif; ?>

      // Actions
      jQuery(document).ready(function(){

        // Activate mobile menu
        jQuery('#sidebar').sidebar({dimPage:false});
        jQuery("#sidebarButton").click(function(){
        jQuery('#sidebar').sidebar('toggle');  
        });

        // Accordian
        jQuery('.ui.accordion').accordion();

        // Video
        jQuery('.ui.embed').embed();
      });
    </script>

    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <?php if( ($env == false or $env == 'production') and $addthiscode ) : ?>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=<?= $addthiscode; ?>"></script>
    <?php endif; ?>

  </body>
</html>