<?php 
	require 'views/navbar.inc.php';
?>

<div class="container profile">

	<div class="row">
		<div class="col-xs-3">
			<div class="profile-pic">
				<img src="" alt="profile photo" />
			</div>
			<div class="profile-title name"></div>
			<div class="profile-bio"></div>
			<br/>
			<div class="show-block">
				<div class="alert alert-success"></div>
				<a href="<?php echo URL; ?>my_album">
					<button class="btn btn-primary" id="viewalbums" name="viewalbums"><i class="fa fa-file-photo-o"></i> View Albums</button>
				</a>
			</div>
			<br/>
			<div class="profile-friend-list">
				<div class="profile-title">Friend list</div>
				<ul class="list-unstyled"></ul>
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
	
			</div>
			
		</div>
		<div class="col-xs-3">
			<div class="wrap btn-list"> 
				<ul class="list-unstyled">
					<li><a href="<?php echo URL; ?>">Account Settings</a></li>
					<li><a href="<?php echo URL; ?>help">Message</a></li>
					<li><a href="">Friend Request</a></li>
					<li><a href="dashboard/logout">Logout</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
