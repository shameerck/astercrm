
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
                    <h3>Units Settings</h3>
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
                            <h5 class="">Units</h5>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#addunitModal">Add Unit</button>
                            </div>
                        </div>
                        <div class="widget-content">
                            <div class="table-responsive">
                                <table id="dtUnitsList"  class="table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th><div class="th-content ">#</div></th>
                                            <th><div class="th-content ">Unit Name</div></th>
                                            <th><div class="th-content">In Charge</div></th>
                                            <th><div class="th-content">Email</div></th>
                                            <th><div class="th-content">Phone</div></th>
                                            <th><div class="th-content">WhatsApp</div></th>
                                            <th><div class="th-content">Manager</div></th>
                                            <th><div class="th-content">Email</div></th>
                                            <th><div class="th-content">Phone</div></th>
                                            <th><div class="th-content">WhatsApp</div></th>
                                            <th><div class="th-content"></div></th>
                                        </tr>
                                    </thead>

                                    <tfoot>
                                        <tr>
                                            <tr>
                                                <th><div class="th-content ">#</div></th>
                                                <th><div class="th-content ">Unit Name</div></th>
                                                <th><div class="th-content">In Charge</div></th>
                                                <th><div class="th-content">Email</div></th>
                                                <th><div class="th-content">Phone</div></th>
                                                <th><div class="th-content">WhatsApp</div></th>
                                                <th><div class="th-content">Manager</div></th>
                                                <th><div class="th-content">Email</div></th>
                                                <th><div class="th-content">Phone</div></th>
                                                <th><div class="th-content">WhatsApp</div></th>
                                                <th><div class="th-content"></div></th>
                                            </tr>
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
                    <p class="">Copyright © <?= Date('Y') ?> <a target="_blank" href="https://www.xlab.ae">XLab</a>, All rights reserved.</p>
                </div>

            </div>

        </div>
    </div>
    <!--  END CONTENT PART  -->

</div>


<!-- Add Unit Modal -->
<div class="modal fade" id="addunitModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="unitModalLabel">Add Unit</h5>

            </div>

            <input type="hidden" class="form-control" id="unitid" name="unitid" placeholder="" value="">
                <div class="modal-body">
                    <div class="form-group mb-4">
                        <label for="exampleFormControlInput3">Unit Name</label>
                        <input type="text" class="form-control" id="unitname" name="unitname" placeholder="" value="" required>
                            <div class="invalid-feedback" id="unitname-invalid">
                                Unit Name not valid
                            </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="exampleFormControlInput3">Coordinator Name</label>
                        <input type="text" class="form-control" id="unitinchargename" name="unitinchargename" placeholder="" value="" required>
                            <div class="invalid-feedback" id="unitinchargename-invalid">
                                Coordinator Name not valid
                            </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="exampleFormControlInput3">Coordinator Email</label>
                        <input type="email" class="form-control" id="unitinchargeemail" name="unitinchargeemail" placeholder="" value="" required>
                            <div class="invalid-feedback" id="unitinchargeemail-invalid">
                                Coordinator Email not valid
                            </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="exampleFormControlInput3">Coordinator Mobile Phone Number</label>
                        <input type="text" class="form-control" id="unitinchargemobile" name="unitinchargemobile" placeholder="" value="" required>
                            <div class="invalid-feedback" id="unitinchargemobile-invalid">
                                Coordinator Mobile Phone Number not valid
                            </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="exampleFormControlInput3">Coordinator WhatsApp Number</label>
                        <input type="text" class="form-control" id="unitinchargewhatsapp" name="unitinchargewhatsapp" placeholder="" value="" required>
                            <div class="invalid-feedback" id="unitinchargewhatsapp-invalid">
                                Coordinator WhatsApp Number not valid
                            </div>
                    </div>

                    <div class="form-group mb-4">
                        <label for="exampleFormControlInput3">Manager Name</label>
                        <input type="text" class="form-control" id="unitmanagername" name="unitmanagername" placeholder="" value="" required>
                            <div class="invalid-feedback" id="unitmanagername-invalid">
                                Manager Name not valid
                            </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="exampleFormControlInput3">Manager Email</label>
                        <input type="email" class="form-control" id="unitmanageremail" name="unitmanageremail" placeholder="" value="" required>
                            <div class="invalid-feedback" id="unitmanageremail-invalid">
                                Manager Email not valid
                            </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="exampleFormControlInput3">Manager Mobile Phone Number</label>
                        <input type="text" class="form-control" id="unitmanagermobile" name="unitmanagermobile" placeholder="" value="" required>
                            <div class="invalid-feedback" id="unitmanagermobile-invalid">
                                Manager Mobile Phone Number not valid
                            </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="exampleFormControlInput3">Manager WhatsApp Number</label>
                        <input type="text" class="form-control" id="unitmanagerwhatsapp" name="unitmanagerwhatsapp" placeholder="" value="" required>
                            <div class="invalid-feedback" id="unitmanagerwhatsapp-invalid">
                                Manager WhatsApp Number not valid
                            </div>
                    </div>


                    <div id="alerts-units"></div>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>Close</button>
                    <button id="btnAddUnit" name="btnAddUnit" onclick="addunit()" class="btn btn-primary">Save</button>
                </div>

        </div>
    </div>
</div>

<!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
<script src="<?= base_url('plugins/editors/quill/quill.js') ?>"></script>
<script src="<?= base_url('plugins/table/datatable/datatables.js') ?>"></script>
<script>
                        $(document).ready(function () {






                            $('#dtUnitsList').DataTable({
                                "aoColumnDefs": [{
                                        "bSortable": true,
                                        "className": "text-left",
                                        "aTargets": [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
                                    },

                                    {
                                        "targets": 4,
                                        "className": "text-left"
                                    },
                                    {
                                        "targets": 5,
                                        "className": "text-left"
                                    }
                                ],
                                "searching": false,
                                "paging": false,
                                "bInfo": false,

                                "order": [[ 0, "asc" ]],
                                "serverSide": true,
                                "ajax": {
                                    url: "<?= base_url('/settings/dtunitslist') ?>",
                                    type: 'POST'
                                }
                            });


                        });



                        function addunit()
                        {
                            var validation = 0;


                            if ($("#unitname").val() === "") {
                                $("#unitname-invalid").css('display', 'block');
                                validation = 1;
                            } else
                            {
                                $("#unitname-invalid").css('display', 'none');
                            }

                            if ($("#unitinchargename").val() === "") {
                                $("#unitinchargename-invalid").css('display', 'block');
                                validation = 1;
                            } else
                            {
                                $("#unitinchargename-invalid").css('display', 'none');
                            }

                            if ($("#unitinchargeemail").val() === "") {
                                $("#unitinchargeemail-invalid").css('display', 'block');
                                validation = 1;
                            } else
                            {
                                $("#unitinchargeemail-invalid").css('display', 'none');
                            }

                            if ($("#unitinchargemobile").val() === "") {
                                $("#unitinchargemobile-invalid").css('display', 'block');
                                validation = 1;
                            } else
                            {
                                $("#unitinchargemobile-invalid").css('display', 'none');
                            }
//                        if ($("#unitinchargewhatsapp").val() === "") {
//                            $("#unitinchargewhatsapp-invalid").css('display', 'block');
//                            validation = 1;
//                        } else
//                        {
//                            $("#unitinchargewhatsapp-invalid").css('display', 'none');
//                        }
                            if ($("#unitmanagername").val() === "") {
                                $("#unitmanagername-invalid").css('display', 'block');
                                validation = 1;
                            } else
                            {
                                $("#unitmanagername-invalid").css('display', 'none');
                            }
                            if ($("#unitmanageremail").val() === "") {
                                $("#unitmanageremail-invalid").css('display', 'block');
                                validation = 1;
                            } else
                            {
                                $("#unitmanageremail-invalid").css('display', 'none');
                            }
                            if ($("#unitmanagermobile").val() === "") {
                                $("#unitmanagermobile-invalid").css('display', 'block');
                                validation = 1;
                            } else
                            {
                                $("#unitmanagermobile-invalid").css('display', 'none');
                            }
//                        if ($("#unitmanagerwhatsapp").val() === "") {
//                            $("#unitmanagerwhatsapp-invalid").css('display', 'block');
//                            validation = 1;
//                        } else
//                        {
//                            $("#unitmanagerwhatsapp-invalid").css('display', 'none');
//                        }


                            if (validation === 1)
                            {
                                return false;
                            }

                            var unit_id = $("#unitid").val();
                            var unit_name = $("#unitname").val();
                            var unit_inchargename = $("#unitinchargename").val();
                            var unit_inchargeemail = $("#unitinchargeemail").val();
                            var unit_inchargemobile = $("#unitinchargemobile").val();
                            var unit_inchargewhatsapp = $("#unitinchargewhatsapp").val();
                            var unit_managername = $("#unitmanagername").val();
                            var unit_manageremail = $("#unitmanageremail").val();
                            var unit_managermobile = $("#unitmanagermobile").val();
                            var unit_managerwhatsapp = $("#unitmanagerwhatsapp").val();


                            $.ajax({
                                url: "<?= base_url('/settings/addunit') ?>",
                                data: {
                                    unitid: unit_id, unitname: unit_name,
                                    unitinchargename: unit_inchargename, unitinchargeemail: unit_inchargeemail,
                                    unitinchargemobile: unit_inchargemobile, unitinchargewhatsapp: unit_inchargewhatsapp,
                                    unitmanagername: unit_managername, unitmanageremail: unit_manageremail,
                                    unitmanagermobile: unit_managermobile, unitmanagerwhatsapp: unit_managerwhatsapp},
                                dataType: "json",
                                type: "POST",
                                error: function (msg) {

                                    if (msg.success === false)
                                    {
                                        $('#alerts-units').html("<div class='alert alert-light-danger border-0 mb-4' style='text-align:left;'><strong>" + JSON.stringify(msg.message).replace(/"/g, '') + "</strong></div>");
                                    } else
                                    {
                                        $('#alerts-units').html("<div class='alert alert-light-success border-0 mb-4' style='text-align:left;'><strong>" + JSON.stringify(msg.message).replace(/"/g, '') + "</strong></div>");

                                    }
                                },
                                success: function (msg) {
                                    if (msg.success === false)
                                    {
                                        $('#alerts-units').html("<div class='alert alert-light-danger border-0 mb-4' style='text-align:left;'><strong>" + JSON.stringify(msg.message).replace(/"/g, '') + "</strong></div>");
                                    } else
                                    {
                                        $('#alerts-units').html("<div class='alert alert-light-success border-0 mb-4' style='text-align:left;'><strong>" + JSON.stringify(msg.message).replace(/"/g, '') + "</strong></div>");
                                        window.location.href = msg.redirecturl;
                                    }

                                }
                            });
                        }

                        function editunit(id, unitname, unitinchargename, unitinchargeemail, unitinchargemobile, unitinchargewhatsapp, unitmanagername, unitmanageremail, unitmanagermobile, unitmanagerwhatsapp)
                        {
                            $("#unitModalLabel").html("Edit Unit");
                            $("#unitid").val(id);
                            $("#unitname").val(unitname);
                            $("#unitinchargename").val(unitinchargename);
                            $("#unitinchargeemail").val(unitinchargeemail);
                            $("#unitinchargemobile").val(unitinchargemobile);
                            $("#unitinchargewhatsapp").val(unitinchargewhatsapp);
                            $("#unitmanagername").val(unitmanagername);
                            $("#unitmanageremail").val(unitmanageremail);
                            $("#unitmanagermobile").val(unitmanagermobile);
                            $("#unitmanagerwhatsapp").val(unitmanagerwhatsapp);
                            $("#addunitModal").modal();

                        }

                        function deleteunit(id)
                        {
                            if (id != "") {

                                $.ajax({
                                    url: "<?= base_url('/settings/deleteunit') ?>",
                                    data: {
                                        unitid: id},
                                    dataType: "json",
                                    type: "POST",
                                    success: function (msg) {
                                        if (msg.success === false)
                                        {
                                        } else
                                        {
                                            window.location.href = msg.redirecturl;
                                        }

                                    }
                                });

                            }

                        }

                        

</script>
<!-- END PAGE LEVEL CUSTOM SCRIPTS -->


<?= $this->endSection() ?>