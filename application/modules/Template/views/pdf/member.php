<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
</head>
<body>
    <div class = "main-card">
        <div style = "text-align: center;margin-bottom: 10px;">
            <img src = "<?= @base_url('assets/img/reverse_logo.png'); ?>" style = "width: 50px;display: block;margin-top: 4px;margin-left: auto;margin-right: auto;"/>
            <h2 style = "margin-bottom: 0;">MEMBERSHIP CARD</h2>
            <h3  style = "margin-top: 0;"><?= @$member_no; ?></h3>
        </div>

        <table>
            <tr>
                <!-- <td class = "head">owner</td> -->
                <td colspan = "4" style = "text-align: center;"><h3><?= @"{$firstname} {$lastname}"; ?></h3></td>
            </tr>
            <tr>
                <td class = "head">valid dates</td>
                <td><h3><?= @date('m/Y', strtotime($date_joined)); ?> to <?= @date('m/Y', strtotime($date_joined . "+1 year")); ?></h3></td>
                <td class = "head">member since</td>
                <td><h3><?= @date('m/Y', strtotime($date_joined)); ?></h3></td>
            </tr>
        </table>
        
        <p style = "text-align: center;font-size: 10px;"><i>Proud Member of Kilimani Project Foundation<i></p>
    </div>

    <div class = "qr-code-holder">
        <?php
            // CHart Type
            $cht = "qr";
            // CHart Size
            $chs = "300x300";
            // CHart Link
            // the url-encoded string you want to change into a QR code
            $chl = urlencode($this->config->item('server_url') . 'Registration/member/' . $member_no);
            // CHart Output Encoding (optional)
            // default: UTF-8
            $choe = "UTF-8";
            $qrcode = 'https://chart.googleapis.com/chart?cht=' . $cht . '&chs=' . $chs . '&chl=' . $chl . '&choe=' . $choe;
        ?>
        <img src = "<?= @$qrcode; ?>" />
    </div>

    <?php if($member_photo): ?>
        <div class = "profile-photo-holder">
        <img src = "<?= @str_replace($root, base_url(), $member_photo); ?>" class = "member-photo"/>
        </div>
    <?php endif; ?>

    
</body>
</html>

