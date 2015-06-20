<?php
/**
 * @file
 * Returns the HTML for a node.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728164
 */
?>
<article class="node-<?php print $node->nid; ?> <?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <?php if ($display_submitted || $unpublished || !$page && $title): ?>
    <header>
      <?php if ($display_submitted): ?>
        <p class="submitted">
          <?php print $user_picture; ?>
          <?php print $submitted; ?>
        </p>
      <?php endif; ?>

      <?php if ($unpublished): ?>
        <mark class="unpublished"><?php print t('Unpublished'); ?></mark>
      <?php endif; ?>
    </header>
  <?php endif; ?>
  <?php if ($page) { ?>
  <?php
    // We hide the comments and links now so that we can render them later.
    hide($content['comments']);
    hide($content['links']);
  ?>
  <?php if ($title && isset($content['field_employer'])): ?>
    <div class="row">
      <div class="col-sm-10 col-xs-10">
        <h1 class="page__title title" id="page-title"><?php print $title; ?></h1>
      </div>
      <div class="col-sm-2 col-xs-2 built-at">
        <?php if ($node->field_employer[$language]['0']['value'] === "Ainsley Shea") { ?>
          <a href="http://www.ainsleyshea.com" target="_blank" title="Built at Ainsley Shea"><img src="/sites/all/themes/portfolio/images/as_logo.png" alt="Ainsley Shea Logo"></a>
        <?php } elseif ( $node->field_employer[$language]['0']['value'] === "Freelance" ) { ?>
          <em>Freelance</em>
        <?php } ?>
      </div>
    </div>
  <?php else: ?>
    <h1 class="page__title title" id="page-title"><?php print $title; ?></h1>
  <?php endif; ?>
  <div class="row">
    <div class="col-sm-3 desktop-right">
      <div id="work-sidebar">
        <?php
          //print render($content['field_live_link']);
          //print render($content['field_employer']);
        ?>
        <div class="live-link"><a href="<?php print render($node->field_live_link['und'][0]['url']); ?>" target="_blank" class="flat-button">View Live <span class="glyphicon glyphicon-share-alt"></span></a></div>
        <div class="hidden-xs">
          <h3><em>Skills Used</em></h3>
          <?php
            print render($content['field_skills_used']);
          ?>
          <h3><em>Related Projects</em></h3>
          <?php
            $block = module_invoke('views', 'block_view', 'similarterms-block');
            print render($block['content']);
            $nextblock = module_invoke('nodequeue_pager', 'block_view', '1');
          ?>
          <div id="node-pager" class="node-pager">
            <?php print render($nextblock['content']); ?>
          </div>
        </div>
      </div>
    </div>
    <div id="screenshots" class="col-sm-9 desktop-right">
      <?php
        print render($content['field_desktop_screenshots']);
      ?>
      <?php if (count($node->field_tablet_mobile_screenshots)) { ?>
        <div class="row">
          <?php
            $imgcount = count($node->field_tablet_mobile_screenshots['und']);
            for ($i = 0; $i < $imgcount; $i++) {
              $image_uri = $node->field_tablet_mobile_screenshots['und'][$i]['uri'];
          ?>
          <div class="col-sm-6 mobile-image"><img src="<?php print file_create_url($node->field_tablet_mobile_screenshots['und'][$i]['uri']); ?>" alt="mobile screenshot" class="img-responsive"></div>
          <?php } ?>
        </div>
      <?php } ?>
      <div class="visible-xs">
        <div class="node-pager">
          <?php print render($nextblock['content']); ?>
        </div>
        <h3><em>Skills Used</em></h3>
        <?php
          print render($content['field_skills_used']);
        ?>
        <h3><em>Related Projects</em></h3>
        <?php
          $block = module_invoke('views', 'block_view', 'similarterms-block');
          print render($block['content']);
          $nextblock = module_invoke('nodequeue_pager', 'block_view', '1');
        ?>
      </div>
    </div>
  </div>
  <?php } ?>
  <?php print render($content['links']); ?>

  <?php print render($content['comments']); ?>

</article>
