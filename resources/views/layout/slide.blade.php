<div class="rev-slider">
	<div class="fullwidthbanner-container">
		<div class="fullwidthbanner">
			<div class="bannercontainer" >
		    <div class="banner" >
				<ul>
					@foreach($slide as $row)
					<!-- THE FIRST SLIDE -->
					<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
			            <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined"
			            	data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" 
			            	data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" 
			            	data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" 
			            	data-owidth="undefined" data-oheight="undefined">
							<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" 
								data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" 
								src="upload/slide/{{$row->image}}" data-src="upload/slide/{{$row->image}}" 
								style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('upload/slide/{{$row->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
							</div>
						</div>
			        </li>
			        @endforeach
				</ul>
			</div>
			</div>
			<div class="tp-bannertimer"></div>
		</div>
	</div>
</div>
<!--slider-->