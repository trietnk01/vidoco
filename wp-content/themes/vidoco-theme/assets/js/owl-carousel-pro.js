jQuery(document).ready(function(){
	jQuery(".owl-carousel-banner").owlCarousel({
        autoplay:true,                    
        loop:true,
        margin:0,                        
        nav:false,
        dots:true,            
        mouseDrag: true,
        touchDrag: true,  
        lazyLoad: true,                              
        responsiveClass:true,
        responsive:{
            0:{
                items:1
            }
        }
    });     
    jQuery(".owl-carousel-top-employer").owlCarousel({
        autoplay:true,                    
        loop:true,
        margin:0,                        
        nav:true,
        navText: ["<i class=\"fas fa-arrow-circle-left\"></i>","<i class=\"fas fa-arrow-circle-right\"></i>"],
        dots:false,            
        mouseDrag: true,
        touchDrag: true,  
        lazyLoad: true,                              
        responsiveClass:true,
        responsive:{
            0:{
                items:1
            }
        }
    });     
    jQuery(".owl-carousel-attractive-recruitment").owlCarousel({
        autoplay:true,                    
        loop:true,
        margin:0,                        
        nav:true,
        navText: ["<i class=\"fas fa-arrow-circle-left\"></i>","<i class=\"fas fa-arrow-circle-right\"></i>"],
        dots:false,            
        mouseDrag: true,
        touchDrag: true,  
        lazyLoad: true,                              
        responsiveClass:true,
        responsive:{
            0:{
                items:1
            }
        }
    });       
});