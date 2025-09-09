<?php
$licience = htmlText('liciencePrice');
$dateInstalled = '2023-11-12';
$pCycle = calculateDateDueCycle($dateInstalled);
$daysUsedof100 = ($pCycle['daysUsed'] * 100)/356;
$ctrl = new ApiController;
$items = $ctrl->arr("SELECT * FROM packages");
?>


<div class="pageSection">
    <div class="container px-0">
        <div class="mb-4">
            <div class="mb-1 centeredB">
                <div class="text-md text-400">Billing & Subscriptions</div>
                <div class="centered">
                    <button class="btn btn-light" style="border-radius: 10px 0px 0px 10px;">Status</button>
                    <button class="btn btn-success bold" style="border-radius: 0px 10px 10px 0px;">Active</button>
                </div>
            </div>
            <div>
                <h3 class="bold text-black">Catholic University of Ghana - CUG23</h3>
            </div>
        </div>
        <hr>
        <div>
            <div class="p-3 hover-warning border active round-md">
                <h4 class="mb-3">Subscription Licencing</h4>
                <table class="table table-hover mb-3">
                    <tr>
                        <th>Licience type</th>
                        <th>Price USD</th>
                        <th>Duration</th>
                        <th>Status</th>
                    </tr>
                    <tr>
                        <td class="text-black">Enterprice</td>
                        <td class="text-black"><?=$licience?></td>
                        <td class="text-black">1year</td>
                        <td class="text-black">Activated</td>
                    </tr>
                </table>
            </div>

            <div class="mt-3">
                <h4 class="mb-3">Subscription Life cycle</h4>
                <div class="centeredB small text-muted">
                    <div>Date Subscribed</div>
                    <div>Expiring Date</div>
                </div>
                <div class="border" style="background-color:yellow;">
                    <div class="bg-danger" style="width:<?=$daysUsedof100?>%;height:5px;"></div>
                </div>
                <div class="centeredB">
                    <div><?=date('jS M. Y', strtotime($dateInstalled))?></div>
                    <div><?=$pCycle['oneYearLater'];?></div>
                </div>
            </div>
        </div>
        <hr>
        <div>
            <div class="mb-3 centeredB">
                <h4>Renewable Packages & Plugins</h4>
                <div class="centeredR">
                    <select name="" id="" class="form-control mr-2">
                        <option value=""><?=date('Y')?></option>
                    </select>
                    <select name="" id="" class="form-control mr-2">
                        <option value="">Packages</option>
                        <option value="">Suits</option>
                        <option value="">Stand-alone </option>
                    </select>
                    <select name="" id="" class="form-control">
                        <option value=""><?='Installed'?></option>
                    </select>
                </div>
            </div>
            <div class="surface border-gold py-3 round-md border">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Avt</th>
                            <th>Package</th>
                            <th>Status</th>
                            <th>Price</th>
                            <th>Duration</th>
                            <th>Switch</th>
                        </tr>
                    </thead>
                    <?php 
                    $total = 0; foreach($items as $item){ 
                    $total = $total + $item['price'];
                    switch ($item['status']) {
                        case '1':
                            $status = 'Installed';
                            break;
                        case '0':
                            $status = 'Uninstalled';
                            break;
                        case '0.5':
                            $status = 'Deactivated';
                            break;
                        default:
                            $status = 'Expired';
                            break;
                    }
                    ?>
                    <tr>
                        <td>
                            <i class="pi pi-folder text-lg text-400"></i>
                        </td>
                        <td>
                            <span class="text-primary"><?=$item['title']?></span>
                            <div class="small">23rd June 2023</div>
                        </td>
                        <td><?=$status?></td>
                        <td class="text-black">
                            <?=approximate($item['price'])?> USD
                        </td>
                        <td><?=$item['duration']?></td>
                        <td>
                            <?php Html :: check_button($item['status'], "1");?>
                        </td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <td></td>
                        <td class="text-md">Sum of Plugins</td>
                        <td><f class="text-success">PAID</f></td>
                        <td class="text-black text-md bold"><?=$total?> USD</td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
        <hr>
        <div>
            <h4 class="mb-3">Sum of Total</h4>
            <h1 class="text-black bold"><?=approximate($licience+$total)?> USD</h1>
            <p>Next Due Payment: <?=$pCycle['oneYearLater'];?></p>
            <!-- <button class="btn btn-primary" to href="makepayment">Make payment</button> -->
        </div>
    </div>
</div>