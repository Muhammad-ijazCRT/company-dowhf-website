<?php

    $users = \Auth::user();
    $profile = \App\Models\Utility::get_file('uploads/avatar/');
    $currantLang = $users->currentLanguage();
    $emailTemplate = App\Models\EmailTemplate::first();
    $logo = \App\Models\Utility::get_file('uploads/logo/');

    $company_logo = \App\Models\Utility::GetLogo();
    //  dd($company_logo);
?>

<?php if(isset($settings['cust_theme_bg']) && $settings['cust_theme_bg'] == 'on'): ?>
    <nav class="dash-sidebar light-sidebar transprent-bg">
    <?php else: ?>
        <nav class="dash-sidebar light-sidebar">
<?php endif; ?>
<div class="navbar-wrapper">
    <div class="m-header main-logo">
        <a href="#" class="b-brand">

            <?php if($settings['cust_darklayout'] == 'on'): ?>
                <img src="<?php echo e($logo . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'logo-light.png') . '?timestamp=' . time()); ?>"
                    alt="" class="img-fluid" />
            <?php else: ?>
                <img src="<?php echo e($logo . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'logo-dark.png') . '?timestamp=' . time()); ?>"
                    alt="" class="img-fluid" />
            <?php endif; ?>

        </a>
    </div>
    <div class="navbar-content">
        <ul class="dash-navbar">
            <li class="dash-item">
                <a href="<?php echo e(route('dashboard')); ?>" class="dash-link"><span class="dash-micon"><i
                            class="ti ti-home"></i></span><span class="dash-mtext"><?php echo e(__('Dashboard')); ?></span></a>
            </li>

            <?php if(\Auth::user()->type == 'super admin'): ?>
                <li class="dash-item">
                    <a href="<?php echo e(route('users.index')); ?>"
                        class="dash-link <?php echo e(Request::segment(1) == 'users' ? 'active' : ''); ?>">
                        <span class="dash-micon"><i class="ti ti-users"></i></span> <span
                            class="dash-mtext"><?php echo e(__('Company')); ?> </span>
                    </a>
                </li>
            <?php endif; ?>


            <?php if(\Auth::user()->type == 'company'): ?>
                <li
                    class="dash-item dash-hasmenu <?php echo e(Request::segment(1) == 'employee' || Request::segment(1) == 'client' || Request::segment(1) == 'userlogs' || Request::segment(1) == 'clientlogs' ? 'active dash-trigger' : ''); ?>">
                    <a class="dash-link " data-toggle="collapse" role="button"
                        aria-controls="navbar-getting-started"><span class="dash-micon"><i
                                class="ti ti-users"></i></span><span class="dash-mtext"><?php echo e(__('Staff')); ?></span><span
                            class="dash-arrow"><i data-feather="chevron-right"></i></span></a>
                    <ul class="dash-submenu">
                        <li
                            class="dash-item dash-hasmenu <?php echo e(Request::segment(1) == 'employee' || Request::segment(1) == 'userlogs' ? 'active ' : ''); ?>">
                            <a class="dash-link" href="<?php echo e(route('employee.index')); ?>"><?php echo e(__('Employee')); ?></span></a>

                        </li>
                        <li
                            class="dash-item dash-hasmenu <?php echo e(Request::segment(1) == 'client' || Request::segment(1) == 'clientlogs' ? 'active' : ''); ?>">
                            <a class="dash-link" href="<?php echo e(route('client.index')); ?>"><?php echo e(__('Client')); ?></a>

                        </li>

                    </ul>
                </li>
            <?php elseif(\Auth::user()->type == 'employee'): ?>
                <li class="dash-item  <?php echo e(Request::segment(1) == 'employee' ? 'active ' : ''); ?>">
                    <a href="<?php echo e(route('employee.show', \Crypt::encrypt(\Auth::user()->id))); ?>" class="dash-link"><span
                            class="dash-micon"><i class="ti ti-accessible"></i></span><span
                            class="dash-mtext"><?php echo e(__('My Profile')); ?></span></a>

                </li>
            <?php elseif(\Auth::user()->type == 'client'): ?>
                <li class="dash-item <?php echo e(Request::segment(1) == 'client' ? 'active ' : ''); ?>">
                    <a href="<?php echo e(route('client.show', \Crypt::encrypt(\Auth::user()->id))); ?>" class="dash-link"><span
                            class="dash-micon"><i class="ti ti-home"></i></span><span
                            class="dash-mtext"><?php echo e(__('My Profile')); ?></span></a>

                </li>
            <?php endif; ?>

            <?php if(\Auth::user()->type == 'company' || \Auth::user()->type == 'employee'): ?>
                <li class="dash-item dash-hasmenu">
                    <a href="#!" class="dash-link"><span class="dash-micon"><i
                                class="ti ti-hand-three-fingers"></i></span><span
                            class="dash-mtext"><?php echo e(__('HR')); ?></span><span class="dash-arrow"><i
                                data-feather="chevron-right"></i></span></a>
                    <ul class="dash-submenu">
                        <?php if(\Auth::user()->type == 'company'): ?>
                            <li class="dash-item dash-hasmenu">
                                <a class="dash-link" href="#"><?php echo e(__('Attendance')); ?><span class="dash-arrow"><i
                                            data-feather="chevron-right"></i></span></a>
                                <ul class="dash-submenu">
                                    <li class="dash-item">
                                        <a class="dash-link"
                                            href="<?php echo e(route('attendance.index')); ?>"><?php echo e(__('Attendance')); ?></a>
                                    </li>
                                    <li class="dash-item">
                                        <a class="dash-link"
                                            href="<?php echo e(route('bulk.attendance')); ?>"><?php echo e(__('Bulk Attendance')); ?></a>
                                    </li>
                                </ul>
                            </li>
                        <?php elseif(\Auth::user()->type == 'employee'): ?>
                            <li class="dash-item ">
                                <a class="dash-link" href="<?php echo e(route('attendance.index')); ?>"><?php echo e(__('Attendance')); ?></a>
                            </li>
                        <?php endif; ?>
                        <li class="dash-item ">
                            <a class="dash-link" href="<?php echo e(route('holiday.index')); ?>"><?php echo e(__('Holiday')); ?></a>
                        </li>
                        <li class="dash-item">
                            <a class="dash-link" href="<?php echo e(route('leave.index')); ?>"><?php echo e(__('Leave')); ?></a>
                        </li>
                        <li class="dash-item">
                            <a class="dash-link"
                                href="<?php echo e(!empty(\Auth::user()->getDefualtViewRouteByModule('meeting')) ? route(\Auth::user()->getDefualtViewRouteByModule('meeting')) : route('meeting.index')); ?>"><?php echo e(__('Meeting')); ?></a>
                        </li>
                        <li class="dash-item">
                            <a class="dash-link" href="<?php echo e(route('account-assets.index')); ?>"><?php echo e(__('Asset')); ?></a>
                        </li>
                        <li class="dash-item">
                            <a class="dash-link" href="<?php echo e(route('document-upload.index')); ?>"><?php echo e(__('Document')); ?></a>
                        </li>
                        <li class="dash-item">
                            <a class="dash-link"
                                href="<?php echo e(route('company-policy.index')); ?>"><?php echo e(__('Company Policy')); ?></a>
                        </li>
                        <li class="dash-item dash-hasmenu">
                            <a class="dash-link" href="#"><?php echo e(__('HR Admin')); ?><span class="dash-arrow"><i
                                        data-feather="chevron-right"></i></span></a>
                            <ul class="dash-submenu">
                                <li class="dash-item">
                                    <a class="dash-link" href="<?php echo e(route('award.index')); ?>"><?php echo e(__('Award')); ?></a>
                                </li>
                                <li class="dash-item">
                                    <a class="dash-link"
                                        href="<?php echo e(route('transfer.index')); ?>"><?php echo e(__('Transfer')); ?></a>
                                </li>
                                <li class="dash-item">
                                    <a class="dash-link"
                                        href="<?php echo e(route('resignation.index')); ?>"><?php echo e(__('Resignation')); ?></a>
                                </li>
                                <li class="dash-item">
                                    <a class="dash-link" href="<?php echo e(route('trip.index')); ?>"><?php echo e(__('Trip')); ?></a>
                                </li>
                                <li class="dash-item">
                                    <a class="dash-link"
                                        href="<?php echo e(route('promotion.index')); ?>"><?php echo e(__('Promotion')); ?></a>
                                </li>
                                <li class="dash-item">
                                    <a class="dash-link"
                                        href="<?php echo e(route('complaint.index')); ?>"><?php echo e(__('Complaints')); ?></a>
                                </li>
                                <li class="dash-item">
                                    <a class="dash-link" href="<?php echo e(route('warning.index')); ?>"><?php echo e(__('Warning')); ?></a>
                                </li>
                                <li class="dash-item">
                                    <a class="dash-link"
                                        href="<?php echo e(route('termination.index')); ?>"><?php echo e(__('Termination')); ?></a>
                                </li>
                            </ul>
                        </li>
                        <li class="dash-item dash-hasmenu">
                            <a class="dash-link" href="#"><?php echo e(__('Performance')); ?><span class="dash-arrow"><i
                                        data-feather="chevron-right"></i></span></a>
                            <ul class="dash-submenu">
                                <li class="dash-item">
                                    <a class="dash-link"
                                        href="<?php echo e(route('indicator.index')); ?>"><?php echo e(__('Indicator')); ?></a>
                                </li>
                                <li class="dash-item">
                                    <a class="dash-link"
                                        href="<?php echo e(route('appraisal.index')); ?>"><?php echo e(__('Appraisal')); ?></a>
                                </li>
                                <li class="dash-item">
                                    <a class="dash-link"
                                        href="<?php echo e(route('goaltracking.index')); ?>"><?php echo e(__('Goal
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    Tracking')); ?></a>
                                </li>
                            </ul>
                        </li>
                        <li
                            class="dash-item dash-hasmenu <?php echo e(Request::segment(1) == 'training' || Request::segment(1) == 'trainer' ? 'active dash-trigger' : ''); ?>">
                            <a class="dash-link" href="#"><?php echo e(__('Training')); ?><span class="dash-arrow"><i
                                        data-feather="chevron-right"></i></span></a>
                            <ul class="dash-submenu">
                                <li
                                    class="dash-item dash-hasmenu  <?php echo e(Request::segment(1) == 'training' ? 'active' : ''); ?>">
                                    <a class="dash-link"
                                        href="<?php echo e(route('training.index')); ?>"><?php echo e(__('Training List')); ?></a>
                                </li>
                                <li
                                    class="dash-item dash-hasmenu  <?php echo e(Request::segment(1) == 'trainer' ? 'active' : ''); ?>">
                                    <a class="dash-link" href="<?php echo e(route('trainer.index')); ?>"><?php echo e(__('Trainer')); ?></a>
                                </li>

                            </ul>
                        </li>

                    </ul>
                </li>
            <?php endif; ?>

            <?php if(\Auth::user()->type == 'company' || \Auth::user()->type == 'employee' || \Auth::user()->type == 'client'): ?>
                <li
                    class="dash-item dash-hasmenu <?php echo e(Request::segment(1) == 'lead' || Request::segment(1) == 'deal' || Request::segment(1) == 'estimate' || Request::segment(1) == 'form_builder' || Request::segment(1) == 'form_response' ? 'active dash-trigger' : ''); ?>">
                    <a href="#!" class="dash-link"><span class="dash-micon"><i
                                class="ti ti-layout-2"></i></span><span
                            class="dash-mtext"><?php echo e(__('PreSale')); ?></span><span class="dash-arrow"><i
                                data-feather="chevron-right"></i></span></a>
                    <ul class="dash-submenu">
                        <?php if(\Auth::user()->type == 'company' || \Auth::user()->type == 'employee'): ?>
                            <li class="dash-item dash-hasmenu <?php echo e(Request::segment(1) == 'lead' ? 'active' : ''); ?>">
                                <a class="dash-link"
                                    href="<?php echo e(!empty(\Auth::user()->getDefualtViewRouteByModule('lead')) ? route(\Auth::user()->getDefualtViewRouteByModule('lead')) : route('lead.index')); ?>"><?php echo e(__('Lead')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(\Auth::user()->type == 'company' || \Auth::user()->type == 'client'): ?>
                            <li class="dash-item dash-hasmenu <?php echo e(Request::segment(1) == 'deal' ? 'active' : ''); ?>">
                                <a class="dash-link"
                                    href="<?php echo e(!empty(\Auth::user()->getDefualtViewRouteByModule('deal')) ? route(\Auth::user()->getDefualtViewRouteByModule('deal')) : route('deal.index')); ?>"><?php echo e(__('Deal')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(\Auth::user()->type == 'company' || \Auth::user()->type == 'client'): ?>
                            <li
                                class="dash-item dash-hasmenu <?php echo e(Request::segment(1) == 'estimate' ? 'active' : ''); ?>">
                                <a class="dash-link" href="<?php echo e(route('estimate.index')); ?>"><?php echo e(__('Estimation')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(\Auth::user()->type == 'company'): ?>
                            <li
                                class="dash-item dash-hasmenu <?php echo e(Request::segment(1) == 'form_builder' || Request::segment(1) == 'form_response' ? 'active' : ''); ?>">
                                <a class="dash-link"
                                    href="<?php echo e(route('form_builder.index')); ?>"><?php echo e(__('Form Builder')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if(\Auth::user()->type == 'company' || \Auth::user()->type == 'client' || \Auth::user()->type == 'employee'): ?>
                <li
                    class="dash-item dash-hasmenu <?php echo e(Request::segment(1) == 'project' || Request::segment(1) == 'allTask' || Request::segment(1) == 'allTimesheet' ? 'active dash-trigger' : ''); ?>">
                    <a href="#!" class="dash-link"><span class="dash-micon"><i
                                class="ti ti-list-check"></i></span><span
                            class="dash-mtext"><?php echo e(__('Project')); ?></span><span class="dash-arrow"><i
                                data-feather="chevron-right"></i></span></a>
                    <ul class="dash-submenu">
                        <li
                            class="dash-item dash-hasmenu <?php echo e(Request::segment(1) == 'project' && Request::segment(2) != 'allTask' && Request::segment(2) != 'allTaskKanban' && Request::segment(2) != 'allTimesheet' ? 'active  dash-trigger' : ''); ?>">
                            <a class="dash-link" href="<?php echo e(route('project.index')); ?>"><?php echo e(__('All Project')); ?></a>
                        </li>
                        <?php if(\Auth::user()->type == 'company' || \Auth::user()->type == 'employee'): ?>
                            <li
                                class="dash-item dash-hasmenu <?php echo e(Request::segment(2) == 'allTask' || Request::segment(2) == 'allTaskKanban' ? 'active' : ''); ?>">
                                <a class="dash-link"
                                    href="<?php echo e(!empty(\Auth::user()->getDefualtViewRouteByModule('all task')) ? route(\Auth::user()->getDefualtViewRouteByModule('all task')) : route('project.all.task')); ?>"><?php echo e(__('Task')); ?></a>
                            </li>
                            <li
                                class="dash-item dash-hasmenu <?php echo e(Request::segment(2) == 'allTimesheet' ? 'active' : ''); ?>">
                                <a class="dash-link"
                                    href="<?php echo e(route('project.all.timesheet')); ?>"><?php echo e(__('Timesheets')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            </li>
            <?php if(\Auth::user()->type == 'company' || \Auth::user()->type == 'client' || \Auth::user()->type == 'employee'): ?>
                <li
                    class="dash-item <?php echo e(Request::route()->getName() == 'project_report.index' || Request::route()->getName() == 'project_report.show' ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('project_report.index')); ?>" class="dash-link"><span class="dash-micon"><i
                                class="ti ti-chart-line"></i></span><span
                            class="dash-mtext"><?php echo e(__('Project Report')); ?></span></a>
                </li>
            <?php endif; ?>

            <?php if(\Auth::user()->type == 'company' || \Auth::user()->type == 'client' || \Auth::user()->type == 'employee'): ?>
                <li class="dash-item <?php echo e(Request::route()->getName() == 'contact-us' ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('contact-us')); ?>" class="dash-link"><span class="dash-micon"><i
                                class="fa fa-id-badge"></i></span><span
                            class="dash-mtext"><?php echo e(__('Contact Us')); ?></span></a>
                </li>
            <?php endif; ?>


            <?php if(\Auth::user()->type == 'company'): ?>
                <li class="dash-item <?php echo e(Request::route()->getName() == 'emailCompaign' ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('emailCompaign')); ?>" class="dash-link"><span class="dash-micon"><i
                                class="fa fa-mail"></i></span><span
                            class="dash-mtext"><?php echo e(__('Email Compaign')); ?></span></a>
                </li>
            <?php endif; ?>

            <?php if(\Auth::user()->type == 'company'): ?>
                <li class="dash-item ">
                    <a href="<?php echo e(!empty(\Auth::user()->getDefualtViewRouteByModule('item')) ? route(\Auth::user()->getDefualtViewRouteByModule('item')) : route('item.index')); ?>"
                        class="dash-link"><span class="dash-micon"><i class="ti ti-apps"></i></span><span
                            class="dash-mtext"><?php echo e(__('Items')); ?></span></a>
                </li>
            <?php endif; ?>
            <?php if(\Auth::user()->type == 'company'): ?>
                <li class="dash-item">
                    <a href="<?php echo e(route('itemstock.index')); ?>" class="dash-link"><span class="dash-micon"><i
                                class="ti ti-clipboard-check"></i></span><span
                            class="dash-mtext"><?php echo e(__('Item Stock')); ?></span></a>
                </li>
            <?php endif; ?>

            <?php if(\Auth::user()->type == 'company' || \Auth::user()->type == 'client'): ?>
                <li
                    class="dash-item dash-hasmenu <?php echo e(Request::segment(1) == 'invoice' || Request::segment(1) == 'payment' || Request::segment(1) == 'creditNote' || Request::segment(1) == 'expense' ? 'active dash-trigger' : ''); ?>">
                    <a href="#!" class="dash-link"><span class="dash-micon"><i
                                class="ti ti-stairs-up"></i></span><span
                            class="dash-mtext"><?php echo e(__('Sale')); ?></span><span class="dash-arrow"><i
                                data-feather="chevron-right"></i></span></a>
                    <ul class="dash-submenu">
                        <li class="dash-item dash-hasmenu  <?php echo e(Request::segment(1) == 'invoice' ? 'active' : ''); ?>">
                            <a class="dash-link"
                                href="<?php echo e(!empty(\Auth::user()->getDefualtViewRouteByModule('invoice')) ? route(\Auth::user()->getDefualtViewRouteByModule('invoice')) : route('invoice.index')); ?>"><?php echo e(__('Invoices')); ?></a>
                        </li>
                        <li class="dash-item dash-hasmenu  <?php echo e(Request::segment(1) == 'payment' ? 'active ' : ''); ?>">
                            <a class="dash-link" href="<?php echo e(route('payment.index')); ?>"><?php echo e(__('Payment')); ?></a>
                        </li>
                        <li
                            class="dash-item dash-hasmenu  <?php echo e(Request::segment(1) == 'creditNote' ? 'active' : ''); ?>">
                            <a class="dash-link"
                                href="<?php echo e(route('creditNote.index')); ?>"><?php echo e(__('Credit Notes')); ?></a>
                        </li>
                        <?php if(\Auth::user()->type == 'company'): ?>
                            <li
                                class="dash-item dash-hasmenu  <?php echo e(Request::segment(1) == 'expense' ? 'active' : ''); ?>">
                                <a class="dash-link" href="<?php echo e(route('expense.index')); ?>"><?php echo e(__('Expense')); ?></a>
                            </li>
                        <?php endif; ?>

                    </ul>
                </li>
            <?php endif; ?>

            <?php if(\Auth::user()->type == 'company'): ?>
                <li class="dash-item <?php echo e(request()->is('budget*') ? 'active' : ''); ?>">
                    <a href="<?php echo e(!empty(\Auth::user()->getDefualtViewRouteByModule('budget')) ? route(\Auth::user()->getDefualtViewRouteByModule('budget')) : route('budget.index')); ?>"
                        class="dash-link"><span class="dash-micon"><i class="ti ti-businessplan"></i></span><span
                            class="dash-mtext"><?php echo e(__('Budget Planner')); ?></span></a>
                </li>

                <li class="dash-item <?php echo e(request()->is('timetracker*') ? 'active' : ''); ?>">
                    <a href="<?php echo e(!empty(\Auth::user()->getDefualtViewRouteByModule('timetracker')) ? route(\Auth::user()->getDefualtViewRouteByModule('timetracker')) : route('timetracker.index')); ?>"
                        class="dash-link"><span class="dash-micon"><i class="ti ti-alarm"></i></span><span
                            class="dash-mtext"><?php echo e(__('Tracker')); ?></span></a>
                </li>
            <?php endif; ?>

            <?php if(\Auth::user()->type != 'super admin'): ?>
                <li class="dash-item <?php echo e(request()->is('zoommeeting*') ? 'active' : ''); ?>">
                    <a href="<?php echo e(!empty(\Auth::user()->getDefualtViewRouteByModule('zoommeeting')) ? route(\Auth::user()->getDefualtViewRouteByModule('zoommeeting')) : route('zoommeeting.index')); ?>"
                        class="dash-link"><span class="dash-micon"><i class="ti ti-video-plus"></i></span><span
                            class="dash-mtext"><?php echo e(__('Zoom Metting')); ?></span></a>
                </li>
            <?php endif; ?>

            <?php if(\Auth::user()->type == 'company' || \Auth::user()->type == 'client'): ?>
                <li class="dash-item <?php echo e(request()->is('contract*') ? 'active' : ''); ?>">
                    <a href="<?php echo e(!empty(\Auth::user()->getDefualtViewRouteByModule('contract')) ? route(\Auth::user()->getDefualtViewRouteByModule('contract')) : route('contract.index')); ?>"
                        class="dash-link"><span class="dash-micon"><i class="ti ti-device-floppy"></i></span><span
                            class="dash-mtext"><?php echo e(__('Contract')); ?></span></a>
                </li>
            <?php endif; ?>

            <?php if(\Auth::user()->type == 'company'): ?>
                <li
                    class="dash-item dash-hasmenu <?php echo e(Request::segment(1) == 'chart-of-account' || Request::segment(1) == 'journal-entry' || Request::segment(2) == 'ledger' || Request::segment(2) == 'balance-sheet' || Request::segment(2) == 'trial-balance' ? 'active dash-trigger' : ''); ?>">
                    <a href="#!"
                        class="dash-link <?php echo e(Request::segment(1) == 'chart-of-account' || Request::segment(1) == 'journal-entry' || Request::segment(2) == 'ledger' || Request::segment(2) == 'balance-sheet' || Request::segment(2) == 'trial-balance' ? 'show' : ''); ?>"><span
                            class="dash-micon"><i class="ti ti-forms"></i></span><span
                            class="dash-mtext"><?php echo e(__('Double Entry')); ?></span><span class="dash-arrow"><i
                                data-feather="chevron-right"></i></span></a>
                    <ul class="dash-submenu">
                        <li class="dash-item <?php echo e(request()->is('chart-of-account*') ? 'active' : ''); ?>">
                            <a class="dash-link"
                                href="<?php echo e(route('chart-of-account.index')); ?>"><?php echo e(__('Chart of Accounts')); ?></a>
                        </li>
                        <li class="dash-item <?php echo e(request()->is('journal-entry*') ? 'active' : ''); ?>">
                            <a class="dash-link"
                                href="<?php echo e(route('journal-entry.index')); ?>"><?php echo e(__('Journal Account')); ?></a>
                        </li>
                        <li class="dash-item <?php echo e(request()->is('report.ledger*') ? 'active' : ''); ?>">
                            <a class="dash-link"
                                href="<?php echo e(route('report.ledger')); ?>"><?php echo e(__('Ledger Summary')); ?></a>
                        </li>
                        <li class="dash-item <?php echo e(request()->is('report.balance.sheet*') ? 'active' : ''); ?> ">
                            <a class="dash-link"
                                href="<?php echo e(route('report.balance.sheet')); ?>"><?php echo e(__('Balance Sheet')); ?></a>
                        </li>
                        <li class="dash-item <?php echo e(request()->is('trial.balance*') ? 'active' : ''); ?>">
                            <a class="dash-link" href="<?php echo e(route('trial.balance')); ?>"><?php echo e(__('Trial Balance')); ?></a>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if(\Auth::user()->type == 'company' || \Auth::user()->type == 'employee' || \Auth::user()->type == 'client'): ?>
                <li class="dash-item">
                    <a href="<?php echo e(url('chats')); ?>" class="dash-link"><span class="dash-micon"><i
                                class="ti ti-brand-hipchat"></i></span><span
                            class="dash-mtext"><?php echo e(__('Messenger')); ?></span></a>
                </li>
            <?php endif; ?>

            <?php if(\Auth::user()->type == 'company' || \Auth::user()->type == 'client' || \Auth::user()->type == 'employee'): ?>
                <li class="dash-item <?php echo e(request()->is('support*') ? 'active' : ''); ?>">
                    <a href="<?php echo e(!empty(\Auth::user()->getDefualtViewRouteByModule('support')) ? route(\Auth::user()->getDefualtViewRouteByModule('support')) : route('support.index')); ?>"
                        class="dash-link"><span class="dash-micon"><i class="ti ti-headset"></i></span><span
                            class="dash-mtext"><?php echo e(__('Support')); ?></span></a>
                </li>
            <?php endif; ?>

            <?php if(\Auth::user()->type == 'company' || \Auth::user()->type == 'employee'): ?>
                <li class="dash-item">
                    <a href="<?php echo e(route('event.index')); ?>" class="dash-link"><span class="dash-micon"><i
                                class="ti ti-calendar-event"></i></span><span
                            class="dash-mtext"><?php echo e(__('Event')); ?></span></a>
                </li>
            <?php endif; ?>

            <?php if(\Auth::user()->type == 'company' || \Auth::user()->type == 'client' || \Auth::user()->type == 'employee'): ?>
                <li class="dash-item">
                    <a href="<?php echo e(!empty(\Auth::user()->getDefualtViewRouteByModule('notice board')) ? route(\Auth::user()->getDefualtViewRouteByModule('notice board')) : route('noticeBoard.index')); ?>"
                        class="dash-link"><span class="dash-micon"><i class="ti ti-clipboard-list"></i></span><span
                            class="dash-mtext"><?php echo e(__('Notice Board')); ?></span></a>
                </li>
            <?php endif; ?>

            <?php if(\Auth::user()->type == 'company'): ?>
                <li class="dash-item">
                    <a href="<?php echo e(url('goal')); ?>" class="dash-link"><span class="dash-micon"><i
                                class="ti ti-award"></i></span><span
                            class="dash-mtext"><?php echo e(__('Goal')); ?></span></a>
                </li>
            <?php endif; ?>

            <?php if(\Auth::user()->type == 'company' || \Auth::user()->type == 'client' || \Auth::user()->type == 'employee'): ?>
                <li class="dash-item <?php echo e(request()->is('note*') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('note.index')); ?>" class="dash-link"><span class="dash-micon"><i
                                class="ti ti-note"></i></span><span
                            class="dash-mtext"><?php echo e(__('Note')); ?></span></a>
                </li>
            <?php endif; ?>

            <?php if(\Auth::user()->type == 'company'): ?>
                <li class="dash-item dash-hasmenu">
                    <a href="#!" class="dash-link"><span class="dash-micon"><i
                                class="ti ti-chart-dots"></i></span><span
                            class="dash-mtext"><?php echo e(__('Report')); ?></span><span class="dash-arrow"><i
                                data-feather="chevron-right"></i></span></a>
                    <ul class="dash-submenu">
                        <li class="dash-item">
                            <a class="dash-link"
                                href="<?php echo e(route('report.attendance')); ?>"><?php echo e(__('Attendance')); ?></a>
                        </li>
                        <li class="dash-item">
                            <a class="dash-link" href="<?php echo e(route('report.task')); ?>"><?php echo e(__('Task')); ?></a>
                        </li>
                        <li class="dash-item">
                            <a class="dash-link"
                                href="<?php echo e(route('report.income.expense')); ?>"><?php echo e(__('Income Vs Expense')); ?></a>
                        </li>
                        <li class="dash-item">
                            <a class="dash-link" href="<?php echo e(route('report.timelog')); ?>"><?php echo e(__('Time Log')); ?></a>
                        </li>
                        <li class="dash-item">
                            <a class="dash-link" href="<?php echo e(route('report.finance')); ?>"><?php echo e(__('Finance')); ?></a>
                        </li>
                        <li class="dash-item">
                            <a class="dash-link" href="<?php echo e(route('report.leave')); ?>"><?php echo e(__('Leave')); ?></a>
                        </li>
                        <li class="dash-item">
                            <a class="dash-link" href="<?php echo e(route('report.estimate')); ?>"><?php echo e(__('Estimate')); ?></a>
                        </li>
                        <li class="dash-item">
                            <a class="dash-link" href="<?php echo e(route('report.invoice')); ?>"><?php echo e(__('Invoice')); ?></a>
                        </li>
                        <li class="dash-item">
                            <a class="dash-link" href="<?php echo e(route('report.client')); ?>"><?php echo e(__('Client')); ?></a>
                        </li>
                        <li class="dash-item">
                            <a class="dash-link" href="<?php echo e(route('report.lead')); ?>"><?php echo e(__('Lead')); ?></a>
                        </li>

                        <li class="dash-item">
                            <a class="dash-link" href="<?php echo e(route('report.deal')); ?>"><?php echo e(__('Deal')); ?></a>
                        </li>

                        <li class="dash-item">
                            <a class="dash-link"
                                href="<?php echo e(route('report.product.stock.report')); ?>"><?php echo e(__('Item Stock')); ?></a>
                        </li>

                    </ul>
                </li>
            <?php endif; ?>

            <?php if(\Auth::user()->type == 'super admin' || \Auth::user()->type == 'company'): ?>
                <li class="dash-item <?php if(str_contains(request()->url(), 'stripe')): ?> active <?php endif; ?>">
                    <a href="<?php echo e(route('plan.index')); ?>" class="dash-link"><span class="dash-micon"><i
                                class="ti ti-trophy"></i></span><span
                            class="dash-mtext"><?php echo e(__('Plan')); ?></span></a>
                </li>
            <?php endif; ?>


            <?php if(\Auth::user()->type == 'super admin'): ?>
                <li class="dash-item">
                    <a href="<?php echo e(route('plan_request.index')); ?>" class="dash-link"><span class="dash-micon"><i
                                class="ti ti-git-pull-request"></i></span><span
                            class="dash-mtext"><?php echo e(__('Plan Request')); ?></span></a>
                </li>
            <?php endif; ?>
            <?php if(\Auth::user()->type == 'super admin'): ?>
                <li class="dash-item <?php echo e(Request::segment(1) == 'referral-program' ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('referral.index')); ?>" class="dash-link"><span class="dash-micon"><i
                                class="ti ti-trophy"></i></span><span
                            class="dash-mtext"><?php echo e(__('Referral Program')); ?></span></a>
                </li>
            <?php endif; ?>
            <?php if(\Auth::user()->type == 'company'): ?>
                <li class="dash-item <?php echo e(Request::segment(1) == 'referral-program' ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('guideline.index')); ?>" class="dash-link"><span class="dash-micon"><i
                                class="ti ti-trophy"></i></span><span
                            class="dash-mtext"><?php echo e(__('Referral Program')); ?></span></a>
                </li>
            <?php endif; ?>
            <?php if(\Auth::user()->type == 'super admin'): ?>
                <li class="dash-item <?php echo e(Request::segment(1) == 'coupon' ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('coupon.index')); ?>" class="dash-link"><span class="dash-micon"><i
                                class="ti ti-clipboard-check"></i></span><span
                            class="dash-mtext"><?php echo e(__('Coupon')); ?></span></a>
                </li>
            <?php endif; ?>

            <?php if(\Auth::user()->type == 'super admin' || \Auth::user()->type == 'company'): ?>
                <li class="dash-item">
                    <a href="<?php echo e(route('order.index')); ?>" class="dash-link"><span class="dash-micon"><i
                                class="ti ti-shopping-cart"></i></span><span
                            class="dash-mtext"><?php echo e(__('Order')); ?></span></a>
                </li>
            <?php endif; ?>

            <?php if(\Auth::user()->type == 'super admin'): ?>
                <li
                    class="dash-item <?php echo e(request()->is('email_template*') || request()->is('emailtemplate_lang*') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('manage.email.language', [$emailTemplate->id, \Auth::user()->lang])); ?>"
                        class="dash-link"><span class="dash-micon"><i class="ti ti-template"></i></span><span
                            class="dash-mtext"><?php echo e(__('Email Template')); ?></span></a>
                </li>
            <?php endif; ?>


            <?php if(\Auth::user()->type == 'company'): ?>
                <li class="dash-item dash-hasmenu">
                    <a href="#!" class="dash-link"><span class="dash-micon"><i
                                class="ti ti-circle-square"></i></span><span
                            class="dash-mtext"><?php echo e(__('Constant')); ?></span><span class="dash-arrow"><i
                                data-feather="chevron-right"></i></span></a>
                    <ul class="dash-submenu">
                        <li class="dash-item dash-hasmenu">
                            <a class="dash-link" href="#"><?php echo e(__('HR')); ?><span class="dash-arrow"><i
                                        data-feather="chevron-right"></i></span></a>
                            <ul class="dash-submenu">
                                <li class="dash-item">
                                    <a class="dash-link"
                                        href="<?php echo e(route('department.index')); ?>"><?php echo e(__('Department')); ?></a>
                                </li>
                                <li class="dash-item">
                                    <a class="dash-link"
                                        href="<?php echo e(route('designation.index')); ?>"><?php echo e(__('Designation')); ?></a>
                                </li>
                                <li class="dash-item">
                                    <a class="dash-link"
                                        href="<?php echo e(route('salaryType.index')); ?>"><?php echo e(__('Salary Type')); ?></a>
                                </li>
                                <li class="dash-item">
                                    <a class="dash-link"
                                        href="<?php echo e(route('leaveType.index')); ?>"><?php echo e(__('Leave Type')); ?></a>
                                </li>
                                <li class="dash-item">
                                    <a class="dash-link"
                                        href="<?php echo e(route('award-type.index')); ?>"><?php echo e(__('Award Type')); ?></a>
                                </li>
                                <li class="dash-item">
                                    <a class="dash-link"
                                        href="<?php echo e(route('termination-type.index')); ?>"><?php echo e(__('Termination Type')); ?></a>
                                </li>
                                <li class="dash-item">
                                    <a class="dash-link"
                                        href="<?php echo e(route('training-type.index')); ?>"><?php echo e(__('Training Type')); ?></a>
                                </li>
                                <li class="dash-item">
                                    <a class="dash-link"
                                        href="<?php echo e(route('performanceType.index')); ?>"><?php echo e(__('Performance Type')); ?></a>
                                </li>
                                <li class="dash-item">
                                    <a class="dash-link"
                                        href="<?php echo e(route('competencies.index')); ?>"><?php echo e(__('Competencies')); ?></a>
                                </li>
                            </ul>
                        </li>
                        <li class="dash-item dash-hasmenu">
                            <a class="dash-link" href="#"><?php echo e(__('PreSale')); ?><span class="dash-arrow"><i
                                        data-feather="chevron-right"></i></span></a>
                            <ul class="dash-submenu">
                                <li class="dash-item">
                                    <a class="dash-link"
                                        href="<?php echo e(route('pipeline.index')); ?>"><?php echo e(__('Pipeline')); ?></a>
                                </li>
                                <li class="dash-item">
                                    <a class="dash-link"
                                        href="<?php echo e(route('leadStage.index')); ?>"><?php echo e(__('Lead Stage')); ?></a>
                                </li>
                                <li class="dash-item">
                                    <a class="dash-link"
                                        href="<?php echo e(route('dealStage.index')); ?>"><?php echo e(__('Deal Stage')); ?></a>
                                </li>
                                <li class="dash-item">
                                    <a class="dash-link"
                                        href="<?php echo e(route('source.index')); ?>"><?php echo e(__('Source')); ?></a>
                                </li>
                                <li class="dash-item">
                                    <a class="dash-link" href="<?php echo e(route('label.index')); ?>"><?php echo e(__('Label')); ?></a>
                                </li>
                            </ul>
                        </li>
                        <li class="dash-item">
                            <a class="dash-link"
                                href="<?php echo e(route('projectStage.index')); ?>"><?php echo e(__('Project Task Stage')); ?></a>
                        </li>
                        <li class="dash-item">
                            <a class="dash-link" href="<?php echo e(route('taxRate.index')); ?>"><?php echo e(__('Tax Rate')); ?></a>
                        </li>
                        <li class="dash-item">
                            <a class="dash-link" href="<?php echo e(route('unit.index')); ?>"><?php echo e(__('Unit')); ?></a>
                        </li>
                        <li class="dash-item">
                            <a class="dash-link" href="<?php echo e(route('category.index')); ?>"><?php echo e(__('Category')); ?></a>
                        </li>
                        <li class="dash-item">
                            <a class="dash-link"
                                href="<?php echo e(route('paymentMethod.index')); ?>"><?php echo e(__('Payment Method')); ?></a>
                        </li>
                        <li class="dash-item">
                            <a class="dash-link"
                                href="<?php echo e(route('contractType.index')); ?>"><?php echo e(__('Contract Type')); ?></a>
                        </li>
                        <li class="dash-item">
                            <a class="dash-link" href="<?php echo e(route('branch.index')); ?>"><?php echo e(__('Branch')); ?></a>
                        </li>
                        <li class="dash-item">
                            <a class="dash-link" href="<?php echo e(route('goaltype.index')); ?>"><?php echo e(__('Goal Type')); ?></a>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if(\Auth::user()->type == 'company'): ?>
                <li class="dash-item <?php if(str_contains(request()->url(), 'notification-templates')): ?> active <?php endif; ?>">
                    <a href="<?php echo e(url('notification-templates')); ?>" class="dash-link">
                        <span class="dash-micon">
                            <i class="ti ti-bell"></i>
                        </span>
                        <span class="dash-mtext"><?php echo e(__('Notification Templates')); ?></span></a>
                </li>
            <?php endif; ?>

            <?php if(\Auth::user()->type == 'super admin'): ?>
                <?php echo $__env->make('landingpage::menu.landingpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            <?php if(\Auth::user()->type == 'super admin' || \Auth::user()->type == 'company'): ?>
                <li class="dash-item">
                    <a href="<?php echo e(route('settings')); ?>" class="dash-link"><span class="dash-micon"><i
                                class="ti ti-settings"></i></span><span
                            class="dash-mtext"><?php echo e(__('Settings')); ?></span></a>
                </li>
            <?php endif; ?>

        </ul>
    </div>
</div>
</nav>
<!-- [ navigation menu ] end -->
<?php /**PATH C:\xampp\htdocs\github\company-dowhf-website\resources\views/partials/admin/menu.blade.php ENDPATH**/ ?>