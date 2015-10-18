
		</div>
		<div id='footer'></div>
		
		<script type="text/javascript" src="<?php echo URL; ?>public/js/custom.js"></script>
		<?php
			if(isset($this->js)){
				foreach ($this->js as $js){
					echo '<script type="text/javascript" src="'.URL.'views/'.$js.'"></script>';
				}
			};
		 ?>
	</body>
</html>