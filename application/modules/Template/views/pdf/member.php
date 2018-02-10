<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
</head>
<body>
    <div style = "text-align: center;margin-bottom: 10px;">
        <img src = "<?= @base_url('assets/img/Logo.png'); ?>" style = "width: 100px;display: block;margin-left: auto;margin-right: auto;"/>
    </div>
    <div class="member-section" style = "float: left;width: 100%;">
        <div class="col-9" style = "height: 600px;">
            <!-- <div style = "position: absolute;background-color: #000;width:50px;height:50px;"></div> -->
            <div style = "background-image: url(http://www.kilimani.co.ke/wp-content/uploads/revslider/home-v1/mageeks-1024x680.jpg);height: 600px;"></div>
        </div>
        <div class="col-3">
            <div style = "margin-bottom: 15px; background-color: rgb(149,216,231);">
                <img src = "<?= @str_replace($root, base_url(), "C:/Users/chriz/xampp/htdocs/kilimani/uploads/314eda5812496eb471ee65121fc1923b.png"); ?>" class = "member-photo"/>
            </div>
            <div class="member-details">
                <p>Name</p>
                <h3>CHRISPINE OTAALO JOHN</h3>

                <p>Membership No.</p>
                <h3><?= @rand(0, 99999999); ?></h3>

                <p>Date Joined</p>
                <h3><?= @date('d-m-Y'); ?></h3>

                <p>Expiry date</p>
                <h3><?= @date('d-m-Y', strtotime('+1 year')); ?></h3>
            </div>
        </div>
    </div>

    <htmlpagefooter name="myFooter1">
        <div width="100%" style = "background-color: rgb(0,0,0);padding: 10px;text-align: center;color: rgb(253,154,43);">
            <p>Proud member of Kilimani Project Foundation</p>
        </div>
    </htmlpagefooter>

    <!-- <sethtmlpagefooter name="myFooter1" value="on" /> -->
</body>
</html>

