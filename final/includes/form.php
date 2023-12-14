<!-- <form action ="" method="post"> -->

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">

<fieldset>
<legend>Please fill out this form to book an interpreter</legend>

<label>First Name</label>
<input type="text" name="first_name" value="<?php if (isset($_POST['first_name'])) echo htmlspecialchars($_POST['first_name'])   ;?>"> 
<span><?php echo $first_name_err;?></span>

<label>Last Name</label>
<input type="text" name="last_name" value="<?php if (isset($_POST['last_name'])) echo htmlspecialchars($_POST['last_name'])   ;?>"> 
<span><?php echo $last_name_err;?></span>

<label>Email</label>
<input type="email" name="email" value="<?php if (isset($_POST['email'])) echo htmlspecialchars($_POST['email'])   ;?>"> 
<span><?php echo $email_err;?></span>



<label>What type of event are you having?</label>
<ul class="radio-list">
    <li>
        <input type="radio" name="events" value="Conference interpreting" <?php if (isset($_POST['events']) && $_POST['events'] == 'Conference interpreting') echo 'checked="checked"'; ?>> Conference interpreting
    </li>

    <li>
        <input type="radio" name="events" value="Translation" <?php if (isset($_POST['events']) && $_POST['events'] == 'Translation') echo 'checked="checked"'; ?>> Translation
    </li>

    <li>
        <input type="radio" name="events" value="Deposition - legal" <?php if (isset($_POST['events']) && $_POST['events'] == 'Deposition - legal') echo 'checked="checked"'; ?>> Deposition - legal
    </li>

    <li>
        <input type="radio" name="events" value="Non-profit" <?php if (isset($_POST['events']) && $_POST['events'] == 'Non-profit') echo 'checked="checked"'; ?>> Non-profit
    </li>

    <li>
        <input type="radio" name="events" value="Workshop" <?php if (isset($_POST['events']) && $_POST['events'] == 'Workshop') echo 'checked="checked"'; ?>> Workshop
    </li>
    </ul>

    <label>Phone</label>
    <input type="tel" name="phone" placeholder="xxx-xxx-xxxx" value="<?php if (isset($_POST['phone'])) echo htmlspecialchars($_POST['phone']); ?>">
    <span><?php echo $phone_err;?></span>

<label>What types of services would you like?</label>
<ul class="radio-list">
    <li> <input type="checkbox" name="services[]" value="simultaneous" <?php if (isset($_POST['services']) && in_array('simultaneous', $_POST['services'])) echo 'checked="checked"'; ?>>Simultaneous Interpretation</li>

    <li> <input type="checkbox" name="services[]" value="consecutive" <?php if (isset($_POST['services']) && in_array('consecutive', $_POST['services']))
 echo 'checked="checked"'; ?>>Consecutive Interpretation</li>

    <li> <input type="checkbox" name="services[]" value="document" <?php if (isset($_POST['services']) && in_array('document', $_POST['services'])) echo 'checked="checked"'; ?>>Document Translation</li>

    <li> <input type="checkbox" name="services[]" value="website" <?php if (isset($_POST['services']) && in_array('website', $_POST['services'])) echo 'checked="checked"'; ?>>Website Translation and Localization</li>

    <li> <input type="checkbox" name="services[]" value="voiceover" <?php if (isset($_POST['services']) && in_array('voiceover', $_POST['services'])) echo 'checked="checked"'; ?>>Video Voice-Over</li>
</ul>


<!-- this is where we write the error message when someone submits the form without clicking on any services: -->
<span><?php echo $services_err;?></span>


<label>Where is your event?</label>
<select name="regions">
  <option value="" <?php if (isset($_POST['regions']) && $_POST['regions'] == "") echo 'selected="selected"'; ?>>Select One !</option>

  <option value="remote" <?php if (isset($_POST['regions']) && $_POST['regions'] == "remote") echo 'selected="selected"'; ?>>Remote (Zoom)</option>

  <option value="snohomish" <?php if (isset($_POST['regions']) && $_POST['regions'] == "snohomish") echo 'selected="selected"'; ?>>Snohomish County</option>

  <option value="king" <?php if (isset($_POST['regions']) && $_POST['regions'] == "king") echo 'selected="selected"'; ?>>King County</option>

  <option value="pierce" <?php if (isset($_POST['regions']) && $_POST['regions'] == "pierce") echo 'selected="selected"'; ?>>Pierce County</option>

  <option value="thurston" <?php if (isset($_POST['regions']) && $_POST['regions'] == "thurston") echo 'selected="selected"'; ?>>Thurston County</option>

  <option value="easternwa" <?php if (isset($_POST['regions']) && $_POST['regions'] == "easternwa") echo 'selected="selected"'; ?>>Eastern Washington</option>
</select>
<span><?php echo $regions_err;?></span>


<label>Comments</label>

<textarea name="comments"><?php if (isset($_POST['comments'])) echo htmlspecialchars($_POST['comments']); ?></textarea>
<span><?php echo $comments_err;?></span>

<label>Privacy</label>
<ul>
<li><input type="radio" name="privacy" value="yes" <?php if (isset($_POST['privacy']) && $_POST ['privacy'] == "yes") echo 'checked= "checked"';?>>Yes</li>

</ul>
<span><?php echo $privacy_err;?></span>
<button type="submit">Send it</button>
<br>
<p><a href="">Reset</a></p>

</fieldset>
</form>



