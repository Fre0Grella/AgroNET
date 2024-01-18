$(document).ready(function() {
    console.log(window.innerWidth);
    if(window.outerWidth > 600) {
        
        var searchBar = $(".searchBar");
        var scrollPrev = 0

        $(window).scroll(function() {
            var scrolled = $(window).scrollTop();
            var firstScrollUp = false;
            var firstScrollDown = false;

            if ( scrolled > 0 ) {
                if ( scrolled > scrollPrev ) {
                    firstScrollUp = false;
                    if ( scrolled < searchBar.height() + searchBar.offset().top - parseInt(searchBar.css('margin-top'), 10) ) {
                        if ( firstScrollDown === false ) {
                            var topPosition = searchBar.offset().top - parseInt(searchBar.css('margin-top'), 10);
                            searchBar.css({
                                "top": topPosition + "px"
                            });
                            firstScrollDown = true;
                        }
                        searchBar.css({
                            "position": "absolute"
                        });
                    } else {
                        searchBar.css({
                            "position": "fixed",
                            "top": "-" + searchBar.height() + "px"
                        });
                    }
                } else {
                    firstScrollDown = false;
                    if ( scrolled > searchBar.offset().top - parseInt(searchBar.css('margin-top'), 10)) {
                        if ( firstScrollUp === false ) {
                            var topPosition = searchBar.offset().top - parseInt(searchBar.css('margin-top'), 10);
                            searchBar.css({
                                "top": topPosition + "px"
                            });
                            firstScrollUp = true;
                        }
                        searchBar.css({
                            "position": "absolute"
                        });
                    } else {
                        searchBar.removeAttr("style");
                    }
                }
                scrollPrev = scrolled;
            }
        });
    }
});