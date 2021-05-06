    
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
                    <h3>Recent Orders</h3>
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




                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-table-two">

                        <div class="widget-heading">
                            <h5 class="">Recent Orders</h5>
                        </div>

                        <div class="widget-content">
                            <div class="table-responsive">
                                <table id="dtOrdersList"  class="table">
                                    <thead>
                                        <tr>
                                            <th><div class="th-content ">Order#</div></th>
                                            <th><div class="th-content ">Date</div></th>
                                            <th><div class="th-content">Customer</div></th>
                                            <th><div class="th-content">Email</div></th>
                                            <th><div class="th-content">Phone</div></th>
                                            <th><div class="th-content text-right">Amount</div></th>
                                            <th><div class="th-content">Beneficiaries</div></th>

                                        </tr>
                                    </thead>

                                    <tfoot>
                                        <tr>
                                            <th><div class="th-content ">Order#</div></th>
                                            <th><div class="th-content ">Date</div></th>
                                            <th><div class="th-content">Customer</div></th>
                                            <th><div class="th-content">Email</div></th>
                                            <th><div class="th-content">Phone</div></th>
                                            <th><div class="th-content text-right">Amount</div></th>
                                            <th><div class="th-content">Beneficiaries</div></th>
                                        </tr>
                                    </tfoot>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>





            </div>

            <div class="footer-wrapper">
                <div class="footer-section f-section-1">
                    <p class="">Copyright © 2021 <a target="_blank" href="https://asterdmhealthcare.com">Aster Digital</a>, All rights reserved.</p>
                </div>

            </div>

        </div>
    </div>
    <!--  END CONTENT PART  -->

</div>

<!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
<script src="plugins/table/datatable/datatables.js"></script>
<script>
    $(document).ready(function () {
        $('#dtOrdersList').DataTable({
            "aoColumnDefs": [{
                    "bSortable": false,
"className": "text-left",
                    "aTargets": [0, 1, 2, 3]
                },
                
                
                {
                    "targets": 4,
                    "className": "text-right"
                },
                {
                    "targets": 5,
                    "className": "text-center"
                }
            ],
            "searching": false,
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                    "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>',
                },
                "sInfo": "Showing page _PAGE_ of _PAGES_"

            },
            "order": [],
            "serverSide": true,
            "ajax": {
                url: "<?= base_url('dtorderslist') ?>",
                type: 'POST'
            }
        });



    });




</script>
<!-- END PAGE LEVEL CUSTOM SCRIPTS -->


<?= $this->endSection() ?>