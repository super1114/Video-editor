
<div class="item_{{$item->id}}"></div>
<script src="{{ asset('vendor/range-slider/rangeSlider.js') }}"></script>
<script type="text/javascript">
	var id = "{{$item->id}}";
	$(".item_"+id).rangeSlider({ settings: false, skin: 'red', type: 'interval', scale: false });
</script>