<?php
if(strtolower((string)USER_ROLE) != 'admin' && strtolower((string)USER_ROLE) != 'super admin')
{include COMPS."footer.php";}
include COMPS."pdfBuilder.php"; 
?>
<script>
var siteName = '<?=SITE_NAME?>';
var siteAddr = '<?=SITE_ADDR?>';
</script>

