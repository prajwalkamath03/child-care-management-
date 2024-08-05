<div class="content py-3">
    <div class="container-fluid">
        <h3 class="text-center"><b>Parent Information</b></h3>
        <hr class="bg-navy">
        <div class="card card-outline card-info rounded-0 shadow">
            <div class="card-body rounded-0">
                <div class="container-fluid">
                    <form action="save_parent_information.php" method="post">
                        <fieldset>
                            <legend class="text-navy">Parent/Guardian's Information</legend>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <input type="text" id="parent_firstname" name="parent_firstname" class="form-control form-control-sm form-control-border" placeholder="Firstname" required>
                                    <small class="text-muted px-4">First Name</small>
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" id="parent_middlename" name="parent_middlename" class="form-control form-control-sm form-control-border" placeholder="Middlname" placeholder="(optional)">
                                    <small class="text-muted px-4">Middle Name</small>
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" id="parent_lastname" name="parent_lastname" class="form-control form-control-sm form-control-border" placeholder="Lastname" required>
                                    <small class="text-muted px-4">Last Name</small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <input type="text" id="parent_contact" name="parent_contact" class="form-control form-control-sm form-control-border" placeholder="Contact" required>
                                    <small class="text-muted px-4">Contact #</small>
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" id="parent_email" name="parent_email" class="form-control form-control-sm form-control-border" placeholder="Email" required>
                                    <small class="text-muted px-4">Email</small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <small class="text-muted">Address</small>
                                    <textarea name="address" id="address" rows="3" style="resize:none" class="form-control form-control-sm rounded-0" placeholder="Here Street, There City, Anywhere State, 2306"></textarea>
                                </div>
                            </div>
                        </fieldset>
                        <hr class="bg-navy">
                        <center>
                            <button type="submit" class="btn btn-lg bg-navy rounded-pill mx-2 col-3">Submit Parent Information</button>
                            <a class="btn btn-lg btn-light border rounded-pill mx-2 col-3" href="./">Cancel</a>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
