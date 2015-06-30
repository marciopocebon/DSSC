<?php
/**
 * Created by PhpStorm.
 * User: wageeshwara
 * Date: 6/16/2015
 * Time: 10:13 PM
 */
?>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<button id="left">&laquo;</button> <button id="right">&raquo;</button>
<div class="block">
    <form method="post" id="new_message" action="/messages">
        <p><label for="email">Your email or name</label><input type="text" size="30" name="email" id="email" /></p>
        <p><label for="body">Message</label><textarea rows="6" name="body" id="body" cols="35"></textarea></p>
        <p><input type="submit" value="Send Message" name="commit" id="message_submit"/> or <a class="close" href="/">Cancel</a></p>
    </form>
</div>
<style>
    div {
        background-color:#FFFFFF;
        border:1px solid #999999;
        cursor:default;
        display:none;
        margin-top: 15px;
        position:absolute;
        text-align:left;
        width:394px;
        z-index:50;
        padding: 25px 25px 20px;
    }

    label {
        display: block;
        margin-bottom: 3px;
        padding-left: 15px;
        text-indent: -15px;
    }
</style>

<script>
$.fn.slideFadeToggle = function(offset, speed, easing, callback) {
    return this.animate({
        opacity: 'toggle',
        width: 'toggle',
        left: offset
    }, speed, easing, callback);
};


$("#right").click(function() {
    $(".block").slideFadeToggle("+=50px", "medium");
});

$("#left").click(function() {
    $(".block").slideFadeToggle("-=50px", "slow");
});
</script>