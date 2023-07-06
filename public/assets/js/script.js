


// home slider
// $(document).on("ready",function(){
//   if(localStorage.getItem("parentPhoto")){
//     document.querySelector(".files-names").textContent=localStorage.getItem("parentPhoto")
//     console.log("ready")
//   }
// })


var swiper = new Swiper(".home-slider .mySwiper", {
    loop:true,
    pagination: {
      el: ".home-slider .swiper-pagination",
      clickable:true,
    },
  });


  // faq
  var swiper = new Swiper(".q-slider .mySwiper", {
    slidesPerView: 1,
    spaceBetween: 10,
    loop:true,
    freeMode: true,
    breakpoints: {
      640: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      768: {
        slidesPerView: 3,
        spaceBetween: 30,
      },
      1200:{
        slidesPerView: 4,
        spaceBetween: 40,
      }
    },
  });


  // reviews
  var swiper = new Swiper(".reviews-slider .mySwiper", {
    slidesPerView: 1,
    spaceBetween: 10,
    loop:true,
    freeMode: true,
    breakpoints: {
      640: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      768: {
        slidesPerView: 3,
        spaceBetween: 30,
      },

    },
  });

  // lightbox

  $(".gallery-img").on('click',function(){
    let src=$(this).find('img').attr('src'),
    alt=$(this).find('img').attr('src')

    $('.lightbox').fadeIn(500)
    $('.lightbox img').attr("src",src)
    $('.lightbox img').attr("alt",alt)
    $('body').css('overflow','hidden')
  })

  // close lightbox

  $('.lightbox .close').on('click',function(){
    $('.lightbox').fadeOut(500)
    $('body').css('overflow','auto')
  })

// show password
$('.show-passowrd').on('mousedown',function(){
  $(this).parent().find('input').attr('type','text')
}).bind('mouseup mouseleave touchend',function(){
  $(this).parent().find('input').attr('type','password')
})

$('.charcter input').on('click',function(){
  $(".charcter input").siblings('label').css("animation-play-state","running")
  $(".charcter input").siblings('label').find('span').css("opacity","0")
  $(this).siblings('label').css("animation-play-state","paused")
  $(this).siblings('label').find('span').css("opacity","1")
})

// notification icon

if($(".notification").length){
  $(".noti-icon").on('click',function(e){
    $(".notification").slideToggle('fast')
  })
  $(".notification,.noti-icon").on('click',(e)=>{
    e.stopPropagation()
  })
  $(document).on('click',function(){
    $(".notification").slideUp('fast')
  })
}

// search

if($('.search-resault').length){
  $('.search-input').on('input',function(){
    var search=$('.search-input').val().toLowerCase()
    $('.search-label').each(function(){
      if($(this).text().toLowerCase().search(search)<0){
        $(this).parents(".search-resault").css('display','none')
      }
      else{
        $(this).parents(".search-resault").css('display','block')

      }
    })

  })
}

// count-down

const countdown = () => {
  const countDate = new Date("May 5, 2022 00:00:00").getTime();
  const now = new Date().getTime();
  const gap = countDate - now;

  // How does the time work?
  const second = 1000;
  const minute = second * 60;
  const hour = minute * 60;
  const day = hour * 24;

  // calculate
  const textDay = Math.floor(gap / day);
  const textHour = Math.floor((gap % day) / hour);
  const textMinute = Math.floor((gap % hour) / minute);
  const textSecond = Math.floor((gap % minute) / second);

  $(".days").text (textDay+":");
  $(".hours").text (textHour+":");
  $(".mins").text (textMinute+":");
  $(".secs").text (textSecond+":");

  if (gap <= 0) {
    clearInterval(watchCountdown);
    $(".days").html("0") ;
    $(".hours").html("0") ;
    $(".mins").html("0") ;
    $(".secs").html("0") ;
  }
};

let watchCountdown = setInterval(countdown, 1000);


// providers slider
var swiper = new Swiper(".provider .mySwiper", {
  loop: true,
  spaceBetween: 10,
  slidesPerView: 3,
  freeMode: true,
  watchSlidesProgress: true,
});
var swiper2 = new Swiper(".provider .mySwiper2", {
  loop: true,
  spaceBetween: 10,

  thumbs: {
    swiper: swiper,
  },
});

// provider detailes color and image
// color
if($('main').data('color')!=="defined"){
  var color=$("main").data('color')
  $("main").find(".detials-items .detials-item , .prov-socials div a").css("color",color)
  $("main").find(".prov-socials div ").css("border-color",color)
}

if($('main').data('image')!=="defined"){
  var image=$("main").data('image')
  console.log(image)
  $('.image-content').append(`<img src=${image} alt="logo">`)
}
// make div editaple
$(".provider-description").on('click',function(){
  $(this).find("p").attr("contentEditable","true")
})

// date
$(".textbox-n").on('focus',function(){
  $(this).attr("type","date")
})
$(".textbox-n").on("blur",function(){
  $(this).attr("type","text")
})

// select 2
// $(document).ready(function() {
//   $('.select-2').select2();
// });

$(".school-type input[type='radio']").on('change',function(){
  $(".school-type input[type='radio']").siblings('label').removeClass('radio-checked')
  $(this).siblings('label').toggleClass('radio-checked')
})


// $("input[type='file']").on('change',function(){
//   var photos=[]
//   for(var i=0;i<$(this)[0].files.length;i++){
//     photos.push($(this)[0].files[i].name)
//     // document.querySelector(".files-names").textContent+=`${$(this)[0].files[i].name} , `
//   }
//   localStorage.setItem("parentPhoto",photos.join(""));
//   document.querySelector(".files-names").textContent=localStorage.getItem("parentPhoto")
// })

// validation for cart number

function number_validate(){

  $(".num_cart_item").on("change",function(){
    if($(this).val() > $(this).attr("max")){
      $(this).val($(this).attr("max"))
    }
  })
}
number_validate()

$("#addEventButton").on("shown.bs.modal" ,function(){

  $("#addEvent").modal('show')
});
$(".print_button").click(function(){
  $("body").printArea({ mode: 'popup', popClose: true });
});

