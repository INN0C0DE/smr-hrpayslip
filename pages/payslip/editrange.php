<?php
echo '<div id="editrange' . $row['oid'] . '" class="modal fade">
        <form method="post">
            <div class="modal-dialog modal-sm" style="width:800px !important;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Edit Info</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                            
                                <input type="hidden" value="' . $row['oid'] . '" name="hidden_id" id="hidden_id"/>

                                <div class=" form-group">
                                    <label>Range: </label>
                                    <input name="txt_edit_range" class="form-control input-sm" type="text" value="' . $row['range_'] . '" />
                                </div>

                                  '; ?>
                        

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary btn-sm" name="btn_range">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>