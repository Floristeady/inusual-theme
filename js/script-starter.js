jQuery(function ($) {
	
	/************************* 
	Variables (tamaños editables)
	**************************/
	
	var browserwidth;
	var largewidth = 1024; // resolución mínima desktop
	var mediumwidth = 767; // resolución mmedia
	var smallwidth = 641; // resolución chica
	
	var mywindow = $(window);
	var htmlbody = $('html,body');
	
	/************************* 
	Ejecución
	**************************/

	// Obtiene anchura del browser 	
	function getbrowserwidth(){
		browserwidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth || 0;
		//console.log(browserwidth);
		return browserwidth;
	}
	
	function onLoadAndResize(){  
		getbrowserwidth();
		changHeader();
		 
	    $('.project-image a').fluidbox({
		    immediateOpen: false,	
		    stackIndex: 9999
	    }).on('openstart', function() {
			changeZindex();
		}).on('closestart', function() {
			removeZindex();
		});
    
	    if ($('body').hasClass('home')) {
				activeItemMenu();
		}
	}
	
	function changeZindex(){
		$('#wrapper').css('z-index','2');
		$('#header').css('z-index','1');
	}
	
	function removeZindex(){
		$('#wrapper').css('z-index','1');
		$('#header').css('z-index','999');
	}
	
	function changHeader() {
		$(window).scroll(function() {
			var y_scroll_pos = window.pageYOffset;
			var s = $('#header');
			if ( y_scroll_pos > 10 ) {
				s.addClass('minimized');
			}
			else if ( y_scroll_pos < 10 ) {
				s.removeClass('minimized');
			}
		});
	}
	
	//add class active
	function activeItemMenu() {
		
		var lastId,
	    topMenu = $(".menu-main"),
	    topMenuHeight = topMenu.outerHeight()+145,
	    menuItems = $(".menu-main > li.this > a"),
	    scrollItems = menuItems.map(function(){
	      var item = $($(this).attr("href"));
	      if (item.length) { return item; }
	    });
	    
	    $(window).scroll(function(){
	    var fromTop = $(this).scrollTop()+topMenuHeight;
	    var cur = scrollItems.map(function(){
	     	if ($(this).offset().top < fromTop)
		       return this;
	    });
	
	   cur = cur[cur.length-1];
	   var id = cur && cur.length ? cur[0].id : "";
	   
	   	if (lastId !== id) {
	       lastId = id;
	       menuItems
	         .parent().removeClass("current-menu-item")
	         .end().filter("[href=#"+id+"]").parent().addClass("current-menu-item");
	   	}                   
	  });  

	}
	
	// link menú home
	function menuHome() { 
		
		//si es el home		
		var links = $('.menu-main > li.this > a');
	    var arrowButton = $('.icon-arrow');
	    var target = $(links).attr("href");

		// go to scroll section 
	    function goToByScroll(target) {
	        htmlbody.animate({
	         scrollTop: $(target).offset().top+5
	         }, 1500, 'easeInOutQuint');
	    }
	
		// link animation to section
	    links.click(function (e) {
	        e.preventDefault();
	        target = $(this).attr('href');
	        goToByScroll(target);
	    });
	    
	    // arrow scrollto section
	    arrowButton.click(function (e) {
	        e.preventDefault();
	        dataslide = $(this).attr('href');
	        goToByScroll(dataslide);
	    });
  			  
	}
	
	// link menú páginas
	function menuPages() {
		//Menu pages 
		var _href = $('.menu-main > li.this > a');
		var page = $("html, body");
		
		$(_href).each(function() {
		   _href = $(this).attr("href"); 
		   
		   $(this).attr("href",'/'+ _href);
		   
		   //console.log(_href);
		});
		
	    var jump=function(e) {
	       if (e){
	           e.preventDefault();
	           var target = $(this).attr("href");
	       } else {
	           var target = location.hash;
	       }
	       
	       page.on("scroll mousedown wheel DOMMouseScroll mousewheel keyup touchmove", function(){
		       page.stop();
		    });
		    
		    page.animate({ 
			    scrollTop: $(target).offset().top }, 1000, function(){
				    location.hash = target;
					page.off("scroll mousedown wheel DOMMouseScroll mousewheel keyup touchmove");
			});
	
	    }
	
	    page.hide();
        $('a[href^=#]').bind("click", jump);

        if (location.hash){
            setTimeout(function(){
                $('html, body').scrollTop(0).show()
                jump()
            }, 0);
        }else{
          page.show()
        }

	}
	
	//agregar iconos
	function addIcons() {
		//console.log(my_data.template_directory_uri);
		$('#services .col-1').append('<img class="icon i-map show-for-medium-up" src="' + my_data.template_directory_uri + '/images/assets/icon_map.svg" alt="" />');
		
		$('#services .col-1').append('<img class="icon i-content" src="' + my_data.template_directory_uri + '/images/assets/icon_content.svg" alt="" />');
		
		$('#services .col-4').append('<img class="icon i-interface" src="' + my_data.template_directory_uri + '/images/assets/icon_interface.svg" alt="" />');
		
		$('#services .col-3').append('<img class="icon i-tablet" src="' + my_data.template_directory_uri + '/images/assets/icon_tablet.svg" alt="" />');
		
		$('#services .col-3').append('<img class="icon i-code" src="' + my_data.template_directory_uri + '/images/assets/icon_code.svg" alt="" />');
		
		return;
	}
	
	//Efecto iconos parrallax 
	function scrollIcons(){
		$(window).scroll(function(e){
		  parallax();
		});
		
		function parallax(){
		  var scrolled = $(window).scrollTop();
		  $('.i-map').css('top',-(190-scrolled*0.15)+'px');
		  $('.i-content').css('bottom',+(-260-scrolled*-0.2)+'px');  
		  $('.i-interface').css('bottom',+(-250-scrolled*-0.18)+'px');
		  $('.i-tablet').css('top',-(190-scrolled*0.13)+'px');
		  $('.i-code').css('bottom',+(-280-scrolled*-.22)+'px');
		}
	}


	//cambia color background proyecto
	function changeBackground() {  
	  var wHeight = $(window).innerHeight();
	  var siblings = $('.module').siblings();
	  var perset = {};
	  var sumHeight = 0;
	  for(var i = 0; i<siblings.length; i++) {
	    if(siblings[i].dataset.background){
	      perset[sumHeight] =  siblings[i].dataset.background;
	    }
	    else
	      perset[sumHeight] =  0;
	
	    sumHeight= sumHeight + siblings[i].clientHeight;
	  }
	  processScroll();
	
	  function lessThan(nums, key){
	    if(nums == null || nums.length == 0 || key ==0 ) 
	      return 0;
	    low = 0;
	    high = nums.length -1;
	    while(low <= high){
	        mid = parseInt((low + high) >> 1);
	        if(key <= nums[mid]){
	            high = mid - 1;
	        }else {
	            low = mid +1;
	        }
	    }
	    return high;
	  }
	
	  var scroll_pos = 0;
	
	  function processScroll() { 
	    scroll_pos = $(this).scrollTop();
	
	    var presetHeights = Object.keys(perset);
	    var x = lessThan(presetHeights,scroll_pos);
	    var bgColor = perset[presetHeights[x]];
	    if(bgColor) {
	      $("body").css('background-color',bgColor);
	    }
	  }
	
	  $(document).scroll(processScroll);

	}
	
	// random background
	function randOrd() {
    return (Math.round(Math.random())-0.5); 
	}
	
	function randomBackground() {
	    var klasses = [ 'cover-1', 'cover-2' ];
	    klasses.sort( randOrd );
	    $('.cover').each(function(i, val) {
	        $(this).addClass(klasses[i]);
	    });
	}


	/************************* 
	Ejecución
	**************************/

	$(window).load(function() {
	   onLoadAndResize();
	   changeBackground();
	   effectLoad();
	   generateIntro();
	   randomBackground();
	   
	   if ($('body').hasClass('home')) {
	   	   if (browserwidth >= mediumwidth) {	
		   		addIcons();
		   		scrollIcons();
		   }
		   
		    if (browserwidth >= largewidth) {
				moveImageMouse();    
			}
	   } 
	   
	   if ($('body').hasClass('home')) {	
			menuHome();
		} else {
			menuPages();
		}
	   
	});

	$(window).resize(function(){
		onLoadAndResize();
	});
	
	// si tiene foundation
	//$(document).foundation({});

});


/*****************************
** efecto mover img intro
*****************************/
function moveImageMouse() {
	//check media query
	var mediaQuery = window.getComputedStyle(document.querySelector('.cd-background-wrapper'), '::before').getPropertyValue('content').replace(/"/g, '').replace(/'/g, ""),
		//define store some initial variables
		halfWindowH = $(window).height()*0.5,
		halfWindowW = $(window).width()*0.5,
		//define a max rotation value (X and Y axises)
		maxRotationY = 10,
		maxRotationX = 8,
		aspectRatio;

	//detect if hero <img> has been loaded and evaluate its aspect-ratio
	$('.cd-floating-background').find('img').eq(0).load(function() {
		aspectRatio = $(this).width()/$(this).height();
  		if( mediaQuery == 'web' && $('html').hasClass('preserve-3d') ) initBackground();
	}).each(function() {
		//check if image was previously load - if yes, trigger load event
  		if(this.complete) $(this).load();
	});
	
	//detect mouse movement
	$('.cd-background-wrapper').on('mousemove', function(event){
		if( mediaQuery == 'web' && $('html').hasClass('preserve-3d') ) {
			window.requestAnimationFrame(function(){
				moveBackground(event);
			});
		}
	});

	//on resize - adjust .cd-background-wrapper and .cd-floating-background dimentions and position
	$(window).on('resize', function(){
		mediaQuery = window.getComputedStyle(document.querySelector('.cd-background-wrapper'), '::before').getPropertyValue('content').replace(/"/g, '').replace(/'/g, "");
		if( mediaQuery == 'web' && $('html').hasClass('preserve-3d') ) {
			window.requestAnimationFrame(function(){
				halfWindowH = $(window).height()*0.5,
				halfWindowW = $(window).width()*0.5;
				initBackground();
			});
		} else {
			$('.cd-background-wrapper').attr('style', '');
			$('.cd-floating-background').attr('style', '').removeClass('is-absolute');
		}
	});

	function initBackground() {
		var wrapperHeight = Math.ceil(halfWindowW*2/aspectRatio), 
			proportions = ( maxRotationY > maxRotationX ) ? 1.1/(Math.sin(Math.PI / 2 - maxRotationY*Math.PI/180)) : 1.1/(Math.sin(Math.PI / 2 - maxRotationX*Math.PI/180)),
			newImageWidth = Math.ceil(halfWindowW*2*proportions),
			newImageHeight = Math.ceil(newImageWidth/aspectRatio),
			newLeft = halfWindowW - newImageWidth/2,
			newTop = (wrapperHeight - newImageHeight)/2;

		//set an height for the .cd-background-wrapper
		$('.cd-background-wrapper').css({
			'height' : wrapperHeight,
		});
		//set dimentions and position of the .cd-background-wrapper		
		$('.cd-floating-background').addClass('is-absolute').css({
			'left' : newLeft,
			'top' : newTop,
			'width' : newImageWidth,
		});
	}

	function moveBackground(event) {
		var rotateY = ((-event.pageX+halfWindowW)/halfWindowW)*maxRotationY,
			rotateX = ((event.pageY-halfWindowH)/halfWindowH)*maxRotationX;

		if( rotateY > maxRotationY) rotateY = maxRotationY;
		if( rotateY < -maxRotationY ) rotateY = -maxRotationY;
		if( rotateX > maxRotationX) rotateX = maxRotationX;
		if( rotateX < -maxRotationX ) rotateX = -maxRotationX;

		$('.cd-floating-background').css({
			'-moz-transform': 'rotateX(' + rotateX + 'deg' + ') rotateY(' + rotateY + 'deg' + ') translateZ(0)',
		    '-webkit-transform': 'rotateX(' + rotateX + 'deg' + ') rotateY(' + rotateY + 'deg' + ') translateZ(0)',
			'-ms-transform': 'rotateX(' + rotateX + 'deg' + ') rotateY(' + rotateY + 'deg' + ') translateZ(0)',
			'-o-transform': 'rotateX(' + rotateX + 'deg' + ') rotateY(' + rotateY + 'deg' + ') translateZ(0)',
			'transform': 'rotateX(' + rotateX + 'deg' + ') rotateY(' + rotateY + 'deg' + ') translateZ(40px)',
		});
	}
}

/* 	Detect "transform-style: preserve-3d" support, or update csstransforms3d for IE10 ? #762
	https://github.com/Modernizr/Modernizr/issues/762 */
(function getPerspective(){
  var element = document.createElement('p'),
      html = document.getElementsByTagName('html')[0],
      body = document.getElementsByTagName('body')[0],
      propertys = {
        'webkitTransformStyle':'-webkit-transform-style',
        'MozTransformStyle':'-moz-transform-style',
        'msTransformStyle':'-ms-transform-style',
        'transformStyle':'transform-style'
      };

    body.insertBefore(element, null);

    for (var i in propertys) {
        if (element.style[i] !== undefined) {
            element.style[i] = "preserve-3d";
        }
    }

    var st = window.getComputedStyle(element, null),
        transform = st.getPropertyValue("-webkit-transform-style") ||
                    st.getPropertyValue("-moz-transform-style") ||
                    st.getPropertyValue("-ms-transform-style") ||
                    st.getPropertyValue("transform-style");

    if(transform!=='preserve-3d'){
      html.className += ' no-preserve-3d';
    } else {
    	html.className += ' preserve-3d';
    }
    document.body.removeChild(element);

})();


/*****************************
** efecto unload page
*****************************/
function effectLoad() {
	var no_transitions = $('body').hasClass('no-transitions');
	/* fade out everything on url change */
	if(!no_transitions) {
		$('.home .menu-main .link a, .archive .menu-main a, .logo, .button-intro').click(function (a) {
		
			/* no animation on ios devices */
			if($(this).attr('target') !== '_blank') {
				if(isMobile() !== true && !a.ctrlKey) {
					var delay;
					
					var href = $(this).attr('href');
					
					// fade out content
					$('#wrapper').transition({ opacity: 0 }, 500, 'ease', function() {

						$('#content').transition({ opacity: 0 }, 700, 'ease', function() {
							window.location = href;
						});
					});						
				
					return false;
				}
			}
		});
	}

    /* show hidden element if user using the browser back button */
    window.onunload = function(){};
}

/*****************************
** Random intro
*****************************/
function generateIntro() {
    var all,
        randomed;
    
    all = generateAll();
    randomed = generateRandomed(all);
    
    $("#main").on("click", function (evt) {
        evt.preventDefault();
        randomed = doNext(all, randomed);
    });
}

function generateAll() {
    // Generates the array of "all" divs to work on
    var a = [];
    var divs = $(".intro .entry-home");
    for (var i = 1; i <= divs.length; i++) {
        a.push(i);
    }
    return a;
}

function generateRandomed(all) {
    // Randomizes the original array
    randomed = fisherYates(all);
    return randomed;
}

function doNext(all, randomed) {
    $(".entry-home").transition({ opacity: 0});
   
    
    if (randomed.length < 1) {
        $("#intro4").transition({ opacity: 1});
        randomed = generateRandomed(all);
    } else {
        var next = randomed.shift();
        var selector = "#intro" + next;
        $(selector).transition({ opacity: 1});
    }
    
    return randomed;
}

// Randomizes an array and returns the new one (doesn't modify original)
function fisherYates ( myArray ) {
  var return_arr = myArray.slice(0);
  var i = return_arr.length;
  if ( i == 0 ) return false;
  while ( --i ) {
     var j = Math.floor( Math.random() * ( i + 1 ) );
     var tempi = return_arr[i];
     var tempj = return_arr[j];
     return_arr[i] = tempj;
     return_arr[j] = tempi;
  }
  return return_arr;
}


/*****************************
** is mobile device or tablet?
*****************************/
function isMobile() {
			var check = false;
			(function(a){if(/(android|bb\d+|meego).+mobile|android|ipad|playbook|silk|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4)))check = true})(navigator.userAgent||navigator.vendor||window.opera);
			return check; 
		}

