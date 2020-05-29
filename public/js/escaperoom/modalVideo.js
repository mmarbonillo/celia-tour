var videoIdSelected = null; // ID del video seleccionado

function selectResource(){
    var classStyle = 'resourceSelected';
    if(videoIdSelected != null){
        if($(this).attr('id') == videoIdSelected){
            $(this).removeClass(classStyle);
            videoIdSelected = null;
        } else {
            $('.elementResource').removeClass(classStyle);
            $(this).addClass(classStyle)
            videoIdSelected = $(this).attr('id');
        }
    } else {
        $('.elementResource').removeClass(classStyle);
        $(this).addClass(classStyle);
        videoIdSelected = $(this).attr('id');
    }
}


$().ready(function(){
    $('#modalVideo .elementResource').click(selectResource);
    $('#modalVideo .elementResource').click(function(){
        $('#modalVideo #video').val(videoIdSelected);
    })
});