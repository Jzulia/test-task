
<form id="userForm" method="post" action="/ajax/saveuser/" >

    <label class="description" for="name">Name </label>
    <div>
        <input id="name" name="name" type="text" minlength="2" required/> 
    </div> 

    <label class="description" for="email">Email </label>
    <div>
        <input id="email" name="email" type="email"  required/> 
    </div> 

    </br>

    <div>
        <select  id="region" class="chosen-select" name="region" data-placeholder="Select Region" required > 
            <option value=""></option>
            <?php foreach ($territories as $ter): ?>
                <option value="<?php echo $ter->reg_id; ?>"> <?php echo $ter->address; ?></option>
            <?php endforeach; ?>	

        </select>
    </div>
    <br/>	

    <div class="city">
    </div>
    <br/>

    <div class="area">
    </div>

    <br/><br/>

    <input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />

</form>

<div class="message"></div>


