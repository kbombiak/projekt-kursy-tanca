$(document).ready(function() {
    $(".fav").on("click", function() {
        const img = $(this);
        $.post("changeFav.php", { idKursu: img.data("kurs") }, function(data) {
            if (data == "sukces") {
                const newSrc = (img.attr("src") == "rezygnuj.png") ? "zapiszsie.png" : "rezygnuj.png";
                img.attr("src", newSrc);
            }
        });
    });
});