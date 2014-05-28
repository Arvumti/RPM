$(document).on('ready', inicio);
var app = {},
    tmp = null,
    $topLoader = null,
    tmpCarro = function(){},
    meses = ['', 'ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE'];

function inicio() {
    $(document).foundation();
    console.log(1)
    
    Handlebars.registerHelper('GetMeses', function(mes){
        var options = '';
        for(var i = 1; i < meses.length; i++) {
            options += '<option value="' + i + '" ' + ( i == mes ? 'selected' : '') + '>' + meses[i] + '</option>';
        }
        return options;
	});    
    tmpCarro = Handlebars.compile($('#tmp-carro').html());
    
    getCarros();
    
    $('#pnlCarros').on('click', '.btn-guradar', function(e) {
        var elem = $(e.currentTarget).parents('.pnl-carro');
        saveCarro(elem);
    });
    
    $('#pnlCarros').on('click', '.btn-visible', function(e) {
        var elem = $(e.currentTarget).parents('.pnl-carro');
        if(elem.data('activo') == 1) {
            elem.data('activo', 0);
            elem.find('textarea, input, select, .btn-guradar').attr('disabled', 'disabled');
            $(e.currentTarget).find('i').removeClass('fa-eye').addClass('fa-eye-slash');
        }
        else {
            elem.data('activo', 1);
            elem.find('textarea, input, select, .btn-guradar').removeAttr('disabled', 'disabled');
            $(e.currentTarget).find('i').removeClass('fa-eye-slash').addClass('fa-eye');
        }
        saveCarro(elem);
    });
    
    $('#upIBottom').on('change', function() {
        saveCarro(app.current);
    });
    
    $topLoader = $("#topLoader").percentageLoader({width: 256, height: 256, controllable : true, progress : 0, onProgressUpdate : function(val) {
        $topLoader.setValue(Math.round(val * 100.0));
    }});
}

function getCarros() {
    $.getJSON('routes.php', {data:1}).done(done).fail(fail);
    
    function done(data) {
        var carros = tmpCarro({data:data});
        $('#pnlCarros').append(carros);
        
        $('.pnl-carro').find('.img-logo').on('click', function(e) { 
            e.preventDefault();
            app.current = $(e.currentTarget).parents('.pnl-carro');
            
            $('#upIBottom').click();
        });
    }
    
    function fail(xhr) {
        console.log(xhr);
    }
}

function saveCarro(elem) { 
    var elemFile = $('form input:file')[0],
        file = elemFile.files[0],
        type = file ? file.type : '';
        
    var json = {
        idCarro     : elem.data('id'),
        dirImg      : elem.find('.img-logo').find('img').attr('src').substring(12),
        nombre      : elem.find('.txt-nombre').val(),
        detalles    : elem.find('.txa-detalle').val(),
        tipo        : elem.find('.cbo-tipo').val(),
        modelo      : elem.find('.txt-modelo').val(),
        killit      : elem.find('.txt-killit').val(),
        kilometraje : elem.find('.txt-kilometraje').val(),
        precio      : elem.find('.txt-precio').val(),
        activo      : elem.data('activo')
    };
    
    var formData = new FormData($('form')[0]);
    formData.append("data", JSON.stringify(json));
    
    lShow();
    
    $.ajax({
        url: 'routes.php',  //Server script to process data
        type: 'POST',
        xhr: function() {  // Custom XMLHttpRequest
            var myXhr = $.ajaxSettings.xhr();
            if(myXhr.upload){ // Check if upload property exists
                myXhr.upload.addEventListener('progress', progressHandlingFunction, false); // For handling the progress of the upload
            }
            return myXhr;
        },
        success: function(data) {
            if(data.res == 1 && data.img)
                app.current.find('.img-logo img').attr('src', 'img\\db_imgs\\' + data.img);
            
            console.log(data.err);
            
            $('form')[0].reset();
            app.current = null;
            lHide();
        },
        error: function(xhr) {
            lHide();
            console.log(xhr);
        },
        // Form data
        data: formData,
        //Options to tell jQuery not to process data or worry about content-type.
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false
    });
    
    return json;
}

function progressHandlingFunction(e){
    console.log(e);
    if(e.lengthComputable){
        console.log({value:e.loaded,max:e.total});
        
        $topLoader.setProgress(0);
        $topLoader.setValue('0kb');
        var kb = e.loaded;
        var totalKb = e.total + 100;
        
        $topLoader.setProgress(kb / totalKb);
        $topLoader.setValue(kb.toString() + 'kb');
    }
}

function SetCurrenArticle(article){
    $('section.files article').removeClass('current');
    article.addClass('current');
}

function lShow() {
    var h1 = $(document).height();
    var h2 = $('body').height();
    var h3 = $('html').height();
    var  max = 0;
    
    if(h1 > h2 && h1 > h3)
        max = h1;
    else if (h2 > h3)
        max = h2;
    else
        max = h3;
    
    var top = $(document).scrollTop() + 250;
    
    $('.loading').css({height:max + 'px'}).removeClass('isHidden').children('#topLoader').css({top:top + 'px'});
}

function lHide() {
    $('.loading').addClass('isHidden');
}

Handlebars.registerHelper('isActivoIco', function(activo){
    if(activo == 0)
      return '-slash';
});

Handlebars.registerHelper('isActivo', function(activo){
    if(activo == 0)
      return 'disabled';
});