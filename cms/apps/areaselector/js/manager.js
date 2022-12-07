document.addEventListener("DOMContentLoaded", function(){
    function jo_append(elem,type,src){
      var s = document.createElement(elem);
      s.type = type;
      s.src = src;
      s.async = false;
      document.head.appendChild(s);
    }

    if(!window.jQuery){
        jo_append('script','text/javascript','https://code.jquery.com/jquery-latest.js');
    }

    var s = document.createElement('link');
    s.rel = 'stylesheet';
    s.href = '/cms/core/style/css/stylesheet.css';
    document.head.appendChild(s);

    var s = document.createElement('link');
    s.rel = 'stylesheet';
    s.href = '/cms/apps/areaselector/css/stylesheet.css';
    document.head.appendChild(s);

    jo_append('script','text/javascript','https://code.jquery.com/ui/1.12.1/jquery-ui.js');

    jo_append("script","text/javascript","/cms/core/js/ui.js");

    jo_append("script","text/javascript","/cms/apps/areaselector/js/area.js");
}, false);
