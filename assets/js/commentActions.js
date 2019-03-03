function postComment(button, postedBy, videoId, replyTo, containerClass) {
    var textarea = $(button).siblings("textarea");
    var commentText = textarea.val();
    textarea.val("");
    
    if(commentText) {
        $.post("ajax/postComment.php", { 
            commentText: commentText, 
            postedBy: postedBy, 
            videoId: videoId, 
            responseTo: replyTo 
        })
            .done(function(comment) {
                if(!replyTo) {
                    $("." + containerClass).prepend(comment);
                } else {
                    $(button).parent().siblings("." + containerClass).append(comment);    
                }
            })
    } else {
        alert("You can't post an empty comment");
    }
}