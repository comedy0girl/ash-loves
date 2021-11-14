<nav>
	<div class="nav_wrap">
		<div class="switch">
			<label class="switch">
			  <input type="checkbox" value="1" name="checkMeOut" id="myCheck" checked="checked">
			  <span class="slider round"></span>
			</label>


		</div>
		<div class="nav">
			<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
		</div>
	</div>

</nav>