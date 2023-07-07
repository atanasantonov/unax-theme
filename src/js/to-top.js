// Get the button.
let toTopButton = document.getElementById( 'unax-to-top' );
if ( null !== toTopButton ) {
    window.onscroll = function() { unaxScrollDown() };

    toTopButton.addEventListener(
		'click',
		function () {
			unaxToTop();
		},
		false
	);
}

function unaxScrollDown() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        toTopButton.style.display = "block";
    } else {
        toTopButton.style.display = "none";
    }
}

function unaxToTop() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}
