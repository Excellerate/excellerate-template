<?php

    /**
     * Add Semantic UI and custom styles
     */

    // Set template
    $template = JUri::base() . 'templates/' . $this->template;

    // Template params
    $logo = strtolower($this->params->get('logo'));
    $logo_b = strtolower($this->params->get('logo_b'));
    $logo_c = strtolower($this->params->get('logo_c'));
    $slogan = $this->params->get('siteSlogan');
    $style = $this->params->get('style', 'white');

    // Gather Config
    $config = JFactory::getConfig();
    $config->set('logo', 'enforce'); // Set logo to use

    // Home page site name only
    $app = JFactory::getApplication();
    $menu = $app->getMenu();
    if ($menu->getActive() == $menu->getDefault()) {
        $this->setTitle($app->getCfg( 'sitename' ) );
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
    $newsFlash = $this->countModules('newsflash');
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
    $footerA = $this->countModules('footer_a');
    $footerB = $this->countModules('footer_b');
    $footerC = $this->countModules('footer_c');
    $footerD = $this->countModules('footer_d');
    $footerE = $this->countModules('footer_E');

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

        <!-- Icons -->
        <link rel="shortcut icon" href="<?= $template; ?>/assets/img/groupLogos/<?= $logo; ?>.ico" type="image/x-icon">
        <link rel="icon" href="<?= $template; ?>/assets/img/groupLogos/<?= $logo; ?>.ico" type="image/x-icon">

        <!-- Excellerate Font -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>

        <!-- Analytics -->
        <?php if( getenv('environment') == 'production' ) : ?>
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
            ga('create', 'UA-4886194-21', 'auto');
            ga('send', 'pageview');
        </script>
        <?php endif; ?>

    </head>

    <body>

        <!-- Mobile Menu -->
        <div class="ui sidebar inverted vertical menu">
            <a class="item">1</a>
            <a class="item">2</a>
            <a class="item">3</a>
        </div>

        <!-- Mobile Menu Push -->
        <div class="pusher">
            <div id="main" class="ui main container doubling grid">

                <!-- BY EXCELLERATE ROW -->
                <div id="byExcellerate" class="two column row">
                    <div class="left floated left aligned column">
                        <a href="http://excellerate.co.za"><img class="ui logo image" onerror="this.onerror=null; this.src='<?=$template;?>/assets/img/driven-by-excellerate.png'" src="<?=$template;?>/assets/img/driven-by-excellerate.svg" ></a>
                    </div>
                    <div class="right floated right aligned tablet only mobile only column">
                        <a id="mobileMenuTrigger"><i class="ui content icon"></i>Menu</a>
                    </div>
                </div>

                <!-- BRANDING ROW -->
                <div id="brand" class="two column <?= $style; ?> row">
                    <div class="left floated left aligned column">
                        <a href="<?=JURI::base();?>"><img class="ui image logo" alt="<?=$config->get('sitename');?> Logo" onerror="this.onerror=null; this.src='<?=$template;?>/assets/img/groupLogos/<?= $logo; ?>.png'" src="<?=$template;?>/assets/img/groupLogos/<?= $logo; ?>.svg"></a>
                        <?php if($logo_b) : ?>
                            <a href="<?=JURI::base();?>"><img class="ui image logo" alt="Logo" onerror="this.onerror=null; this.src='<?=$template;?>/assets/img/groupLogos/<?= $logo_b; ?>.png'" src="<?=$template;?>/assets/img/groupLogos/<?= $logo_b; ?>.svg"></a>
                        <?php endif; ?>
                        <?php if($logo_c) : ?>
                            <a href="<?=JURI::base();?>"><img class="ui image logo" alt="Logo" onerror="this.onerror=null; this.src='<?=$template;?>/assets/img/groupLogos/<?= $logo_c; ?>.png'" src="<?=$template;?>/assets/img/groupLogos/<?= $logo_c; ?>.svg"></a>
                        <?php endif; ?>
                    </div>
                    <div class="right floated right aligned column">
                        <span class="slogan"><?php print $slogan; ?></span>
                    </div>
                </div>

                <!-- SLIDER ROW -->
                <?php if($slider) : ?>
                <div id="slider" class="row">
                    <div class="column">
                        <jdoc:include type="modules" name="slider" />
                    </div>
                </div>
                <?php endif; ?>

                <!-- MENU ROW -->
                <div id="menu" class="computer only row">
                    <div class="column">
                        <jdoc:include type="modules" name="menu" />
                    </div>
                </div>

                <!-- NEWSFLASH ROW -->
                <?php if($newsFlash) : ?>
                <div id="newsFlash" class="row">
                    <div class="column">
                        <jdoc:include type="modules" name="newsflash" style="block" />
                    </div>
                </div>
                <?php endif; ?>

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
                        <p class="copyright">Copyright &copy; 2015 Enforce Security Services</p>
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
                    <a href="http://codechap.com">codeChap</a>
                </div>
            </div>

        </div>

        <jdoc:include type="modules" name="debug" style="none" />
        
    </body>

</html>