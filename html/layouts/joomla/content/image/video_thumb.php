<?php
/*
 * ------------------------------------------------------------------------
 * SMARI Template
 * ------------------------------------------------------------------------
 * Copyright (C) Buildal Systems. All Rights Reserved.
 * @license - Copyrighted Commercial Software
 * Author: Ziyal Amanya
 * Websites:  http://www.buildal.ug * This file may not be redistributed in whole or significant part.
 * ------------------------------------------------------------------------
 */

defined('_JEXEC') or die();

$item = $displayData;
$params = new JRegistry($item->attribs);
$thumbnail = $params->get('ctm_thumbnail');
$desc = $params->get('ctm_description');
$ctm_source = $params->get('ctm_source', 'youtube');

if (!$thumbnail) {
    $images = json_decode($item->images);
    $thumbnail = @$images->image_intro;
}

$data = [];
if (is_array($displayData) && isset($displayData['img-size'])) {
    $data['size'] = $displayData['img-size'];
}

if (!defined('TELINE_VIDEO_LIST_PLAY')) {
    define('TELINE_VIDEO_LIST_PLAY', 1);

    JHtml::_('jquery.framework');
    $doc = JFactory::getDocument();
    $script = "
  var JAVideoPlayer = {};
  (function($){
    $(document).ready(function(){
      JAVideoPlayer.playlist = function() {
        $('.ja-video-list').each(function(){
          var container = $(this);

          var btnPlay = container;
          if(container.find('.btn-play').length) {
            btnPlay = container.find('.btn-play');
          }
          btnPlay.click(function(){
            var width = container.outerWidth(true);
            var height = container.outerHeight(true);

            if(container.data('video')) {
              var mainPlayer = $('#ja-main-player');
              if(!mainPlayer.length) {
                video = container.find('.video-wrapper');
                clearContent = true;
              } else {
                video = mainPlayer;
                var width = video.width();
                var height = video.outerHeight();
                var clearContent = false;

                if(container.data('url') && typeof(window.history.pushState) == 'function') {
                  window.history.pushState('string', container.data('title'), container.data('url'));
                }
              }

              if(video.length) {
                $('#item-container .ja-video-list').removeClass('video-playing');
                container.addClass('video-playing');
                video.html(container.data('video'));
                video.find('iframe.ja-video, video').removeAttr('width').removeAttr('height');
                video.find('iframe.ja-video, video, .jp-video, .jp-jplayer').css({width: width, height: height});
                video.show();
                if(clearContent) {
                  container.data('video', '');
                }
                if(mainPlayer.length) {
                  setTimeout(function(){
                    $('.t4-content').animate({
                      scrollTop: 136
                    }, 1200);
                  }, 500);
                }
              }
            }
          });
        });
      }

      JAVideoPlayer.playlist();
    });
  })(jQuery);
  ";
    $doc->addScriptDeclaration($script);
}

if (isset($thumbnail) && !empty($thumbnail)) {
    $data['image'] = $thumbnail;
    $data['alt'] = $item->title;
    $data['caption'] = $desc;
}
?>
<?php if (isset($thumbnail) && !empty($thumbnail)): ?>
  <div class="item-image ja-video-list"
     data-url="<?php echo JRoute::_(
         ContentHelperRoute::getArticleRoute($item->id, $item->catid)
     ); ?>"
     data-title="<?php echo htmlspecialchars($item->title); ?>"
     data-video="<?php echo htmlspecialchars(
         JLayoutHelper::render('joomla.content.video_play_list', [
             'item' => $item,
             'context' => 'list',
         ])
     ); ?>">
    <span class="btn-play">
      <svg width="18" height="23" viewBox="0 0 18 23" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M17 11.5L1 1V22L17 11.5Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
      <span class="element-invisible">Play</span>
    </span>
    <span class="video-mask"></span>
    <?php echo JLayoutHelper::render(
        'joomla.content.image.image_thumb',
        $data
    ); ?>
    <div class="video-wrapper">
    </div>
  </div>
<?php endif; ?>
