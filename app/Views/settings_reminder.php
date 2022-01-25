
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
                    <h3>Reminder Settings</h3>
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


                <div id="flHorizontalForm" class="col-lg-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">                                
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Notifications</h4>
                                </div>                                                                        
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="row">
                            <div class="form-group">&nbsp;&nbsp;
    <label class="new-control new-checkbox checkbox-primary">
      <input type="checkbox" id="chkEmail" name="chkEmail" class="new-control-input" <?= $chkEmail ?> >
      <span class="new-control-indicator"></span>Send Email
    </label>
</div>
                             <div class="form-group">&nbsp;&nbsp;
    <label class="new-control new-checkbox checkbox-primary">
      <input type="checkbox" id="chkSMS" name="chkSMS" class="new-control-input" <?= $chkSMS ?> >
      <span class="new-control-indicator"></span>Send SMS
    </label>
</div>
                             <div class="form-group">&nbsp;&nbsp;
    <label class="new-control new-checkbox checkbox-primary">
      <input type="checkbox" id="chkWhatsapp" name="chkWhatsapp" class="new-control-input" <?= $chkWhatsapp ?> >
      <span class="new-control-indicator"></span>Send WhatsApp
    </label>
</div>
                                </div>

                            <div id="alerts-notifications"></div>

                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button id="btnEnableNotifications" name="btnEnableNotifications" onclick="enablenotifications();" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div id="flHorizontalForm" class="col-lg-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">                                
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Escalation</h4>
                                </div>                                                                        
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="form-group row">
                                <label for="hEmail" class="col-xl-2">Escalation email address</label>
                                <div class="col-xl-4">
                                    <input type="email" class="form-control" id="escEmail" placeholder="mail@example.com" value="<?= $pmemail ?>">
                                </div>
                                <div class="invalid-feedback" id="escEmail-invalid">
                                    Escalation Email not valid
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="hEmail" class="col-xl-2">Escalation SMS number</label>
                                <div class="col-xl-4">
                                    <input type="text" class="form-control" id="escMobile" placeholder="971551234567" value="<?= $pmmobile ?>">
                                </div>
                                <div class="invalid-feedback" id="escMobile-invalid">
                                    Escalation SMS number not valid
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="hEmail" class="col-xl-2">Escalation WhatsApp number</label>
                                <div class="col-xl-4">
                                    <input type="text" class="form-control" id="escWhatsapp" placeholder="971551234567" value="<?= $pmwhatsapp ?>">
                                </div>
                                <div class="invalid-feedback" id="escWhatsapp-invalid">
                                    Escalation WhatsApp number not valid
                                </div>
                            </div>

                            <div id="alerts-escalation"></div>

                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button id="btnEscalation" name="btnEscalation" onclick="saveescalation();" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!--<button id="btnImport" name="btnImport" onclick="importbeneficiaries();" class="btn btn-primary">Import Beneficiaries</button>-->
                


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
                       

                        function saveescalation()
                        {
                            var validation = 0;

                            if ($("#escEmail").val() === "") {
                                $("#escEmail-invalid").css('display', 'block');
                                validation = 1;
                            } else
                            {
                                $("#escEmail-invalid").css('display', 'none');
                            }

                            if ($("#escMobile").val() === "") {
                                $("#escMobile-invalid").css('display', 'block');
                                validation = 1;
                            } else
                            {
                                $("#escMobile-invalid").css('display', 'none');
                            }

                            if ($("#escWhatsapp").val() === "") {
                                $("#escWhatsapp-invalid").css('display', 'block');
                                validation = 1;
                            } else
                            {
                                $("#escWhatsapp-invalid").css('display', 'none');
                            }



                            if (validation === 1)
                            {
                                return false;
                            }

                            var pm_email = $("#escEmail").val();
                            var pm_mobile = $("#escMobile").val();
                            var pm_whatsapp = $("#escWhatsapp").val();


                            $.ajax({
                                url: "<?= base_url('/settings/saveescalation') ?>",
                                data: {
                                    pmemail: pm_email,
                                    pmmobile: pm_mobile,
                                    pmwhatsapp: pm_whatsapp},
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
                        
                        function enablenotifications()
                        {
                            
                            var chk_email = $("#chkEmail").is(':checked');
                            var chk_sms = $("#chkSMS").is(':checked');
                            var chk_whatsapp = $("#chkWhatsapp").is(':checked');
                            
if(chk_email===true){chk_email='1';}
else{chk_email='0';}
if(chk_sms===true){chk_sms='1';}
else{chk_sms='0';}
if(chk_whatsapp===true){chk_whatsapp='1';}
else{chk_whatsapp='0';}

                            $.ajax({
                                url: "<?= base_url('/settings/enablenotifications') ?>",
                                data: {
                                    pmemail: chk_email,
                                    pmmobile: chk_sms,
                                    pmwhatsapp: chk_whatsapp},
                                dataType: "json",
                                type: "POST",
                                error: function (msg) {

                                    if (msg.success === false)
                                    {
                                        $('#alerts-notifications').html("<div class='alert alert-light-danger border-0 mb-4' style='text-align:left;'><strong>" + JSON.stringify(msg.message).replace(/"/g, '') + "</strong></div>");
                                    } else
                                    {
                                        $('#alerts-notifications').html("<div class='alert alert-light-success border-0 mb-4' style='text-align:left;'><strong>" + JSON.stringify(msg.message).replace(/"/g, '') + "</strong></div>");

                                    }
                                },
                                success: function (msg) {
                                    if (msg.success === false)
                                    {
                                        $('#alerts-notifications').html("<div class='alert alert-light-danger border-0 mb-4' style='text-align:left;'><strong>" + JSON.stringify(msg.message).replace(/"/g, '') + "</strong></div>");
                                    } else
                                    {
                                        $('#alerts-notifications').html("<div class='alert alert-light-success border-0 mb-4' style='text-align:left;'><strong>" + JSON.stringify(msg.message).replace(/"/g, '') + "</strong></div>");
                                    }

                                }
                            });
                        }
                        
                        
                        function importbeneficiaries()
                        {
                            

                            $.ajax({
                                url: "<?= base_url('/settings/importbenefiaries') ?>",
                                data: {},
                                dataType: "json",
                                type: "POST",
                                error: function (msg) {

                                    if (msg.success === false)
                                    {
                                        $('#alerts-notifications').html("<div class='alert alert-light-danger border-0 mb-4' style='text-align:left;'><strong>" + JSON.stringify(msg.message).replace(/"/g, '') + "</strong></div>");
                                    } else
                                    {
                                        $('#alerts-notifications').html("<div class='alert alert-light-success border-0 mb-4' style='text-align:left;'><strong>" + JSON.stringify(msg.message).replace(/"/g, '') + "</strong></div>");

                                    }
                                },
                                success: function (msg) {
                                    if (msg.success === false)
                                    {
                                        $('#alerts-notifications').html("<div class='alert alert-light-danger border-0 mb-4' style='text-align:left;'><strong>" + JSON.stringify(msg.message).replace(/"/g, '') + "</strong></div>");
                                    } else
                                    {
                                        $('#alerts-notifications').html("<div class='alert alert-light-success border-0 mb-4' style='text-align:left;'><strong>" + JSON.stringify(msg.message).replace(/"/g, '') + "</strong></div>");
                                    }

                                }
                            });
                        }

</script>
<!-- END PAGE LEVEL CUSTOM SCRIPTS -->


<?= $this->endSection() ?>