<?php
$ctrl = new BillController;
$ct = new ApiController;
$studentCount = $ct->countStudentsInClassRoom($rec_id, $year, $session);
$classBillDue = $ctrl->classBillDue($rec_id, $year, $session);
$classBillDue = $classBillDue * $studentCount;
$classBillPaid = $ctrl->classBillPaid($rec_id, $year, $session);
$classBillBalance = $classBillDue - $classBillPaid;
?>
<div class="owl-item">
    <div class="border border-2 hover-primary shadow-0 card p-3 o-0" style="width:100%; padding-bottom:0px !important;">
        <div class="">
            <div class="">Sessions Due fees = GHc <?=approximate($classBillDue);?></div>
        </div>
        <div class="my-2" style="margin-left:-8px;">
            <table class="table table-borderless">
                <tr>
                    <td>
                        <div class="mb-2">AMOUNT PAID</div>
                        <h3 class="bold">GHc <?=approximate($classBillPaid);?></h3>
                        <div class="small">Accounting for <i class="text-success">71%</i> of total</div>
                    </td>
                    <td>
                        <div class="mb-2">BALANCE</div>
                        <h3 class="bold">GHc <?=approximate($classBillBalance)?></h3>
                        <div class="small">Accounting for <i class="text-danger">29%</i> of total</div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="mx-fill">
            <div class="col-12 centeredB border-top p-3 bg-white">
                <div class="small text-muted">
                    23rd Jun 2023
                </div>
                <div class="">
                    <button class="btn btn-sm btn-outline-dark page-modal" modal-size="modal-xl" href=<?php print_link("bill/class/$rec_id/?y=$year&s=$session");?>>
                        Explode More <i class="pi pi-chevron-right small"></i>
                    </button>
                </div>
            </div>   
        </div>
    </div>
</div>