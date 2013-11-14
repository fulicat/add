function scrollScreen(ID) {
    var doc = document.documentElement;
    $(doc).animate({ scrollTop: $("#"+ ID + "Id").offset().top }, "normal");
}