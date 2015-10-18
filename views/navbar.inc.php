<div class="profile-header">
	<div class="container">
		<div class="row">
			<div class="col-xs-6">
				<h2><i><small><a href="">Looking</a></small></i></h2>
			</div>

			<div class="col-xs-6">
				<?php if (Session::get('user_login') == true):  ?>
					<h2 style="text-align:right"><small><a href="<?php echo URL; ?>dashboard"><i class="fa fa-user"></i> <?php echo Session::get('user_login'); ?></a></small></h2>
				<?php else: ?>
					<h2 style="text-align:right"><small><a href="<?php echo URL; ?>login"><i class="fa fa-user"></i> login</a></small></h2>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>