function getrating(id,rating){
    $.ajax({
        type: "POST",
        url: "http://edu/web/common/works",
        data: {rating:rating, id:id},
        success: function(){
            
        }
    })
}