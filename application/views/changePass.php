<form id="form_1" name="form_1" method="post" action="<?php echo base_url().'home/changePass'; ?>">
    <ul class="pad_bot1 list1">
        <li>
            Password Lama :
            <span class="right "><input type="password" class="input validate[required] text-input" name="passwordLama" ></span>
        </li>
    </ul>
    <ul class="pad_bot1 list1">
        <li>
            Password Baru :
            <span class="right "><input type="password" id="password" class="input validate[required,minSize[5],maxSize[20]] text-input" name="passwordNew" ></span>
        </li>
    </ul>
    <ul class="pad_bot1 list1">
        <li>
            Konfirmasi Password :
            <span class="right "><input type="password" class="input validate[equals[password]] text-input" name="passwordNew2" ></span>
        </li>
    </ul>
    <ul class="pad_bot1 list1">
        <li>
            <span class="right "><input type="submit" class="button1" name="submit" value="Change" >
        </li>
    </ul>
</form>