    
<?= $this->extend('layout') ?>


<?= $this->section('content') ?>

<div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>
        
        <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="page-header">
                    <div class="page-title">
                        <h3>Dashboard - <?= $_SESSION["locationname"] ?></h3>
                    </div>
                    
                    <div class="toggle-switch">
                        <label class="switch s-icons s-outline  s-outline-secondary">
                            <input type="checkbox" checked="" class="theme-shifter">
                            <span class="slider round">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-sun"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>

                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-moon"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>
                            </span>
                        </label>
                    </div>
                </div>

                <div class="row layout-top-spacing">

                    

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-three">
                            <div class="widget-heading">
                                <h5 class="">Summary</h5>


                            </div>
                            <div class="widget-content">

                                <div class="order-summary">

                                    <div class="summary-list summary-profit">

                                        <div class="summery-info">

                                            <div class="w-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tag"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7" y2="7"></line></svg>
                                            </div>
                                            <div class="w-summary-details">

                                                <div class="w-summary-info">
                                                    <h6>Beneficiaries <span id="varBeneficiaries" class="summary-count">-</span></h6>
                                                    
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="summary-list summary-expenses">

                                        <div class="summery-info">

                                            <div class="w-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                                            </div>
                                            <div class="w-summary-details">

                                                <div class="w-summary-info">
                                                    <h6>Upcoming Visits <span id="varVisits" class="summary-count">-</span></h6>
                                                    
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                    <div class="summary-list summary-expenses">

                                        <div class="summery-info">

                                            <div class="w-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                                            </div>
                                            <div class="w-summary-details">

                                                <div class="w-summary-info">
                                                    <h6>Completed Visits <span id="varVisited" class="summary-count">-</span></h6>
                                                    
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                    


                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-table-one">
                            <div class="widget-heading">
                                <h5 class="">Upcoming Visits</h5>
                                <div class="task-action">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="pendingTask" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="pendingTask" style="will-change: transform;">
                                            <a class="dropdown-item" href="javascript:updateupcomingvisits(8);">In 7 Days</a>
                                            <a class="dropdown-item" href="javascript:updateupcomingvisits(15);">In 14 Days</a>
                                            <a class="dropdown-item" href="javascript:updateupcomingvisits(31);">In 30 Days</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="widget-content">

                                <div id="varUpcomingVisits"></div>

                            </div>
                        </div>
                    </div>
                    

                    

                </div>

                <div class="footer-wrapper">
                    <div class="footer-section f-section-1">
                        <p class="">Copyright © <?= Date('Y') ?> <a target="_blank" href="https://www.xlab.ae">XLab</a>, All rights reserved.</p>
                    </div>
                    
                </div>

            </div>
        </div>
        <!--  END CONTENT PART  -->

    </div>

<script>
        $(document).ready(function() {
            
            
            
        $.ajax({ url: "<?= base_url('dashboard/unitsummary') ?>",
                    data: {},
                    dataType: "json",
                    type: "POST",
                    success: function(data){
                        

$("#varBeneficiaries").text(data[0]['beneficiaries']);
$("#varVisits").text(data[1]['visits']);
$("#varVisited").text(data[2]['visited']);
                
                
                    }
                });
                
                updateupcomingvisits(7);
                
        });
        
        function updateupcomingvisits($days)
        {
            $("#varUpcomingVisits").html("");
            
                 $.ajax({ url: "<?= base_url('dashboard/upcomingvisits') ?>",
                    data: {days:$days},
                    dataType: "json",
                    type: "POST",
                    
                    success: function(data){
                        

$("#varUpcomingVisits").html(data[0]['visitdata']);
                
                    }
                });
        }
    </script>

<?= $this->endSection() ?>