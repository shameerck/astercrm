
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
                    <h3>User Settings</h3>
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
                            <h5 class="">Users</h5>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#addunitModal">Add User</button>
                            </div>
                        </div>
                        <div class="widget-content">
                            <div class="table-responsive">
                                <table id="dtUsersList"  class="table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th><div class="th-content ">#</div></th>
                                            <th><div class="th-content ">Unit</div></th>
                                            <th><div class="th-content">User</div></th>
                                            <th><div class="th-content">Password</div></th>
                                            <th><div class="th-content"></div></th>
                                        </tr>
                                    </thead>

                                    <tfoot>
                                        <tr>
                                            <tr>
                                                <th><div class="th-content ">#</div></th>
                                                <th><div class="th-content ">Unit</div></th>
                                                <th><div class="th-content">User</div></th>
                                                <th><div class="th-content">Password</div></th>
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
                <h5 class="modal-title" id="unitModalLabel">Add User</h5>

            </div>

            <input type="hidden" class="form-control" id="userid" name="userid" placeholder="" value="">
                <div class="modal-body">
                    <div class="form-group mb-4">
                        <label for="exampleFormControlInput3">Unit</label>
                        <select class="form-control" name="unitid" id="unitid" required>
                        <?= $units?>
                      </select> 
                         <div class="invalid-feedback" id="unitid-invalid">
                                Unit not selected
                            </div>
                    </div>
                    
                    <div class="form-group mb-4">
                        <label for="exampleFormControlInput3">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="" value="" required>
                            <div class="invalid-feedback" id="username-invalid">
                                Username not valid
                            </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="exampleFormControlInput3">Password</label>
                        <input type="text" class="form-control" id="userpassword" name="userpassword" placeholder="" value="" required>
                            <div class="invalid-feedback" id="userpassword-invalid">
                                User password not valid
                            </div>
                    </div>
                    


                    <div id="alerts-units"></div>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>Close</button>
                    <button id="btnAddUser" name="btnAddUnit" onclick="adduser()" class="btn btn-primary">Save</button>
                </div>

        </div>
    </div>
</div>

<!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
<script src="<?= base_url('plugins/editors/quill/quill.js') ?>"></script>
<script src="<?= base_url('plugins/table/datatable/datatables.js') ?>"></script>
<script>
                        $(document).ready(function () {






                            $('#dtUsersList').DataTable({
                                "aoColumnDefs": [{
                                        "bSortable": true,
                                        "className": "text-left",
                                        "aTargets": [0, 1, 2, 3]
                                    }
                                ],
                                "searching": false,
                                "paging": false,
                                "bInfo": false,

                                "order": [[ 0, "asc" ]],
                                "serverSide": true,
                                "ajax": {
                                    url: "<?= base_url('/settings/dtuserslist') ?>",
                                    type: 'POST'
                                }
                            });


                        });



                        function adduser()
                        {
                            var validation = 0;

                            if ($("#unitid").val() === "") {
                                $("#unitid-invalid").css('display', 'block');
                                validation = 1;
                            } else
                            {
                                $("#unitid-invalid").css('display', 'none');
                            }

                            if ($("#usernamename").val() === "") {
                                $("#usernamename-invalid").css('display', 'block');
                                validation = 1;
                            } else
                            {
                                $("#usernamename-invalid").css('display', 'none');
                            }

                            if ($("#userpassword").val() === "") {
                                $("#userpassword-invalid").css('display', 'block');
                                validation = 1;
                            } else
                            {
                                $("#userpassword-invalid").css('display', 'none');
                            }


                            if (validation === 1)
                            {
                                return false;
                            }

var user_id = $("#userid").val();
                            var unit_id = $("#unitid").val();
                            var user_name = $("#username").val();
                            var user_password = $("#userpassword").val();

                            $.ajax({
                                url: "<?= base_url('/settings/adduser') ?>",
                                data: {
                                    userid: user_id, 
                                    unitid: unit_id, 
                                    username: user_name,
                                    userpassword: user_password},
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

                        function edituser(id, unitid, username, userpassword)
                        {

                            $("#unitModalLabel").html("Edit User");
        $("#userid").val(id);                    
        $("#unitid").val(unitid);
                            
                            $("#username").val(username);
                            $("#userpassword").val(userpassword);
                            $("#addunitModal").modal();

                        }

                        function deleteuser(id)
                        {
                            if (id != "") {

                                $.ajax({
                                    url: "<?= base_url('/settings/deleteuser') ?>",
                                    data: {
                                        userid: id},
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