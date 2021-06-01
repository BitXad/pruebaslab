<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Prueba extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Prueba_model');
        $this->load->model('Usuario_model');
        $this->load->model('Paciente_model');
        $this->load->model('Genero_model');
        $this->load->model('Estado_model');
        $this->load->library('ControlCode');
        
        $this->session_data = $this->session->userdata('logged_in');
    } 

    /*
     * Listing of prueba
     */
    function index()
    {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            if($session_data['tipousuario_id']==1){        
                $usuario_id = $session_data['usuario_id'];
//                $data['usuario'] = $this->Usuario_model->get_usuario($usuario_id);
        
                $data['prueba'] = $this->Prueba_model->get_pruebas();
                $data['usuarios'] = $this->Usuario_model->get_all_usuario();
                $data['estado'] = $this->Estado_model->get_all_estado();

                $data['_view'] = 'prueba/index';
                $this->load->view('layouts/main',$data);
                
            }else{
                    $url = base_url("login");
                    header("Location: .$url");
                    die();
                }
        } else {redirect('login', 'refresh'); }
    }

    function registrar_prueba()
    {
        /************************** CABECERA SESSION ************************************/            
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            if($session_data['tipousuario_id']==1){        
                $usuario_id = $session_data['usuario_id'];
        /************************** CABECERA SESSION ************************************/            
                
        
                    $params['limit'] = RECORDS_PER_PAGE; 
                    $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

                    $config = $this->config->item('pagination');
                    $config['base_url'] = site_url('prueba/index?');
                    $config['total_rows'] = $this->Prueba_model->get_all_prueba_count();
                    $this->pagination->initialize($config);

                    $this->load->model('Tipo_prueba_model');
                    $data['all_tipo_prueba'] = $this->Tipo_prueba_model->get_all_tipo_prueba();

            //        $data['prueba'] = $this->Prueba_model->get_all_prueba($params);
                    $data['paciente'] = $this->Paciente_model->get_paciente_inicial();
                    $data['genero'] = $this->Genero_model->get_all_genero();
                    $data['prueba'] = $this->Prueba_model->get_pruebas();
                    $data['usuario'] = $this->Usuario_model->get_usuario($usuario_id);

                    $data['_view'] = 'prueba/registrar_prueba';
                    $this->load->view('layouts/main',$data);
                    
        /************************** FIN CABECERA SESSION ************************************/            
                }else{
                $url = base_url("login");
                header("Location: .$url");
                die();
            }
        } else {redirect('login', 'refresh'); }            
        /*************************** FIN CABECERA SESSION ***********************************/            
                    
    }

    /*
     * Adding a new prueba
     */
    function add()
    {   
        /************************** CABECERA SESSION ************************************/            
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            if($session_data['tipousuario_id']==1){        
                $usuario_id = $session_data['usuario_id'];
        /************************** CABECERA SESSION ************************************/
        
        
        $data['usuario'] = $this->Usuario_model->get_usuario($usuario_id);
        $this->load->library('form_validation');

		$this->form_validation->set_rules('prueba_precio','Prueba Precio','required');
		$this->form_validation->set_rules('prueba_nombreanalisis','Prueba Nombreanalisis','required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'usuario_id' => $this->input->post('usuario_id'),
				'tipoprueba_id' => $this->input->post('tipoprueba_id'),
				'paciente_id' => $this->input->post('paciente_id'),
				'prueba_codigo' => $this->input->post('prueba_codigo'),
				'prueba_fechasolicitud' => $this->input->post('prueba_fechasolicitud'),
				'prueba_medicolab' => $this->input->post('prueba_medicolab'),
				'prueba_fecharecepcion' => $this->input->post('prueba_fecharecepcion'),
				'prueba_procedencia' => $this->input->post('prueba_procedencia'),
				'prueba_fechainforme' => $this->input->post('prueba_fechainforme'),
				'prueba_precio' => $this->input->post('prueba_precio'),
				'prueba_acuenta' => $this->input->post('prueba_acuenta'),
				'prueba_fechacuenta' => $this->input->post('prueba_fechacuenta'),
				'prueba_saldo' => $this->input->post('prueba_saldo'),
				'prueba_fechasaldo' => $this->input->post('prueba_fechasaldo'),
				'prueba_nombreanalisis' => $this->input->post('prueba_nombreanalisis'),
				'prueba_descricpion' => $this->input->post('prueba_descricpion'),
				'prueba_resultados' => $this->input->post('prueba_resultados'),
				'prueba_observacion' => $this->input->post('prueba_observacion'),
            );
            
            $prueba_id = $this->Prueba_model->add_prueba($params);
            redirect('prueba/index');
        }
        else
        {
			$this->load->model('Usuario_model');
			$data['all_usuario'] = $this->Usuario_model->get_all_usuario();

			$this->load->model('Tipo_prueba_model');
			$data['all_tipo_prueba'] = $this->Tipo_prueba_model->get_all_tipo_prueba();

			$this->load->model('Paciente_model');
			$data['all_paciente'] = $this->Paciente_model->get_all_paciente();
            
            $data['_view'] = 'prueba/add';
            $this->load->view('layouts/main',$data);
        }

        /************************** FIN CABECERA SESSION ************************************/            
                }else{
                $url = base_url("login");
                header("Location: .$url");
                die();
            }
        } else {redirect('login', 'refresh'); }            
        /*************************** FIN CABECERA SESSION ***********************************/       
        
    }  

    /*
     * Editing a prueba
     */
    function edit($prueba_id)
    {   
        /************************** CABECERA SESSION ************************************/            
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            if($session_data['tipousuario_id']==1){        
                $usuario_id = $session_data['usuario_id'];
        /************************** CABECERA SESSION ************************************/    
    
        // check if the prueba exists before trying to edit it
        $data['prueba'] = $this->Prueba_model->get_prueba($prueba_id);
        $data['usuario'] = $this->Usuario_model->get_usuario($usuario_id);
        if(isset($data['prueba']['prueba_id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('prueba_precio','Prueba Precio','required');
			$this->form_validation->set_rules('prueba_nombreanalisis','Prueba Nombreanalisis','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'usuario_id' => $this->input->post('usuario_id'),
					'tipoprueba_id' => $this->input->post('tipoprueba_id'),
					'paciente_id' => $this->input->post('paciente_id'),
					'prueba_codigo' => $this->input->post('prueba_codigo'),
					'prueba_fechasolicitud' => $this->input->post('prueba_fechasolicitud'),
					'prueba_medicolab' => $this->input->post('prueba_medicolab'),
					'prueba_fecharecepcion' => $this->input->post('prueba_fecharecepcion'),
					'prueba_procedencia' => $this->input->post('prueba_procedencia'),
					'prueba_fechainforme' => $this->input->post('prueba_fechainforme'),
					'prueba_precio' => $this->input->post('prueba_precio'),
					'prueba_acuenta' => $this->input->post('prueba_acuenta'),
					'prueba_fechacuenta' => $this->input->post('prueba_fechacuenta'),
					'prueba_saldo' => $this->input->post('prueba_saldo'),
					'prueba_fechasaldo' => $this->input->post('prueba_fechasaldo'),
					'prueba_nombreanalisis' => $this->input->post('prueba_nombreanalisis'),
					'prueba_descricpion' => $this->input->post('prueba_descricpion'),
					'prueba_resultados' => $this->input->post('prueba_resultados'),
					'prueba_observacion' => $this->input->post('prueba_observacion'),
                );

                $this->Prueba_model->update_prueba($prueba_id,$params);            
                redirect('prueba/index');
            }
            else
            {
				$this->load->model('Usuario_model');
				$data['all_usuario'] = $this->Usuario_model->get_all_usuario();

				$this->load->model('Tipo_prueba_model');
				$data['all_tipo_prueba'] = $this->Tipo_prueba_model->get_all_tipo_prueba();

				$this->load->model('Paciente_model');
				$data['all_paciente'] = $this->Paciente_model->get_all_paciente();

                $data['_view'] = 'prueba/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The prueba you are trying to edit does not exist.');
    
        /************************** FIN CABECERA SESSION ************************************/            
                }else{
                $url = base_url("login");
                header("Location: .$url");
                die();
            }
        } else {redirect('login', 'refresh'); }            
        /*************************** FIN CABECERA SESSION ***********************************/               
    } 

    /*
     * Deleting prueba
     */
    function remove($prueba_id)
    {

        /************************** CABECERA SESSION ************************************/            
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            if($session_data['tipousuario_id']==1){        
                $usuario_id = $session_data['usuario_id'];
        /************************** CABECERA SESSION ************************************/        
         
    
        $prueba = $this->Prueba_model->get_prueba($prueba_id);

        // check if the prueba exists before trying to delete it
        if(isset($prueba['prueba_id']))
        {
            $this->Prueba_model->delete_prueba($prueba_id);
            redirect('prueba/index');
        }
        else
            show_error('The prueba you are trying to delete does not exist.');
        
        /************************** FIN CABECERA SESSION ************************************/            
                }else{
                $url = base_url("login");
                header("Location: .$url");
                die();
            }
        } else {redirect('login', 'refresh'); }            
        /*************************** FIN CABECERA SESSION ***********************************/               
        
    }
    
    function resultado($prueba_id){
        
        /************************** CABECERA SESSION ************************************/            
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            if($session_data['tipousuario_id']==1){        
                $usuario_id = $session_data['usuario_id'];
        /************************** CABECERA SESSION ************************************/        
        
//        $config = $this->config->item('pagination');
//        $config['base_url'] = site_url('prueba/index?');
//        $config['total_rows'] = $this->Prueba_model->get_all_prueba_count();
//        $this->pagination->initialize($config);

//        $data['prueba'] = $this->Prueba_model->get_all_prueba($params);
        $pruebita = $this->Prueba_model->get_prueba($prueba_id);
        $data['prueba'] = $pruebita;
        $data['usuario'] = $this->Usuario_model->get_usuario($usuario_id);
        
        //$usuario_id = 1;
        //$cadenaQR = $pruebita['paciente_nombre']."|".;
        //$enlace = base_url("prueba/resultado_prueba/".md5($prueba_id));
        //$enlace =   "https://www.testcenterbolivia.com/sislab/prueba/resultado_prueba/".md5($prueba_id);
        $enlace =   base_url("prueba/resultado_prueba/".md5($prueba_id));
        
        $cadenaQR = $pruebita['paciente_nombre']."|".$pruebita['tipoprueba_descripcion'].
                    "|".$pruebita['prueba_resultados']."|".
                    "00".$pruebita['prueba_id']."|".$pruebita['prueba_fechainforme']."|".$enlace;
               
        $this->load->helper('numeros_helper'); // Helper para convertir numeros a letras
        //Generador de Codigo QR
                //cargamos la librería	
         $this->load->library('Ciqrcode');
                 
         //hacemos configuraciones
         $params['data'] = $cadenaQR;//$this->random(30);
         $params['level'] = 'H';
         $params['size'] = 5;
         //decimos el directorio a guardar el codigo qr, en este 
         //caso una carpeta en la raíz llamada qr_code
         echo FCPATH.'resources\images\qrcode'.$usuario_id.'.png'; 
         $params['savename'] = FCPATH.'resources\images\qrcode'.$usuario_id.'.png'; //base_url('resources/images/qrcode.png'); //FCPATH.'resourcces\images\qrcode.png'; 
         
        //generamos el código qr
         $this->ciqrcode->generate($params); 
         //echo '<img src="'.base_url().'resources/images/qrcode.png" />';
        //fin generador de codigo QR        
        
        $data['codigoqr'] = base_url('resources/images/qrcode'.$usuario_id.'.png');        
        
        $data['_view'] = 'prueba/resultado';
        $this->load->view('layouts/main',$data);        
    
        /************************** FIN CABECERA SESSION ************************************/            
                }else{
                $url = base_url("login");
                header("Location: .$url");
                die();
            }
        } else {redirect('login', 'refresh'); }            
        /*************************** FIN CABECERA SESSION ***********************************/       
        
    }
    
    function resultado_prueba($prueba_id){
        
        /************************** CABECERA SESSION ************************************/            
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            if($session_data['tipousuario_id']==1){        
                $usuario_id = $session_data['usuario_id'];
        /************************** CABECERA SESSION ************************************/    
        
//        $config = $this->config->item('pagination');
//        $config['base_url'] = site_url('prueba/index?');
//        $config['total_rows'] = $this->Prueba_model->get_all_prueba_count();
//        $this->pagination->initialize($config);

//        $data['prueba'] = $this->Prueba_model->get_all_prueba($params);
        $pruebita = $this->Prueba_model->get_prueba_md5($prueba_id);
        $data['prueba'] = $pruebita;
        $data['usuario'] = $this->Usuario_model->get_usuario($usuario_id);
        
   
        //$cadenaQR = $pruebita['paciente_nombre']."|".;
        $cadenaQR = $pruebita['paciente_nombre']."|".$pruebita['tipoprueba_descripcion'].
                    "|".$pruebita['prueba_resultados']."|".
                    "00".$pruebita['prueba_id']."|".$pruebita['prueba_fechainforme'];
               
        $this->load->helper('numeros_helper'); // Helper para convertir numeros a letras
        //Generador de Codigo QR
                //cargamos la librería	
         $this->load->library('ciqrcode');
                 
         //hacemos configuraciones
         $params['data'] = $cadenaQR;//$this->random(30);
         $params['level'] = 'H';
         $params['size'] = 5;
         //decimos el directorio a guardar el codigo qr, en este 
         //caso una carpeta en la raíz llamada qr_code
         $params['savename'] = FCPATH.'resources\images\qrcode'.$usuario_id.'.png'; //base_url('resources/images/qrcode.png'); //FCPATH.'resourcces\images\qrcode.png'; 
         //generamos el código qr
         $this->ciqrcode->generate($params); 
         //echo '<img src="'.base_url().'resources/images/qrcode.png" />';
        //fin generador de codigo QR        
        
        $data['codigoqr'] = base_url('resources/images/qrcode'.$usuario_id.'.png');        
        
        $data['_view'] = 'prueba/resultado_online';
        $this->load->view('layouts/main',$data);        
        
        /************************** FIN CABECERA SESSION ************************************/            
                }else{
                $url = base_url("login");
                header("Location: .$url");
                die();
            }
        } else {redirect('login', 'refresh'); }            
        /*************************** FIN CABECERA SESSION ***********************************/               
        
    }
    
    
    function buscar(){
        
        $parametro = $this->input->post("parametro");
        $sql = "select * from paciente where ".$parametro;
        //echo $sql;
        $resultado = $this->Prueba_model->consultar($sql);
        
        echo json_encode($resultado);
        
    }    

    function buscar_tipoprueba(){
        
        $tipoprueba_id = $this->input->post("tipoprueba_id");
        $sql = "select * from tipo_prueba where tipoprueba_id = ".$tipoprueba_id;
        //echo $sql;
        $resultado = $this->Prueba_model->consultar($sql);
        
        echo json_encode($resultado);
        
    }    

    function buscar_prueba(){
        
        $parametros = $this->input->post("parametros");
        
        $sql = "select r.*, p.*, u.*, t.*, e.*
                from prueba r
                left join paciente p on p.paciente_id = r.paciente_id
                left join usuario u on u.usuario_id = r.usuario_id
                left join tipo_prueba t on t.tipoprueba_id = r.tipoprueba_id
                left join estado e on e.estado_id = r.estado_id
                where ".$parametros.
                " order by r.prueba_id desc";
        ///echo $sql;
        $resultado = $this->Prueba_model->consultar($sql);
        
        echo json_encode($resultado);
        
    }
    
   
    function seleccionar_paciente(){
        
        $paciente_id = $this->input->post("paciente_id");
        $sql = "select * from paciente where paciente_id = ".$paciente_id;
        //echo $sql;
        $resultado = $this->Prueba_model->consultar($sql);
        
        echo json_encode($resultado);
        
    }    

    function registrar(){

        /************************** CABECERA SESSION ************************************/            
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            if($session_data['tipousuario_id']==1){        
                $usuario_id = $session_data['usuario_id'];
        /************************** CABECERA SESSION ************************************/        
        
        //registrar paciente
        $paciente_id = $this->input->post("paciente_id");
        $estado_id = 1;
        $genero_id = $this->input->post("genero_id");
        $extencion_id = $this->input->post("extencion_id");
        $paciente_nombre = "'".$this->input->post("paciente_nombre")."'";
        $paciente_edad = $this->input->post("paciente_edad");
        $paciente_direccion = "'".$this->input->post("paciente_direccion")."'";
        $paciente_codigo = "'".$this->input->post("paciente_codigo")."'";
        $paciente_ci = "'".$this->input->post("paciente_ci")."'";
        $paciente_celular = "'".$this->input->post("paciente_celular")."'";
        $paciente_telefono = "'".$this->input->post("paciente_telefono")."'";
        $paciente_nit = "'".$this->input->post("paciente_nit")."'";
        $paciente_razon = "'".$this->input->post("paciente_razon")."'";
        $paciente_foto = "'".$this->input->post("paciente_foto")."'";

        
        if($paciente_id==0){ // paciente nuevo
            
            $sql = "insert into paciente(estado_id,genero_id,extencion_id,paciente_nombre,
                    paciente_edad,paciente_direccion,paciente_codigo,paciente_ci,
                    paciente_celular,paciente_telefono,paciente_nit,paciente_razon,paciente_foto) value(".
                    $estado_id.",".$genero_id.",".$extencion_id.",".$paciente_nombre.",".
                    $paciente_edad.",".$paciente_direccion.",".$paciente_codigo.",".$paciente_ci.",".
                    $paciente_celular.",".$paciente_telefono.",".$paciente_nit.",".$paciente_razon.",".$paciente_foto.")";
            
            $this->Prueba_model->ejecutar($sql);
            
            $resultado = $this->Prueba_model->consultar("select max(paciente_id) as pacienteid from paciente");
            $paciente_id = $resultado[0]["pacienteid"]; 
        }
        else{ // modificar paciente
            $sql = "update paciente set ".
                    "estado_id = ".$estado_id.
                    ",genero_id = ".$genero_id.
                    ",extencion_id = ".$extencion_id.
                    ",paciente_nombre = ".$paciente_nombre.
                    ",paciente_edad = ".$paciente_edad.
                    ",paciente_direccion = ".$paciente_direccion.
                    ",paciente_codigo = ".$paciente_codigo.
                    ",paciente_ci = ".$paciente_ci.
                    ",paciente_celular = ".$paciente_celular.
                    ",paciente_telefono = ".$paciente_telefono.
                    ",paciente_nit = ".$paciente_nit.
                    ",paciente_razon = ".$paciente_razon.
                    ",paciente_foto = ".$paciente_foto.
                    " where paciente_id = ".$paciente_id;
            $this->Prueba_model->ejecutar($sql);
        }
        
        //echo $sql;
        
        
        
        
        //Registra prueba        
    	$tipoprueba_id = $this->input->post("tipoprueba_id");
        //$paciente_id = $this->input->post("paciente_id");
        $prueba_fechasolicitud = "'".$this->input->post("prueba_fechasolicitud")."'";  
        $prueba_medicolab = "'".$this->input->post("prueba_medicolab")."'";
        $prueba_procedencia = "'".$this->input->post("prueba_procedencia")."'";
        $prueba_fechainforme = "'".$this->input->post("prueba_fechainforme")."'";
        $prueba_nombreanalisis = "'".$this->input->post("prueba_nombreanalisis")."'";
        $prueba_descricpion = "'".$this->input->post("prueba_descricpion")."'";
        $prueba_resultados = "'".$this->input->post("prueba_resultados")."'";
        $prueba_observacion = "'".$this->input->post("prueba_observacion")."'";
        $prueba_precio = $this->input->post("prueba_precio");
        $prueba_acuenta = $this->input->post("prueba_acuenta");
        $prueba_fechacuenta = "'".$this->input->post("prueba_fechacuenta")."'";
        $prueba_saldo = 0;// $this->input->post("prueba_saldo");
        $prueba_codigo = "'-'";
        $estado_id = $this->input->post("estado_id");
        
        

        $sql = "insert into prueba(tipoprueba_id, paciente_id, prueba_fechasolicitud, prueba_medicolab,
                prueba_procedencia, prueba_fechainforme, prueba_nombreanalisis, prueba_descricpion, 
                prueba_resultados, prueba_observacion, prueba_precio, prueba_acuenta, prueba_fechacuenta,
                prueba_saldo, prueba_codigo, estado_id, usuario_id) value(".
                
                $tipoprueba_id.", ".$paciente_id.", ".$prueba_fechasolicitud.", ".$prueba_medicolab.", ".
                $prueba_procedencia.", ".$prueba_fechainforme.", ".$prueba_nombreanalisis.", ".
                $prueba_descricpion.", ".$prueba_resultados.", ".$prueba_observacion.", ".$prueba_precio.
                ", ".$prueba_acuenta.", ".$prueba_fechacuenta.", ".$prueba_saldo.", ".$prueba_codigo.", ".
                $estado_id.", ".$usuario_id.")";    
        //echo $sql;        
        $this->Prueba_model->ejecutar($sql);
        
        echo json_encode(true);
        
        /************************** FIN CABECERA SESSION ************************************/            
                }else{
                $url = base_url("login");
                header("Location: .$url");
                die();
            }
        } else {redirect('login', 'refresh'); }            
        /*************************** FIN CABECERA SESSION ***********************************/               
        
    }    
    
    function actualizar_prueba(){

        /************************** CABECERA SESSION ************************************/            
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            if($session_data['tipousuario_id']==1){        
                $usuario_id = $session_data['usuario_id'];
        /************************** CABECERA SESSION ************************************/        
        
        //registrar paciente

        $prueba_fechasolicitud = "'".$this->input->post("prueba_fechasolicitud")."'";
        $prueba_medicolab = "'".$this->input->post("prueba_medicolab")."'";
        $prueba_procedencia = "'".$this->input->post("prueba_procedencia")."'";
        $prueba_fechainforme = "'".$this->input->post("prueba_fechainforme")."'";
        $prueba_nombreanalisis = "'".$this->input->post("prueba_nombreanalisis")."'";
        $prueba_descricpion = "'".$this->input->post("prueba_descricpion")."'";
        $prueba_resultados = "'".$this->input->post("prueba_resultados")."'";
        $prueba_observacion = "'".$this->input->post("prueba_observacion")."'";
        $prueba_precio = $this->input->post("prueba_precio");
        $prueba_acuenta = $this->input->post("prueba_acuenta");    
        $prueba_saldo = $this->input->post("prueba_saldo");
        $estado_id = $this->input->post("estado_id");   
        $prueba_id = $this->input->post("prueba_id");   
        
        

        
        
        
        $sql = "update prueba set
                prueba_fechasolicitud = ".$prueba_fechasolicitud.
                ",prueba_medicolab = ".$prueba_medicolab.
                ",prueba_procedencia = ".$prueba_procedencia.
                ",prueba_fechainforme = ".$prueba_fechainforme.
                ",prueba_nombreanalisis = ".$prueba_nombreanalisis.
                ",prueba_descricpion = ".$prueba_descricpion.
                ",prueba_resultados = ".$prueba_resultados.
                ",prueba_observacion = ".$prueba_observacion.
                ",prueba_precio = ".$prueba_precio.
                ",prueba_acuenta = ".$prueba_acuenta.
                ",prueba_fechacuenta = now()".
                ",prueba_saldo = ".$prueba_saldo.
                ",estado_id = ".$estado_id.
                " where prueba_id = ".$prueba_id;

        //echo $sql;        
        $this->Prueba_model->ejecutar($sql);
        
        echo json_encode(true);
        
        /************************** FIN CABECERA SESSION ************************************/            
                }else{
                $url = base_url("login");
                header("Location: .$url");
                die();
            }
        } else {redirect('login', 'refresh'); }            
        /*************************** FIN CABECERA SESSION ***********************************/               
        
    }    
    
    public function getUltimoDiaMes($elAnio,$elMes) {
     return date("d",(mktime(0,0,0,$elMes+1,1,$elAnio)-1));
    }

    function mes($anio,$mes)
    {
        $primer_dia=1;
        $ultimo_dia=$this->getUltimoDiaMes($anio,$mes);
        $fecha_inicial=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$primer_dia) );
        $fecha_final=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$ultimo_dia) );
        
        $fechas_precio = "SELECT date(prueba_fecharegistro) as registro_fecha, round(prueba_precio,2) as prueba_totalfinal FROM prueba where date(prueba_fecharegistro) >= '".$anio."-".$mes."-01' and  date(prueba_fecharegistro) <= '".$anio."-".$mes."-31' ";
        
        $result_precios = $this->db->query($fechas_precio)->result_array();
        
        $fechas_utilidades = "SELECT date(prueba_fecharegistro) as registro_fecha, round(prueba_saldo,2) as utilidad_total FROM prueba where date(prueba_fecharegistro) >= '".$anio."-".$mes."-01' and  date(prueba_fecharegistro) <= '".$anio."-".$mes."-31' ";
        
        $result_utilidades = $this->db->query($fechas_utilidades)->result_array();
        //$result=$data['result'];
        $ct=count($result_precios);

        for($d=1;$d<=$ultimo_dia;$d++){
            $registros[$d]=0;
            $registrosven[$d]=0;     
        }

        foreach($result_precios as $res){
            
            $diasel=intval(date("d",strtotime($res['registro_fecha']) ) );
            $suma=$res['prueba_totalfinal'];
            $registros[$diasel]+=$suma;    
        }

        foreach($result_utilidades as $resven){
            $diaselven=intval(date("d",strtotime($resven['registro_fecha']) ) );
            $sumave=$resven['utilidad_total'];
            $registrosven[$diaselven]+=$sumave;    
        }

        $data=array("totaldias"=>$ultimo_dia, "registrosdia" =>$registros, "registrosven" =>$registrosven);
        echo   json_encode($data);
        /*$anio = $this->input->post('anio');   1555891200
        $mes = $this->input->post('fecha2'); 
        */
        }
        
    function ultimo_resultado(){

        /************************** CABECERA SESSION ************************************/            
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            if($session_data['tipousuario_id']==1){        
                $usuario_id = $session_data['usuario_id'];
        /************************** CABECERA SESSION ************************************/        
        
                $sql = "select max(prueba_id) as pruebaid from prueba";
                $resultado = $this->Prueba_model->consultar($sql);
                
//                $data['_view'] = 'prueba/resultado/'.$resultado["pruebaid"];
//                $this->load->view('layouts/main',$data);
                
                $this->resultado($resultado[0]["pruebaid"]);
        
        /************************** FIN CABECERA SESSION ************************************/            
                }else{
                $url = base_url("login");
                header("Location: .$url");
                die();
            }
        } else {redirect('login', 'refresh'); }            
        /*************************** FIN CABECERA SESSION ***********************************/               
        
    }            
        
}
