$(document).ready(function() {
  var $btns = $(".btnTrigger").click(function() {
    if (this.id == "all") {
      $("#btnFilter > .cards").fadeIn(450);
    } else {
      var $el = $("." + this.id).fadeIn(450);
      $("#btnFilter > .cards")
        .not($el)
        .hide();
    }
    $btns.removeClass("active");
    $(this).addClass("active");
  });

  var $search = $("#inputFilter").on("keyup", function() {
    $btns.removeClass("active");
    var matcher = new RegExp($(this).val(), "gi");
    $(".cards")
      .show()
      .not(function() {
        return matcher.test(
          $(this)
            .find("#name, #cat")
            .text()
        );
      })
      .hide();
  });
});
