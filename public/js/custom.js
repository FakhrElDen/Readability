$(document).ready(function() {

  // Global Function for uploading files
  function getValFileInputinSpan(inputFileVal, spanToBrCopiesVal) {
    $(inputFileVal).change(function () {
        let inputFileVal = $(this).val().slice(12);
        $(spanToBrCopiesVal).text( inputFileVal );
    });
  }

  // For real Section in Home
  $('.carousel').carousel({
    interval: false
  });

  

  //user-profile-1 page
  function userProfilePage() {
    
      $('.userProfile__menu__core li > button.user__fake__btn').on('click', function(e) {
        
        //Toggle activating class
        $(this).prev('a')
                .toggleClass('showme')
                .toggleClass('active')
                .toggleClass('userProfile__menu__core__js')
                .parent('li')
                .siblings('li')
                .find('a')
                .removeClass('userProfile__menu__core__js active showme')
                
        //Showing next div
        $(this).next('div')
                .slideToggle()
                .parent('li')
                .siblings('li')
                .find('div.userProfile__content__body')
                .slideUp()

      });
    
      
      $('.userProfile__menu__core li').last().find('button').on('click', function () {
        $('.userProfile5__content__body__close').slideDown();
      });

    
      $('.userProfile__content__body__close').on('click', function() {
        //To slideUp it is parent
        $(this).closest('.userProfile__content__body')
                .slideUp()
                .parent('li')
                .find('a')
                .removeClass('userProfile__menu__core__js');
      });

      $('.userProfile__link__body__close').on('click', function() {
        //To slideUp it is parent
        $(this).closest('.userProfile__content__body')
                .slideUp()
                .parent('li')
                .find('a')
                .removeClass('userProfile__menu__core__js');
      });
    
      $('.userProfile5__content__body__close').on('click', function () {
        $(this).slideUp();
    
        $('.mainDashboard5__content').slideUp()
                                      .prev('a')
                                      .removeClass('userProfile__menu__core__js');
      });

      $('.userProfile__menu__core li:nth-of-type(3) > button.user__fake__btn').on('click', function() {
        $('.userProfile3__content__link').slideUp();
      });

  
      $('.userProfile3__content__body__add__btn').on('click', function(e) {
        e.preventDefault();
  
        $(this).parent('div').slideUp().next('.userProfile3__content__link').slideDown();
      });
  //============================================================================
      $('.userProfile__link__body__close').on('click', function() {

        $(this).closest('.userProfile3__content__link').slideUp();

        $(this).parent().parent().parent().parent()
                .find('a').removeClass('userProfile__menu__core__js');
      });


      //For Last close Button
      $('.userProfile5__content__body__close').on('click', function() {
        $(this).closest('.userProfile5__menu__core')
                .find('ul li:last-of-type > a')
                .removeClass('userProfile__menu__core__js')
      });

    
  }userProfilePage()
  

  // ---------------------------------------- Start Window Resize Function ----------------------------------------
  $(window).resize(function() {

    if( $(window).width() <= 991 ) {
      $('.userProfile__content__body__mob').css('display', 'none');
    }

    // Home Real Section Height
    homeRealHeight();
    
    // padding left trigger
    // paddLeft();

    //DashBoard
    searchResultsItemsHeight();

    $(function () {
      function trimText(selector, limit) {    
          var text = selector.text(),
              trim;

          selector.each(function() {
              if ($(this).text().length > limit) {
                  trim = $(this).text().substr(0, limit);

                  $(this).text(trim);
                  $(this).append('<span class="expand">Read More<i class="fas fa-plus-circle">');
              };
          });

          $(selector).on("click",".expand", function() { //future element
              $(this).parent().text(text).append('<span class="collapse">...less</span>');
          });

          $(selector).on("click", ".collapse",function() { //future element
              $(this).parent().text(trim).append('<span class="expand">...more</span>');
          });

      };


      trimText($(".one"),   250);

  });

});
// ---------------------------------------- End Window Resize Function ----------------------------------------
    
  // ---------------------------------------- Start internship Page ----------------------------------------
  $('.web_btn_file').each(function() {
    $(this).on('click', function() {
        //Simulate file input clicked
        $(this).parent('.internship__core__form__inputs').find('input[type="file"]').click();

        // Getting file input value to rewrite it in .instead__file element
        getValFileInputinSpan($('.ms'), $('.instead__file'))
      });
  });
  // ---------------------------------------- End internship Page ----------------------------------------

  // ---------------------------------------- Start Home Page ----------------------------------------
  // Nav bat button in mobile screen
  $('#navBtnOpen').on('click', function() {

    // Prevent scrolling while opening menu
    $('body').toggleClass('body_hid');

    // Color open and close menu btb
    $(this).find('button span').toggleClass('bg-white');
    
    // Shape of menu btn when being clicked
    $(this).find('button').toggleClass('active');

    // Color logo in mobile
    $(this).prev('.generalNav__mob__logo').children('span').toggleClass('color-white');
    
    // For menu behavior in mobile
    $(this).closest('.generalNav__mob').next('.generalNav').slideToggle();
  });
  
  // Footer in mobile screen collapsed
  $('.generalFooter__bottom__block h4').on('click', function() {
    
    $(this).toggleClass('borderColor');
    
    $(this).closest('.col-xs-12')
            .siblings()
            .find('h4')
            .removeClass('borderColor');

    $(this).next('ul').slideToggle()
    .closest('.col-xs-12')
    .siblings()
    .find('ul').slideUp()
      

      $(this).find('i').toggleClass('fa-chevron-down fa-chevron-up')
        .closest('.col-xs-12')
        .siblings()
        .find('.generalFooter__bottom__block h4 i').removeClass('fa-chevron-down fa-chevron-up').addClass('fa-chevron-down');
  });  
  
  function homeRealHeight() {
        $('.homeReal__item__info').height($('.homeReal').outerHeight())
    }homeRealHeight();

    // ---------------------------------------- End Home Page ----------------------------------------

    // ---------------------------------------- Start Catalouge Page ----------------------------------------
    $('.catalouge__ctrls__nav').each(function() {
        $(this).on('click', function() {
            $(this).addClass('catalouge__ctrls-active').parent('li').siblings('li').find('.catalouge__ctrls__nav').removeClass('catalouge__ctrls-active');

            let catalougeCtrlsNavShowed = $(this).data('category');
            $(catalougeCtrlsNavShowed).show().siblings().hide();
        });
    });

    $('.mainLogining__form__core__eye').on('click', function(e) {
      e.preventDefault();
      $(this).toggleClass('active');
      if( $(this).hasClass('active') ) {
        $(this).prev('input').attr('type', 'text');
      }
      else {
        $(this).prev('input').attr('type', 'password');
      }
    });
    // ---------------------------------------- End Catalouge Page ----------------------------------------
    
    // ---------------------------------------- Start Home Real Page ----------------------------------------
    $('.homereal__arrow').on('click', function() {
      $('.carousel-control').click();
    })
    // ---------------------------------------- End Home Real Page ----------------------------------------
    
    // ---------------------------------------- Start Plans Page ----------------------------------------
    $('.plans__block__mob__details').on('click', function() {
      $(this).nextAll().slideDown();
    });

    $('.plans__block__mob__cancel').on('click', function() {
      $(this).slideUp();
      $(this).prev().slideUp();
    });
    // ---------------------------------------- End Plans Page ----------------------------------------
    
    // ---------------------------------------- Start Confimation Messages ----------------------------------------
    function generalMessage(message) {
      $(message).animate({top: '55px'}).delay(1000).animate({top: '-200px'});
    }

    $('#suc').on('click', function() {
      generalMessage('#successMessage');
    });
    $('#fail').on('click', function() {
      generalMessage('#failMessage');
    }); 


    
    function showMainMessage() {
      $('#mainMessage').fadeIn();
    }

    function hideMainMessage() {
      $('#mainMessage').fadeOut();
    }


    $('.bigMessage').each(function() {
      $(this).on('click', function() {
        showMainMessage();
      });
    });
   
    $('#closeAlert').on('click', function() {
      hideMainMessage();
    });
    



    
    // ---------------------------------------- End Confimation Messages ----------------------------------------
    
    // ---------------------------------------- Start Main Dashboard ----------------------------------------
    function searchResultsItemsHeight() {
      let mainDashboardRight             = $('.mainDashboard__right').outerHeight(),
          mainDashboardRightHead         = $('.mainDashboard__right__head').outerHeight(),
          mainDashboardRightSearch       = $('.mainDashboard__right__head').outerHeight(),
          mainDashboardRightSearchResult = (mainDashboardRight - (mainDashboardRightHead + mainDashboardRightSearch));
        
      $('.mainDashboard__right__search__result').outerHeight( mainDashboardRightSearchResult );
    }searchResultsItemsHeight();
    // ---------------------------------------- End Main Dashboard ----------------------------------------
    
    // ---------------------------------------- Start Moderation add clients-1 Dashboard ----------------------------------------
    $('#formAddEmail').on('click', function() {
      let inputValNewEmail = $(this).prev('input');

      if( $(inputValNewEmail).val() != '' ) {
        $(this).next('ul').append(`<li> ${inputValNewEmail.val()} <span><i class="fa fa-times fa-fw"></i></span></li>`);
        $(inputValNewEmail).val('');
      }
    });

    $('.form__add__data').on('click', 'li span', function() {
      $(this).parent('li').remove();
    });
    // ---------------------------------------- End Moderation add clients-1 Dashboard ----------------------------------------
    
    // ---------------------------------------- Start moderation projects Dashboard ----------------------------------------
    $('.mainDashboard__right__head__filter__head button').on('click', function() {
      $(this).addClass('color-blue').siblings().removeClass('color-blue');

      let mainDashboardRightHeadFilterHeadButton = $(this).data('filter');
      $(mainDashboardRightHeadFilterHeadButton).show().siblings().hide()
    });
    // ---------------------------------------- End moderation projects Dashboard ----------------------------------------
    
    // ---------------------------------------- Start moderation clients-1 Dashboard ----------------------------------------
    $('.moderationProjects__clientid__body__item > ul > li').each(function() {
      $(this).on('click', function() {
        $(this).children('i').toggleClass('transform__rotate');

        $(this).children('ul').slideToggle()
      });
    });
    // ---------------------------------------- End moderation clients-1 Dashboard ----------------------------------------
    
    // ---------------------------------------- Start Moderation project request Dashboard ----------------------------------------
    $('.moderationProjects__projects__request__item').each(function() {
      $(this).find('table thead button').on('click', function() {

        $(this).find('i').toggleClass('fa-angle-double-down fa-angle-double-up');

        $(this).closest('thead').next('tbody').slideToggle();
      });
    });
    // ---------------------------------------- End Moderation project request Dashboard ----------------------------------------
    
    // ---------------------------------------- Start Request with i Dashboard ----------------------------------------
    $('.request__form__head').on('click', 'nav a', function() {
      $(this).addClass('bg-blue color-white').siblings('a').removeClass('bg-blue color-white');

      let requestFormHeadLi = $(this).data('form');
      console.log(requestFormHeadLi)
      $(requestFormHeadLi).show().siblings('form').hide();
    });

    window.addEventListener('load', function(){
      // btn-11
      var movingBar = new MovingBar('.btn-11');
    });
    
    // btn-11 : Moving Bar
    function MovingBar( nav ){
      var $navMovingBar = document.querySelector( nav ),
        $btnMenu11 = $navMovingBar.querySelectorAll('a'),
        bar = document.createElement('span'),
        width, left;
    
      bar.classList.add('effect');
      $navMovingBar.appendChild( bar );
    
      for( var i=0, max=$btnMenu11.length; i<max; i++ ){
        $btnMenu11[i].addEventListener('mouseenter', function(){
          width = this.offsetWidth,
          left = this.offsetLeft;
          barMovingCurrentMenu( width, left );
        });

        $btnMenu11[i].addEventListener('mouseleave', function(){
          width = 0,
          left = 0;
          barMovingCurrentMenu( width, left );
        });
      }
    
      function barMovingCurrentMenu( width, left ) {
        bar.style.width = width + 'px';
        bar.style.left = left + 'px';
      }
    }

    $('.request__form__head nav a span.effect').mouseleave(function() {
      $(this).fadeOut()
    });
    // $('.request__form__head ul li:nth-child(2)').mouseleave(function() {
    //   $('.request__form__head__hover').css('left', '0')
    // });
    // ---------------------------------------- End Request with i Dashboard ----------------------------------------

    // ---------------------------------------- Start FAQ-2 Dashboard ----------------------------------------
    $('.faq2__questions__core__item__head').on('click', function() {
      $(this).find('i').addClass('active')
        .closest('.faq2__questions__core__item')
        .siblings('.faq2__questions__core__item')
        .find('.faq2__questions__core__item__head i').removeClass('active');

      $(this).addClass('color-blue').slideDown()
      .closest('.faq2__questions__core__item')
      .siblings('.faq2__questions__core__item')
      .find('.faq2__questions__core__item__head').removeClass('color-blue');

      $(this).next('.faq2__questions__core__item__body').slideToggle()
        .closest('.faq2__questions__core__item')
        .siblings('.faq2__questions__core__item')
        .find('.faq2__questions__core__item__body').slideUp();
    });
    // ---------------------------------------- End FAQ-2 Dashboard ----------------------------------------
  
    
    // Home Main Slider 
    (function($) {
        $.fn.cascadeSlider = function(opt) {
          var $this = this,
            itemClass = opt.itemClass || 'cascade-slider_item',
            arrowClass = opt.arrowClass || 'cascade-slider_arrow',
            $item = $this.find('.' + itemClass),
            $arrow = $this.find('.' + arrowClass),
            itemCount = $item.length;
      
          var defaultIndex = 0;
      
          changeIndex(defaultIndex);
      
          $arrow.on('click', function() {
            var action = $(this).data('action'),
              nowIndex = $item.index($this.find('.now'));
      
            if(action == 'next') {
              if(nowIndex == itemCount - 1) {
                changeIndex(0);
              } else {
                changeIndex(nowIndex + 1);
              }
            } else if (action == 'prev') {
              if(nowIndex == 0) {
                changeIndex(itemCount - 1);
              } else {
                changeIndex(nowIndex - 1);
              }
            }
      
            // $('.cascade-slider_dot').removeClass('cur');
            // $('.cascade-slider_dot').next().addClass('cur');

            // $('.cascade-slider_dot.cur').removeClass('cur').next().addClass('cur');
          
          });
          
          // add data attributes
          for (var i = 0; i < itemCount; i++) {
            $('.cascade-slider_item').each(function(i) {
              $(this).attr('data-slide-number', [i]);
            });
          }
          
          // dots
          $('.cascade-slider_dot').bind('click', function(){
            // add class to current dot on click
            $('.cascade-slider_dot').removeClass('cur');
            $(this).addClass('cur');
      
            var index = $(this).index();
      
            $('.cascade-slider_item').removeClass('now prev next');
            var slide = $('.cascade-slider_slides').find('[data-slide-number=' + index + ']');
            slide.prev().addClass('prev');
            slide.addClass('now');
            slide.next().addClass('next');
      
            if(slide.next().length == 0) {
              $('.cascade-slider_item:first-child').addClass('next');
            }
      
            if(slide.prev().length == 0) {
              $('.cascade-slider_item:last-child').addClass('prev');
            }
          });
      
          function changeIndex(nowIndex) {
            // clern all class
            $this.find('.now').removeClass('now');
            $this.find('.next').removeClass('next');
            $this.find('.prev').removeClass('prev');
            if(nowIndex == itemCount -1){
              $item.eq(0).addClass('next');
            }
            if(nowIndex == 0) {
              $item.eq(itemCount -1).addClass('prev');
            }
      
            $item.each(function(index) {
              if(index == nowIndex) {
                $item.eq(index).addClass('now');
              }
              if(index == nowIndex + 1 ) {
                $item.eq(index).addClass('next');
              }
              if(index == nowIndex - 1 ) {
                $item.eq(index).addClass('prev');
              }
            });
          }
        };
      })(jQuery);
      

    $('#cascade-slider').cascadeSlider({

    });

    $('#homeMainSliderCtrlsNext').click(function() {
      $('.slick-next.slick-arrow').click();
    });
    
    $('#homeMainSliderCtrlsPrev').click(function() {
      $('.slick-prev.slick-arrow').click();
    });

    // ---------------------------------------- Start Content Dashboard file upload
    $('.file__btn').each(function() {
      $(this).on('click', function(e) {
        e.preventDefault();

        //Simulate file input clicked
        $(this).parent('.contentWrapper__content__form__file').find('input[type="file"]').click();

        // Getting file input value to rewrite it in .instead__file element

        getValFileInputinSpan($(this).parent('.contentWrapper__content__form__file').find('input[type="file"]'), $(this).prev('.file__result'))
      });

    });

    // Content slider adding images page --> To get name of clicked image then add it in image name element 
    $('.contentWrapper__content__users__item__images').on('click', 'li', function () {
      // Toggle active border class
      $(this).addClass('active').siblings('li').removeClass('active');
      
      // Get its child "image src attr"
      let contentUplaodImageSRC = $(this).find('img').attr('src');

      console.log(contentUplaodImageSRC)
      // Add contentUplaodImageSRC inside image name html element
      $(this).closest('.contentWrapper__content__users__item').find('#contentWrapperContentUsersImagesResult').text(contentUplaodImageSRC);
    })
    // ---------------------------------------- End Content Dashboard file upload

    // ---------------------------------------- Start Domain Page ----------------------------------------
    // function paddLeft(divToBeSimilar, divBeingEffected) {
    //   $(divToBeSimilar).css('padding-left', $(divBeingEffected).offset().left);
    // } paddLeft('.domainSliders__owl', '.generalBanner .container');

    // setTimeout(()=>{$('.domainSliders .owl-dots').clone().appendTo('.domainSliders__ctrls')});

    $('#domainSlidersRightBtn').click(function() {
        $('.domainSliders .owl-next').click()
    });

    $('#domainSlidersLeftBtn').click(function() {
        $('.domainSliders .owl-prev').click()
    });
    
    $('.slick-slider').slick({
      centerMode: true,
      slidesToShow: 3,
      dots: true,
      arrows: true,
      swipe: true,
      speed: 0,
      swipeToSlide: true,
      // adaptiveHeight: true,
      responsive: [
        {
          breakpoint: 6000,
          settings: {
            centerMode: true,
            centerPadding: '260px',
            slidesToShow: 1
          }
        },
        {
          breakpoint: 1660,
          settings: {
            centerMode: true,
            centerPadding: '260px',
            slidesToShow: 1
          }
        },
        {
          breakpoint: 922,
          settings: {
            centerMode: true,
            centerPadding: '140px',
            slidesToShow: 1,
            arrows: false,
          }
        },
        {
          breakpoint: 767,
          settings: {
            centerMode: true,
            centerPadding: '60px',
            slidesToShow: 1
          }
        }
      ]
    });

    // Country Page -> Trigger Owl Carousel
    $('.domainSliders__owl').owlCarousel({
        loop: true,
        nav: true,
        dots: true,
        margin: 60,
        center: true,
        // startPosition: 0,
        responsive:{
            0:{items:1},
            768:{items: 2},
            992:{items:4},
            1366:{items:5}
        },
        slideBy:1
    });

    
    
    
    

    
    // ---------------------------------------- End Domain Page ----------------------------------------

  // var lastScrollTop = 0;
  //   $(window).scroll(function(event){
  //     var st = $(this).scrollTop();
      
  //     if($(window).scrollTop() == 0){
        
  //       // Normal Case
  //       $('.generalNav').removeClass('nav__fixed generalNav__js nav__goUp');

  //    } else if (st > lastScrollTop){
        
  //     // Down Scroll
  //     $('.generalNav').addClass('nav__goUp generalNav__js').removeClass('nav__fixed');

  //   } else {

  //     // up Scroll
  //       $('.generalNav').removeClass('nav__goUp').addClass('nav__fixed');

  //   } 
  //   lastScrollTop = st;
  // });

  
});




/*
Your case ID is 23546323. For now, please wait for their email to you about this one.
*/

(function(){
  var editor = new MediumEditor('.editable', {
    toolbar: {
      buttons: ['bold', 'italic', 'underline', 'strikethrough', 'quote', 'anchor', 'image', 'justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull', 'superscript', 'subscript', 'orderedlist', 'unorderedlist', 'pre', 'removeFormat', 'outdent', 'indent', 'h2', 'h3'],
    },
    buttonLabels: 'fontawesome',
    anchor: {
      targetCheckbox: true
    }
  });
}())