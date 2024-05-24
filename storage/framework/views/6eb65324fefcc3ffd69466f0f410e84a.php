<?php
//$logo = Utility::GetLogo();
// $estimate_logo = Utility::getValByName('estimation_logo');
?>
<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" dir="<?php echo e(\App\Models\Utility::getValByName('SITE_RTL') == 'on'?'rtl':''); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>New York - Estimate</title>
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
            rel="stylesheet">
       
        <style type="text/css">
            :root {
                --theme-color: #003580;
                --white: #ffffff;
                --black: #000000;
            }
    
            body {
                font-family: 'Lato', sans-serif;
            }
    
            p,
            li,
            ul,
            ol {
                margin: 0;
                padding: 0;
                list-style: none;
                line-height: 1.5;
            }
    
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
    
            table {
                width: 100%;
                border-collapse: collapse;
            }
    
            table tr th {
                padding: 0.75rem;
                text-align: left;
            }
    
            table tr td {
                padding: 0.75rem;
                text-align: left;
            }
    
            table th small {
                display: block;
                font-size: 12px;
            }
    
            .estimate-preview-main {
                max-width: 700px;
                width: 100%;
                margin: 0 auto;
                background: #ffff;
                box-shadow: 0 0 10px #ddd;
            }
    
            .estimate-logo {
                max-width: 200px;
                width: 100%;
            }
    
            .estimate-header table td {
                padding: 15px 30px;
            }
    
            .text-right {
                text-align: right;
            }
    
            .no-space tr td {
                padding: 0;
            }
    
            .vertical-align-top td {
                vertical-align: top;
            }
    
            .view-qrcode {
                max-width: 114px;
                height: 114px;
                margin-left: auto;
                margin-top: 15px;
                background: var(--white);
            }
    
            .view-qrcode img {
                width: 100%;
                height: 100%;
            }
    
            .estimate-body {
                padding: 30px 25px 0;
            }
    
            table.add-border tr {
                border-top: 1px solid var(--theme-color);
            }
    
            tfoot tr:first-of-type {
                border-bottom: 1px solid var(--theme-color);
            }
    
            .total-table tr:first-of-type td {
                padding-top: 0;
            }
    
            .total-table tr:first-of-type {
                border-top: 0;
            }
    
            .sub-total {
                padding-right: 0;
                padding-left: 0;
            }
    
            .border-0 {
                border: none !important;
            }
    
            .estimate-summary td,
            .estimate-summary th {
                font-size: 13px;
                font-weight: 600;
            }
    
            .total-table td:last-of-type {
                width: 146px;
            }
    
            .estimate-footer {
                padding: 15px 20px;
            }
    
            .itm-description td {
                padding-top: 0;
            }
            html[dir="rtl"] table tr td,
            html[dir="rtl"] table tr th{
                text-align: right;
            }
            html[dir="rtl"]  .text-right{
                text-align: left;
            }
            html[dir="rtl"] .view-qrcode{
                margin-left: 0;
                margin-right: auto;
            }
            p:not(:last-of-type){
                margin-bottom: 15px;
            }
            .estimate-summary p{
                margin-bottom: 0;
            }
        </style>
    </head>
    
    <body>
        <div class="estimate-preview-main">
            <div class="estimate-header" style="background: <?php echo e($color); ?>;color:<?php echo e($font_color); ?>">
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <img class="estimate-logo"
                                    src="<?php echo e($img); ?>"
                                    alt="">
                            </td>
                            <td class="text-right">
                                <h3 style="text-transform: uppercase; font-size: 40px; font-weight: bold;"><?php echo e(__('ESTIMATE')); ?></h3>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="vertical-align-top">
                    <tbody>
                        <tr>
                            <td>
                                <strong data-v-f2a183a6=""><?php echo e(__('From')); ?>:</strong>
                                <p>
                                    <?php if($settings['company_name']): ?><?php echo e($settings['company_name']); ?><?php endif; ?><br>
                                    <?php if($settings['company_address']): ?><?php echo e($settings['company_address']); ?><?php endif; ?>
                                    <?php if($settings['company_city']): ?> <br> <?php echo e($settings['company_city']); ?>, <?php endif; ?> <?php if($settings['company_state']): ?><?php echo e($settings['company_state']); ?><?php endif; ?> <?php if($settings['company_zipcode']): ?> - <?php echo e($settings['company_zipcode']); ?><?php endif; ?>
                                    <?php if($settings['company_country']): ?> <br><?php echo e($settings['company_country']); ?><?php endif; ?>
                                </p>
                                <p data-v-f2a183a6="">
                                    <?php echo e(__('Registration Number')); ?> : <?php echo e($settings['registration_number']); ?> <br>
                                    <?php echo e(__('VAT Number')); ?> : <?php echo e($settings['vat_number']); ?> <br>
                                </p>
                            </td>
                            <td>
                                <table class="no-space">
                                    <tbody>
                                        <tr>
                                            <td><?php echo e(__('Number:')); ?> </td>
                                            <td><?php echo e(\App\Models\Utility::estimateNumberFormat($settings,$estimate->estimate)); ?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo e(__('Issue Date:')); ?></td>
                                            <td><?php echo e(\App\Models\Utility::dateFormat($settings,$estimate->issue_date)); ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <div class="view-qrcode">
                                                     <p>  <?php echo DNS2D::getBarcodeHTML(route('pay.estimate',\Illuminate\Support\Facades\Crypt::encrypt($estimate->id)), "QRCODE",2,2); ?></p>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="estimate-body">
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <strong style="margin-bottom: 10px; display:block;">Bill To:</strong>
                                <p>
                                    <?php echo e(!empty($client->company_name)?$client->company_name:''); ?><br>
                                    <?php echo e(!empty($client->name)?$client->name:''); ?><br>
                                    <?php echo e(!empty($client->email)?$client->email:''); ?><br>
                                    <?php echo e(!empty($client->mobile)?$client->mobile:''); ?><br>
                                    <?php echo e(!empty($client->address)?$client->address:''); ?><br>
                                    <?php echo e(!empty($client->zip)?$client->zip:''); ?><br>
                                    <?php echo e(!empty($client->city)?$client->city:'' . ', '); ?> <?php echo e(!empty($client->state)?$client->state:'' .', '); ?>,<?php echo e(!empty($client->country)?$client->country:''); ?>

                                </p>
                            </td>
                            <td class="text-right">
                                <strong style="margin-bottom: 10px; display:block;">Ship To:</strong>
                                <p>
                                    <?php echo e(!empty($client->company_name)?$client->company_name:''); ?><br>
                                    <?php echo e(!empty($client->name)?$client->name:''); ?><br>
                                    <?php echo e(!empty($client->email)?$client->email:''); ?><br>
                                    <?php echo e(!empty($client->mobile)?$client->mobile:''); ?><br>
                                    <?php echo e(!empty($client->address)?$client->address:''); ?><br>
                                    <?php echo e(!empty($client->zip)?$client->zip:''); ?><br>
                                    <?php echo e(!empty($client->city)?$client->city:'' . ', '); ?> <?php echo e(!empty($client->state)?$client->state:'' .', '); ?>,<?php echo e(!empty($client->country)?$client->country:''); ?>

                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="add-border estimate-summary" style="margin-top: 30px;">
                    <thead style="background-color: <?php echo e($color); ?>;color:<?php echo e($font_color); ?> ">
                        <tr>
                            <th><?php echo e(__('Item')); ?></th>
                            <th><?php echo e(__('Quantity')); ?></th>
                            <th><?php echo e(__('Rate')); ?></th>
                            <th><?php echo e(__('Tax')); ?>(%)</th>
                            <th><?php if($estimate->discount_apply==1): ?>
                                    <div class="d-table-th w-2"><?php echo e(__('Discount')); ?></div>
                                <?php endif; ?>
                            </th>
                            <th class=""><?php echo e(__('Price')); ?> <small><?php echo e(__('before tax & discount')); ?></small></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($estimate->items) && count($estimate->items) > 0): ?>
                        <?php $__currentLoopData = $estimate->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                            <td><?php echo e($item->name); ?></td>
                            <td><?php echo e($item->quantity); ?></td>
                            <td><?php echo e(\App\Models\Utility::priceFormat($settings,$item->price)); ?></td>
                            <td>
                                <?php $__currentLoopData = $item->itemTax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taxes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(!empty($item->itemTax)): ?>
                                    <p>
                                        <span><?php echo e($taxes['name']); ?></span>  <span>(<?php echo e($taxes['rate']); ?>)</span> <span><?php echo e($taxes['price']); ?></span>
                                    </p>
                                    <?php else: ?>
                                    <p>-</p>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                            <td><?php if($estimate->discount_apply==1): ?>
                                    <?php echo e(($item->discount!=0)?\App\Models\Utility::priceFormat($settings,$item->discount):'-'); ?>

                                <?php endif; ?>
                            </td>
                            <td><?php echo e(\App\Models\Utility::priceFormat($settings,$item->price * $item->quantity)); ?></td>
                        </tr>  
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td><?php echo e(__('Total')); ?></td>
                            <td><?php echo e($estimate->totalQuantity); ?></td>
                            <td><?php echo e(\App\Models\Utility::priceFormat($settings,$estimate->totalRate)); ?></td>
                            <td><?php echo e(\App\Models\Utility::priceFormat($settings,$estimate->totalTaxPrice)); ?></td>
                            <td><?php if($estimate->discount_apply==1): ?>
                                    <?php echo e(\App\Models\Utility::priceFormat($settings,$estimate->totalDiscount)); ?>

                                    <?php else: ?>
                                    --
                                    <?php endif; ?>
                            </td>
                            <td>
                                <?php echo e(\App\Models\Utility::priceFormat($settings,$estimate->getSubTotal())); ?>

                            </td>
                        </tr>
                        <tr>
                            <td colspan="4"></td>
                            <td colspan="2" class="sub-total">
                                <table class="total-table">
                                    <?php if($estimate->discount_apply==1): ?>
                                        <?php if($estimate->getTotalDiscount()): ?>
                                            <tr>
                                                <td><?php echo e(__('Discount')); ?>: </td>
                                                <td><?php echo e(\App\Models\Utility::priceFormat($settings,$estimate->getTotalDiscount())); ?></td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if(!empty($estimate->taxesData)): ?>
                                        <?php $__currentLoopData = $estimate->taxesData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taxName => $taxPrice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($taxName); ?> :</td>
                                            <td><?php echo e(\App\Models\Utility::priceFormat($settings,$taxPrice)); ?></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                     <tr>
                                        <td><?php echo e(__('Total')); ?>:</td>
                                        <td>
                                            <?php echo e(\App\Models\Utility::priceFormat($settings,$estimate->getSubTotal()-$estimate->getTotalDiscount()+$estimate->getTotalTax())); ?>

                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </tfoot>
                </table>
                <div data-v-f2a183a6="" class="d-body1">
                    <p data-v-f2a183a6="">
                        <?php echo e($settings['footer_title']); ?> <br>
                        <?php echo e($settings['footer_notes']); ?>

                    </p>
                </div>
                <div data-v-4b3dcb8a="" class="break-25"></div>
                <div class="estimate-footer">
                    <?php if(!isset($preview)): ?>
                        <?php echo $__env->make('estimate.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
                    <?php endif; ?>
                    <p>Thanks!</p>
                </div>
            </div>
        </div>
   
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\crmgo\resources\views/estimate/templates/template1.blade.php ENDPATH**/ ?>