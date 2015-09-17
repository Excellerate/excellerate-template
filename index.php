<?php

    // Set ENV variable
    $env = getenv('ENV');

    // Set template
    $template = JUri::base() . 'templates/' . $this->template;

    // Template params
    $groupLogo = strtolower($this->params->get('group_logo', 'driven-by-excellerate'));
    $logoA = strtolower($this->params->get('logo_a'));
    $logoB = strtolower($this->params->get('logo_b'));
    $logoC = strtolower($this->params->get('logo_c'));
    $company = $this->params->get('company');
    $slogan = $this->params->get('siteSlogan');
    $number = $this->params->get('siteNumber');
    $style = $this->params->get('style', 'white');
    $branding = $this->params->get('branding', 'yes');
    $analytics = $this->params->get('analytics', false);

    // Set logo width and height
    if($logoA and $logoB and $logoC){
        $logoWidth = "width=151px";
    }
    else if ($logoA and $logoB){
        $logoWidth = "width=226px";
    }
    else{
        $logoWidth = false;
    }

    // Gather Config
    $config = JFactory::getConfig();
    $config->set('logo', 'enforce'); // Set logo to use

    // Home page site name only
    $app = JFactory::getApplication();
    $menu = $app->getMenu();
    $active = $menu->getActive();
    $showPageHeading = false;
    if ($active == $menu->getDefault()) {
        $this->setTitle($app->getCfg( 'sitename' ) );
    }
    if($active->params->get('show_page_heading')){
        $showPageHeading = '<h1 class="ui header">'.$active->params->get('page_heading', $active->title).'</h1>';
    }

    // Gather Menu
    $menu = JFactory::getApplication()->getMenu();
    $defaultPage = $menu->getActive() == $menu->getDefault() ? true : false; // Check default home page
    
    // Document style sheets and js
    $doc = JFactory::getDocument();
    $doc->addStyleSheet(JUri::base() . 'templates/' . $this->template . '/assets/css/semantic.min.css', $type = 'text/css');
    $doc->addStyleSheet(JUri::base() . 'templates/' . $this->template . '/assets/css/layout.css', $type = 'text/css');
    $doc->addStyleSheet(JUri::base() . 'templates/' . $this->template . '/assets/css/styles/'.$style.'.css', $type = 'text/css');
    $doc->addScript($this->baseurl . '/templates/' . $this->template . '/assets/js/jquery.min.js', 'text/javascript');
    $doc->addScript($this->baseurl . '/templates/' . $this->template . '/assets/js/semantic.min.js', 'text/javascript');
    $doc->addScript($this->baseurl . '/templates/' . $this->template . '/assets/js/actions.js', 'text/javascript');

    // Check modules
    $slider = $this->countModules('slider');
    $left = $this->countModules('left');
    $right = $this->countModules('right');
    $topLeft = $this->countModules('top_left');
    $bottomLeft = $this->countModules('bottom_left');
    $topRight = $this->countModules('top_right');
    $bottomRight = $this->countModules('bottom_right');
    $newsFlashA = $this->countModules('newsflash_a');
    $newsFlashB = $this->countModules('newsflash_b');
    $newsFlashC = $this->countModules('newsflash_c');
    $newsFlashD = $this->countModules('newsflash_d');
    $newsFlashE = $this->countModules('newsflash_e');
    $topA = $this->countModules('top_a');
    $topB = $this->countModules('top_b');
    $topC = $this->countModules('top_c');
    $topD = $this->countModules('top_d');
    $topE = $this->countModules('top_e');
    $bottomA = $this->countModules('bottom_a');
    $bottomB = $this->countModules('bottom_b');
    $bottomC = $this->countModules('bottom_c');
    $bottomD = $this->countModules('bottom_d');
    $bottomE = $this->countModules('bottom_e');
    $bottomF = $this->countModules('bottom_f');
    $bottomG = $this->countModules('bottom_g');
    $bottomH = $this->countModules('bottom_h');
    $bottomI = $this->countModules('bottom_i');
    $bottomJ = $this->countModules('bottom_j');
    $footerA = $this->countModules('footer_a');
    $footerB = $this->countModules('footer_b');
    $footerC = $this->countModules('footer_c');
    $footerD = $this->countModules('footer_d');
    $footerE = $this->countModules('footer_E');
    $splash = $this->countModules('splash');

?>

<!DOCTYPE html>
<html>
    <head>

        <!-- Standard Meta -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

        <!-- Joomla Head -->
        <jdoc:include type="head" />

        <!--[if IE]>
        <link rel="stylesheet" type="text/css" href="<?= $template; ?>/assets/css/ie.css" />
        <![endif]-->

        <!-- Icons -->
        <link rel="shortcut icon" href="<?= $template; ?>/assets/img/groupLogos/<?= $logoA; ?>.ico" type="image/x-icon">
        <link rel="icon" href="<?= $template; ?>/assets/img/groupLogos/<?= $logoA; ?>.ico" type="image/x-icon">

        <!-- Excellerate Font -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>

        <!-- Analytics -->
        <?php if( ($env == false or $env == 'production') and $analytics ) : ?>
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
            ga('create', '<?= $analytics; ?>', 'auto');
            ga('send', 'pageview');
        </script>
        <?php endif; ?>
        <!--End Analytics -->

    </head>

    <body>

        <!-- Mobile Menu -->
        <div class="ui sidebar">
             <jdoc:include type="modules" name="menu" />
        </div>

        <!-- Mobile Menu Push -->
        <div class="pusher">
            <div id="main" class="ui main container doubling grid">

                <!-- BY EXCELLERATE ROW -->
                <div id="byExcellerate" class="two column row">
                    <div class="left floated left aligned column">
                        <a href="http://epsgroup.co.za"><img class="ui logo image" onerror="this.onerror=null; this.src='<?=$template;?>/assets/img/<?=$groupLogo;?>.png'" src="<?=$template;?>/assets/img/<?=$groupLogo;?>.svg" ></a>
                        <?php if($number) : ?>
                            <a id="numberLeft" href="tel:<?= preg_replace("/[^0-9]/","",$number) ;?>"><?= $number; ?></a>
                        <?php endif; ?>
                    </div>
                    <div class="right floated right aligned column">
                        <a id="mobileMenuTrigger"><i class="ui content icon"></i>Menu</a>
                        <?php if($number) : ?>
                            <a id="numberRight" href="tel:<?= preg_replace("/[^0-9]/","",$number) ;?>"><?= $number; ?></a>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- BRANDING ROW -->
                <?php if($branding == 'yes') : ?>
                <div id="brand" class="two column <?= $style; ?> row">
                    <div class="left floated left aligned column">
                        <a href="<?=JURI::base();?>"><img <?= $logoWidth; ?> class="ui image logo" alt="<?=$config->get('sitename');?> Logo" onerror="this.onerror=null; this.src='<?=$template;?>/assets/img/groupLogos/<?= $logoA; ?>.png'" src="<?=$template;?>/assets/img/groupLogos/<?= $logoA; ?>.svg"></a>
                        <?php if($logoB) : ?>
                            <a href="<?=JURI::base();?>"><img <?= $logoWidth; ?> class="ui image logo" alt="Logo" onerror="this.onerror=null; this.src='<?=$template;?>/assets/img/groupLogos/<?= $logoB; ?>.png'" src="<?=$template;?>/assets/img/groupLogos/<?= $logoB; ?>.svg"></a>
                        <?php endif; ?>
                        <?php if($logoC) : ?>
                            <a href="<?=JURI::base();?>"><img <?= $logoWidth; ?> class="ui image logo" alt="Logo" onerror="this.onerror=null; this.src='<?=$template;?>/assets/img/groupLogos/<?= $logoC; ?>.png'" src="<?=$template;?>/assets/img/groupLogos/<?= $logoC; ?>.svg"></a>
                        <?php endif; ?>
                    </div>
                    <div class="right floated right aligned column">
                        <span class="slogan"><?php print $slogan; ?></span>
                    </div>
                </div>
                <?php endif; ?>

                <!-- SLIDER ROW -->
                <?php if($slider) : ?>
                <div id="slider" class="two column <?= $style; ?> row">
                    <div class="<?= $splash ? "twelve" : "sixteen" ;?> wide column">
                        <jdoc:include type="modules" name="slider" />
                    </div>
                    <?php if($splash) : ?>
                    <div class="four wide column">
                        <div id="splashWrapper">
                        <jdoc:include type="modules" name="splash" />
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>

                <!-- MENU ROW -->
                <div id="menu" class="computer only row">
                    <div class="column">
                        <jdoc:include type="modules" name="menu" />
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
                <div id="footer" class="light row">
                    <div class="column">
                        <?php include("parts/footer.php"); ?>
                    </div>
                </div>
                <?php endif; ?>

                <!-- FOOTER ROW -->
                <div id="copyright" class="grey two column row">
                    <div class="column">
                        <p class="copyright">Copyright &copy; 2015 <?= $company; ?></p>
                    </div>
                    <div class="right floated right aligned column">
                        <?php include("parts/social.php"); ?>
                    </div>
                </div>
            </div>

            <!-- FINISH ROW -->
            <div id="end" class="ui two column container grid">
                <div class="left floated left aligned column">
                    <a class="login" href="<?= JUri::base(); ?>administrator/index.php">Admin Login</a>
                </div>
                <div class="right floated right aligned column">
                    <a href="http://codechap.com">codechap</a> <?= $env ? ' | ' . ucFirst($env) . ' Server' : null; ?>
                </div>
            </div>

        </div>

        <jdoc:include type="modules" name="debug" style="none" />
        
    </body>

</html>