var oldValues = null;
        
$(document)
.on("click", ".editButton", function () {

    var section = $(this).closest(".formSection");
    var otherSections = $(".formSection").not(section);
    var inputs = section.find(".input");

    section
      .removeClass("readOnly");

    otherSections
      .addClass("disabled")
      .find('button').prop("disabled", true);

    oldValues = {};
    inputs
      .each(function () { oldValues[this.id] = $(this).val(); })
      .prop("disabled", false);
})

.on("click", ".cancelButton", function (e) {

    var section = $(this).closest(".formSection");
    var otherSections = $(".formSection").not(section);
    var inputs = section.find(".input");

    section
      .addClass("readOnly");

    otherSections
      .removeClass("disabled");

    $('button').prop("disabled", false);

    inputs
      .each(function() { $(this).val(oldValues[this.id]); })
      .prop("disabled", true)

    e.stopPropagation();
    e.preventDefault();
});
