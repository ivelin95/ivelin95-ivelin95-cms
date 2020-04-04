
    //loading screen
$(document).ready(function(){
        var div_box = "<div id='load-screen'><div id='loading'></div></div>";
        $('body').prepend(div_box);
        $('#load-screen').delay(300).fadeOut(400,function(){
            $(this).remove()
        });
});



// text editor
$(document).ready(function(){
ClassicEditor
    .create(document.querySelector('#editor'))
    .then(editor => {
        console.log(editor);
    })
    .catch(error => {
        console.error(error);
    });
    
});

//check unchek boxes
   $(document).ready(function(){
   $('#mainBox').click(function(){
    if($(this).is(":checked")){
       $('.box').each(function(){
           this.checked=true;
       })
    }else{
         $('.box').each(function(){
           this.checked=false;
       })
    }
    
 });
  });

