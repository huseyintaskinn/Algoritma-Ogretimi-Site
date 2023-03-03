<?php 
    session_start();

    if ($_SESSION['level']<8) {
        header("Location: 7.php");
    }
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async="" src="gtag/js.js?id=UA-69495165-4"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-69495165-4','auto');
</script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Tavşan Oyunu | Seviye 8</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/stil.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <!-- <script src="http://code.jquery.com/jquery-1.12.4.min.js"></script> -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script src="js/howler.core.js"></script>
    <!-- <script src="js/kar.js"></script> -->

    <script type="text/javascript" src="js/tospaa7.js"></script>
    <style>
        *{
            font-family: calibri;
        }

        .butonn{
            padding: 5px;
            border-bottom: 3px solid black;
            color: white;
            transition: .5s;
            cursor: pointer;
            text-decoration: none;
            font-size: 25px;
        }

        .butonn:hover{
            border-color: #00a1e0;
            text-decoration: none;
            color: white;
            transition: .5s;
        }
    </style>

</head>
<body style="background: radial-gradient(rgb(126, 208, 247),rgb(126, 193, 255));">


<div class="modal fade bs-example-modal-md" id="merhabaModal" tabindex="-1" role="dialog" aria-labelledby="merhabaModal">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">Kodlama Serüveni</h4>
      </div>
     <div class="modal-body" style="background-color:#bed63a;color:white;">
                <table border="0"><tr><td><img align="left" src="resimler/tospaa.png"></td><td colspan="2"><br> Eğer bloklarını biliyor musun?Mesela <br> << Eğer önümde taş varsa sola dön >> <br><br><img align="left" src="resimler/eger.png"><img align="left" src="resimler/tas.png"><img align="left" src="resimler/sol.png"></td></tr>
                </table>    <hr>Denemek ister misin? Üstlerine tıklaman ve sonra <button class="btn btn-xs btn-danger">başlat</button> butonuna basman yeterli.
    </div>
  </div>
</div>
</div>

<div class="modal fade bs-example-modal-sm" id="engelModal" tabindex="-1" role="dialog" aria-labelledby="engelModal">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">Engel</h4>
      </div>
      <div class="modal-body" style="background-color:#bed63a;color:white;">
      <img src="resimler/tas.png" align="left" style="margin-right:10px;margin-bottom:15px;"> Önümüzde engel var. <br> Kodları gözden geçirmelisin<br><button class="btn btn-xs btn-info">yeniden dene</button> butonu ile en baştan başlayabilirsin.
      </div>
    </div>
  </div>
</div>

<div class="modal fade bs-example-modal-sm" id="bravoModal" tabindex="-1" role="dialog" aria-labelledby="bravoModal">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">TEBRİKLER</h4>
      </div>
      <div class="modal-body" style="background-color:#bed63a;color:white;">
      <img src="resimler/star.gif">
       <p class="alert alert-success">Bu bölümü tamamladık.<i id="hkartisayisi" class="badge"></i>  adet hareket bloğu kullandın.
       </p>
      </div>
    </div>
  </div>
</div>

<div class="modal fade bs-example-modal-sm" id="kodhataModal" tabindex="-1" role="dialog" aria-labelledby="kodhataModal">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Yazım-Syntax'da bir hata olabilir mi?</h4>
            </div>
            <div class="modal-body" style="background-color:#bed63a;color:white;">
                <img src="resimler/task.png"> Yazdığın <i></i>. kod satırında bir eksik olabilir mi? <br> Unutma ileri() sol() sağ() methodlarının yanına ; koymalısın.
                <br> döngü bloklarından sonra ise ; bulunmaz.
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 header" style="display: flex; justify-content: center; align-items: center; height: 100px; border-bottom: 4px solid #00a1e0;">
            <div class="col-sm-5 col-md-5 sol-header" id="logoo">
                <p style="color: white;font-weight: bold;font-size: 25px;color: white;margin-left: 10px; text-transform: uppercase;">Tavşanı Hedefine Ulaştır</p>
            </div>

            <div class="col-xs-5 col-sm-5 col-md-3 sol-header" style="margin-top: 10px; width: 600px; height: 100%; display: flex; flex-direction: column;justify-content: space-evenly; align-items: center;">
                <div>
                    <img src="resimler/task.png" width="20" alt="task">
                    <img src="resimler/task.png" width="20" alt="task">
                    <img src="resimler/task.png" width="20" alt="task">
                    <img src="resimler/task.png" width="20" alt="task">
                    <img src="resimler/task.png" width="20" alt="task">
                    <img src="resimler/task.png" width="20" alt="task">
                    <img src="resimler/task.png" width="20" alt="task">
                    <img src="resimler/task.png" width="20" alt="task">
                    <img src="resimler/task2.png" width="20" alt="task">
                </div>

                <div style="display:flex; justify-content: space-around;">
                    <a href="#" class="btn btn-sm btn-danger col-sm-4 baslatbuton" style="width: auto;">Başlat</a>
                    <a href="8.php" class="btn btn-info btn-sm col-sm-4" style="width: auto;margin-left: 5px;">Yeniden Dene</a>
                    <a href="#" class="btn btn-warning  btn-sm col-sm-4 temizlebuton" style="width: auto;margin-left: 5px;">Temizle</a>
                    <form action="dt2.php" method="POST">
                        <input type="submit" name="git8" id="git8" class="btn btn-success  btn-md col-sm-4 col-md-5 sonrakibuton hidden" style="padding: 5px 10px; font-size: 12px; width: auto;margin-left: 5px;" value="Sonraki Bölüm">
                    </form>
                </div>
                
                

            </div>

            <a href="../index.php" class="butonn">Ana Sayfa</a>
        </div>
    </div>

    <div class="row board" style="display:flex;justify-content: center; align-items:center; height:525px;">
        <div style="background-color: white; padding: 5px; border:10px solid orange; border-radius: 15px; display: flex; justify-content:center; align-items:center;">
            <p style="position: absolute;top: 125px;left: 130px;border-radius: 10px 10px 0px 0px;font-size: 20px;font-weight: bold;color: white;background-color: #fb8b00;padding: 2px 10px;">
                Seviye 8
            </p>
            <div class="col-xs-12 col-sm-6 col-md-6 playground " id="playground">
                <div class="row row1 marginsolyok">
                    <div id="row1col1" class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row1col1 kutu taslikutu" data-row="1" data-col="1" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row1col2 kutu taslikutu" data-row="1" data-col="2" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row1col3 kutu taslikutu" data-row="1" data-col="3" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row1col4 kutu taslikutu" data-row="1" data-col="4" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row1col5 kutu taslikutu" data-row="1" data-col="5" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row1col6 kutu taslikutu" data-row="1" data-col="6" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row1col7 kutu taslikutu" data-row="1" data-col="7" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row1col8 kutu taslikutu" data-row="1" data-col="8" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row1col9 kutu taslikutu" data-row="1" data-col="9" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row1col10 kutu taslikutu" data-row="1" data-col="10" data-tip=""></div>

                </div>

                <div class="row row2 marginsolyok">
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row2col1 kutu taslikutu" data-row="2" data-col="1" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row2col2 kutu " data-row="2" data-col="2" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row2col3 kutu " data-row="2" data-col="3" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row2col4 kutu" data-row="2" data-col="4" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row2col5 kutu hedef hedef1" data-row="2" data-col="5" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row2col6 kutu taslikutu" data-row="2" data-col="6" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row2col7 kutu tospaa tospaayeni don270" data-row="2" data-col="7" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row2col8 kutu " data-row="2" data-col="8" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row2col9 kutu" data-row="2" data-col="9" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row2col10 kutu taslikutu" data-row="2" data-col="10" data-tip=""></div>

                </div>

                <div class="row row3 marginsolyok">
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row3col1 kutu taslikutu" data-row="3" data-col="1" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row3col2 kutu " data-row="3" data-col="2" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row3col3 kutu " data-row="3" data-col="3" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row3col4 kutu " data-row="3" data-col="4" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row3col5 kutu " data-row="3" data-col="5" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row3col6 kutu " data-row="3" data-col="6" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row3col7 kutu" data-row="3" data-col="7" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row3col8 kutu" data-row="3" data-col="8" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row3col9 kutu " data-row="3" data-col="9" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row3col10 kutu taslikutu" data-row="3" data-col="10" data-tip=""></div>
                </div>

                <div class="row row4 marginsolyok">
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row4col1 kutu taslikutu" data-row="4" data-col="1" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row4col2 kutu " data-row="4" data-col="2" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row4col3 kutu" data-row="4" data-col="3" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row4col4 kutu " data-row="4" data-col="4" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row4col5 kutu " data-row="4" data-col="5" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row4col6 kutu " data-row="4" data-col="6" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row4col7 kutu " data-row="4" data-col="7" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row4col8 kutu  " data-row="4" data-col="8" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row4col9 kutu" data-row="4" data-col="9" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row4col10 kutu taslikutu" data-row="4" data-col="10" data-tip=""></div>

                </div>

                <div class="row row5 marginsolyok">
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row5col1 kutu taslikutu" data-row="5" data-col="1" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row5col2 kutu " data-row="5" data-col="2" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row5col3 kutu " data-row="5" data-col="3" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row5col4 kutu" data-row="5" data-col="4" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row5col5 kutu " data-row="5" data-col="5" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row5col6 kutu " data-row="5" data-col="6" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row5col7 kutu " data-row="5" data-col="7" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row5col8 kutu " data-row="5" data-col="8" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row5col9 kutu" data-row="5" data-col="9" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row5col10 kutu taslikutu" data-row="5" data-col="10" data-tip=""></div>

                </div>

                <div class="row row6 marginsolyok">
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row6col1 kutu taslikutu" data-row="6" data-col="1" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row6col2 kutu " data-row="6" data-col="2" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row6col3 kutu " data-row="6" data-col="3" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row6col4 kutu " data-row="6" data-col="4" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row6col5 kutu " data-row="6" data-col="5" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row6col6 kutu" data-row="6" data-col="6" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row6col7 kutu " data-row="6" data-col="7" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row6col8 kutu " data-row="6" data-col="8" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row6col9 kutu" data-row="6" data-col="9" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row6col10 kutu taslikutu" data-row="6" data-col="10" data-tip=""></div>

                </div>

                <div class="row row7 marginsolyok">
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row7col1 kutu taslikutu" data-row="7" data-col="1" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row7col2 kutu" data-row="7" data-col="2" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row7col3 kutu" data-row="7" data-col="3" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row7col4 kutu" data-row="7" data-col="4" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row7col5 kutu" data-row="7" data-col="5" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row7col6 kutu" data-row="7" data-col="6" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row7col7 kutu" data-row="7" data-col="7" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row7col8 kutu " data-row="7" data-col="8" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row7col9 kutu" data-row="7" data-col="9" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row7col10 kutu taslikutu" data-row="7" data-col="10" data-tip=""></div>
                </div>

                <div class="row row8 marginsolyok">
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row8col1 kutu taslikutu" data-row="8" data-col="1" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row8col2 kutu taslikutu" data-row="8" data-col="2" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row8col3 kutu taslikutu" data-row="8" data-col="3" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row8col4 kutu taslikutu" data-row="8" data-col="4" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row8col5 kutu taslikutu" data-row="8" data-col="5" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row8col6 kutu taslikutu" data-row="8" data-col="6" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row8col7 kutu taslikutu" data-row="8" data-col="7" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row8col8 kutu taslikutu" data-row="8" data-col="8" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row8col9 kutu taslikutu" data-row="8" data-col="9" data-tip=""></div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row8col10 kutu taslikutu" data-row="8" data-col="10" data-tip=""></div>
                </div>

            </div>
        </div>

        <div class="col-xs-4 col-sm-5 col-md-6 " style="background-color:white; padding: 15px 25px 15px 15px; margin-left:15px; width:auto; border-radius: 15px;">
                <div class="solfloat kodpanel padding0sol" style="height: 400px; width: 215px; overflow-y: scroll; overflow-x: hidden;">
                    <div class="row row1 marginsolyok">
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row1col1 kutu2" data-row="1" data-col="1" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row1col2 kutu2" data-row="1" data-col="2" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row1col3 kutu2" data-row="1" data-col="3" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row1col4 kutu2" data-row="1" data-col="4" data-tipi=""></div>


                    </div>

                    <div class="row row2 marginsolyok">
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row2col1 kutu2" data-row="2" data-col="1" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row2col2 kutu2" data-row="2" data-col="2" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row2col3 kutu2" data-row="2" data-col="3" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row2col4 kutu2" data-row="2" data-col="4" data-tipi=""></div>

                    </div>

                    <div class="row row3 marginsolyok">
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row3col1 kutu2" data-row="3" data-col="1" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row3col2 kutu2" data-row="3" data-col="2" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row3col3 kutu2" data-row="3" data-col="3" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row3col4 kutu2" data-row="3" data-col="4" data-tipi=""></div>


                    </div>

                    <div class="row row4 marginsolyok">
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row4col1 kutu2" data-row="4" data-col="1" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row4col2 kutu2" data-row="4" data-col="2" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row4col3 kutu2" data-row="4" data-col="3" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row4col4 kutu2" data-row="4" data-col="4" data-tipi=""></div>

                    </div>

                    <div class="row row5 marginsolyok">
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row5col1 kutu2" data-row="5" data-col="1" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row5col2 kutu2" data-row="5" data-col="2" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row5col3 kutu2" data-row="5" data-col="3" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row5col4 kutu2" data-row="5" data-col="4" data-tipi=""></div>


                    </div>

                    <div class="row row6 marginsolyok">
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row6col1 kutu2" data-row="6" data-col="1" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row6col2 kutu2" data-row="6" data-col="2" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row6col3 kutu2" data-row="6" data-col="3" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row6col4 kutu2" data-row="6" data-col="4" data-tipi=""></div>


                    </div>

                    <div class="row row7 marginsolyok">
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row7col1 kutu2" data-row="7" data-col="1" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row7col2 kutu2" data-row="7" data-col="2" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row7col3 kutu2" data-row="7" data-col="3" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row7col4 kutu2" data-row="7" data-col="4" data-tipi=""></div>


                    </div>

                    <div class="row row8 marginsolyok">
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row8col1 kutu2" data-row="8" data-col="1" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row8col2 kutu2" data-row="8" data-col="2" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row8col3 kutu2" data-row="8" data-col="3" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row8col4 kutu2" data-row="8" data-col="4" data-tip=""></div>

                    </div>

                    <div class="row row9 marginsolyok">
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row9col1 kutu2" data-row="9" data-col="1" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row9col2 kutu2" data-row="9" data-col="2" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row9col3 kutu2" data-row="9" data-col="3" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row9col4 kutu2" data-row="9" data-col="4" data-tip=""></div>

                    </div>

                    <div class="row row10 marginsolyok">
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row10col1 kutu2" data-row="10" data-col="1" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row10col2 kutu2" data-row="10" data-col="2" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row10col3 kutu2" data-row="10" data-col="3" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row10col4 kutu2" data-row="10" data-col="4" data-tip=""></div>

                    </div>
                    <div class="row row11 marginsolyok">
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row11col1 kutu2" data-row="11" data-col="1" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row11col2 kutu2" data-row="11" data-col="2" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row11col3 kutu2" data-row="11" data-col="3" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row11col4 kutu2" data-row="11" data-col="4" data-tip=""></div>

                    </div>

                    <div class="row row12 marginsolyok">
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row12col1 kutu2" data-row="12" data-col="1" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row12col2 kutu2" data-row="12" data-col="2" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row12col3 kutu2" data-row="12" data-col="3" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row12col4 kutu2" data-row="12" data-col="4" data-tip=""></div>

                    </div>

                    <div class="row row13 marginsolyok">
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row13col1 kutu2" data-row="13" data-col="1" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row13col2 kutu2" data-row="13" data-col="2" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row13col3 kutu2" data-row="13" data-col="3" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row13col4 kutu2" data-row="13" data-col="4" data-tip=""></div>

                    </div>

                    <div class="row row14 marginsolyok">
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row14col1 kutu2" data-row="14" data-col="1" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row14col2 kutu2" data-row="14" data-col="2" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row14col3 kutu2" data-row="14" data-col="3" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row14col4 kutu2" data-row="14" data-col="4" data-tip=""></div>

                    </div>

                    <div class="row row15 marginsolyok">
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row15col1 kutu2" data-row="15" data-col="1" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row15col2 kutu2" data-row="15" data-col="2" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row15col3 kutu2" data-row="15" data-col="3" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row15col4 kutu2" data-row="15" data-col="4" data-tip=""></div>

                    </div>

                    <div class="row row16 marginsolyok">
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row16col1 kutu2" data-row="16" data-col="1" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row16col2 kutu2" data-row="16" data-col="2" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row16col3 kutu2" data-row="16" data-col="3" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row16col4 kutu2" data-row="16" data-col="4" data-tip=""></div>

                    </div>

                    <div class="row row17 marginsolyok">
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row17col1 kutu2" data-row="17" data-col="1" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row17col2 kutu2" data-row="17" data-col="2" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row17col3 kutu2" data-row="17" data-col="3" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row17col4 kutu2" data-row="17" data-col="4" data-tip=""></div>

                    </div>

                    <div class="row row18 marginsolyok">
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row18col1 kutu2" data-row="18" data-col="1" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row18col2 kutu2" data-row="18" data-col="2" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row18col3 kutu2" data-row="18" data-col="3" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row18col4 kutu2" data-row="18" data-col="4" data-tip=""></div>

                    </div>

                    <div class="row row19 marginsolyok">
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row19col1 kutu2" data-row="19" data-col="1" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row19col2 kutu2" data-row="19" data-col="2" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row19col3 kutu2" data-row="19" data-col="3" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row19col4 kutu2" data-row="19" data-col="4" data-tip=""></div>

                    </div>

                    <div class="row row20 marginsolyok">
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row20col1 kutu2" data-row="20" data-col="1" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row20col2 kutu2" data-row="20" data-col="2" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row20col3 kutu2" data-row="20" data-col="3" data-tipi=""></div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 row20col4 kutu2" data-row="20" data-col="4" data-tip=""></div>

                    </div>

                </div>

                <div class="solfloat metinkodu padding5sag visible-md-block visible-lg-block" style="margin-left: 15px;">
                    <textarea disabled rows="15" cols="20" id="texteditor" name="metineditor" style="resize: none; height: 400px; margin-left:15px"></textarea>
                    <!-- onkeypress="process(event, this)" -->
                </div>
                

                <div class="solfloat cozum" style="width: 55px; padding-left: 14px;margin: 1px; display: flex; flex-direction: column; justify-content: flex-start;">

                    <h6 style="width: 50px; text-align: center; font-weight:bold;">Hareket Blokları</h6>
                    <div class="buton2 ileri pull-left" data-tip="ileri"></div>
                    <div class="buton2 sol pull-left" data-tip="sol"></div>
                    <div class="buton2 sag pull-left" data-tip="sag"></div>
                    <div style="display: flex; flex-direction: column; justify-content: flex-start; margin-top: 4px;">
                        <h6 style="width: 50px; text-align: center; font-weight:bold;">Koşul Blokları</h6>
                        <div class="buton2 eger pull-left" data-tip="egertasvarsa"></div>
                        <div class="buton2 egertasyoksa pull-left" data-tip="egertasyoksa"></div>
                    </div>
                    
                </div>
                <div class="solfloat cozum " style="padding-left: 14px; margin: 1px; width: 55px; display: flex; flex-direction: column; justify-content: flex-start;">
                    <h6 style="width: 50px; text-align: center; font-weight:bold;">Döngü Blokları</h6>
                    <div class="buton2 dongu pull-left" data-tip="dongu"></div>
                    <div class="buton2 dongu2 pull-left" data-tip="dongu2"></div>
                    <div class="buton2 dongu3 pull-left" data-tip="dongu3"></div>
                    <div class="buton2 dongu4 pull-left" data-tip="dongu4"></div>
                    <div class="buton2 dongu5 pull-left" data-tip="dongu5"></div>
                    <div class="buton2 donguson pull-left" data-tip="donguson"></div>
                </div>
                
        </div>


    </div>
</div>

<div style="background-color: black; height: 20vh; display: flex; flex-direction: column; justify-content: center; align-items: center;">
    <p style="font-size: 20px; font-weight: bold;color: white; margin: 0px;">Hüseyin Taşkın 100219023</p>
    <p style="font-size: 20px; font-weight: bold;color: white; margin: 0px;">Yalçın Arslan 100219030</p>
    <p style="font-size: 20px; font-weight: bold; color: white;margin: 0px;">Yaren Can 100219028</p>
</div>

<script type="text/javascript" language="JavaScript">


</script>



</body>
</html>
