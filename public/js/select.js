$(function(){    
    $('.load_url').click(function(){
        $("#global_content").html('')
        $("#global_content").load($(this).attr('href'))
        return false;
    });  
    $(document).on('change','.guardar_cupos',function(e){
        alert($(this).attr("val"))
        var cant = $(this).attr("value");
        var res = $(this).attr("name").split("_");
        var id_es =  $('input[name=id_'+res[1]+']').val();        
        var ges =  $('input[name=ges_'+res[1]+']').val();        
        var per =  $('input[name=per_'+res[1]+']').val();        
        console.log(res)
        alert($(this).attr("name"))
        e.preventDefault(e)
        $.ajax({
        	type:'POST',
        	url:'guardar_cupos',
        	data:{cant,id_es,ges,per,_token:$('meta[name="csrf-token"]').attr('content')},
        	success:function(data){
                $('#medical_center').append('<option>--Seleccione--</option>');
                for(var i = 0; i < data.length; i++){
                    $('#medical_center').append('<option value=' + data[i].id + '>' + data[i].name_estable_salud + '</option>');
                }
                return false;
        	},
        	error:function(data){
        	}
        })
    })
    $(document).on('submit','.load_medical_centers',function(e){
        var formData = new FormData($(this)[0]);
        frutas = []
        $('.name_form').each(function(){
            aux = $(this).attr("name")
            frutas.push(aux)
        })
        $.ajaxSetup({
            header:$('meta[name="_token"]').attr('content')
        })
        e.preventDefault(e)
        $.ajax({
            type:$(this).attr('method'),
            url:$(this).attr('action'),
            data:formData,
            contentType: false,
            processData: false,
            success:function(data){                
                $("#load_table_list").html(data)                                   
            },
            error:function(data){
                function_error(data)
            }
        })
    })
    $(document).on('click','.start_load_url',function(e){
        e.preventDefault(e)
        $.ajax({
        	type:'POST',
        	url:$(this).attr('href'),
        	data:{_token:$('meta[name="csrf-token"]').attr('content')},
        	success:function(data){
                $("#global_content").html(data)
                return false;
        	},
        	error:function(data){
        	}
        })
    });
    $(document).on('change','.load_medical_center_qoutas',function(e){
        $('#medical_center option').remove();
        e.preventDefault(e)
        $.ajax({
        	type:'POST',
        	url:'load_medical_center_qoutas',
        	data:{id:$(this).find(":selected").val(),_token:$('meta[name="csrf-token"]').attr('content')},
        	success:function(data){
                $('#medical_center').append('<option>--Seleccione--</option>');
                for(var i = 0; i < data.length; i++){
                    $('#medical_center').append('<option value=' + data[i].id + '>' + data[i].name_estable_salud + '</option>');
                }
                return false;
        	},
        	error:function(data){
        	}
        })
    })
    $(document).on('change','.load_career_faculties',function(e){
        $('#select_careers option').remove();
        e.preventDefault(e)
        $.ajax({
        	type:'POST',
        	url:'load_faculty_careers',
        	data:{id:$(this).find(":selected").val(),_token:$('meta[name="csrf-token"]').attr('content')},
        	success:function(data){
                $('#select_careers').append('<option>--Seleccione--</option>');
                for(var i = 0; i < data.length; i++){
                    $('#select_careers').append('<option value=' + data[i].id + '>' + data[i].name_career + '</option>');
                }
                return false;
        	},
        	error:function(data){
        	}
        })
    });
    $(document).on('click','.load_uni_student',function(e){
        e.preventDefault(e)
        $.ajax({
        	type:'POST',
        	url:'load_uni',
        	data:{_token:$('meta[name="csrf-token"]').attr('content')},
        	success:function(data){
                $(".message_load").remove();
                $("#load_uni_inti").html(data)
                return false;
        	},
        	error:function(data){
        	}
        })
    });
    $(document).on('click','.load_inti_student',function(e){
        e.preventDefault(e)
        $.ajax({
        	type:'POST',
        	url:'load_insti',
        	data:{_token:$('meta[name="csrf-token"]').attr('content')},
        	success:function(data){
                $(".message_load").remove();
                $("#load_uni_inti").html(data)
                return false;
        	},
        	error:function(data){
        	}
        })
    });
    $(document).on('change','.charge_career_institutes',function(e){
        console.log("load career for the institute")
        $('#select_careers_insti option').remove();
        $.ajax({
            type:'POST',
            url:'/charge_career_institutes',
            data:{id:$(this).find(":selected").val(),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                console.log(data)
                $('#select_careers_insti').append('<option>--Seleccione--</option>');
                for(var i = 0; i < data.length; i++){
                    console.log(data[i].name_career)
                    $('#select_careers_insti').append('<option value=' + data[i].id + '>' + data[i].name_career + '</option>');
                }
            },
            error:function(data){
            }
        })
    });
    $(document).on('change','.charge_career_insti',function(e){
        $('#career_insti option').remove();
        $.ajax({
            type:'POST',
            url:'/charge_career_insti',
            data:{id:$(this).find(":selected").val(),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $('#career_insti').append('<option>--Seleccione--</option>');
                for(var i = 0; i < data.length; i++){
                    $('#career_insti').append('<option value=' + data[i].id + '>' + data[i].name_institute + '</option>');
                }
            },
            error:function(data){
            }
        })
    });
    $(document).on('change','.charge_faculties',function(e){
        $('.delete_fa option').remove();
        //$('.load_carrer_inti').prop('disabled', true);
        $.ajax({
            type:'POST',
            url:'/charge_faculties',
            data:{id:$(this).find(":selected").val(),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $('#id_faculties').append('<option>--Seleccione--</option>');
                for(var i = 0; i < data.length; i++){
                    $('#id_faculties').append('<option value=' + data[i].id + '>' + data[i].name_faculty + '</option>');
                }
            },
            error:function(data){
            }
        })
    });
    //Para cargar Universidades
    $(document).on('change','.charge_university',function(e){
        $('.delete_option option').remove();
        $('#id_faculties option').remove();
        $('#id_faculties').append('<option>  No hay Facultades  </option>');

        //$('.load_carrer_inti').prop('disabled', true);
        $.ajax({
            type:'POST',
            url:'/charge_university',
            data:{id:$(this).find(":selected").val(),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $('#university').append('<option>--Seleccione--</option>');
                for(var i = 0; i < data.length; i++){
                    $('#university').append('<option value=' + data[i].id + '>' + data[i].name_university + '</option>');
                }
            },
            error:function(data){
            }
        })
    });
    $(document).on('click','.show_function',function(e){
        //alert($(this).attr('href'))
        e.preventDefault(e)
        $.ajax({
        	type:'POST',
        	url:$(this).attr('href'),
        	data:{id:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
        	success:function(data){
                $("#global_content").html(data)
                return false;
        	},
        	error:function(data){
        	}
        })
    });
    $(document).on('click','.load_students_view',function(e){
        console.log('asdsadsad')
        e.preventDefault(e)
        $.ajax({
        	type:'POST',
        	url:$(this).attr('href'),
        	data:{id:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
        	success:function(data){
                $(".aqui_cargar").html(data)
                return false;
        	},
        	error:function(data){
        	}
        })
    });
    $(document).on('click','.button_back',function(e){
        e.preventDefault(e)
        $.ajax({
        	type:'GET',
        	url:$(this).attr('href'),
        	data:{},
        	success:function(data){
                $("#global_content").html(data)
                return false;
        	},
        	error:function(data){
        	}
        })
    });
    $(document).on('click','.edit_function',function(e){
        e.preventDefault(e)
        $.ajax({
        	type:'POST',
        	url:$(this).attr('href'),
        	data:{id:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
        	success:function(data){
                $("#global_content").html(data)
                return false;
        	},
        	error:function(data){
        	}
        })
    });
    $(document).on('click','.delete_function',function(e){
        e.preventDefault(e)
        $.ajax({
        	type:'POST',
        	url:$(this).attr('href'),
        	data:{id:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
        	success:function(data){
                $("#global_content").html(data)
                return false;
        	},
        	error:function(data){
        	}
        })
    });
    $(document).on('submit','.save_date',function(e){
        var formData = new FormData($(this)[0]);
        frutas = []
        $('.name_form').each(function(){
            aux = $(this).attr("name")
            frutas.push(aux)
        })
        $.ajaxSetup({
            header:$('meta[name="_token"]').attr('content')
        })
        e.preventDefault(e)
        $.ajax({
            type:$(this).attr('method'),
            url:$(this).attr('action'),
            data:formData,
            contentType: false,
            processData: false,
            success:function(data){                
                $("#global_content").html(data)                                   
            },
            error:function(data){
                function_error(data)
            }
        })
    })
    $(document).on('submit','.save_dates',function(e){
        var formData = new FormData($(this)[0]);
        frutas = []
        $('.name_form').each(function(){
            aux = $(this).attr("name")
            frutas.push(aux)
        })
        $.ajaxSetup({
            header:$('meta[name="_token"]').attr('content')
        })
        e.preventDefault(e)
        $.ajax({
            type:$(this).attr('method'),
            url:$(this).attr('action'),
            data:formData,
            contentType: false,
            processData: false,
            success:function(data){                
                $(".aqui_cargar").html(data)                                   
            },
            error:function(data){
                function_error(data)
            }
        })
    })
    $(document).on('click','.click_charge_button',function(e){
        e.preventDefault(e)
        $.ajax({
        	type:'GET',
        	url:$(this).attr('href'),
        	data:{},
        	success:function(data){
                $("#global_content").html(data)
                return false;
        	},
        	error:function(data){
        	}
        })
    });
    $(document).on('change','#department_prov',function(e){
        $('.clear_options option').remove();
        $('.clear_options option').remove();
        $('.clear_options_prov option').remove();
        $('.delete_u option').remove();
        $('.delete_u').append('<option>  No hay Universidades  </option>');
        $('.option_default option').remove();
        $('.option_default').append('<option>  No hay Facultades  </option>');
        $('#municipalities').append('<option>  No hay Municipios  </option>');
        $('#career_insti').append('<option>  No hay Institutos  </option>');
        $('#medical_center').append('<option>  No hay Centros Medicos  </option>');
        
        e.preventDefault(e)
        $.ajax({
        	type:'POST',
        	url:'/load_prov',
        	data:{id:$(this).find(":selected").val(),_token:$('meta[name="csrf-token"]').attr('content')},
        	success:function(data){
                let array = data
                if (data.length > 0){
                    $('#provinces').append('<option>--  Seleccione  --</option>');
                    for(var i = 0; i < array.length; i++){
                        $('#provinces').append('<option value=' + array[i].id + '>' + array[i].name_province + '</option>');
                    }
                } else {
                    $('#provinces').append('<option>--  No hay Provincias  --</option>');
        		}
        	},
        	error:function(data){
        	}
        })
    });
    //para cargar provincias
    $(document).on('change','#provinces',function(e){
        $('.clear_options_prov option').remove();
        $('#university option').remove();
        $('#university').append('<option>--  No hay Universidades  --</option>');
        $('#id_faculties option').remove();
        $('#id_faculties').append('<option>--  No hay Facultades  --</option>');
        $('#career_insti option').remove();
        $('#career_insti').append('<option>--  No hay Institutos  --</option>');
        $('#medical_center option').remove();
        $('#medical_center').append('<option>  No hay Centros Medicos  </option>');
        e.preventDefault(e)
        $.ajax({
        	type:'POST',
        	url:'/load_prov_muni',
        	data:{id:$(this).find(":selected").val(),_token:$('meta[name="csrf-token"]').attr('content')},
        	success:function(data){
                let array = data
                if (data.length > 0){
                    $('#municipalities').append('<option>--  Seleccione  --</option>');
                    for(var i = 0; i < array.length; i++){
                        $('#municipalities').append('<option value=' + array[i].id + '>' + array[i].name_municipality + '</option>');
                    }
                } else {
                    $('#municipalities').append('<option>--  No hay Municipios  --</option>');
        		}
        	},
        	error:function(data){
        	}
        })
    });
    $(document).on('change','#departamento',function(e){
    	$('.delete_uni option').remove();
        $('.delete_inst option').remove();
        $('.delete_u option').remove();
        $('.load_carrer_inti').prop('disabled', false);
        $('.load_carrer_uni').prop('disabled', false);
        e.preventDefault(e)
        $.ajax({
        	type:'POST',
        	url:'/cargar',
        	data:{id:$(this).find(":selected").val(),_token:$('meta[name="csrf-token"]').attr('content')},
        	success:function(data){
        		console.log(data.insti)
                let array = data.univ
                let array1 = data.insti
                $('#universidad').append('<option>--Seleccione--</option>');
        		for(var i = 0; i < array.length; i++){
        			$('#universidad').append('<option value=' + array[i].id + '>' + array[i].nombre + '</option>');
        		}
                $('#instituto').append('<option>--Seleccione--</option>');
                for(var i = 0; i < array1.length; i++){
                    $('#instituto').append('<option value=' + array1[i].id + '>' + array1[i].nombre + '</option>');
                }
        	},
        	error:function(data){
        	}
        })
    });
    $(document).on('change','.load_carrer_uni',function(e){
        $('.delete_carrera option').remove();
        $('.load_carrer_inti').prop('disabled', true);
        $.ajax({
            type:'POST',
            url:'/cargar_carrera_uni',
            data:{id:$(this).find(":selected").val(),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                console.log(data.length)
                $('#carrera').append('<option>--Seleccione--</option>');
                for(var i = 0; i < data.length; i++){
                    $('#carrera').append('<option value=' + data[i].id + '>' + data[i].nombre + '</option>');
                }
            },
            error:function(data){
            }
        })
    })
    $(document).on('change','.load_carrer_inti',function(e){
        alert('load_insti')
        $('.load_carrer_uni').prop('disabled', true);
        $.ajax({
            type:'POST',
            url:'/cargar',
            data:{id:$(this).find(":selected").val(),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){

            },
            error:function(data){
            }
        })
    })
    //Funcion para borrar las clases de errores
    $(document).on('change','.change_select',function(e){
        $("select[name='"+$(this).attr('name')+"']").removeClass("is-invalid")
        $("select[name='"+$(this).attr('name')+"']").parent().find("small").text('')
        $("input[name='"+$(this).attr('name')+"']").removeClass("is-invalid")
        $("input[name='"+$(this).attr('name')+"']").parent().find("small").text('')
        $('#error_character').text('')
        $('#id_periodo').text('')
    });
    function function_error(data){        
        var asd = Object.keys(data.responseJSON.errors)
        if(data.responseJSON.errors.type_uni_inst){
            $('#error_choose_education_center').text(data.responseJSON.errors.type_uni_inst[0])
        }
        if(data.responseJSON.errors.character){
            $('#error_character').text(data.responseJSON.errors.character[0])
        }
        if(data.responseJSON.errors.id_periodo){
            $('#id_periodo').text(data.responseJSON.errors.id_periodo[0])
        }
        for(i = 0; i<frutas.length; i++){
            if(asd.includes(frutas[i])) {                
                $( "select[name='"+frutas[i]+"']" ).parent().find("small").text(data.responseJSON.errors[frutas[i]][0])
                $( "input[name='"+frutas[i]+"']" ).parent().find("small").text(data.responseJSON.errors[frutas[i]][0])                
                $( "input[name='"+frutas[i]+"']" ).addClass("is-invalid")
                $( "select[name='"+frutas[i]+"']" ).addClass("is-invalid")
            }else{
                $( "input[name='"+frutas[i]+"']" ).parent().find("small").text('')
                $( "select[name='"+frutas[i]+"']" ).parent().find("small").text('')
                $( "input[name='"+frutas[i]+"']" ).removeClass("is-invalid")
                $( "select[name='"+frutas[i]+"']" ).removeClass("is-invalid")
            }
        }
    }
});