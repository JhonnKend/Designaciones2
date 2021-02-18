<?php

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
//Configuracion para usar el middleware de los roles en las rutas
Route::middleware(['auth'])->group(function(){
    //Rutas para manejar los roles del sistema
    Route::get('roles','RoleController@index')->name('index_roles')->middleware('permission:index_roles');
    Route::get('create_roles','RoleController@create')->name('create_roles')->middleware('permission:create_roles');
    Route::post('store_roles','RoleController@store')->name('store_roles')->middleware('permission:store_roles');
    Route::post('delete_role','RoleController@delete')->name('delete_role')->middleware('permission:delete_roles');
    Route::post('show_role','RoleController@show')->name('show_role')->middleware('permission:show_roles');
    Route::post('edit_role','RoleController@edit')->name('edit_role')->middleware('permission:edit_roles');
    Route::post('update_role/{role}','RoleController@update')->name('update_role')->middleware('permission:update_roles');
    /*Route::get('roles','RoleController@index')->name('index_roles');
    Route::get('create_roles','RoleController@create')->name('create_roles');
    Route::post('store_roles','RoleController@store')->name('store_roles');
    Route::post('delete_role','RoleController@delete')->name('delete_role');
    Route::post('show_role','RoleController@show')->name('show_role');
    Route::post('edit_role','RoleController@edit')->name('edit_role');
    Route::post('update_role/{role}','RoleController@update')->name('update_role');*/
    //Fin Rutas para los roles del sistema

    //Rutas para Usuarios
    Route::get('users','UserController@index')->name('index_users')->middleware('permission:index_users');
    Route::get('create_users','UserController@create')->name('create_users')->middleware('permission:create_users');
    Route::post('delete_users','UserController@delete')->name('delete_users')->middleware('permission:delete_users');
    Route::post('edit_users','UserController@edit')->name('edit_users')->middleware('permission:edit_users');
    Route::post('show_users','UserController@show')->name('show_users')->middleware('permission:show_users');
    Route::post('store_users','UserController@store')->name('store_users')->middleware('permission:store_users');
    Route::post('update_user/{user}','UserController@update')->name('update_user')->middleware('permission:update_users');
    /*Route::get('users','UserController@index')->name('index_users');
    Route::get('create_users','UserController@create')->name('create_users');
    Route::post('delete_users','UserController@delete')->name('delete_users');
    Route::post('edit_users','UserController@edit')->name('edit_users');
    Route::post('show_users','UserController@show')->name('show_users');
    Route::post('store_users','UserController@store')->name('store_users');
    Route::post('update_user/{user}','UserController@update')->name('update_user');*/

    //Rutas para Estudiantes
    Route::get('students','StudentController@index')->name('index_students')->middleware('permission:index_students');
    Route::get('create_students','StudentController@create')->name('create_students')->middleware('permission:create_students');
    Route::post('delete_students','StudentController@delete_students')->name('delete_students')->middleware('permission:delete_students');
    Route::post('edit_students','StudentController@edit_students')->name('edit_students')->middleware('permission:edit_students');
    Route::post('show_students','StudentController@show_students')->name('show_students')->middleware('permission:show_students');
    Route::post('store_students','StudentController@store_students')->name('store_students')->middleware('permission:store_students');
    Route::post('update_students/{user}','StudentController@update_students')->name('update_students')->middleware('permission:update_students');

    //Rutas para departamentos...
    Route::get('departments','ConguracionController@index_departments')->name('index_departments')->middleware('permission:index_departments');
    Route::get('create_departments','ConguracionController@create_departments')->name('create_departments')->middleware('permission:create_departments');
    Route::post('store_departments','ConguracionController@store_departments')->name('store_departments')->middleware('permission:store_departments');
    Route::post('delete_departments','ConguracionController@delete_departments')->name('delete_departments')->middleware('permission:delete_departments');
    Route::post('show_departments','ConguracionController@show_departments')->name('show_departments')->middleware('permission:show_departments');
    Route::post('edit_departments','ConguracionController@edit_departments')->name('edit_departments')->middleware('permission:edit_departments');
    Route::post('update_departments/{departamento}','ConguracionController@update_departments')->name('update_departments')->middleware('permission:update_departments');

    //Rutas para Provincias
    Route::get('provinces','ConguracionController@index_provinces')->name('index_provinces')->middleware('permission:index_provinces');
    Route::get('create_provinces','ConguracionController@create_provinces')->name('create_provinces')->middleware('permission:create_provinces');
    Route::post('store_provinces','ConguracionController@store_provinces')->name('store_provinces')->middleware('permission:store_provinces');
    Route::post('delete_provinces','ConguracionController@delete_provinces')->name('delete_provinces')->middleware('permission:delete_provinces');
    Route::post('show_provinces','ConguracionController@show_provinces')->name('show_provinces')->middleware('permission:show_provinces');
    Route::post('edit_provinces','ConguracionController@edit_provinces')->name('edit_provinces')->middleware('permission:edit_provinces');
    Route::post('update_provinces/{id}','ConguracionController@update_provinces')->name('update_provinces')->middleware('permission:update_provinces');

    //Rutas para Municipios
    Route::get('municipalities','ConguracionController@index_municipalities')->name('index_municipalities')->middleware('permission:index_municipalities');
    Route::get('create_municipalities','ConguracionController@create_municipalities')->name('create_municipalities')->middleware('permission:create_municipalities');
    Route::post('store_municipalities','ConguracionController@store_municipalities')->name('store_municipalities')->middleware('permission:store_municipalities');
    Route::post('delete_municipalities','ConguracionController@delete_municipalities')->name('delete_municipalities')->middleware('permission:delete_municipalities');
    Route::post('show_municipalities','ConguracionController@show_municipalities')->name('show_municipalities')->middleware('permission:show_municipalities');
    Route::post('edit_municipalities','ConguracionController@edit_municipalities')->name('edit_municipalities')->middleware('permission:edit_municipalities');
    Route::post('update_municipalities/{id}','ConguracionController@update_municipalities')->name('update_municipalities')->middleware('permission:update_municipalities');
        //Rutas para cargar datos para municipios
        Route::post('load_prov','ConguracionController@load_prov')->name('load_prov');
    //Rutas para Comunidades
    Route::get('communities','ConguracionController@index_communities')->name('index_communities')->middleware('permission:index_communities');
    Route::get('create_communities','ConguracionController@create_communities')->name('create_communities')->middleware('permission:create_communities');
    Route::post('store_communities','ConguracionController@store_communities')->name('store_communities')->middleware('permission:store_communities');
    Route::post('delete_communities','ConguracionController@delete_communities')->name('delete_communities')->middleware('permission:delete_communities');
    Route::post('show_communities','ConguracionController@show_communities')->name('show_communities')->middleware('permission:show_communities');
    Route::post('edit_communities','ConguracionController@edit_communities')->name('edit_communities')->middleware('permission:edit_communities');
    Route::post('update_communities/{id}','ConguracionController@update_communities')->name('update_communities')->middleware('permission:update_communities');
        //Rutas para cargar datos para municipios
        Route::post('load_prov_muni','ConguracionController@load_prov_muni')->name('load_prov_muni');

    //Rutas para Centro Medicos
    Route::get('medicalCenter','EstableSaludController@index_medicalCenter')->name('index_medicalCenter')->middleware('permission:index_medicalCenter');
    Route::get('create_medicalCenter','EstableSaludController@create_medicalCenter')->name('create_medicalCenter')->middleware('permission:create_medicalCenter');
    Route::post('store_medicalCenter','EstableSaludController@store_medicalCenter')->name('store_medicalCenter')->middleware('permission:store_medicalCenter');
    Route::post('delete_medicalCenter','EstableSaludController@delete_medicalCenter')->name('delete_medicalCenter')->middleware('permission:delete_medicalCenter');
    Route::post('show_medicalCenter','EstableSaludController@show_medicalCenter')->name('show_medicalCenter')->middleware('permission:show_medicalCenter');
    Route::post('edit_medicalCenter','EstableSaludController@edit_medicalCenter')->name('edit_medicalCenter')->middleware('permission:edit_medicalCenter');
    Route::post('update_medicalCenter/{id}','EstableSaludController@update_medicalCenter')->name('update_medicalCenter')->middleware('permission:update_medicalCenter');

    //Rutas para Universidades
    Route::get('universities','UniversityController@index_universities')->name('index_universities')->middleware('permission:index_universities');
    Route::get('create_universities','UniversityController@create_universities')->name('create_universities')->middleware('permission:create_universities');
    Route::post('store_universities','UniversityController@store_universities')->name('store_universities')->middleware('permission:store_universities');
    Route::post('delete_universities','UniversityController@delete_universities')->name('delete_universities')->middleware('permission:delete_universities');
    Route::post('show_universities','UniversityController@show_universities')->name('show_universities')->middleware('permission:show_universities');
    Route::post('edit_universities','UniversityController@edit_universities')->name('edit_universities')->middleware('permission:edit_universities');
    Route::post('update_universities/{id}','UniversityController@update_universities')->name('update_universities')->middleware('permission:update_universities');

    //Rutas para Facultades
    Route::get('faculties','UniversityController@index_faculties')->name('index_faculties')->middleware('permission:index_faculties');
    Route::get('create_faculties','UniversityController@create_faculties')->name('create_faculties')->middleware('permission:create_faculties');
    Route::post('store_faculties','UniversityController@store_faculties')->name('store_faculties')->middleware('permission:store_faculties');
    Route::post('delete_faculties','UniversityController@delete_faculties')->name('delete_faculties')->middleware('permission:delete_faculties');
    Route::post('show_faculties','UniversityController@show_faculties')->name('show_faculties')->middleware('permission:show_faculties');
    Route::post('edit_faculties','UniversityController@edit_faculties')->name('edit_faculties')->middleware('permission:edit_faculties');
    Route::post('update_faculties/{id}','UniversityController@update_faculties')->name('update_faculties')->middleware('permission:update_faculties');

    //Rutas para Carreras
    Route::get('careers','UniversityController@index_careers')->name('index_careers')->middleware('permission:index_careers');
    Route::get('create_careers','UniversityController@create_careers')->name('create_careers')->middleware('permission:create_careers');
    Route::post('store_careers','UniversityController@store_careers')->name('store_careers')->middleware('permission:store_careers');
    Route::post('delete_careers','UniversityController@delete_careers')->name('delete_careers')->middleware('permission:delete_careers');
    Route::post('show_careers','UniversityController@show_careers')->name('show_careers')->middleware('permission:show_careers');
    Route::post('edit_careers','UniversityController@edit_careers')->name('edit_careers')->middleware('permission:edit_careers');
    Route::post('update_careers/{id}','UniversityController@update_careers')->name('update_careers')->middleware('permission:update_careers');

    //Rutas para institutos
    Route::get('institutes','InstituteController@index_institutes')->name('index_institutes')->middleware('permission:index_institutes');
    Route::get('create_institutes','InstituteController@create_institutes')->name('create_institutes')->middleware('permission:create_institutes');
    Route::post('store_institutes','InstituteController@store_institutes')->name('store_institutes')->middleware('permission:store_institutes');
    Route::post('delete_institutes','InstituteController@delete_institutes')->name('delete_institutes')->middleware('permission:delete_institutes');
    Route::post('show_institutes','InstituteController@show_institutes')->name('show_institutes')->middleware('permission:show_institutes');
    Route::post('edit_institutes','InstituteController@edit_institutes')->name('edit_institutes')->middleware('permission:edit_institutes');
    Route::post('update_institutes/{id}','InstituteController@update_institutes')->name('update_institutes')->middleware('permission:update_institutes');

    //Rutas para carreras de los institutos
    Route::get('careers_institutes','InstituteController@index_careers_institutes')->name('index_careers_institutes')->middleware('permission:index_careers_institutes');
    Route::get('create_careers_institutes','InstituteController@create_careers_institutes')->name('create_careers_institutes')->middleware('permission:create_careers_institutes');
    Route::post('store_careers_institutes','InstituteController@store_careers_institutes')->name('store_careers_institutes')->middleware('permission:store_careers_institutes');
    Route::post('delete_careers_institutes','InstituteController@delete_careers_institutes')->name('delete_careers_institutes')->middleware('permission:delete_careers_institutes');
    Route::post('show_careers_institutes','InstituteController@show_careers_institutes')->name('show_careers_institutes')->middleware('permission:show_careers_institutes');
    Route::post('edit_careers_institutes','InstituteController@edit_careers_institutes')->name('edit_careers_institutes')->middleware('permission:edit_careers_institutes');
    Route::post('update_careers_institutes/{id}','InstituteController@update_careers_institutes')->name('update_careers_institutes')->middleware('permission:update_careers_institutes');

    //Rutas para Gestion
    Route::get('gestion','DesignationsController@index_gestion')->name('index_gestion')->middleware('permission:index_gestion');
    Route::get('create_gestion','DesignationsController@create_gestion')->name('create_gestion')->middleware('permission:create_gestion');
    Route::post('store_gestion','DesignationsController@store_gestion')->name('store_gestion')->middleware('permission:store_gestion');
    Route::post('delete_gestion','DesignationsController@delete_gestion')->name('delete_gestion')->middleware('permission:delete_gestion');
    Route::post('show_gestion','DesignationsController@show_gestion')->name('show_gestion')->middleware('permission:show_gestion');
    Route::post('edit_gestion','DesignationsController@edit_gestion')->name('edit_gestion')->middleware('permission:edit_gestion');
    Route::post('update_gestion/{id}','DesignationsController@update_gestion')->name('update_gestion')->middleware('permission:update_gestion');

    //Rutas para periodos
    Route::get('periods','DesignationsController@index_periodos')->name('index_periods')->middleware('permission:index_periods');
    Route::get('create_periods','DesignationsController@create_periodos')->name('create_periods')->middleware('permission:create_periods');
    Route::post('store_periods','DesignationsController@store_periodos')->name('store_periods')->middleware('permission:store_periods');
    Route::post('delete_periods','DesignationsController@delete_periodos')->name('delete_periods')->middleware('permission:delete_periods');
    Route::post('show_periods','DesignationsController@show_periodos')->name('show_periods')->middleware('permission:show_periods');
    Route::post('edit_periods','DesignationsController@edit_periodos')->name('edit_periods')->middleware('permission:edit_periods');
    Route::post('update_periods/{id}','DesignationsController@update_periodos')->name('update_periods')->middleware('permission:update_periods');

    //Rutas para habilitar fechas y periodos para registro de estudiantes.    
    Route::get('index_enable_periods','DesignationsController@index_enable_periods')->name('index_enable_periods')->middleware('permission:index_enable_periods');
    Route::get('create_enable_periods','DesignationsController@create_enable_periods')->name('create_enable_periods')->middleware('permission:create_enable_periods');
    Route::post('store_date_enabled','DesignationsController@store_date_enabled')->name('store_date_enabled')->middleware('permission:store_date_enabled');
    Route::post('delete_date_enabled','DesignationsController@delete_date_enabled')->name('delete_date_enabled')->middleware('permission:delete_date_enabled');
    Route::post('edit_date_enabled','DesignationsController@edit_date_enabled')->name('edit_date_enabled')->middleware('permission:edit_date_enabled');
    Route::post('update_date_enabled','DesignationsController@update_date_enabled')->name('update_date_enabled')->middleware('permission:update_date_enabled');

    //Rutas para tipos de Internados.
    Route::get('internship_types','DesignationsController@index_internship_types')->name('index_internship_types')->middleware('permission:index_internship_types');
    Route::get('create_internship_types','DesignationsController@create_internship_types')->name('create_internship_types')->middleware('permission:create_internship_types');
    Route::post('store_internship_types','DesignationsController@store_internship_types')->name('store_internship_types')->middleware('permission:store_internship_types');
    Route::post('delete_internship_types','DesignationsController@delete_internship_types')->name('delete_internship_types')->middleware('permission:delete_internship_types');
    Route::post('show_internship_types','DesignationsController@show_internship_types')->name('show_internship_types')->middleware('permission:show_internship_types');
    Route::post('edit_internship_types','DesignationsController@edit_internship_types')->name('edit_internship_types')->middleware('permission:edit_internship_types');
    Route::post('update_internship_types/{id}','DesignationsController@update_internship_types')->name('update_internship_types')->middleware('permission:update_internship_types');
    

    //Rutas para cupos para la designacioon
    Route::get('quotas','DesignationsController@index_quotas')->name('index_quotas')->middleware('permission:index_quotas');
    Route::get('create_quotas','DesignationsController@create_quotas')->name('create_quotas')->middleware('permission:create_quotas');
    Route::post('store_quotas','DesignationsController@store_quotas')->name('store_quotas')->middleware('permission:store_quotas');
    Route::post('delete_quotas','DesignationsController@delete_quotas')->name('delete_quotas')->middleware('permission:delete_quotas');
    Route::post('show_quotas','DesignationsController@show_quotas')->name('show_quotas')->middleware('permission:show_quotas');
    Route::post('edit_quotas','DesignationsController@edit_quotas')->name('edit_quotas')->middleware('permission:edit_quotas');
    Route::post('update_quotas/{id}','DesignationsController@update_quotas')->name('update_quotas')->middleware('permission:update_quotas');
        Route::post('load_medical_center_qoutas','DesignationsController@load_medical_center_qoutas')->name('load_medical_center_qoutas');
        Route::get('report_certification/{id_}','DesignationsController@report_certification')->name('report_certification');
        Route::get('report_memorandum/{id_}','DesignationsController@report_memorandum')->name('report_memorandum');
        Route::post('cargar_lsita_centros_medicos_cupos','DesignationsController@cargar_lsita_centros_medicos_cupos')->name('cargar_lsita_centros_medicos_cupos')->middleware('permission:cargar_lsita_centros_medicos_cupos');
        
        Route::post('guardar_cupos','DesignationsController@guardar_cupos')->name('guardar_cupos')->middleware('permission:guardar_cupos');

        //para ver lista de periodos 
        Route::post('load_view','DesignationsController@load_view')->name('load_view');

    //Rutas para sorteo de designaciones view_designation quota_draw
    //Route para iniciar sorteo de Designaciones search_students_uni_
    
    Route::get('start_designation', 'DesignationsController@start_designation')->name('start_designation')->middleware('permission:start_designation');

    Route::post('start_designation_insti', 'DesignationsController@start_designation_insti')->name('start_designation_insti')->middleware('permission:start_designation_insti');
    
    Route::post('start_student_univesity', 'DesignationsController@start_student_univesity')->name('start_student_univesity')->middleware('permission:start_student_univesity');

    Route::post('search_students_uni_', 'DesignationsController@search_students_uni_')->name('search_students_uni_')->middleware('permission:search_students_uni_');

    //para poder ver la lista de designaciones de acuerdo a tipo gestion y periodo
    Route::post('ver_lista_designaciones_', 'DesignationsController@ver_lista_designaciones_')->name('ver_lista_designaciones_')->middleware('permission:ver_lista_designaciones_');

    Route::post('start_student_institute', 'DesignationsController@start_student_institute')->name('start_student_institute')->middleware('permission:start_student_institute');

    Route::get('internship_draw','DesignationsController@index_internship_draw')->name('index_internship_draw')->middleware('permission:index_internship_draw');
    Route::post('start_designate','DesignationsController@start_designate')->name('start_designate')->middleware('permission:start_designate');
    Route::post('view_designation','DesignationsController@view_designation')->name('view_designation')->middleware('permission:view_designation');

    //Primer sorteo tentativo para estudiantes universitarios
    Route::post('sorteo_tentativo','DesignationsController@sorteo_tentativo')->name('sorteo_tentativo')->middleware('permission:sorteo_tentativo');
    Route::post('confirmar_sorteo_ruta','DesignationsController@confirmar_sorteo_ruta')->name('confirmar_sorteo_ruta')->middleware('permission:confirmar_sorteo_ruta');

    Route::post('view_designation_insti','DesignationsController@view_designation_insti')->name('view_designation_insti')->middleware('permission:view_designation_insti');

    Route::post('quota_draw','DesignationsController@quota_draw')->name('quota_draw')->middleware('permission:quota_draw');
    //sorte para estudianets de institutos
    Route::post('quota_draw_insti','DesignationsController@quota_draw_insti')->name('quota_draw_insti')->middleware('permission:quota_draw_insti');

    /* rutas para er las listas de estudaoine4ts designados*/
    Route::post('list_student_univesity','DesignationsController@list_student_univesity')->name('list_student_univesity')->middleware('permission:list_student_univesity');
    

    Route::post('list_student_institute','DesignationsController@list_student_institute')->name('list_student_institute')->middleware('permission:list_student_institute');


    Route::resource('/usuarios', 'UserController');
    //rutas para la seccion de estudiantes
    Route::resource('/estudiantes', 'StudentController');
    Route::post('/cargar', 'StudentController@cargar_uni');
    Route::post('/cargarinstituto', 'StudentController@cargar_insti');
    Route::post('/carrer', 'StudentController@cargar_carrer');
    Route::post('/cargar_carrera_uni','StudentController@cargar_carre_unir');
    //Rutas para notas
    Route::get('/Conguracion/Agregar', 'ConguracionController@Agregar');

    //Rutas para cargar universidades en registro Faultades
    Route::post('/charge_university', 'UniversityController@charge_universities');

    Route::post('/charge_faculties', 'UniversityController@charge_faculties');

    Route::get('/estudiantes.register', 'StudentController@register');
    
    // para cargar universidad en el formulario de estudiantes
    
    Route::post('/load_uni', 'StudentController@load_uni');
    Route::post('/load_insti', 'StudentController@load_insti');
    Route::post('/load_faculty_careers', 'StudentController@load_faculty_careers');
    Route::post('/charge_career_insti', 'InstituteController@charge_career_insti');
    Route::post('/charge_career_institutes', 'InstituteController@charge_career_institutes');
    
    //Route para crear los excel
    Route::get('export_students_excel', 'StudentController@export_students_excel')->name('export_students_excel');
    Route::get('export_types_internships_excel', 'QuotasController@export_types_internships_excel')->name('export_types_internships_excel');
    Route::get('export_quotas_excel', 'QuotasController@export_quotas_excel')->name('export_quotas_excel');
    Route::get('export_designations_excel', 'DesignationsController@export_designations_excel')->name('export_designations_excel');


    //Route para pdf 
    Route::get('generate_students_pdf', 'StudentController@generate_students_pdf')->name('generate_students_pdf');
    Route::get('generate_types_internships_pdf', 'QuotasController@generate_types_internships_pdf')->name('generate_types_internships_pdf');
    Route::get('generate_quotas_pdf', 'QuotasController@generate_quotas_pdf')->name('generate_quotas_pdf');
    Route::get('generate_designations_pdf', 'DesignationsController@generate_designations_pdf')->name('generate_designations_pdf');



// Rutas para la Universidad
    Route::get('university','UniversityController@view_perfil')->name('view_perfil')->middleware('permission:administrar_universidades');
    Route::get('index_my_faculties','UniversityController@index_my_faculties')->name('index_my_faculties')->middleware('permission:administrar_universidades');
    Route::get('index_my_careers','UniversityController@index_my_careers')->name('index_my_careers')->middleware('permission:administrar_universidades');
    Route::get('create_my_faculty','UniversityController@create_my_faculty')->name('create_my_faculty')->middleware('permission:administrar_universidades');
    
    Route::post('store_my_faculties','UniversityController@store_my_faculties')->name('store_my_faculties')->middleware('permission:administrar_universidades');
    Route::get('my_careers','UniversityController@index_my_careers')->name('index_my_careers')->middleware('permission:administrar_universidades');

    Route::get('create_my_careers','UniversityController@create_my_careers')->name('create_my_careers')->middleware('permission:administrar_universidades');
    Route::post('store_my_careers','UniversityController@store_my_careers')->name('store_my_careers')->middleware('permission:administrar_universidades');
    Route::get('view_students_university','UniversityController@view_students_university')->name('view_students_university')->middleware('permission:administrar_universidades');
    Route::post('search_students','UniversityController@search_students')->name('search_students')->middleware('permission:administrar_universidades');
    
    Route::get('register_new_student','UniversityController@register_new_student')->name('register_new_student')->middleware('permission:administrar_universidades');

    Route::get('register_new_student_group','UniversityController@register_new_student_group')->name('register_new_student_group')->middleware('permission:administrar_universidades');
    
    Route::post('store_students_uni','StudentController@store_students_uni')->name('store_students_uni')->middleware('permission:administrar_universidades');


    Route::post('import-list-excel','StudentController@import_students')->name('users.import.excel');
    //RUTA PARA EDITAR LAS DESIGNACIONES
    Route::post('editar_designacion','DesignationsController@editar_designacion')->name('editar_designacion')->middleware('permission:editar_designacion');
    //RUTA PARA PODER VER LAS DESIGNACIONES
    Route::post('ver_designacion','DesignationsController@ver_designacion')->name('ver_designacion')->middleware('permission:ver_designacion');
    //RUTA PARA GUARDAR LOS CAMBIO DE LA DESIGNACION DE UN ESTUDIANTE 
    Route::post('guardar_nueva_designacion','DesignationsController@guardar_nueva_designacion')->name('guardar_nueva_designacion')->middleware('permission:guardar_nueva_designacion');
    //Ruta para cargar los datos de la nueva designacion
    Route::post('cargar_datos_nueva_designacion','DesignationsController@cargar_datos_nueva_designacion')->name('cargar_datos_nueva_designacion')->middleware('permission:cargar_datos_nueva_designacion');
    //Rutas para modificar las fechas de los periodos    
    Route::post('cargar_fechas_periodos','DesignationsController@cargar_fechas_periodos')->name('cargar_fechas_periodos')->middleware('permission:cargar_fechas_periodos');
    Route::post('guardar_fechas_nuevas','DesignationsController@guardar_fechas_nuevas')->name('guardar_fechas_nuevas')->middleware('permission:guardar_fechas_nuevas');
    Route::post('sumar_fechas','DesignationsController@sumar_fechas')->name('sumar_fechas')->middleware('permission:sumar_fechas');
    //Guardar estudiantes por la cuenta del Administrador
    Route::post('store_students','StudentController@store_students')->name('store_students')->middleware('permission:store_students');
});