<div class="widget widget--google-map">
    <div id="google-map" style="width: 245px; height:245px;"></div>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true&language=<?= $lang ?>"></script>
    <script type="text/javascript">
        var latlng = new google.maps.LatLng("<?= !empty($coordinates) ? $coordinates : $address ?>");
        var myOptions = {
            zoom: 16,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById("google-map"), myOptions);
        marker = new google.maps.Marker({
            map: map,
            draggable:true,
            position: latlng
        });
    </script>
  </div>
</div>
<!-- /widget,google-map -->