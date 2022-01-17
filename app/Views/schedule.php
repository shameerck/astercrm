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
                    <h3>Schedule Visit</h3>
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



                <div id="flHorizontalForm" class="col-lg-12 col-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        
                        <div class="widget-content widget-content-area">
                            <div class="form-group col-xl-4 row">
                            <h3><?= $visittitle ?></h3>
                            </div>
                            <div class="form-group row">
                                <label for="hEmail" class="col-xl-2">Beneficiary</label>
                                <div class="col-xl-4">
                                    <?= $fullname ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="hEmail" class="col-xl-2">Phone</label>
                                <div class="col-xl-4">
                                    <strong><?= $phone?></strong>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="hEmail" class="col-xl-2">Expected Visit</label>
                                <div class="col-xl-4">
                                    <strong><?= $expecteddate ?></strong>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="hEmail" class="col-xl-2">Visiting Date</label>
                                <div class="col-xl-4">
                                    <input type="hidden" id="visitid" value="<?= $visitid ?>">                                    
<input id="dateTimeFlatpickr" class="form-control flatpickr flatpickr-input flatpickr-mobile active" step="any" tabindex="1" type="datetime-local" placeholder="Select Date.." value="<?= $visitingdate ?>"> 

                                    <div class="invalid-feedback" id="visitdate-invalid">
                                    Select a valid date
                                </div> 
                                </div>
                               
                            </div>
                            
                            
                            
                            <div id="alerts-escalation"></div>

                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button id="btnVisit" name="btnVisit" onclick="savevisit();" class="btn btn-primary">Save</button>
                                </div>
                            </div>
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
           
           
           function savevisit()
                        {
                            var validation = 0;

                            if ($("#dateTimeFlatpickr").val() === "") {
                                $("#visitdate-invalid").css('display', 'block');
                                validation = 1;
                            } else
                            {
                                $("#visitdate-invalid").css('display', 'none');
                            }

                           


                            if (validation === 1)
                            {
                                return false;
                            }

                            var visit_date = $("#dateTimeFlatpickr").val();
                            var visit_id = $("#visitid").val();


                            $.ajax({
                                url: "<?= base_url('schedulevisit') ?>",
                                data: {visitid:visit_id, visitdate: visit_date},
                                dataType: "json",
                                type: "POST",
                                error: function (msg) {

                                    if (msg.success === false)
                                    {
                                        $('#alerts-escalation').html("<div class='alert alert-light-danger border-0 mb-4' style='text-align:left;'><strong>" + JSON.stringify(msg.message).replace(/"/g, '') + "</strong></div>");
                                    } else
                                    {
                                        $('#alerts-escalation').html("<div class='alert alert-light-success border-0 mb-4' style='text-align:left;'><strong>" + JSON.stringify(msg.message).replace(/"/g, '') + "</strong></div>");

                                    }
                                },
                                success: function (msg) {
                                    if (msg.success === false)
                                    {
                                        $('#alerts-escalation').html("<div class='alert alert-light-danger border-0 mb-4' style='text-align:left;'><strong>" + JSON.stringify(msg.message).replace(/"/g, '') + "</strong></div>");
                                    } else
                                    {
                                        $('#alerts-escalation').html("<div class='alert alert-light-success border-0 mb-4' style='text-align:left;'><strong>" + JSON.stringify(msg.message).replace(/"/g, '') + "</strong></div>");
                                    }

                                }
                            });
                        }
        </script>

<?= $this->endSection() ?>


        