// JavaScript Document
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
if(getCookie("user") === null || getCookie("user") === ''|| getCookie("user")=== undefined) {
    var userid=Math.floor(Math.random() * 1000);
    setCookie("user",userid,7);
    setCookie("regtime",Date.now(),7);
   // alert(Date.now());
    //alert("oluşturuldu "+ getCookie("user"));
}else{
    var userid=getCookie("user");
    var usertime=getCookie("regtime");
   // alert(userid+"  "+usertime);
}
$( document ).ready(function() {
  $('#merhabaModal').modal();
 	var aktif="";
	var aktifrow=0;
	var aktifcol=0;
	var bu=null; 
 	var yon=0;
	var iMax = 8;
	var jMax = 10;
	var komutlar=new Array();
	var tablo = new Array();
    var hedeftoplam = $('.hedef').length;
    var toplananhedef=0;
    var hkarti=0;

	for (i=0;i<iMax;i++) {
	 tablo[i]=new Array();
	 for (j=0;j<jMax;j++) {
	  tablo[i][j]="0";
	 }
	}

 /*-------- GÖRSEL NESNELER KONTROLLLERİ ---- */

    $( "#kaydet" ).submit(function( event ) {
		event.preventDefault();
	 	var formbilgi=$( "#kaydet" ).serialize();
		var tablobilgi=JSON.stringify(tablo);
		$.ajax({
            method: "POST",
            url: "kaydet.php",
            data: {senaryo:tablobilgi,bilgi:formbilgi}
        }).done(function( msg ) {
			$( "#kaydet" ).html("<img src='http://tospaa.org/senaryolar/resimler/tospaared.png' class='img-circle pull-left'> Senaryonu kaydettim. Onay işleminden sonra yayınlayacağım.<br> Ama istersen sen bu arada <a class='btn btn-info' href='olustur.php' role='link'> yeni bir senaryo</a> hazırlayabilirsin ")
        });

		});

    function yonu(bu){
	    var yonu=0;
        if (bu.hasClass("don90")){
        yonu=1;
        }else if (bu.hasClass("don180")){
        yonu=2;
        }else if (bu.hasClass("don270")){
        yonu=3;
        }else{
        yonu=0;
        }
         return yonu;
    }

    function sag(){
        console.log("---------------sağ--------------------");
        var tospaarow=$(".playground .tospaa").data("row");
        var tospaacol=$(".playground .tospaa").data("col");
        var oyunkutusu='row'+tospaarow+'col'+tospaacol;
        var bu=$('.'+oyunkutusu);
        aktifrow=bu.data("row");
        aktifcol=bu.data("col");

            if(bu.hasClass("don90")){
                bu.addClass("don180");
                bu.removeClass("don90");
                tablo[aktifrow-1][aktifcol-1]=tablo[aktifrow-1][aktifcol-1]+" don180";
              //  console.log(tablo);
            }else if(bu.hasClass("don180")){
                bu.addClass("don270");
                bu.removeClass("don180");
                tablo[aktifrow-1][aktifcol-1]=tablo[aktifrow-1][aktifcol-1]+" don270";
               // console.log(tablo);
            }else if(bu.hasClass("don270")){
                bu.removeClass("don270");
                tablo[aktifrow-1][aktifcol-1]=tablo[aktifrow-1][aktifcol-1];
               // console.log(tablo);
            }else{
                bu.addClass("don90");
                tablo[aktifrow-1][aktifcol-1]=tablo[aktifrow-1][aktifcol-1]+" don90";
              //  console.log(tablo);
            }

		yonu(bu);
		
	/* Aktif Kod Kartını Göster */
			var hangisi;
			$('.kodpanel .kutu2').removeClass('cerceve2');
		  	hangisi=$('.kodpanel .row'+(window.kodindis+1)+'col'+(1));
           	hangisi.addClass("cerceve2");
		/* Aktif Kod Kartı Gösterim Sonu 	 */

	}

	function sol(){
            console.log("---------------sol--------------------");
            var tospaarow=$(".playground .tospaa").data("row");
            var tospaacol=$(".playground .tospaa").data("col");
            var oyunkutusu='row'+tospaarow+'col'+tospaacol;
            var bu=$('.'+oyunkutusu);
            aktifrow=bu.data("row");
            aktifcol=bu.data("col");
            yonu(bu);
            if(bu.hasClass("don90")){
                bu.removeClass("don90");
                tablo[aktifrow-1][aktifcol-1]=tablo[aktifrow-1][aktifcol-1];
                console.log(tablo);
            }else if(bu.hasClass("don180")){
                bu.addClass("don90");
                bu.removeClass("don180");
                tablo[aktifrow-1][aktifcol-1]=tablo[aktifrow-1][aktifcol-1]+" don90";
                console.log(tablo);
            }else if(bu.hasClass("don270")){
                bu.addClass("don180");
                bu.removeClass("don270");
                tablo[aktifrow-1][aktifcol-1]=tablo[aktifrow-1][aktifcol-1]+" don180";
                console.log(tablo);
            }else{
                bu.addClass("don270");
                tablo[aktifrow-1][aktifcol-1]=tablo[aktifrow-1][aktifcol-1]+" don270";
                console.log(tablo);
            }

			/* Aktif Kod Kartını Göster */
			var hangisi;
			$('.kodpanel .kutu2').removeClass('cerceve2');
		  	hangisi=$('.kodpanel .row'+(window.kodindis+1)+'col'+(1));
           	hangisi.addClass("cerceve2");
		/* Aktif Kod Kartı Gösterim Sonu 	 */
		
	}

	function ileri(){
        console.log("---------------ileri--------------------");
        var tospaarow=$(".playground .tospaa").data("row");
        var tospaacol=$(".playground .tospaa").data("col");
        var oyunkutusu='row'+tospaarow+'col'+tospaacol;
        var bu=$('.'+oyunkutusu);
        yonu(bu);
        aktifrow=bu.data("row");
        aktifcol=bu.data("col");
        hedeftoplam = $('.hedef').length;
        switch (yonu(bu)){
            case 0:
                var yenioyunkutusu='row'+(tospaarow-1)+'col'+tospaacol;
                if($('.playground .'+yenioyunkutusu).hasClass("taslikutu")){
                   // alert("engel var");
				   $('#engelModal').modal();   
                    hatalikod=true;

                }else {
                    $('.playground .' + yenioyunkutusu).addClass("tospaa");
                    bu.removeClass("tospaa");
                }
                break;
            case 1:
                var yenioyunkutusu='row'+tospaarow+'col'+(tospaacol+1);
                if($('.playground .'+yenioyunkutusu).hasClass("taslikutu")){
                 //   alert("engel var");
				 $('#engelModal').modal();   
                    hatalikod=true;
                    break;
                }else{
                    $('.playground .'+yenioyunkutusu).addClass("tospaa don90");
                    bu.removeClass("tospaa");
                    bu.removeClass("don90");
                }
                break;
            case 2:
                var yenioyunkutusu='row'+(tospaarow+1)+'col'+tospaacol;
                if($('.playground .'+yenioyunkutusu).hasClass("taslikutu")){
                 //   alert("engel var");
				 $('#engelModal').modal()   
                    hatalikod=true;
                    break;
                }else {
                    $('.playground .' + yenioyunkutusu).addClass("tospaa don180");
                    bu.removeClass("tospaa");
                    bu.removeClass("don180");
                }
                break;
            case 3:
                var yenioyunkutusu='row'+tospaarow+'col'+(tospaacol-1);
                if($('.playground .'+yenioyunkutusu).hasClass("taslikutu")){
                 //   alert("engel var");
				 $('#engelModal').modal();   
                    hatalikod=true;
                    break;
                }else{
                    $('.playground .'+yenioyunkutusu).addClass("tospaa don270");
                    bu.removeClass("tospaa"); bu.removeClass("don270");
                }
                break;
        }

		/* Aktif Kod Kartını Göster */
			var hangisi;
			$('.kodpanel .kutu2').removeClass('cerceve2');
		  	hangisi=$('.kodpanel .row'+(window.kodindis+1)+'col'+(1));
           	hangisi.addClass("cerceve2");
		/* Aktif Kod Kartı Gösterim Sonu 	 */
		
 		/* HEDEF TOPLAMA ---------------------- -------------*/

        if($('.playground .'+yenioyunkutusu).hasClass("hedef")){
            calkeke();
            toplananhedef++;
            $('.playground .'+yenioyunkutusu).removeClass("hedef");
            console.log("toplanan"+toplananhedef);
            console.log("toplam hedef"+hedeftoplam);
            if(hedeftoplam==1){
                $('#bravoModal #hkartisayisi').html(hkarti);
                $('#bravoModal').modal();
                $('.baslatbuton').hide();
                $('.temizlebuton').hide();
                $('.sonrakibuton').removeClass('hidden');

            }
        }
    }

	var tasvar=false;

    function egertasvarsa(){
        console.log("------eğer-----");
        tasvar=false;
        var tospaarow=$(".playground .tospaa").data("row");
        var tospaacol=$(".playground .tospaa").data("col");
        var oyunkutusu='row'+tospaarow+'col'+tospaacol;
        var bu=$('.'+oyunkutusu);
        aktifrow=bu.data("row");
        aktifcol=bu.data("col");

        if (bu.hasClass("don90")){
            var yenioyunkutusu='row'+tospaarow+'col'+(tospaacol+1);
            if($('.playground .'+yenioyunkutusu).hasClass("taslikutu")){
                // alert("engel var 90");
				// $('#engelModal').modal();
                console.log("------tas var---90--");
                tasvar=true;
            }
        }else if (bu.hasClass("don180")){
            var yenioyunkutusu='row'+(tospaarow+1)+'col'+tospaacol;
            if($('.playground .'+yenioyunkutusu).hasClass("taslikutu")){
               // alert("engel var 180");
			   // $('#engelModal').modal();
                console.log("------tas var---180--");
                tasvar=true;
            }
        }else if (bu.hasClass("don270")){
            var yenioyunkutusu='row'+tospaarow+'col'+(tospaacol-1);
            if($('.playground .'+yenioyunkutusu).hasClass("taslikutu")){
                // alert("engel var 270");
				// $('#engelModal').modal();
                console.log("------tas var---270--");
                tasvar=true;
            }
        }else {
            var yenioyunkutusu = 'row' + (tospaarow - 1) + 'col' + tospaacol;
            if ($('.playground .' + yenioyunkutusu).hasClass("taslikutu")) {
              //  alert("engel var");
			  // $('#engelModal').modal();
                console.log("------tas var---0--");
                tasvar=true;
            }
        }

        if(tasvar==true){
            tasvar=false;
        }else{
			//alert("eski"+window.kodindis);
        	window.kodindis++;
            //alert("yeni"+window.kodindis);
            tasvar=false;
		}
	}

    function egertasyoksa(){
        tasvar=false;
        var tospaarow=$(".playground .tospaa").data("row");
        var tospaacol=$(".playground .tospaa").data("col");
        var oyunkutusu='row'+tospaarow+'col'+tospaacol;
        var bu=$('.'+oyunkutusu);
        aktifrow=bu.data("row");
        aktifcol=bu.data("col");
        //alert("eğer çalıştı");

        if (bu.hasClass("don90")){
            var yenioyunkutusu='row'+tospaarow+'col'+(tospaacol+1);
            if($('.playground .'+yenioyunkutusu).hasClass("taslikutu")){
                //alert("engel var");
                // $('#engelModal').modal();
                tasvar=true;
                console.log("----90 derece ve "+tasvar);
            }
        }else if (bu.hasClass("don180")){
            var yenioyunkutusu='row'+(tospaarow+1)+'col'+tospaacol;
            if($('.playground .'+yenioyunkutusu).hasClass("taslikutu")){
                //alert("engel var");
                // $('#engelModal').modal();
                tasvar=true;
                console.log("-----180 derece ve "+tasvar);
            }
        }else if (bu.hasClass("don270")){
            var yenioyunkutusu='row'+tospaarow+'col'+(tospaacol-1);
            if($('.playground .'+yenioyunkutusu).hasClass("taslikutu")){
                //alert("engel var");
                // $('#engelModal').modal();
                tasvar=true;
                console.log("------270 derece ve "+tasvar);
            }
        }else {
            var yenioyunkutusu = 'row' + (tospaarow - 1) + 'col' + tospaacol;
            if ($('.playground .' + yenioyunkutusu).hasClass("taslikutu")) {
                //alert("engel var");
                //$('#engelModal').modal();
                tasvar=true;
                console.log("--------0 derece ve "+tasvar);
            }
        }

        if(tasvar==false){
            console.log("tasyok kodindis "+kodindis);
            //eval(komutlar[kodindis++]+"();");
            // window.kodindis++;
        }else{
            //kodindis++;
            console.log("taşvar kodindis arttırıldı"+kodindis);
            window.kodindis++;
        }
    }

	/* OYNATMA EYLEMLERİ */
    var hatalikod=false;
    var kodtext="";
    window.kodindis= 0;
	function oyunubaslat()
    {
        window.kodindis= 0;
            var run = function(obj) {
            	    setTimeout(function() {
                    var komutindis=obj.kodindis;
				    var entry = komutlar[komutindis]+"();";
                    if(entry) {
                    	eval(entry);
                        if (komutlar.length-1>obj.kodindis && hatalikod==false){
                            obj.kodindis++;
                            run((window));
						}
                    }
                }, 500);
            };
            run(window);
        //eval(kodtext);
        kodtext="";
    }

	var dongusay=10;
    var donguindis=new Array();
    var dongusonindis=new Array();
    var dongudurum=new Array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
    var dongukosul=new Array();

    function  logla() {
        console.log("kod indis"+window.kodindis);
        console.log("dongu sayısı"+dongusay);
        console.log("dongu durum"+dongudurum[dongusay]);
        console.log("dongu koşul"+dongukosul[dongusay]);
    }

	function dongu(){
         //   console.log("---------------dongu3-------------- sayısı" +dongusay+" ---kod indis"+window.kodindis);
            donguindis[dongusay]=window.kodindis;
            dongukosul[dongusay]=1000;
            dongudurum[dongusay]++;
            dongusay++;
            }

    function dongu2(){
       // console.log("---------------dongu2-------------- sayısı" +dongusay+" ---kod indis"+window.kodindis);
        donguindis[dongusay]=window.kodindis;
        dongukosul[dongusay]=2;
        dongudurum[dongusay]++;
        dongusay++;
    }

    function dongu3(){
       // console.log("---------------dongu3-------------- sayısı" +dongusay+" ---kod indis"+window.kodindis);
        donguindis[dongusay]=window.kodindis;
        dongukosul[dongusay]=3;
        dongudurum[dongusay]++;
        dongusay++;

    }

    function dongu4(){
      //  console.log("---------------dongu3-------------- sayısı" +dongusay+" ---kod indis"+window.kodindis);
        donguindis[dongusay]=window.kodindis;
        dongukosul[dongusay]=4;
        dongudurum[dongusay]++;
        dongusay++;

    }
	
    function dongu5(){
      //  console.log("---------------dongu3-------------- sayısı" +dongusay+" ---kod indis"+window.kodindis);
        donguindis[dongusay]=window.kodindis;
        dongukosul[dongusay]=5;
        dongudurum[dongusay]++;
        dongusay++;

    }

    function donguson(){
        console.log("-----dongusongiriş----koşul "+dongukosul[dongusay]+"---durum "+dongudurum[dongusay]+"---dongusay---- "+dongusay);
        dongusay--;
        dongusonindis[dongusay]=window.kodindis;
        if(dongukosul[dongusay]>(dongudurum[dongusay])){
            window.kodindis=donguindis[dongusay]-1;
        }else{
			dongudurum[dongusay]=0;
        }
        console.log("-----dongusonsonuc----koşul "+dongukosul[dongusay]+"---durum "+dongudurum[dongusay]+"---dongusay---- "+dongusay+" ---kod indis"+window.kodindis);
    }

    $( ".baslatbuton" ).click(function( event ) {
       oyunubaslat();
    });

    /* SES KONTROLLERİ */

    var sound1 = new Howl({
        src: ['media/sound1.wav'],
        html5: true
    });
    var sound2 = new Howl({
        src: ['media/sound2.mp3'],
        html5: true
    });
    var sound3 = new Howl({
        src: ['media/sound3.wav'],
        html5: true
    });

    function calkeke() {
        id = sound1.play();
        setTimeout(function() {
            sound1.stop();
        }, 1000);
    }

	sound2.play();
	
    /* KOD OLUŞTURMA */

    var kodsatir=1;
    var kodsutun=1;

    function tertemiz() {
    $( ".kutu2" ).removeClass("ileri");
    $( ".kutu2" ).removeClass("donguson");
    $( ".kutu2" ).removeClass("sag");
    $( ".kutu2" ).removeClass("sol");
    $( ".kutu2" ).removeClass("dongu2");
    $( ".kutu2" ).removeClass("dongu3");
    $( ".kutu2" ).removeClass("dongu4");
    $( ".kutu2" ).removeClass("dongu5");
    $( ".kutu2" ).removeClass("dongu");
    $( ".kutu2" ).removeClass("egertasyoksa");
    $( ".kutu2" ).removeClass("egertasvarsa");
    $( ".kutu2" ).removeClass("taslikutu");
    $( ".kutu2" ).removeData("tipi");
    $( ".kutu2" ).removeClass("cerceve2")
    $('textarea[name=\'metineditor\']').val("");
    komutlar = [];
    aktif="";
    window.kodindis=0;
    aktifrow=0;
    aktifcol=0;
    yon=0;
    kodsatir=1;
    kodsutun=1;
    bu=$('.kodpanel .row1col1');
}

   $( ".temizlebuton" ).click(function( event ) {
           tertemiz();
   
    });

    $( ".cozum .buton2" ).click(function( event ) {
        sound3.play();
        if(bu===null){
            bu=$('.kodpanel .row1col1');
         	kodsatir=1;
			kodsutun=1;
			var tipi=$(this).data("tip");
            bu.addClass($(this).data("tip"));
            bu.data("tipi",tipi);
			bu=kodciktisi($(this).data("tip"),kodsatir,kodsutun);
            komutlar.push($(this).data("tip"));
            console.log(tablo);
            if(tipi=="sol"||tipi=="sag"||tipi=="ileri") { hkarti++; }
        }else{
			var tipi=$(this).data("tip");
            bu.addClass($(this).data("tip"));
            bu.data("tipi",tipi);
            bu.removeClass("cerceve2");
            console.log(tablo);
            var kodsatir=bu.data("row");
            var kodsutun=bu.data("col");
            bu=$('.kodpanel .row'+(kodsatir+1)+'col'+(kodsutun));
            komutlar.push($(this).data("tip"));
			bu=kodciktisi($(this).data("tip"),kodsatir,kodsutun);
            if(tipi=="sol"||tipi=="sag"||tipi=="ileri") { hkarti++; }
        }
        bu.addClass("cerceve2");
    });

	function kodciktisi(kodu,kodsatir,kodsutun){
		switch(kodu){
				case "egertasvarsa":
				 	
					$('.kodpanel .row'+(kodsatir)+'col'+(kodsutun+1)).addClass('taslikutu');
					bu=$('.kodpanel .row'+(kodsatir)+'col'+(kodsutun+2));
					$('textarea[name=\'metineditor\']').val($('textarea[name=\'metineditor\']').val()+'eğer taş varsa ');
				break;
				case "egertasyoksa":
					$('.kodpanel .row'+(kodsatir)+'col'+(kodsutun+1)).addClass('taslikutu');
					bu=$('.kodpanel .row'+(kodsatir)+'col'+(kodsutun+2));
					$('textarea[name=\'metineditor\']').val($('textarea[name=\'metineditor\']').val()+'eğer taş yoksa ');
				break;
				case "dongu2":
				 	bu=$('.kodpanel .row'+(kodsatir+1)+'col'+(1));
					$('textarea[name=\'metineditor\']').val($('textarea[name=\'metineditor\']').val()+'2 defa tekrar et '+'\n\n');
				break;
				case "dongu3":
				 	bu=$('.kodpanel .row'+(kodsatir+1)+'col'+(1));
					$('textarea[name=\'metineditor\']').val($('textarea[name=\'metineditor\']').val()+'3 defa tekrar et '+'\n\n');
				break;
				case "dongu4":
				 	bu=$('.kodpanel .row'+(kodsatir+1)+'col'+(1));
					$('textarea[name=\'metineditor\']').val($('textarea[name=\'metineditor\']').val()+'4 defa tekrar et '+'\n\n');
				break;
				case "dongu5":
				 	bu=$('.kodpanel .row'+(kodsatir+1)+'col'+(1));
					$('textarea[name=\'metineditor\']').val($('textarea[name=\'metineditor\']').val()+'5 defa tekrar et '+'\n\n');
				break;
				case "dongu":
				 	bu=$('.kodpanel .row'+(kodsatir+1)+'col'+(1));
					$('textarea[name=\'metineditor\']').val($('textarea[name=\'metineditor\']').val()+'sürekli tekrar et '+'\n\n');
				break;
				case "donguson":
				  	bu=$('.kodpanel .row'+(kodsatir+1)+'col'+(1));
					$('textarea[name=\'metineditor\']').val($('textarea[name=\'metineditor\']').val()+'tekrarı bitir'+'\n\n');
				break;
				case "ileri":
				  	bu=$('.kodpanel .row'+(kodsatir+1)+'col'+(1));
					$('textarea[name=\'metineditor\']').val($('textarea[name=\'metineditor\']').val()+'ileri();\n\n');
				break;
				case "sol":
				 	 bu=$('.kodpanel .row'+(kodsatir+1)+'col'+(1));
					$('textarea[name=\'metineditor\']').val($('textarea[name=\'metineditor\']').val()+'sol();\n\n');
				break;
				case "sag":
				 	bu=$('.kodpanel .row'+(kodsatir+1)+'col'+(1));
					$('textarea[name=\'metineditor\']').val($('textarea[name=\'metineditor\']').val()+'sağ();\n\n');
				break;
			}
			return(bu);
		
	}

    function aktifkutu(tipi,kodsatir,kodsutun){
        switch(tipi){
            case "egertasvarsa":
                $('.kodpanel .row'+(kodsatir)+'col'+(kodsutun+1)).addClass('taslikutu');
                bu=$('.kodpanel .row'+(kodsatir)+'col'+(kodsutun+2));
                break;
            case "egertasyoksa":
                $('.kodpanel .row'+(kodsatir)+'col'+(kodsutun+1)).addClass('taslikutu');
                bu=$('.kodpanel .row'+(kodsatir)+'col'+(kodsutun+2));
                break;
            case "dongu2":
                bu=$('.kodpanel .row'+(kodsatir+1)+'col'+(1));
                break;
            case "dongu3":
                bu=$('.kodpanel .row'+(kodsatir+1)+'col'+(1));
                break;
            case "dongu4":
                bu=$('.kodpanel .row'+(kodsatir+1)+'col'+(1));
                break;
            case "dongu5":
                bu=$('.kodpanel .row'+(kodsatir+1)+'col'+(1));
                break;
            case "dongu":
                bu=$('.kodpanel .row'+(kodsatir+1)+'col'+(1));
                break;
            case "donguson":
                bu=$('.kodpanel .row'+(kodsatir+1)+'col'+(1));
                break;
            case "ileri":
                bu=$('.kodpanel .row'+(kodsatir+1)+'col'+(1));
                break;
            case "sol":
                bu=$('.kodpanel .row'+(kodsatir+1)+'col'+(1));
                break;
            case "sag":
                bu=$('.kodpanel .row'+(kodsatir+1)+'col'+(1));
                break;
        }
        return(bu);
    }

    function blokyap(tip) {
        if(bu===null){
            bu=$('.kodpanel .row1col1');
            kodsatir=1;
            kodsutun=1;
            var tipi=tip;
            bu.addClass(tipi);
            bu.data("tipi",tipi);
            bu=aktifkutu(tipi,kodsatir,kodsutun);
            komutlar.push(tip);
        }else{
            var tipi=tip;
            bu.addClass(tipi);
            bu.data("tipi",tipi);
            bu.removeClass("cerceve2");
            var kodsatir=bu.data("row");
            var kodsutun=bu.data("col");
            bu=aktifkutu(tipi,kodsatir,kodsutun);
            komutlar.push(tip);
        }

        // $('textarea[name=\'metineditor\']').val($('textarea[name=\'metineditor\']').val()+$(this).data("tip")+'()\n');
        bu.addClass("cerceve2");
    }

    function trkontrol(str) {
        var latin = new Array("s","S","c","C","g","G","u","U","i","I","","","","");
        var turkce = new Array("ş","Ş","ç","Ç","ğ","Ğ","ü","Ü","ı","İ","(",")",";"," ");
        for (var i=0; i<turkce.length; i++) {
            str = str.replace(turkce[i], latin[i]);
        }
        str=str.replace(/ /g, "");
        return str;
    }

    $('textarea[name=\'metineditor\']').on('keypress',function(e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if (code == 13) {
            lines = $('textarea[name=\'metineditor\']').val().split("\n");
            lastLine = lines[lines.length-1];
            var kullanilabilirmethodlar = ["sol();", "sağ();", "ileri();","eğer taş varsa","eğer taş yoksa","sürekli tekrar et","tekrarı bitir","2 defa tekrar et","3 defa tekrar et","4 defa tekrar et","5 defa tekrar et"];
            var trmethodlar = ["sol", "sag", "ileri", "egertasvarsa","egertasyoksa","dongu","donguson","dongu2","dongu3","dongu4","dongu5"];

            var hatadurum;
            var i=0;
            tertemiz();
            lines.forEach(function(entry) {
                //alert(entry);
                i++;
                mthddurum = kullanilabilirmethodlar.indexOf(entry);
                // alert(hatadurum);
                if(entry!=''){
                    if(mthddurum==-1){
                        $('#kodhataModal i').html(i);
                        $('#kodhataModal').modal();

                    }else{
                       // if(trkontrol(entry)=="egertasvarsa" || trkontrol(entry)=="egertasyoksa"){
                         //   $('textarea[name=\'metineditor\']').val($('textarea[name=\'metineditor\']').val()+entry+' ');
                        //}else{
                            $('textarea[name=\'metineditor\']').val($('textarea[name=\'metineditor\']').val()+entry+'\n\n');
                        //}
                        //alert(a+'  '+lastLine);
                        // alert("Sending your Message : " + document.getElementById('texteditor').value);
                       blokyap(trmethodlar[mthddurum]);

                        //alert(trkontrol(entry));
                    }
                }

            });
            // $('textarea[name=\'metineditor\']').val($('textarea[name=\'metineditor\']').val()+'\n');

        }
    });

    $('#merhabaModal').on('hidden.bs.modal', function (e) {
        $('#Merhaba2').modal('show');
    })



});

