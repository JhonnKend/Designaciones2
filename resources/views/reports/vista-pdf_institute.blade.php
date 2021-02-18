<div class="row">
    <div class="col-md-12">
        <img src="img/head.png" alt="" width="800px">   
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <center>
            <h3>SERVICIO DEPARTAMENTAL DE SALUD</h3>
            <h3>GOBIERNO AUTONOMO DEPARTAMENTAL DE POTOSI</h3>
            <h3>SERVICIO DEPARTAMENTAL DE SALUD POTOSI</h3>
        </center>        
    </div>
</div> <br>
<div class="row numero">
    <div class="col-md-12">
        <label for="">Nº ASIGNADO: {{ $dates->id }}</label>
    </div>
</div> <br>
<div class="row numero2">
    <div class="col-md-12">
        <label for="">EL <text>SERVICIO DEPARTAMENTAL DE SALUD POTOSI</text> (SEDES), emite la presente:</label>
    </div>
</div>
<div class="row title_credential">
    <div class="col-md-12">
        <h1>CREDENCIAL</h1>
    </div>
</div>
<div class="row margin">
    <div class="col-md-12">
        Al interno(a): {{ strtoupper($dates->name) }} {{ strtoupper($dates->ap_pat) }} {{ strtoupper($dates->ap_mat) }}
    </div>
</div>
<div class="row margin">
    <div class="col-md-12">
        Insituto: {{ strtoupper($dates->name_institute) }}
    </div>
</div>
<div class="row margin">
    <div class="col-md-12">
        Carrera: {{ strtoupper($dates->name_career) }}
    </div>
</div>
<div class="row margin text-just">
    <div class="col-md-12">
        Quien debe realizar el  <text>SERVICIO SOCIAL RURAL OBLIGATORIO (S.S.R.O), </text> dando cumplimiento al Decreto Supremo No 26271 Art. 4, por el tiempo de 3 meses del {{ strtoupper($dat) }} AL {{ strtoupper($dat1) }}.
    </div>
</div>
<div class="row margin text-just">
    <div class="col-md-12">
        Habiendo sido asignado al Establecimiento de Salud:
    </div>
</div>
<div class="row center-now">
    <div class="col-md-12">
        <h4>{{ strtoupper($dates->name_estable_salud) }}</h4>
    </div>
</div>
<div class="row margin text-just">
    <div class="col-md-12">
        Del Municipio:
    </div>
</div>
<div class="row center-now">
    <div class="col-md-12">
        <h4>{{ strtoupper($dates->name_municipality) }}</h4>
    </div>
</div>
<div class="row margin text-just">
    <div class="col-md-12">
        Perteneciente a la Red de Servicios de Salud: 
    </div>
</div>
<div class="row center-now">
    <div class="col-md-12">
        <h4>{{ strtoupper($dates->name_red) }}</h4>
    </div>
</div>
<div class="row footer_firm">
    <div class="col-md-12">
        Juan Eddy Salguero Gómez
    </div>
</div>
<div class="row footer_firm2">
    <div class="col-md-12">
        DIRECTOR TECNICO SEDES POTOSI
    </div>
</div>
<div class="row footer_firm1">
    <div class="col-md-12">
        Potosi {{ $dat2 }}
    </div>
</div>
<style>
    *{margin:0;padding:0}
    .numero{
        text-align: right;
        margin-right: 100px;
    }
    .numero2{
        margin-left: 100px;
        font-size: 15px;
        font-style: italic;
    }
    .numero2 text{
        font-weight: bold;
    }
    .title_credential{
        color: rgb(31, 56, 100);
        font-style: italic;
        text-align: center;
        margin-top: 20px;
    }
    .margin{
        margin-top:20px;
        margin-left: 100px;
        margin-right: 70px;
    }
    .text-just{
        text-align : justify;
        font-style: italic;
    }
    .text-just text{
        font-weight: bold;
    }
    .center-now{
        text-align:center;
        margin-top: 20px;
    }
    .footer_firm{
        text-align: center;
        margin-top: 150px;
    }
    .footer_firm2{
        text-align: center;        
    }
    .footer_firm1{
        margin-top: 30px;
        text-align: center;        
    }
</style>