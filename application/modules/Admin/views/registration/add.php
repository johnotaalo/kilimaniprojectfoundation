<div class="row">
    <div class="col-md-12">
        <form id="individual-form" method="POST" action="<?= @base_url('Admin/registermember'); ?>" enctype="multipart/form-data" novalidate="novalidate">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">First Name</label>
                        <input class="form-control" type="text" name="first_name" required="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Last Name</label>
                        <input class="form-control" type="text" name="last_name" required="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Email Address</label>
                        <input class="form-control" type="email" name="email_address" required="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Phone</label>
                        <input class="form-control" type="phone" name="phone_number" required="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Profession</label>
                        <input class="form-control" type="text" name="profession" required="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Date of Birth</label>
                        <input class="form-control" type="date" name="dob" required="">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Company</label>
                <input class="form-control" type="text" name="company" required="">
            </div>
            <div class="form-group">
                <label class="control-label">Would you be interested in volunteering with Kilimani Project Foundation?</label>
                <div class="radio-custom radio-success">
                    <input type="radio" id="volunteering_yes" name="volunteering" value="yes" data-target=".activities">
                    <label for="volunteering_yes">Yes</label>
                </div>

                <div class="radio-custom radio-warning">
                    <input type="radio" id="volunteering_no" name="volunteering" value="no" data-target=".activities">
                    <label for="volunteering_no">No</label>
                </div>
            </div>	
            <div class="form-group activities">
            <label class="control-label">If so, what skills could you bring and/or activities would you like to participate in?</label>
            <textarea class="form-control" name="activities" rows="8"></textarea>
            </div>
            <div class="form-group">
            <label class="control-label">Please upload a passport photo of yourself</label>
            <input type="file" name="passport_photo" class="form-control">
            </div>

            <button class="btn btn-primary btn-block mb-5">Register Member</button>							
        </form>
    </div>
</div>