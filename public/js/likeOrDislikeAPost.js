$('#checkLikeStatusBtn').trigger('click');
              

function didUserLikeThisPost(user_id,post_id){

  $.ajax({
        'method':'post',
        'url':"/didUserLikeThisPost",
        'data': {'user_id':user_id,'post_id':post_id},
        'headers':{
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
  

      }).fail(function(code,err){console.log(err);})
        .done(function(didUserLikeThisPost){
        console.log(didUserLikeThisPost);

        if(didUserLikeThisPost){
              $('#heart').css('color','red');
        }else{
            $('#heart').css('color','');
        }

      });

}


function makeUserLikeOrDislikeThisPost(user_id,post_id){


      $.ajax({
        'method':'post',
        'url':"/makeUserLikeOrDislikeThisPost",
        'data': {'user_id':user_id,'post_id':post_id},
        'headers':{
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
  

      }).fail(function(code,err){console.log(err);})
        .done(function(res){
        console.log(res);

        $('#numberOfLikes').html("");
        $('#numberOfLikes').html(res.number_of_likes + " likes");

            didUserLikeThisPost(user_id,post_id);
    
      });

}

