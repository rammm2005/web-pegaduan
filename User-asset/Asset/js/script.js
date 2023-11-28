let body = document.querySelector('body')

// var isActive = false;

// $('.menu').on('click', function (){
//   if (isActive){
//     $(this).removeClass('active');
//     $('body').removeClass('menu-open');
//   }else{
//     $(this).addClass('active');
//     $('body').addClass('menu-open');
//   }
//   isActive = !isActive;
// });




document.querySelector('.menu').onclick = () =>{
    body.classList.toggle('menu-open');
    body.classList.toggle('active');

 
}



window.onscroll = () =>{
    body.classList.remove('menu-open');
    body.classList.remove('active');


}
