(function($) {
    $(document).ready(function() {
    // Custom Select Search w/ Icons
        $("div[id$='edoo_icon_class'], div[id^='edoo_icon_class'], .edoo_icon_class").each(function() {
            $(this).find(".custom-select").each(function() {
                $(this).wrap("<div class='ui_kit_select_search'></div>");
                $(this).find("option").each(function() {
                    var $edooIcon = $(this).attr("value");
                    $(this).attr("data-tokens", $edooIcon).attr("data-icon", $edooIcon).attr("data-subtext", $edooIcon);
                });
                $(this).addClass("selectpicker").attr("data-live-search", "true").attr("data-width", "100%").removeClass("custom-select");
            });
        });
    });

  }(jQuery));
