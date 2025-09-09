
<!-- Page bread crumbs components-->
<?php $order = isset($order) ? $order : ''; ?>
<nav class="page-header-breadcrumbs mb-2" aria-label="breadcrumb">
	<ul class="breadcrumb m-0 p-0 bg-0 centeredL">
		<li class="breadcrumb-item">
			<a class="text-decoration-none" to href="<?php print_link(); ?>">
				<i class="bi bi-house-door"></i>
			</a>
		</li>
		<li class="breadcrumb-item" to href="<?php print_link(); ?>">
			Home page
		</li>
		<?php
				if(!empty($field_name)){
		?>
			<li class="breadcrumb-item">
				<a class="text-decoration-none">
					<i class="bi bi-three-dots"></i>
				</a>
			</li>
			<li class="breadcrumb-item">
				<a class="text-decoration-none" to href="<?php print_link($root); ?>">
					<?=$root?>
				</a>
			</li>
			<li class="breadcrumb-item">
				<?php echo (get_value("tag") ? get_value("tag")  :  make_readable($field_name)); ?>
			</li>
			<li  class="breadcrumb-item active text-capitalize bold text-primary">
				<?php echo (get_value("label") ? get_value("label")  :  make_readable(urldecode($field_value))); ?>
			</li>
		<?php 
			}	
		?>
		<?php
			if(get_value("search")){
		?>
			<li class="breadcrumb-item">
				<a class="text-decoration-none">
					<i class="bi bi-three-dots"></i>
				</a>
			</li>
			<li class="breadcrumb-item">
				<a class="text-decoration-none" to href="<?php print_link($root); ?>">
					<?=$root?>
				</a>
			</li>
			<li class="breadcrumb-item text-capitalize">
				[html-lang-0035]
			</li>
			<li  class="breadcrumb-item active text-capitalize bold text-primary"><?php echo get_value("search"); ?></li>
		<?php
		}
		?>
	</ul>
</nav>
<!--End of Page bread crumbs components-->

