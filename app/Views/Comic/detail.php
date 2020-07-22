<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Comic Detail</h2>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/img/<?= $comic['cover']; ?>" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"> <?= $comic['title']; ?></h5>
                            <p class="card-text"><b>Writer : </b><?= $comic['writer']; ?></p>
                            <p class="card-text"><small class="text-muted"><b>Penerbit : </b><?= $comic['publisher']; ?></small></p>

                            <a href="/comic/edit/<?= $comic['slug']; ?>" class="btn btn-warning">Edit</a>

                            <form action="/comic/<?= $comic['id']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Your sure for delete?');">Delete</button>
                            </form>
                            <br><br>
                            <a href="/comic">Back To List Comics</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>