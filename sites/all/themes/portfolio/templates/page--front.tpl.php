<?php
/**
 * @file
 * Returns the HTML for a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728148
 */
?>

<div id="page">

  <header class="header" id="header" role="banner">
    <?php if (!$logo): ?>
      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="header__logo" id="logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" class="header__logo-image"></a>
    <?php endif; ?>
    <nav class="navbar navbar-main" role="navigation">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/"><img src="/sites/all/themes/portfolio/logo.png" alt="Logo"><span id="logo-text">Mason Henry<br><em>Front-End Developer</em></span></a>
        </div>
        <div class="collapse navbar-collapse" id="main-nav">
          <?php print render($page['nav']); ?>
        </div>
      </div>
    </nav>
    <div id="intro">
      <div class="container">
        <p class="bio">Hello, my name is Mason Henry. I'm a Twin Cities-based web developer working at <a href="http://www.ainsleyshea.com/" target="_blank">Ainsley Shea</a>. Feel free to check out my portfolio. If you want to get in touch you can <a href="mailto:hello@masonhenry.com">[email me here]</a>.</p>
      </div>
    </div>
    <?php // print render($page['header']); ?>
  </header>

  <div id="main">

    <div id="content" class="container" role="main">
      <div class="hidden"><?php print render($page['content']); ?></div>
      <?php print $breadcrumb; ?>
      <?php if ($title): ?>
        <h1 class="page__title title" id="page-title"><?php print $title; ?></h1>
      <?php endif; ?>
      <?php print $messages; ?>
      <?php print render($tabs); ?>
      <div id="my-work">
        <?php print render($page['home_content']); ?>
        <div id="more-work"><a href="/work" class="flat-button gray">View More <span class="glyphicon glyphicon-chevron-right"></span></a></div>
      </div>
      
    </div>

  </div>

  <?php print render($page['footer']); ?>

</div>
