<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URL SHORTENER CI3</title>
    <link href="<?= base_url('assets/bootstrap/css/bootstrap.min.css" rel="stylesheet')?>" />
    <link rel="icon" type="image/png" href="<?= base_url('favicon.png')?>" />

</head>

<body>

    <div class="container">
        <div class="text-center mt-4">
            <h5>URL SHORTENER CI3</h5>
        </div>
        <form method='POST' action="<?= base_url('shortlink/insertlink')?>">
            <div class="form-group">
                <label for="url">URL</label>
                <input type="text" class="form-control" id="url" name="url" aria-describedby="emailHelp"
                    placeholder="Http://" required>
            </div>
            <label for="name">CUSTOMIZE LINK</label>
            <div class="input-group">
                <div class="input-group-prepend" >
                    <span class="input-group-text" id="basic-addon3"><?= base_url('/') ?></span>
                </div>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="basic-addon3" required>
            </div>

            <div class="input-group mt-1 mb-3">
                <a id="btn-cek" class="btn btn-sm btn-success">CEK AVAILABILITY</a>
                <small class="mt-2 ml-3" id ="error"></small>
            </div>
            <div class="input-group">
                <button class="btn btn-primary btn-block">SHORTEN</button>
            </div>
        </form>
        <?php if($this->session->flashdata('url')){?>
        <hr>
        <div class="container jumbotron">
            <h4>Excellent! Copy Your Shortened URL.</h4>
            <input type="text" class="form-control" id="url-short" name="url-short" value="<?php echo $this->session->flashdata('url')?>" readonly>
            <small class="mt-2 ml-3" id ="error2"></small><br>
            <button class="btn btn-secondary btn-sm mt-2" id="copy-url">COPY SHORTENED LINK</button>
        </div>
        <?php } ?>
    </div>





    <script src="<?= base_url('assets/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/scripts.js')?>"></script>
</body>

</html>