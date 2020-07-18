<?= $this->extend('layout/template'); ?>


<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h3 class="my-3">Form Add Data Comic</h3>
            <!-- <?= $validation->ListErrors; ?> -->
            <form action="/comic/save" method="post">
                <?= csrf_field(); ?>
                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : ''; ?>" id="title" name="title" autofocus value="<?= old('title'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('title'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="writer" class="col-sm-2 col-form-label">writer</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="writer" name="writer" value="<?= old('writer'); ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="publisher" class="col-sm-2 col-form-label">publisher</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="publisher" name="publisher" value="<?= old('publisher'); ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="cover" class="col-sm-2 col-form-label">cover</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="cover" name="cover" value="<?= old('cover'); ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Add Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>