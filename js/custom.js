/** Alert Position Top  **/
$(document).ready(function(){
  $(".myadmin-alert .closed").click(function(event){
  $(this).parents(".myadmin-alert").fadeToggle(350);

  return false;
}); 

 }); 


/* Click to close */
$(document).ready(function(){
  $(".myadmin-alert-click").click(function(event){
  $(this).fadeToggle(350);

  return false;
}); 

 }); 

$(document).ready(function(){
    $("#showtop").click(function(){
        $("#alerttop").fadeToggle(350);
    });
});

/** Alert Position Bottom  **/
$(document).ready(function(){
    $("#showbottom").click(function(){
        $("#alertbottom").fadeToggle(350);
    });
});

/** Alert Position Top Left  **/
$(document).ready(function(){
    $("#showtopleft").click(function(){
        $("#alerttopleft").fadeToggle(350);
    });
});

/** Alert Position Top Right  **/
$(document).ready(function(){
    $("#showtopright").click(function(){
        $("#alerttopright").fadeToggle(350);
    });
});

/** Alert Position Bottom Left  **/
$(document).ready(function(){
    $("#showbottomleft").click(function(){
        $("#alertbottomleft").fadeToggle(350);
    });
});

/** Alert Position Bottom Right  **/
$(document).ready(function(){
    $("#showbottomright").click(function(){
        $("#alertbottomright").fadeToggle(350);
    });
});

/**Sidebar menu**/
var resizefunc = [];
    
!function($) {
    

    var Sidemenu = function() {
        this.$body = $("body"),
        this.$openLeftBtn = $(".open-left"),
        this.$menuItem = $("#left-navigation a")
    };
    Sidemenu.prototype.openLeftBar = function() {
      $("#wrapper").toggleClass("open-menu");
      $("#wrapper").addClass("myadmin-wrapper");


      if($("#wrapper").hasClass("open-menu") && $("body").hasClass("nav-fixed")) {
        $("body").removeClass("nav-fixed").addClass("nav-fixed-removed");
      } else if(!$("#wrapper").hasClass("open-menu") && $("body").hasClass("nav-fixed-removed")) {
        $("body").removeClass("nav-fixed-removed").addClass("nav-fixed");
	      }
      
      if($("#wrapper").hasClass("open-menu")) {
        $(".left ul").removeAttr("style");
      } else {
        $(".subdrop").siblings("ul:first").show();
      }
    },
	
    //menu item click
    Sidemenu.prototype.menuItemClick = function(e) {
       if(!$("#wrapper").hasClass("open-menu")){
        if($(this).parent().hasClass("has_sub")) {
          e.preventDefault();
        }   
        if(!$(this).hasClass("subdrop")) {
          // hide any open menus and remove all other classes
          $("ul",$(this).parents("ul:first")).slideUp(350);
          $("a",$(this).parents("ul:first")).removeClass("subdrop");
          $("#left-navigation .pull-right i").removeClass("md-remove").addClass("md-add");
          
          // open our new menu and add the open class
          $(this).next("ul").slideDown(350);
          $(this).addClass("subdrop");
          $(".pull-right i",$(this).parents(".has_sub:last")).removeClass("md-add").addClass("md-remove");
          $(".pull-right i",$(this).siblings("ul")).removeClass("md-remove").addClass("md-add");
        }else if($(this).hasClass("subdrop")) {
          $(this).removeClass("subdrop");
          $(this).next("ul").slideUp(350);
          $(".pull-right i",$(this).parent()).removeClass("md-remove").addClass("md-add");
        }
      } 
    },

    //init sidemenu
    Sidemenu.prototype.init = function() {
      var $this  = this;
      //bind on click
      $(".open-left").click(function(e) {
        e.stopPropagation();
        $this.openLeftBar();
      });

      // LEFT SIDE MAIN NAVIGATION
      $this.$menuItem.on('click', $this.menuItemClick);

      // NAVIGATION HIGHLIGHT & OPEN PARENT
      $("#left-navigation ul li.has_sub a.active").parents("li:last").children("a:first").addClass("active").trigger("click");
    },

    //init Sidemenu
    $.Sidemenu = new Sidemenu, $.Sidemenu.Constructor = Sidemenu
    
}(window.jQuery),


function($) {
    "use strict";

    var FullScreen = function() {
        this.$body = $("body"),
        this.$fullscreenBtn = $("#btn-fullscreen")
    };

    //turn on full screen
    // Thanks to http://davidwalsh.name/fullscreen
    FullScreen.prototype.launchFullscreen  = function(element) {
      if(element.requestFullscreen) {
        element.requestFullscreen();
      } else if(element.mozRequestFullScreen) {
        element.mozRequestFullScreen();
      } else if(element.webkitRequestFullscreen) {
        element.webkitRequestFullscreen();
      } else if(element.msRequestFullscreen) {
        element.msRequestFullscreen();
      }
    },
    FullScreen.prototype.exitFullscreen = function() {
      if(document.exitFullscreen) {
        document.exitFullscreen();
      } else if(document.mozCancelFullScreen) {
        document.mozCancelFullScreen();
      } else if(document.webkitExitFullscreen) {
        document.webkitExitFullscreen();
      }
    },
    //toggle screen
    FullScreen.prototype.toggle_fullscreen  = function() {
      var $this = this;
      var fullscreenEnabled = document.fullscreenEnabled || document.mozFullScreenEnabled || document.webkitFullscreenEnabled;
      if(fullscreenEnabled) {
        if(!document.fullscreenElement && !document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement) {
          $this.launchFullscreen(document.documentElement);
        } else{
          $this.exitFullscreen();
        }
      }
    },
    //init sidemenu
    FullScreen.prototype.init = function() {
      var $this  = this;
      //bind
      $this.$fullscreenBtn.on('click', function() {
        $this.toggle_fullscreen();
      });
    },
     //init FullScreen
    $.FullScreen = new FullScreen, $.FullScreen.Constructor = FullScreen
    
}(window.jQuery),



//
 function($) {
    "use strict";
    
    var App = function() {
        this.pageScrollElement = "html, body", 
        this.$body = $("body")
    };
    
     //on doc load
    App.prototype.onDocReady = function(e) {
      resizefunc.push("initscrolls");
      resizefunc.push("changeptype");

      $('.animate-number').each(function(){
        $(this).animateNumbers($(this).attr("data-value"), true, parseInt($(this).attr("data-duration"))); 
      });
    
      //RUN RESIZE ITEMS
      $(window).resize(debounce(resizeitems,100));
      $("body").trigger("resize");

            
    },
    //initilizing 
    App.prototype.init = function() {
        var $this = this;
        //document load initialization
        $(document).ready($this.onDocReady);
        //init side bar - left
        $.Sidemenu.init();
        //init fullscreen
        $.FullScreen.init();
    },

    $.App = new App, $.App.Constructor = App

}(window.jQuery),

//initializing main application module
function($) {
    "use strict";
    $.App.init();
}(window.jQuery);



/*some other functions*/
//this full screen
var toggle_fullscreen = function () {

}

function executeFunctionByName(functionName, context /*, args */) {
  var args = [].slice.call(arguments).splice(2);
  var namespaces = functionName.split(".");
  var func = namespaces.pop();
  for(var i = 0; i < namespaces.length; i++) {
    context = context[namespaces[i]];
  }
  return context[func].apply(this, args);
}
var w,h,dw,dh;
var changeptype = function(){
    w = $(window).width();
    h = $(window).height();
    dw = $(document).width();
    dh = $(document).height();

    if(jQuery.browser.mobile === true){
        $("body").addClass("mobile").removeClass("nav-fixed");
    }

   if(!$("#wrapper").hasClass("myadmin-wrapper")){
      if(w > 1025){
        $("body").removeClass("myadminsmall").addClass("myadminfull");
          $("#wrapper").removeClass("open-menu");
      }else{
        $("body").removeClass("myadminfull").addClass("myadminsmall");
        $("#wrapper").addClass("open-menu");
        $(".left ul").removeAttr("style");
      }
      if($("#wrapper").hasClass("open-menu") && $("body").hasClass("nav-fixed")){
        $("body").removeClass("nav-fixed").addClass("nav-fixed-removed");
      }else if(!$("#wrapper").hasClass("open-menu") && $("body").hasClass("nav-fixed-removed")){
        $("body").removeClass("nav-fixed-removed").addClass("nav-fixed");
      }

  }
  
}


var debounce = function(func, wait, immediate) {
  var timeout, result;
  return function() {
    var context = this, args = arguments;
    var later = function() {
      timeout = null;
      if (!immediate) result = func.apply(context, args);
    };
    var callNow = immediate && !timeout;
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);
    if (callNow) result = func.apply(context, args);
    return result;
  };
}

function resizeitems(){
  if($.isArray(resizefunc)){  
    for (i = 0; i < resizefunc.length; i++) {
        window[resizefunc[i]]();
    }
  }
}

function initscrolls(){
   
  }




