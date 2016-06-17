<?php

  // Set ENV variable
  $env = getenv('ENV');

  // Find php version
  $phpver = substr(filter_var(PHP_VERSION, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION), 0, 3);

  // Mobile detection class from Piwik
  $dd = new \DeviceDetector\DeviceDetector($_SERVER['HTTP_USER_AGENT']);
  $dd->discardBotInformation();
  $dd->parse();
  define('IS_MOBILE', $dd->isMobile());

  // Jquery please
  //JHtml::_('jquery.framework');

  // Set template
  $template = JUri::base() . 'templates/' . $this->template;

  // Template params
  $groupLogo = strtolower($this->params->get('group_logo', 'driven-by-excellerate'));
  $logoA = strtolower($this->params->get('logo_a'));
  $logoB = strtolower($this->params->get('logo_b'));
  $logoC = strtolower($this->params->get('logo_c'));
  $favicon = strtolower($this->params->get('favicon', 'default'));
  $company = $this->params->get('company');
  $slogan = $this->params->get('siteSlogan');
  $number = (IS_MOBILE == false and $this->params->get('siteNumber')) ? $this->params->get('siteNumber') : false;
  $style = $this->params->get('style', 'white');
  $branding = $this->params->get('branding') == 'yes' ? true : false;
  $subsites = $this->params->get('subsites') == 'yes' ? true : false;
  $analytics = $this->params->get('analytics', false);
  
  if( ! IS_MOBILE and $branding == false){
    if($subsites){
      $whiteSpace = 30;
    }
    else{
      $whiteSpace = 100;
    }
  }
  else{
    $whiteSpace = 0;
  }

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
  $config->set('logo', false); // Set logo to use

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
  if($pageClass = $active->params->get('pageclass_sfx', false)){
     $style = $pageClass; // Menu page overide
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
  $splash = ($this->countModules('splash') and IS_MOBILE == false) ? true : false;

  // Work subsites row
  if($subsites){
    $toTop = false;
    switch(strtolower($active->title)){
      case 'excellerate facility management' :        $hideDrivenBy = true; $groupLogo = 'groupLogos/excellerate-facility-management'; break;
      case 'excellerate brand management' :           $hideDrivenBy = true; $groupLogo = 'groupLogos/excellerate-brand-management'; break;
      case 'excellerate utilities management' :       $hideDrivenBy = true; $groupLogo = 'groupLogos/excellerate-utilities-management'; break;
      case 'jhi' :                                    $hideDrivenBy = true; $groupLogo = 'groupLogos/jhi'; $toTop = true; break;
      case 'jhi retail' :                             $hideDrivenBy = true; $groupLogo = 'groupLogos/jhi-retail'; $toTop = true; break;
      case 'jhi advisory' :                           $hideDrivenBy = true; $groupLogo = 'groupLogos/jhi-advisory'; $toTop = true; break;
      case 'jhi cres' :                               $hideDrivenBy = true; $groupLogo = 'groupLogos/jhi-cres'; $toTop = true; break;
      case 'enforce security' :                       $hideDrivenBy = true; $groupLogo = 'groupLogos/enforce-dark'; break;
      case 'interpark' :                              $hideDrivenBy = true; $groupLogo = 'groupLogos/interpark'; break;
      case 'spark' :                                  $hideDrivenBy = true; $groupLogo = 'groupLogos/spark'; break;
      case 'sterikleen' :                             $hideDrivenBy = true; $groupLogo = 'groupLogos/sterikleen'; break;
      case 'eradico' :                                $hideDrivenBy = true; $groupLogo = 'groupLogos/eradico'; break;
      case 'katanga' :                                $hideDrivenBy = true; $groupLogo = 'groupLogos/katanga'; break;
      case 'chattels' :                               $hideDrivenBy = true; $groupLogo = 'excellerate'; break; // No logo as yet
      case 'fresh' :                                  $hideDrivenBy = true; $groupLogo = 'groupLogos/fresh'; break;
      case 'first technical' :                        $hideDrivenBy = true; $groupLogo = 'groupLogos/first'; break;
    }
  }
?>