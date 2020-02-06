var slideIndex = 0;
showSlides();

$(function() {
  function showSlides() {
      var i;
      var slides = document.getElementsByClassName("slideshow_slides");
      var dots = document.getElementsByClassName("dot");
      for (i = 0; i < slides.length; i++) {
         slides[i].style.display = "none";
      }
      slideIndex++;
      if (slideIndex > slides.length) {slideIndex = 1}
      for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";
      dots[slideIndex-1].className += " active";
      setTimeout(showSlides, 2000); // Change image every 2 seconds
  }
//
//
//
//
//
//
//   var container = $('.slideshow'),
//
//     slideGroup = container.find('.slideshow_slides'),
//     slides = slideGroup.find('a'),
//     nav = container.find('.slideshow_nav'),
//     indicator = container.find('.indicator'),
//     slideCount = slides.length,
//     indicatorHtml = '',
//     currentIndex = 0, //현재슬라이드 저장
//     duration = 500, //지연시간 0.5초
//     easing = 'easeInOutExpo',
//     interval = 2500,
//     timer;
//
//
//   //슬라이드를 가로로 배
//   //slides 마다 배열 :left 0% 100% 200% 300%
//   console.log(slides);
//   slides.each(function(i) {
//     var newLeft = i * 100 + '%';
//     $(this).css({
//       left: newLeft
//     });
//     indicatorHtml += '<a href="">' + '</a>';
//   });
//   indicator.html(indicatorHtml);
//
//   //슬라이드 이동함수
//   function gotoSlide(index) {
//     slideGroup.animate({left:-100*index+'%'},duration, easing);
//     currentIndex = index;
//     updateNav();  //처음인지, 마지막인지 검사
//
//   }
//
//   function updateNav() {
//     var navPrev = nav.find('.prev');
//     var navNext = nav.find('.next');
//     if (currentIndex == 0)
//       navPrev.addClass('disabled');
//     else
//       navPrev.removeClass('disabled');
//
//     if (currentIndex == slideCount - 1)
//       navNext.addClass('disabled');
//     else
//       navNext.removeClass('disabled');
//
//     indicator.find('a').removeClass('active');
//     indicator.find('a').eq(currentIndex).addClass('active');
//     //indicator.find('a').eq(currentIndex).addClass('active').siblings().removeClass('active');
//   }
//
//   //인디케이터로 이동하기
//   indicator.find('a').click(function(e) {
//     e.preventDefault(); //a tag 기본기능막기
//     var idx = $(this).index();
//     gotoSlide(idx);
//
//   });
//
//
//   //좌우버튼으로 이동하기
//   nav.find('.prev').click(function(e) {
//     e.preventDefault(); //a tag 기본기능막기
//     if (currentIndex !== 0)
//       currentIndex -= 1;
//
//     gotoSlide(currentIndex);
//   });
//
//   nav.find('.next').click(function(e) {
//     e.preventDefault(); //a tag 기본기능막기
//     if (currentIndex !== slideCount - 1)
//       currentIndex += 1;
//
//     gotoSlide(currentIndex);
//   });
//
//   updateNav();
//
//   //자동슬라이드 함수
//   //setInterval = 일을 하는 함수 구현, 시간
//   function startTimer() {
//     timer = setInterval(function() {
//       var nextIndex = (currentIndex + 1) % slideCount;
//       gotoSlide(nextIndex);
//     }, interval);
//   }
//
//   startTimer();
//
//   function stopTimer() {
//     clearInterval(timer);
//   }
//
//   container.mouseenter(function() {
//     stopTimer();
//   });
//
//   container.mouseleave(function() {
//     startTimer();
//   });
//
// });
