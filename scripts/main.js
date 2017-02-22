/* #1: Lazy Load Youtube Videos
----------------------------------------------------------*/
jQuery(document).ready(function(){
	var videoes = document.querySelectorAll('.video-player');

	for (var i = 0; i < videoes.length; i++) {
		//define the youtube source from data-embed attribute on player
	    var source = "https://img.youtube.com/vi/"+ videoes[i].dataset.embed +"/sddefault.jpg"; 

	    //grab thumbnail from video and append
		var image = new Image();
        image.src = source;
        image.addEventListener( "load", function() {
            videoes[ i ].appendChild( image );
        }( i ) );

        // create iframe
       	videoes[i].addEventListener( "click", function() {
	        var iframe = document.createElement( "iframe" );
            iframe.setAttribute( "frameborder", "0" );
            iframe.setAttribute( "allowfullscreen", "" );
            iframe.setAttribute( "src", "https://www.youtube.com/embed/"+ this.dataset.embed +"?rel=0&showinfo=0&autoplay=1" );
            this.innerHTML = "";
            this.appendChild( iframe );
    	} );

	}
})