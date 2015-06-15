<form id="form_1" name="login" method="post" action="<?php echo base_url().'home/login'; ?>">
    <ul class="pad_bot1 list1">
            <?php if(isset($salah1)) echo $salah1; ?>
            <?php if(isset($salah2)) echo $salah2; ?>
        </li>
    </ul>
    <ul class="pad_bot1 list1">
        <li>
            Nama Tim
            <span class="right "><input type="text" class="input" name="nama_tim" ></span>
        </li>
    </ul>
    <ul class="pad_bot1 list1">
        <li>
            Password
            <span class="right "><input type="password" class="input" name="password" ></span>
        </li>
    </ul>
    <ul class="pad_bot1 list1">
        <li>
            <span class="right "><input type="submit" class="button1" name="submit" value="Submit" >
        </li>
    </ul>
</form>