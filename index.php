<?php include JPATH_BASE . '/templates/excellerate/tmpl.php'; ?>

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
        <link rel="shortcut icon" href="<?= $template; ?>/assets/img/groupLogos/<?= $favicon; ?>.ico" type="image/x-icon">
        <link rel="icon" href="<?= $template; ?>/assets/img/groupLogos/<?= $favicon; ?>.ico" type="image/x-icon">

        <!-- Excellerate Font -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>

        <?php if( ($env == false or $env == 'production') and $analytics ) : ?>
        <!-- Analytics -->
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
            ga('create', '<?= $analytics; ?>', 'auto');
            ga('send', 'pageview');
        </script>
        <?php endif; ?>

        <?php //if( ($env == false or $env == 'production') and $addthis ) : ?>
        <!-- Go to www.addthis.com/dashboard to customize your tools -->
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=<?= $addthiscode; ?>"></script>
        <?php //endif; ?>

    </head>

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
            <div id="main" class="ui main container grid" style="padding-top:<?= $whiteSpace; ?>px;">
            
                <!-- BY EXCELLERATE ROW (No Subsites) -->
                <?php if( ! $subsites) : ?>
                <div id="byExcellerate" class="two column row">
                    <div class="left floated left aligned column">
                        <a href="http://epsgroup.co.za"><img class="ui logo image" onerror="this.onerror=null; this.src='<?=$template;?>/assets/img/<?=$groupLogo;?>.png'" src="<?=$template;?>/assets/img/<?=$groupLogo;?>.svg" ></a>
                        <?php if($number) : ?>
                            <a id="numberLeft" href="tel:<?= preg_replace("/[^0-9]/","",$number) ;?>"><?= $number; ?></a>
                        <?php endif; ?>
                    </div>
                    <?php if($number) : ?>
                    <div class="right floated right aligned column">
                        <a id="numberRight" href="tel:<?= preg_replace("/[^0-9]/","",$number) ;?>"><?= $number; ?></a>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>

                <!-- SUB SITES ROW -->
                <?php if($subsites) : ?>
                    <div id="byExcellerate" class="left floated left aligned eight wide column">
                        <img class="ui logo <?= isset($toTop) ? 'toTop' : null; ?> image" onerror="this.onerror=null; this.src='<?=$template;?>/assets/img/<?=$groupLogo;?>.png'" src="<?=$template;?>/assets/img/<?=$groupLogo;?>.svg" >
                    </div>
                    <div id="subsites" class="right floated right aligned eight wide computer only column">
                        <?php if( ! isset($hideDrivenBy)) : ?>
                        <div id="drivenLogoWrapper"> 
                            <a href="http://www.epsgroup.co.za/index.php"><img id="drivenLogo" onerror="this.onerror=null; this.src='/templates/excellerate/assets/img/driven-by-excellerate.png'" src="templates/excellerate/assets/img/driven-by-excellerate.svg"></a>
                        </div>
                        <?php endif; ?>
                        <jdoc:include type="modules" name="subsites" />
                    </div>
                    <?php if(IS_MOBILE) : ?>
                    <div id="subsites" class="sixteen wide mobile only column">
                        <jdoc:include type="modules" name="subsites" />
                    </div>
                    <?php endif; ?>
                <?php endif; ?>
                
                <!-- BRANDING ROW -->
                <?php if($branding) : ?>
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
                <?php if( ! IS_MOBILE) : ?>
                <div id="menu" class="row">
                    <div class="column">
                        <?php if( ! isset($hideDrivenBy)) : ?>
                        <nav>
                            <div class="ui stackable menu">
                                <jdoc:include type="modules" name="menu" />
                            </div>
                        </nav>
                        <?php else: ?>
                        <nav>
                            <div class="ui stackable menu">
                                <a class="ui item" href="<?= \JUri::base(); ?>">HOME</a>
                            </div>
                        </nav>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endif; ?>

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

                <!-- COPYRIGHT ROW -->
                <div id="copyright" class="grey two column row">
                    <div class="column">
                        <p class="copyright">Copyright &copy; 2016 <?= $company; ?></p>
                    </div>
                    <div class="right floated right aligned column">
                        <?php include("parts/social.php"); ?>
                    </div>
                </div>
            </div>

            <!-- FINISH ROW -->
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
    </body>
</html>