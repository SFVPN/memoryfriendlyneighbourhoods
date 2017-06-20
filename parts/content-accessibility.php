<!-- This adds some accessibility functionality whereever the partial is included -->

<!-- <div id="hel" class="col s12 center" role="navigation">

	<span class=""> <?php echo 'You are viewing the following page: ' . get_the_title(); ?></span>

	<a id="acces" data-target="settings" class=" btn">Help</a>

</div> -->

<button id="access" href="#settings" class="btn-floating waves-effect waves-light"><i class="material-icons">help</i></button>
<div id="settings" class="modal">
<div class="modal-content">
<div class="changes text-black">
<p>You can personalise the colours and text sizes for this website using the options below</p>

<label class="form_label" for="styleSwitcher">Choose your style</label>
<form  id="styleSwitcher">
<input type="radio" name="style" id="normal" value="normal" checked>
<label for="normal">Normal</label>
<input type="radio" name="style" id="high-contrast" value="high-contrast">
<label for="high-contrast">High Contrast</label>
<input type="radio" name="style" id="noImages" value="noImages">
<label for="noImages">No Images</label>
</form>


<label class="form_label" for="textSwitcher">Choose your text size</label>
<form  id="textSwitcher">
<input type="radio" name="text" id="normal-text" value="normal-text" checked>
<label for="normal-text">Normal</label>
<input type="radio" name="text" id="medium" value="medium">
<label for="medium">Medium</label>
<input type="radio" name="text" id="large" value="large">
<label for="large">Large</label>
</form>

</div>
</div>
<div class="modal-footer">
<button href="#!" class=" modal-action modal-close waves-effect waves-light btn">Confirm Choice</button>
</div>
</div>
