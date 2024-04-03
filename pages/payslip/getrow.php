<div id="getrow<?php echo $row['oid']; ?>" class="modal fade">
    <form method="post">
        <div class="modal-dialog modal-sm" style="width:800px !important;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add Payslip</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">

                            <input type="hidden" value="<?php echo $row['oid']; ?>" name="hidden_id" id="hidden_id" />

                            <div class="form-group">
                                <label for="txt_employee">Employee:</label>
                                <select name="txt_employee" id="txt_employee" class="form-control input-sm">
                                    <option value="" disabled selected>Select Employee</option>
                                    <?php
                                    // Assuming $con is the MySQLi database connection variable
                                    $result = mysqli_query($con, "SELECT oid, fname, mname, lname, suffix FROM tbl_employee");
                                    while ($employee_row = mysqli_fetch_array($result)) {
                                        $fullName = $employee_row['lname'] . ', ' . $employee_row['fname'] . ' ' . $employee_row['suffix'] . ' ' . $employee_row['mname'];
                                        echo '<option value="' . $employee_row['oid'] . '">' . $fullName . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class=" form-group">
                                <label>Month:</label>
                                <input name="txt_month" class="form-control input-sm" type="month" value="<?php echo  $row['month_']; ?>" />
                            </div>

                            <div class="form-group">
                                <label for="txt_daterange">Range:</label>
                                <select name="txt_daterange" class="form-control input-sm">
                                    <option value="" disabled selected>Select Range</option>
                                    <?php
                                    $result = mysqli_query($con, "SELECT oid, range_ FROM tbl_range");
                                    while ($range_row = mysqli_fetch_array($result)) {
                                        echo '<option value="' . $range_row['oid'] . '">' . $range_row['range_'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class=" form-group">
                                <label>Purpose:</label>
                                <input name="txt_purpose" class="form-control input-sm" type="text" value="<?php echo  $row['purpose']; ?>" />
                            </div>

                            <hr style="border: 1px solid black;">    

                            <div class=" form-group">
                                <label>Gross Pay: </label>
                                <input name="txt_gross" class="form-control input-sm" type="text" value="<?php echo  $row['grosspay']; ?>" />
                            </div>

                            <div class="form-group">
                                <label>RATA:</label>
                                <input name="txt_rata" class="form-control input-sm " type="text" value="<?php echo  $row['rata']; ?>"  />
                            </div>

                            <div class=" form-group">
                                <label>PERA: </label>
                                <input name="txt_pera" class="form-control input-sm" type="text" value="<?php echo  $row['pera']; ?>" />
                            </div>

                            <div class="form-group col-md-6">
                                <label>Others:</label>
                                <input name="txt_othersadd" class="form-control input-sm" type="text" value="<?php echo  $row['othersadd']; ?>" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>Value:</label>
                                <input name="txt_othersaddvalue" class="form-control input-sm" type="text" value="<?php echo  $row['othersaddvalue']; ?>" />
                            </div>

                            <hr style="border: 1px solid black;">    

                            <div class=" form-group">
                                <label>Philhealth: </label>
                                <input name="chk_phihealth" class="form-check-input" type="checkbox" />
                                <input name="txt_phihealth" class="form-control input-sm" type="text" value="<?php echo  $row['phihealth']; ?>" />
                            </div>

                            <div class=" form-group">
                                <label>With holding Tax: </label>
                                <input name="chk_wholdtax" class="form-check-input" type="checkbox" />
                                <input name="txt_wholdtax" class="form-control input-sm" type="text" value="<?php echo  $row['wholdtax']; ?>" />
                            </div>

                            <hr style="border: 1px solid black;">    


                            <div class=" form-group">
                                <label>Pag-Ibig: </label>
                                <input name="chk_pagibig" class="form-check-input" type="checkbox" />
                                <input name="txt_pagibig" class="form-control input-sm" type="text" value="<?php echo  $row['pagibig']; ?>" />
                            </div>

                            <div class=" form-group">
                                <label>MPL (Pag-ibig): </label>
                                <input name="chk_mpl" class="form-check-input" type="checkbox" />
                                <input name="txt_mpl" class="form-control input-sm" type="text" value="<?php echo  $row['mpl']; ?>" />
                            </div>

                            <div class=" form-group">
                                <label>MP2 (Pag-ibig): </label>
                                <input name="chk_mp2" class="form-check-input" type="checkbox" />
                                <input name="txt_mp2" class="form-control input-sm" type="text" value="<?php echo  $row['mp2']; ?>" />
                            </div>

                            <hr style="border: 1px solid black;">    

                            <div class=" form-group">
                                <label>GSIS Premium: </label>
                                <input name="chk_gsisprem" class="form-check-input" type="checkbox" />
                                <input name="txt_gsisprem" class="form-control input-sm" type="text" value="<?php echo  $row['gsisprem']; ?>" />
                            </div>

                            <div class=" form-group">
                                <label>GSIS MPL: </label>
                                <input name="chk_gsismpl" class="form-check-input" type="checkbox" />
                                <input name="txt_gsismpl" class="form-control input-sm" type="text" value="<?php echo  $row['gsismpl']; ?>" />
                            </div>

                            <div class=" form-group">
                                <label>GSIS GFAL: </label>
                                <input name="chk_gsisgfal" class="form-check-input" type="checkbox" />
                                <input name="txt_gsisgfal" class="form-control input-sm" type="text" value="<?php echo  $row['gsisgfal']; ?>" />
                            </div>

                            <div class=" form-group">
                                <label>GSIS E-Card: </label>
                                <input name="chk_gsisecard" class="form-check-input" type="checkbox" />
                                <input name="txt_gsisecard" class="form-control input-sm" type="text" value="<?php echo  $row['gsisecard_']; ?>" />
                            </div>

                            <hr style="border: 1px solid black;">    

                            <div class=" form-group">
                                <label>POLICY LOAN: </label>
                                <input name="chk_ploan" class="form-check-input" type="checkbox" />
                                <input name="txt_ploan" class="form-control input-sm" type="text" value="<?php echo  $row['ploan']; ?>" />
                            </div>

                            <div class=" form-group">
                                <label>CALIMITY LOAN: </label>
                                <input name="chk_cloan" class="form-check-input" type="checkbox" />
                                <input name="txt_cloan" class="form-control input-sm" type="text" value="<?php echo  $row['cloan']; ?>" />
                            </div>

                            <div class=" form-group">
                                <label>EMERGENCY LOAN: </label>
                                <input name="chk_eloan" class="form-check-input" type="checkbox" />
                                <input name="txt_eloan" class="form-control input-sm" type="text" value="<?php echo  $row['eloan']; ?>" />
                            </div>

                            <div class=" form-group">
                                <label>COMP. LOAN: </label>
                                <input name="chk_comploan" class="form-check-input" type="checkbox" />
                                <input name="txt_comploan" class="form-control input-sm" type="text" value="<?php echo  $row['comploan']; ?>" />
                            </div>

                            <div class=" form-group">
                                <label>EDUCATION LOAN: </label>
                                <input name="chk_educloan" class="form-check-input" type="checkbox" />
                                <input name="txt_educloan" class="form-control input-sm" type="text" value="<?php echo  $row['educloan']; ?>" />
                            </div>

                            <div class=" form-group">
                                <label>CONSO. LOAN: </label>
                                <input name="chk_consoloan" class="form-check-input" type="checkbox" />
                                <input name="txt_consoloan" class="form-control input-sm" type="text" value="<?php echo  $row['consoloan']; ?>" />
                            </div>

                            <div class=" form-group">
                                <label>LBP: </label>
                                <input name="chk_lbp" class="form-check-input" type="checkbox" />
                                <input name="txt_lbp" class="form-control input-sm" type="text" value="<?php echo  $row['lbp']; ?>" />
                            </div>
                            <hr style="border: 1px solid black;">  

                            <div class="form-group col-md-6">
                                <label>Others:</label>
                                <input name="txt_othersless" class="form-control input-sm" type="text" value="<?php echo  $row['othersless']; ?>" />
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label>Value:</label>
                                <input name="chk_lessvalue" class="form-check-input" type="checkbox" />
                                <input name="txt_otherslessvalue" class="form-control input-sm" type="text" value="<?php echo  $row['otherslessvalue']; ?>"/>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary btn-sm" name="btn_newpayslip">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>