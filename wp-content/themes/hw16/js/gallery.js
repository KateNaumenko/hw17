$(document).ready(function() {
  if ($('.portfolio-container').length) {
    $('.portfolio-container').on('click', '.arrow.l', function() {
      const parent = $(this).parents('.portfolio__item-wrapper');
      const wrapper = $('.portfolio');
      const items = wrapper.find('.portfolio__item-wrapper');
      const currentIndex = items.index(parent);
      const prevEl = items[currentIndex > 0 ? currentIndex - 1 : items.length - 1];
      const currentEl = items[currentIndex];
      $($(currentEl).find('input')[0]).prop("checked", false);
      $($(prevEl).find('input')[0]).prop("checked", true);
    });

    $('.portfolio-container').on('click', '.arrow.r', function() {
      const parent = $(this).parents('.portfolio__item-wrapper');
      const wrapper = $('.portfolio');
      const items = wrapper.find('.portfolio__item-wrapper');
      const currentIndex = items.index(parent);
      const nextEl = items[currentIndex < items.length - 1 ? currentIndex + 1 : 0];
      const currentEl = items[currentIndex];
      $($(currentEl).find('input')[0]).prop("checked", false);
      $($(nextEl).find('input')[0]).prop("checked", true);
    });
  }
})