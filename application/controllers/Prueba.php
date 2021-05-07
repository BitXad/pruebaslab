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
    } 

    /*
     * Listing of prueba
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('prueba/index?');
        $config['total_rows'] = $this->Prueba_model->get_all_prueba_count();
        $this->pagination->initialize($config);

//        $data['prueba'] = $this->Prueba_model->get_all_prueba($params);
        $data['prueba'] = $this->Prueba_model->get_pruebas();
        $data['usuario'] = $this->Usuario_model->get_usuario(1);
        
        $data['_view'] = 'prueba/index';
        $this->load->view('layouts/main',$data);
    }

    function registrar_prueba()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('prueba/index?');
        $config['total_rows'] = $this->Prueba_model->get_all_prueba_count();
        $this->pagination->initialize($config);

//        $data['prueba'] = $this->Prueba_model->get_all_prueba($params);
        $data['paciente'] = $this->Paciente_model->get_paciente_inicial();
        $data['genero'] = $this->Genero_model->get_all_genero();
        $data['prueba'] = $this->Prueba_model->get_pruebas();
        $data['usuario'] = $this->Usuario_model->get_usuario(1);
        
        $data['_view'] = 'prueba/registrar_prueba';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new prueba
     */
    function add()
    {   $data['usuario'] = $this->Usuario_model->get_usuario(1);
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
    }  

    /*
     * Editing a prueba
     */
    function edit($prueba_id)
    {   
        // check if the prueba exists before trying to edit it
        $data['prueba'] = $this->Prueba_model->get_prueba($prueba_id);
        $data['usuario'] = $this->Usuario_model->get_usuario(1);
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
    } 

    /*
     * Deleting prueba
     */
    function remove($prueba_id)
    {
        $prueba = $this->Prueba_model->get_prueba($prueba_id);

        // check if the prueba exists before trying to delete it
        if(isset($prueba['prueba_id']))
        {
            $this->Prueba_model->delete_prueba($prueba_id);
            redirect('prueba/index');
        }
        else
            show_error('The prueba you are trying to delete does not exist.');
    }
    
    function resultado($prueba_id){
        
//        $config = $this->config->item('pagination');
//        $config['base_url'] = site_url('prueba/index?');
//        $config['total_rows'] = $this->Prueba_model->get_all_prueba_count();
//        $this->pagination->initialize($config);

//        $data['prueba'] = $this->Prueba_model->get_all_prueba($params);
        $pruebita = $this->Prueba_model->get_prueba($prueba_id);
        $data['prueba'] = $pruebita;
        $data['usuario'] = $this->Usuario_model->get_usuario(1);
        
        $usuario_id = 1;
        //$cadenaQR = $pruebita['paciente_nombre']."|".;
        //$enlace = base_url("prueba/resultado_prueba/".md5($prueba_id));
        $enlace =   "https://www.testcenterbolivia.com/sislab/prueba/resultado_prueba/".md5($prueba_id);
        
        $cadenaQR = $pruebita['paciente_nombre']."|".$pruebita['tipoprueba_descripcion'].
                    "|".$pruebita['prueba_resultados']."|".
                    "00".$pruebita['prueba_id']."|".$pruebita['prueba_fechainforme']."|".$enlace;
               
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
        
        $data['_view'] = 'prueba/resultado';
        $this->load->view('layouts/main',$data);        
        
    }
    
    function resultado_prueba($prueba_id){
        
//        $config = $this->config->item('pagination');
//        $config['base_url'] = site_url('prueba/index?');
//        $config['total_rows'] = $this->Prueba_model->get_all_prueba_count();
//        $this->pagination->initialize($config);

//        $data['prueba'] = $this->Prueba_model->get_all_prueba($params);
        $pruebita = $this->Prueba_model->get_prueba_md5($prueba_id);
        $data['prueba'] = $pruebita;
        $data['usuario'] = $this->Usuario_model->get_usuario(1);
        
        $usuario_id = 1;
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
        
    }
    
    
    function buscar(){
        
        $parametro = $this->input->post("parametro");
        $sql = "select * from paciente where ".$parametro;
        $resultado = $this->Prueba_model->consultar($sql);
        
        echo json_encode($resultado);
        
    }    
}
