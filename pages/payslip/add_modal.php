<!-- ========================= MODAL ======================= -->
<div id="addpayslip" class="modal fade">
    <form method="post">
        <div class="modal-dialog modal-sm" style="width:800px !important;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Payslip</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="form-group">
                                <label for="txt_employee">Employee:</label>
                                <select name="txt_employee" id="txt_employee" class="form-control input-sm">
                                    <option value="" disabled selected>Select Employee</option>
                                    <?php
                                    // Assuming $con is the MySQLi database connection variable
                                    $result = mysqli_query($con, "SELECT oid, fname, mname, lname, suffix FROM tbl_employee");
                                    while ($row = mysqli_fetch_array($result)) {
                                        $fullName = $row['lname'] . ', ' . $row['fname'] . ' ' . $row['suffix'] . ' ' . $row['mname'];
                                        echo '<option value="' . $row['oid'] . '">' . $fullName . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label>Month:</label>
                                <input name="txt_month" class="form-control input-sm" id="month" type="month" placeholder="Month" />
                            </div>

                            <div class="form-group col-md-4">
                                <label>Range:</label>
                                <select name="txt_daterange" class="form-control input-sm">
                                    <option selected="" disabled="">Select Range</option>
                                    <?php
                                    $result = mysqli_query($con, "SELECT oid, range_ FROM tbl_range");
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo '<option value="' . $row['oid'] . '">' . $row['range_'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label>Purpose:</label>
                                <input name="txt_purpose" class="form-control input-sm" id="purpose" type="text" placeholder="Purpose" />
                            </div>

                            <hr style="border: 1px solid black;">    

                            <div class="form-group">
                                <label>Gross Pay:</label>
                                <input name="txt_gross" class="form-control input-sm " id="gross" type="number" step="0.01" placeholder="Gross Pay" />
                            </div>

                            <div class="form-group">
                                <label>RATA:</label>
                                <input name="txt_rata" class="form-control input-sm " id="rata" type="number" step="0.01" placeholder="RATA" />
                            </div>

                            <div class="form-group">
                                <label>PERA:</label>
                                <input name="txt_pera" class="form-control input-sm" id="pera" type="number" step="0.01" placeholder="PERA" />
                            </div>

                            <div class="form-group col-md-6">
                                <label>Others:</label>
                                <input name="txt_othersadd" class="form-control input-sm" id="othersadd" type="text" placeholder="Others" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>Value:</label>
                                <input name="txt_othersaddvalue" class="form-control input-sm" id="othersaddvalue" type="number" step="0.01" placeholder="Value" />
                            </div>

                            <hr style="border: 1px solid black;">    

                            <div class="form-group">
                                <label>Philhealth:</label>
                                <input name="chk_phihealth" class="form-check-input" type="checkbox" />
                                <input name="txt_phihealth" class="form-control input-sm" id="phihealth" type="number" step="0.01" placeholder="Philhealth" />
                            </div>

                            <div class="form-group">
                                <label>Withholding Tax:</label>
                                <input name="chk_wholdtax" class="form-check-input" type="checkbox" />
                                <input name="txt_wholdtax" class="form-control input-sm" id="wholdtax" type="number" step="0.01" placeholder="Withholding Tax" />
                            </div>

                            <hr style="border: 1px solid black;">    

                            <div class="form-group">
                                <label>Pag-Ibig:</label>
                                <input name="chk_pagibig" class="form-check-input" type="checkbox" />
                                <input name="txt_pagibig" class="form-control input-sm" id="pagibig" type="number" step="0.01" placeholder="Pag-Ibig" />
                            </div>

                            <div class="form-group col-md-6">
                                <label>MPL (Pag-ibig):</label>
                                <input name="chk_mpl" class="form-check-input" type="checkbox" />
                                <input name="txt_mpl" class="form-control input-sm" id="mpl" type="number" step="0.01" placeholder="MPL (Pag-ibig)" />
                            </div>

                            <div class="form-group col-md-6">
                                <label>MP2 (Pag-ibig):</label>
                                <input name="chk_mp2" class="form-check-input" type="checkbox" />
                                <input name="txt_mp2" class="form-control input-sm" id="mp2" type="number" step="0.01" placeholder="MP2 (Pag-ibig)" />
                            </div>

                            <hr style="border: 1px solid black;">    
                            
                            <div class="form-group col-md-6">
                                <label>GSIS Premium:</label>
                                <input name="chk_gsisprem" class="form-check-input" type="checkbox" />
                                <input name="txt_gsisprem" class="form-control input-sm" id="gsisprem" type="number" step="0.01" placeholder="GSIS Premium" />
                            </div>

                            <div class="form-group col-md-6">
                                <label>GSIS MPL:</label>
                                <input name="chk_gsismpl" class="form-check-input" type="checkbox" />
                                <input name="txt_gsismpl" class="form-control input-sm" id="gsismpl" type="number" step="0.01" placeholder="GSIS MPL" />
                            </div>

                            <div class="form-group col-md-6">
                                <label>GSIS GFAL:</label>
                                <input name="chk_gsisgfal" class="form-check-input" type="checkbox" />
                                <input name="txt_gsisgfal" class="form-control input-sm" id="gsisgfal" type="number" step="0.01" placeholder="GSIS GFAL" />
                            </div>

                            <div class="form-group col-md-6">
                                <label>GSIS E-Card:</label>
                                <input name="chk_gsisecard" class="form-check-input" type="checkbox" />
                                <input name="txt_gsisecard" class="form-control input-sm" id="gsisecard" type="number" step="0.01" placeholder="GSIS E-Card" />
                            </div>

                            <hr style="border: 1px solid black;">    

                            <div class="form-group">
                                <label>POLICY LOAN:</label>
                                <input name="chk_ploan" class="form-check-input" type="checkbox" />
                                <input name="txt_ploan" class="form-control input-sm" id="ploan" type="number" step="0.01" placeholder="POLICY LOAN" />
                            </div>

                            <div class="form-group">
                                <label>CALIMITY LOAN:</label>
                                <input name="chk_cloan" class="form-check-input" type="checkbox" />
                                <input name="txt_cloan" class="form-control input-sm" id="cloan" type="number" step="0.01" placeholder="CALIMITY LOAN" />
                            </div>

                            <div class="form-group">
                                <label>EMERGENCY LOAN:</label>
                                <input name="chk_eloan" class="form-check-input" type="checkbox" />
                                <input name="txt_eloan" class="form-control input-sm" id="eloan" type="number" step="0.01" placeholder="EMERGENCY LOAN" />
                            </div>

                            <div class="form-group">
                                <label>COMP. LOAN:</label>
                                <input name="chk_comploan" class="form-check-input" type="checkbox" />
                                <input name="txt_comploan" class="form-control input-sm" id="comploan" type="number" step="0.01" placeholder="COMP. LOAN" />
                            </div>

                            <div class="form-group">
                                <label>EDUCATION LOAN:</label>
                                <input name="chk_educloan" class="form-check-input" type="checkbox" />
                                <input name="txt_educloan" class="form-control input-sm" id="educloan" type="number" step="0.01" placeholder="EDUCATION LOAN" />
                            </div>

                            <div class="form-group">
                                <label>CONSO. LOAN:</label>
                                <input name="chk_consoloan" class="form-check-input" type="checkbox" />
                                <input name="txt_consoloan" class="form-control input-sm" id="consoloan" type="number" step="0.01" placeholder="CONSO. LOAN" />
                            </div>

                            <div class="form-group">
                                <label>LBP:</label>
                                <input name="chk_lbp" class="form-check-input" type="checkbox" />
                                <input name="txt_lbp" class="form-control input-sm" id="lbp" type="number" step="0.01" placeholder="LBP" />
                            </div>
                            <hr style="border: 1px solid black;">  
                            <div class="form-group col-md-6">
                                <label>Others:</label>
                                <input name="txt_othersless" class="form-control input-sm" id="othersadd" type="text" placeholder="Others" />
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label>Value:</label>
                                <input name="chk_lessvalue" class="form-check-input" type="checkbox" />
                                <input name="txt_otherslessvalue" class="form-control input-sm" id="otherslessvalue" type="number" step="0.01"  placeholder="Value" />
                            </div>

                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel" />
                    <input type="submit" class="btn btn-primary btn-sm" name="btn_payslip" id="btn_payslip" value="Add Payslip" />
                </div>
            </div>
        </div>
    </form>
</div>


<script>
    // Function to limit the number of decimal places to 2
    function limitDecimals(input) {
        const value = input.value;
        const parts = value.split('.');
        if (parts.length > 1 && parts[1].length > 2) {
            input.value = parseFloat(value).toFixed(2);
        }
    }

    // Add event listeners to the input fields
    document.addEventListener('DOMContentLoaded', function() {
        const inputFields = document.querySelectorAll('input[type="number"]');
        inputFields.forEach(input => {
            input.addEventListener('input', function() {
                limitDecimals(this);
            });
            input.addEventListener('blur', function() {
                limitDecimals(this);
            });
        });
    });
</script>