$(".hamburger").on('click',function(){
  $(this).toggleClass('is-active');
  $(".navbar-mobile").toggleClass("is-open");
});

$("#search-btn").on('click',function(){
  $("#search-field").toggleClass("is-open");
});

$("#search-field-close-btn").on('click',function(){
  $("#search-field").removeClass("is-open");
});


$(".cm").on('click',function(){
  Swal.fire({
    title:'Comming Soon !',
    type: 'warning',
    text: 'Vonfram Lab là một không gian cho phép các Bóng Đèn-ers đăng tải và chia sẻ những gì mình làm được, thí nghiệm, các nghiên cứu nho nhỏ. Vonfram Lab hứa hẹn sẽ mang lại những trải nghiệm đầy thực tế và gần gũi'
  });
});

$("#user-avatar").on('click',function(e){
  let avatar_path = $(this).attr("src");
  let user_name = $(this).data("usn");

  Swal.fire({
    title: user_name,
    customClass:{
      'image': 'popup-avatar'
    },
    imageUrl: avatar_path,
    showConfirmButton: true,
    showCancelButton: true,
    showCloseButton: true,
    confirmButtonText: 'Tới trang Dashboard',
    cancelButtonText: 'Đăng xuất',
    confirmButtonColor: '#2ecc71',
    cancelButtonColor: '#e74c3c'
  }).then(function(result){
    if(typeof result.dismiss == "undefined"){
      window.location.href = "/user";
    }else{
      if(result.dismiss == "cancel"){
        window.location.href = "/bongden_logout";
      }
    }
  });
});

$(".dev").on('click',function(e){
  Swal.fire({
    type:'warning',
    title:'Cảnh báo',
    text:'Website Bóng Đèn đang trong quá trình phát triển, các thông tin trên website không phải là chính thức'
  });
});
