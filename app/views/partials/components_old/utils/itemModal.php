<!-- Modal page for displaying ajax page -->
<div id="<?=$modalId?>" class="modal" role="dialog">
	<div class="modal-dialog modal-dialog-centered <?= (isset($modalSize) ? $modalSize : 'modal-sm')?>"  role="document">
		<div class="modal-content">
			<div class="modal-body">
                <?=$modalContent?>
			</div>
			<div style="top: 5px; right:5px; z-index: 9999;" class="position-absolute">
				<button type="button" class="pi pi-times bg-0 text-lg" data-dismiss="modal"></button>
			</div>
		</div>
	</div>
</div>