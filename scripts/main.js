/* #1: Lazy Load Youtube Videos
----------------------------------------------------------*/
function loadVideoes(v){
	for (var i = 0; i < v.length; i++) {
		//define the youtube source from data-embed attribute on player
		if (v.length === 1){var source = "https://img.youtube.com/vi/"+ v[i].dataset.embed +"/sddefault.jpg";}
		else {var source = "https://img.youtube.com/vi/"+ v[i].dataset.embed +"/hqdefault.jpg";}

		//grab thumbnail from video and append
		var image = new Image();
        image.src = source;
        image.addEventListener( "load", function() {
            v[ i ].appendChild( image );
        }( i ) );

        //add initial opacity
        if (i === 0 && v.length > 1){
        	v[i].className += " video-playing";
	        v[i].childNodes[0].style.display = 'none';
        	v[i].childNodes[1].style.display = 'none';
        }

        // create iframe, destroy existing one
       	v[i].addEventListener( "click", function() {
	        var iframe = document.createElement( "iframe" ),
	        	player = document.querySelectorAll('.video-player');

	        //opacity on active video and hide play button
	        if (this.className !== 'video-player'){
	        	jQuery('.video-thumb').removeClass('video-playing');
		        jQuery('.play-button').add('.video-thumb img').show();
		        console.log(this)
	        	this.childNodes[0].style.display = 'none';
	        	this.childNodes[1].style.display = 'none';
		        this.className += " video-playing";
	        }
	        
            iframe.setAttribute( "frameborder", "0" );
            iframe.setAttribute( "allowfullscreen", "" );
            iframe.setAttribute( "src", "https://www.youtube.com/embed/"+ this.dataset.embed +"?rel=0&showinfo=0&autoplay=1" );
            
            player[0].innerHTML = "";
            player[0].appendChild( iframe );
    	} );

	}
}

jQuery(document).ready(function(){
	var mainVideo = document.querySelectorAll('.video-player'),
		otherVideos = document.querySelectorAll('.video-thumb');

	loadVideoes(mainVideo);
	loadVideoes(otherVideos);
})

