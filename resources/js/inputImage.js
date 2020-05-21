// Chargement d'une image
$(document).on('click', '#close-preview', function(){
    console.log($(this).attr('id'));
    $('.image-preview').popover('hide');
    // Hover befor close the preview
    $('.image-preview').hover(
        function () {
           $('.image-preview').popover('show');
        },
         function () {
           $('.image-preview').popover('hide');
        }
    );
});

$(function() {
    // Create the close button
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content
    $('.image-preview').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    // Clear event
    $('.image-preview-clear').click(function(){
      var id = $(this).attr('id').split('_')[1];
        $("#group_" + id).attr("data-content","").popover('hide');
        $("#input_dis_" + id).val("");
        $("#bouton_" + id).hide();
        $("input_" + id + " input:file").val("");
        $("#span_" + id).text("Ouvrir");
    });
    // Create the preview image
    $(".image-preview-input input:file").change(function (e){
      var id = $(this).attr('name').split('_')[0];
        var img = $('<img/>', {
            id: 'dynamic',
            width:250,
            height:200
        });
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
          // $(".image-preview-input-title").text("Change");
            $("#span_" + id).text($('#changer').html());
            $("#bouton_" + id).show();
            $("#input_dis_" + id).val(file.name);
            img.attr('src', e.target.result);
            $("#group_" + id).attr("data-content",$(img)[0].outerHTML).popover("show");
        }
        reader.readAsDataURL(file);
    });
});
