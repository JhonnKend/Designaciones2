<div class="row">
    <div class="col-md-12">
        <img src="img/head_memo.png" alt="" width="800px">   
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="arriba">
        </div>
        <div class="medio"></div>
        <div class="part-one">
            <p>MINISTERIO DE SALUD </p>
            <p>SERVICIO DEPARTAMENTAL DE SALUD</p>
            <p>POTOSI - BOLIVIA</p>
        </div>
        <div class="footer_part_one">
            <label for="">Potosí, {{ $dat2 }}</label>
        </div>
    </div>
</div>
<div class="row part-two">
    <div class="col-md-12">
        <div class="text-rigt">
            Nº {{ $dates->id }} - H/18
        </div>
        <div class="name">
            Señor:
        </div>
        <div class="name_student">
            <p> {{ strtoupper($dates->name) }} {{ strtoupper($dates->ap_pat) }} {{ strtoupper($dates->ap_mat) }} </p> <text> CI: {{ $dates->ci }} {{ $dates->exp }}</text>
        </div> <br>
        <div class="name_medical" style="color:#fff">
            {{ strtoupper($dates->name_estable_salud) }}
        </div>
        <div class="presente">
            Presente.-
        </div>
    </div>
</div>
<div class="part_tree">
    <div class="row">
        <div class="col-md-12">
            Señor:
        </div>
    </div>
    <div class="row abajo">
        <div class="col-md-12">
            <p>
            Por disposición del director, Jefatura de planificación y Proyectos, Área de Capacitación y Acreditación Profesional del Servicio Departamental de Salud Potosí, Tenemos el agrado de comunicarle que en cumplimiento del <b>Decreto Supremo 26217</b> del <b>SERVICIO SOCIAL DE SALUD OBLIGATORIO</b>, Ud. ha sido designado como <b>INTERNO (A) DE {{ strtoupper($dates->name_type) }}</b> al Centro de Salud   <b>"{{ strtoupper($dates->name_estable_salud) }}"</b> del municipio de {{ strtoupper($dates->name_municipality) }} perteneciente a la Coordinación de Red <b> {{ strtoupper($dates->name_red) }} </b> , por el lapso de TRES MESES a partir de la fecha.
            </p>
        </div>
    </div>
    <div class="mas-abajo">
        <p>Con este motivo y deseándole éxitos, saludamos a Ud. Atentamente.</p>
    </div>
</div>
<div class="row firmas">
    <div class="col-md-3">
        @if(isset($autoridad))
        <p>{{ $autoridad->nombre_autoridad }}</p>   
        <p> <b>{{ $autoridad->cargo_autoridad }}</b> </p>     
        @else
        <p>Registre Autoridad</p>
        @endif        
    </div>
    <div class="col-md-6">
        @if(isset($autoridad1))
        <p>{{ $autoridad1->nombre_autoridad }}</p>        
        @else
        <p>Registre Autoridad</p>
        @endif
        <p> <b>{{ $autoridad1->cargo_autoridad }}</b> </p>  
    </div>
</div>
<div class="row firmass">
    <div class="col-md-1">
        @if(isset($autoridad2))
            <p>Vº.Bº {{ $autoridad2->nombre_autoridad }}</p>        
        @else
        <p>Registre Autoridad</p>
        @endif
        <p> <b>{{ $autoridad2->cargo_autoridad }}</b> </p>  
    </div>
</div>
<style>
    *{margin:0;padding:0}
    .text-rigt{
        text-align: right;
    }
    .arriba{
        margin-left: 110px;
        width: 600px;
        border-top: 1px solid #000;
        height: 150px;
        border-bottom: 1px solid #000;
    }
    .medio{
        border-left: 1px solid #000;
        height: 150px;
        margin-left: 410px;
        margin-top: -181px;
    }
    .part-one{
        text-align: center;
        width: 300px;
        font-size: 15px;
        margin-left: 82;
        margin-top: -120px;
    }
    .footer_part_one{
        margin-top: 45px;
        margin-left: 120px;
    }
    .part-two{
        height: 130px;
        width: 280px;
        margin-left: 420px;
        margin-top: -140px;
    }
    .name_student{
        width: 280px;
        height: 20px;
    }
    .name_student texts{
        margin-left: 180px;
        text-align: right;
        margin-top: -10px;
    }
    .name_medical{
        font-size: 15px;
        text-align : justify;
    }
    .part_tree{
        text-align: justify;
        margin-top: 50px;
        width: 620px;
        margin-left: 110px;
    }
    .abajo{
        margin-top: 20px;
    }
    .mas-abajo{
        margin-top:20px;
    }
    .firmas{
        margin-left: 110px;
        width: 620px;
        font-size: 13px;
        margin-top: 150px;
    }
    .col-md-3{
        width: 310px;
        text-align: center;
    }
    .col-md-6{
        width: 310px;
        margin-left: 310px;
        margin-top: -150px;
        text-align: center;
    }
    .firmass{
        margin-left: 110px;
        width: 620px;
        font-size: 13px;
        margin-top: 110px;
        text-align: center;
    }
</style>