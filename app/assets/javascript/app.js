$(window).on("load", function() {
    if (disqus_shortname) {
        var dsq, s;
        if ($('#disqus_thread').length) {
            dsq = document.createElement("script");
            dsq.type = "text/javascript";
            dsq.async = true;
            dsq.src = "//" + disqus_shortname + ".disqus.com/embed.js";
            (document.getElementsByTagName("head")[0] || document.getElementsByTagName("body")[0]).appendChild(dsq);
        }
        if ($('a[href$="#disqus_thread"]').length) {
            s = document.createElement("script");
            s.async = true;
            s.type = "text/javascript";
            s.src = "//" + disqus_shortname + ".disqus.com/count.js";
            (document.getElementsByTagName("head")[0] || document.getElementsByTagName("body")[0]).appendChild(s);
        }
    }

    $("#msnry").masonry({
        itemSelector: ".msnry-item",
        isAnimated: true,
        animationOptions: {
            duration: 750,
            easing: "linear",
            queue: false
        }
    });
});

$(document).on("ready", function() {
    $("code").parent("pre").addClass("prettyprint linenums");
    prettyPrint();
    new gnMenu(document.getElementById('gn-menu'));

});
