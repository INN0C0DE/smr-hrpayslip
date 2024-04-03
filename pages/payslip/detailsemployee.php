<?php
echo '
<div id="detailsemployee' . $row['oid'] . '" class="modal fade" style="margin: auto;">
    <form method="post" enctype="multipart/form-data">
        <div class="modal-dialog modal-sm" style="width:1200px !important;">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Details</h4>
                    <span style="float:right; color:green;"> Last Update: ' . $newDateFormat . '</span>
                   
                </div>
               
                <div class="modal-body">

                <div class="row">
                <div class="col-md-6">
                <label>Employee ID:</label>
                <div class="form-group form-control" type="text" value="Disabled readonly input" aria-label="Disabled input example" disabled readonly>
                    ' . $row['empno'] . '
                </div>
            </div>

            <div class="col-md-6">
                <label>Employee Status:</label>
                <div class="form-group form-control" type="text" value="Disabled readonly input" aria-label="Disabled input example" disabled readonly>
                    ' . $row['empstatus'] . '
                </div>
            </div>
            </div>
            <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" value="' . $row['oid'] . '" name="hidden_id" id="hidden_id" />

                            <div class="row">


                            <div class="col-md-6">
                                <label>Last Name:</label>
                                <div class="form-group form-control" type="text" value="Disabled readonly input" aria-label="Disabled input example" disabled readonly>
                                    ' . $row['lname'] . '
                                </div>
                            </div>

                            <div class="col-md-6">
                            <label>Birth Date:</label>
                            <div class="form-group form-control" type="text" value="Disabled readonly input" aria-label="Disabled input example" disabled readonly>
                                ' . $row['bdate'] . '
                            </div>
                        </div>


                        </div>

                        <div class="row">

                        <div class="col-md-6">
                        <label>First Name:</label>
                        <div class="form-group form-control" type="text" value="Disabled readonly input" aria-label="Disabled input example" disabled readonly>
                            ' . $row['fname'] . '
                        </div>
                    </div>

                    <div class="col-md-6">
                    <label>Place of Birth:</label>
                    <div class="form-group form-control" type="text" value="Disabled readonly input" aria-label="Disabled input example" disabled readonly>
                        ' . $row['pbirth'] . '
                    </div>
                </div>
                           
                        </div>

                        <div class="row">

                        <div class="col-md-6">
                        <label>Middle Name:</label>
                        <div class="form-group form-control" type="text" value="Disabled readonly input" aria-label="Disabled input example" disabled readonly>
                            ' . $row['mname'] . '
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                                <label>Sex:</label>
                                <div class="form-group form-control" type="text" value="Disabled readonly input" aria-label="Disabled input example" disabled readonly>
                                    ' . $row['sex'] . '
                                </div>
                            </div>
                            
                           
                        </div>

                        <div class="row">

                        <div class="col-md-6">
                        <label>Suffix:</label>
                        <div class="form-group form-control" type="text" value="Disabled readonly input" aria-label="Disabled input example" disabled readonly>
                            ' . $row['suffix'] . '
                        </div>
                    </div>
                            
                            <div class="col-md-6">
                                <label>Civil Status:</label>
                                <div class="form-group form-control" type="text" value="Disabled readonly input" aria-label="Disabled input example" disabled readonly>
                                    ' . $row['cstatus'] . '
                                </div>
                            </div>
                        </div>
                        </div>

                        <div class="col-md-6">
<div>
                                <a href="#" class="image-preview-link" data-image="' . ($row['image'] ? basename($row['image']) : 'default.jpg') . '" style="display:flex; justify-content:center;">
                                    <img src="picture/' . ($row['image'] ? basename($row['image']) : 'default.jpg') . '" style="width:2.1in;height:3in;" />
                                </a>
                            </div>
                           

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <label>Height:</label>
                            <div class="form-group form-control" type="text" value="Disabled readonly input" aria-label="Disabled input example" disabled readonly>
                                ' . $row['height'] . '
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>Weight:</label>
                            <div class="form-group form-control" type="text" value="Disabled readonly input" aria-label="Disabled input example" disabled readonly>
                                ' . $row['weight'] . '
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>Blood Type:</label>
                            <div class="form-group form-control" type="text" value="Disabled readonly input" aria-label="Disabled input example" disabled readonly>
                                ' . $row['btype'] . '
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>Citizenship:</label>
                            <div class="form-group form-control" type="text" value="Disabled readonly input" aria-label="Disabled input example" disabled readonly>
                                ' . $row['cship'] . '
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label>Mobile Number:</label>
                            <div class="form-group form-control" type="text" value="Disabled readonly input" aria-label="Disabled input example" disabled readonly>
                                ' . $row['mobileno'] . '
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Email:</label>
                            <div class="form-group form-control" type="text" value="Disabled readonly input" aria-label="Disabled input example" disabled readonly>
                                ' . $row['email'] . '
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <label>Residential Address:</label>
                            <div class="form-group form-control" type="text" value="Disabled readonly input" aria-label="Disabled input example" disabled readonly>
                                ' . $row['raddress'] . '
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label>GSIS No.:</label>
                            <div class="form-group form-control" type="text" value="Disabled readonly input" aria-label="Disabled input example" disabled readonly>
                                ' . $row['gsisno'] . '
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>PAGIBIG No.:</label>
                            <div class="form-group form-control" type="text" value="Disabled readonly input" aria-label="Disabled input example" disabled readonly>
                                ' . $row['pagibigno'] . '
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label>PhilHealth No.:</label>
                            <div class="form-group form-control" type="text" value="Disabled readonly input" aria-label="Disabled input example" disabled readonly>
                                ' . $row['philhealthno'] . '
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>SSS No.:</label>
                            <div class="form-group form-control" type="text" value="Disabled readonly input" aria-label="Disabled input example" disabled readonly>
                                ' . $row['sssno'] . '
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>TIN No.:</label>
                            <div class="form-group form-control" type="text" value="Disabled readonly input" aria-label="Disabled input example" disabled readonly>
                                ' . $row['tinno'] . '
                            </div>
                        </div>
                    </div>   
                        <hr>
                        <h2 style="text-align:center; color: red; font-weight: bold;">Person Incase of Emergency:</h2>
                        <h3>Name: </h3>
                        <div class="row">

                            <div class="col-md-4">
                                <label>Last Name:</label>
                                <div class="form-group form-control" type="text" value="Disabled readonly input" aria-label="Disabled input example" disabled readonly>
                                    ' . $row['spouselname'] . '
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label>First Name:</label>
                                <div class="form-group form-control" type="text" value="Disabled readonly input" aria-label="Disabled input example" disabled readonly>
                                    ' . $row['spousefname'] . '
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Middle Name:</label>
                                <div class="form-group form-control" type="text" value="Disabled readonly input" aria-label="Disabled input example" disabled readonly>
                                    ' . $row['spousemname'] . '
                                </div>

                            </div>

                        </div>

                        <div class="row">

                        <div class="col-md-6">
                            <label>Address:</label>
                            <div class="form-group form-control" type="text" value="Disabled readonly input" aria-label="Disabled input example" disabled readonly>
                                ' . $row['emeaddress'] . '
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label>Contact #:</label>
                            <div class="form-group form-control" type="text" value="Disabled readonly input" aria-label="Disabled input example" disabled readonly>
                                ' . $row['emecontact'] . '
                            </div>
                        </div>

                        </div>


                            <div class="modal-footer">
                                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>






                    </div>

                </div>
    </form>
</div>

';
