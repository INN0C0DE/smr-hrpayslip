<?php
echo'<div id="editemployee' . $row['oid'] . '" class="modal fade">
    <form method="post" enctype="multipart/form-data">
        <div class="modal-dialog modal-sm" style="width:1200px !important;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Edit Info</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="hidden" value="' . $row['oid'] . '" name="hidden_id" id="hidden_id" />
                                    
                                    <div class=" form-group">
                                        <label>First Name: </label>
                                        <input name="txt_edit_fname" class="form-control input-sm" type="text" value="' . $row['fname'] . '" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class=" form-group">
                                        <label>Middle Name: </label>
                                        <input name="txt_edit_mname" class="form-control input-sm" type="text" value="' . $row['mname'] . '" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class=" form-group">
                                        <label>Last Name: </label>
                                        <input name="txt_edit_lname" class="form-control input-sm" type="text" value="' . $row['lname'] . '" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class=" form-group">
                                        <label>Suffix: </label>
                                        <input name="txt_edit_suffix" class="form-control input-sm" type="text" value="' . $row['suffix'] . '" />
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class=" form-group">
                                        <label>Date of Birth: </label>
                                        <input name="txt_edit_bdate" class="form-control input-sm" type="date" value="' . $row['bdate'] . '" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class=" form-group">
                                        <label>Place of Birth: </label>
                                        <input name="txt_edit_pbirth" class="form-control input-sm" type="text" value="' . $row['pbirth'] . '" />
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class=" form-group">
                                        <label>Sex:</label>
                                        <select name="txt_edit_sex" class="form-control input-sm">
                                            <option value="' . $row['sex'] . '" selected>' . $row['sex'] . '</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Civil Status:</label>
                                        <select name="txt_edit_cstatus" id="civil_status" class="form-control input-sm">
                                            <option value="' . $row['cstatus'] . '" selected>' . $row['cstatus'] . '</option>
                                            <option value="Single">Single</option>
                                            <option value="Widowed">Widowed</option>
                                            <option value="Married">Married</option>
                                            <option value="Separated">Separated</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group" id="other_cstatus" style="display: none;">
                                <label>Other Civil Status:</label>
                                <input type="text" name="txt_edit_other_cstatus" class="form-control input-sm">
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class=" form-group">
                                        <label>Height: </label>
                                        <input name="txt_edit_height" class="form-control input-sm" type="float" value="' . $row['height'] . '" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class=" form-group">
                                        <label>Weight: </label>
                                        <input name="txt_edit_weight" class="form-control input-sm" type="number" value="' . $row['weight'] . '" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class=" form-group">
                                        <label>Blood Type: </label>
                                        <input name="txt_edit_btype" class="form-control input-sm" type="text" value="' . $row['btype'] . '" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class=" form-group">
                                        <label>Citizenship: </label>
                                        <input name="txt_edit_cship" class="form-control input-sm" type="text" value="' . $row['cship'] . '" />
                                    </div>
                                </div>
                            </div>

                            <div class=" form-group">
                                <label>Residental Address: </label>
                                <input name="txt_edit_raddress" class="form-control input-sm" type="text" value="' . $row['raddress'] . '" />
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class=" form-group">
                                        <label>GSIS ID No.: </label>
                                        <input name="txt_edit_gsisno" class="form-control input-sm" type="number" value="' . $row['gsisno'] . '" />
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class=" form-group">
                                        <label>PAG-IBIG ID No.: </label>
                                        <input name="txt_edit_pagibigno" class="form-control input-sm" type="number" value="' . $row['pagibigno'] . '" />
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class=" form-group">
                                        <label>PHILHEALTH ID No.: </label>
                                        <input name="txt_edit_philhealthno" class="form-control input-sm" type="number" value="' . $row['philhealthno'] . '" />
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class=" form-group">
                                        <label>SSS ID No.: </label>
                                        <input name="txt_edit_sssno" class="form-control input-sm" type="number" value="' . $row['sssno'] . '" />
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class=" form-group">
                                        <label>TIN ID No.: </label>
                                        <input name="txt_edit_tinno" class="form-control input-sm" type="number" value="' . $row['tinno'] . '" />
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class=" form-group">
                                        <label>Mobile No.: </label>
                                        <input name="txt_edit_mobileno" class="form-control input-sm" type="number" value="' . $row['mobileno'] . '" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class=" form-group">
                                        <label>E-Mail No.: </label>
                                        <input name="txt_edit_email" class="form-control input-sm" type="text" value="' . $row['email'] . '" />
                                    </div>
                                </div>
                            </div>

                            <h4>Spouse</h4>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class=" form-group">
                                        <label>Surname: </label>
                                        <input name="txt_edit_spouselname" class="form-control input-sm" type="text" value="' . $row['spouselname'] . '" />
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class=" form-group">
                                        <label>First Name: </label>
                                        <input name="txt_edit_spousefname" class="form-control input-sm" type="text" value="' . $row['spousefname'] . '" />
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class=" form-group">
                                        <label>Middle Name: </label>
                                        <input name="txt_edit_spousemname" class="form-control input-sm" type="text" value="' . $row['spousemname'] . '" />
                                    </div>
                                </div>
                            </div>
                            <h4>Name of Children: </h4>
                            <div class="row">
                                <div class="col-md-6">
                                 
                                    <div class=" form-group">

                                        <input name="txt_edit_child1" class="form-control input-sm" type="text" value="' . $row['child1'] . '" />
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class=" form-group">
                                        <input name="txt_edit_child2" class="form-control input-sm" type="text" value="' . $row['child2'] . '" />
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-md-6">
                                    <div class=" form-group">
                                        <input name="txt_edit_child3" class="form-control input-sm" type="text" value="' . $row['child3'] . '" />
                                    </div>
                                </div>



                                <div class="col-md-6">
                                    <div class=" form-group">
                                        <input name="txt_edit_child4" class="form-control input-sm" type="text" value="' . $row['child4'] . '" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class=" form-group">
                                        <input name="txt_edit_child5" class="form-control input-sm" type="text" value="' . $row['child5'] . '" />
                                    </div>
                                </div>
                            </div>

                        </div>



                    </div>



                    '; ?>

                    <script>
                        document.getElementById('civil_status').addEventListener('change', function() {
                            var selectedOption = this.value;
                            var otherCStatusField = document.getElementById('other_cstatus');

                            if (selectedOption === 'Others') {
                                otherCStatusField.style.display = 'block';
                            } else {
                                otherCStatusField.style.display = 'none';
                            }
                        });
                    </script>



                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary btn-sm" name="btn_save">Save</button>
        </div>
</div>
</div>
</form>
</div>