/**
 * ------------------------------------------------------------------------
 * JA Magz_ii template
 * ------------------------------------------------------------------------
 * Copyright (C) 2004-2011 J.O.O.M Solutions Co., Ltd. All Rights Reserved.
 * @license - Copyrighted Commercial Software
 * Author: Ziyal Amanya
 * Websites:  http://www.buildal.ug * This file may not be redistributed in whole or significant part.
 * ------------------------------------------------------------------------
 */

// Pagination using infinitive-scroll. Support 2 mode, manual & auto

;(function ($) {
  $(document).ready(function () {
    var $container = $('.blog #item-container'),
      nextbtn = $('#infinity-next')
    if (!$container.length || !nextbtn.length || !nextbtn.data('mode')) return

    // hide default joomla pagination
    $('div.pagination').hide()
    // show next button
    if (nextbtn.data('mode') == 'manual') nextbtn.show().removeClass('hide')

    $container.infinitescroll(
      {
        navSelector: 'ul.pagination', // selector for the paged navigation
        nextSelector: 'ul.pagination > li:last > a', // selector for the NEXT link (to page 2)
        itemSelector: '.item-article', // selector for all items you'll retrieve
        loading: {
          finished: function () {
            $('#infscr-loading').remove()
            nextbtn.removeClass('loading')
            var instance = $(this).data('infinitescroll')
            if (
              instance &&
              instance.options.state.currPage >= instance.options.maxPage
            ) {
              nextbtn
                .removeClass('hide')
                .addClass('disabled')
                .html(nextbtn.data('finishedmsg'))
              $container.infinitescroll('destroy')
            }
          },
          finishedMsg: nextbtn.data('finishedmsg'),
          msgText: '',
          speed: 'fast',
          start: function (opts) {
            nextbtn.addClass('loading')
            var instance = $(this).data('infinitescroll')
            if (!instance) return
            instance.beginAjax(opts)
            setTimeout(function () {
              var videoPlay = function () {
                $('.ja-video-list').each(function () {
                  var container = $(this)

                  var btnPlay = container
                  if (container.find('.btn-play').length) {
                    btnPlay = container.find('.btn-play')
                  }
                  btnPlay.click(function () {
                    var width = container.outerWidth(true)
                    var height = container.outerHeight(true)

                    if (container.data('video')) {
                      var mainPlayer = $('#ja-main-player')
                      if (!mainPlayer.length) {
                        video = container.find('.video-wrapper')
                        clearContent = true
                      } else {
                        video = mainPlayer
                        var width = video.width()
                        var height = video.outerHeight()
                        var clearContent = false

                        if (
                          container.data('url') &&
                          typeof window.history.pushState == 'function'
                        ) {
                          window.history.pushState(
                            'string',
                            container.data('title'),
                            container.data('url'),
                          )
                        }
                      }

                      if (video.length) {
                        $('.ja-video-list').removeClass('video-playing')
                        container.addClass('video-playing')
                        video.html(container.data('video'))
                        video
                          .find('iframe.ja-video, video')
                          .removeAttr('width')
                          .removeAttr('height')
                        video
                          .find(
                            'iframe.ja-video, video, .jp-video, .jp-jplayer',
                          )
                          .css({ width: width, height: height })
                        video.show()
                        if (clearContent) {
                          container.data('video', '')
                        }
                        if (mainPlayer.length) {
                          setTimeout(function () {
                            $('html, body').animate(
                              {
                                scrollTop: mainPlayer.offset().top,
                              },
                              200,
                            )
                          }, 500)
                        }
                      }
                    }
                  })
                })
              }
              videoPlay()
            }, 3000)
          },
        },
        state: {
          isDuringAjax: false,
          isInvalidPage: false,
          isDestroyed: false,
          isDone: false, // For when it goes all the way through the archive.
          isPaused: nextbtn.data('mode') == 'manual' ? true : false,
          currPage: 1,
        },
        binder: $container,
        path: function (page) {
          url =
            $('#infinity-next').data('url') +
            '?limit=' +
            $('#infinity-next').data('limit') +
            '&start=' +
            (page - 1) * $('#infinity-next').data('limit') +
            '&tmpl=component'
          return url
        },
        binder: $(window), // used to cache the selector for the element that will be scrolling
        extraScrollPx: 150,
        dataType: 'html',
        appendCallback: true,
        bufferPx: 350,
        debug: false,
        errorCallback: function () {
          nextbtn
            .removeClass('hidden')
            .addClass('disabled')
            .html(nextbtn.data('finishedmsg'))
          $container.infinitescroll('destroy')
        },
        prefill: false, // When the document is smaller than the window, load data until the document is larger or links are exhausted
        maxPage: parseInt(nextbtn.data('pages')), // to manually control maximum page (when maxPage is undefined, maximum page limitation is not work)
      },

      // call Isotope as a callback
      function (items) {
        if ($container.data('isotope')) {
          $container.isotope('appended', $(items))
        }

        //update disqus if needed
        if (typeof DISQUSWIDGETS != 'undefined') {
          DISQUSWIDGETS.getCount()
        }
      },
    )

    var btnEvent =
      'ontouchstart' in document.documentElement ? 'touchstart' : 'click'
    if (nextbtn.length) {
      nextbtn.on(btnEvent, function () {
        if (!nextbtn.hasClass('finished')) {
          $container.infinitescroll('retrieve')
        }
        return false
      })
    }
  })
})(jQuery)
