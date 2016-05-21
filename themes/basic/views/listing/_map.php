<div class="listing-map">
	<form>
		<input type="text" name="address" class="form-control"/>
		<input type="hidden" name="lat"/>
		<button type="submit"><?= t('app', 'Find on the map') ?></button>
		<button type="submit"><?= t('app', 'Yes, this is my location') ?></button>
	</form>
	<div style="width:730px; height:350px;" id="map_canvas"></div>
</div>
<!-- /listing-map -->