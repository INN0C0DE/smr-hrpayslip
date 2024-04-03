<!-- ========================= MODAL ======================= -->
<div id="addModal" class="modal fade">
<form method="post" enctype="multipart/form-data">
        <div class="modal-dialog modal-sm" style="width:800px !important;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add Employee</h4>
                </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">

                            <div class="form-group">
                                    <label>First Name:</label>
                                    <input name="txt_fname" class="form-control input-sm" id="lastname" type="text" placeholder="First Name" />
                                </div>

                                <div class="form-group">
                                    <label>Middle Name:</label>
                                    <input name="txt_mname" class="form-control input-sm" id="middlename" type="text" placeholder="Middle Name" />
                                </div>

                                <div class="form-group">
                                    <label>Last Name:</label>
                                    <input name="txt_lname" class="form-control input-sm" id="lastname" type="text" placeholder="Last Name" />
                                </div>

                                <div class="form-group">
                                    <label>Suffix:</label>
                                    <input name="txt_suffix" class="form-control input-sm" id="suffix" type="text" placeholder="Suffix" />
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Picture:</span></label></label>
                                    <!--<label class="form-label">Upload Profile Picture:</label>-->
                                    <input name="txt_image" type="file" class="form-control" />
                                </div>               
                            </div>
                        </div>
                    </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel" />
                    <input type="submit" class="btn btn-primary btn-sm" name="btn_addemployee" id="btn_addemployee" value="Add Employee" />
                </div>
            </div>
        </div>
    </form>
</div>
