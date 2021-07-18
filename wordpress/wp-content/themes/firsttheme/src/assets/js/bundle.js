import $ from 'jquery';
import './components/slider';
import './components/navigation';
import 'slick-carousel';

$(document).on('ready', () => {
  $('.c-post__gallery, .c-post__gallery-gutenberg .wp-block-gallery').slick({
    arrows: false,
    adaptiveHeight: true,
  });

  $('.most_recent_widget').slick();
});
