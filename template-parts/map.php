<?php
if (is_singular( 'standort' )) {
	$centermapx = get_field('standort_x_koordinate');
	$centermapy = get_field('standort_y_koordinate');
	$zoom = 15;
} else {
	$centermapx = 8.445466179645399;
	$centermapy = 47.39889902820735;
	$zoom = 12;
}
?>

<div id="map"></div>

<?php if (is_singular( 'standort' )) { ?>
	<a href="<?php the_field('standort_maps_link'); ?>" target="_blank" class="button google-maps-link hvr-bounce-in">Google Maps</a>
<?php } ?>

<script>
mapboxgl.accessToken = 'pk.eyJ1Ijoid2VianVuZ2xlIiwiYSI6ImNsNzJlb3U4OTA3NHkzbm84dGZhcHM0OWwifQ.raY_jWBSSX6a850VnP8nKQ';
const map = new mapboxgl.Map({
	container: 'map',
	style: 'mapbox://styles/webjungle/cl2npmu2a002314o1gzepxxrl',
	center: [<?php echo $centermapx ?>, <?php echo $centermapy ?>],
	zoom: <?php echo $zoom ?>
});
var geojson = {
type: 'FeatureCollection',
	features: [
		
		<?php $locationloop = new WP_Query(
		array(
			'post_type' => 'standort',
			'posts_per_page' => -1,
			)
		);
		while ( $locationloop->have_posts() ) : $locationloop->the_post(); ?>	
		{
		 type: 'Feature',
			 geometry: {
			   type: 'Point',
			   coordinates: [<?php the_field('standort_x_koordinate'); ?>, <?php the_field('standort_y_koordinate'); ?>]
			 },
			 properties: {
			   img: '<?php the_field('standort_badge'); ?>',
			   title: '<?php the_title(); ?>',
			   color: '<?php the_field('standort_farbe'); ?>',
			   url: '<?php the_permalink(); ?>',
		   }
		 },
		 <?php endwhile; wp_reset_postdata(); ?>
	]
};

	map.addControl(new mapboxgl.NavigationControl());
	map.scrollZoom.disable();
	map.doubleClickZoom.disable();
	map.dragRotate.disable();
	map.dragPan.disable();
	map.dragRotate.disable();
	map.touchZoomRotate.disable();
	map.touchZoomRotate.disableRotation();

for (const feature of geojson.features) {
  const el = document.createElement('div');
  el.className = 'badgebutton marker';
  el.innerHTML = feature.properties.title;
  el.style.color = '#fff';
  el.style.backgroundColor = feature.properties.color;
  new mapboxgl.Marker(el).setLngLat(feature.geometry.coordinates)
  .addTo(map);
  el.addEventListener("click", () => {
	window.location.href = ''+feature.properties.url +'';
   }); 
}
</script>