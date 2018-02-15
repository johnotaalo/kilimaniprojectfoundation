<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= @"{$member->firstname} {$member->lastname}"; ?></title>
    <link rel="stylesheet" href="<?= @$this->config->item('assets_url'); ?>vendor/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="col-md-4 offset-md-4">
            <div class="card card-outline-info text-center" style = "margin-top: 15px;">
                <div class="card-body">
                    <?php
                        $member->photo = ($member->photo) ? $member->photo : $root . 'assets/img/no-image.png';
                    ?>
                    <center style = "margin-bottom: 10px;"><img src="<?= @str_replace($root, base_url(), $member->photo); ?>" style = "width: 200px;"/></center>
                    <h4><?= @ucwords(strtolower("{$member->firstname} {$member->lastname}")); ?></h4>
                    <table class = "table text-sm-left">
                        <tbody>
                            <tr>
                                <td class = 'text-sm-right'>Member No.</td>
                                <td><?= @$member->membership_no; ?></td>
                            </tr>
                            <tr>
                                <td class = 'text-sm-right'>Registration Date</td>
                                <td><?= @date('F Y', strtotime($member->created_at)); ?></td>
                            </tr>
                            <tr>
                                <td class = 'text-sm-right'>Membership Status</td>
                                <td><span class = 'badge badge-success'>Active</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>