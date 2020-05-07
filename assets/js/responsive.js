setInterval(() => {
    if(window.innerWidth >= 750){
        var aanbevolen = document.getElementById('aanbevolen').offsetHeight;
        var slide = document.getElementById('slide').offsetHeight;
        slide = slide - 5;
        document.getElementById('side').style.height=aanbevolen + 'px';
        document.getElementById('over').style.height=slide + 'px';
    }else{
        document.getElementById('over').style.height= 'auto';
        document.getElementById('side').style.height= 'auto';
    }
}, 100);
        