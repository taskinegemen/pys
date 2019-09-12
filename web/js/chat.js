/*jslint browser: true*/
/*global $, jQuery, alert*/

$(function () {

    "use strict";

    $('.chat-left-inner > .chatonline').slimScroll({
        height: '100%',
        position: 'right',
        size: "5px",
        color: '#dcdcdc'

    });
                Window.scroll_status=0;
    $('.chat-list').slimScroll({
        position: 'right'
        , size: "5px"
        , height: '100%'
        , color: '#dcdcdc'
        , start:'bottom'

     });
        $('.chat-list').slimScroll().
        bind('slimscroll', function(e, pos)
        {
           console.log("REACHED",pos);
           if(pos=='bottom')
           {
            Window.scroll_status=0;
           }

        });
        var state = {
    pos: {
      lowest: 0,
      current: 0
    },
    offset: {
      top: [0, 0], //Old Offset, New Offset
    }
  }
  $('.chat-list').slimScroll().bind('slimscrolling', function (e, pos) {
        // Highest Position
    state.pos.highest = pos !== state.pos.highest ?
      pos > state.pos.highest ? pos : state.pos.highest
    : state.pos.highest;
    
    // Update Offset State
    state.offset.top.push(pos - state.pos.lowest);
    state.offset.top.shift();
    if (state.offset.top[1] < state.offset.top[0]) {
      Window.scroll_status=1;

console.log("SCOLL EVENT",e);
}
  });  
    var cht = function () {
            var topOffset = 445;
            var height = ((window.innerHeight > 0) ? window.innerHeight : this.screen.height) - 1;
            height = height - topOffset;
            $(".chat-list").css("height", (height) + "px");
    };
    $(window).ready(cht);
    $(window).on("resize", cht);
    
    

    // this is for the left-aside-fix in content area with scroll
    var chtin = function () {
            var topOffset = 270;
            var height = ((window.innerHeight > 0) ? window.innerHeight : this.screen.height) - 1;
            height = height - topOffset;
            $(".chat-left-inner").css("height", (height) + "px");
    };
    $(window).ready(chtin);
    $(window).on("resize", chtin);
    
    


    $(".open-panel").on("click", function () {
        $(".chat-left-aside").toggleClass("open-pnl");
        $(".open-panel i").toggleClass("ti-angle-left");
    });

});
