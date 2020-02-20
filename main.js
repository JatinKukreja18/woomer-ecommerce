function changeSlide(el,value){
    if(document.querySelector('.wm-banner-product.active')){
        document.querySelector('.wm-banner-product.active').classList.remove('active');
    }
    if(document.querySelector('.wm-banner-color-option.active')){
        document.querySelector('.wm-banner-color-option.active').classList.remove('active');
    }
    document.querySelector('#id-'+ value).classList.add('active');
    el.parentElement.classList.add('active');
}