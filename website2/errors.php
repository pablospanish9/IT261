<?php
// our errors file. Use a foreach loop
// array_push - different message for different errors
// logic: if we have errors - we need to display them

if (count($errors) > 0): ?>

<div class="errors">
    <?php foreach ($errors as $error) : ?>
    <p>
        <?php echo $error; ?>
    </p>
    <?php endforeach; ?>

</div> <!-- end div -->

<?php endif; ?>
