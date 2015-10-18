<?php 
	require 'views/navbar.inc.php';
	
	foreach($this->this_user_info as $info) {
		$username = $info["username"];
		$firstName = $info["first_name"];
		$lastName = $info["last_name"];
		$id=$info["id"];
		$profile_pic = $info["profile_pic"];
		$bio = $info["bio"];
		$friends = $info["friend_array"];
	}
?>

<div class="container profile">

	<div class="row">
		<div class="col-xs-3">
			<div class="profile-pic">
				<img src="<?php echo URL; ?>userdata/profile_pics/<?php echo $profile_pic; ?>" alt="profile photo" />
			</div>
			<div class="profile-title name"> <?php echo $firstName." ".$lastName; ?></div>
			<div class="profile-bio"> <?php echo $bio; ?></div>
			<br/>
			<div class="show-block">
				<div class="alert alert-success">Welcome, <?php echo $username; ?></div>
				<a href="<?php echo URL; ?>my_album">
					<button class="btn btn-primary" id="viewalbums" name="viewalbums"><i class="fa fa-file-photo-o"></i> View Albums</button>
				</a>
			</div>
			<br/>
			<div class="profile-friend-list">
				<div class="profile-title">Friend list</div>
				<ul class="list-unstyled">
					<?php
						$friends = explode(',', $friends);

						foreach($friends as $fr){
							echo '<li><a href="'.URL.'users/'.$fr.'">'.$fr.'</a></li>';
						}

					?>
				</ul>
			</div>
		</div>
		<div class="col-xs-6">
			<div class="wrap">
				
				<div class="row">
					<form id="post_form" action="dashboard/xhrInsert">
						<div class="col-xs-9">
							<textarea id="post" name="post" maxlength="100" placeholder="What do you want to say?"></textarea>
						</div>

						<div class="col-xs-3" style="padding-left:0">
							<button type="submit" class="btn btn-primary" id="post-btn">Post</button>
						</div>
					</form>
				</div>
			
			</div>
			<br>
				
			<div class="wrap" style="background-color:#F3F2F2;" id="posts_area" style="padding-bottom:5px;" >
				<?php

					foreach ($this->this_user_posts as $post){

						echo '<div class="posted-wrap clearfix" data-post-id="'.$post["id"].'">
							     <div class="post-head clearfix">
							         <img src="../userdata/profile_pics/img/default.jpg" alt="profile pic" class="post-pic" />
							         <div class="post-title">
								     	<p><a href="users/'.$post["added_by"].'"><strong>'.$post["added_by"].'</strong></a></p>
								     	<h6>'.$post["date_added"].'</h6>
								     </div>
							     </div>

							     <div class="posted-body">
							     	<p>'.$post["body"].'</p>
							     </div>
							     <hr/>

							     <ul class="list-unstyled list-inline">
									<li><a href="#"><i class="fa fa-heart-o"></i> Like</a></li>
								</ul>
							     
							  </div>';

					}

				 ?>
	
			</div>
			
		</div>
		<div class="col-xs-3">
			
		</div>
	</div>
</div>
