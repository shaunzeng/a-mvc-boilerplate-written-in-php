$(function(){
	/*
	$.get('dashboard/xhrGetPosts',function(data){
		
		for(var i=0;i<data.length;i++){
			var html = "<div class='posted-wrap clearfix' data-post-id='"+data[i].id+"'><div class='post-head clearfix'><img src='userdata/profile_pics/img/default.jpg' alt='image' class='post-pic' /><div class='post-title '><p><a href=''><strong>"+data[i].added_by+"</strong></a></p><h6>"+data[i].date_added+"</h6></div></div><div class='posted-body'><p>"+data[i].body+"</p></div><hr><ul class='list-unstyled list-inline'><li><a href='#'><i class='fa fa-heart-o'></i> Like</a></li></ul></div>";

			$("#posts_area").append(html);
		}

	},'json');*/

	$("#post_form").on("submit", function(e){
		e.preventDefault();
		var url = $(this).attr('action');
		var data =$(this).serialize();

		$.post(url,data,function(data){
			
			var html = "<div class='posted-wrap clearfix' data-post-id=''><div class='post-head clearfix'><img src='userdata/profile_pics/img/default.jpg' alt='image' class='post-pic' /><div class='post-title '><p><a href=''><strong>"+data.added_by+"</strong></a></p><h6>"+data.date_added+"</h6></div></div><div class='posted-body'><p>"+data.body+"</p></div><hr><ul class='list-unstyled list-inline'><li><a href='#'><i class='fa fa-heart-o'></i> Like</a></li></ul></div>";
			$("#posts_area").prepend(html);
		}, 'json').success(function(){

			$('#post').val('');
		});

		return true;
	});
});