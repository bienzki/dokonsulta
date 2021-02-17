<div class="page-wrapper">
    <div class="content">
        <div class="card card-body">
            <form id="searchDoctor" autocomplete="off">
                <div class="row">
                    <div class="col-12">
                        <h6>Advanced Search</h6>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <input type="text" class="form-control" id="searchName" name="searchName" placeholder="Search Doctor" />
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <select id="searchCity" name="searchCity" class="form-control select">
                                <option value="">-All Locations -</option>
                                <?php foreach ($cities as $city) : ?>
                                    <option value="<?= $city['city'] ?>"><?= $city['city'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <select id="searchSpecialty" name="searchSpecialty" class="form-control select">
                                <option value="">-All Practice -</option>
                                <?php foreach ($specialties as $specialty) : ?>
                                    <option value="<?= $specialty ?>"><?= $specialty ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-raised btn-primary" id="advanced_search"> <i class="fa fa-search mr-10"></i> Search</button>
                    </div>
                </div>
            </form>
        </div>
        <p class="pt-4">Records Found: <span id="found"></span></p>
        <div class="row doctors-list pt-4" id="searchResult">
        </div>
        <div class="text-center" id="searchMessage"></div>
    </div>
</div>