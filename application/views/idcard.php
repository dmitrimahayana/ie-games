<html>
    <head>
        <title>ID Card</title>
        <script>
        function printpage()
          {
          window.print()
          }
        </script>
        <?php $url= str_replace("index.php/", "", base_url()); ?>
        <style>
            body {
                font-family:Arial,Helvetica,sans-serif;
            }
            .bg {
                background:url(<?php echo $url; ?>images/bg-idcard.jpg);
            }
        </style>
    </head>
    <body>
        <!--<div style="position: absolute;padding:4px;opacity: 100;">
            <img src="<?php echo $url; ?>images/bg-idcard.jpg">
        </div>-->
        <div class="bg" style="width: 595px;height: 420px;border: 1px dashed #000000;padding:3px;">
<?php if($status=='1') {
        foreach ($tim as $row): ?>
            <div style="text-align: center;padding-top: 5px;">
                <a style="font-size: 15pt;"><b>IE GAMES 8TH EDITION</b></a><br/>
                HIMPUNAN MAHASISWA TEKNIK INDUSTRI<br/>
                INSTITUT TEKNOLOGI SEPULUH NOPEMBER
            </div>
            <div style="margin-left: 60px;padding-top: 10px;">
                <span>Group Name: </span>
                <?php echo $row->NAMA_TIM;  ?>
            </div>
            <div style="margin-left: 60px;">
                <span>School: </span>
            <?php echo ucfirst($row->NAMA_SMA);  ?>
            </div>
            <div style="margin-left: 60px;">
                <span>Test Place: </span>
               <?php echo ucfirst($row->lokasi); ?>
            </div>
            <?php endforeach; ?>
            
            <div style="margin-left: 60px;padding-top: 10px;">
                <?php $count=0;
                foreach ($peserta as $row): $count++; ?>
                <div style="position: relative;float: left;">
                    <div style="padding-left: 5px;">
                        <span><b><?php echo $count.' Participant' ?></b><br/></span>
                    </div>
                    <div style="padding-left: 5px;padding-bottom: 10px;">
                       <?php echo ucfirst($row->NAMA); ?>
                    </div>
                    <?php if($row->GAMBAR!=''): ?>
                    <div style="padding-left: 0px;">
                        <img src="<?php echo $row->GAMBAR; ?>" style="padding-right: 50px;" width="120" height="150">
                    </div>
                </div>
                <?php endif; ?>
                <?php endforeach; 
                } ?> 
            </div>
            <div style="position: absolute;margin-top: 210px;margin-left: 165px;">
                <img src="<?php echo $url; ?>images/its_perisai.png" width="80" height="40" alt="logo">
                <img src="<?php echo $url; ?>images/IE.png" width="50" height="50" alt="logo">
                <img src="<?php echo $url; ?>images/LAMBANG_HMTI-ITS.JPG"  width="80" height="40" alt="logo">
                <img src="<?php echo $url; ?>images/logo.png"  width="40" height="50" alt="logo">
            </div>
        </div><br/>
        Gunting berdasarkan garis titik tersebut
        <br/><br/><input type="button" value="Print this page" onclick="printpage()">
</body>
</html>