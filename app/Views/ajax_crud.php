<div class="container">
    <h2 class="text-center mt-4 mb-4">Codeigniter 4 Ajax CRUD Application</h2>
    <span id="message"></span>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">Sample Data</div>
                <div class="col text-right">
                    <button type="button" name="add_record" id="add_record" class="btn btn-success btn-sm">Add</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form method="post" id="user_form">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Data</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" id="name" class="form-control" />
                            <span id="name_error" class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" id="email" class="form-control" />
                            <span id="email_error" class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            <span id="gender_error" class="text-danger"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="hidden_id" id="hidden_id" />
                        <input type="hidden" name="action" id="action" value="Add" />
                        <input type="submit" name="submit" id="submit_button" class="btn btn-success" value="Add" />
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>