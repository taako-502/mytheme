( function() {
  jQuery('.l-hamburger').click( function() {
    jQuery(this).toggleClass('active');
    jQuery('.l-nav-menu').toggleClass('active');
  });
}() );

/*
(function() {
  'use strict';

  var ham, hamItems;

  //ham = document.getElementById('ham');
  var ham = document.getElementsByClassName('l-hamburger');
  hamItems = document.querySelectorAll('.ham_menu_item');

  ham.addEventListener('click', function() {
    alert('test');
    for (var i = 0; i < hamItems.length; i++) {
      if (hamItems[i].classList.contains('active')) {
        hamItems[i].classList.remove('active');
      } else {
        hamItems[i].classList.add('active');
      }
      // 上記if文を削除し、下記コードをアクティブにしても実行可能
      // hamItems[i].classList.toggle('is-active');
    }
  });
}());
*/
