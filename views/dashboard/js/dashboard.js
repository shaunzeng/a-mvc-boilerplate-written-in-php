$(function(){
	$.get('dashboard/xhrGetPosts',function(data){
		
		for(var i=0;i<data.length;i++){
			var html = "<div class='posted-wrap clearfix' data-post-id='"+data[i].id+"'><div class='post-head clearfix'><img src='userdata/profile_pics/img/default.jpg' alt='image' class='post-pic' /><div class='post-title '><p><a href=''><strong>"+data[i].added_by+"</strong></a></p><h6>"+data[i].date_added+"</h6></div></div><div class='posted-body'><p>"+data[i].body+"</p></div><hr><ul class='list-unstyled list-inline'><li><a href='#'><i class='fa fa-heart-o'></i> Like</a></li></ul></div>";
			$("#posts_area").append(html);
		}

	},'json');

	
	$.get('dashboard/loginUserInfo', function(data){
		console.log(data);
		var $profile =$(".profile");
		$profile.find(".profile-pic img").attr("src","userdata/profile_pics/"+data[0].profile_pic);
		$profile.find(".profile-title.name").text(data[0].first_name +" "+ data[0].last_name);
		$profile.find(".profile-bio").text(data[0].bio);
		$profile.find(".show-block .alert.alert-success").text("Welcome, "+data[0].username);

		var friends = data[0].friend_array.split(",");
		for (var i =0; i<friends.length; i++){
			var html = "<li><a href='users/"+friends[i]+"'>"+friends[i]+"</a></li>";
			$profile.find(".profile-friend-list ul").append(html);
		}
	},'json')

});