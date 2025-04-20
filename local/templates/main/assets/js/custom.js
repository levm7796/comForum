new Swiper('.hero-slider__container', {
  loop: true,
  spaceBetween:0,
  watchSlidesVisibility: true,
  slidesPerView: 1,
  effect: "fade",
  autoplay: {
    delay: 5000,
    disableOnInteraction: false,
  },

  pagination: {
    el: ".swiper-pagination",
    clickable: true,
    renderBullet: function (index, className) {
      return '<span class="' + className + '">' + 0 + (index + 1) + "</span>";
    },
  },
})


//===================================================================================================================================
new Swiper('.block-slider__container', {
  loop: true,
  effect: "fade",
  autoHeight: true,
  spaceBetween:0,
  watchSlidesVisibility: true,
  slidesPerView: 1,
  navigation: {
    nextEl: '.swiper-button-next1',
    prevEl: '.swiper-button-prev1',
  },
})

//===================================================================================================================================
const breakpoint = window.matchMedia( '(min-width:600px)' );
let mySwiper;
const breakpointChecker = function() {
 if ( breakpoint.matches === true ) {
  if ( mySwiper !== undefined ) mySwiper.destroy( true, true );
  return;
} else if ( breakpoint.matches === false ) {
  return enableSwiper();
}
};
const enableSwiper = function() {
 mySwiper = new Swiper ('.portfolio-slider__container', {
  loop: true,
  spaceBetween:15,
  slidesPerView: 1,
  navigation: {
    nextEl: '.swiper-button-next2',
    prevEl: '.swiper-button-prev2',
  },
});
};
breakpoint.addListener(breakpointChecker);
breakpointChecker();
//===================================================================================================================================
new Swiper('.news-slider__container', {
  loop: true,
  spaceBetween:20,
  watchSlidesVisibility: true,
  slidesPerView: 1,
  navigation: {
    nextEl: '.swiper-button-next3',
    prevEl: '.swiper-button-prev3',
  },
})
//===================================================================================================================================

const breakpoint1 = window.matchMedia( '(max-width:480px)' );
let mySwiper1;
const breakpointChecker1 = function() {
 if ( breakpoint1.matches === true ) {
  if ( mySwiper1 !== undefined ) mySwiper1.destroy( true, true );
  return;
} else if ( breakpoint1.matches === false ) {
  return enableSwiper1();
}
};
const enableSwiper1 = function() {
 mySwiper1 = new Swiper ('.hits-slider__container', {
  loop: true,
  spaceBetween:20,
  slidesPerView: 1,
  navigation: {
    nextEl: '.swiper-button-next4',
    prevEl: '.swiper-button-prev4',
  },
});
};
breakpoint1.addListener(breakpointChecker1);
breakpointChecker1();

//===================================================================================================================================
new Swiper('.clients-slider__container', {
  loop: true,
  autoHeight: true,
  spaceBetween:0,
  watchSlidesVisibility: true,
  slidesPerView: 1,
})
//===================================================================================================================================
const breakpoint2 = window.matchMedia( '(max-width:820px)' );
let mySwiper2;
const breakpointChecker2 = function() {
 if ( breakpoint2.matches === true ) {
  if ( mySwiper2 !== undefined ) mySwiper2.destroy( true, true );
  return;
} else if ( breakpoint2.matches === false ) {
  return enableSwiper2();
}
};
const enableSwiper2 = function() {
 mySwiper2 = new Swiper ('.blog-slider__container', {
  loop: true,
  spaceBetween:30,
  slidesPerView: 2,
  navigation: {
    nextEl: '.swiper-button-next5',
    prevEl: '.swiper-button-prev5',
  },
});
};
breakpoint2.addListener(breakpointChecker2);
breakpointChecker2();

//===================================================================================================================================

new Swiper('.mod-slider__container', {
  loop: true,
  spaceBetween:0,
  watchSlidesVisibility: true,
  slidesPerView: 3,
  centeredSlides:true,
  navigation: {
    nextEl: '.swiper-button-next6',
    prevEl: '.swiper-button-prev6',
  },
  breakpoints: {
    320: {
      slidesPerView: 1,
    },
    480: {
      slidesPerView: 1,
    },
    700: {
      slidesPerView: 2,
    },
    1025: {
      slidesPerView: 3,
    },
  }

})

//===================================================================================================================================

new Swiper('.productvar-slider__container', {
  loop: true,
  spaceBetween:20,
  watchSlidesVisibility: true,
  slidesPerView: 1,
  navigation: {
    nextEl: '.swiper-button-next7',
    prevEl: '.swiper-button-prev7',
  },
})
//===================================================================================================================================
new Swiper('.portfol-slider__container', {
  loop: true,
  spaceBetween:20,
  watchSlidesVisibility: true,
  slidesPerView: 1,
  navigation: {
    nextEl: '.swiper-button-next8',
    prevEl: '.swiper-button-prev8',
  },
})

//===================================================================================================================================

let arrows = document.querySelectorAll('._arrow')

document.onclick = ()=>{ 

 if (window.screen.width > 1024)
  return;

let a = document.querySelector('._arrow._slide')

if (a) {   

  _slideUp(a.children[1], 555);
  a.classList.remove('_slide')
  a.children[1].classList.remove('_slide')
}
}

for (let arrow of arrows) {

  arrow.onclick = ()=>{ 

    if (event.target.nodeName == 'A' || window.screen.width > 1024)
      return;

    let ch = arrow.children[1]

    let a = document.querySelector('._arrow._slide')
    if (a && a != arrow) {   

     _slideUp(a.children[1], 555);
     a.classList.remove('_slide')
  //         a.firstElementChild.classList.remove('_slide')

}

if (arrow.classList.contains('_slide')) {

  _slideUp(arrow.children[1], 555);
  arrow.classList.remove('_slide')
//            arrow.firstElementChild.classList.remove('_slide')


}
else {
           // let a = document.querySelector('._arrow._slide')
           // if (a) _slideUp(a.firstElementChild, 555);

           _slideDown(ch, 555);
           arrow.classList.add('_slide')

           event.preventDefault()
           event.stopPropagation()
           
         }
       }
     }


//===================================================================================================================================



var magnets = document.querySelectorAll('.magnetic')
var strength = 10

magnets.forEach( (magnet) => {
  magnet.addEventListener('mousemove', moveMagnet );
  magnet.addEventListener('mouseout', function(event) {
    TweenMax.to( event.currentTarget, 1, {x: 0, y: 0, ease: Power4.easeOut})
  } );
});

function moveMagnet(event) {
  var magnetButton = event.currentTarget
  var bounding = magnetButton.getBoundingClientRect()

  //console.log(magnetButton, bounding)

  TweenMax.to( magnetButton, 1, {
    x: ((( event.clientX - bounding.left)/magnetButton.offsetWidth) - 0.5) * strength,
    y: ((( event.clientY - bounding.top)/magnetButton.offsetHeight) - 0.5) * strength,
    ease: Power4.easeOut
  })

  //magnetButton.style.transform = 'translate(' + (((( event.clientX - bounding.left)/(magnetButton.offsetWidth))) - 0.5) * strength + 'px,'+ (((( event.clientY - bounding.top)/(magnetButton.offsetHeight))) - 0.5) * strength + 'px)';
}


//===================================================================================================================================

let menuBtn = document.querySelector(".header__togglebtn");
let menuCont = document.querySelector(".header");

if (menuBtn) {
  menuBtn.addEventListener("mouseenter", function () {
    menuCont.classList.toggle("_active");
  });
}

if (menuBtn) {
  menuCont.addEventListener("mouseleave", function () {
    menuCont.classList.remove("_active");
  });
}
//===================================================================================================================================

new Swiper('.blogitem-slider__container', {
  loop: true,
  spaceBetween:0,
  watchSlidesVisibility: true,
  slidesPerView: 1,
  navigation: {
    nextEl: '.swiper-button-next7',
    prevEl: '.swiper-button-prev7',
  },
})

//===================================================================================================================================

function getSelectParam() {
  let parameter = new URLSearchParams(window.location.search) 
  let par
  if (parameter) {
   par = parameter.get('select') 
 }
 if (par) {
  let sbody = 
  document.querySelectorAll('.select__body .select__option');
  if (sbody)
   sbody.forEach((i)=>{ 
    if (i.dataset.value == par) 
      i.click()
  })
}
}
window.addEventListener('load', function () {
  setTimeout(getSelectParam(), 1000);
}
)


new Swiper('.sofas-slider__container', {
  //loop: true,
  autoHeight: true,
  watchSlidesVisibility: true,
  slidesPerView: 1,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
    renderBullet: function (index, className) {
      return '<span class="' + className + '">' + 0 + (index + 1) + "</span>";
    },
  },
  scrollbar: {
    el: ".swiper-scrollbar",
  },
  breakpoints: {
    320: {
      spaceBetween:30,
    },
    761: {
      spaceBetween:100,
    },
  }
})

