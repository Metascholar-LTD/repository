
<!-- Page filter crumbs components-->
<?php
if(count(explode('?',get_url())) >= 2){
$params = explode('?',get_url())[1];
$param = explode('&',$params);
if(count($param) >= 2 || explode('=',$param[0])[0] != 'ps'){
?>
<nav class="page-header-breadcrumbs mb-2" aria-label="breadcrumb">
	<ul class="breadcrumb m-0 p-0 bg-0 centeredL">
		<li class="px-2" to href="<?php print_link(); ?>">
			Filtering <i class="pi pi-arrow-right small mx-2"></i>
		</li>
		<?php 
		if(!empty($param)){
		foreach($param as $item){ 
		$item = explode('=', $item);
		if($item[0] != 'ps'){ 
		?>
			<li class="px-2 p-1">
				<button class="pill">
					<?=urldecode($item[1])?><i class="pi pi-times small ml-1" to removefilter="<?=$item[0]?>" ></i>
				</button>
			</li>
		<?php
		}
		} 
		}	
		?>
		
	</ul>
</nav>
<?php } } ?>
<!--End of Page bread crumbs components-->

