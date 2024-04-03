<?php
echo '
<div id="editpayslip' . $row['oid'] . '" class="modal fade">
    <form method="post">
        <div class="modal-dialog modal-sm" style="width:800px !important;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Edit Paylsip Info</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">

                        <input type="hidden" value="' . $row['oid'] . '" name="hidden_id" id="hidden_id"/>

                        <input type="hidden" name="txt_edit_employee" value="' . $row['employee']. '" />
                        <input type="hidden" name="txt_edit_daterange" value="' . $row['daterange']. '" />

                            <div class=" form-group">
                                <label>Month:</label>
                                <input name="txt_edit_month" class="form-control input-sm" type="month" value="' . $row['month_'] . '" />
                            </div>

                            <div class=" form-group">
                                <label>Purpose:</label>
                                <input name="txt_edit_purpose" class="form-control input-sm" type="text" value="' . $row['purpose'] . '" />
                            </div>

                            <div class=" form-group">
                                <label>Gross Pay: </label>
                                <input name="txt_edit_gross" class="form-control input-sm" type="text" value="' . $row['grosspay'] . '" />
                            </div>

                            <div class=" form-group">
                                <label>PERA: </label>
                                <input name="txt_edit_pera" class="form-control input-sm" type="text" value="' . $row['pera'] . '" />
                            </div>

                            <div class=" form-group">
                                <label>RATA: </label>
                                <input name="txt_edit_rata" class="form-control input-sm" type="text" value="' . $row['rata'] . '" />
                            </div>

                            <div class="form-group col-md-6">
                                <label>Others:</label>
                                <input name="txt_edit_othersadd" class="form-control input-sm" type="text" value="' . $row['othersadd'] . '" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>Value:</label>
                                <input name="txt_edit_othersaddvalue" class="form-control input-sm" type="number" value="' . $row['othersaddvalue'] . '" />
                            </div>


                            <div class=" form-group">
                                <label>Philhealth: </label>
                                <input name="txt_edit_phihealth" class="form-control input-sm" type="text" value="' . $row['phihealth'] . '" />
                            </div>

                            <div class=" form-group">
                                <label>With holding Tax: </label>
                                <input name="txt_edit_wholdtax" class="form-control input-sm" type="text" value="' . $row['wholdtax'] . '" />
                            </div>

                            <div class=" form-group">
                                <label>Pag-Ibig: </label>
                                <input name="txt_edit_pagibig" class="form-control input-sm" type="text" value="' . $row['pagibig'] . '" />
                            </div>

                            <div class=" form-group">
                                <label>MPL (Pag-ibig): </label>
                                <input name="txt_edit_mpl" class="form-control input-sm" type="text" value="' . $row['mpl'] . '" />
                            </div>

                            <div class=" form-group">
                                <label>MP2 (Pag-ibig): </label>
                                <input name="txt_edit_mp2" class="form-control input-sm" type="text" value="' . $row['mp2'] . '" />
                            </div>

                            <div class=" form-group">
                                <label>GSIS Premium: </label>
                                <input name="txt_edit_gsisprem" class="form-control input-sm" type="text" value="' . $row['gsisprem'] . '" />
                            </div>

                            <div class=" form-group">
                                <label>GSIS MPL: </label>
                                <input name="txt_edit_gsismpl" class="form-control input-sm" type="text" value="' . $row['gsismpl'] . '" />
                            </div>

                            <div class=" form-group">
                                <label>GSIS GFAL: </label>
                                <input name="txt_edit_gsisgfal" class="form-control input-sm" type="text" value="' . $row['gsisgfal'] . '" />
                            </div>

                            <div class=" form-group">
                                <label>GSIS E-CARD: </label>
                                <input name="txt_edit_gsisecard" class="form-control input-sm" type="text" value="' . $row['gsisecard_'] . '" />
                            </div>

                            <div class=" form-group">
                                <label>POLICY LOAN: </label>
                                <input name="txt_edit_ploan" class="form-control input-sm" type="text" value="' . $row['ploan'] . '" />
                            </div>

                            <div class=" form-group">
                                <label>CALIMITY LOAN: </label>
                                <input name="txt_edit_cloan" class="form-control input-sm" type="text" value="' . $row['cloan'] . '" />
                            </div>

                            <div class=" form-group">
                                <label>EMERGENCY LOAN: </label>
                                <input name="txt_edit_eloan" class="form-control input-sm" type="text" value="' . $row['eloan'] . '" />
                            </div>

                            <div class=" form-group">
                                <label>COMP. LOAN: </label>
                                <input name="txt_edit_comploan" class="form-control input-sm" type="text" value="' . $row['comploan'] . '" />
                            </div>

                            <div class=" form-group">
                                <label>EDUCATION LOAN: </label>
                                <input name="txt_edit_educloan" class="form-control input-sm" type="text" value="' . $row['educloan'] . '" />
                            </div>

                            <div class=" form-group">
                                <label>CONSO. LOAN: </label>
                                <input name="txt_edit_consoloan" class="form-control input-sm" type="text" value="' . $row['consoloan'] . '" />
                            </div>

                            <div class=" form-group">
                                <label>LBP: </label>
                                <input name="txt_edit_lbp" class="form-control input-sm" type="text" value="' . $row['lbp'] . '" />
                            </div>

                            <div class=" form-group">
                                <label>PNB: </label>
                                <input name="txt_edit_pnb" class="form-control input-sm" type="text" value="' . $row['pnb'] . '" />
                            </div>

                            <div class=" form-group form-group col-md-6">
                                <label>Others: </label>
                                <input name="txt_edit_othersless" class="form-control input-sm" type="text" value="' . $row['othersless'] . '" />
                            </div>

                            <div class=" form-group form-group col-md-6">
                                <label>Value: </label>
                                <input name="txt_edit_otherslessvalue" class="form-control input-sm" type="text" value="' . $row['otherslessvalue'] . '" />
                            </div>

                            
                            '; ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary btn-sm" name="btn_editpayslip">Save</button>
               </div>
            </div>
        </div>
    </form>
</div>