<?php
/**
 * @file
 * Returns the HTML for a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728148
 */
?>

<!-- cornell banner -->
<section id="CU-banner">
  <div class="container">
    <div class="row">   
      <div class="col-md-4 col-sm-6">
          <a href="http://www.cornell.edu" title="CU signature"><img class="cu-signature" src="/sites/all/themes/lee_lib/images/cu-signature.png" width="77" height="75" alt="CU signature"></a>
          <a href="http://www.cornell.edu" title="Cornell University website"><img class="cu-cornell-university" src="/sites/all/themes/lee_lib/images/cu-cornell-university.png" width="174" height="39" alt="Cornell University"></a>
          <a href="http://www.library.cornell.edu/" title="Cornell University Library website"><img class="cu-library" src="/sites/all/themes/lee_lib/images/cu-library.png" width="174" height="37" alt="Library"></a>
        </div>

        <div class="col-md-4 col-md-offset-4 col-sm-6 hidden-xs">
          <ul class="unstyled">
            <li><a class="cu-search" href="http://www.cornell.edu/search/" target="_blank" title="Search Cornell's website">Search Cornell</a></li>
            <li><a class="cul-search" href="http://www.library.cornell.edu/" target="_blank" title="Search Cornell University Library website">Search Library</a></li>
          </ul>
      </div>
    </div>
  </div>
</section>

<div class="container" id="page">

  <!-- banner/site title -->
  <header class="header" id="header" role="banner">

    <?php if ($logo): ?>
      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="header__logo" id="logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" class="header__logo-image" /></a>
    <?php endif; ?>

    <?php if ($site_name || $site_slogan): ?>
      <div class="header__name-and-slogan" id="name-and-slogan">
        <?php if ($site_name): ?>
          <h1 class="header__site-name" id="site-name">
            <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" class="header__site-link" rel="home"><span><?php print $site_name; ?></span></a>
          </h1>
        <?php endif; ?>

        <?php if ($site_slogan): ?>
          <div class="header__site-slogan" id="site-slogan"><?php print $site_slogan; ?></div>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <?php if ($secondary_menu): ?>
      <nav class="header__secondary-menu" id="secondary-menu" role="navigation">
        <?php print theme('links__system_secondary_menu', array(
          'links' => $secondary_menu,
          'attributes' => array(
            'class' => array('links', 'inline', 'clearfix'),
          ),
          'heading' => array(
            'text' => $secondary_menu_heading,
            'level' => 'h2',
            'class' => array('element-invisible'),
          ),
        )); ?>
      </nav>
    <?php endif; ?>

    <?php print render($page['header']); ?>

  </header>

  <!-- navigation -->
  <div id="header-navbar" class="navbar navbar-inverse" role="navigation">
    <div class="container">

      <div class="navbar-header">
        <button class="navbar-toggle" data-toggle="collapse" data-target="#main-menu" type="button">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>

      <div id="main-menu" class="collapse navbar-collapse">

          <?php if ($main_menu): ?>
            <nav id="main-menu" role="navigation" tabindex="-1">
              <?php
              // This code snippet is hard to modify. We recommend turning off the
              // "Main menu" on your sub-theme's settings form, deleting this PHP
              // code block, and, instead, using the "Menu block" module.
              // @see https://drupal.org/project/menu_block
              print theme('links__system_main_menu', array(
                'links' => $main_menu,
                'attributes' => array(
                  'class' => array('links', 'inline', 'clearfix'),
                ),
                'heading' => array(
                  'text' => t('Main menu'),
                  'level' => 'h2',
                  'class' => array('element-invisible'),
                ),
              )); ?>
            </nav>
          <?php endif; ?>

          <?php print render($page['navigation']); ?>

      </div> <!--/.navbar-collapse -->

    </div><!-- /.container -->
  </div><!-- /.navbar -->

  <!-- page content -->
  <div id="main">

    <div id="content" class="column" role="main">
      <?php print render($page['highlighted']); ?>
      <?php print $breadcrumb; ?>
      <a id="main-content"></a>
      <?php print render($title_prefix); ?>
      <?php if ($title): ?>
        <h1 class="page__title title" id="page-title"><?php print $title; ?></h1>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
      <?php print $messages; ?>
      <?php print render($tabs); ?>
      <?php print render($page['help']); ?>
      <?php if ($action_links): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
      <?php print render($page['content']); ?>
      <?php print $feed_icons; ?>
    </div>


    <?php
      // Render the sidebars to see if there's anything in them.
      $sidebar_first  = render($page['sidebar_first']);
      $sidebar_second = render($page['sidebar_second']);
    ?>

    <?php if ($sidebar_first || $sidebar_second): ?>
      <aside class="sidebars">
        <?php print $sidebar_first; ?>
        <?php print $sidebar_second; ?>
      </aside>
    <?php endif; ?>

  </div>

  <!-- footer -->
  <?php print render($page['footer']); ?>

</div>

<?php print render($page['bottom']); ?>
