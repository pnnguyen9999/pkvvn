$(document).ready(function(){
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $(".open-article-preview").on('click',function(e){
    let article_id = $(this).data("article-id");

    $.ajax({
      type:'GET',
      url:'/user/article/review/' + article_id,
      success:function(data){
        if(data){
          $("#loading").hide();
          $("#article-title").html(data.title);
          $("#article-cover__image").attr("src",data.cover_url);
          $("#article-type-link").html(data.subject.name);
          $("#article-content").html(data.content);
          $(".article-cover-container").fadeIn(500);
          $(".article-main-content").fadeIn(500);
        }
      },
      error:function(jqXHR,exception){
        console.log(jqXHR.responseText);
      }
    });
  });

  $(".delete-article-btn").on('click',function(e){
    var article_id = $(this).data("article-id");
    var tr = $(this).parent().parent();

    Swal.fire({
      title:'Xóa bài viết',
      text:' Bài viết sẽ không thể phục hồi sau khi xóa',
      type:'warning',
      showCancelButton:true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Xóa',
      cancelButtonText: 'Đóng'
    }).then((result) => {
      if(result.value){
        $.ajax({
          type:'delete',
          url:'/user/article/delete',
          data:{
            article_id:article_id
          },
          success:function(data){
            Swal.fire(
              'Đã xóa',
              'Xóa thành công',
              'success'
            );
            $(tr).remove();
          },
          error:function(jqXHR,exception){
            console.log(jqXHR.responseText);
          }
        });
      }
    });
  });

  $(".admin-deleted-btn").on('click',function(e){
    let article_id = $(this).data("article-id");

    $.ajax({
      type:'GET',
      url:'/user/article/admin_deleled_info/' + article_id,
      success:function(data){
        Swal.fire({
          title:'Lý do',
          type:'info',
          text:data
        });
      },
      error:function(jqXHR,exception){
        console.log(jqXHR.responseText);
      }
    });
  });

  $(".open-article-preview").animatedModal();
});
